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
        $candidates = $this->candidateRepository->paginate();

        return view("admin.candidate.index", compact('candidates'));
    }

    public function show($id)
    {
        $candidate = $this->candidateRepository->show($id);
        $html = view('admin.candidate.profile', compact('candidate'))->render();

        return response()->json($html);
    }

}
