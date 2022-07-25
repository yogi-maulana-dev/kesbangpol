<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Pembaruan;
use Illuminate\Support\Facades\File;

class PembaruanController extends Controller
{
    //

    public function index()
    {
        //
        return view('user.pembaruan', ['judul' => 'Halaman Pepanjang', 'pembaruans' => pembaruan::where('id_user', auth()->user()->id)->get()]);
    }

    public function edit(Pembaruan $pembaruan)
    {
        return view('user.editpembaruan', compact('pembaruan'), ['judul' => 'Halaman Edit pembaruan']);
        // return view('user.editpembaruan', ['judul' => 'Halaman Edit pembaruan', 'pembaruan' => $pembaruan]);
    }

    public function update(Request $request, Pembaruan $pembaruan)
    {
        $tes = auth()->user()->email;
        $anusk_pengurusan = $tes . '/pembaruan/' . $pembaruan->sk_pengurusan;
        $anufoto_ketua = $tes . '/pembaruan/' . $pembaruan->foto_ketua;
        $anunpwp = $tes . '/pembaruan/' . $pembaruan->npwp;
        $anuadart = $tes . '/pembaruan/' . $pembaruan->adart;
        $anusurat_stlk = $tes . '/pembaruan/' . $pembaruan->surat_stlk;
        $anusurat_domisili = $tes . '/pembaruan/' . $pembaruan->surat_domisili;

        $validasi = $request->validate([
            'sk_pengurusan' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'foto_ketua' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'adart' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'npwp' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_stlk' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',
            'surat_domisili' => 'file|mimes:pdf,png,jpg,jpeg|max:1024',

            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);

        if ($request->hasFile('sk_pengurusan')) {
            // cek jika ada
            if (File::exists($anusk_pengurusan)) {
                File::delete($anusk_pengurusan);
            }

            $sk_pengurusan = $request->file('sk_pengurusan');
            $nama_dokumen1 = 'sk_pengurusan' . date('Ymdhis') . '.' . $request->file('sk_pengurusan')->getClientOriginalExtension();
            $sk_pengurusan->move($tes . '/pembaruan/', $nama_dokumen1);
            $validasi['sk_pengurusan'] = $nama_dokumen1;
        }

        if ($request->hasFile('foto_ketua')) {
            // cek jika ada
            if (File::exists($anufoto_ketua)) {
                File::delete($anufoto_ketua);
            }

            $sk_pengurusan = $request->file('foto_ketua');
            $nama_dokumen2 = 'foto_ketua' . date('Ymdhis') . '.' . $request->file('foto_ketua')->getClientOriginalExtension();
            $sk_pengurusan->move($tes . '/pembaruan/', $nama_dokumen2);
            $validasi['foto_ketua'] = $nama_dokumen2;
        }

        if ($request->hasFile('npwp')) {
            // cek jika ada
            if (File::exists($anunpwp)) {
                File::delete($anunpwp);
            }

            $npwp = $request->file('npwp');
            $nama_dokumen3 = 'npwp' . date('Ymdhis') . '.' . $request->file('npwp')->getClientOriginalExtension();
            $npwp->move($tes . '/pembaruan/', $nama_dokumen3);
            $validasi['npwp'] = $nama_dokumen3;
        }

        if ($request->hasFile('adart')) {
            // cek jika ada
            if (File::exists($anuadart)) {
                File::delete($anuadart);
            }

            $adart = $request->file('adart');
            $nama_dokumen4 = 'adart' . date('Ymdhis') . '.' . $request->file('adart')->getClientOriginalExtension();
            $adart->move($tes . '/pembaruan/', $nama_dokumen4);
            $validasi['adart'] = $nama_dokumen4;
        }

        if ($request->hasFile('surat_domisili')) {
            // cek jika ada
            if (File::exists($anusurat_domisili)) {
                File::delete($anusurat_domisili);
            }

            $surat_domisili = $request->file('surat_domisili');
            $nama_dokumen6 = 'surat_domisili' . date('Ymdhis') . '.' . $request->file('surat_domisili')->getClientOriginalExtension();
            $surat_domisili->move($tes . '/pembaruan/', $nama_dokumen6);
            $validasi['surat_domisili'] = $nama_dokumen6;
        }


  if ($request->hasFile('surat_stlk')) {
            // cek jika ada
            if (File::exists($anusurat_stlk)) {
                File::delete($anusurat_stlk);
            }

            $surat_stlk = $request->file('surat_stlk');
            $nama_dokumen7 = 'surat_stlk' . date('Ymdhis') . '.' . $request->file('surat_stlk')->getClientOriginalExtension();
            $surat_stlk->move($tes . '/pembaruan/', $nama_dokumen7);
            $validasi['surat_stlk'] = $nama_dokumen7;
        }
        
        $validasi['id_user'] = auth()->user()->id;

        pembaruan::where('id', $pembaruan->id)->update($validasi);
        return redirect('/pembaruan')->with('success', 'Berhasil di Update data');
    }
    public function store(Request $request)
    {
        //
        //
        $tes = auth()->user()->email;

        $validasi = $request->validate([
            'sk_pengurusan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,sk_pengurusan',
            'foto_ketua' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,foto_ketua',
            'npwp' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,akte_pendirian',
            'adart' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,akte_pendirian',
            'surat_stlk' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,akte_pendirian',
            'surat_domisili' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_domisili',

            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);

        $sk_pengurusan = $request->file('sk_pengurusan');
        $nama_dokumen1 = 'sk_pengurusan' . date('Ymdhis') . '.' . $request->file('sk_pengurusan')->getClientOriginalExtension();
        $sk_pengurusan->move($tes . '/pembaruan/', $nama_dokumen1);

        $foto_ketua = $request->file('foto_ketua');
        $nama_dokumen2 = 'foto_ketua' . date('Ymdhis') . '.' . $request->file('foto_ketua')->getClientOriginalExtension();
        $foto_ketua->move($tes . '/pembaruan/', $nama_dokumen2);

        $npwp = $request->file('npwp');
        $nama_dokumen3 = 'npwp' . date('Ymdhis') . '.' . $request->file('npwp')->getClientOriginalExtension();
        $npwp->move($tes . '/pembaruan/', $nama_dokumen3);

        $adart = $request->file('adart');
        $nama_dokumen4 = 'adart' . date('Ymdhis') . '.' . $request->file('adart')->getClientOriginalExtension();
        $adart->move($tes . '/pembaruan/', $nama_dokumen4);

        $surat_stlk = $request->file('surat_stlk');
        $nama_dokumen5 = 'surat_stlk' . date('Ymdhis') . '.' . $request->file('surat_stlk')->getClientOriginalExtension();
        $surat_stlk->move($tes . '/pembaruan/', $nama_dokumen5);

        $surat_domisili = $request->file('surat_domisili');
        $nama_dokumen6 = 'surat_domisili' . date('Ymdhis') . '.' . $request->file('surat_domisili')->getClientOriginalExtension();
        $surat_domisili->move($tes . '/pembaruan/', $nama_dokumen6);

        $validasi['sk_pengurusan'] = $nama_dokumen1;
        $validasi['foto_ketua'] = $nama_dokumen2;
        $validasi['npwp'] = $nama_dokumen3;
        $validasi['adart'] = $nama_dokumen4;
        $validasi['surat_stlk'] = $nama_dokumen5;
        $validasi['surat_domisili'] = $nama_dokumen6;
        $validasi['id_user'] = auth()->user()->id;

        // dd($validasi);

        pembaruan::create($validasi);

        //     dump($request->all()); // melihat data yang disubmit
        // $post = Post::create($request->all());
        // dump($post); // Melihat apakah model benar-benar berhasil dibuat.
        // $subscribers = User::subscribing($post->creator)->get();
        // dd($subscribers); // Melihat data yang diambil dan berhenti eksekusi.
        // Notification::send($subscribers, NewPostNotification($post));
        // return response()->json(['data' => $post]);

        return redirect('/pembaruan')->with('success', 'Berhasil di tambah data');

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }
}
