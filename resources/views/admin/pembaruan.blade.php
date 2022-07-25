@extends('layouts.main_login_admin')

@section('pembaruan')
    <style>
        .modal {
            overflow-y: auto;
        }
    </style>


    <div class="card">
        <div class="card-block">

            <div class="card-header">
                <h5>Data Organisasi Masyarakat Yang diajukan</h5>
                <span>Data yang sudah dikirim akan di proses sampa 3 x 24 jam, jika ada kesalahan atau kekurangan data
                    mohon dilakukan pengirim data yang kurang sesuai syarat yang ada.</span>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Nama Organisasi</th>
                                <th>Email</i></th>
                                {{-- <th>Nomor Whatsapp</i></th> --}}
                                <th>Data Upload</i></th>
                                <th>Status</i></th>
                                <th>Kirim Email</i></th>
                                <th>Download File</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembaruans as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->email }}</td>

                                    <td>

                                        <button
                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                            data-target="#tabbed-form-{{ $data->id }}" data-titleku="DataOrkemas"
                                            data-toggle="modal"><span data-feather="eye"></span></button>

                                    </td>

                                    <td>
                                        @if ($data->lengkap >= 11)
                                            <div class="label-main">
                                                <label class="label label-lg label-success"><i class="fa fas fa-check"></i>
                                                    Data sudah lengkap</label>
                                            </div>
                                        @else
                                            <div class="label-main">
                                                <label class="label label-lg label-primary"><i class="fa fa-spinner"></i>
                                                    Proses</label>

                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($data->lengkap >= 11)
                                            <form action="/admin/send/mail">
                                                @csrf
                                                <input class="form-control" type="hidden" name="nama"
                                                    value="{{ $data->nama }}">
                                                <input class="form-control" type="hidden" name="email"
                                                    value="{{ $data->email }}">
                                                <div class="text-center">
                                                    <button
                                                        class="btn waves-effect waves-dark btn-success btn-outline-success badge bg-success"
                                                        data-titleku="Kirim Email"><span data-feather="mail"></span> Kirim
                                                        notifikasi</button>
                                                </div>
                                            </form>
                                        @else
                                            <p>Datang belum lengkap</p>
                                        @endif
                                        {{-- <a href="{{ route('admin.download-pembaruan', $data->email) }}" target="_blank" rel="noopener"
                                class="btn btn-primary btn-sm text-white">
                                Download
                                </a> --}}

                                    </td>
                                    <td>
                                        @if ($data->lengkap >= 11)
                                            <a href="{{ route('admin.download-pembaruan', $data->email) }}"
                                                target="_blank" rel="noopener" class="btn btn-success btn-sm text-white">
                                                Download
                                            </a>
                                        @else
                                            <p>Datang belum lengkap</p>
                                        @endif

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
    @foreach ($pembaruans as $pembaruan)
        <div id="tabbed-form-{{ $pembaruan->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-dark">
                                <a class="nav-link active" data-toggle="tab" href="#{{ $pembaruan->sk_pengurusan }}"
                                    role="tab">
                                    <h6 class="m-b-0">Data 1</h6>
                                </a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-t-30">
                            <div class="tab-pane active" id="{{ $pembaruan->sk_pengurusan }}" role="tabpanel">


                                <form method="post" action="{{ route('admin.pembaruan.update') }}"
                                    class="float-material form-material" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($datapembaruan as $menudata)
                                        <input type="hidden" name="id" value="{{ $menudata->id }}">
                                    @endforeach

                                    {{-- kodong data sk_pengurusan --}}



                                    @if (!empty($pembaruan->sk_pengurusan))
                                        @php
                                            $pecah = explode('.', $pembaruan->sk_pengurusan);
                                            $sk_pengurusan = $pecah[1];
                                        @endphp


                                        @if ($sk_pengurusan == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_sk_pengurusan --}}
                                                    @if ($pembaruan->a_sk_pengurusan == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#sk_pengurusan-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">1.	Surat Keputusan Tentang Susunan Pengurus Ormas,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="2"
                                                                                {{ $pembaruan->a_sk_pengurusan == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="0"
                                                                                {{ $pembaruan->a_sk_pengurusan == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_sk_pengurusan == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#sk_pengurusan-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">1.	Surat Keputusan Tentang Susunan Pengurus Ormas,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="2"
                                                                                {{ $pembaruan->a_sk_pengurusan == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="0"
                                                                                {{ $pembaruan->a_sk_pengurusan == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_sk_pengurusan --}}

                                            {{-- buka JPG --}}
                                        @elseif ($sk_pengurusan == 'png' or $sk_pengurusan == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_sk_pengurusan JPG --}}
                                                    @if ($pembaruan->a_sk_pengurusan == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->sk_pengurusan }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->sk_pengurusan) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->sk_pengurusan }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->sk_pengurusan) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">1.	Surat Keputusan Tentang Susunan Pengurus Ormas,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="2"
                                                                                {{ $pembaruan->a_sk_pengurusan == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="0"
                                                                                {{ $pembaruan->a_sk_pengurusan == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_sk_pengurusan == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">1.	Surat Keputusan Tentang Susunan Pengurus Ormas,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="2"
                                                                                {{ $pembaruan->a_sk_pengurusan == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_sk_pengurusan"
                                                                                name="a_sk_pengurusan" value="0"
                                                                                {{ $pembaruan->a_sk_pengurusan == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->sk_pengurusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_sk_pengurusan JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data sk_pengurusan --}}



                                    {{-- kodong data foto_ketua --}}
                                    @if (!empty($pembaruan->foto_ketua))
                                        @php
                                            $pecah = explode('.', $pembaruan->foto_ketua);
                                            $foto_ketua = $pecah[1];
                                        @endphp

                                        @if ($foto_ketua == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_foto_ketua --}}
                                                    @if ($pembaruan->a_foto_ketua == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->foto_ketua }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#foto_ketua-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="2"
                                                                                {{ $pembaruan->a_foto_ketua == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="0"
                                                                                {{ $pembaruan->a_foto_ketua == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_foto_ketua == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->foto_ketua }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#foto_ketua-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="2"
                                                                                {{ $pembaruan->a_foto_ketua == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="0"
                                                                                {{ $pembaruan->a_foto_ketua == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->foto_ketua }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_foto_ketua --}}

                                            {{-- buka JPG --}}
                                        @elseif ($foto_ketua == 'png' or $foto_ketua == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_foto_ketua JPG --}}
                                                    @if ($pembaruan->a_foto_ketua == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->foto_ketua }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="2"
                                                                                {{ $pembaruan->a_foto_ketua == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="0"
                                                                                {{ $pembaruan->a_foto_ketua == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_foto_ketua == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->foto_ketua }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="2"
                                                                                {{ $pembaruan->a_foto_ketua == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_foto_ketua"
                                                                                name="a_foto_ketua" value="0"
                                                                                {{ $pembaruan->a_foto_ketua == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->foto_ketua }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_foto_ketua JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data foto_ketua --}}

                                    {{-- kodong data npwp --}}
                                    @if (!empty($pembaruan->npwp))
                                        @php
                                            $pecah = explode('.', $pembaruan->npwp);
                                            $npwp = $pecah[1];
                                        @endphp

                                        @if ($npwp == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_npwp --}}
                                                    @if ($pembaruan->a_npwp == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->npwp }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#npwp-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="2"
                                                                                {{ $pembaruan->a_npwp == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="0"
                                                                                {{ $pembaruan->a_npwp == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_npwp == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->npwp }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#npwp-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="2"
                                                                                {{ $pembaruan->a_npwp == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="0"
                                                                                {{ $pembaruan->a_npwp == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->npwp }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_npwp --}}

                                            {{-- buka JPG --}}
                                        @elseif ($npwp == 'png' or $npwp == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_npwp JPG --}}
                                                    @if ($pembaruan->a_npwp == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->npwp }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->npwp) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->npwp }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->npwp) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="2"
                                                                                {{ $pembaruan->a_npwp == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="0"
                                                                                {{ $pembaruan->a_npwp == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_npwp == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->npwp }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->npwp) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->npwp }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->npwp) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3.	Nomor Pokolk Wajib Pajak Atas Nama Organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="2"
                                                                                {{ $pembaruan->a_npwp == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_npwp"
                                                                                name="a_npwp" value="0"
                                                                                {{ $pembaruan->a_npwp == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->npwp }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_npwp JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data npwp --}}




                                    {{-- kodong data adart --}}
                                    @if (!empty($pembaruan->adart))
                                        @php
                                            $pecah = explode('.', $pembaruan->adart);
                                            $adart = $pecah[1];
                                        @endphp

                                        @if ($adart == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_adart --}}
                                                    @if ($pembaruan->a_adart == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->adart }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#adart-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">4.	Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="2"
                                                                                {{ $pembaruan->a_adart == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="0"
                                                                                {{ $pembaruan->a_adart == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_adart == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->adart }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#adart-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">4.	Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="2"
                                                                                {{ $pembaruan->a_adart == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="0"
                                                                                {{ $pembaruan->a_adart == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->adart }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_adart --}}

                                            {{-- buka JPG --}}
                                        @elseif ($adart == 'png' or $adart == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_adart JPG --}}
                                                    @if ($pembaruan->a_adart == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->adart }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->adart) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->adart }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->adart) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">4.	Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="2"
                                                                                {{ $pembaruan->a_adart == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="0"
                                                                                {{ $pembaruan->a_adart == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_adart == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->adart }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->adart) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->adart }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->adart) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">4.	Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="2"
                                                                                {{ $pembaruan->a_adart == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adart"
                                                                                name="a_adart" value="0"
                                                                                {{ $pembaruan->a_adart == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->adart }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_adart JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data adart --}}

                                       {{-- kodong data surat_domisili --}}
                                    @if (!empty($pembaruan->surat_domisili))
                                        @php
                                            $pecah = explode('.', $pembaruan->surat_domisili);
                                            $surat_domisili = $pecah[1];
                                        @endphp

                                        @if ($surat_domisili == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_domisili --}}
                                                    @if ($pembaruan->a_surat_domisili == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->surat_domisili }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_domisili-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">6.	Surat Keterangan Domisili Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala Desa / Camat
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="2"
                                                                                {{ $pembaruan->a_surat_domisili == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="0"
                                                                                {{ $pembaruan->a_surat_domisili == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_surat_domisili == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->surat_domisili }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_domisili-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">6.	Surat Keterangan Domisili Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala Desa / Camat
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="2"
                                                                                {{ $pembaruan->a_surat_domisili == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="0"
                                                                                {{ $pembaruan->a_surat_domisili == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->surat_domisili }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_surat_domisili --}}

                                            {{-- buka JPG --}}
                                        @elseif ($surat_domisili == 'png' or $surat_domisili == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_domisili JPG --}}
                                                    @if ($pembaruan->a_surat_domisili == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->surat_domisili }}</label>
                                                        </p>
                                                        {{-- tutup status data surat_domisili
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_domisili) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->surat_domisili }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_domisili) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">6.	Surat Keterangan Domisili Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala Desa / Camat
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="2"
                                                                                {{ $pembaruan->a_surat_domisili == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="0"
                                                                                {{ $pembaruan->a_surat_domisili == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_surat_domisili == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->surat_domisili }}</label>
                                                        </p>

                                                        {{-- tutup status data surat_domisili
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_domisili) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->surat_domisili }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_domisili) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">6.	Surat Keterangan Domisili Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala Desa / Camat
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="2"
                                                                                {{ $pembaruan->a_surat_domisili == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_domisili"
                                                                                name="a_surat_domisili" value="0"
                                                                                {{ $pembaruan->a_surat_domisili == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->surat_domisili }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_surat_domisili JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data surat_domisili --}}

                                    {{-- kodong data surat_stlk --}}
                                    @if (!empty($pembaruan->surat_stlk))
                                        @php
                                            $pecah = explode('.', $pembaruan->surat_stlk);
                                            $surat_stlk = $pecah[1];
                                        @endphp

                                        @if ($surat_stlk == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_stlk --}}
                                                    @if ($pembaruan->a_surat_stlk == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->surat_stlk }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_stlk-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">Apakah data surat_stlk dan
                                                                        tujuan organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="2"
                                                                                {{ $pembaruan->a_surat_stlk == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="0"
                                                                                {{ $pembaruan->a_surat_stlk == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_surat_stlk == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->surat_stlk }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_stlk-{{ $pembaruan->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">Apakah data surat_stlk dan
                                                                        tujuan organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="2"
                                                                                {{ $pembaruan->a_surat_stlk == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="0"
                                                                                {{ $pembaruan->a_surat_stlk == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->surat_stlk }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_surat_stlk --}}

                                            {{-- buka JPG --}}
                                        @elseif ($surat_stlk == 'png' or $surat_stlk == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_stlk JPG --}}
                                                    @if ($pembaruan->a_surat_stlk == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $pembaruan->surat_stlk }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->surat_stlk }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">Apakah data surat_stlk dan
                                                                        tujuan organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="2"
                                                                                {{ $pembaruan->a_surat_stlk == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="0"
                                                                                {{ $pembaruan->a_surat_stlk == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif ($pembaruan->a_surat_stlk == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $pembaruan->surat_stlk }}</label>
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
                                                                    <a href="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $pembaruan->email . '/pembaruan/' . $pembaruan->surat_stlk }}">

                                                                        <img src="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->surat_stlk) }}"
                                                                            alt=""
                                                                            class="img-fluid img-thumbnail mx-auto d-block"
                                                                            style="max-height: 200px;">


                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">Apakah data surat_stlk dan
                                                                        tujuan organisasi
                                                                        sesusai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="2"
                                                                                {{ $pembaruan->a_surat_stlk == 2 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-success">Lengkap</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_stlk"
                                                                                name="a_surat_stlk" value="0"
                                                                                {{ $pembaruan->a_surat_stlk == 0 ? 'checked' : '' }}>
                                                                            <span class="cr">
                                                                                <i
                                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                            </span>
                                                                            <span
                                                                                class="label label-lg label-danger">Tidak</span>
                                                                        </label>
                                                                    </div>
                                                                    <span class="messages"></span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-danger"><span
                                                                    data-feather="x-circle"></span>{{ $pembaruan->surat_stlk }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_surat_stlk JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data surat_stlk --}}



                                    <div class="col-lg-12">
                                        <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title=".z-depth-top-1">
                                            <p class="text-muted text-center p-b-5">Keterangan Diisi sesuai hasil
                                                validasi</p>
                                            <div class="form-group form-primary">
                                                <textarea rows="10" cols="5" class="form-control" name="ket" placeholder="Keterangan">{{ $data->ket }}</textarea>
                                                <span class="form-bar"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" id="total" disabled="disabled" />

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <button type="submit"
                                                class="btn waves-effect waves-light hor-grd btn-grd-success"
                                                id="cuy">Simpan
                                                Data</button>
                                        </div>
                                    </div>

                                    {{-- </form> --}}
                            </div>


                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- tabbed form modal end -->

        <!-- Modal 1-->
        <div id="sk_pengurusan-{{ $pembaruan->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $pembaruan->email . '/pembaruan/' . $pembaruan->sk_pengurusan }}
                        </h4>
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
                            data="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->sk_pengurusan) }}"></object>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 1-->
        <div id="foto_ketua-{{ $pembaruan->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua }}
                        </h4>
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
                            data="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->foto_ketua) }}"></object>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal 1-->
        <div id="npwp-{{ $pembaruan->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $pembaruan->email . '/pembaruan/' . $pembaruan->npwp }}
                        </h4>
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
                            data="{{ asset($pembaruan->email . '/pembaruan/' . $pembaruan->npwp) }}"></object>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).on('click', 'input[name="a_sk_pengurusan"]', function() {
            $('input[name="a_sk_pengurusan"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_foto_ketua"]', function() {
            $('input[name="a_foto_ketua"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_npwp"]', function() {
            $('input[name="a_npwp"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_keabsahan_kantor"]', function() {
            $('input[name="a_keabsahan_kantor"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_npwp"]', function() {
            $('input[name="a_npwp"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_keputusan"]', function() {
            $('input[name="a_surat_keputusan"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_domisili"]', function() {
            $('input[name="a_surat_domisili"]').not(this).prop('checked', false);
        });


        $(document).on('click', 'input[name="a_akte_pendirian"]', function() {
            $('input[name="a_akte_pendirian"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_ktp"]', function() {
            $('input[name="a_ktp"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_foto"]', function() {
            $('input[name="a_foto"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_adart"]', function() {
            $('input[name="a_adart"]').not(this).prop('checked', false);
        });

     

        $(document).on('click', 'input[name="a_foto_kantor"]', function() {
            $('input[name="a_foto_kantor"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_ketertiban"]', function() {
            $('input[name="a_surat_ketertiban"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_tidak_avilasi"]', function() {
            $('input[name="a_surat_tidak_avilasi"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_konflik"]', function() {
            $('input[name="a_surat_konflik"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_hak_cipta"]', function() {
            $('input[name="a_surat_hak_cipta"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_laporan"]', function() {
            $('input[name="a_surat_laporan"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_absah"]', function() {
            $('input[name="a_surat_absah"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_rekom_agama"]', function() {
            $('input[name="a_surat_rekom_agama"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_rekom_skpd"]', function() {
            $('input[name="a_surat_rekom_skpd"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_rekom_skpd_kerja"]', function() {
            $('input[name="a_surat_rekom_skpd_kerja"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_rekom_kesediaan"]', function() {
            $('input[name="a_surat_rekom_kesediaan"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_izasah"]', function() {
            $('input[name="a_surat_izasah"]').not(this).prop('checked', false);
        });
        $(document).on('click', 'input[name="a_surat_stlk"]', function() {
            $('input[name="a_surat_stlk"]').not(this).prop('checked', false);
        });
    </script>



@endsection
