<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Models\Menudata;
use Illuminate\Http\Request;
use App\Models\Pembaruan;
use App\Models\User;
use File;
use ZipArchive;
use Illuminate\Routing\Controller;

class PembaruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.pembaruan', [
            'judul' => 'Halaman pembaruan',
            'pembaruans' => pembaruan::join('users', 'pembaruan.id_user', '=', 'users.id')->get(),
            'datapembaruan' => pembaruan::all(),
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
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function show(Menudata $menudata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function edit(Menudata $menudata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembaruan $pembaruan)
    {
        $lengkap = $request->a_surat_domisili + $request->a_sk_pengurusan + $request->a_foto_ketua + $request->a_npwp + $request->a_surat_stlk + $request->a_adart;

        $pembaruan = pembaruan::where('id', $request->id)->update([
            'a_sk_pengurusan' => $request->a_sk_pengurusan,
            'a_foto_ketua' => $request->a_foto_ketua,
            'a_npwp' => $request->a_npwp,
            'a_surat_stlk' => $request->a_surat_stlk,
            'a_adart' => $request->a_adart,
            'a_surat_domisili' => $request->a_surat_domisili,
            'ket' => $request->ket,
            'lengkap' => $lengkap,
        ]);

        return redirect('/admin/pembaruan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menudata $menudata)
    {
        //
    }

    public function download(Request $request, $email)
    {
        $zip = new ZipArchive();

        $fileName = "$email-pembaruan.zip";

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === true) {
            $files = File::files(public_path($email . '/pembaruan/'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}
