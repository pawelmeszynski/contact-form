<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(!Email::where('email', $data['email'])->exists()) {
            Email::create([
                'email' => $data['email'],
            ]);
        }

        return redirect()->route('lista');
    }

    public function list()
    {
        return view('list')->with([
            'emails' => Email::all(),
        ]);
    }
}
