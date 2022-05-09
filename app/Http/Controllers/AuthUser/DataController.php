<?php

namespace App\Http\Controllers\AuthUser;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.data', ['judul' => 'Halaman Data', 'datas' => Upload::where('id_user', auth()->user()->id)->get()]);
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
        //
        $tes = auth()->user()->nama;
        // $anusurat_terdaftar_dikemenkumham = '/' . $tes . '/' . $data->surat_terdaftar_dikemenkumham;
        // $anusurat_pendaftaran = '/' . $tes . '/' . $data->surat_pendaftaran;
        // $anuakte_pendirian = '/' . $tes . '/' . $data->akte_pendirian;
        // $anuadrt = '/' . $tes . '/' . $data->adrt;
        // $anukeabsahan_kantor = '/' . $tes . '/' . $data->keabsahan_kantor;
        // $anuprogram = '/' . $tes . '/' . $data->program;
        // $anusurat_keputusan = '/' . $tes . '/' . $data->surat_keputusan;
        // $anubiodata_pengurus = '/' . $tes . '/' . $data->biodata_pengurus;
        // $anuktp = '/' . $tes . '/' . $data->ktp;
        // $anufoto = '/' . $tes . '/' . $data->foto;
        // $anusurat_keterangan_domisili = '/' . $tes . '/' . $data->surat_keterangan_domisili;
        // $anunpwp = '/' . $tes . '/' . $data->npwp;
        // $anufoto_kantor = '/' . $tes . '/' . $data->foto_kantor;
        // $anusurat_ketertiban = '/' . $tes . '/' . $data->surat_ketertiban;
        // $anusurat_tidak_avilasi = '/' . $tes . '/' . $data->surat_tidak_avilasi;
        // $anusurat_konflik = '/' . $tes . '/' . $data->surat_konflik;
        // $anusurat_hak_cipta = '/' . $tes . '/' . $data->surat_hak_cipta;
        // $anusurat_laporan = '/' . $tes . '/' . $data->surat_laporan;
        // $anusurat_absah = '/' . $tes . '/' . $data->surat_absah;
        // $anusurat_rekom_agama = '/' . $tes . '/' . $data->surat_rekom_agama;
        // $anusurat_rekom_skpd = '/' . $tes . '/' . $data->surat_rekom_skpd;
        // $anusurat_rekom_skpd_kerja = '/' . $tes . '/' . $data->surat_rekom_skpd_kerja;
        // $anusurat_rekom_kesediaan = '/' . $tes . '/' . $data->surat_rekom_kesediaan;
        // $anusurat_izasah = '/' . $tes . '/' . $data->surat_izasah;
        // $anuskt = '/' . $tes . '/' . $data->skt;
        // return $request->file('image')->store($tes);

        $validasi = $request->validate([
            'surat_terdaftar_dikemenkumham' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_pendaftaran' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'akte_pendirian' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'adrt' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'keabsahan_kantor' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'program' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_keputusan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'biodata_pengurus' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'ktp' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'foto' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_keterangan_domisili' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'npwp' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'foto_kantor' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_ketertiban' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_tidak_avilasi' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_konflik' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_hak_cipta' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_laporan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_absah' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_agama' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_skpd' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_skpd_kerja' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_kesediaan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_izasah' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'skt' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',

            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);

        $surat_pendaftaran = $request->file('surat_pendaftaran');
        $nama_dokumen1 = 'surat_pendaftaran' . date('Ymdhis') . '.' . $request->file('surat_pendaftaran')->getClientOriginalExtension();
        $surat_pendaftaran->move($tes . '/', $nama_dokumen1);

        $akte_pendirian = $request->file('akte_pendirian');
        $nama_dokumen2 = 'akte_pendirian' . date('Ymdhis') . '.' . $request->file('akte_pendirian')->getClientOriginalExtension();
        $akte_pendirian->move($tes . '/', $nama_dokumen2);

        $adrt = $request->file('adrt');
        $nama_dokumen3 = 'adrt' . date('Ymdhis') . '.' . $request->file('adrt')->getClientOriginalExtension();
        $adrt->move($tes . '/', $nama_dokumen3);

        $surat_keputusan = $request->file('surat_keputusan');
        $nama_dokumen4 = 'surat_keputusan' . date('Ymdhis') . '.' . $request->file('surat_keputusan')->getClientOriginalExtension();
        $surat_keputusan->move($tes . '/', $nama_dokumen4);

        $biodata_pengurus = $request->file('biodata_pengurus');
        $nama_dokumen5 = 'biodata_pengurus' . date('Ymdhis') . '.' . $request->file('biodata_pengurus')->getClientOriginalExtension();
        $biodata_pengurus->move($tes . '/', $nama_dokumen5);

        $KTP = $request->file('ktp');
        $nama_dokumen6 = 'KTP' . date('Ymdhis') . '.' . $request->file('ktp')->getClientOriginalExtension();
        $KTP->move($tes . '/', $nama_dokumen6);

        $foto = $request->file('foto');
        $nama_dokumen7 = 'foto' . date('Ymdhis') . '.' . $request->file('foto')->getClientOriginalExtension();
        $foto->move($tes . '/', $nama_dokumen7);

        $npwp = $request->file('npwp');
        $nama_dokumen8 = 'npwp' . date('Ymdhis') . '.' . $request->file('npwp')->getClientOriginalExtension();
        $npwp->move($tes . '/', $nama_dokumen8);

        $foto_kantor = $request->file('foto_kantor');
        $nama_dokumen9 = 'foto_kantor' . date('Ymdhis') . '.' . $request->file('foto_kantor')->getClientOriginalExtension();
        $foto_kantor->move($tes . '/', $nama_dokumen9);

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */

        $surat_ketertiban = $request->file('surat_ketertiban');
        $nama_dokumen10 = 'surat_ketertiban' . date('Ymdhis') . '.' . $request->file('surat_ketertiban')->getClientOriginalExtension();
        $surat_ketertiban->move($tes . '/', $nama_dokumen10);

        $surat_tidak_avilasi = $request->file('surat_tidak_avilasi');
        $nama_dokumen11 = 'surat_tidak_avilasi' . date('Ymdhis') . '.' . $request->file('surat_tidak_avilasi')->getClientOriginalExtension();
        $surat_tidak_avilasi->move($tes . '/', $nama_dokumen11);

        $surat_konflik = $request->file('surat_konflik');
        $nama_dokumen12 = 'surat_konflik' . date('Ymdhis') . '.' . $request->file('surat_konflik')->getClientOriginalExtension();
        $surat_konflik->move($tes . '/', $nama_dokumen12);

        $surat_hak_cipta = $request->file('surat_hak_cipta');
        $nama_dokumen13 = 'surat_hak_cipta' . date('Ymdhis') . '.' . $request->file('surat_hak_cipta')->getClientOriginalExtension();
        $surat_hak_cipta->move($tes . '/', $nama_dokumen13);

        $surat_laporan = $request->file('surat_laporan');
        $nama_dokumen14 = 'surat_laporan' . date('Ymdhis') . '.' . $request->file('surat_laporan')->getClientOriginalExtension();
        $surat_laporan->move($tes . '/', $nama_dokumen14);

        $surat_absah = $request->file('surat_absah');
        $nama_dokumen15 = 'surat_absah' . date('Ymdhis') . '.' . $request->file('surat_absah')->getClientOriginalExtension();
        $surat_absah->move($tes . '/', $nama_dokumen15);

        $surat_rekom_agama = $request->file('surat_rekom_agama');
        $nama_dokumen16 = 'surat_rekom_agama' . date('Ymdhis') . '.' . $request->file('surat_rekom_agama')->getClientOriginalExtension();
        $surat_rekom_agama->move($tes . '/', $nama_dokumen16);

        $surat_rekom_skpd = $request->file('surat_rekom_skpd');
        $nama_dokumen17 = 'surat_rekom_skpd' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd')->getClientOriginalExtension();
        $surat_rekom_skpd->move($tes . '/', $nama_dokumen17);

        $surat_rekom_skpd_kerja = $request->file('surat_rekom_skpd_kerja');
        $nama_dokumen18 = 'surat_rekom_skpd_kerja' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd_kerja')->getClientOriginalExtension();
        $surat_rekom_skpd_kerja->move($tes . '/', $nama_dokumen18);

        $surat_rekom_kesediaan = $request->file('surat_rekom_kesediaan');
        $nama_dokumen19 = 'surat_rekom_kesediaan' . date('Ymdhis') . '.' . $request->file('surat_rekom_kesediaan')->getClientOriginalExtension();
        $surat_rekom_kesediaan->move($tes . '/', $nama_dokumen19);

        $izasah = $request->file('surat_izasah');
        $nama_dokumen20 = 'surat_izasah' . date('Ymdhis') . '.' . $request->file('surat_izasah')->getClientOriginalExtension();
        $izasah->move($tes . '/', $nama_dokumen20);

        $skt = $request->file('skt');
        $nama_dokumen21 = 'skt' . date('Ymdhis') . '.' . $request->file('skt')->getClientOriginalExtension();
        $skt->move($tes . '/', $nama_dokumen21);

        $surat_keterangan_domisili = $request->file('surat_keterangan_domisili');
        $nama_dokumen22 = 'surat_keterangan_domisili' . date('Ymdhis') . '.' . $request->file('surat_keterangan_domisili')->getClientOriginalExtension();
        $surat_keterangan_domisili->move($tes . '/', $nama_dokumen22);

        $program = $request->file('program');
        $nama_dokumen23 = 'program' . date('Ymdhis') . '.' . $request->file('program')->getClientOriginalExtension();
        $program->move($tes . '/', $nama_dokumen23);

        $keabsahan_kantor = $request->file('keabsahan_kantor');
        $nama_dokumen24 = 'keabsahan_kantor' . date('Ymdhis') . '.' . $request->file('keabsahan_kantor')->getClientOriginalExtension();
        $keabsahan_kantor->move($tes . '/', $nama_dokumen24);

        $surat_terdaftar_dikemenkumham = $request->file('surat_terdaftar_dikemenkumham');
        $nama_dokumen25 = 'surat_terdaftar_dikemenkumham' . date('Ymdhis') . '.' . $request->file('surat_terdaftar_dikemenkumham')->getClientOriginalExtension();
        $surat_terdaftar_dikemenkumham->move($tes . '/', $nama_dokumen25);

        $validasi['surat_pendaftaran'] = $nama_dokumen1;
        $validasi['akte_pendirian'] = $nama_dokumen2;
        $validasi['adrt'] = $nama_dokumen3;
        $validasi['surat_keputusan'] = $nama_dokumen4;
        $validasi['biodata_pengurus'] = $nama_dokumen5;

        $validasi['ktp'] = $nama_dokumen6;
        $validasi['foto'] = $nama_dokumen7;

        $validasi['npwp'] = $nama_dokumen8;
        $validasi['foto_kantor'] = $nama_dokumen9;
        $validasi['surat_ketertiban'] = $nama_dokumen10;
        $validasi['surat_tidak_avilasi'] = $nama_dokumen11;
        $validasi['surat_konflik'] = $nama_dokumen12;
        $validasi['surat_hak_cipta'] = $nama_dokumen13;
        $validasi['surat_laporan'] = $nama_dokumen14;
        $validasi['surat_absah'] = $nama_dokumen15;
        $validasi['surat_rekom_agama'] = $nama_dokumen16;
        $validasi['surat_rekom_skpd'] = $nama_dokumen17;
        $validasi['surat_rekom_skpd_kerja'] = $nama_dokumen18;
        $validasi['surat_rekom_kesediaan'] = $nama_dokumen19;
        $validasi['surat_izasah'] = $nama_dokumen20;
        $validasi['skt'] = $nama_dokumen21;

        $validasi['surat_keterangan_domisili'] = $nama_dokumen22;
        $validasi['program'] = $nama_dokumen23;
        $validasi['keabsahan_kantor'] = $nama_dokumen24;
        $validasi['surat_terdaftar_dikemenkumham'] = $nama_dokumen25;
        $validasi['id_user'] = auth()->user()->id;

        Data::create($validasi);

        //     dump($request->all()); // melihat data yang disubmit
        // $post = Post::create($request->all());
        // dump($post); // Melihat apakah model benar-benar berhasil dibuat.
        // $subscribers = User::subscribing($post->creator)->get();
        // dd($subscribers); // Melihat data yang diambil dan berhenti eksekusi.
        // Notification::send($subscribers, NewPostNotification($post));
        // return response()->json(['data' => $post]);

        return redirect('/dashboard')->with('success', 'Berhasil di tambah data');

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
        return view('user.edit', ['judul' => 'Halaman Edit Data', 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //

        //
        //
        $tes = auth()->user()->nama;
        $anusurat_terdaftar_dikemenkumham = $tes . '/' . $data->surat_terdaftar_dikemenkumham;
        $anusurat_pendaftaran = $tes . '/' . $data->surat_pendaftaran;
        $anuakte_pendirian = $tes . '/' . $data->akte_pendirian;
        $anuadrt = $tes . '/' . $data->adrt;
        $anukeabsahan_kantor = $tes . '/' . $data->keabsahan_kantor;
        $anuprogram = $tes . '/' . $data->program;
        $anusurat_keputusan = $tes . '/' . $data->surat_keputusan;
        $anubiodata_pengurus = $tes . '/' . $data->biodata_pengurus;
        $anuktp = $tes . '/' . $data->ktp;
        $anufoto = $tes . '/' . $data->foto;
        $anusurat_keterangan_domisili = $tes . '/' . $data->surat_keterangan_domisili;
        $anunpwp = $tes . '/' . $data->npwp;
        $anufoto_kantor = $tes . '/' . $data->foto_kantor;
        $anusurat_ketertiban = $tes . '/' . $data->surat_ketertiban;
        $anusurat_tidak_avilasi = $tes . '/' . $data->surat_tidak_avilasi;
        $anusurat_konflik = $tes . '/' . $data->surat_konflik;
        $anusurat_hak_cipta = $tes . '/' . $data->surat_hak_cipta;
        $anusurat_laporan = $tes . '/' . $data->surat_laporan;
        $anusurat_absah = $tes . '/' . $data->surat_absah;
        $anusurat_rekom_agama = $tes . '/' . $data->surat_rekom_agama;
        $anusurat_rekom_skpd = $tes . '/' . $data->surat_rekom_skpd;
        $anusurat_rekom_skpd_kerja = $tes . '/' . $data->surat_rekom_skpd_kerja;
        $anusurat_rekom_kesediaan = $tes . '/' . $data->surat_rekom_kesediaan;
        $anusurat_izasah = $tes . '/' . $data->surat_izasah;
        $anuskt = $tes . '/' . $data->skt;
        // return $request->file('image')->store($tes);

        $validasi = $request->validate([
            'surat_terdaftar_dikemenkumham' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_pendaftaran' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'akte_pendirian' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'adrt' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'keabsahan_kantor' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'program' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_keputusan' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'biodata_pengurus' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'ktp' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'foto' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_keterangan_domisili' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'npwp' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'foto_kantor' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_ketertiban' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_tidak_avilasi' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_konflik' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_hak_cipta' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_laporan' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_absah' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_agama' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_skpd' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_skpd_kerja' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_rekom_kesediaan' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_izasah' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'skt' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',

            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);

        if ($request->hasFile('surat_terdaftar_dikemenkumham')) {
            // cek jika ada
            if (File::exists($anusurat_terdaftar_dikemenkumham)) {
                File::delete($anusurat_terdaftar_dikemenkumham);
            }

            $surat_terdaftar_dikemenkumham = $request->file('surat_terdaftar_dikemenkumham');
            $nama_dokumen25 = 'surat_terdaftar_dikemenkumham' . date('Ymdhis') . '.' . $request->file('surat_terdaftar_dikemenkumham')->getClientOriginalExtension();
            $surat_terdaftar_dikemenkumham->move($tes . '/', $nama_dokumen25);
            $validasi['surat_terdaftar_dikemenkumham'] = $nama_dokumen25;
        }

        if ($request->hasFile('surat_pendaftaran')) {
            // cek jika ada
            if (File::exists($anusurat_pendaftaran)) {
                File::delete($anusurat_pendaftaran);
            }

            $surat_pendaftaran = $request->file('surat_pendaftaran');
            $nama_dokumen1 = 'surat_pendaftaran' . date('Ymdhis') . '.' . $request->file('surat_pendaftaran')->getClientOriginalExtension();
            $surat_pendaftaran->move($tes . '/', $nama_dokumen1);
            $validasi['surat_pendaftaran'] = $nama_dokumen1;
        }

        if ($request->hasFile('akte_pendirian')) {
            // cek jika ada
            if (File::exists($anuakte_pendirian)) {
                File::delete($anuakte_pendirian);
            }

            $akte_pendirian = $request->file('akte_pendirian');

            $nama_dokumen2 = 'akte_pendirian' . date('Ymdhis') . '.' . $request->file('akte_pendirian')->getClientOriginalExtension();
            $akte_pendirian->move($tes . '/', $nama_dokumen2);

            $validasi['akte_pendirian'] = $nama_dokumen2;
        }

        if ($request->hasFile('adrt')) {
            // cek jika ada
            if (File::exists($anuadrt)) {
                File::delete($anuadrt);
            }

            $adrt = $request->file('adrt');

            $nama_dokumen3 = 'adrt' . date('Ymdhis') . '.' . $request->file('adrt')->getClientOriginalExtension();
            $adrt->move($tes . '/', $nama_dokumen3);

            $validasi['adrt'] = $nama_dokumen3;
        }

        if ($request->hasFile('surat_keputusan')) {
            // cek jika ada
            if (File::exists($anusurat_keputusan)) {
                File::delete($anusurat_keputusan);
            }

            $nama_dokumen4 = 'surat_keputusan' . date('Ymdhis') . '.' . $request->file('surat_keputusan')->getClientOriginalExtension();
            $surat_keputusan->move($tes . '/', $nama_dokumen4);
            $validasi['surat_keputusan'] = $nama_dokumen4;
        }

        if ($request->hasFile('biodata_pengurus')) {
            // cek jika ada
            if (File::exists($anubiodata_pengurus)) {
                File::delete($anubiodata_pengurus);
            }

            $biodata_pengurus = $request->file('biodata_pengurus');

            $nama_dokumen5 = 'biodata_pengurus' . date('Ymdhis') . '.' . $request->file('biodata_pengurus')->getClientOriginalExtension();
            $biodata_pengurus->move($tes . '/', $nama_dokumen5);

            $validasi['biodata_pengurus'] = $nama_dokumen5;

            /** biodata_pengurus
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('ktp')) {
            // cek jika ada
            if (File::exists($anuktp)) {
                File::delete($anuktp);
            }
            $KTP = $request->file('ktp');
            $nama_dokumen6 = 'KTP' . date('Ymdhis') . '.' . $request->file('ktp')->getClientOriginalExtension();
            $KTP->move($tes . '/', $nama_dokumen6);
            $validasi['ktp'] = $nama_dokumen6;
            /** ktp
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('foto')) {
            if (File::exists($anufoto)) {
                File::delete($anufoto);
            }

            $foto = $request->file('foto');
            $nama_dokumen7 = 'foto' . date('Ymdhis') . '.' . $request->file('foto')->getClientOriginalExtension();
            $foto->move($tes . '/', $nama_dokumen7);
            $validasi['foto'] = $nama_dokumen7;
            /** foto
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('npwp')) {
            if (File::exists($anunpwp)) {
                File::delete($anunpwp);
            }

            $npwp = $request->file('npwp');
            $nama_dokumen8 = 'npwp' . date('Ymdhis') . '.' . $request->file('npwp')->getClientOriginalExtension();
            $npwp->move($tes . '/', $nama_dokumen8);
            $validasi['npwp'] = $nama_dokumen8;
            /** npwp
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('foto_kantor')) {
            if (File::exists($anufoto_kantor)) {
                File::delete($anufoto_kantor);
            }

            $foto_kantor = $request->file('foto_kantor');
            $nama_dokumen9 = 'foto_kantor' . date('Ymdhis') . '.' . $request->file('foto_kantor')->getClientOriginalExtension();
            $foto_kantor->move($tes . '/', $nama_dokumen9);
            $validasi['foto_kantor'] = $nama_dokumen9;
            /** foto_kantor
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_ketertiban')) {
            if (File::exists($anusurat_ketertiban)) {
                File::delete($anusurat_ketertiban);
            }

            $surat_ketertiban = $request->file('surat_ketertiban');
            $nama_dokumen10 = 'surat_ketertiban' . date('Ymdhis') . '.' . $request->file('surat_ketertiban')->getClientOriginalExtension();
            $surat_ketertiban->move($tes . '/', $nama_dokumen10);
            $validasi['surat_ketertiban'] = $nama_dokumen10;
            /** surat_ketertiban
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */

        if ($request->hasFile('surat_tidak_avilasi')) {
            if (File::exists($anusurat_tidak_avilasi)) {
                File::delete($anusurat_tidak_avilasi);
            }

            $surat_tidak_avilasi = $request->file('surat_tidak_avilasi');
            $nama_dokumen11 = 'surat_tidak_avilasi' . date('Ymdhis') . '.' . $request->file('surat_tidak_avilasi')->getClientOriginalExtension();
            $surat_tidak_avilasi->move($tes . '/', $nama_dokumen11);
            $validasi['surat_tidak_avilasi'] = $nama_dokumen11;
            /** surat_tidak_avilasi
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_konflik')) {
            if (File::exists($anusurat_konflik)) {
                File::delete($anusurat_konflik);
            }

            $surat_konflik = $request->file('surat_konflik');
            $nama_dokumen12 = 'surat_konflik' . date('Ymdhis') . '.' . $request->file('surat_konflik')->getClientOriginalExtension();
            $surat_konflik->move($tes . '/', $nama_dokumen12);
            $validasi['surat_konflik'] = $nama_dokumen12;
            /** surat_konflik
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_hak_cipta')) {
            if (File::exists($anusurat_hak_cipta)) {
                File::delete($anusurat_hak_cipta);
            }

            $surat_hak_cipta = $request->file('surat_hak_cipta');
            $nama_dokumen13 = 'surat_hak_cipta' . date('Ymdhis') . '.' . $request->file('surat_hak_cipta')->getClientOriginalExtension();
            $surat_hak_cipta->move($tes . '/', $nama_dokumen13);
            $validasi['surat_hak_cipta'] = $nama_dokumen13;
            /** surat_hak_cipta
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_laporan')) {
            if (File::exists($anusurat_laporan)) {
                File::delete($anusurat_laporan);
            }

            $surat_laporan = $request->file('surat_laporan');
            $nama_dokumen14 = 'surat_laporan' . date('Ymdhis') . '.' . $request->file('surat_laporan')->getClientOriginalExtension();
            $surat_laporan->move($tes . '/', $nama_dokumen14);
            $validasi['surat_laporan'] = $nama_dokumen14;
            /** surat_laporan
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_absah')) {
            if (File::exists($anusurat_absah)) {
                File::delete($anusurat_absah);
            }

            $surat_absah = $request->file('surat_absah');
            $nama_dokumen15 = 'surat_absah' . date('Ymdhis') . '.' . $request->file('surat_absah')->getClientOriginalExtension();
            $surat_absah->move($tes . '/', $nama_dokumen15);
            $validasi['surat_absah'] = $nama_dokumen15;
            /** surat_absah
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_rekom_agama')) {
            if (File::exists($anusurat_rekom_agama)) {
                File::delete($anusurat_rekom_agama);
            }

            $surat_rekom_agama = $request->file('surat_rekom_agama');
            $nama_dokumen16 = 'surat_rekom_agama' . date('Ymdhis') . '.' . $request->file('surat_rekom_agama')->getClientOriginalExtension();
            $surat_rekom_agama->move($tes . '/', $nama_dokumen16);
            $validasi['surat_rekom_agama'] = $nama_dokumen16;
            /** surat_rekom_agama
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_rekom_skpd')) {
            if (File::exists($anusurat_rekom_skpd)) {
                File::delete($anusurat_rekom_skpd);
            }

            $surat_rekom_skpd = $request->file('surat_rekom_skpd');
            $nama_dokumen17 = 'surat_rekom_skpd' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd')->getClientOriginalExtension();
            $surat_rekom_skpd->move($tes . '/', $nama_dokumen17);
            $validasi['surat_rekom_skpd'] = $nama_dokumen17;
            /** surat_rekom_skpd
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_rekom_skpd_kerja')) {
            if (File::exists($anusurat_rekom_skpd_kerja)) {
                File::delete($anusurat_rekom_skpd_kerja);
            }

            $surat_rekom_skpd = $request->file('surat_rekom_skpd_kerja');
            $nama_dokumen18 = 'surat_rekom_skpd_kerja' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd_kerja')->getClientOriginalExtension();
            $surat_rekom_skpd->move($tes . '/', $nama_dokumen18);
            $validasi['surat_rekom_skpd_kerja'] = $nama_dokumen18;
            /** surat_rekom_skpd_kerja
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_rekom_kesediaan')) {
            if (File::exists($anusurat_rekom_kesediaan)) {
                File::delete($anusurat_rekom_kesediaan);
            }

            $surat_rekom_kesediaan = $request->file('surat_rekom_kesediaan');
            $nama_dokumen19 = 'surat_rekom_kesediaan' . date('Ymdhis') . '.' . $request->file('surat_rekom_kesediaan')->getClientOriginalExtension();
            $surat_rekom_kesediaan->move($tes . '/', $nama_dokumen19);
            $validasi['surat_rekom_kesediaan'] = $nama_dokumen19;
            /** surat_rekom_kesediaan
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_izasah')) {
            if (File::exists($anusurat_izasah)) {
                File::delete($anusurat_izasah);
            }

            $izasah = $request->file('surat_izasah');
            $nama_dokumen20 = 'surat_izasah' . date('Ymdhis') . '.' . $request->file('surat_izasah')->getClientOriginalExtension();
            $izasah->move($tes . '/', $nama_dokumen20);
            $validasi['surat_izasah'] = $nama_dokumen20;
            /** surat_izasah
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('skt')) {
            if (File::exists($anuskt)) {
                File::delete($anuskt);
            }

            $skt = $request->file('skt');
            $nama_dokumen21 = 'skt' . date('Ymdhis') . '.' . $request->file('skt')->getClientOriginalExtension();
            $skt->move($tes . '/', $nama_dokumen21);
            $validasi['skt'] = $nama_dokumen21;
            /** skt
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_keterangan_domisili')) {
            if (File::exists($anusurat_keterangan_domisili)) {
                File::delete($anusurat_keterangan_domisili);
            }

            $surat_keterangan_domisili = $request->file('surat_keterangan_domisili');
            $nama_dokumen22 = 'surat_keterangan_domisili' . date('Ymdhis') . '.' . $request->file('surat_keterangan_domisili')->getClientOriginalExtension();
            $surat_keterangan_domisili->move($tes . '/', $nama_dokumen22);
            $validasi['surat_keterangan_domisili'] = $nama_dokumen22;
            /** surat_keterangan_domisili
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('program')) {
            if (File::exists($anuprogram)) {
                File::delete($anuprogram);
            }

            $program = $request->file('program');
            $nama_dokumen23 = 'program' . date('Ymdhis') . '.' . $request->file('program')->getClientOriginalExtension();
            $program->move($tes . '/', $nama_dokumen23);
            $validasi['program'] = $nama_dokumen23;
            /** program
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('keabsahan_kantor')) {
            if (File::exists($anukeabsahan_kantor)) {
                File::delete($anukeabsahan_kantor);
            }

            $keabsahan_kantor = $request->file('keabsahan_kantor');
            $nama_dokumen24 = 'keabsahan_kantor' . date('Ymdhis') . '.' . $request->file('keabsahan_kantor')->getClientOriginalExtension();
            $keabsahan_kantor->move($tes . '/', $nama_dokumen24);
            $validasi['keabsahan_kantor'] = $nama_dokumen24;
            /** keabsahan_kantor
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        //   $validasi['surat_terdaftar_dikemenkumham'] = $anusurat_terdaftar_dikemenkumham;
        // $validasi['akte_pendirian'] = $nama_dokumen2;
        // $validasi['adrt'] = $nama_dokumen3;
        // $validasi['surat_keputusan'] = $nama_dokumen4;
        // $validasi['biodata_pengurus'] = $nama_dokumen5;

        // $validasi['ktp'] = $nama_dokumen6;
        // $validasi['foto'] = $nama_dokumen7;

        // $validasi['npwp'] = $nama_dokumen8;
        // $validasi['foto_kantor'] = $nama_dokumen9;
        // $validasi['surat_ketertiban'] = $nama_dokumen10;
        // $validasi['surat_tidak_avilasi'] = $nama_dokumen11;
        // $validasi['surat_konflik'] = $nama_dokumen12;
        // $validasi['surat_hak_cipta'] = $nama_dokumen13;
        // $validasi['surat_laporan'] = $nama_dokumen14;
        // $validasi['surat_absah'] = $nama_dokumen15;
        // $validasi['surat_rekom_agama'] = $nama_dokumen16;
        // $validasi['surat_rekom_skpd'] = $nama_dokumen17;
        // $validasi['surat_rekom_skpd_kerja'] = $nama_dokumen18;
        // $validasi['surat_rekom_kesediaan'] = $nama_dokumen19;
        // $validasi['surat_izasah'] = $nama_dokumen20;
        // $validasi['skt'] = $nama_dokumen21;

        // $validasi['surat_keterangan_domisili'] = $nama_dokumen22;
        // $validasi['program'] = $nama_dokumen23;
        // $validasi['keabsahan_kantor'] = $nama_dokumen24;
        // $validasi['surat_terdaftar_dikemenkumham'] = $nama_dokumen25;
        $validasi['id_user'] = auth()->user()->id;

        Data::where('id', $data->id)->update($validasi);
        return redirect('/dashboard')->with('success', 'Berhasil di Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
}
