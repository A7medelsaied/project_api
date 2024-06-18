<?php

namespace App\Http\Controllers;

use App\Models\myimage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('images', $fileName, 'public');
        $request->image_path = '/storage/'.$filePath;

        myimage::create(["image_path"=>$request->image_path,
    "user_id"=>$request->user_id]);
        return $request;
    }

    public function retrieveImage($id){
    $filename=myimage::where('user_id','=',$id)->get(['image_path']);
    return response()->json($filename);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
