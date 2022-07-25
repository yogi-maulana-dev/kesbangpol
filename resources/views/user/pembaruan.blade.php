@extends('layouts.main_admin')

@section('pembaruan')
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
                                        @if ($pembaruans->isEmpty())
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Halaman Data pembaruan Organisasi Masyarakat</h5>
                                                    <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                </div>
                                                <div class="card-block">
                                                    <form method="post" action="{{ route('pembaruan.store') }}"
                                                        class="form-material" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">1. Surat Keputusan
                                                                Pengurusan</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="sk_pengurusan"
                                                                    class="form-control @error('sk_pengurusan') is-invalid @enderror">

                                                                @error('sk_pengurusan')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">2. Foto Ketua</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="foto_ketua"
                                                                    class="form-control @error('foto_ketua') is-invalid @enderror">

                                                                @error('foto_ketua')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">3. NPWP
                                                                Organisasi</label>
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
                                                            <label class="col-sm-3 col-form-label">4. Anggaran Dasar (AD)
                                                                Anggaran Rumah Tangga (ART)</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="adart"
                                                                    class="form-control @error('adart') is-invalid @enderror">

                                                                @error('adart')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">5. Surat Permohonan
                                                                Perubahan STLK</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_stlk"
                                                                    class="form-control @error('surat_stlk') is-invalid @enderror">

                                                                @error('surat_stlk')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">6. Surat Keterangan
                                                                Domisili Sekretariat Omas Yang Diterbitkan Olah Lurah /
                                                                Kepala Desa / Camat</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="surat_domisili"
                                                                    class="form-control @error('surat_domisili') is-invalid @enderror">

                                                                @error('surat_domisili')
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
                                                <h5>Data pembaruan Organisasi Masyarakat Yang diajukan</h5>
                                                <span>Data yang sudah dikirim akan di proses sampa 3 x 24 jam, jika ada
                                                    kesalahan atau kekurangan data
                                                    mohon dilakukan pengirim data yang kurang sesuai syarat yang ada.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Organisasi</th>
                                                                <th>Email Organisasi</th>
                                                                <th>Aksi</th>
                                                                <th>Status Berkas</i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pembaruans as $pembaruan)
                                                                <tr>
                                                                    <td>{{ auth()->user()->nama }}</td>
                                                                    <td>{{ auth()->user()->email }}</td>

                                                                    <td> <button
                                                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                                                            data-target="#tabbed-form"
                                                                            data-toggle="modal"><span
                                                                                data-feather="eye"></span></button>
                                                                        @if ($pembaruan->lengkap >= 11)
                                                                        @else
                                                                            <a href="{{ route('pembaruan.edit', $pembaruan->id) }}"
                                                                                class="badge bg-warning"><span
                                                                                    data-feather="edit"></span></a>
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @if ($pembaruan->lengkap >= 11)
                                                                            <div class="label-main">
                                                                                <label
                                                                                    class="label label-lg label-success"><i
                                                                                        class="fa fas fa-check"></i>
                                                                                    Data pembaruan sudah lengkap</label>
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
                                                                    {{-- <td>
                                             @if ($pembaruan->lengkap >= 11)
                                                <div class="label-main">
                                                    <label class="label label-lg label-success"><i
                                                            class="fa fas fa-check"></i>
                                                        Data sudah lengkap</label>
                                                </div>
                                            @else
                                                <div class="label-main">
                                                    <label class="label label-lg label-primary"><i
                                                            class="fa fa-spinner"></i>
                                                        Proses</label>

                                                </div>
                                            @endif
                                        </td> --}}


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
                                                                <h6 class="m-b-0">Data Perpanjagan 1</h6>
                                                            </a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                    <!-- Tab panes -->

                                                    <div class="tab-content p-t-30">
                                                        @foreach ($pembaruans as $pembaruan)
                                                            <div class="tab-pane active" id="data1" role="tabpanel">
                                                                <form class="md-float-material form-material">
                                                                    {{-- awal --}}
                                                                    @if (!empty($pembaruan->sk_pengurusan))
                                                                        @php
                                                                            $pecah = explode('.', $pembaruan->sk_pengurusan);
                                                                            $sk_pengurusan = $pecah[1];
                                                                        @endphp

                                                                        {{-- status data sk_pengurusan --}}
                                                                        @if ($sk_pengurusan == 'pdf')
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_sk_pengurusan == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->sk_pengurusan }}</label>

                                                                                        </p>
                                                                                    @elseif($pembaruan->a_sk_pengurusan == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->sk_pengurusan }}</label>
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
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <a class="btn btn-primary"
                                                                                            data-toggle="modal"
                                                                                            href="#sk_pengurusan">Lihat
                                                                                            Data
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @elseif ($sk_pengurusan == 'png' or $sk_pengurusan == 'jpg')
                                                                            {{-- status data sk_pengurusan --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_sk_pengurusan == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                                                        </p>
                                                                                    @elseif($pembaruan->a_sk_pengurusan == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                                                        </p>
                                                                                    @else
                                                                                    @endif
                                                                                    </p>

                                                                                    {{-- tutup status data sk_pengurusan
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
                                                                                                <a href="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->sk_pengurusan) }}"
                                                                                                    data-lightbox="1"
                                                                                                    data-title="{{ auth()->user()->email . '/pembaruan/' . $pembaruan->sk_pengurusan }}">

                                                                                                    <img src="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->sk_pengurusan) }}"
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

                                                                    {{-- penutup Data sk_pengurusan --}}

                                                                    {{-- awal --}}
                                                                    @if (!empty($pembaruan->foto_ketua))
                                                                        @php
                                                                            $pecah = explode('.', $pembaruan->foto_ketua);
                                                                            $foto_ketua = $pecah[1];
                                                                        @endphp

                                                                        {{-- status data foto_ketua --}}
                                                                        @if ($foto_ketua == 'pdf')
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_foto_ketua == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->foto_ketua }}</label>

                                                                                        </p>
                                                                                    @elseif($pembaruan->a_foto_ketua == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->foto_ketua }}</label>
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
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <a class="btn btn-primary"
                                                                                            data-toggle="modal"
                                                                                            href="#foto_ketua">Lihat
                                                                                            Data
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @elseif ($foto_ketua == 'png' or $foto_ketua == 'jpg')
                                                                            {{-- status data foto_ketua --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_foto_ketua == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->foto_ketua }}</label>
                                                                                        </p>
                                                                                    @elseif($pembaruan->a_foto_ketua == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->foto_ketua }}</label>
                                                                                        </p>
                                                                                    @else
                                                                                    @endif
                                                                                    </p>

                                                                                    {{-- tutup status data foto_ketua
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
                                                                                                <a href="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"
                                                                                                    data-lightbox="1"
                                                                                                    data-title="{{ auth()->user()->email . '/pembaruan/' . $pembaruan->foto_ketua }}">

                                                                                                    <img src="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"
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

                                                                    {{-- penutup Data foto_ketua --}}

                                                                    {{-- awal --}}
                                                                    @if (!empty($pembaruan->npwp))
                                                                        @php
                                                                            $pecah = explode('.', $pembaruan->npwp);
                                                                            $npwp = $pecah[1];
                                                                        @endphp

                                                                        {{-- status data npwp --}}
                                                                        @if ($npwp == 'pdf')
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_npwp == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->npwp }}</label>

                                                                                        </p>
                                                                                    @elseif($pembaruan->a_npwp == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->npwp }}</label>
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
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <a class="btn btn-primary"
                                                                                            data-toggle="modal"
                                                                                            href="#npwp">Lihat
                                                                                            Data
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @elseif ($npwp == 'png' or $npwp == 'jpg')
                                                                            {{-- status data npwp --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_npwp == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->npwp }}</label>
                                                                                        </p>
                                                                                    @elseif($pembaruan->a_npwp == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->npwp }}</label>
                                                                                        </p>
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
                                                                                    <div class="col-lg-12 col-sm-12">
                                                                                        <div class="thumbnail">
                                                                                            <div class="thumb">
                                                                                                <a href="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->npwp) }}"
                                                                                                    data-lightbox="1"
                                                                                                    data-title="{{ auth()->user()->email . '/pembaruan/' . $pembaruan->npwp }}">

                                                                                                    <img src="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->npwp) }}"
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

                                                                    {{-- penutup Data npwp --}}




                                                                    {{-- awal --}}
                                                                    @if (!empty($pembaruan->surat_stlk))
                                                                        @php
                                                                            $pecah = explode('.', $pembaruan->surat_stlk);
                                                                            $surat_stlk = $pecah[1];
                                                                        @endphp

                                                                        {{-- status data surat_stlk --}}
                                                                        @if ($surat_stlk == 'pdf')
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_surat_stlk == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->surat_stlk }}</label>

                                                                                        </p>
                                                                                    @elseif($pembaruan->a_surat_stlk == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->surat_stlk }}</label>
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
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <a class="btn btn-primary"
                                                                                            data-toggle="modal"
                                                                                            href="#surat_stlk">Lihat
                                                                                            Data
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @elseif ($surat_stlk == 'png' or $surat_stlk == 'jpg')
                                                                            {{-- status data surat_stlk --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_surat_stlk == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->surat_stlk }}</label>
                                                                                        </p>
                                                                                    @elseif($pembaruan->a_surat_stlk == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->surat_stlk }}</label>
                                                                                        </p>
                                                                                    @else
                                                                                    @endif
                                                                                    </p>

                                                                                    {{-- tutup status data surat_stlk
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
                                                                                                <a href="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"
                                                                                                    data-lightbox="1"
                                                                                                    data-title="{{ auth()->user()->email . '/pembaruan/' . $pembaruan->surat_stlk }}">

                                                                                                    <img src="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"
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

                                                                    {{-- penutup Data surat_stlk --}}

                                                                    {{-- awal --}}
                                                                    @if (!empty($pembaruan->adart))
                                                                        @php
                                                                            $pecah = explode('.', $pembaruan->adart);
                                                                            $adart = $pecah[1];
                                                                        @endphp

                                                                        {{-- status data adart --}}
                                                                        @if ($adart == 'pdf')
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_adart == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->adart }}</label>

                                                                                        </p>
                                                                                    @elseif($pembaruan->a_adart == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->adart }}</label>
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
                                                                                    <p
                                                                                        class="text-muted text-center p-b-5">
                                                                                        <a class="btn btn-primary"
                                                                                            data-toggle="modal"
                                                                                            href="#adart">Lihat
                                                                                            Data
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @elseif ($adart == 'png' or $adart == 'jpg')
                                                                            {{-- status data adart --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="p-20 z-depth-bottom-1">
                                                                                    @if ($pembaruan->a_adart == 0)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-primary"><span
                                                                                                    data-feather="loader"></span>{{ $pembaruan->adart }}</label>
                                                                                        </p>
                                                                                    @elseif($pembaruan->a_adart == 1)
                                                                                        <p
                                                                                            class="text-muted text-center p-b-5">
                                                                                            <label
                                                                                                class="label label-inverse-success"><span
                                                                                                    data-feather="check-circle"></span>{{ $pembaruan->adart }}</label>
                                                                                        </p>
                                                                                    @else
                                                                                    @endif
                                                                                    </p>

                                                                                    {{-- tutup status data adart
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
                                                                                                <a href="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->adart) }}"
                                                                                                    data-lightbox="1"
                                                                                                    data-title="{{ auth()->user()->email . '/pembaruan/' . $pembaruan->adart }}">

                                                                                                    <img src="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->adart) }}"
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

                                                                    {{-- penutup Data adart --}}



                                                                    {{-- penutup dari data 1 --}}
                                                                </form>
                                                            </div>
                                                        @endforeach

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

                                    @foreach ($pembaruans as $pembaruan)
                                        <!-- Modal 1-->
                                        <div id="sk_pengurusan" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">
                                                            {{ auth()->user()->email . '/pembaruan/' . $pembaruan->sk_pengurusan }}
                                                        </h4>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <object width="100%" height="400px"
                                                            data="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->sk_pengurusan) }}"></object>

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

                                    @foreach ($pembaruans as $pembaruan)
                                        <!-- Modal 1-->
                                        <div id="foto_ketua" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">
                                                            {{ auth()->user()->email . '/pembaruan/' . $pembaruan->foto_ketua }}
                                                        </h4>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <object width="100%" height="400px"
                                                            data="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"></object>

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

                                    @foreach ($pembaruans as $pembaruan)
                                        <!-- Modal 1-->
                                        <div id="npwp" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">
                                                            {{ auth()->user()->email . '/pembaruan/' . $pembaruan->npwp }}
                                                        </h4>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <object width="100%" height="400px"
                                                            data="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->npwp) }}"></object>

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

                                    @foreach ($pembaruans as $pembaruan)
                                        <!-- Modal 1-->
                                        <div id="adart" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">
                                                            {{ auth()->user()->email . '/pembaruan/' . $pembaruan->adart }}
                                                        </h4>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <object width="100%" height="400px"
                                                            data="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->adart) }}"></object>

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



                                    @foreach ($pembaruans as $pembaruan)
                                        <!-- Modal 1-->
                                        <div id="surat_stlk" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">
                                                            {{ auth()->user()->email . '/pembaruan/' . $pembaruan->surat_stlk }}
                                                        </h4>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <object width="100%" height="400px"
                                                            data="{{ asset(auth()->user()->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"></object>

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


                                        <
                                        script >
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

                                @endsection
