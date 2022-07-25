<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Perpanjang;
use Illuminate\Support\Facades\File;

class PerpanjangController extends Controller
{
    //

    public function index()
    {
        //
        return view('user.perpanjang', ['judul' => 'Halaman Pepanjang', 'perpanjangs' => Perpanjang::where('id_user', auth()->user()->id)->get()]);
    }

    public function edit(Perpanjang $perpanjang)
    {
        return view('user.editperpanjang', compact('perpanjang'), ['judul' => 'Halaman Edit Perpanjang']);
        // return view('user.editperpanjang', ['judul' => 'Halaman Edit Perpanjang', 'perpanjang' => $perpanjang]);
    }

    public function update(Request $request, Perpanjang $perpanjang)
    {
        //

        //
        //
        $tes = auth()->user()->email;
        $anusurat_kemenkumham = $tes . '/perpanjangan/' . $perpanjang->surat_kemenkumham;
        $anusurat_pendaftaran = $tes . '/perpanjangan/' . $perpanjang->surat_pendaftaran;
        $anuakte_pendirian = $tes . '/perpanjangan/' . $perpanjang->akte_pendirian;
        $anuadrt = $tes . '/perpanjangan/' . $perpanjang->adrt;
        $anukeabsahan_kantor = $tes . '/perpanjangan/' . $perpanjang->keabsahan_kantor;
        $anutujuan = $tes . '/perpanjangan/' . $perpanjang->tujuan;
        $anubiodata_pengurus = $tes . '/perpanjangan/' . $perpanjang->biodata_pengurus;
        $anuktp = $tes . '/perpanjangan/' . $perpanjang->ktp;
        $anufoto = $tes . '/perpanjangan/' . $perpanjang->foto;
        $anusurat_keterangan_domisili = $tes . '/perpanjangan/' . $perpanjang->surat_keterangan_domisili;
        $anunpwp = $tes . '/perpanjangan/' . $perpanjang->npwp;
        $anufoto_kantor = $tes . '/perpanjangan/' . $perpanjang->foto_kantor;
        $anusurat_ketertiban = $tes . '/perpanjangan/' . $perpanjang->surat_ketertiban;
        $anusurat_tidak_avilasi = $tes . '/perpanjangan/' . $perpanjang->surat_tidak_avilasi;
        $anusurat_konflik = $tes . '/perpanjangan/' . $perpanjang->surat_konflik;
        $anusurat_hak_cipta = $tes . '/perpanjangan/' . $perpanjang->surat_hak_cipta;
        $anusurat_laporan = $tes . '/perpanjangan/' . $perpanjang->surat_laporan;
        $anusurat_absah = $tes . '/perpanjangan/' . $perpanjang->surat_absah;
        $anusurat_rekom_agama = $tes . '/perpanjangan/' . $perpanjang->surat_rekom_agama;
        $anusurat_rekom_skpd_kepercayaan = $tes . '/perpanjangan/' . $perpanjang->surat_rekom_skpd_kepercayaan;
        $anusurat_rekom_skpd_kerja = $tes . '/perpanjangan/' . $perpanjang->surat_rekom_skpd_kerja;
        $anusurat_rekom_kesediaan = $tes . '/perpanjangan/' . $perpanjang->surat_rekom_kesediaan;
        $anusurat_izasah = $tes . '/perpanjangan/' . $perpanjang->surat_izasah;
        $anuskt = $tes . '/perpanjangan/' . $perpanjang->skt;
        $anusurat_keputusan = $tes . '/perpanjangan/' . $perpanjang->surat_keputusan;
        $anustlk = $tes . '/perpanjangan/' . $perpanjang->stlk;
        $anusurat_memuat = $tes . '/perpanjangan/' . $perpanjang->surat_memuat;
        // return $request->file('image')->store($tes);

        $validasi = $request->validate([
            'surat_pendaftaran' => 'file|mimes:pdf,png,jpg|max:1024',
            'akte_pendirian' => 'file|mimes:pdf,png,jpg|max:1024',
            'adrt' => 'file|mimes:pdf,png,jpg|max:1024',
            // 'keabsahan_kantor' => 'file|mimes:pdf,png,jpg|max:1024',
            'tujuan' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_keputusan' => 'file|mimes:pdf,png,jpg|max:1024',
            'biodata_pengurus' => 'file|mimes:pdf,png,jpg|max:1024',
            'ktp' => 'file|mimes:pdf,png,jpg|max:1024',
            'foto' => 'file|mimes:pdf,png,jpg|max:1024',
            'keabsahan_kantor' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_keterangan_domisili' => 'file|mimes:pdf,png,jpg|max:1024',
            'npwp' => 'file|mimes:pdf,png,jpg|max:1024',
            'foto_kantor' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_agama' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_skpd_kepercayaan' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_skpd_kerja' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_kesediaan' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_izasah' => 'file|mimes:pdf,png,jpg|max:1024',
            'stlk' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_kemenkumham' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_memuat' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',

            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);

        if ($request->hasFile('surat_kemenkumham')) {
            // cek jika ada
            if (File::exists($anusurat_kemenkumham)) {
                File::delete($anusurat_kemenkumham);
            }

            $surat_kemenkumham = $request->file('surat_kemenkumham');
            $nama_dokumen25 = 'surat_kemenkumham' . date('Ymdhis') . '.' . $request->file('surat_kemenkumham')->getClientOriginalExtension();
            $surat_kemenkumham->move($tes . '/perpanjangan/', $nama_dokumen25);
            $validasi['surat_kemenkumham'] = $nama_dokumen25;
        }

        if ($request->hasFile('surat_pendaftaran')) {
            // cek jika ada
            if (File::exists($anusurat_pendaftaran)) {
                File::delete($anusurat_pendaftaran);
            }

            $surat_pendaftaran = $request->file('surat_pendaftaran');
            $nama_dokumen1 = 'surat_pendaftaran' . date('Ymdhis') . '.' . $request->file('surat_pendaftaran')->getClientOriginalExtension();
            $surat_pendaftaran->move($tes . '/perpanjangan/', $nama_dokumen1);
            $validasi['surat_pendaftaran'] = $nama_dokumen1;
        }

        if ($request->hasFile('akte_pendirian')) {
            // cek jika ada
            if (File::exists($anuakte_pendirian)) {
                File::delete($anuakte_pendirian);
            }

            $akte_pendirian = $request->file('akte_pendirian');

            $nama_dokumen2 = 'akte_pendirian' . date('Ymdhis') . '.' . $request->file('akte_pendirian')->getClientOriginalExtension();
            $akte_pendirian->move($tes . '/perpanjangan/', $nama_dokumen2);

            $validasi['akte_pendirian'] = $nama_dokumen2;
        }

        if ($request->hasFile('adrt')) {
            // cek jika ada
            if (File::exists($anuadrt)) {
                File::delete($anuadrt);
            }

            $adrt = $request->file('adrt');

            $nama_dokumen3 = 'adrt' . date('Ymdhis') . '.' . $request->file('adrt')->getClientOriginalExtension();
            $adrt->move($tes . '/perpanjangan/', $nama_dokumen3);

            $validasi['adrt'] = $nama_dokumen3;
        }

        if ($request->hasFile('surat_keputusan')) {
            // cek jika ada
            if (File::exists($anusurat_keputusan)) {
                File::delete($anusurat_keputusan);
            }

            $surat_keputusan = $request->file('surat_keputusan');

            $nama_dokumen4 = 'surat_keputusan' . date('Ymdhis') . '.' . $request->file('surat_keputusan')->getClientOriginalExtension();
            $surat_keputusan->move($tes . '/perpanjangan/', $nama_dokumen4);
            $validasi['surat_keputusan'] = $nama_dokumen4;
        }

        if ($request->hasFile('biodata_pengurus')) {
            // cek jika ada
            if (File::exists($anubiodata_pengurus)) {
                File::delete($anubiodata_pengurus);
            }

            $biodata_pengurus = $request->file('biodata_pengurus');

            $nama_dokumen5 = 'biodata_pengurus' . date('Ymdhis') . '.' . $request->file('biodata_pengurus')->getClientOriginalExtension();
            $biodata_pengurus->move($tes . '/perpanjangan/', $nama_dokumen5);

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
            $KTP->move($tes . '/perpanjangan/', $nama_dokumen6);
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
            $foto->move($tes . '/perpanjangan/', $nama_dokumen7);
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
            $npwp->move($tes . '/perpanjangan/', $nama_dokumen8);
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
            $foto_kantor->move($tes . '/perpanjangan/', $nama_dokumen9);
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
            $surat_ketertiban->move($tes . '/perpanjangan/', $nama_dokumen10);
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
            $surat_tidak_avilasi->move($tes . '/perpanjangan/', $nama_dokumen11);
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
            $surat_konflik->move($tes . '/perpanjangan/', $nama_dokumen12);
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
            $surat_hak_cipta->move($tes . '/perpanjangan/', $nama_dokumen13);
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
            $surat_laporan->move($tes . '/perpanjangan/', $nama_dokumen14);
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
            $surat_absah->move($tes . '/perpanjangan/', $nama_dokumen15);
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
            $surat_rekom_agama->move($tes . '/perpanjangan/', $nama_dokumen16);
            $validasi['surat_rekom_agama'] = $nama_dokumen16;
            /** surat_rekom_agama
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_rekom_skpd_kepercayaan')) {
            if (File::exists($anusurat_rekom_skpd_kepercayaan)) {
                File::delete($anusurat_rekom_skpd_kepercayaan);
            }

            $surat_rekom_skpd_kepercayaan = $request->file('surat_rekom_skpd_kepercayaan');
            $nama_dokumen17 = 'surat_rekom_skpd_kepercayaan' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd_kepercayaan')->getClientOriginalExtension();
            $surat_rekom_skpd_kepercayaan->move($tes . '/perpanjangan/', $nama_dokumen17);
            $validasi['surat_rekom_skpd_kepercayaan'] = $nama_dokumen17;
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
            $surat_rekom_skpd->move($tes . '/perpanjangan/', $nama_dokumen18);
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
            $surat_rekom_kesediaan->move($tes . '/perpanjangan/', $nama_dokumen19);
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
            $izasah->move($tes . '/perpanjangan/', $nama_dokumen20);
            $validasi['surat_izasah'] = $nama_dokumen20;
            /** surat_izasah
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('stlk')) {
            if (File::exists($anustlk)) {
                File::delete($anustlk);
            }

            $anustlk = $request->file('stlk');
            $nama_dokumen21 = 'stlk' . date('Ymdhis') . '.' . $request->file('stlk')->getClientOriginalExtension();
            $anustlk->move($tes . '/perpanjangan/', $nama_dokumen21);
            $validasi['stlk'] = $nama_dokumen21;
            /** anustlk
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
            $surat_keterangan_domisili->move($tes . '/perpanjangan/', $nama_dokumen22);
            $validasi['surat_keterangan_domisili'] = $nama_dokumen22;
            /** surat_keterangan_domisili
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('tujuan')) {
            if (File::exists($anutujuan)) {
                File::delete($anutujuan);
            }

            $tujuan = $request->file('tujuan');
            $nama_dokumen23 = 'tujuan' . date('Ymdhis') . '.' . $request->file('tujuan')->getClientOriginalExtension();
            $tujuan->move($tes . '/perpanjangan/', $nama_dokumen23);
            $validasi['tujuan'] = $nama_dokumen23;
            /** tujuan
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
            $keabsahan_kantor->move($tes . '/perpanjangan/', $nama_dokumen24);
            $validasi['keabsahan_kantor'] = $nama_dokumen24;
            /** keabsahan_kantor
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        if ($request->hasFile('surat_memuat')) {
            if (File::exists($anusurat_memuat)) {
                File::delete($anusurat_memuat);
            }

            $anusurat_memuat = $request->file('surat_memuat');
            $nama_dokumen27 = 'surat_memuat' . date('Ymdhis') . '.' . $request->file('surat_memuat')->getClientOriginalExtension();
            $anusurat_memuat->move($tes . '/perpanjangan/', $nama_dokumen27);
            $validasi['surat_memuat'] = $nama_dokumen27;
            /** keabsahan_kantor
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        }

        // if ($request->hasFile('stlk')) {
        //     if (File::exists($anukeabsahan_kantor)) {
        //         File::delete($anukeabsahan_kantor);
        //     }

        //     $stlk = $request->file('stlk');
        //     $stlk = 'stlk' . date('Ymdhis') . '.' . $request->file('stlk')->getClientOriginalExtension();
        //     $keabsahan_kantor->move($tes . '/perpanjangan/', $nama_dokumen27);
        //     $validasi['stlk'] = $nama_dokumen27;
        //     /** keabsahan_kantor
        //      * Show the form for creating a new resource.
        //      * Whatapps 6289631031237
        //      * email : yogimaulana100@gmail.com
        //      * https://github.com/Ays1234
        //      * https://serbaotodidak.com/
        //      */
        // }

        //   $validasi['surat_kemenkumham'] = $anusurat_kemenkumham;
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
        // $validasi['tujuan'] = $nama_dokumen23;
        // $validasi['keabsahan_kantor'] = $nama_dokumen24;
        // $validasi['surat_kemenkumham'] = $nama_dokumen25;
        $validasi['id_user'] = auth()->user()->id;

        Perpanjang::where('id', $perpanjang->id)->update($validasi);
        return redirect('/perpanjang')->with('success', 'Berhasil di Update data');
    }

    public function store(Request $request)
    {
        //
        //
        $tes = auth()->user()->email;
        // $anusurat_kemenkumham = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_kemenkumham;
        // $anusurat_pendaftaran = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_pendaftaran;
        // $anuakte_pendirian = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->akte_pendirian;
        // $anuadrt = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->adrt;
        // $anukeabsahan_kantor = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->keabsahan_kantor;
        // $anutujuan = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->tujuan;
        // $anusurat_keputusan = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_keputusan;
        // $anubiodata_pengurus = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->biodata_pengurus;
        // $anuktp = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->ktp;
        // $anufoto = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->foto;
        // $anusurat_keterangan_domisili = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_keterangan_domisili;
        // $anunpwp = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->npwp;
        // $anufoto_kantor = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->foto_kantor;
        // $anusurat_ketertiban = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_ketertiban;
        // $anusurat_tidak_avilasi = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_tidak_avilasi;
        // $anusurat_konflik = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_konflik;
        // $anusurat_hak_cipta = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_hak_cipta;
        // $anusurat_laporan = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_laporan;
        // $anusurat_absah = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_absah;
        // $anusurat_rekom_agama = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_rekom_agama;
        // $anusurat_rekom_skpd = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_rekom_skpd;
        // $anusurat_rekom_skpd_kerja = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_rekom_skpd_kerja;
        // $anusurat_rekom_kesediaan = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_rekom_kesediaan;
        // $anusurat_izasah = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->surat_izasah;
        // $anuskt = '/perpanjangan/' . $tes . '/perpanjangan/' . $perpanjang->skt;
        // return $request->file('image')->store($tes);

      $validasi = $request->validate([
            'surat_pendaftaran' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'akte_pendirian' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'adrt' => 'required|file|mimes:pdf,png,jpg|max:1024',
            // 'keabsahan_kantor' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'tujuan' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'surat_keputusan' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'biodata_pengurus' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'ktp' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'foto' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'keabsahan_kantor' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'surat_keterangan_domisili' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'npwp' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'foto_kantor' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_agama' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_skpd_kepercayaan' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_skpd_kerja' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_rekom_kesediaan' => 'file|mimes:pdf,png,jpg|max:1024',
            'surat_izasah' => 'required|file|mimes:pdf,png,jpg|max:1024',
            'stlk' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_kemenkumham' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_memuat' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024',


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
        $surat_pendaftaran->move($tes . '/perpanjangan/', $nama_dokumen1);

        $akte_pendirian = $request->file('akte_pendirian');
        $nama_dokumen2 = 'akte_pendirian' . date('Ymdhis') . '.' . $request->file('akte_pendirian')->getClientOriginalExtension();
        $akte_pendirian->move($tes . '/perpanjangan/', $nama_dokumen2);

        $adrt = $request->file('adrt');
        $nama_dokumen3 = 'adrt' . date('Ymdhis') . '.' . $request->file('adrt')->getClientOriginalExtension();
        $adrt->move($tes . '/perpanjangan/', $nama_dokumen3);

        $surat_keputusan = $request->file('surat_keputusan');
        $nama_dokumen4 = 'surat_keputusan' . date('Ymdhis') . '.' . $request->file('surat_keputusan')->getClientOriginalExtension();
        $surat_keputusan->move($tes . '/perpanjangan/', $nama_dokumen4);

        $biodata_pengurus = $request->file('biodata_pengurus');
        $nama_dokumen5 = 'biodata_pengurus' . date('Ymdhis') . '.' . $request->file('biodata_pengurus')->getClientOriginalExtension();
        $biodata_pengurus->move($tes . '/perpanjangan/', $nama_dokumen5);

        $KTP = $request->file('ktp');
        $nama_dokumen6 = 'KTP' . date('Ymdhis') . '.' . $request->file('ktp')->getClientOriginalExtension();
        $KTP->move($tes . '/perpanjangan/', $nama_dokumen6);

        $foto = $request->file('foto');
        $nama_dokumen7 = 'foto' . date('Ymdhis') . '.' . $request->file('foto')->getClientOriginalExtension();
        $foto->move($tes . '/perpanjangan/', $nama_dokumen7);

        $npwp = $request->file('npwp');
        $nama_dokumen8 = 'npwp' . date('Ymdhis') . '.' . $request->file('npwp')->getClientOriginalExtension();
        $npwp->move($tes . '/perpanjangan/', $nama_dokumen8);

        $foto_kantor = $request->file('foto_kantor');
        $nama_dokumen9 = 'foto_kantor' . date('Ymdhis') . '.' . $request->file('foto_kantor')->getClientOriginalExtension();
        $foto_kantor->move($tes . '/perpanjangan/', $nama_dokumen9);

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */

       if ($request->hasFile('surat_rekom_agama')) {
        $surat_rekom_agama = $request->file('surat_rekom_agama');
        $nama_dokumen16 = 'surat_rekom_agama' . date('Ymdhis') . '.' . $request->file('surat_rekom_agama')->getClientOriginalExtension();
        $surat_rekom_agama->move($tes . '/', $nama_dokumen16);
              $validasi['surat_rekom_agama'] = $nama_dokumen16;
       } else {
           
           $validasi['a_surat_rekom_agama'] = 2;
       }
       
         if ($request->hasFile('surat_rekom_skpd_kepercayaan')) {

        $surat_rekom_skpd_kepercayaan = $request->file('surat_rekom_skpd_kepercayaan');
        $nama_dokumen17 = 'surat_rekom_skpd_kepercayaan' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd_kepercayaan')->getClientOriginalExtension();
        $surat_rekom_skpd_kepercayaan->move($tes . '/', $nama_dokumen17);
            $validasi['surat_rekom_skpd_kepercayaan'] = $nama_dokumen17;
      } else {
           
           $validasi['a_surat_rekom_skpd_kepercayaan'] = 2;
       }

  if ($request->hasFile('surat_rekom_skpd_kerja')) {
        $surat_rekom_skpd_kerja = $request->file('surat_rekom_skpd_kerja');
        $nama_dokumen18 = 'surat_rekom_skpd_kerja' . date('Ymdhis') . '.' . $request->file('surat_rekom_skpd_kerja')->getClientOriginalExtension();
        $surat_rekom_skpd_kerja->move($tes . '/', $nama_dokumen18);
        $validasi['surat_rekom_skpd_kerja'] = $nama_dokumen18;
      } else {
           
           $validasi['a_surat_rekom_skpd_kerja'] = 2;
       }




  if ($request->hasFile('surat_rekom_kesediaan')) {
        $surat_rekom_kesediaan = $request->file('surat_rekom_kesediaan');
        $nama_dokumen19 = 'surat_rekom_kesediaan' . date('Ymdhis') . '.' . $request->file('surat_rekom_kesediaan')->getClientOriginalExtension();
        $surat_rekom_kesediaan->move($tes . '/', $nama_dokumen19);
                $validasi['surat_rekom_kesediaan'] = $nama_dokumen19;
  } else {
           
           $validasi['a_surat_rekom_kesediaan'] = 2;
       }

           


        $izasah = $request->file('surat_izasah');
        $nama_dokumen20 = 'surat_izasah' . date('Ymdhis') . '.' . $request->file('surat_izasah')->getClientOriginalExtension();
        $izasah->move($tes . '/', $nama_dokumen20);


  if ($request->hasFile('stlk')) {
        $stlk = $request->file('stlk');
        $nama_dokumen21 = 'stlk' . date('Ymdhis') . '.' . $request->file('stlk')->getClientOriginalExtension();
        $stlk->move($tes . '/', $nama_dokumen21);
        $validasi['stlk'] = $nama_dokumen21;
  } else {
           
           $validasi['a_stlk'] = 2;
       }

        $surat_keterangan_domisili = $request->file('surat_keterangan_domisili');
        $nama_dokumen22 = 'surat_keterangan_domisili' . date('Ymdhis') . '.' . $request->file('surat_keterangan_domisili')->getClientOriginalExtension();
        $surat_keterangan_domisili->move($tes . '/perpanjangan/', $nama_dokumen22);

        $tujuan = $request->file('tujuan');
        $nama_dokumen23 = 'tujuan' . date('Ymdhis') . '.' . $request->file('tujuan')->getClientOriginalExtension();
        $tujuan->move($tes . '/perpanjangan/', $nama_dokumen23);

        $keabsahan_kantor = $request->file('keabsahan_kantor');
        $nama_dokumen24 = 'keabsahan_kantor' . date('Ymdhis') . '.' . $request->file('keabsahan_kantor')->getClientOriginalExtension();
        $keabsahan_kantor->move($tes . '/perpanjangan/', $nama_dokumen24);

        $surat_memuat = $request->file('surat_memuat');
        $nama_dokumen25 = 'surat_memuat' . date('Ymdhis') . '.' . $request->file('surat_memuat')->getClientOriginalExtension();
        $surat_memuat->move($tes . '/perpanjangan/', $nama_dokumen25);

        $surat_kemenkumham = $request->file('surat_kemenkumham');
        $nama_dokumen26 = 'surat_kemenkumham' . date('Ymdhis') . '.' . $request->file('surat_kemenkumham')->getClientOriginalExtension();
        $surat_kemenkumham->move($tes . '/perpanjangan/', $nama_dokumen26);

        $validasi['surat_pendaftaran'] = $nama_dokumen1;
        $validasi['akte_pendirian'] = $nama_dokumen2;
        $validasi['adrt'] = $nama_dokumen3;
        $validasi['surat_keputusan'] = $nama_dokumen4;
        $validasi['biodata_pengurus'] = $nama_dokumen5;

        $validasi['ktp'] = $nama_dokumen6;
        $validasi['foto'] = $nama_dokumen7;

        $validasi['npwp'] = $nama_dokumen8;
        $validasi['foto_kantor'] = $nama_dokumen9;



        $validasi['surat_izasah'] = $nama_dokumen20;
        
        $validasi['surat_memuat'] = $nama_dokumen25;
        $validasi['surat_kemenkumham'] = $nama_dokumen26;

        $validasi['surat_keterangan_domisili'] = $nama_dokumen22;
        $validasi['tujuan'] = $nama_dokumen23;
        $validasi['keabsahan_kantor'] = $nama_dokumen24;

        $validasi['id_user'] = auth()->user()->id;
        Perpanjang::create($validasi);
        // dd($validasi);

        //     dump($request->all()); // melihat data yang disubmit
        // $post = Post::create($request->all());
        // dump($post); // Melihat apakah model benar-benar berhasil dibuat.
        // $subscribers = User::subscribing($post->creator)->get();
        // dd($subscribers); // Melihat data yang diambil dan berhenti eksekusi.
        // Notification::send($subscribers, NewPostNotification($post));
        // return response()->json(['data' => $post]);

        return redirect('/perpanjang')->with('success', 'Berhasil di tambah data');

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }
}
