<?php

namespace App\Http\Controllers;

use Alert;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Repositories\Member\MemberRepositoryInterface;

class MemberController extends Controller
{
    protected $MemberRepository;

    public function __construct(MemberRepositoryInterface $MemberRepository) {
        $this->MemberRepository = $MemberRepository;
    }
    
    public function index()
    {
        $Members = $this->MemberRepository->paginate();

        return view('admin.member.index', compact('Members'));
    }

    public function show($id)
    {
        $Member = $this->MemberRepository->show($id);
        $html = view('admin.member.profile', compact('Member'))->render();

        return response()->json($html);
    }

    public function create()
    {
        return view('admin.member.add');
    }

    public function store(MemberRequest $request)
    {
        $this->MemberRepository->store($request->all());
        
        return redirect()->route('Members.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $manager = $this->MemberRepository->show($id);

        return view('admin.member.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $this->userRepository->update(['role' => $request->role], $request->user_id);
    
        return redirect()->route('Members.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function destroy($id)
    {
        $this->MemberRepository->delete($id);

        return back()->with('success', trans('custom.alert_messages.success'));
    }
}
