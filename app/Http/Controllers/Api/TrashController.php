<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $result = Email::onlyTrashed();

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
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
//    public function show()
//     {
//        $result = Email::onlyTrashed()->get();
//        dd($result);
//        return response()->json([
//            'status' => true,
//            'emails' => $result
//        ]);
//
//    }

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
    public function destroy(): \Illuminate\Http\JsonResponse
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
