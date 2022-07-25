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
        $tes = auth()->user()->email;
        // $anusurat_terdaftar_dikemenkumham = '/' . $tes . '/' . $data->surat_terdaftar_dikemenkumham;
        // $anusurat_pendaftaran = '/' . $tes . '/' . $data->surat_pendaftaran;
        // $anuakte_pendirian = '/' . $tes . '/' . $data->akte_pendirian;
        // $anuadrt = '/' . $tes . '/' . $data->adrt;
        // $anukeabsahan_kantor = '/' . $tes . '/' . $data->keabsahan_kantor;
        // $anutujuan = '/' . $tes . '/' . $data->tujuan;
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

        $validasi = $request->validate(
            [
                'surat_pendaftaran' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_pendaftaran',
                'akte_pendirian' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,akte_pendirian',
                'adrt' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,adrt',
                'keabsahan_kantor' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,keabsahan_kantor',
                'tujuan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,tujuan',
                'surat_keputusan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_keputusan',
                'biodata_pengurus' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,biodata_pengurus',
                'ktp' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,ktp',
                'foto' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,foto',
                'surat_keterangan_domisili' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_keterangan_domisili',
                'npwp' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,npwp',
                'foto_kantor' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,foto_kantor',
                'surat_memuat' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_memuat',
                'surat_rekom_agama' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,',
                'surat_rekom_skpd_kepercayaan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_rekom_skpd_kepercayaan',
                'surat_rekom_skpd_kerja' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_rekom_skpd_kerja',
                'surat_rekom_kesediaan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_rekom_kesediaan',
                'surat_izasah' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_izasah',
                'stlk' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,stlk',
                'surat_kemenkumham' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_kemenkumham',

                /**
                 * Show the form for creating a new resource.
                 * Whatapps 6289631031237
                 * email : yogimaulana100@gmail.com
                 * https://github.com/Ays1234
                 * https://serbaotodidak.com/
                 */
            ],
            // [
            //     'surat_terdaftar_dikemenkumham.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_pendaftaran.max' => 'Anda harus upload data max:1024 mb',
            //     'akte_pendirian.max' => 'Anda harus upload data max:1024 mb',
            //     'adrt.max' => 'Anda harus upload data max:1024 mb',
            //     'keabsahan_kantor.max' => 'Anda harus upload data max:1024 mb',
            //     'tujuan.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_keputusan.max' => 'Anda harus upload data max:1024 mb',
            //     'biodata_pengurus.max' => 'Anda harus upload data max:1024 mb',
            //     'ktp.max' => 'Anda harus upload data max:1024 mb',
            //     'foto.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_keterangan_domisili.max' => 'Anda harus upload data max:1024 mb',
            //     'npwp.max' => 'Anda harus upload data max:1024 mb',
            //     'foto_kantor.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_ketertiban.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_tidak_avilasi.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_konflik.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_hak_cipta.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_laporan.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_absah.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_rekom_agama.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_rekom_skpd.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_rekom_skpd_kerja.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_rekom_kesediaan.max' => 'Anda harus upload data max:1024 mb',
            //     'surat_izasah.max' => 'Anda harus upload data max:1024 mb',
            //     'skt.max' => 'Anda harus upload data max:1024 mb',
            // ],
        );

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

        $surat_rekom_agama = $request->file('surat_rekom_agama');
        $nama_dokumen16 = 'surat_rekom_agama' . date('Ymdhis') . '.' . $request->file('surat_rekom_agama')->getClientOriginalExtension();
        $surat_rekom_agama->move($tes . '/', $nama_dokumen16);

        $surat_rekom_skpd_kepercayaan = $request->file('surat_rekom_skpd_kepercayaan');
        $nama_dokumen17 = 'surat_rekom_skpd_kepercayaan' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd_kepercayaan')->getClientOriginalExtension();
        $surat_rekom_skpd_kepercayaan->move($tes . '/', $nama_dokumen17);

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

        $tujuan = $request->file('tujuan');
        $nama_dokumen23 = 'tujuan' . date('Ymdhis') . '.' . $request->file('tujuan')->getClientOriginalExtension();
        $tujuan->move($tes . '/', $nama_dokumen23);

        $keabsahan_kantor = $request->file('keabsahan_kantor');
        $nama_dokumen24 = 'keabsahan_kantor' . date('Ymdhis') . '.' . $request->file('keabsahan_kantor')->getClientOriginalExtension();
        $keabsahan_kantor->move($tes . '/', $nama_dokumen24);

        $validasi['surat_pendaftaran'] = $nama_dokumen1;
        $validasi['akte_pendirian'] = $nama_dokumen2;
        $validasi['adrt'] = $nama_dokumen3;
        $validasi['surat_keputusan'] = $nama_dokumen4;
        $validasi['biodata_pengurus'] = $nama_dokumen5;

        $validasi['ktp'] = $nama_dokumen6;
        $validasi['foto'] = $nama_dokumen7;

        $validasi['npwp'] = $nama_dokumen8;
        $validasi['foto_kantor'] = $nama_dokumen9;

        $validasi['surat_rekom_agama'] = $nama_dokumen16;
        $validasi['surat_rekom_skpd_kepercayaan'] = $nama_dokumen17;
        $validasi['surat_rekom_skpd_kerja'] = $nama_dokumen18;
        $validasi['surat_rekom_kesediaan'] = $nama_dokumen19;
        $validasi['surat_izasah'] = $nama_dokumen20;
        $validasi['skt'] = $nama_dokumen21;

        $validasi['surat_keterangan_domisili'] = $nama_dokumen22;
        $validasi['tujuan'] = $nama_dokumen23;
        $validasi['keabsahan_kantor'] = $nama_dokumen24;

        $validasi['id_user'] = auth()->user()->id;

        // Data::create($validasi);
        dd($validasi);

        //     dump($request->all()); // melihat data yang disubmit
        // $post = Post::create($request->all());
        // dump($post); // Melihat apakah model benar-benar berhasil dibuat.
        // $subscribers = User::subscribing($post->creator)->get();
        // dd($subscribers); // Melihat data yang diambil dan berhenti eksekusi.
        // Notification::send($subscribers, NewPostNotification($post));
        // return response()->json(['data' => $post]);

        // return redirect('/dashboard')->with('success', 'Berhasil di tambah data');

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
        $tes = auth()->user()->email;
        $anusurat_terdaftar_dikemenkumham = $tes . '/' . $data->gantisurat_terdaftar_dikemenkumham;
        dd($anusurat_terdaftar_dikemenkumham);
        // return $request->file('image')->store($tes);
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
