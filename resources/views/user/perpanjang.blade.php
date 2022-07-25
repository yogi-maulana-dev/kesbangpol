@extends('layouts.main_admin')

@section('perpanjang')
    <style>
        .modal {
            overflow-y: auto;
        }
    </style>
    <div class="pcoded-main-container">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar">
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="/awal" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>D</b></span>
                            <span class="pcoded-mtext">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    {{-- <li class="pcoded-hasmenu">
                                <a href="/berita" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-gift "></i><b>U</b></span>
                                    <span class="pcoded-mtext">Berita</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li> --}}
                    <li class="pcoded-hasmenu">
                        <a href="/dashboard" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-comments"></i><b>A</b></span>
                            <span class="pcoded-mtext">Pendaftaraan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <li class="pcoded-hasmenu">
                        <a href="/perpanjang" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-comments"></i><b>A</b></span>
                            <span class="pcoded-mtext">Perpanjang</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    
                      <li class="pcoded-hasmenu">
                        <a href="/pembaruan" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-comments"></i><b>A</b></span>
                            <span class="pcoded-mtext">Pembaruan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- Main-body start -->
                    <div class="main-body">
                        <div class="page-wrapper">

                            <!-- Page body start -->
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        @if ($perpanjangs->isEmpty())
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
                                                    <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                </div>
                                                <div class="card-block">
                                                    <form method="post" action="/perpanjang" class="form-material"
                                                        enctype="multipart/form-data">
                                                        @csrf


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">1. Surat Permohonan
                                                                Pendaftaran</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_pendaftaran"
                                                                    class="form-control @error('surat_pendaftaran') is-invalid @enderror">

                                                                @error('surat_pendaftaran')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">2. Akte Pendirian Ormas
                                                                Yang Disahkan Oleh Notaris</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="akte_pendirian"
                                                                    class="form-control @error('akte_pendirian') is-invalid @enderror">

                                                                @error('akte_pendirian')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror


                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">3. Anggaran Dasar (AD)
                                                                Anggaran Rumah Tangga (ART) Yang Disahkan Oleh Notaris Dan
                                                                Organisasi Berdiri Berdasarkan (Menkumham/Berdasarkan
                                                                UUD)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="adrt"
                                                                    class="form-control @error('adrt') is-invalid @enderror">

                                                                @error('adrt')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror


                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">4. Tujuan Dan Program
                                                                kerja Organisasi</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="tujuan"
                                                                    class="form-control @error('tujuan') is-invalid @enderror">

                                                                @error('tujuan')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">5. Surat Keputusan
                                                                Tentang Susunan Pengurus Ormas</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_keputusan"
                                                                    class="form-control @error('surat_keputusan') is-invalid @enderror">

                                                                @error('surat_keputusan')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">6. Biodata pangurus
                                                                organisasi (ketua, sekretaris dan bendahara atau sebutan
                                                                lainnya)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="biodata_pengurus"
                                                                    class="form-control @error('biodata_pengurus') is-invalid @enderror">

                                                                @error('biodata_pengurus')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">7. Kartu Tanda Penduduk
                                                                (Mesuji) Pengurus Organisasi</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="ktp"
                                                                    class="form-control @error('ktp') is-invalid @enderror">

                                                                @error('ktp')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">8. Pas Foto Ketua
                                                                Organisasi</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="foto"
                                                                    class="form-control @error('foto') is-invalid @enderror">

                                                                @error('foto')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">9. Surat Keterangan
                                                                Domisili Sekretariat Omas Yang Diterbitkan Olah Lurah /
                                                                Kepala Desa Selempat Atau Sebutan Lainnya</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_keterangan_domisili"
                                                                    class="form-control @error('surat_keterangan_domisili') is-invalid @enderror">

                                                                @error('surat_keterangan_domisili')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">10. Nomor Pokok Wajib
                                                                Pajak Atas Nama Ormas</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="npwp"
                                                                    class="form-control @error('npwp') is-invalid @enderror">

                                                                @error('npwp')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">11. Foto Kantor Atau
                                                                Sekretariat Ormas, Tampak Depan Yang Memuat Papan
                                                                Nama</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="foto_kantor"
                                                                    class="form-control @error('foto_kantor') is-invalid @enderror">

                                                                @error('foto_kantor')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">12. Foto Kantor Atau
                                                                Sekretariat Ormas, Tampak Depan Yang Memuat Papan Nama
                                                                12. Keabsahan Kantor Atau Sekretariat Ormas Dilampiri Bukti
                                                                Kepemilikan, atau Surat Perjanjian Kontrak Atau Ijin Pakai
                                                                Dari Pemilik/Pengelola
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="keabsahan_kantor"
                                                                    class="form-control @error('keabsahan_kantor') is-invalid @enderror">

                                                                @error('keabsahan_kantor')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">13. Surat Pernyataan
                                                                Yang Memuat : 1. Pernyataan Tidak Terjadi Konflik
                                                                Kepengurusan Dan Perkara Pengadilan, 2. Pernyataan Bahwa
                                                                Nama, Lambang, Bendera, Tanda Gambar, Simbol, Atribut, Cap
                                                                Stempel Yang Digunakan Belum Menjadi Hak Paten Atau Hak
                                                                Cipta Pihak Lain, 3. Pernyataan Kesanggupan Menyampaikan
                                                                Laporan Perkembangan Dan Kegiatan Ormas Setiap Akhir Tahun,
                                                                4. Surat Pernyataan Bahwa Bertanggung Jawab Terhadap
                                                                Keabsahan Seluruh Isi, Data, Dan Informasi Dokumen Atau
                                                                Berkas Yang Diserahkan, Dan Bersedia Dituntut Secara Hukum.
                                                                (Di Tanda Tangani Ketua Dan Sekretaris)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_memuat"
                                                                    class="form-control @error('surat_memuat') is-invalid @enderror">

                                                                @error('surat_memuat')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">14. Rekomendasi Dari
                                                                Kementerian Agama Untuk Omas Yang Memiliki Kekhususan Bidang
                                                                Keagamaan ( boleh di isi atau tidak)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_rekom_agama"
                                                                    class="form-control @error('surat_rekom_agama') is-invalid @enderror">
                                                                @error('surat_rekom_agama')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">15. Rekomendasi Dari
                                                                Kementerian Dan/Atau Perangkat Daerah Yang Membidangi Urusan
                                                                Kebudayaan Untuk Ormas Yang Memiliki Kekhususan Bidang
                                                                Kepercayaan Kepada Tuhan Yang Maha Esa ( boleh di isi atau tidak)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_rekom_skpd_kepercayaan"
                                                                    class="form-control @error('surat_rekom_skpd_kepercayaan') is-invalid @enderror">
                                                                @error('surat_rekom_skpd_kepercayaan')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">16. Surat Rekomendasi
                                                                dari
                                                                kementrian dan SKPD bidang tenaga
                                                                kerja orkemas serikat buruh **</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_rekom_skpd_kerja"
                                                                    class="form-control @error('surat_rekom_skpd_kerja') is-invalid @enderror">
                                                                @error('surat_rekom_skpd_kerja')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">17. Surat Pernyataan
                                                                Kesediaan Atau Persetujuan Dari Pajabat Negara, Pejabat
                                                                Pemerintah Dan/ Atau Tokoh Masyarakat Yang Bersangkutan,
                                                                Yang Namanya Dicantumkan Dalam Kepengurusan Ormas ( boleh di isi atau tidak)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_rekom_kesediaan"
                                                                    class="form-control @error('surat_rekom_kesediaan') is-invalid @enderror">

                                                                @error('surat_rekom_kesediaan')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">18. Ijazah Terakhir
                                                                Pengurus Harian (Ketua, Sekretaris, Bendahara)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_izasah"
                                                                    class="form-control @error('surat_izasah') is-invalid @enderror">

                                                                @error('surat_izasah')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">19. STLK Dari Badan
                                                                Kesatuan Bangsa Dan Politik Provinsi Lampung Bagi Organisasi
                                                                Yang Memiliki Kepengurusan Tingkat Provinsi ( boleh di isi atau tidak)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="stlk"
                                                                    class="form-control @error('stlk') is-invalid @enderror">

                                                                @error('stlk')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">20. Surat Keterangan
                                                                Terdaftar Di Kementrian Hukum Dan Ham Bagi Ormas Yang
                                                                Berbadan Hukum, Dan/ Atau Surat Keterangan Terdaftar Di
                                                                Kementrian Dalam Negri Bagi Ormas Yang Tidak Berbadan
                                                                Hukum</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_kemenkumham"
                                                                    class="form-control @error('surat_kemenkumham') is-invalid @enderror">

                                                                @error('surat_kemenkumham')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary m-b-0">Simpan
                                                                Data</button>
                                                        </div>

                                                </div>


                                                </form>
                                            </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-block">

                                            <div class="card-header">
                                                <h5>Data Organisasi Masyarakat Yang diajukan</h5>
                                                <span>Data yang sudah dikirim akan di proses sampa 3 x 24 jam, jika ada
                                                    kesalahan atau kekurangan data
                                                    mohon dilakukan pengirim data yang kurang sesuai syarat yang ada.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="new-cons"
                                                        class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Organisasi</th>
                                                                <th>Email Organisasi</th>
                                                                <th>Aksi Data Upload</i></th>
                                                                <th>Data Perpanjangan</i></th>
                                                                <th>Status</i></th>
                                                                <th>Keterangan</i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($perpanjangs as $data)
                                                                <tr>
                                                                    <td>{{ auth()->user()->nama }}</td>
                                                                    <td>{{ auth()->user()->email }}</td>

                                                                    <td> <button
                                                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                                                            data-target="#tabbed-form"
                                                                            data-toggle="modal"><span
                                                                                data-feather="eye"></span></button>
                                                                        @if ($data->lengkap >= 30)
                                                                        @else
                                                                            <a href="/perpanjang/{{ $data->id }}/edit"
                                                                                class="badge bg-warning"><span
                                                                                    data-feather="edit"></span></a>
                                                                        @endif


                                                                    </td>

                                                                    <td>
                                                                        @if ($data->lengkap >= 30)
                                                                            <div class="label-main">
                                                                                <label
                                                                                    class="label label-lg label-success"><i
                                                                                        class="fa fas fa-check"></i>
                                                                                    Data perpanjangan sudah lengkap</label>
                                                                            </div>
                                                                        @else
                                                                            <div class="label-main">
                                                                                <label
                                                                                    class="label label-lg label-primary"><i
                                                                                        class="fa fa-spinner"></i>
                                                                                    Belum mulai</label>

                                                                            </div>
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @if ($data->lengkap >= 30)
                                                                            <div class="label-main">
                                                                                <label
                                                                                    class="label label-lg label-success"><i
                                                                                        class="fa fas fa-check"></i>
                                                                                    Data sudah lengkap</label>
                                                                            </div>
                                                                        @else
                                                                            <div class="label-main">
                                                                                <label
                                                                                    class="label label-lg label-primary"><i
                                                                                        class="fa fa-spinner"></i>
                                                                                    Proses</label>

                                                                            </div>
                                                                        @endif
                                                                    </td>


                                                                    <td>
                                                                        {{ $data->ket }}
                                                                    </td>


                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- tabbed form modal start -->
                                    <div id="tabbed-form" class="modal fade mixed-form" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs md-tabs nav-justified" role="tablist">
                                                        <li class="nav-item waves-effect waves-dark">
                                                            <a class="nav-link active" data-toggle="tab" href="#data1"
                                                                role="tab">
                                                                <h6 class="m-b-0">Data 1</h6>
                                                            </a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item waves-effect waves-dark">
                                                            <a class="nav-link" data-toggle="tab" href="#data2"
                                                                role="tab">
                                                                <h6 class="m-b-0">Data 2</h6>
                                                            </a>
                                                            <div class="slide"></div>
                                                        </li>

                                                        <li class="nav-item waves-effect waves-dark">
                                                            <a class="nav-link" data-toggle="tab" href="#data3"
                                                                role="tab">
                                                                <h6 class="m-b-0">Data 3</h6>
                                                            </a>
                                                            <div class="slide"></div>
                                                        </li>

                                                        <li class="nav-item waves-effect waves-dark">
                                                            <a class="nav-link" data-toggle="tab" href="#data4"
                                                                role="tab">
                                                                <h6 class="m-b-0">Data 4</h6>
                                                            </a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                    <!-- Tab panes -->

                                                    <div class="tab-content p-t-30">
                                                        @foreach ($perpanjangs as $data)
                                                            <div class="tab-pane active" id="data1" role="tabpanel">

                                                                {{-- awal --}}


                                                                {{-- penutup Data surat_terdaftar_dikemenkumham --}}


                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_pendaftaran))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_pendaftaran);
                                                                        $surat_pendaftaran = $pecah[1];
                                                                    @endphp
                                                                    {{-- status data surat_pendaftaran --}}
                                                                    @if ($surat_pendaftaran == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_surat_pendaftaran == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_pendaftaran }}</label>

                                                                                    </p>
                                                                                @elseif($data->a_surat_pendaftaran == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_pendaftaran }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_pendaftaran
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a class="btn btn-primary"
                                                                                        data-toggle="modal"
                                                                                        href="#surat_pendaftaran">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_pendaftaran == 'png' or $surat_pendaftaran == 'jpg')
                                                                        {{-- status data surat_pendaftaran --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_surat_pendaftaran == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_pendaftaran }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_pendaftaran == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_pendaftaran }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_pendaftaran
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_pendaftaran) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_pendaftaran }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_pendaftaran) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">


                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif

                                                                {{-- penutup Data surat_pendaftaran --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->akte_pendirian))
                                                                    @php
                                                                        $pecah = explode('.', $data->akte_pendirian);
                                                                        $akte_pendirian = $pecah[1];
                                                                    @endphp

                                                                    @if ($akte_pendirian == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data akte_pendirian --}}
                                                                                @if ($data->a_akte_pendirian == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->akte_pendirian }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_akte_pendirian == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->akte_pendirian }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data akte_pendirian
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#akte_pendirian"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($akte_pendirian == 'png' or $akte_pendirian == 'jpg')
                                                                        {{-- status data akte_pendirian --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_akte_pendirian == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->akte_pendirian }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_akte_pendirian == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->akte_pendirian }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data akte_pendirian
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->akte_pendirian) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->akte_pendirian }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->akte_pendirian) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->adrt))
                                                                    @php
                                                                        $pecah = explode('.', $data->adrt);
                                                                        $adrt = $pecah[1];
                                                                    @endphp

                                                                    @if ($adrt == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    @if ($data->a_adrt == 0)
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->adrt }}</label>
                                                                                    @elseif($data->a_adrt == 1)
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->adrt }}</label>
                                                                                    @else
                                                                                    @endif
                                                                                </p>

                                                                                {{-- tutup status data adrt
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal" href="#adrt"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($adrt == 'png' or $adrt == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_adrt == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->adrt }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_adrt == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->adrt }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data adrt
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->adrt) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->adrt }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->adrt) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}



                                                                {{-- awal --}}
                                                                @if (!empty($data->tujuan))
                                                                    @php
                                                                        $pecah = explode('.', $data->tujuan);
                                                                        $tujuan = $pecah[1];
                                                                    @endphp

                                                                    @if ($tujuan == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_tujuan == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->tujuan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_tujuan == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->tujuan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data tujuan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal" href="#tujuan"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($tujuan == 'png' or $tujuan == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_tujuan == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->tujuan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_tujuan == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->tujuan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data tujuan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->tujuan) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->tujuan }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->tujuan) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}


                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_keputusan))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_keputusan);
                                                                        $surat_keputusan = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_keputusan == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_surat_keputusan == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_keputusan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_keputusan == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_keputusan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_keputusan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_keputusan"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_keputusan == 'png' or $surat_keputusan == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_surat_keputusan == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_keputusan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_keputusan == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_keputusan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_keputusan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_keputusan) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_keputusan }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_keputusan) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->biodata_pengurus))
                                                                    @php
                                                                        $pecah = explode('.', $data->biodata_pengurus);
                                                                        $biodata_pengurus = $pecah[1];
                                                                    @endphp

                                                                    @if ($biodata_pengurus == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_biodata_pengurus == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->biodata_pengurus }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_biodata_pengurus == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->biodata_pengurus }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data biodata_pengurus
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#biodata_pengurus"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($biodata_pengurus == 'png' or $biodata_pengurus == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_biodata_pengurus == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->biodata_pengurus }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_biodata_pengurus == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->biodata_pengurus }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data biodata_pengurus
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->biodata_pengurus) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->biodata_pengurus }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->biodata_pengurus) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}
                                                                {{-- penutup dari data 1 --}}
                                                                </form>
                                                            </div>
                                                        @endforeach


                                                        @foreach ($perpanjangs as $data)
                                                            <div class="tab-pane" id="data2" role="tabpanel">

                                                                {{-- awal --}}



                                                                {{-- awal --}}
                                                                @if (!empty($data->ktp))
                                                                    @php
                                                                        $pecah = explode('.', $data->ktp);
                                                                        $ktp = $pecah[1];
                                                                    @endphp

                                                                    @if ($ktp == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    @if ($data->a_ktp == 0)
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->ktp }}</label>
                                                                                    @elseif($data->a_ktp == 1)
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->ktp }}</label>
                                                                                    @else
                                                                                    @endif
                                                                                </p>

                                                                                {{-- tutup status data ktp
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal" href="#ktp"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($ktp == 'png' or $ktp == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_ktp == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->ktp }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_ktp == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->ktp }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data ktp
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->ktp) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->ktp }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->ktp) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}



                                                                {{-- awal --}}
                                                                @if (!empty($data->foto))
                                                                    @php
                                                                        $pecah = explode('.', $data->foto);
                                                                        $foto = $pecah[1];
                                                                    @endphp

                                                                    @if ($foto == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    @if ($data->a_foto == 0)
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->foto }}</label>
                                                                                    @elseif($data->a_foto == 1)
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->foto }}</label>
                                                                                    @else
                                                                                    @endif
                                                                                </p>

                                                                                {{-- tutup status data foto
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal" href="#foto"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($foto == 'png' or $foto == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_foto == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->foto }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_foto == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->foto }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data foto
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->foto) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->foto }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->foto) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}



                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_keterangan_domisili))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_keterangan_domisili);
                                                                        $surat_keterangan_domisili = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_keterangan_domisili == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    @if ($data->a_surat_keterangan_domisili == 0)
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                                                    @elseif($data->a_surat_keterangan_domisili == 1)
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                                                    @else
                                                                                    @endif
                                                                                </p>

                                                                                {{-- tutup status data surat_keterangan_domisili
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_keterangan_domisili"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_keterangan_domisili == 'png' or $surat_keterangan_domisili == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_surat_keterangan_domisili == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_keterangan_domisili == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_keterangan_domisili
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_keterangan_domisili) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_keterangan_domisili }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_keterangan_domisili) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}



                                                                {{-- awal --}}
                                                                @if (!empty($data->npwp))
                                                                    @php
                                                                        $pecah = explode('.', $data->npwp);
                                                                        $npwp = $pecah[1];
                                                                    @endphp

                                                                    @if ($npwp == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    @if ($data->a_npwp == 0)
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->npwp }}</label>
                                                                                    @elseif($data->a_npwp == 1)
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->npwp }}</label>
                                                                                    @else
                                                                                    @endif
                                                                                </p>

                                                                                {{-- tutup status data npwp
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal" href="#npwp"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($npwp == 'png' or $npwp == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_npwp == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->npwp }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_npwp == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->npwp }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data npwp
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->npwp) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->npwp }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->npwp) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data npwp --}}



                                                                {{-- awal --}}
                                                                @if (!empty($data->foto_kantor))
                                                                    @php
                                                                        $pecah = explode('.', $data->foto_kantor);
                                                                        $foto_kantor = $pecah[1];
                                                                    @endphp

                                                                    @if ($foto_kantor == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    @if ($data->a_foto_kantor == 0)
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->foto_kantor }}</label>
                                                                                    @elseif($data->a_foto_kantor == 1)
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->foto_kantor }}</label>
                                                                                    @else
                                                                                    @endif
                                                                                </p>

                                                                                {{-- tutup status data foto_kantor
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#foto_kantor"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($foto_kantor == 'png' or $foto_kantor == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_foto_kantor == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->foto_kantor }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_foto_kantor == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->foto_kantor }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data foto_kantor
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->foto_kantor) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->foto_kantor }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->foto_kantor) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data foto_kantor --}}


                                                                {{-- penutup dari data 1 --}}
                                                                </form>
                                                            </div>
                                                        @endforeach

                                                        @foreach ($perpanjangs as $data)
                                                            <div class="tab-pane" id="data3" role="tabpanel">



                                                                {{-- awal --}}
                                                                @if (!empty($data->keabsahan_kantor))
                                                                    @php
                                                                        $pecah = explode('.', $data->keabsahan_kantor);
                                                                        $keabsahan_kantor = $pecah[1];
                                                                    @endphp

                                                                    @if ($keabsahan_kantor == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_keabsahan_kantor == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->keabsahan_kantor }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_keabsahan_kantor == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->keabsahan_kantor }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data keabsahan_kantor
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#keabsahan_kantor"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($keabsahan_kantor == 'png' or $keabsahan_kantor == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_keabsahan_kantor == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->keabsahan_kantor }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_keabsahan_kantor == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->keabsahan_kantor }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data keabsahan_kantor
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->keabsahan_kantor) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->keabsahan_kantor }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->keabsahan_kantor) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_memuat))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_memuat);
                                                                        $surat_memuat = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_memuat == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_surat_memuat == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_memuat }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_memuat == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_memuat }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_memuat
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_memuat"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_memuat == 'png' or $surat_memuat == 'jpg')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-2 z-depth-bottom-1"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-original-title=".z-depth-top-1">
                                                                                @if ($data->a_surat_memuat == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_memuat }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_memuat == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_memuat }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_memuat
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_memuat) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_memuat }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_memuat) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_pendaftaran --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_rekom_agama))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_rekom_agama);
                                                                        $surat_rekom_agama = $pecah[1];
                                                                    @endphp
                                                                    {{-- status data surat_rekom_agama --}}
                                                                    @if ($surat_rekom_agama == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_surat_rekom_agama == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_agama }}</label>

                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_agama == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_agama }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_rekom_agama
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a class="btn btn-primary"
                                                                                        data-toggle="modal"
                                                                                        href="#surat_rekom_agama">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_rekom_agama == 'png' or $surat_rekom_agama == 'jpg')
                                                                        {{-- status data surat_rekom_agama --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                @if ($data->a_surat_rekom_agama == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_agama }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_agama == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_agama }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_rekom_agama
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_agama) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_agama }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_agama) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">


                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif

                                                                {{-- penutup Data surat_rekom_agama --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_rekom_skpd_kepercayaan))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_rekom_skpd_kepercayaan);
                                                                        $surat_rekom_skpd_kepercayaan = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_rekom_skpd_kepercayaan == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data surat_rekom_skpd_kepercayaan --}}
                                                                                @if ($data->a_surat_rekom_skpd_kepercayaan == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_skpd_kepercayaan == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_rekom_skpd_kepercayaan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_rekom_skpd_kepercayaan"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_rekom_skpd_kepercayaan == 'png' or $surat_rekom_skpd_kepercayaan == 'jpg')
                                                                        {{-- status data surat_rekom_skpd_kepercayaan --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_surat_rekom_skpd_kepercayaan == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_skpd_kepercayaan == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_rekom_skpd_kepercayaan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kepercayaan) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kepercayaan }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kepercayaan) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_rekom_skpd_kepercayaan --}}


                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_rekom_skpd_kerja))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_rekom_skpd_kerja);
                                                                        $surat_rekom_skpd_kerja = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_rekom_skpd_kerja == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data surat_rekom_skpd_kerja --}}
                                                                                @if ($data->a_surat_rekom_skpd_kerja == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_skpd_kerja == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_rekom_skpd_kerja
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_rekom_skpd_kerja"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_rekom_skpd_kerja == 'png' or $surat_rekom_skpd_kerja == 'jpg')
                                                                        {{-- status data surat_rekom_skpd_kerja --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_surat_rekom_skpd_kerja == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_skpd_kerja == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_rekom_skpd_kerja
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kerja) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kerja }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kerja) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_rekom_skpd_kerja --}}



                                                                {{-- penutup dari data 1 --}}
                                                                </form>
                                                            </div>
                                                        @endforeach

                                                        @foreach ($perpanjangs as $data)
                                                            <div class="tab-pane" id="data4" role="tabpanel">


                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_rekom_kesediaan))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_rekom_kesediaan);
                                                                        $surat_rekom_kesediaan = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_rekom_kesediaan == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data surat_rekom_kesediaan --}}
                                                                                @if ($data->a_surat_rekom_kesediaan == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_kesediaan == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_rekom_kesediaan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_rekom_kesediaan"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_rekom_kesediaan == 'png' or $surat_rekom_kesediaan == 'jpg')
                                                                        {{-- status data surat_rekom_kesediaan --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_surat_rekom_kesediaan == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_rekom_kesediaan == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_rekom_kesediaan
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_kesediaan) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_kesediaan }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_kesediaan) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_rekom_kesediaan --}}

                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_izasah))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_izasah);
                                                                        $surat_izasah = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_izasah == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data surat_izasah --}}
                                                                                @if ($data->a_surat_izasah == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_izasah }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_izasah == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_izasah }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_izasah
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_izasah"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_izasah == 'png' or $surat_izasah == 'jpg')
                                                                        {{-- status data surat_izasah --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_surat_izasah == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_izasah }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_izasah == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_izasah }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_izasah
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_izasah) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_izasah }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_izasah) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_izasah --}}


                                                                {{-- awal --}}
                                                                @if (!empty($data->stlk))
                                                                    @php
                                                                        $pecah = explode('.', $data->stlk);
                                                                        $stlk = $pecah[1];
                                                                    @endphp

                                                                    @if ($stlk == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data stlk --}}
                                                                                @if ($data->a_stlk == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->stlk }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_stlk == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->stlk }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data stlk
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal" href="#stlk"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($stlk == 'png' or $stlk == 'jpg')
                                                                        {{-- status data stlk --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_stlk == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->stlk }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_stlk == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->stlk }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data stlk
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->stlk) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->stlk }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->stlk) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data stlk --}}


                                                                {{-- awal --}}
                                                                @if (!empty($data->surat_kemenkumham))
                                                                    @php
                                                                        $pecah = explode('.', $data->surat_kemenkumham);
                                                                        $surat_kemenkumham = $pecah[1];
                                                                    @endphp

                                                                    @if ($surat_kemenkumham == 'pdf')
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1">
                                                                                {{-- status data surat_kemenkumham --}}
                                                                                @if ($data->a_surat_kemenkumham == 0)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_kemenkumham }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_kemenkumham == 1)
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_kemenkumham }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif

                                                                                {{-- tutup status data surat_kemenkumham
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}

                                                                                <p class="text-muted text-center p-b-5">
                                                                                    <a data-toggle="modal"
                                                                                        href="#surat_kemenkumham"
                                                                                        class="btn btn-primary">Lihat
                                                                                        Data
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($surat_kemenkumham == 'png' or $surat_kemenkumham == 'jpg')
                                                                        {{-- status data surat_kemenkumham --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="p-20 z-depth-bottom-1 mx-auto">
                                                                                @if ($data->a_surat_kemenkumham == 0)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-primary"><span
                                                                                                data-feather="loader"></span>{{ $data->surat_kemenkumham }}</label>
                                                                                    </p>
                                                                                @elseif($data->a_surat_kemenkumham == 1)
                                                                                    <p class="text-muted text-center">
                                                                                        <label
                                                                                            class="label label-inverse-success"><span
                                                                                                data-feather="check-circle"></span>{{ $data->surat_kemenkumham }}</label>
                                                                                    </p>
                                                                                @else
                                                                                @endif


                                                                                {{-- tutup status data surat_kemenkumham
									/**
									* Show the form for creating a new resource.
									* Whatapps 6289631031237
									* email : yogimaulana100@gmail.com
									* https://github.com/Ays1234
									* https://serbaotodidak.com/
									*/ --}}
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <div class="thumbnail">
                                                                                        <div class="thumb">
                                                                                            <a href="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_kemenkumham) }}"
                                                                                                data-lightbox="1"
                                                                                                data-title="{{ auth()->user()->email . '/perpanjangan/' . $data->surat_kemenkumham }}">

                                                                                                <img src="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_kemenkumham) }}"
                                                                                                    alt=""
                                                                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                                                                    style="max-height: 200px;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                @else
                                                                @endif
                                                                {{-- Data surat_kemenkumham --}}
                                                        @endforeach

                                                        </form>
                                                    </div>

                                                    {{-- yang kedua --}}



                                                    {{-- ini yang ketiga --}}
                                                </div>

                                                {{-- modal itu loh --}}

                                                {{-- beda --}}

                                            </div>
                                        </div>
                                    </div>
                                    <!-- tabbed form modal end -->
                                    @endif

                                </div>



                                @foreach ($perpanjangs as $data)
                                    <!-- Modal 1-->



                                    <!-- Modal 2-->
                                    <div id="surat_pendaftaran" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_pendaftaran }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/akte_pendirian20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                          scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                         /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_pendaftaran) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                         <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/akte_pendirian20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          data="http://127.0.0.1:8000/yrka1234/akte_pendirian20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal 3-->
                                    <div id="akte_pendirian" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->akte_pendirian }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/akte_pendirian20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                          scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                         /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->akte_pendirian) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                         <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/akte_pendirian20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          data="http://127.0.0.1:8000/yrka1234/akte_pendirian20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal adrt-->
                                    <div id="adrt" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->adrt }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/adrt20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                          scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                         /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->adrt) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                         <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/adrt20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          data="http://127.0.0.1:8000/yrka1234/adrt20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal keabsahan_kantor-->
                                    <div id="keabsahan_kantor" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->keabsahan_kantor }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/keabsahan_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                          scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                         /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->keabsahan_kantor) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                         <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          src="http://127.0.0.1:8000/yrka1234/keabsahan_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                          type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          data="http://127.0.0.1:8000/yrka1234/keabsahan_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                          width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                          height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                         ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Modal surat_keputusan-->
                                    <div id="surat_keputusan" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_keputusan }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                        src="http://127.0.0.1:8000/yrka1234/surat_keputusan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                        frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                        width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                        height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                        scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                       /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_keputusan) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                       <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                        src="http://127.0.0.1:8000/yrka1234/surat_keputusan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                        width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                        height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                       ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                        data="http://127.0.0.1:8000/yrka1234/surat_keputusan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                        width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                        height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                       ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal biodata_pengurus-->
                                    <div id="biodata_pengurus" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->biodata_pengurus }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                       type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       src="http://127.0.0.1:8000/yrka1234/biodata_pengurus20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                       width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                       height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                       scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                      /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->biodata_pengurus) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                      <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                       type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       src="http://127.0.0.1:8000/yrka1234/biodata_pengurus20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                       height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                      ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                       type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       data="http://127.0.0.1:8000/yrka1234/biodata_pengurus20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                       height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                      ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal ktp-->
                                    <div id="ktp" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->ktp }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                       type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       src="http://127.0.0.1:8000/yrka1234/ktp20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                       width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                       height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                       scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                      /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->ktp) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                      <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                       type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       src="http://127.0.0.1:8000/yrka1234/ktp20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                       height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                      ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                       type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       data="http://127.0.0.1:8000/yrka1234/ktp20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                       width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                       height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                      ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal foto-->
                                    <div id="foto" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->foto }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                      type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      src="http://127.0.0.1:8000/yrka1234/foto20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                      width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                      height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                      scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                     /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->foto) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                     <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                      type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      src="http://127.0.0.1:8000/yrka1234/foto20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                      height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                     ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                      type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      data="http://127.0.0.1:8000/yrka1234/foto20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                      height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                     ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal npwp-->
                                    <div id="npwp" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->npwp }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                      type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      src="http://127.0.0.1:8000/yrka1234/npwp20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                      width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                      height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                      scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                     /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->npwp) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                     <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                      type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      src="http://127.0.0.1:8000/yrka1234/npwp20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                      height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                     ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                      type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      data="http://127.0.0.1:8000/yrka1234/npwp20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                      width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                      height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                     ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal 3-->
                                    <div id="surat_keterangan_domisili" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_keterangan_domisili }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                   type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   src="http://127.0.0.1:8000/yrka1234/surat_keterangan_domisili20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                   width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                   height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                   scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                  /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_keterangan_domisili) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                  <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                   type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   src="http://127.0.0.1:8000/yrka1234/surat_keterangan_domisili20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                   height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                  ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                   type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   data="http://127.0.0.1:8000/yrka1234/surat_keterangan_domisili20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                   height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                  ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal 3-->
                                    <div id="foto_kantor" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->foto_kantor }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  src="http://127.0.0.1:8000/yrka1234/foto_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                  scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                 /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->foto_kantor) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                 <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  src="http://127.0.0.1:8000/yrka1234/foto_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                 ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  data="http://127.0.0.1:8000/yrka1234/foto_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                 ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal surat_ketertiban-->
                                    <div id="surat_ketertiban" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_ketertiban }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                   type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   src="http://127.0.0.1:8000/yrka1234/surat_ketertiban20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                   width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                   height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                   scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                  /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_ketertiban) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                  <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                   type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   src="http://127.0.0.1:8000/yrka1234/surat_ketertiban20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                   height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                  ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                   type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   data="http://127.0.0.1:8000/yrka1234/surat_ketertiban20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                   width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                   height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                  ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal surat_rekom_agama-->
                                    <div id="surat_rekom_agama" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_agama }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  src="http://127.0.0.1:8000/yrka1234/surat_rekom_agama20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                  scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                 /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_agama) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                 <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  src="http://127.0.0.1:8000/yrka1234/surat_rekom_agama20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                 ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  data="http://127.0.0.1:8000/yrka1234/surat_rekom_agama20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                 ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal surat_rekom_skpd_kepercayaan-->
                                    <div id="surat_rekom_skpd_kepercayaan" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kepercayaan }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  src="http://127.0.0.1:8000/yrka1234/surat_rekom_skpd20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                  scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                 /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kepercayaan) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                 <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  src="http://127.0.0.1:8000/yrka1234/surat_rekom_skpd20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                 ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                  type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  data="http://127.0.0.1:8000/yrka1234/surat_rekom_skpd20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                  width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                  height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                 ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal surat_rekom_skpd_kerja-->
                                    <div id="surat_rekom_skpd_kerja" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kerja }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/surat_rekom_skpd_kerja20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                 scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_skpd_kerja) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/surat_rekom_skpd_kerja20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 data="http://127.0.0.1:8000/yrka1234/surat_rekom_skpd_kerja20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal surat_rekom_kesediaan-->
                                    <div id="surat_rekom_kesediaan" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_kesediaan }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/surat_rekom_kesediaan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                 scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_rekom_kesediaan) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/surat_rekom_kesediaan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 data="http://127.0.0.1:8000/yrka1234/surat_rekom_kesediaan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal surat_izasah-->
                                    <div id="surat_izasah" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->surat_izasah }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/surat_izasah20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                 scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->surat_izasah) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/surat_izasah20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 data="http://127.0.0.1:8000/yrka1234/surat_izasah20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal skt-->
                                    <div id="skt" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        {{ auth()->user()->email . '/perpanjangan/' . $data->skt }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/skt20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                 scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                /> -->
                                                    <object width="100%" height="400px"
                                                        data="{{ asset(auth()->user()->email . '/perpanjangan/' . $data->skt) }}"></object>
                                                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 src="http://127.0.0.1:8000/yrka1234/skt20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></iframe> -->

                                                    <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                 type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 data="http://127.0.0.1:8000/yrka1234/skt20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                 width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                 height="700"
                                                                                                                                                                                                                                                                                                                                                                                                                                ></object> -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                <script>
                                    $(document).ready(function() {

                                        $('#openBtn').click(() => $('#myModal').modal({
                                            show: true
                                        }));

                                        $(document).on('show.bs.modal', '.modal', function() {
                                            const zIndex = 1040 + 10 * $('.modal:visible').length;
                                            $(this).css('z-index', zIndex);
                                            setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1)
                                                .addClass('modal-stack'));
                                        });

                                    });
                                </script>

                                <script>
                                    function switchStyle() {
                                        if (document.getElementById("styleSwitch").checked) {
                                            document.getElementById("gallery").classList.add("custom");
                                            document.getElementById("exampleModal").classList.add("custom");
                                        } else {
                                            document.getElementById("gallery").classList.remove("custom");
                                            document.getElementById("exampleModal").classList.remove("custom");
                                        }
                                    }
                                </script>

                                <script>
                                    function kementrianAgama() {
                                        // Get the checkbox
                                        var checkBox = document.getElementById("idkemenag");
                                        // Get the output text
                                        var text = document.getElementById("textkemenag");

                                        // If the checkbox is checked, display the output text
                                        if (checkBox.checked == true) {
                                            text.style.display = "block";
                                        } else {
                                            text.style.display = "none";
                                        }
                                    }

                                    function kepercayaan() {
                                        // Get the checkbox
                                        var checkBox = document.getElementById("idkepercayaan");
                                        // Get the output text
                                        var text = document.getElementById("textkepercayaan");

                                        // If the checkbox is checked, display the output text
                                        if (checkBox.checked == true) {
                                            text.style.display = "block";
                                        } else {
                                            text.style.display = "none";
                                        }
                                    }

                                    function serikatburuh() {
                                        // Get the checkbox
                                        var checkBox = document.getElementById("idserikatburuh");
                                        // Get the output text
                                        var text = document.getElementById("textserikatburuh");

                                        // If the checkbox is checked, display the output text
                                        if (checkBox.checked == true) {
                                            text.style.display = "block";
                                        } else {
                                            text.style.display = "none";
                                        }
                                    }
                                </script>

                            @endsection
