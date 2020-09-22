<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService) {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->paginate();

        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->contactService->show($id);
        $html = view('admin.contact.view', compact('contact'))->render();

        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        $this->contactService->update(['status' => 1], $id);
    
        return redirect()->route('contacts.index')->with('success', trans('custom.alert_messages.success'));
    }
}
