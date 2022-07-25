@extends('layouts.main_login_admin')

@section('menudata_dashboard')
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
                            @foreach ($datas as $data)
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
                                        @if ($data->lengkap >= 30)
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
                                        @if ($data->lengkap >= 30)
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
                                        {{-- <a href="/admin/menudata/download/{{$data->id}}" target="_blank" rel="noopener"
                                class="btn btn-primary btn-sm text-white">
                                Download
                                </a> --}}

                                    </td>
                                    <td>
                                        @if ($data->lengkap >= 30)
                                            <a href="/admin/menudata/download/{{ $data->email }}" target="_blank"
                                                rel="noopener" class="btn btn-success btn-sm text-white">
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
    @foreach ($datas as $data)
        <div id="tabbed-form-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-dark">
                                <a class="nav-link active" data-toggle="tab" href="#{{ $data->surat_kemenkumham }}"
                                    role="tab">
                                    <h6 class="m-b-0">Data 1</h6>
                                </a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item waves-effect waves-dark">
                                <a class="nav-link" data-toggle="tab" href="#{{ $data->surat_pendaftaran }}"
                                    role="tab">
                                    <h6 class="m-b-0">Data 2</h6>
                                </a>
                                <div class="slide"></div>
                            </li>

                            <li class="nav-item waves-effect waves-dark">
                                <a class="nav-link" data-toggle="tab" href="#{{ $data->ktp }}" role="tab">
                                    <h6 class="m-b-0">Data 3</h6>
                                </a>
                                <div class="slide"></div>
                            </li>

                            <li class="nav-item waves-effect waves-dark">
                                <a class="nav-link" data-toggle="tab" href="#{{ $data->adrt }}" role="tab">
                                    <h6 class="m-b-0">Data 4</h6>
                                </a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-t-30">
                            <div class="tab-pane active" id="{{ $data->surat_kemenkumham }}" role="tabpanel">


                                <form method="post" action="{{ route('admin.menudata.update') }}"
                                    class="float-material form-material" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($datacuk as $menudata)
                                        <input type="hidden" name="id" value="{{ $menudata->id }}">
                                    @endforeach

                                    {{-- kodong data surat_kemenkumham --}}


                                    {{-- kodong data surat_pendaftaran --}}
                                    @if (!empty($data->surat_pendaftaran))
                                        @php
                                            $pecah = explode('.', $data->surat_pendaftaran);
                                            $surat_pendaftaran = $pecah[1];
                                        @endphp

                                        @if ($surat_pendaftaran == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_pendaftaran --}}
                                                    @if ($data->a_surat_pendaftaran == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->surat_pendaftaran }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_pendaftaran-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">1. Surat Permohonan
                                                                        Pendaftaran,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="2"
                                                                                {{ $data->a_surat_pendaftaran == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="0"
                                                                                {{ $data->a_surat_pendaftaran == 0 ? 'checked' : '' }}>
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
                                                    @elseif ($data->a_surat_pendaftaran == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->surat_pendaftaran }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_pendaftaran-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">1. Surat Permohonan
                                                                        Pendaftaran,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="2"
                                                                                {{ $data->a_surat_pendaftaran == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="0"
                                                                                {{ $data->a_surat_pendaftaran == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->surat_pendaftaran }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_surat_pendaftaran --}}

                                            {{-- buka JPG --}}
                                        @elseif ($surat_pendaftaran == 'png' or $surat_pendaftaran == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_pendaftaran JPG --}}
                                                    @if ($data->a_surat_pendaftaran == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->surat_pendaftaran }}</label>
                                                        </p>
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
                                                                    <a href="{{ asset($data->email . '/' . $data->surat_pendaftaran) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->surat_pendaftaran }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->surat_pendaftaran) }}"
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
                                                                    <label class="col-sm-12">1. Surat Permohonan
                                                                        Pendaftaran,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="2"
                                                                                {{ $data->a_surat_pendaftaran == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="0"
                                                                                {{ $data->a_surat_pendaftaran == 0 ? 'checked' : '' }}>
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
                                                    @elseif ($data->a_surat_pendaftaran == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->surat_pendaftaran }}</label>
                                                        </p>

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
                                                                    <a href="{{ asset($data->email . '/' . $data->surat_pendaftaran) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->surat_pendaftaran }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->surat_pendaftaran) }}"
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
                                                                    <label class="col-sm-12">1. Surat Permohonan
                                                                        Pendaftaran,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="2"
                                                                                {{ $data->a_surat_pendaftaran == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox"
                                                                                id="a_surat_pendaftaran"
                                                                                name="a_surat_pendaftaran" value="0"
                                                                                {{ $data->a_surat_pendaftaran == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->surat_pendaftaran }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_surat_pendaftaran JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data surat_pendaftaran --}}


                                    {{-- kodong data akte_pendirian --}}
                                    @if (!empty($data->akte_pendirian))
                                        @php
                                            $pecah = explode('.', $data->akte_pendirian);
                                            $akte_pendirian = $pecah[1];
                                        @endphp

                                        @if ($akte_pendirian == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_akte_pendirian --}}
                                                    @if ($data->a_akte_pendirian == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->akte_pendirian }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#akte_pendirian-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">2. Akte Pendirian Ormas Atau
                                                                        Status Yang Disahkan Oleh Notaris,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="2"
                                                                                {{ $data->a_akte_pendirian == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="0"
                                                                                {{ $data->a_akte_pendirian == 0 ? 'checked' : '' }}>
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
                                                    @elseif ($data->a_akte_pendirian == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->akte_pendirian }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#akte_pendirian-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">2. Akte Pendirian Ormas Atau
                                                                        Status Yang Disahkan Oleh Notaris,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="2"
                                                                                {{ $data->a_akte_pendirian == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="0"
                                                                                {{ $data->a_akte_pendirian == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->akte_pendirian }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_akte_pendirian --}}

                                            {{-- buka JPG --}}
                                        @elseif ($akte_pendirian == 'png' or $akte_pendirian == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_akte_pendirian JPG --}}
                                                    @if ($data->a_akte_pendirian == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->akte_pendirian }}</label>
                                                        </p>
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
                                                                    <a href="{{ asset($data->email . '/' . $data->akte_pendirian) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->akte_pendirian }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->akte_pendirian) }}"
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
                                                                    <label class="col-sm-12">2. Akte Pendirian Ormas Atau
                                                                        Status Yang Disahkan Oleh Notaris,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="2"
                                                                                {{ $data->a_akte_pendirian == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="0"
                                                                                {{ $data->a_akte_pendirian == 0 ? 'checked' : '' }}>
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
                                                    @elseif ($data->a_akte_pendirian == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->akte_pendirian }}</label>
                                                        </p>

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
                                                                    <a href="{{ asset($data->email . '/' . $data->akte_pendirian) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->akte_pendirian }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->akte_pendirian) }}"
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
                                                                    <label class="col-sm-12">2. Akte Pendirian Ormas Atau
                                                                        Status Yang Disahkan Oleh Notaris,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="2"
                                                                                {{ $data->a_akte_pendirian == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_akte_pendirian"
                                                                                name="a_akte_pendirian" value="0"
                                                                                {{ $data->a_akte_pendirian == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->akte_pendirian }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_akte_pendirian JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data akte_pendirian --}}



                                    {{-- kodong data adrt --}}
                                    @if (!empty($data->adrt))
                                        @php
                                            $pecah = explode('.', $data->adrt);
                                            $adrt = $pecah[1];
                                        @endphp

                                        @if ($adrt == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_adrt --}}
                                                    @if ($data->a_adrt == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->adrt }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#adrt-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3. Anggaran Dasar (AD)
                                                                        Anggaran Rumah Tangga (ART) Yang Disahkan Oleh
                                                                        Notaris ,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="2"
                                                                                {{ $data->a_adrt == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="0"
                                                                                {{ $data->a_adrt == 0 ? 'checked' : '' }}>
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
                                                    @elseif($data->a_adrt == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->adrt }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#adrt-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">3. Anggaran Dasar (AD)
                                                                        Anggaran Rumah Tangga (ART) Yang Disahkan Oleh
                                                                        Notaris ,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="2"
                                                                                {{ $data->a_adrt == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="0"
                                                                                {{ $data->a_adrt == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->adrt }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_adrt --}}

                                            {{-- buka JPG --}}
                                        @elseif($adrt == 'png' or $adrt == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_adrt JPG --}}
                                                    @if ($data->a_adrt == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->adrt }}</label>
                                                        </p>
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
                                                                    <a href="{{ asset($data->email . '/' . $data->adrt) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->adrt }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->adrt) }}"
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
                                                                    <label class="col-sm-12">3. Anggaran Dasar (AD)
                                                                        Anggaran Rumah Tangga (ART) Yang Disahkan Oleh
                                                                        Notaris ,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="2"
                                                                                {{ $data->a_adrt == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="0"
                                                                                {{ $data->a_adrt == 0 ? 'checked' : '' }}>
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
                                                    @elseif($data->a_adrt == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->adrt }}</label>
                                                        </p>

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
                                                                    <a href="{{ asset($data->email . '/' . $data->adrt) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->adrt }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->adrt) }}"
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
                                                                    <label class="col-sm-12">3. Anggaran Dasar (AD)
                                                                        Anggaran Rumah Tangga (ART) Yang Disahkan Oleh
                                                                        Notaris ,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="2"
                                                                                {{ $data->a_adrt == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_adrt"
                                                                                name="a_adrt" value="0"
                                                                                {{ $data->a_adrt == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->adrt }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_adrt JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data adrt --}}




                                    {{-- kodong data tujuan --}}
                                    @if (!empty($data->tujuan))
                                        @php
                                            $pecah = explode('.', $data->tujuan);
                                            $tujuan = $pecah[1];
                                        @endphp

                                        @if ($tujuan == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_tujuan --}}
                                                    @if ($data->a_tujuan == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->tujuan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#tujuan-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">4. Tujuan Dan Program kerja
                                                                        Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="2"
                                                                                {{ $data->a_tujuan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="0"
                                                                                {{ $data->a_tujuan == 0 ? 'checked' : '' }}>
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
                                                    @elseif ($data->a_tujuan == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->tujuan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#tujuan-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">4. Tujuan Dan Program kerja
                                                                        Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="2"
                                                                                {{ $data->a_tujuan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="0"
                                                                                {{ $data->a_tujuan == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->tujuan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- tutup aktif a_tujuan --}}

                                            {{-- buka JPG --}}
                                        @elseif ($tujuan == 'png' or $tujuan == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_tujuan JPG --}}
                                                    @if ($data->a_tujuan == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->tujuan }}</label>
                                                        </p>
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
                                                                    <a href="{{ asset($data->email . '/' . $data->tujuan) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->tujuan }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->tujuan) }}"
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
                                                                    <label class="col-sm-12">4. Tujuan Dan Program kerja
                                                                        Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="2"
                                                                                {{ $data->a_tujuan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="0"
                                                                                {{ $data->a_tujuan == 0 ? 'checked' : '' }}>
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
                                                    @elseif ($data->a_tujuan == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->tujuan }}</label>
                                                        </p>

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
                                                                    <a href="{{ asset($data->email . '/' . $data->tujuan) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->tujuan }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->tujuan) }}"
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
                                                                    <label class="col-sm-12">4. Tujuan Dan Program kerja
                                                                        Organisasi,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="2"
                                                                                {{ $data->a_tujuan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_tujuan"
                                                                                name="a_tujuan" value="0"
                                                                                {{ $data->a_tujuan == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->tujuan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_tujuan JPG --}}

                                                    {{-- TUTUP jpg --}}

                                                </div>
                                            </div>
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data tujuan --}}



                                    {{-- kodong data surat_keputusan --}}
                                    @if (!empty($data->surat_keputusan))
                                        @php
                                            $pecah = explode('.', $data->surat_keputusan);
                                            $surat_keputusan = $pecah[1];
                                        @endphp

                                        @if ($surat_keputusan == 'pdf')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_keputusan --}}
                                                    @if ($data->a_surat_keputusan == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->surat_keputusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_keputusan-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">5. Surat Keputusan Tentang
                                                                        Susunan Pengurus Ormas, sesuai ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="2"
                                                                                {{ $data->a_surat_keputusan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="0"
                                                                                {{ $data->a_surat_keputusan == 0 ? 'checked' : '' }}>
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
                                                    @elseif($data->a_surat_keputusan == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->surat_keputusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                href="#surat_keputusan-{{ $data->id }}">Lihat
                                                                Data
                                                            </a>
                                                        </p>

                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <p class="text-muted text-center">
                                                                    <label class="col-sm-12">5. Surat Keputusan Tentang
                                                                        Susunan Pengurus Ormas, sesuai
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="2"
                                                                                {{ $data->a_surat_keputusan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="0"
                                                                                {{ $data->a_surat_keputusan == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->surat_keputusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- tutup aktif a_surat_keputusan --}}

                                            {{-- buka JPG --}}
                                        @elseif($surat_keputusan == 'png' or $surat_keputusan == 'jpg')
                                            <div class="col-lg-12">
                                                <div class="p-20 z-depth-bottom-1">

                                                    {{-- aktif a_surat_keputusan JPG --}}
                                                    @if ($data->a_surat_keputusan == 0)
                                                        <p class="text-muted text-center"><label
                                                                class="label label-inverse-primary"><span
                                                                    data-feather="loader"></span>{{ $data->surat_keputusan }}</label>
                                                        </p>

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
                                                                    <a href="{{ asset($data->email . '/' . $data->surat_keputusan) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->surat_keputusan }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->surat_keputusan) }}"
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
                                                                    <label class="col-sm-12">5. Surat Keputusan Tentang
                                                                        Susunan Pengurus Ormas sesuai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="2"
                                                                                {{ $data->a_surat_keputusan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="0"
                                                                                {{ $data->a_surat_keputusan == 0 ? 'checked' : '' }}>
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
                                                    @elseif($data->a_surat_keputusan == 2)
                                                        <p class="text-muted text-center p-b-5">
                                                            <label class="label label-inverse-success"><span
                                                                    data-feather="check-circle"></span>{{ $data->surat_keputusan }}</label>
                                                        </p>

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
                                                                    <a href="{{ asset($data->email . '/' . $data->surat_keputusan) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ $data->email . '/' . $data->surat_keputusan }}">

                                                                        <img src="{{ asset($data->email . '/' . $data->surat_keputusan) }}"
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
                                                                    <label class="col-sm-12">5. Surat Keputusan Tentang
                                                                        Susunan Pengurus Ormas sesuai,
                                                                        tervalidasi ?</label>
                                                                </p>
                                                                <p class="text-muted text-center">
                                                                <div class="col-sm-12">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="2"
                                                                                {{ $data->a_surat_keputusan == 2 ? 'checked' : '' }}>
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
                                                                            <input type="checkbox" id="a_surat_keputusan"
                                                                                name="a_surat_keputusan" value="0"
                                                                                {{ $data->a_surat_keputusan == 0 ? 'checked' : '' }}>
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
                                                                    data-feather="x-circle"></span>{{ $data->surat_keputusan }}</label>
                                                        </p>

                                                        <p class="text-muted text-center">
                                                            <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                                tunggu
                                                                sampai pengguna memperbaiki</label>
                                                        </p>
                                                    @endif

                                                    {{-- tutup aktif a_surat_keputusan JPG --}}
                                                </div>
                                            </div>
                                            {{-- TUTUP jpg --}}
                                        @else
                                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                        @endif

                                        {{-- tutup pdf --}}
                                    @else
                                    @endif
                                    {{-- tutup kodong data surat_keputusan --}}

                                    {{-- </form> --}}
                            </div>

                            <div class="tab-pane" id="{{ $data->surat_pendaftaran }}" role="tabpanel">
                                {{-- kodong data biodata_pengurus --}}
                                @if (!empty($data->biodata_pengurus))
                                    @php
                                        $pecah = explode('.', $data->biodata_pengurus);
                                        $biodata_pengurus = $pecah[1];
                                    @endphp

                                    @if ($biodata_pengurus == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_biodata_pengurus --}}
                                                @if ($data->a_biodata_pengurus == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->biodata_pengurus }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#biodata_pengurus-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">6. Biodata Pangurus Organisasi
                                                                    (ketua, sekretaris dan bendahara atau sebutan lainnya)
                                                                    ,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="2"
                                                                            {{ $data->a_biodata_pengurus == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="0"
                                                                            {{ $data->a_biodata_pengurus == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_biodata_pengurus == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->biodata_pengurus }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#biodata_pengurus-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">6. Biodata Pangurus Organisasi
                                                                    (ketua, sekretaris dan bendahara atau sebutan lainnya),
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="2"
                                                                            {{ $data->a_biodata_pengurus == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="0"
                                                                            {{ $data->a_biodata_pengurus == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->biodata_pengurus }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_biodata_pengurus --}}

                                        {{-- buka JPG --}}
                                    @elseif($biodata_pengurus == 'png' or $biodata_pengurus == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_biodata_pengurus JPG --}}
                                                @if ($data->a_biodata_pengurus == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->biodata_pengurus }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->biodata_pengurus) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->biodata_pengurus }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->biodata_pengurus) }}"
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
                                                                <label class="col-sm-12">6. Biodata Pangurus Organisasi
                                                                    (ketua, sekretaris dan bendahara atau sebutan lainnya),
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="2"
                                                                            {{ $data->a_biodata_pengurus == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="0"
                                                                            {{ $data->a_biodata_pengurus == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_biodata_pengurus == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->biodata_pengurus }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->biodata_pengurus) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->biodata_pengurus }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->biodata_pengurus) }}"
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
                                                                <label class="col-sm-12">6. Biodata Pangurus Organisasi
                                                                    (ketua, sekretaris dan bendahara atau sebutan lainnya),
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="2"
                                                                            {{ $data->a_biodata_pengurus == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_biodata_pengurus"
                                                                            name="a_biodata_pengurus" value="0"
                                                                            {{ $data->a_biodata_pengurus == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->biodata_pengurus }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_biodata_pengurus JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data biodata_pengurus --}}

                                {{-- kodong data ktp --}}
                                @if (!empty($data->ktp))
                                    @php
                                        $pecah = explode('.', $data->ktp);
                                        $ktp = $pecah[1];
                                    @endphp

                                    @if ($ktp == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_ktp --}}
                                                @if ($data->a_ktp == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->ktp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#ktp-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">7. Kartu Tanda Penduduk (Mesuji)
                                                                    Pengurus Organisasi,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="2"
                                                                            {{ $data->a_ktp == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="0"
                                                                            {{ $data->a_ktp == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_ktp == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->ktp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#ktp-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">7. Kartu Tanda Penduduk (Mesuji)
                                                                    Pengurus Organisasi,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="2"
                                                                            {{ $data->a_ktp == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="0"
                                                                            {{ $data->a_ktp == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->ktp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_ktp --}}

                                        {{-- buka JPG --}}
                                    @elseif($ktp == 'png' or $ktp == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_ktp JPG --}}
                                                @if ($data->a_ktp == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->ktp }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->ktp) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->ktp }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->ktp) }}"
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
                                                                <label class="col-sm-12">7. Kartu Tanda Penduduk (Mesuji)
                                                                    Pengurus Organisasi,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="2"
                                                                            {{ $data->a_ktp == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="0"
                                                                            {{ $data->a_ktp == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_ktp == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->ktp }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->ktp) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->ktp }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->ktp) }}"
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
                                                                <label class="col-sm-12">7. Kartu Tanda Penduduk (Mesuji)
                                                                    Pengurus Organisasi,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="2"
                                                                            {{ $data->a_ktp == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_ktp"
                                                                            name="a_ktp" value="0"
                                                                            {{ $data->a_ktp == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->ktp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_ktp JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data ktp --}}

                                {{-- kodong data foto --}}
                                @if (!empty($data->foto))
                                    @php
                                        $pecah = explode('.', $data->foto);
                                        $foto = $pecah[1];
                                    @endphp

                                    @if ($foto == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_foto --}}
                                                @if ($data->a_foto == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->foto }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#foto-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">8. Pas Foto Ketua Organisasi
                                                                    Berwarna Terbaru
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="2"
                                                                            {{ $data->a_foto == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="0"
                                                                            {{ $data->a_foto == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_foto == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->foto }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#foto-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">8. Pas Foto Ketua Organisasi
                                                                    Berwarna Terbaru
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="2"
                                                                            {{ $data->a_foto == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="0"
                                                                            {{ $data->a_foto == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->foto }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_foto --}}

                                        {{-- buka JPG --}}
                                    @elseif($foto == 'png' or $foto == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_foto JPG --}}
                                                @if ($data->a_foto == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->foto }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->foto) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->foto }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->foto) }}"
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
                                                                <label class="col-sm-12">8. Pas Foto Ketua Organisasi
                                                                    Berwarna Terbaru
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="2"
                                                                            {{ $data->a_foto == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="0"
                                                                            {{ $data->a_foto == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_foto == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->foto }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->foto) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->foto }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->foto) }}"
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
                                                                <label class="col-sm-12">8. Pas Foto Ketua Organisasi
                                                                    Berwarna Terbaru
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="2"
                                                                            {{ $data->a_foto == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto"
                                                                            name="a_foto" value="0"
                                                                            {{ $data->a_foto == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->foto }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_foto JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data foto --}}

                                {{-- kodong data surat_keterangan_domisili --}}
                                @if (!empty($data->surat_keterangan_domisili))
                                    @php
                                        $pecah = explode('.', $data->surat_keterangan_domisili);
                                        $surat_keterangan_domisili = $pecah[1];
                                    @endphp

                                    @if ($surat_keterangan_domisili == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_keterangan_domisili --}}
                                                @if ($data->a_surat_keterangan_domisili == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_keterangan_domisili-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">9. Surat Keterangan Domisili
                                                                    Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala
                                                                    Desa / Camat
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="2"
                                                                            {{ $data->a_surat_keterangan_domisili == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="0"
                                                                            {{ $data->a_surat_keterangan_domisili == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_keterangan_domisili == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_keterangan_domisili-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">9. Surat Keterangan Domisili
                                                                    Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala
                                                                    Desa / Camat sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="2"
                                                                            {{ $data->a_surat_keterangan_domisili == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="0"
                                                                            {{ $data->a_surat_keterangan_domisili == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_surat_keterangan_domisili --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_keterangan_domisili == 'png' or $surat_keterangan_domisili == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_keterangan_domisili JPG --}}
                                                @if ($data->a_surat_keterangan_domisili == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_keterangan_domisili) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_keterangan_domisili }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_keterangan_domisili) }}"
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
                                                                <label class="col-sm-12">9. Surat Keterangan Domisili
                                                                    Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala
                                                                    Desa / Camat
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="2"
                                                                            {{ $data->a_surat_keterangan_domisili == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="0"
                                                                            {{ $data->a_surat_keterangan_domisili == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_keterangan_domisili == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_keterangan_domisili) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_keterangan_domisili }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_keterangan_domisili) }}"
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
                                                                <label class="col-sm-12">9. Surat Keterangan Domisili
                                                                    Sekretariat Omas Yang Diterbitkan Olah Lurah / Kepala
                                                                    Desa / Camat
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="2"
                                                                            {{ $data->a_surat_keterangan_domisili == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_keterangan_domisili"
                                                                            name="a_surat_keterangan_domisili"
                                                                            value="0"
                                                                            {{ $data->a_surat_keterangan_domisili == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_keterangan_domisili }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_keterangan_domisili JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_keterangan_domisili --}}


                                {{-- kodong data npwp --}}
                                @if (!empty($data->npwp))
                                    @php
                                        $pecah = explode('.', $data->npwp);
                                        $npwp = $pecah[1];
                                    @endphp

                                    @if ($npwp == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_npwp --}}
                                                @if ($data->a_npwp == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->npwp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#npwp-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">10. Nomor Pokolk Wajib Pajak Atas
                                                                    Nama Organisasi sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_npwp"
                                                                            name="a_npwp" value="2"
                                                                            {{ $data->a_npwp == 2 ? 'checked' : '' }}>
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
                                                                            {{ $data->a_npwp == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_npwp == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->npwp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#npwp-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">10. Nomor Pokolk Wajib Pajak Atas
                                                                    Nama Organisasi sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_npwp"
                                                                            name="a_npwp" value="2"
                                                                            {{ $data->a_npwp == 2 ? 'checked' : '' }}>
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
                                                                            {{ $data->a_npwp == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->npwp }}</label>
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
                                    @elseif($npwp == 'png' or $npwp == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_npwp JPG --}}
                                                @if ($data->a_npwp == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->npwp }}</label>
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
                                                                <a href="{{ asset($data->email . '/' . $data->npwp) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->npwp }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->npwp) }}"
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
                                                                <label class="col-sm-12">10. Nomor Pokolk Wajib Pajak Atas
                                                                    Nama Organisasi sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_npwp"
                                                                            name="a_npwp" value="2"
                                                                            {{ $data->a_npwp == 2 ? 'checked' : '' }}>
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
                                                                            {{ $data->a_npwp == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_npwp == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->npwp }}</label>
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
                                                                <a href="{{ asset($data->email . '/' . $data->npwp) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->npwp }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->npwp) }}"
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
                                                                <label class="col-sm-12">10. Nomor Pokolk Wajib Pajak Atas
                                                                    Nama Organisasi sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_npwp"
                                                                            name="a_npwp" value="2"
                                                                            {{ $data->a_npwp == 2 ? 'checked' : '' }}>
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
                                                                            {{ $data->a_npwp == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->npwp }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_npwp JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data npwp --}}

                                {{-- kodong data foto_kantor --}}
                                @if (!empty($data->foto_kantor))
                                    @php
                                        $pecah = explode('.', $data->foto_kantor);
                                        $foto_kantor = $pecah[1];
                                    @endphp

                                    @if ($foto_kantor == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_foto_kantor --}}
                                                @if ($data->a_foto_kantor == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->foto_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#foto_kantor-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">11. Foto Kantor Atau Sekretariat
                                                                    Ormas, Tampak Depan Yang Memuat Papan Nama
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="2"
                                                                            {{ $data->a_foto_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="0"
                                                                            {{ $data->a_foto_kantor == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_foto_kantor == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->foto_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#foto_kantor-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">11. Foto Kantor Atau Sekretariat
                                                                    Ormas, Tampak Depan Yang Memuat Papan Nama
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="2"
                                                                            {{ $data->a_foto_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="0"
                                                                            {{ $data->a_foto_kantor == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->foto_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_foto_kantor --}}

                                        {{-- buka JPG --}}
                                    @elseif($foto_kantor == 'png' or $foto_kantor == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_foto_kantor JPG --}}
                                                @if ($data->a_foto_kantor == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->foto_kantor }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->foto_kantor) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->foto_kantor }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->foto_kantor) }}"
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
                                                                <label class="col-sm-12">11. Foto Kantor Atau Sekretariat
                                                                    Ormas, Tampak Depan Yang Memuat Papan Nama
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="2"
                                                                            {{ $data->a_foto_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="0"
                                                                            {{ $data->a_foto_kantor == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_foto_kantor == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->foto_kantor }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->foto_kantor) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->foto_kantor }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->foto_kantor) }}"
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
                                                                <label class="col-sm-12">11. Foto Kantor Atau Sekretariat
                                                                    Ormas, Tampak Depan Yang Memuat Papan Nama
                                                                    sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="2"
                                                                            {{ $data->a_foto_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_foto_kantor"
                                                                            name="a_foto_kantor" value="0"
                                                                            {{ $data->a_foto_kantor == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->foto_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_foto_kantor JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data foto_kantor --}}

                                {{-- kodong data keabsahan_kantor --}}
                                @if (!empty($data->keabsahan_kantor))
                                    @php
                                        $pecah = explode('.', $data->keabsahan_kantor);
                                        $keabsahan_kantor = $pecah[1];
                                    @endphp

                                    @if ($keabsahan_kantor == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_keabsahan_kantor --}}
                                                @if ($data->a_keabsahan_kantor == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->keabsahan_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#keabsahan_kantor-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">12. Keabsahan Kantor Atau
                                                                    Sekretariat Ormas Dilampiri Bukti Kepemilikan, atau
                                                                    Surat Perjanjian Kontrak Atau Ijin Pakai Dari
                                                                    Pemilik/Pengelola,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="2"
                                                                            {{ $data->a_keabsahan_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="0"
                                                                            {{ $data->a_keabsahan_kantor == 0 ? 'checked' : '' }}>
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
                                                @elseif ($data->a_keabsahan_kantor == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->keabsahan_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#keabsahan_kantor-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">12. Keabsahan Kantor Atau
                                                                    Sekretariat Ormas Dilampiri Bukti Kepemilikan, atau
                                                                    Surat Perjanjian Kontrak Atau Ijin Pakai Dari
                                                                    Pemilik/Pengelola,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="2"
                                                                            {{ $data->a_keabsahan_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="0"
                                                                            {{ $data->a_keabsahan_kantor == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->keabsahan_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                            </div>
                                        </div>

                                        {{-- tutup aktif a_keabsahan_kantor --}}

                                        {{-- buka JPG --}}
                                    @elseif ($keabsahan_kantor == 'png' or $keabsahan_kantor == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_keabsahan_kantor JPG --}}
                                                @if ($data->a_keabsahan_kantor == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->keabsahan_kantor }}</label>
                                                    </p>
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
                                                                <a href="{{ asset($data->email . '/' . $data->keabsahan_kantor) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->keabsahan_kantor }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->keabsahan_kantor) }}"
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
                                                                <label class="col-sm-12">12. Keabsahan Kantor Atau
                                                                    Sekretariat Ormas Dilampiri Bukti Kepemilikan, atau
                                                                    Surat Perjanjian Kontrak Atau Ijin Pakai Dari
                                                                    Pemilik/Pengelola,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="2"
                                                                            {{ $data->a_keabsahan_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="0"
                                                                            {{ $data->a_keabsahan_kantor == 0 ? 'checked' : '' }}>
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
                                                @elseif ($data->a_keabsahan_kantor == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->keabsahan_kantor }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->keabsahan_kantor) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->keabsahan_kantor }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->keabsahan_kantor) }}"
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
                                                                <label class="col-sm-12">12. Keabsahan Kantor Atau
                                                                    Sekretariat Ormas Dilampiri Bukti Kepemilikan, atau
                                                                    Surat Perjanjian Kontrak Atau Ijin Pakai Dari
                                                                    Pemilik/Pengelola,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="2"
                                                                            {{ $data->a_keabsahan_kantor == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                                            name="a_keabsahan_kantor" value="0"
                                                                            {{ $data->a_keabsahan_kantor == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->keabsahan_kantor }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_keabsahan_kantor JPG --}}

                                                {{-- TUTUP jpg --}}

                                            </div>
                                        </div>
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data keabsahan_kantor --}}

                                {{-- kodong data surat_memuat --}}
                                @if (!empty($data->surat_memuat))
                                    @php
                                        $pecah = explode('.', $data->surat_memuat);
                                        $surat_memuat = $pecah[1];
                                    @endphp

                                    @if ($surat_memuat == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_memuat --}}
                                                @if ($data->a_surat_memuat == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_memuat }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_memuat-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">13. Surat Pernyataan Yang Memuat
                                                                    : 1. Pernyataan Tidak Terjadi Konflik Kepengurusan Dan
                                                                    Perkara Pengadilan, 2. Pernyataan Bahwa Nama, Lambang,
                                                                    Bendera, Tanda Gambar, Simbol, Atribut, Cap Stempel Yang
                                                                    Digunakan Belum Menjadi Hak Paten Atau Hak Cipta Pihak
                                                                    Lain, 3. Pernyataan Kesanggupan Menyampaikan Laporan
                                                                    Perkembangan Dan Kegiatan Ormas Setiap Akhir Tahun, 4.
                                                                    Surat Pernyataan Bahwa Bertanggung Jawab Terhadap
                                                                    Keabsahan Seluruh Isi, Data, Dan Informasi Dokumen Atau
                                                                    Berkas Yang Diserahkan, Dan Bersedia Dituntut Secara
                                                                    Hukum. (Di Tanda Tangani Ketua Dan Sekretaris) sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="2"
                                                                            {{ $data->a_surat_memuat == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="0"
                                                                            {{ $data->a_surat_memuat == 0 ? 'checked' : '' }}>
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
                                                @elseif ($data->a_surat_memuat == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_memuat }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_memuat-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">13. Surat Pernyataan Yang Memuat
                                                                    : 1. Pernyataan Tidak Terjadi Konflik Kepengurusan Dan
                                                                    Perkara Pengadilan, 2. Pernyataan Bahwa Nama, Lambang,
                                                                    Bendera, Tanda Gambar, Simbol, Atribut, Cap Stempel Yang
                                                                    Digunakan Belum Menjadi Hak Paten Atau Hak Cipta Pihak
                                                                    Lain, 3. Pernyataan Kesanggupan Menyampaikan Laporan
                                                                    Perkembangan Dan Kegiatan Ormas Setiap Akhir Tahun, 4.
                                                                    Surat Pernyataan Bahwa Bertanggung Jawab Terhadap
                                                                    Keabsahan Seluruh Isi, Data, Dan Informasi Dokumen Atau
                                                                    Berkas Yang Diserahkan, Dan Bersedia Dituntut Secara
                                                                    Hukum. (Di Tanda Tangani Ketua Dan Sekretaris) sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="2"
                                                                            {{ $data->a_surat_memuat == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="0"
                                                                            {{ $data->a_surat_memuat == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_memuat }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                            </div>
                                        </div>

                                        {{-- tutup aktif a_surat_memuat --}}

                                        {{-- buka JPG --}}
                                    @elseif ($surat_memuat == 'png' or $surat_memuat == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_memuat JPG --}}
                                                @if ($data->a_surat_memuat == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_memuat }}</label>
                                                    </p>
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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_memuat) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_memuat }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_memuat) }}"
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
                                                                <label class="col-sm-12">13. Surat Pernyataan Yang Memuat
                                                                    : <br>1. Pernyataan Tidak Terjadi Konflik Kepengurusan
                                                                    Dan
                                                                    Perkara Pengadilan, <br>2. Pernyataan Bahwa Nama,
                                                                    Lambang,
                                                                    Bendera, Tanda Gambar, Simbol, Atribut, Cap Stempel Yang
                                                                    Digunakan Belum Menjadi Hak Paten Atau Hak Cipta Pihak
                                                                    Lain, <br>3. Pernyataan Kesanggupan Menyampaikan Laporan
                                                                    Perkembangan Dan Kegiatan Ormas Setiap Akhir Tahun,
                                                                    <br>4.
                                                                    Surat Pernyataan Bahwa Bertanggung Jawab Terhadap
                                                                    Keabsahan Seluruh Isi, Data, Dan Informasi Dokumen Atau
                                                                    Berkas Yang Diserahkan, Dan Bersedia Dituntut Secara
                                                                    Hukum. (Di Tanda Tangani Ketua Dan Sekretaris) sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="2"
                                                                            {{ $data->a_surat_memuat == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="0"
                                                                            {{ $data->a_surat_memuat == 0 ? 'checked' : '' }}>
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
                                                @elseif ($data->a_surat_memuat == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_memuat }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_memuat) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_memuat }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_memuat) }}"
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
                                                                <label class="col-sm-12">13. Surat Pernyataan Yang Memuat
                                                                    : <br>1. Pernyataan Tidak Terjadi Konflik Kepengurusan
                                                                    Dan
                                                                    Perkara Pengadilan, <br>2. Pernyataan Bahwa Nama,
                                                                    Lambang,
                                                                    Bendera, Tanda Gambar, Simbol, Atribut, Cap Stempel Yang
                                                                    Digunakan Belum Menjadi Hak Paten Atau Hak Cipta Pihak
                                                                    Lain, <br>3. Pernyataan Kesanggupan Menyampaikan Laporan
                                                                    Perkembangan Dan Kegiatan Ormas Setiap Akhir Tahun,
                                                                    <br>4.
                                                                    Surat Pernyataan Bahwa Bertanggung Jawab Terhadap
                                                                    Keabsahan Seluruh Isi, Data, Dan Informasi Dokumen Atau
                                                                    Berkas Yang Diserahkan, Dan Bersedia Dituntut Secara
                                                                    Hukum. (Di Tanda Tangani Ketua Dan Sekretaris) sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="2"
                                                                            {{ $data->a_surat_memuat == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_memuat"
                                                                            name="a_surat_memuat" value="0"
                                                                            {{ $data->a_surat_memuat == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_memuat }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_memuat JPG --}}

                                                {{-- TUTUP jpg --}}

                                            </div>
                                        </div>
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_memuat --}}


                                {{-- kodong data surat_rekom_kesediaan --}}
                                @if (!empty($data->surat_rekom_kesediaan))
                                    @php
                                        $pecah = explode('.', $data->surat_rekom_kesediaan);
                                        $surat_rekom_kesediaan = $pecah[1];
                                    @endphp

                                    @if ($surat_rekom_kesediaan == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_kesediaan --}}
                                                @if ($data->a_surat_rekom_kesediaan == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_kesediaan-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">17. Surat Pernyataan Kesediaan
                                                                    Atau Persetujuan Untuk Ormas Yang Dalam Kepengurusannya
                                                                    Mencantumkan Nama Dari Pajabat Negara, Pejabat
                                                                    Pemerintah, Dan Tokoh Masyarakat **
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_kesediaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_kesediaan == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_kesediaan == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_kesediaan-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">17. Surat Pernyataan Kesediaan
                                                                    Atau Persetujuan Untuk Ormas Yang Dalam Kepengurusannya
                                                                    Mencantumkan Nama Dari Pajabat Negara, Pejabat
                                                                    Pemerintah, Dan Tokoh Masyarakat **
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_kesediaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_kesediaan == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_surat_rekom_kesediaan --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_rekom_kesediaan == 'png' or $surat_rekom_kesediaan == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_kesediaan JPG --}}
                                                @if ($data->a_surat_rekom_kesediaan == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_kesediaan) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_kesediaan }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_kesediaan) }}"
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
                                                                <label class="col-sm-12">17. Surat Pernyataan Kesediaan
                                                                    Atau Persetujuan Untuk Ormas Yang Dalam Kepengurusannya
                                                                    Mencantumkan Nama Dari Pajabat Negara, Pejabat
                                                                    Pemerintah, Dan Tokoh Masyarakat **
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_kesediaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_kesediaan == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_kesediaan == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_kesediaan) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_kesediaan }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_kesediaan) }}"
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
                                                                <label class="col-sm-12">17. Surat Pernyataan Kesediaan
                                                                    Atau Persetujuan Untuk Ormas Yang Dalam Kepengurusannya
                                                                    Mencantumkan Nama Dari Pajabat Negara, Pejabat
                                                                    Pemerintah, Dan Tokoh Masyarakat **
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_kesediaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_kesediaan"
                                                                            name="a_surat_rekom_kesediaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_kesediaan == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_kesediaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_rekom_kesediaan JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_rekom_kesediaan --}}
                            </div>



                            <div class="tab-pane" id="{{ $data->adrt }}" role="tabpanel">

                                @if (!empty($data->surat_rekom_skpd_kepercayaan))
                                    @php
                                        $pecah = explode('.', $data->surat_rekom_skpd_kepercayaan);
                                        $surat_rekom_skpd_kepercayaan = $pecah[1];
                                    @endphp

                                    @if ($surat_rekom_skpd_kepercayaan == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_skpd_kepercayaan --}}
                                                @if ($data->a_surat_rekom_skpd_kepercayaan == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_skpd_kepercayaan-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">15. Rekomendasi Dari SKPD Yang
                                                                    Membidangi Urusan Kebudayaan Untuk Ormas Yang Memiliki
                                                                    Kekhususan Bidang Kepercayaan Kepada Tuhan Yang Maha Esa
                                                                    ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_skpd_kepercayaan == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_skpd_kepercayaan-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">15. Rekomendasi Dari SKPD Yang
                                                                    Membidangi Urusan Kebudayaan Untuk Ormas Yang Memiliki
                                                                    Kekhususan Bidang Kepercayaan Kepada Tuhan Yang Maha Esa
                                                                    ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_surat_rekom_skpd_kepercayaan --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_rekom_skpd_kepercayaan == 'png' or $surat_rekom_skpd_kepercayaan == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_skpd_kepercayaan JPG --}}
                                                @if ($data->a_surat_rekom_skpd_kepercayaan == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kepercayaan) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_skpd_kepercayaan }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kepercayaan) }}"
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
                                                                <label class="col-sm-12">15. Rekomendasi Dari SKPD Yang
                                                                    Membidangi Urusan Kebudayaan Untuk Ormas Yang Memiliki
                                                                    Kekhususan Bidang Kepercayaan Kepada Tuhan Yang Maha Esa
                                                                    ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_skpd_kepercayaan == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kepercayaan) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_skpd_kepercayaan }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kepercayaan) }}"
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
                                                                <label class="col-sm-12">15. Rekomendasi Dari SKPD Yang
                                                                    Membidangi Urusan Kebudayaan Untuk Ormas Yang Memiliki
                                                                    Kekhususan Bidang Kepercayaan Kepada Tuhan Yang Maha Esa
                                                                    ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kepercayaan"
                                                                            name="a_surat_rekom_skpd_kepercayaan"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kepercayaan == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_skpd_kepercayaan }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_rekom_skpd_kepercayaan JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_rekom_skpd_kepercayaan --}}


                                @if (!empty($data->surat_rekom_agama))
                                    @php
                                        $pecah = explode('.', $data->surat_rekom_agama);
                                        $surat_rekom_agama = $pecah[1];
                                    @endphp

                                    @if ($surat_rekom_agama == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_agama --}}
                                                @if ($data->a_surat_rekom_agama == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_agama }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_agama-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">14. Rekomendasi Dari Kementerian
                                                                    Agama Untuk Omas Yang Memiliki Kekhususan Bidang
                                                                    Keagamaan ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="2"
                                                                            {{ $data->a_surat_rekom_agama == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="0"
                                                                            {{ $data->a_surat_rekom_agama == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_agama == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_agama }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_agama-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">14. Rekomendasi Dari Kementerian
                                                                    Agama Untuk Omas Yang Memiliki Kekhususan Bidang
                                                                    Keagamaan ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="2"
                                                                            {{ $data->a_surat_rekom_agama == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="0"
                                                                            {{ $data->a_surat_rekom_agama == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_agama }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_surat_rekom_agama --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_rekom_agama == 'png' or $surat_rekom_agama == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_agama JPG --}}
                                                @if ($data->a_surat_rekom_agama == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_agama }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_agama) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_agama }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_agama) }}"
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
                                                                <label class="col-sm-12">14. Rekomendasi Dari Kementerian
                                                                    Agama Untuk Omas Yang Memiliki Kekhususan Bidang
                                                                    Keagamaan ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="2"
                                                                            {{ $data->a_surat_rekom_agama == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="0"
                                                                            {{ $data->a_surat_rekom_agama == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_agama == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_agama }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_agama) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_agama }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_agama) }}"
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
                                                                <label class="col-sm-12">14. Rekomendasi Dari Kementerian
                                                                    Agama Untuk Omas Yang Memiliki Kekhususan Bidang
                                                                    Keagamaan ** sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="2"
                                                                            {{ $data->a_surat_rekom_agama == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_rekom_agama"
                                                                            name="a_surat_rekom_agama" value="0"
                                                                            {{ $data->a_surat_rekom_agama == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_agama }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_rekom_agama JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_rekom_agama --}}


                                {{-- kodong data surat_rekom_skpd_kerja --}}
                                @if (!empty($data->surat_rekom_skpd_kerja))
                                    @php
                                        $pecah = explode('.', $data->surat_rekom_skpd_kerja);
                                        $surat_rekom_skpd_kerja = $pecah[1];
                                    @endphp

                                    @if ($surat_rekom_skpd_kerja == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_skpd_kerja --}}
                                                @if ($data->a_surat_rekom_skpd_kerja == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_skpd_kerja-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">Apakah surat rekomendasi
                                                                    dari kementrian, lembaga,
                                                                    SKPD yang membidangi
                                                                    urusan tenaga kerja sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_skpd_kerja == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_rekom_skpd_kerja-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">Apakah surat rekomendasi
                                                                    dari kementrian, lembaga,
                                                                    SKPD yang membidangi
                                                                    urusan tenaga kerja sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_surat_rekom_skpd_kerja --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_rekom_skpd_kerja == 'png' or $surat_rekom_skpd_kerja == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_rekom_skpd_kerja JPG --}}
                                                @if ($data->a_surat_rekom_skpd_kerja == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kerja) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_skpd_kerja }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kerja) }}"
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
                                                                <label class="col-sm-12">Apakah surat rekomendasi
                                                                    dari kementrian, lembaga,
                                                                    SKPD yang membidangi
                                                                    urusan tenaga kerja sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_rekom_skpd_kerja == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kerja) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_rekom_skpd_kerja }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kerja) }}"
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
                                                                <label class="col-sm-12">Apakah surat rekomendasi
                                                                    dari kementrian, lembaga,
                                                                    SKPD yang membidangi
                                                                    urusan tenaga kerja sesuai,</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="2"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox"
                                                                            id="a_surat_rekom_skpd_kerja"
                                                                            name="a_surat_rekom_skpd_kerja"
                                                                            value="0"
                                                                            {{ $data->a_surat_rekom_skpd_kerja == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_rekom_skpd_kerja }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_rekom_skpd_kerja JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_rekom_skpd_kerja --}}

                                {{-- kodong data surat_izasah --}}
                                @if (!empty($data->surat_izasah))
                                    @php
                                        $pecah = explode('.', $data->surat_izasah);
                                        $surat_izasah = $pecah[1];
                                    @endphp

                                    @if ($surat_izasah == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_izasah --}}
                                                @if ($data->a_surat_izasah == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_izasah }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_izasah-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">Apakah surat_izasah terakhir
                                                                    (ketua,seketaris, dan
                                                                    bendahara)
                                                                    sesuai,tervalidasi
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="2"
                                                                            {{ $data->a_surat_izasah == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="0"
                                                                            {{ $data->a_surat_izasah == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_izasah == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_izasah }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_izasah-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">Apakah surat_izasah terakhir
                                                                    (ketua,seketaris, dan
                                                                    bendahara)
                                                                    sesuai,tervalidasi
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="2"
                                                                            {{ $data->a_surat_izasah == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="0"
                                                                            {{ $data->a_surat_izasah == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_izasah }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_surat_izasah --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_izasah == 'png' or $surat_izasah == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_surat_izasah JPG --}}
                                                @if ($data->a_surat_izasah == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_izasah }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_izasah) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_izasah }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_izasah) }}"
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
                                                                <label class="col-sm-12">Apakah surat_izasah terakhir
                                                                    (ketua,seketaris, dan
                                                                    bendahara)
                                                                    sesuai,tervalidasi
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="2"
                                                                            {{ $data->a_surat_izasah == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="0"
                                                                            {{ $data->a_surat_izasah == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_izasah == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_izasah }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_izasah) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_izasah }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_izasah) }}"
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
                                                                <label class="col-sm-12">Apakah surat_izasah terakhir
                                                                    (ketua,seketaris, dan
                                                                    bendahara)
                                                                    sesuai,tervalidasi
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="2"
                                                                            {{ $data->a_surat_izasah == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_izasah"
                                                                            name="a_surat_izasah" value="0"
                                                                            {{ $data->a_surat_izasah == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_izasah }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_surat_izasah JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data izasah --}}

                                {{-- kodong data stlk --}}
                                @if (!empty($data->stlk))
                                    @php
                                        $pecah = explode('.', $data->stlk);
                                        $stlk = $pecah[1];
                                    @endphp

                                    @if ($stlk == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_stlk --}}
                                                @if ($data->a_stlk == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->stlk }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#stlk-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">19. STLK Dari Badan Kesatuan
                                                                    Bangsa Dan Politik Provinsi Lampung Bagi Organisasi Yang
                                                                    Memiliki Kepengurusan Tingkat Provinsi **,
                                                                    sesuai ?
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="2"
                                                                            {{ $data->a_stlk == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="0"
                                                                            {{ $data->a_stlk == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_stlk == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->stlk }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#stlk-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">19. STLK Dari Badan Kesatuan
                                                                    Bangsa Dan Politik Provinsi Lampung Bagi Organisasi Yang
                                                                    Memiliki Kepengurusan Tingkat Provinsi **,
                                                                    sesuai ?
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="2"
                                                                            {{ $data->a_stlk == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="0"
                                                                            {{ $data->a_stlk == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->stlk }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif a_stlk --}}

                                        {{-- buka JPG --}}
                                    @elseif($stlk == 'png' or $stlk == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif a_stlk JPG --}}
                                                @if ($data->a_stlk == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->stlk }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->stlk) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->stlk }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->stlk) }}"
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
                                                                <label class="col-sm-12">19. STLK Dari Badan Kesatuan
                                                                    Bangsa Dan Politik Provinsi Lampung Bagi Organisasi Yang
                                                                    Memiliki Kepengurusan Tingkat Provinsi **,
                                                                    sesuai ?
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="2"
                                                                            {{ $data->a_stlk == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="0"
                                                                            {{ $data->a_stlk == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_stlk == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->stlk }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->stlk) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->stlk }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->stlk) }}"
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
                                                                <label class="col-sm-12">19. STLK Dari Badan Kesatuan
                                                                    Bangsa Dan Politik Provinsi Lampung Bagi Organisasi Yang
                                                                    Memiliki Kepengurusan Tingkat Provinsi **,
                                                                    sesuai ?
                                                                    ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="2"
                                                                            {{ $data->a_stlk == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_stlk"
                                                                            name="a_stlk" value="0"
                                                                            {{ $data->a_stlk == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->stlk }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif a_stlk JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data stlk --}}


                                {{-- kodong data surat_kemenkumham --}}
                                @if (!empty($data->surat_kemenkumham))
                                    @php
                                        $pecah = explode('.', $data->surat_kemenkumham);
                                        $surat_kemenkumham = $pecah[1];
                                    @endphp

                                    @if ($surat_kemenkumham == 'pdf')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif surat_kemenkumham --}}
                                                @if ($data->a_surat_kemenkumham == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_kemenkumham }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_kemenkumham-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">20. Surat Keterangan Terdaftar Di
                                                                    Kementrian Hukum Dan Ham Bagi Ormas Yang Berbadan Hukum,
                                                                    Dan/ Atau Surat Keterangan Terdaftar Di Kementrian Dalam
                                                                    Negri Bagi Ormas Yang Tidak Berbadan Hukum sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="2"
                                                                            {{ $data->a_surat_kemenkumham == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="0"
                                                                            {{ $data->a_surat_kemenkumham == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_kemenkumham == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_kemenkumham }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            href="#surat_kemenkumham-{{ $data->id }}">Lihat
                                                            Data
                                                        </a>
                                                    </p>

                                                    <div class="card-block">
                                                        <div class="form-group row">
                                                            <p class="text-muted text-center">
                                                                <label class="col-sm-12">20. Surat Keterangan Terdaftar Di
                                                                    Kementrian Hukum Dan Ham Bagi Ormas Yang Berbadan Hukum,
                                                                    Dan/ Atau Surat Keterangan Terdaftar Di Kementrian Dalam
                                                                    Negri Bagi Ormas Yang Tidak Berbadan Hukum sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="2"
                                                                            {{ $data->a_surat_kemenkumham == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="0"
                                                                            {{ $data->a_surat_kemenkumham == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_kemenkumham }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- tutup aktif surat_kemenkumham --}}

                                        {{-- buka JPG --}}
                                    @elseif($surat_kemenkumham == 'png' or $surat_kemenkumham == 'jpg')
                                        <div class="col-lg-12">
                                            <div class="p-20 z-depth-bottom-1">

                                                {{-- aktif surat_kemenkumham JPG --}}
                                                @if ($data->a_surat_kemenkumham == 0)
                                                    <p class="text-muted text-center"><label
                                                            class="label label-inverse-primary"><span
                                                                data-feather="loader"></span>{{ $data->surat_kemenkumham }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_kemenkumham) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_kemenkumham }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_kemenkumham) }}"
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
                                                                <label class="col-sm-12">20. Surat Keterangan Terdaftar Di
                                                                    Kementrian Hukum Dan Ham Bagi Ormas Yang Berbadan Hukum,
                                                                    Dan/ Atau Surat Keterangan Terdaftar Di Kementrian Dalam
                                                                    Negri Bagi Ormas Yang Tidak Berbadan Hukum sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="2"
                                                                            {{ $data->a_surat_kemenkumham == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="0"
                                                                            {{ $data->a_surat_kemenkumham == 0 ? 'checked' : '' }}>
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
                                                @elseif($data->a_surat_kemenkumham == 2)
                                                    <p class="text-muted text-center p-b-5">
                                                        <label class="label label-inverse-success"><span
                                                                data-feather="check-circle"></span>{{ $data->surat_kemenkumham }}</label>
                                                    </p>

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
                                                                <a href="{{ asset($data->email . '/' . $data->surat_kemenkumham) }}"
                                                                    data-lightbox="1"
                                                                    data-title="{{ $data->email . '/' . $data->surat_kemenkumham }}">

                                                                    <img src="{{ asset($data->email . '/' . $data->surat_kemenkumham) }}"
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
                                                                <label class="col-sm-12">20. Surat Keterangan Terdaftar Di
                                                                    Kementrian Hukum Dan Ham Bagi Ormas Yang Berbadan Hukum,
                                                                    Dan/ Atau Surat Keterangan Terdaftar Di Kementrian Dalam
                                                                    Negri Bagi Ormas Yang Tidak Berbadan Hukum sesuai,
                                                                    tervalidasi ?</label>
                                                            </p>
                                                            <p class="text-muted text-center">
                                                            <div class="col-sm-12">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label>
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="2"
                                                                            {{ $data->a_surat_kemenkumham == 2 ? 'checked' : '' }}>
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
                                                                        <input type="checkbox" id="a_surat_kemenkumham"
                                                                            name="a_surat_kemenkumham" value="0"
                                                                            {{ $data->a_surat_kemenkumham == 0 ? 'checked' : '' }}>
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
                                                                data-feather="x-circle"></span>{{ $data->surat_kemenkumham }}</label>
                                                    </p>

                                                    <p class="text-muted text-center">
                                                        <label class="col-sm-12">Data tidak lengkap yang dikirim,
                                                            tunggu
                                                            sampai pengguna memperbaiki</label>
                                                    </p>
                                                @endif

                                                {{-- tutup aktif surat_kemenkumham JPG --}}
                                            </div>
                                        </div>
                                        {{-- TUTUP jpg --}}
                                    @else
                                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                                    @endif

                                    {{-- tutup pdf --}}
                                @else
                                @endif
                                {{-- tutup kodong data surat_rekom_skpd_kepercayaan --}}


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

                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- tabbed form modal end -->

        <!-- Modal 1-->
        <div id="surat_kemenkumham-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_kemenkumham }}
                        </h4>
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
                            data="{{ asset($data->email . '/' . $data->surat_kemenkumham) }}"></object>
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
        <div id="surat_pendaftaran-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_pendaftaran }}
                        </h4>
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
                            data="{{ asset($data->email . '/' . $data->surat_pendaftaran) }}"></object>
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
        <div id="adrt-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->adrt }}
                        </h4>
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
                            data="{{ asset($data->email . '/' . $data->adrt) }}"></object>
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
        <div id="ktp-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->ktp }}
                        </h4>
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
                            data="{{ asset($data->email . '/' . $data->ktp) }}"></object>
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
        <div id="keabsahan_kantor-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->keabsahan_kantor }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        src="http://127.0.0.1:8000/yrka1234/	keabsahan_kantor20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      /> -->
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->keabsahan_kantor) }}"></object>
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
        <div id="tujuan-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->tujuan }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->tujuan) }}"></object>
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
        <div id="surat_keputusan-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_keputusan }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_keputusan) }}"></object>
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
        <div id="biodata_pengurus-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->biodata_pengurus }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->biodata_pengurus) }}"></object>
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
        <div id="ktp-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->ktp }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->ktp) }}"></object>


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
        <div id="foto-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->foto }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->foto) }}"></object>
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
        <div id="surat_keterangan_domisili-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_keterangan_domisili }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_keterangan_domisili) }}"></object>
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
        <div id="npwp-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->npwp }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->npwp) }}"></object>
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
        <div id="foto_kantor-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->foto_kantor }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->foto_kantor) }}"></object>
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
        <div id="surat_ketertiban-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_ketertiban }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_ketertiban) }}"></object>
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
        <div id="surat_tidak_avilasi-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_tidak_avilasi }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_tidak_avilasi) }}"></object>
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
        <div id="surat_konflik-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_konflik }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_konflik) }}"></object>
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
        <div id="surat_hak_cipta-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_hak_cipta }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_hak_cipta) }}"></object>
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
        <div id="surat_laporan-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_laporan }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_laporan) }}"></object>
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
        <div id="surat_absah-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_absah }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_absah) }}"></object>
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
        <div id="surat_rekom_agama-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_rekom_agama }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_rekom_agama) }}"></object>
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
        <div id="surat_rekom_skpd_kepercayaan-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_rekom_skpd_kepercayaan }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kepercayaan) }}"></object>
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
        <div id="surat_rekom_skpd_kerja-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_rekom_skpd_kerja }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_rekom_skpd_kerja) }}"></object>
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
        <div id="surat_rekom_kesediaan-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_rekom_kesediaan }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_rekom_kesediaan) }}"></object>
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
        <div id="surat_izasah-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_izasah }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_izasah) }}"></object>
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
        <div id="surat_memuat-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->surat_memuat }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->surat_memuat) }}"></object>
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
        <div id="stlk-{{ $data->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ $data->email . '/' . $data->stlk }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <object width="100%" height="400px"
                            data="{{ asset($data->email . '/' . $data->stlk) }}"></object>
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
        $(document).on('click', 'input[name="a_surat_kemenkumham"]', function() {
            $('input[name="a_surat_kemenkumham"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_akte_pendirian"]', function() {
            $('input[name="a_akte_pendirian"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_pendaftaran"]', function() {
            $('input[name="a_surat_pendaftaran"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_adrt"]', function() {
            $('input[name="a_adrt"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_keabsahan_kantor"]', function() {
            $('input[name="a_keabsahan_kantor"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_tujuan"]', function() {
            $('input[name="a_tujuan"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_keputusan"]', function() {
            $('input[name="a_surat_keputusan"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_biodata_pengurus"]', function() {
            $('input[name="a_biodata_pengurus"]').not(this).prop('checked', false);
        });


        $(document).on('click', 'input[name="a_ktp"]', function() {
            $('input[name="a_ktp"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_ktp"]', function() {
            $('input[name="a_ktp"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_foto"]', function() {
            $('input[name="a_foto"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_keterangan_domisili"]', function() {
            $('input[name="a_surat_keterangan_domisili"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_npwp"]', function() {
            $('input[name="a_npwp"]').not(this).prop('checked', false);
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
        $(document).on('click', 'input[name="a_surat_rekom_skpd_kepercayaan"]', function() {
            $('input[name="a_surat_rekom_skpd_kepercayaan"]').not(this).prop('checked', false);
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
        $(document).on('click', 'input[name="a_stlk"]', function() {
            $('input[name="a_stlk"]').not(this).prop('checked', false);
        });

        $(document).on('click', 'input[name="a_surat_memuat"]', function() {
            $('input[name="a_surat_memuat"]').not(this).prop('checked', false);
        });
    </script>



@endsection
