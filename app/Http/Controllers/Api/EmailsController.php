<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Resources\EmailCollection;
use App\Http\Resources\EmailResource;
use App\Http\Resources\EmailsCollection;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return new EmailsCollection(Email::paginate(2));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(StoreEmailRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->except('_token');
        $result = Email::create([
            'email' => $data['email'],
            'avatar' => $request->avatar->getClientOriginalName(),
            'province_id' => $data['province_id'],
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
    public function show($id)
    {
        $email = Email::find($id);

        if ($email) {
            return new EmailResource($email);
        }

        return [
            'data' => [
                'status' => 'failed',
                'error' => 404,
            ]
        ];
    }

    /**
     * Display the specified resource.
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $email = Email::find($id);
        $email->email = $request->input('email');
        $email->province_id = $request->input('province_id');

        $email->save();
        return response()->json($email);
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
