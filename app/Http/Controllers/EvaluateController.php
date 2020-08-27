<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Candidate\CandidateRepositoryInterface;

class EvaluateController extends Controller
{
    protected $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function show($id)
    {
        $candidateById = $this->candidateRepository->show($id);
        dd($candidateById);
        return view('admin.evaluate.applied_process');
    }

}
