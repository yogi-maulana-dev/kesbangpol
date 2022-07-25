<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Models\Menudata;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\User;
use File;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Response;
use Illuminate\Support\Facades\DB;

class MenudataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.menudata', [
            'judul' => 'Halaman Data',
            'datas' => Upload::join('users', 'uploads.id_user', '=', 'users.id')->get(),
            'datacuk' => Upload::all(),
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
    public function update(Request $request, Menudata $menudata)
    {
        //

        // $request->validate([
        // 'a_surat_terdaftar_dikemenkumham' => 'required',
        // 'a_surat_pendaftaran' => 'required',
        // 'a_akte_pendirian' => 'required',
        // 'a_adrt' => 'required',
        // 'a_keabsahan_kantor' => 'required',
        // 'a_program' => 'required',
        // 'a_surat_keputusan' => 'required',
        // 'a_biodata_pengurus' => 'required',
        // 'a_ktp' => 'required',
        // 'a_foto' => 'required',
        // 'a_surat_keterangan_domisili' => 'required',
        // 'a_npwp' => 'required',
        // 'a_foto_kantor' => 'required',
        // 'a_surat_ketertiban' => 'required',
        // 'a_surat_tidak_avilasi' => 'required',
        // 'a_surat_konflik' => 'required',
        // 'a_surat_hak_cipta' => 'required',
        // 'a_biodata_pengurus' => 'required',
        // 'a_surat_absah' => 'required',
        // 'a_surat_rekom_agama' => 'required',
        // 'a_surat_laporan' => 'required',
        // 'a_surat_rekom_skpd' => 'required',
        // 'a_surat_rekom_skpd_kerja' => 'required',
        // 'a_surat_izasah' => 'required',
        // 'a_stlk' => 'required',
        // 'lengkap' => 'required',
        // 'ket' => 'required',
        // ]);

        // $menudata->update($request->all());

        // $datax=Menudata::find($menudata->id_user);

        // $datax->a_surat_terdaftar_dikemenkumham=$request->a_surat_terdaftar_dikemenkumham;
        // $datax->a_surat_pendaftaran=$request->a_surat_pendaftaran;
        // $datax->a_akte_pendirian=$request->a_akte_pendirian;
        // $datax->a_adrt=$request->a_adrt;
        // $datax->a_keabsahan_kantor=$request->a_keabsahan_kantor;
        // $datax->a_program=$request->a_program;
        // $datax->a_surat_keputusan=$request->a_surat_keputusan;
        // $datax->a_biodata_pengurus=$request->a_biodata_pengurus;
        // $datax->a_ktp=$request->a_ktp;
        // $datax->a_foto=$request->a_foto;
        // $datax->a_surat_keterangan_domisili=$request->a_surat_keterangan_domisili;
        // $datax->a_npwp=$request->a_npwp;
        // $datax->a_foto_kantor=$request->a_foto_kantor;
        // $datax->a_surat_ketertiban=$request->a_surat_ketertiban;
        // $datax->a_surat_tidak_avilasi=$request->a_surat_tidak_avilasi;
        // $datax->a_surat_konflik=$request->a_surat_konflik;
        // $datax->a_surat_hak_cipta=$request->a_surat_hak_cipta;
        // $datax->a_biodata_pengurus=$request->a_biodata_pengurus;
        // $datax->a_surat_absah=$request->a_surat_absah;
        // $datax->a_surat_rekom_agama=$request->a_surat_rekom_agama;
        // $datax->a_surat_laporan=$request->a_surat_laporan;
        // $datax->a_surat_absah=$request->a_surat_absah;
        // $datax->a_surat_rekom_agama=$request->a_surat_rekom_agama;
        // $datax->a_surat_rekom_skpd=$request->a_surat_rekom_skpd;
        // $datax->a_surat_rekom_skpd_kerja=$request->a_surat_rekom_skpd_kerja;
        // $datax->a_surat_izasah=$request->a_surat_izasah;
        // $datax->a_stlk=$request->a_stlk;
        // $datax->a_surat_rekom_kesediaan=$request->a_surat_rekom_kesediaan;
        // $datax->lengkap=$request->lengkap;
        // $datax['ket'] = $request->ket;
        // $datax->update();
        $lengkap = $request->a_surat_pendaftaran + $request->a_surat_keputusan + $request->a_adrt + $request->a_surat_kemenkumham + $request->a_akte_pendirian + $request->a_tujuan + $request->a_adrt + $request->a_biodata_pengurus + $request->a_program + $request->a_ktp + $request->a_foto + $request->a_surat_keterangan_domisili + $request->a_npwp + $request->a_foto_kantor + $request->a_surat_ketertiban + $request->a_surat_konflik + $request->a_surat_hak_cipta + $request->a_biodata_pengurus + $request->a_surat_absah + $request->a_surat_rekom_agama + $request->a_surat_rekom_skpd_kepercayaan + $request->a_surat_rekom_skpd_kerja + $request->a_surat_izasah + $request->a_stlk + $request->a_surat_rekom_kesediaan + $request->a_surat_laporan;

        $menudata = Upload::where('id', $request->id)->update([
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
        
        // dd($menudata);

        return redirect('/admin/menudata');
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

    public function downloadDSDA(Request $request, $id)
    {
        $book_cover = User::where('id', $id)->firstOrFail();
        $path = public_path() . '/' . $book_cover->email;
        return response()->download($path, $book_cover->original_filename, ['Content-Type' => $book_cover->mime]);
    }

    public function download(Request $request, $email)
    {
        $zip = new ZipArchive();

        $fileName = "$email.zip";

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === true) {
            $files = File::files(public_path($email));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    public function downloaddsaasd(Request $request, $email)
    {
        //  $dcmt = DB::table('uploads')->select(DB::raw(" max(id) as id"))->where('email',$email)->groupBy('type')->pluck('email');

        $files = User::whereIn('email', $email)->get();

        $url = url('') . '/' . $email . '/';

        // create new zip object
        $zip = new \ZipArchive();

        // store the public path
        $publicDir = public_path();

        // Define the file name. Give it a unique name to avoid overriding.
        $zipFileName = 'Documents.zip';

        // Create the ZIP file directly inside the desired folder. No need for a temporary file.
        if ($zip->open($publicDir . '/folder/' . $zipFileName, \ZipArchive::CREATE) === true) {
            // Loop through each file
            foreach ($files as $file) {
                $url2 = $url . $file->upload;
                $url2 = str_replace(' ', '%20', $url2);

                if (!function_exists('curl_init')) {
                    die('CURL is not installed!');
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url2);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
                curl_close($ch);
                $download_file = $output;

                $type = substr($url2, -5, 5);
                #add it to the zip
                $zip->addFromString(basename($url . $file->upload . '.' . $type), $download_file);
            }

            // close zip
            $zip->close();
        }

        // Download the file using the Filesystem API
        $filePath = $publicDir . '/folder/' . $zipFileName;

        if (file_exists($filePath)) {
            return Storage::download($filePath);
        }
    }
}
