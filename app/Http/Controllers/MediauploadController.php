<?php

namespace App\Http\Controllers;

use App\Models\Mediaupload;
use Illuminate\Http\Request;

class MediauploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $uploads = Mediaupload::all();
         return view('welcome', compact('uploads'));
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
          $file = $request->file('file-upload');
          $filename = $file->getClientOriginalName();
          $filename= time(). '.' . $filename;

          $path= $file->storeAs('public', $filename);

          Mediaupload::create([
          'filename' => $filename,
          ]);
          //$savedfile = Mediaupload::latest()->firstOrFail();
          $uploads = Mediaupload::all();
          return view('welcome')->with('uploads', $uploads);
          // return view('showuploads')->with('savedfile', $savedfile);  */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mediaupload  $mediaupload
     * @return \Illuminate\Http\Response
     */
    public function show(Mediaupload $mediaupload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mediaupload  $mediaupload
     * @return \Illuminate\Http\Response
     */
    public function edit(Mediaupload $mediaupload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mediaupload  $mediaupload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mediaupload $mediaupload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mediaupload  $mediaupload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mediaupload $mediaupload)
    {
        $data=Mediaupload::findOrFail($id);
        $data->delete();
    }
}
