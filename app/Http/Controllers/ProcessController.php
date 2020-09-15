<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Process\ProcessRepositoryInterface;

class ProcessController extends Controller
{
    protected $processRepository;

    public function __construct(ProcessRepositoryInterface $processRepository)
    {
        $this->processRepository = $processRepository;
    }

    public function process($id)
    {
        // dd($id);
        $dataProcess = $this->processRepository->create([
            'name'=>'Checking',
            'user_job_id'=>$id,
            'step'=> 1
        ]);

        return redirect()->route('evaluate.checking');
    }
}
