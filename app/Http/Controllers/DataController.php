<?php

  /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
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

       return view('user.data', ["judul" => "Halaman Data",
       'datas' => Upload::where('id_user', auth()->user()->id)->get()

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
       $tes = auth()->user()->nama;
       // return $request->file('image')->store($tes);


    $validasi = $request->validate(
        [
            'surat_pendaftaran' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'akte_pendirian' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'adrt' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'tujuan' => 'required',
            'program' => 'required',
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
            'skt' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024'

             /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */

        ]
        );


        
           $surat_pendaftaran = $request->file('surat_pendaftaran');
        $nama_dokumen1 = 'surat_pendaftaran'.date('Ymdhis').'.'.$request->file('surat_pendaftaran')->getClientOriginalExtension();
        $surat_pendaftaran->move($tes.'/',$nama_dokumen1);

          $akte_pendirian = $request->file('akte_pendirian');
        $nama_dokumen2 = 'akte_pendirian'.date('Ymdhis').'.'.$request->file('akte_pendirian')->getClientOriginalExtension();
        $akte_pendirian->move($tes.'/',$nama_dokumen2);


        $adrt = $request->file('adrt');
        $nama_dokumen3 = 'adrt'.date('Ymdhis').'.'.$request->file('adrt')->getClientOriginalExtension();
        $adrt->move($tes.'/',$nama_dokumen3);


        $surat_keputusan = $request->file('surat_keputusan');
        $nama_dokumen4 = 'surat_keputusan'.date('Ymdhis').'.'.$request->file('surat_keputusan')->getClientOriginalExtension();
        $surat_keputusan->move($tes.'/',$nama_dokumen4);

        $biodata_pengurus = $request->file('biodata_pengurus');
        $nama_dokumen5 = 'biodata_pengurus'.date('Ymdhis').'.'.$request->file('biodata_pengurus')->getClientOriginalExtension();
        $biodata_pengurus->move($tes.'/',$nama_dokumen5);

        $KTP = $request->file('ktp');
        $nama_dokumen6 = 'KTP'.date('Ymdhis').'.'.$request->file('ktp')->getClientOriginalExtension();
        $KTP->move($tes.'/',$nama_dokumen6);

               $foto = $request->file('foto');
        $nama_dokumen7 = 'foto'.date('Ymdhis').'.'.$request->file('foto')->getClientOriginalExtension();
        $foto->move($tes.'/',$nama_dokumen7);

               $npwp = $request->file('npwp');
        $nama_dokumen8 = 'npwp'.date('Ymdhis').'.'.$request->file('npwp')->getClientOriginalExtension();
        $npwp->move($tes.'/',$nama_dokumen8);


               $foto_kantor = $request->file('foto_kantor');
        $nama_dokumen9 = 'foto_kantor'.date('Ymdhis').'.'.$request->file('foto_kantor')->getClientOriginalExtension();
        $foto_kantor->move($tes.'/',$nama_dokumen9);

         /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */



               $surat_ketertiban = $request->file('surat_ketertiban');
        $nama_dokumen10 = 'surat_ketertiban'.date('Ymdhis').'.'.$request->file('surat_ketertiban')->getClientOriginalExtension();
        $surat_ketertiban->move($tes.'/',$nama_dokumen10);


               $surat_tidak_avilasi = $request->file('surat_tidak_avilasi');
        $nama_dokumen11 = 'surat_tidak_avilasi'.date('Ymdhis').'.'.$request->file('surat_tidak_avilasi')->getClientOriginalExtension();
        $surat_tidak_avilasi->move($tes.'/',$nama_dokumen11);

          $surat_konflik = $request->file('surat_konflik');
        $nama_dokumen12 = 'surat_konflik'.date('Ymdhis').'.'.$request->file('surat_konflik')->getClientOriginalExtension();
        $surat_konflik->move($tes.'/',$nama_dokumen12);

          $surat_hak_cipta = $request->file('surat_hak_cipta');
        $nama_dokumen13 = 'surat_hak_cipta'.date('Ymdhis').'.'.$request->file('surat_hak_cipta')->getClientOriginalExtension();
        $surat_hak_cipta->move($tes.'/',$nama_dokumen13);


          $surat_laporan = $request->file('surat_laporan');
        $nama_dokumen14 = 'surat_laporan'.date('Ymdhis').'.'.$request->file('surat_laporan')->getClientOriginalExtension();
        $surat_laporan->move($tes.'/',$nama_dokumen14);


          $surat_absah = $request->file('surat_absah');
        $nama_dokumen15 = 'surat_absah'.date('Ymdhis').'.'.$request->file('surat_absah')->getClientOriginalExtension();
        $surat_absah->move($tes.'/',$nama_dokumen15);


          $surat_rekom_agama = $request->file('surat_rekom_agama');
        $nama_dokumen16 = 'surat_rekom_agama'.date('Ymdhis').'.'.$request->file('surat_rekom_agama')->getClientOriginalExtension();
        $surat_rekom_agama->move($tes.'/',$nama_dokumen16);

           $surat_rekom_skpd = $request->file('surat_rekom_skpd');
        $nama_dokumen17 = 'surat_rekom_skpd'.date('Ymdhis').'.'.$request->file('surat_rekom_skpd')->getClientOriginalExtension();
        $surat_rekom_skpd->move($tes.'/',$nama_dokumen17);

          $surat_rekom_skpd = $request->file('surat_rekom_skpd_kerja');
        $nama_dokumen18 = 'surat_rekom_skpd_kerja'.date('Ymdhis').'.'.$request->file('surat_rekom_skpd_kerja')->getClientOriginalExtension();
        $surat_rekom_skpd->move($tes.'/',$nama_dokumen18);

           $surat_rekom_kesediaan = $request->file('surat_rekom_kesediaan');
        $nama_dokumen19 = 'surat_rekom_kesediaan'.date('Ymdhis').'.'.$request->file('surat_rekom_kesediaan')->getClientOriginalExtension();
        $surat_rekom_kesediaan->move($tes.'/',$nama_dokumen19);

           $izasah = $request->file('surat_izasah');
        $nama_dokumen20 = 'surat_izasah'.date('Ymdhis').'.'.$request->file('surat_izasah')->getClientOriginalExtension();
        $izasah->move($tes.'/',$nama_dokumen20);

           $skt = $request->file('skt');
        $nama_dokumen21 = 'skt'.date('Ymdhis').'.'.$request->file('skt')->getClientOriginalExtension();
        $skt->move($tes.'/',$nama_dokumen21);


        $validasi['surat_pendaftaran'] = $nama_dokumen1;
        $validasi['akte_pendirian'] = $nama_dokumen2;
        $validasi['adrt'] = $nama_dokumen3;
        $validasi['surat_keputusan'] = $nama_dokumen4;
        $validasi['biodata_pengurus'] = $nama_dokumen5;
        $validasi['KTP'] = $nama_dokumen6;
        $validasi['foto'] = $nama_dokumen7;
        $validasi['npwp'] = $nama_dokumen8;
        $validasi['foto_kantor'] = $nama_dokumen9;
        $validasi['surat_keterangan_ketertiban'] = $nama_dokumen10;
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
        $validasi['id_user'] = auth()->user()->nama;

        Upload::create($validasi);

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
}

 /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */

