<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Perpanjang;

class PerpanjangController extends Controller
{
    //

    public function index()
    {
        //
        return view('user.perpanjang', ['judul' => 'Halaman Pepanjang', 'perpanjangans' => Perpanjang::where('id_user', auth()->user()->id)->get()]);
    }

    public function store(Request $request)
    {
        //
        //
        $tes = auth()->user()->email;

        $validasi = $request->validate([
            'sk_pengurusan' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_terdaftar_dikemenkumham',
            'foto_ketua' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,surat_pendaftaran',
            'npwp' => 'required|file|mimes:pdf,png,jpg,jpeg|max:1024,akte_pendirian',

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

        $validasi['sk_pengurusan'] = $nama_dokumen1;
        $validasi['foto_ketua'] = $nama_dokumen2;
        $validasi['npwp'] = $nama_dokumen3;
        $validasi['id_user'] = auth()->user()->id;

        // dd($validasi);

        Perpanjang::create($validasi);

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
