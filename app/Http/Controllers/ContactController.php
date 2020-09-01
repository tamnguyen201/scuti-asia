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
        $contacts = $this->contactService->paginate(10);

        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->contactService->show($id);

        return view('admin.contact.index', compact('contact'));
    }
}
