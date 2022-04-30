<?php

namespace App\Http\Controllers\AuthAdmin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Berita;
use Image;



class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          return view('admin.berita', ["judul" => "Halaman Berita Admin",
           'beritas' => Berita::all()
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function uploadimage(Request $request)
     {
     //
   if($request->hasFile('upload')) {
   //get filename with extension
   $filenamewithextension = $request->file('upload')->getClientOriginalName();

   //get filename without extension
   $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

   //get file extension
   $extension = $request->file('upload')->getClientOriginalExtension();

   //filename to store
   $filenametostore = $filename.'_'.time().'.'.$extension;

   //Upload File
   $request->file('upload')->storeAs('public/uploads', $filenametostore);
   $request->file('upload')->storeAs('public/uploads/thumbnail', $filenametostore);

   //Resize image here
   $thumbnailpath = public_path('storage/uploads/thumbnail/'.$filenametostore);
   $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
   $constraint->aspectRatio();
   });
   $img->save($thumbnailpath);

   echo json_encode([
   'default' => asset('storage/uploads/'.$filenametostore),
   '500' => asset('storage/uploads/thumbnail/'.$filenametostore)
   ]);
   }

}

}
