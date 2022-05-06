<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Berita;
use App\Models\Categori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Support\Facades\Storage;


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
        return view('admin.berita', ['judul' => 'Halaman Berita Admin', 'beritas' => Berita::all(), 'categoris' => Categori::all()]);
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
        $validasi = $request->validate([
            'categori_id' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'body' => 'required',
            'gambar' => 'required',
        ]);

        $gambar = $request->file('gambar');
        $nama_dokumen1 = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $gambar->move('gambarberita/', $nama_dokumen1);

        $validasi['excerpt'] = Str::limit(strip_tags($request->body, 200));
        $validasi['gambar'] = $nama_dokumen1;
        Berita::create($validasi);

        return redirect('/admin/berita')->with('success', 'Berhasil data berita dimasukan');
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
    public function update(Request $request, Berita $berita)
    {
        //

        $anugambar = 'gambarberita/' . $request->filegambar;

  if($request->file('gambar') == "") {

    $berita = Berita::where('id', $request->berita)
    ->update([
    'title' => $request->title,
    'slug' => $request->slug,
    'body' => $request->body,
    'excerpt'=> Str::limit(strip_tags($request->body, 200)),
    ]);


  } else {
  //hapus old image


       if(File::exists($anugambar)){
       File::delete($anugambar);

       }

        $gambar = $request->file('gambar');
        $nama_dokumen1 = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $gambar->move('gambarberita/', $nama_dokumen1);

     $berita = Berita::where('id', $request->berita)
     ->update([
     'title' => $request->title,
     'slug' => $request->slug,
     'body' => $request->body,
     'excerpt'=> Str::limit(strip_tags($request->body, 200)),
     'gambar' => $nama_dokumen1,
     ]);
  }


        return redirect('/admin/berita')->with('success', 'Berhasil di Update data');
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

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
