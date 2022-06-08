<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmailsResource;
use App\Models\Email;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EmailsResource(Email::onlyTrashed()->paginate(2));
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
     */
    public function store(Request $request): \Illuminate\Http\Response
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
    public function update(Request $request, Email $email): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Email::onlyTrashed()->find($id)->forceDelete();

        return response()->json([
            'status' => $result,
            'message' => "Mail succesfully force deleted",
        ]);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id): \Illuminate\Http\JsonResponse
    {
        $result = Email::withTrashed()->find($id)->restore();

        return response()->json([
            'status' => true,
            'message' => "Mail succesfully restored",
            'emails' => $result
        ]);
    }
}
