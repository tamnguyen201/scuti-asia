<?php
namespace App\Repositories\Candidate;

use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
    }

    public function paginate($perPage = 10, $columns = array('*'))
    {
        return $this->model->with(['userjob','job'])->paginate($perPage, $columns);
    }
    
    public function show($id)
    {
        return $this->model->with('cv')->findOrFail($id);
    }

    
    public function create($results)
    {
        DB::beginTransaction();
        try {
            $data = $results;
            $data['password'] = \Str::random(8);
            $candidate = $this->model->create($data);
            
            if(array_key_exists("cv_url", $results)) {
                $data['cv_url'] = $this->uploadCV($results['cv_url']);
                $data['user_id'] = $candidate->id;
                $cv = \App\Model\CV::create($data);
            }

            \App\Model\UserJob::create([
                'user_id' => $candidate->id,
                'cv_file' => $cv->cv_url,
                'job_id' => $data['job_id']
            ]);

            DB::commit();
            $this->sendMail($candidate, $data['password']);

        } catch (Exception $e) {
            DB::rollBack();
            
            throw new Exception($e->getMessage());
        }
    }

    public function uploadCV($file)
    {
        $destinationPath = 'cvs/';
        $cv = date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $cv);
        return $destinationPath . $cv;
    }

    public function sendMail($candidate, $password)
    {
        $details = [
            'title' => trans('custom.email_template.create_admin_account.title'),
            'body' => trans('custom.email_template.create_admin_account.body'),
            'name' => $candidate->name,
            'username' => $candidate->email,
            'password' => $password,
        ];
    
        \Mail::to($candidate->email)->send(new \App\Mail\CreateCandidateMail($details));
    }

    public function where($field, $opedaytor = '=' ,$condition)
    {
        return $this->model->where($field, $opedaytor ,$condition)->first();
    }

    public function index()
    {
        return \App\Model\UserJob::with(['user'])->paginate(10);
    }

    public function indexByJob($id)
    {
        return \App\Model\UserJob::with(['user'])->where('job_id', '=' , $id)->paginate(10);
    }

    public function evaluating()
    {
        return \App\Model\UserJob::with(['user'])
                    ->where('status', '=', 0)
                    ->paginate(10);
    }

    public function finish()
    {
        return \App\Model\UserJob::with(['user'])
                ->where('status', '=', 1)
                ->paginate(10);
    }

    public function failed()
    {
        return \App\Model\UserJob::with(['user'])
                    ->where('status', '=', 1)
                    ->where('result', '=', 0)
                    ->paginate(10);
    }
}
