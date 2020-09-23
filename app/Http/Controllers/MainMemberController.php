<?php

namespace App\Http\Controllers;

use Alert;

use Illuminate\Http\Request;
use App\Http\Requests\MainMemberRequest;
use App\Http\Requests\MainMemberUpdateRequest;
use App\Repositories\Member\MemberRepositoryInterface;

class MainMemberController extends Controller
{
    protected $MemberRepository;

    public function __construct(MemberRepositoryInterface $MemberRepository) {
        $this->MemberRepository = $MemberRepository;
    }
    
    public function index()
    {
        $members = $this->MemberRepository->paginate();

        return view('admin.mainMember.index', compact('members'));
    }

    public function show($id)
    {
        $member = $this->MemberRepository->show($id);
        $html = view('admin.mainMember.profile', compact('member'))->render();

        return response()->json($html);
    }

    public function create()
    {
        return view('admin.mainMember.add');
    }

    public function store(MainMemberRequest $request)
    {
        $this->MemberRepository->store($request->all());
        
        return redirect()->route('members.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $member = $this->MemberRepository->show($id);

        return view('admin.mainMember.edit', compact('member'));
    }

    public function update(MainMemberUpdateRequest $request, $id)
    {
        $this->MemberRepository->update($request->all(), $id);
    
        return redirect()->route('members.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function destroy($id)
    {
        $this->MemberRepository->delete($id);

        return back()->with('success', trans('custom.alert_messages.success'));
    }
}
