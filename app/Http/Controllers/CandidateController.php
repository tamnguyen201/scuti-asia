<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Candidate\CandidateRepositoryInterface;

class CandidateController extends Controller
{
    protected $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository) 
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function index()
    {
        $candidates = $this->candidateRepository->index();

        return view("admin.candidate.index", compact('candidates'));
    }

    public function evaluating()
    {
        $candidates = $this->candidateRepository->evaluating();

        return view("admin.candidate.evaluating", compact('candidates'));
    }

    public function finish()
    {
        $candidates = $this->candidateRepository->finish();

        return view("admin.candidate.finish", compact('candidates'));
    }

    public function failed()
    {
        $candidates = $this->candidateRepository->failed();

        return view("admin.candidate.failed", compact('candidates'));
    }

    public function show($id)
    {
        $candidate = $this->candidateRepository->show($id);
        $html = view('admin.candidate.profile', compact('candidate'))->render();

        return response()->json($html);
    }

}
