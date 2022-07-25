<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Models\Menudata;
use Illuminate\Http\Request;
use App\Models\Perpanjang;
use App\Models\User;
use File;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Response;
use Illuminate\Support\Facades\DB;

class PerpanjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.perpanjang', [
            'judul' => 'Halaman Perpanjang',
            'perpanjangs' => Perpanjang::join('users', 'perpanjangan.id_user', '=', 'users.id')->get(),
            'dataperpanjang' => Perpanjang::all(),
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
    public function update(Request $request, Perpanjang $perpanjang)
    {
        $lengkap = $request->a_surat_pendaftaran + $request->a_surat_keputusan + $request->a_adrt + $request->a_surat_kemenkumham + $request->a_akte_pendirian + $request->a_tujuan + $request->a_adrt + $request->a_biodata_pengurus + $request->a_program + $request->a_ktp + $request->a_foto + $request->a_surat_keterangan_domisili + $request->a_npwp + $request->a_foto_kantor + $request->a_surat_ketertiban + $request->a_surat_konflik + $request->a_surat_hak_cipta + $request->a_biodata_pengurus + $request->a_surat_absah + $request->a_surat_rekom_agama + $request->a_surat_rekom_skpd_kepercayaan + $request->a_surat_rekom_skpd_kerja + $request->a_surat_izasah + $request->a_stlk + $request->a_surat_rekom_kesediaan + $request->a_surat_laporan;

        $menudata = Perpanjang::where('id', $request->id)->update([
            'a_surat_kemenkumham' => $request->a_surat_kemenkumham,
            'a_surat_pendaftaran' => $request->a_surat_pendaftaran,
            'a_akte_pendirian' => $request->a_akte_pendirian,
            'a_adrt' => $request->a_adrt,
            'a_keabsahan_kantor' => $request->a_keabsahan_kantor,
            'a_tujuan' => $request->a_tujuan,
            'a_surat_keputusan' => $request->a_surat_keputusan,
            'a_biodata_pengurus' => $request->a_biodata_pengurus,
            'a_ktp' => $request->a_ktp,
            'a_foto' => $request->a_foto,
            'a_surat_keterangan_domisili' => $request->a_surat_keterangan_domisili,
            'a_npwp' => $request->a_npwp,
            'a_foto_kantor' => $request->a_foto_kantor,
            'a_surat_rekom_agama' => $request->a_surat_rekom_agama,
            'a_surat_rekom_skpd_kepercayaan' => $request->a_surat_rekom_skpd_kepercayaan,
            'a_surat_rekom_skpd_kerja' => $request->a_surat_rekom_skpd_kerja,
            'a_surat_izasah' => $request->a_surat_izasah,
            'a_stlk' => $request->a_stlk,
            'a_surat_rekom_kesediaan' => $request->a_surat_rekom_kesediaan,
            'a_surat_memuat' => $request->a_surat_memuat,
            // 'lengkap' => $request->lengkap,
            'ket' => $request->ket,
            'lengkap' => $lengkap,
        ]);

        return redirect('/admin/perpanjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perpanjang $perpanjang)
    {
        //
    }

    public function download(Request $request, $email)
    {
        $zip = new ZipArchive();
        // $tes . '/', $nama_dokumen2
        // $fileName = "$email.zip";
        $fileName = "$email-perpanjangan.zip";

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === true) {
            $files = File::files(public_path($email . '/perpanjangan/'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}
