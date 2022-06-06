<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Mail\CustomerCreated;
use App\Models\Email;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Mail;

class EmailsController extends Controller
{
    /**
     * Display list of all emails.
     */
    public function index(): View
    {
        return view('emails.index')->with([
            'emails' => Email::all(),
        ]); //show emails list
    }

    /**
     * Display form of creating new email.
     */
    public function create(): View
    {
        return view('emails.create'); //show create form
    }

    /**
     * Store new email in database.
     */
    public function store(StoreEmailRequest $request): RedirectResponse
    {
        $data = $request->except('_token'); //get all data from request except _token

        $filename = $request->avatar->getClientOriginalName();
        $request->avatar->storeAs('images', $filename, 'public');  // taking uploaded file to storage

        if (!Email::where('email', $data['email'])->exists()) { //check if email isn`t exists already in database
            Email::create([
                'email' => $data['email'],
                'avatar' => $request->avatar->getClientOriginalName(),
            ]); //store new email and avatar in database
        }

        Mail::to('test@mailhog.local')->send(new CustomerCreated());
        return redirect()->route('emails.index'); //redirect to emails list
    }

    /**
     * Show edit email form.
     */
    public function edit(Email $email): View
    {
        return view('emails.edit')->with([
            'email' => $email,
        ]); //show edit form
    }

    /**
     * Update email.
     */
    public function update(UpdateEmailRequest $updateEmailRequest, Email $email): RedirectResponse
    {
        $data = $updateEmailRequest->validated(); //get only validated data

        $result = $email->update([
            'email' => $data['email'],
            'avatar' => $updateEmailRequest->avatar->getClientOriginalName(),
        ]); //update email and avatar with new data

        return back()->with([
            'status' => [
                'status' => $result ? 'success' : 'failed',
                'message' => $result ? 'Mail succesfully edited' : 'Something went wrong, sorry',
            ],
        ]);
    }

    /**
     * Remove email from database.
     */
    public function destroy(Email $email): RedirectResponse
    {
        $result = $email->delete();

        return back()->with([
            'status' => [
                'status' => $result ? 'success' : 'failed',
                'message' => $result ? 'Email successfully deleted ' : 'Something went wrong, sorry ' . $email->email,
            ],
        ]); //delete mail from database
    }
}
