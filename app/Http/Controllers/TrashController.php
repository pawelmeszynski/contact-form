<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\View\View;

class TrashController extends Controller
{
    /**
     * Display list of all emails.
     */
    public function index(): View
    {
        return view('emails.trash')->with([
            'emails' => Email::onlyTrashed()->get(),
        ]); //show trashed emails list
    }

    /**
     * Remove email from database.
     */
    public function delete($id)
    {
        Email::onlyTrashed()->forceDelete();

        return back(); //delete mail from database
    }

    /**
     * Restore emails.
     */
    public function restore($id)
    {
        Email::withTrashed()->find($id)->restore();

        return back(); //restore mail from database
    }
}
