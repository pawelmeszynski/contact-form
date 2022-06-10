<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Mail\CustomerCreated;
use App\Models\Email;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Mail;
use Spatie\Glide\GlideImage;

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
        return view('emails.create')->with([
            'provinces' => Province::all(),
        ]); //show create form
    }

    /**
     * Store new email in database.
     */
    public function store(StoreEmailRequest $request): RedirectResponse
    {
        $data = $request->except('_token'); //get all data from request except _token

        $filename = $request->avatar->getClientOriginalName(); //get uploaded filename
        $fileNameWithoutExt = Str::beforeLast($filename, '.'); //get file name without extenstion
        $extension = Str::afterLast($filename, '.'); //get file extension
        $request->avatar->storeAs('images', $filename, 'public');  // save uploaded file in "images" directory on /storage/app/public/

        GlideImage::create(Storage::disk('public')->path('images/' . $filename))
            ->modify([
                'w' => 48, 'h' => 48
            ]) //crop image
            ->save(Storage::disk('public')->path('images/' . $fileNameWithoutExt . '-avatar.' . $extension)); //save on disk

        if (!Email::where('email', $data['email'])->exists()) { //check if email isn`t exists already in database
            Email::create([
                'email' => $data['email'],
                'avatar' => $request->avatar->getClientOriginalName(),
                'province_id' => $data['province_id'],
            ]); //store new email and avatar in database
        }

//        Mail::to('test@mailhog.local')->send(new CustomerCreated());
        return redirect()->route('emails.index'); //redirect to emails list
    }

    /**
     * Show edit email form.
     */
    public function edit(Email $email): View
    {
        return view('emails.edit')->with([
            'email' => $email,
            'provinces' => Province::all(),
        ]); //show edit form
    }

    /**
     * Update email.
     */
    public function update(UpdateEmailRequest $updateEmailRequest, Email $email): RedirectResponse
    {
        $data = $updateEmailRequest->validated(); //get only validated data
        $filename = $updateEmailRequest->avatar->getClientOriginalName(); //get uploaded filename
        $fileNameWithoutExt = Str::beforeLast($filename, '.'); //get file name without extenstion
        $extension = Str::afterLast($filename, '.'); //get file extension
        $updateEmailRequest->avatar->storeAs('images', $filename, 'public');  // save uploaded file in "images" directory on /storage/app/public/

        GlideImage::create(Storage::disk('public')->path('images/' . $filename))
            ->modify([
                'w' => 48, 'h' => 48
            ]) //crop image
            ->save(Storage::disk('public')->path('images/' . $fileNameWithoutExt . '-avatar.' . $extension)); //save on disk
        $result = $email->update([
            'email' => $data['email'],
            'avatar' => $updateEmailRequest->avatar->getClientOriginalName(),
            'province_id' => $data['province_id'],
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
