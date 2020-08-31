<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Evaluate\EvaluateRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;

class EvaluateController extends Controller
{
    protected $candidateRepository;
    protected $evaluateRepository;

    public function __construct(
        EvaluateRepositoryInterface $evaluateRepository,
        CandidateRepositoryInterface $candidateRepository)
    {
        $this->evaluateRepository = $evaluateRepository;
        $this->candidateRepository = $candidateRepository;
    }

    public function checking($id, Request $request)
    {
        $this->evaluateRepository->create([
            'user_id'=>$id,
            'comment'=>$request->comment,
            'status'=>'checking'
        ]);
        return redirect()->route('candidates.index');
    }

    public function sendEmail($id)
    {
        $candidate = $this->candidateRepository->show($id);
        $html = view('admin.evaluate.email', compact('candidate'))->render();

        return response()->json($html);
    }

}
