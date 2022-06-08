<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Resources\EmailResource;
use App\Http\Resources\EmailsResource;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return new EmailsResource(Email::paginate(2));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $email = new Email();

        $email->Email = $request->input('email');

        $email->save();
        return response()->json($email);
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
    public function show($id)
    {
        $email = Email::find($id);

        if($email) {
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
    public function updateById(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $email = Email::find($id);
        $email->Email = $request->input('email');

        $email->save();
        return response()->json($email);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email): \Illuminate\Http\Response
    {
        //
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
