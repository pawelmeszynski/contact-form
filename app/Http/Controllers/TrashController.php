<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Move email to trash.
     */
    public function trashed(Email $email): RedirectResponse
    {
        $result = $email->delete();

        if ($email->trashed()) {
            return redirect()->route('emails.trash');

        }
    }
}
