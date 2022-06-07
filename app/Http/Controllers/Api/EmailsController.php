<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Models\Email;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $result = Email::all();

        return response()->json([
            'status' => true,
            'emails' => $result
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(storeEmailRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->except('_token');
        $result = Email::create([
            'email' => $data['email'],
            'avatar' => $request->avatar->getClientOriginalName(),
        ]);

        return response()->json([
            'status' => true,
            'message' => "Mail succesfully added",
            'emails' => $result
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Email $email): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateEmailRequest $updateEmailRequest, Email $email): \Illuminate\Http\JsonResponse
    {
        $data = $updateEmailRequest->validated();
        $result = $email->update([
            'email' => $data['email'],
            'avatar' => $updateEmailRequest->avatar->getClientOriginalName(),
        ]);

        return response()->json([
            'status' => true,
            'message' => "Mail succesfully updated",
            'emails' => $result
        ], 200);
        //update email and avatar with new data
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email): \Illuminate\Http\JsonResponse
    {
        $result = $email->delete();

        return response()->json([
            'status' => true,
            'message' => "Mail succesfully deleted",
            'emails' => $result
        ], 200);
    }
}
