<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Email;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');

        if (!Email::where('email', $data['email'])->exists()) {
            Email::create([
                'email' => $data['email'],
            ]);
        }

        return redirect()->route('list');
    }

    public function list()
    {
        return view('list')->with([
            'emails' => Email::all(),
        ]);
    }
}
