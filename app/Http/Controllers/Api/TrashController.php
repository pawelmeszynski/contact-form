<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = Email::onlyTrashed()->get();

        return response()->json([
            'status' => true,
            'emails' => $result
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
        $result = Email::onlyTrashed()->forceDelete();

        return response()->json([
            'status' => true,
            'message' => "Mail succesfully force deleted",
            'emails' => $result
        ]);
    }
    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $result = Email::withTrashed()->find($id)->restore();

        return response()->json([
            'status' => true,
            'message' => "Mail succesfully restored",
            'emails' => $result
        ]);

    }

}
