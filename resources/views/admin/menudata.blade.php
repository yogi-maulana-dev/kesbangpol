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
                            <th>Download File</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td>

                            <td> <button
                                    class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                    data-target="#tabbed-form-{{ $data->id }}" data-titleku="DataOrkemas"
                                    data-toggle="modal"><span data-feather="eye"></span></button>
                                {{-- <a href="/data/{{ $data->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a> --}}
                            </td>

                            <td>
                                @if ($data->lengkap == 0)
                                <div class="label-main">
                                    <label class="label label-lg label-primary"><i class="fa fa-spinner"></i>
                                        Proses</label>

                                </div>
                                @else
                                Sudah di verikasi
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('download', $data->nama) }}" target="_blank" rel="noopener"
                                    class="btn btn-primary btn-sm text-white">
                                    Download
                                </a>

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
<div id="tabbed-form-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link active" data-toggle="tab" href="#{{$data->surat_terdaftar_dikemenkumham}}"
                            role="tab">
                            <h6 class="m-b-0">Data 1</h6>
                        </a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link" data-toggle="tab" href="#{{$data->surat_pendaftaran}}" role="tab">
                            <h6 class="m-b-0">Data 2</h6>
                        </a>
                        <div class="slide"></div>
                    </li>

                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link" data-toggle="tab" href="#{{$data->akte_pendirian}}" role="tab">
                            <h6 class="m-b-0">Data 3</h6>
                        </a>
                        <div class="slide"></div>
                    </li>

                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link" data-toggle="tab" href="#{{$data->adrt}}" role="tab">
                            <h6 class="m-b-0">Data 4</h6>
                        </a>
                        <div class="slide"></div>
                    </li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-t-30">
                    <div class="tab-pane active" id="{{$data->surat_terdaftar_dikemenkumham}}" role="tabpanel">
                        @foreach ($datacuk as $menudata )

                        <form method="post" action="/menudata" class="md-float-material form-material"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $menudata->id }}">

                            @endforeach

                            {{-- kodong data surat_terdaftar_dikemenkumham --}}



                            @if (!empty($data->surat_terdaftar_dikemenkumham))
                            @php
                            $pecah = explode('.', $data->surat_terdaftar_dikemenkumham);
                            $surat_terdaftar_dikemenkumham = $pecah[1];
                            @endphp


                            @if ($surat_terdaftar_dikemenkumham == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_surat_terdaftar_dikemenkumham --}}
                                    @if ($data->a_surat_terdaftar_dikemenkumham == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->surat_terdaftar_dikemenkumham
                                            }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#surat_terdaftar_dikemenkumham-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah surat keterangan terdaftar dikementrian
                                                    hukum dan ham,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="2" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="0" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
                                                    </label>
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    @elseif ($data->a_surat_terdaftar_dikemenkumham == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#surat_terdaftar_dikemenkumham-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah surat keterangan terdaftar dikementrian
                                                    hukum dan ham,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="2" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="0" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                </div>
                            </div>

                            {{-- tutup aktif a_surat_terdaftar_dikemenkumham --}}

                            {{-- buka JPG --}}
                            @elseif ($surat_terdaftar_dikemenkumham == 'png' or
                            $surat_terdaftar_dikemenkumham
                            == 'jpg')

                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_surat_terdaftar_dikemenkumham JPG--}}
                                    @if ($data->a_surat_terdaftar_dikemenkumham == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->surat_terdaftar_dikemenkumham
                                            }}</label>
                                    </p>

                                    {{-- tutup status data surat_terdaftar_dikemenkumham
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
                                                <a href="{{ asset($data->nama . '/' . $data->surat_terdaftar_dikemenkumham) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->surat_terdaftar_dikemenkumham }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->surat_terdaftar_dikemenkumham) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah surat keterangan terdaftar dikementrian
                                                    hukum dan ham,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="2" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="0" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
                                                    </label>
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                            </p>
                                        </div>
                                    </div>


                                    @elseif ($data->a_surat_terdaftar_dikemenkumham == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah surat keterangan terdaftar dikementrian
                                                    hukum dan ham,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="2" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_terdaftar_dikemenkumham"
                                                            name="a_surat_terdaftar_dikemenkumham" value="0" {{
                                                            ($data->a_surat_terdaftar_dikemenkumham == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                    {{-- tutup aktif a_surat_terdaftar_dikemenkumham JPG--}}

                                    {{-- TUTUP jpg --}}

                                </div>
                            </div>
                            @else
                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                            @endif

                            {{-- tutup pdf --}}
                            @else

                            @endif
                            {{-- tutup kodong data surat_terdaftar_dikemenkumham --}}



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

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->surat_pendaftaran
                                            }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#surat_pendaftaran-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data surat permohonan terdaftar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="2" {{
                                                            ($data->a_surat_pendaftaran == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="0" {{
                                                            ($data->a_surat_pendaftaran == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->surat_pendaftaran }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#surat_pendaftaran-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data surat permohonan terdaftar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="2" {{
                                                            ($data->a_surat_pendaftaran == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="0" {{
                                                            ($data->a_surat_pendaftaran == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->surat_pendaftaran }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                </div>
                            </div>

                            {{-- tutup aktif a_surat_pendaftaran --}}

                            {{-- buka JPG --}}
                            @elseif ($surat_pendaftaran == 'png' or $surat_pendaftaran
                            == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_surat_pendaftaran JPG--}}
                                    @if ($data->a_surat_pendaftaran == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->surat_pendaftaran
                                            }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->surat_pendaftaran) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->surat_pendaftaran }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->surat_pendaftaran) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data surat permohonan terdaftar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="2" {{
                                                            ($data->a_surat_pendaftaran == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="0" {{
                                                            ($data->a_surat_pendaftaran == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->surat_pendaftaran }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->surat_pendaftaran) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->surat_pendaftaran }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->surat_pendaftaran) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data surat permohonan terdaftar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="2" {{
                                                            ($data->a_surat_pendaftaran == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_pendaftaran"
                                                            name="a_surat_pendaftaran" value="0" {{
                                                            ($data->a_surat_pendaftaran == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->surat_pendaftaran }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                    {{-- tutup aktif a_surat_pendaftaran JPG--}}

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

                            {{-- kodong data program --}}
                            @if (!empty($data->program))
                            @php
                            $pecah = explode('.', $data->program);
                            $program = $pecah[1];
                            @endphp

                            @if ($program == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_program --}}
                                    @if ($data->a_program == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->program
                                            }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#program-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data program dan tujuan organisasi
                                                    sesusai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="2"
                                                            {{ ($data->a_program == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="0"
                                                            {{ ($data->a_program == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
                                                    </label>
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    @elseif ($data->a_program == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->program }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#program-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data program dan tujuan organisasi
                                                    sesusai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="2"
                                                            {{ ($data->a_program == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="0"
                                                            {{ ($data->a_program == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->program }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                </div>
                            </div>

                            {{-- tutup aktif a_program --}}

                            {{-- buka JPG --}}
                            @elseif ($program == 'png' or $program
                            == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_program JPG--}}
                                    @if ($data->a_program == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->program
                                            }}</label>
                                    </p>
                                    {{-- tutup status data program
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
                                                <a href="{{ asset($data->nama . '/' . $data->program) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->program }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->program) }}" alt=""
                                                        class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data program dan tujuan organisasi
                                                    sesusai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="2"
                                                            {{ ($data->a_program == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="0"
                                                            {{ ($data->a_program == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
                                                    </label>
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    @elseif ($data->a_program == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->program }}</label>
                                    </p>

                                    {{-- tutup status data program
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
                                                <a href="{{ asset($data->nama . '/' . $data->program) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->program }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->program) }}" alt=""
                                                        class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data program dan tujuan organisasi
                                                    sesusai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="2"
                                                            {{ ($data->a_program == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_program" name="a_program" value="0"
                                                            {{ ($data->a_program == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->program }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                    {{-- tutup aktif a_program JPG--}}

                                    {{-- TUTUP jpg --}}

                                </div>
                            </div>
                            @else
                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                            @endif

                            {{-- tutup pdf --}}

                            @else

                            @endif
                            {{-- tutup kodong data program --}}

                            {{-- kodong data adrt --}}
                            @if(!empty($data->adrt))
                            @php
                            $pecah = explode('.', $data->adrt);
                            $adrt = $pecah[1];
                            @endphp

                            @if($adrt == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_adrt --}}
                                    @if($data->a_adrt == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->adrt
                                            }}</label>
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
                                                <label class="col-sm-12">Apakah data anggaran rumah dasar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="2" {{
                                                            ($data->a_adrt == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="0" {{
                                                            ($data->a_adrt == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->adrt }}</label>
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
                                                <label class="col-sm-12">Apakah data anggaran rumah dasar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="2" {{
                                                            ($data->a_adrt == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="0" {{
                                                            ($data->a_adrt == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->adrt }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                </div>
                            </div>

                            {{-- tutup aktif a_adrt --}}

                            {{-- buka JPG --}}
                            @elseif($adrt == 'png' or $adrt
                            == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_adrt JPG --}}
                                    @if($data->a_adrt == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->adrt
                                            }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->adrt) }}" data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->adrt }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->adrt) }}" alt=""
                                                        class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data anggaran rumah dasar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="2" {{
                                                            ($data->a_adrt == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="0" {{
                                                            ($data->a_adrt == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->adrt }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->adrt) }}" data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->adrt }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->adrt) }}" alt=""
                                                        class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data anggaran rumah dasar,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="2" {{
                                                            ($data->a_adrt == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_adrt" name="a_adrt" value="0" {{
                                                            ($data->a_adrt == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->adrt }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->akte_pendirian
                                            }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#akte_pendirian-{{$data->id}}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah akte pendirian orkemas yang disahkan
                                                    notaris,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="2" {{
                                                            ($data->a_akte_pendirian == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="0" {{
                                                            ($data->a_akte_pendirian == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->akte_pendirian }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#akte_pendirian-{{$data->id }}">Lihat
                                            Data
                                        </a>
                                    </p>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah akte pendirian orkemas yang disahkan
                                                    notaris,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="2" {{
                                                            ($data->a_akte_pendirian == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="0" {{
                                                            ($data->a_akte_pendirian == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->akte_pendirian }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif
                                </div>
                            </div>
                            {{-- tutup aktif a_akte_pendirian --}}

                            {{-- buka JPG --}}
                            @elseif ($akte_pendirian == 'png' or $akte_pendirian
                            == 'jpg')

                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_akte_pendirian JPG--}}
                                    @if ($data->a_akte_pendirian == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->akte_pendirian
                                            }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->akte_pendirian) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->akte_pendirian }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->akte_pendirian) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah akte pendirian orkemas yang disahkan
                                                    notaris,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="2" {{
                                                            ($data->a_akte_pendirian == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="0" {{
                                                            ($data->a_akte_pendirian == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->akte_pendirian }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->akte_pendirian) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->akte_pendirian }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->akte_pendirian) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah akte pendirian orkemas yang disahkan
                                                    notaris,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="2" {{
                                                            ($data->a_akte_pendirian == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_akte_pendirian"
                                                            name="a_akte_pendirian" value="0" {{
                                                            ($data->a_akte_pendirian == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->akte_pendirian }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                    {{-- tutup aktif a_akte_pendirian JPG--}}
                                </div>
                            </div>
                            {{-- TUTUP jpg --}}
                            @else
                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                            @endif

                            {{-- tutup pdf --}}
                            @else

                            @endif
                            {{-- tutup kodong data akte_pendirian --}}


                            {{-- kodong data keabsahan_kantor --}}
                            @if(!empty($data->keabsahan_kantor))
                            @php
                            $pecah = explode('.', $data->keabsahan_kantor);
                            $keabsahan_kantor = $pecah[1];
                            @endphp

                            @if($keabsahan_kantor == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_keabsahan_kantor --}}
                                    @if($data->a_keabsahan_kantor == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->keabsahan_kantor
                                            }}</label>
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
                                                <label class="col-sm-12">Apakah lampiran bukti kepemilikan kantor atau
                                                    kontrak,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="2" {{
                                                            ($data->a_keabsahan_kantor == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="0" {{
                                                            ($data->a_keabsahan_kantor == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
                                                    </label>
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    @elseif($data->a_keabsahan_kantor == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->keabsahan_kantor }}</label>
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
                                                <label class="col-sm-12">Apakah data keabsahan kepemilikan disertai
                                                    bukti,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="2" {{
                                                            ($data->a_keabsahan_kantor == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="0" {{
                                                            ($data->a_keabsahan_kantor == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->keabsahan_kantor }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif
                                </div>
                            </div>
                            {{-- tutup aktif a_keabsahan_kantor --}}

                            {{-- buka JPG --}}
                            @elseif($keabsahan_kantor == 'png' or $keabsahan_kantor
                            == 'jpg')

                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_keabsahan_kantor JPG --}}
                                    @if($data->a_keabsahan_kantor == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->keabsahan_kantor
                                            }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->keabsahan_kantor) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->keabsahan_kantor }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->keabsahan_kantor) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah lampiran bukti kepemilikan kantor atau
                                                    kontrak,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="2" {{
                                                            ($data->a_keabsahan_kantor == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="0" {{
                                                            ($data->a_keabsahan_kantor == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
                                                    </label>
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    @elseif($data->a_keabsahan_kantor == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->keabsahan_kantor }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->keabsahan_kantor) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->keabsahan_kantor }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->keabsahan_kantor) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah lampiran bukti kepemilikan kantor atau
                                                    kontrak,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="2" {{
                                                            ($data->a_keabsahan_kantor == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_keabsahan_kantor"
                                                            name="a_keabsahan_kantor" value="0" {{
                                                            ($data->a_keabsahan_kantor == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->keabsahan_kantor }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif

                                    {{-- tutup aktif a_keabsahan_kantor JPG --}}
                                </div>
                            </div>
                            {{-- TUTUP jpg --}}
                            @else
                            {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                            @endif

                            {{-- tutup pdf --}}
                            @else

                            @endif
                            {{-- tutup kodong data keabsahan_kantor --}}

                            {{-- kodong data surat_keputusan --}}
                            @if(!empty($data->surat_keputusan))
                            @php
                            $pecah = explode('.', $data->surat_keputusan);
                            $surat_keputusan = $pecah[1];
                            @endphp

                            @if($surat_keputusan == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_surat_keputusan --}}
                                    @if($data->a_surat_keputusan == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->surat_keputusan
                                            }}</label>
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
                                                <label class="col-sm-12">Apakah data surat keputusan pengurus orkemas
                                                    lengkap secara sah sesuai,</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="2" {{
                                                            ($data->a_surat_keputusan == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="0" {{
                                                            ($data->a_surat_keputusan == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->surat_keputusan }}</label>
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
                                                <label class="col-sm-12">Apakah data surat keputusan pengurus orkemas
                                                    lengkap secara sah sesuai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="2" {{
                                                            ($data->a_surat_keputusan == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="0" {{
                                                            ($data->a_surat_keputusan == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->surat_keputusan }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                            sampai pengguna memperbaiki</label>
                                    </p>

                                    @endif
                                </div>
                            </div>
                            {{-- tutup aktif a_surat_keputusan --}}

                            {{-- buka JPG --}}
                            @elseif($surat_keputusan == 'png' or $surat_keputusan
                            == 'jpg')

                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">

                                    {{-- aktif a_surat_keputusan JPG --}}
                                    @if($data->a_surat_keputusan == 0)

                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                                data-feather="loader"></span>{{
                                            $data->surat_keputusan
                                            }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->surat_keputusan) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->surat_keputusan }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->surat_keputusan) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data surat keputusan pengurus orkemas
                                                    lengkap secara sah sesuai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="2" {{
                                                            ($data->a_surat_keputusan == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="0" {{
                                                            ($data->a_surat_keputusan == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="check-circle"></span>{{
                                            $data->surat_keputusan }}</label>
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
                                                <a href="{{ asset($data->nama . '/' . $data->surat_keputusan) }}"
                                                    data-lightbox="1"
                                                    data-title="{{ $data->nama . '/' . $data->surat_keputusan }}">

                                                    <img src="{{ asset($data->nama . '/' . $data->surat_keputusan) }}"
                                                        alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                        style="max-height: 200px;">


                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <p class="text-muted text-center">
                                                <label class="col-sm-12">Apakah data surat keputusan pengurus orkemas
                                                    lengkap secara sah sesuai,
                                                    tervalidasi ?</label>
                                            </p>
                                            <p class="text-muted text-center">
                                            <div class="col-sm-12">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="2" {{
                                                            ($data->a_surat_keputusan == 2 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-success">Lengkap</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" id="a_surat_keputusan"
                                                            name="a_surat_keputusan" value="0" {{
                                                            ($data->a_surat_keputusan == 0 ?
                                                        'checked' :
                                                        '')}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span class="label label-lg label-danger">Tidak</span>
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
                                                data-feather="x-circle"></span>{{
                                            $data->surat_keputusan }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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

                            {{--
                        </form> --}}
                    </div>

                    <div class="tab-pane" id="{{$data->surat_pendaftaran}}" role="tabpanel">
                        {{-- kodong data biodata_pengurus --}}
                        @if(!empty($data->biodata_pengurus))
                        @php
                        $pecah = explode('.', $data->biodata_pengurus);
                        $biodata_pengurus = $pecah[1];
                        @endphp

                        @if($biodata_pengurus == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_biodata_pengurus --}}
                                @if($data->a_biodata_pengurus == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->biodata_pengurus
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah biodata ketua dan anggota orkemas lengkap,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="2" {{
                                                        ($data->a_biodata_pengurus == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="0" {{
                                                        ($data->a_biodata_pengurus == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->biodata_pengurus }}</label>
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
                                            <label class="col-sm-12">Apakah biodata ketua dan anggota orkemas lengkap,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="2" {{
                                                        ($data->a_biodata_pengurus == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="0" {{
                                                        ($data->a_biodata_pengurus == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->biodata_pengurus }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_biodata_pengurus --}}

                        {{-- buka JPG --}}
                        @elseif($biodata_pengurus == 'png' or $biodata_pengurus
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_biodata_pengurus JPG --}}
                                @if($data->a_biodata_pengurus == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->biodata_pengurus
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->biodata_pengurus) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->biodata_pengurus }}">

                                                <img src="{{ asset($data->nama . '/' . $data->biodata_pengurus) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah biodata ketua dan anggota orkemas lengkap,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="2" {{
                                                        ($data->a_biodata_pengurus == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="0" {{
                                                        ($data->a_biodata_pengurus == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->biodata_pengurus }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->biodata_pengurus) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->biodata_pengurus }}">

                                                <img src="{{ asset($data->nama . '/' . $data->biodata_pengurus) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah biodata ketua dan anggota orkemas lengkap,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="2" {{
                                                        ($data->a_biodata_pengurus == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_biodata_pengurus"
                                                        name="a_biodata_pengurus" value="0" {{
                                                        ($data->a_biodata_pengurus == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->biodata_pengurus }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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
                        @if(!empty($data->ktp))
                        @php
                        $pecah = explode('.', $data->ktp);
                        $ktp = $pecah[1];
                        @endphp

                        @if($ktp == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_ktp --}}
                                @if($data->a_ktp == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->ktp
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#ktp-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data ktp ketua atau sekataris,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="2" {{
                                                        ($data->a_ktp == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="0" {{
                                                        ($data->a_ktp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->ktp }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#ktp-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data ktp ketua atau sekataris,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="2" {{
                                                        ($data->a_ktp == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="0" {{
                                                        ($data->a_ktp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->ktp }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_ktp --}}

                        {{-- buka JPG --}}
                        @elseif($ktp == 'png' or $ktp
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_ktp JPG --}}
                                @if($data->a_ktp == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->ktp
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->ktp) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->ktp }}">

                                                <img src="{{ asset($data->nama . '/' . $data->ktp) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data ktp ketua atau sekataris,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="2" {{
                                                        ($data->a_ktp == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="0" {{
                                                        ($data->a_ktp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->ktp }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->ktp) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->ktp }}">

                                                <img src="{{ asset($data->nama . '/' . $data->ktp) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data ktp ketua atau sekataris,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="2" {{
                                                        ($data->a_ktp == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_ktp" name="a_ktp" value="0" {{
                                                        ($data->a_ktp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->ktp }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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
                        @if(!empty($data->foto))
                        @php
                        $pecah = explode('.', $data->foto);
                        $foto = $pecah[1];
                        @endphp

                        @if($foto == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_foto --}}
                                @if($data->a_foto == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->foto
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#foto-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data foto kantor sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="2" {{
                                                        ($data->a_foto == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="0" {{
                                                        ($data->a_foto == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->foto }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#foto-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data foto kantor sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="2" {{
                                                        ($data->a_foto == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="0" {{
                                                        ($data->a_foto == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->foto }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_foto --}}

                        {{-- buka JPG --}}
                        @elseif($foto == 'png' or $foto
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_foto JPG --}}
                                @if($data->a_foto == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->foto
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->foto) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->foto }}">

                                                <img src="{{ asset($data->nama . '/' . $data->foto) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data foto kantor sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="2" {{
                                                        ($data->a_foto == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="0" {{
                                                        ($data->a_foto == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->foto }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->foto) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->foto }}">

                                                <img src="{{ asset($data->nama . '/' . $data->foto) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah data foto kantor sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="2" {{
                                                        ($data->a_foto == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto" name="a_foto" value="0" {{
                                                        ($data->a_foto == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->foto }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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
                        @if(!empty($data->surat_keterangan_domisili))
                        @php
                        $pecah = explode('.', $data->surat_keterangan_domisili);
                        $surat_keterangan_domisili = $pecah[1];
                        @endphp

                        @if($surat_keterangan_domisili == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_keterangan_domisili --}}
                                @if($data->a_surat_keterangan_domisili == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_keterangan_domisili
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah surat keterangan domisili kantor sesuai
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="2" {{
                                                        ($data->a_surat_keterangan_domisili == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="0" {{
                                                        ($data->a_surat_keterangan_domisili == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_keterangan_domisili }}</label>
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
                                            <label class="col-sm-12">Apakah surat keterangan domisili kantor sesuai
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="2" {{
                                                        ($data->a_surat_keterangan_domisili == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="0" {{
                                                        ($data->a_surat_keterangan_domisili == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_keterangan_domisili }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_keterangan_domisili --}}

                        {{-- buka JPG --}}
                        @elseif($a_surat_keterangan_domisili == 'png' or $a_surat_keterangan_domisili
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_keterangan_domisili JPG --}}
                                @if($data->a_surat_keterangan_domisili == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_keterangan_domisili
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_keterangan_domisili) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_keterangan_domisili }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_keterangan_domisili) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat keterangan domisili kantor sesuai
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="2" {{
                                                        ($data->a_surat_keterangan_domisili == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="0" {{
                                                        ($data->a_surat_keterangan_domisili == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_keterangan_domisili }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_keterangan_domisili) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_keterangan_domisili }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_keterangan_domisili) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat keterangan domisili kantor sesuai
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="2" {{
                                                        ($data->a_surat_keterangan_domisili == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_keterangan_domisili"
                                                        name="a_surat_keterangan_domisili" value="0" {{
                                                        ($data->a_surat_keterangan_domisili == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_keterangan_domisili }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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
                        @if(!empty($data->npwp))
                        @php
                        $pecah = explode('.', $data->npwp);
                        $npwp = $pecah[1];
                        @endphp

                        @if($npwp == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_npwp --}}
                                @if($data->a_npwp == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->npwp
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#npwp-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Nomor Pokok Wajib Pajak sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="2" {{
                                                        ($data->a_npwp== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="0" {{
                                                        ($data->a_npwp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->npwp }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#npwp-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Nomor Pokok Wajib Pajak sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="2" {{
                                                        ($data->a_npwp== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="0" {{
                                                        ($data->a_npwp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->npwp }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_npwp --}}

                        {{-- buka JPG --}}
                        @elseif($npwp == 'png' or $npwp
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_npwp JPG --}}
                                @if($data->a_npwp == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->npwp
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->npwp) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->npwp }}">

                                                <img src="{{ asset($data->nama . '/' . $data->npwp) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Nomor Pokok Wajib Pajak sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="2" {{
                                                        ($data->a_npwp== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="0" {{
                                                        ($data->a_npwp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->npwp }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->npwp) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->npwp }}">

                                                <img src="{{ asset($data->nama . '/' . $data->npwp) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Nomor Pokok Wajib Pajak sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="2" {{
                                                        ($data->a_npwp== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_npwp" name="a_npwp" value="0" {{
                                                        ($data->a_npwp == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->npwp }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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
                        @if(!empty($data->foto_kantor))
                        @php
                        $pecah = explode('.', $data->foto_kantor);
                        $foto_kantor = $pecah[1];
                        @endphp

                        @if($foto_kantor == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_foto_kantor --}}
                                @if($data->a_foto_kantor == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->foto_kantor
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah Foto kantor kantor atau kesetariantan tampak
                                                depan papan nama
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="2" {{ ($data->a_foto_kantor == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="0" {{ ($data->a_foto_kantor == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->foto_kantor }}</label>
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
                                            <label class="col-sm-12">Apakah Foto kantor kantor atau kesetariantan tampak
                                                depan papan nama
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="2" {{ ($data->a_foto_kantor == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="0" {{ ($data->a_foto_kantor == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->foto_kantor }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_foto_kantor --}}

                        {{-- buka JPG --}}
                        @elseif($foto_kantor == 'png' or $foto_kantor
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_foto_kantor JPG --}}
                                @if($data->a_foto_kantor == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->foto_kantor
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->foto_kantor) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->foto_kantor }}">

                                                <img src="{{ asset($data->nama . '/' . $data->foto_kantor) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Foto kantor kantor atau kesetariantan tampak
                                                depan papan nama
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="2" {{ ($data->a_foto_kantor == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="0" {{ ($data->a_foto_kantor == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->foto_kantor }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->foto_kantor) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->foto_kantor }}">

                                                <img src="{{ asset($data->nama . '/' . $data->foto_kantor) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Foto kantor kantor atau kesetariantan tampak
                                                depan papan nama
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="2" {{ ($data->a_foto_kantor == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_foto_kantor" name="a_foto_kantor"
                                                        value="0" {{ ($data->a_foto_kantor == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->foto_kantor }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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

                        {{-- kodong data surat_absah --}}
                        @if(!empty($data->surat_absah))
                        @php
                        $pecah = explode('.', $data->surat_absah);
                        $surat_absah = $pecah[1];
                        @endphp

                        @if($surat_absah == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_absah --}}
                                @if($data->a_surat_absah == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_absah
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_absah-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pertanggung jawaban absah data sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="2" {{ ($data->a_surat_absah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="0" {{ ($data->a_surat_absah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_absah == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_absah }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_absah-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pertanggung jawaban absah data sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="2" {{ ($data->a_surat_absah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="0" {{ ($data->a_surat_absah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_absah }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_absah --}}

                        {{-- buka JPG --}}
                        @elseif($surat_absah == 'png' or $surat_absah
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_absah JPG --}}
                                @if($data->a_surat_absah == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_absah
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_absah
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_absah) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_absah }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_absah) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pertanggung jawaban absah data sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="2" {{ ($data->a_surat_absah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="0" {{ ($data->a_surat_absah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_absah == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_absah }}</label>
                                </p>

                                {{-- tutup status data surat_absah
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_absah) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_absah }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_absah) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pertanggung jawaban absah data sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="2" {{ ($data->a_surat_absah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_absah" name="a_surat_absah"
                                                        value="0" {{ ($data->a_surat_absah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_absah }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_absah JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_absah --}}

                        {{-- kodong data surat_rekom_kesediaan --}}
                        @if(!empty($data->surat_rekom_kesediaan))
                        @php
                        $pecah = explode('.', $data->surat_rekom_kesediaan);
                        $surat_rekom_kesediaan = $pecah[1];
                        @endphp

                        @if($surat_rekom_kesediaan == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_kesediaan --}}
                                @if($data->a_surat_rekom_kesediaan == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_kesediaan
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah surat pernyataan kesediaan atau persetujuan,
                                                orkemas untuk
                                                mencantumkan nama pejabat pemerintah dan tokoh masyarakat
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="2" {{
                                                        ($data->a_surat_rekom_kesediaan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="0" {{
                                                        ($data->a_surat_rekom_kesediaan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_kesediaan }}</label>
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
                                            <label class="col-sm-12">Apakah surat pernyataan kesediaan atau persetujuan,
                                                orkemas untuk
                                                mencantumkan nama pejabat pemerintah dan tokoh masyarakat
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="2" {{
                                                        ($data->a_surat_rekom_kesediaan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="0" {{
                                                        ($data->a_surat_rekom_kesediaan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_kesediaan }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_rekom_kesediaan --}}

                        {{-- buka JPG --}}
                        @elseif($a_surat_rekom_kesediaan == 'png' or $a_surat_rekom_kesediaan
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_kesediaan JPG --}}
                                @if($data->a_surat_rekom_kesediaan == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_kesediaan
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_kesediaan) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_kesediaan }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_kesediaan) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan kesediaan atau persetujuan,
                                                orkemas untuk
                                                mencantumkan nama pejabat pemerintah dan tokoh masyarakat
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="2" {{
                                                        ($data->a_surat_rekom_kesediaan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="0" {{
                                                        ($data->a_surat_rekom_kesediaan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_kesediaan }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_kesediaan) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_kesediaan }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_kesediaan) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan kesediaan atau persetujuan,
                                                orkemas untuk
                                                mencantumkan nama pejabat pemerintah dan tokoh masyarakat
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="2" {{
                                                        ($data->a_surat_rekom_kesediaan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_kesediaan"
                                                        name="a_surat_rekom_kesediaan" value="0" {{
                                                        ($data->a_surat_rekom_kesediaan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_kesediaan }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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

                    <div class="tab-pane" id="{{$data->akte_pendirian}}" role="tabpanel">

                        {{-- kodong data surat_ketertiban --}}
                        @if(!empty($data->surat_ketertiban))
                        @php
                        $pecah = explode('.', $data->surat_ketertiban);
                        $surat_ketertiban = $pecah[1];
                        @endphp

                        @if($surat_ketertiban == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_ketertiban --}}
                                @if($data->a_surat_ketertiban == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_ketertiban
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_ketertiban-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan untuk menertibkan orkemas
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="2" {{
                                                        ($data->a_surat_ketertiban == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="0" {{
                                                        ($data->a_surat_ketertiban == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_ketertiban == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_ketertiban }}</label>
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
                                            <label class="col-sm-12">Apakah surat pernyataan untuk menertibkan orkemas
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="2" {{
                                                        ($data->a_surat_ketertiban == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="0" {{
                                                        ($data->a_surat_ketertiban == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_ketertiban }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_ketertiban --}}

                        {{-- buka JPG --}}
                        @elseif($surat_ketertiban == 'png' or $surat_ketertiban
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_ketertiban JPG --}}
                                @if($data->a_surat_ketertiban == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_ketertiban
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_ketertiban
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_ketertiban) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_ketertiban }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_ketertiban) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan untuk menertibkan orkemas
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="2" {{
                                                        ($data->a_surat_ketertiban == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="0" {{
                                                        ($data->a_surat_ketertiban == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_ketertiban == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_ketertiban }}</label>
                                </p>

                                {{-- tutup status data surat_ketertiban
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_ketertiban) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_ketertiban }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_ketertiban) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan untuk menertibkan orkemas
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="2" {{
                                                        ($data->a_surat_ketertiban == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_ketertiban"
                                                        name="a_surat_ketertiban" value="0" {{
                                                        ($data->a_surat_ketertiban == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_ketertiban }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_ketertiban JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_ketertiban --}}

                        {{-- kodong data surat_tidak_avilasi --}}
                        @if(!empty($data->surat_tidak_avilasi))
                        @php
                        $pecah = explode('.', $data->surat_tidak_avilasi);
                        $surat_tidak_avilasi = $pecah[1];
                        @endphp

                        @if($surat_tidak_avilasi == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_tidak_avilasi --}}
                                @if($data->a_surat_tidak_avilasi == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_tidak_avilasi
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_tidak_avilasi-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">
                                                Apakah surat pernyataan tidak terafiliasi dengan partai politik sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="2" {{
                                                        ($data->a_surat_tidak_avilasi == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="0" {{
                                                        ($data->a_surat_tidak_avilasi == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_tidak_avilasi == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_tidak_avilasi }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_tidak_avilasi-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan tidak ada konflik di orkemas
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="2" {{
                                                        ($data->a_surat_tidak_avilasi == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="0" {{
                                                        ($data->a_surat_tidak_avilasi == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_tidak_avilasi }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_tidak_avilasi --}}

                        {{-- buka JPG --}}
                        @elseif($surat_tidak_avilasi == 'png' or $surat_tidak_avilasi
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_tidak_avilasi JPG --}}
                                @if($data->a_surat_tidak_avilasi == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_tidak_avilasi
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_tidak_avilasi
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_tidak_avilasi) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_tidak_avilasi }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_tidak_avilasi) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan tidak ada konflik di orkemas
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="2" {{
                                                        ($data->a_surat_tidak_avilasi == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="0" {{
                                                        ($data->a_surat_tidak_avilasi == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_tidak_avilasi == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_tidak_avilasi }}</label>
                                </p>

                                {{-- tutup status data surat_tidak_avilasi
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_tidak_avilasi) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_tidak_avilasi }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_tidak_avilasi) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan tidak ada konflik di orkemas
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="2" {{
                                                        ($data->a_surat_tidak_avilasi == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_tidak_avilasi"
                                                        name="a_surat_tidak_avilasi" value="0" {{
                                                        ($data->a_surat_tidak_avilasi == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_tidak_avilasi }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_tidak_avilasi JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_tidak_avilasi --}}

                        {{-- kodong data surat_konflik --}}
                        @if(!empty($data->surat_konflik))
                        @php
                        $pecah = explode('.', $data->surat_konflik);
                        $surat_konflik = $pecah[1];
                        @endphp

                        @if($surat_konflik == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_konflik --}}
                                @if($data->a_surat_konflik == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_konflik
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_konflik-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan tidak ada konflik di orkemas
                                                sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="2" {{ ($data->a_surat_konflik == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="0" {{ ($data->a_surat_konflik == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_konflik == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_konflik }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_konflik-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan tidak ada konflik pada
                                                orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="2" {{ ($data->a_surat_konflik == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="0" {{ ($data->a_surat_konflik == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_konflik }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_konflik --}}

                        {{-- buka JPG --}}
                        @elseif($surat_konflik == 'png' or $surat_konflik
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_konflik JPG --}}
                                @if($data->a_surat_konflik == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_konflik
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_konflik
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_konflik) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_konflik }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_konflik) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan tidak ada konflik pada
                                                orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="2" {{ ($data->a_surat_konflik == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="0" {{ ($data->a_surat_konflik == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_konflik == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_konflik }}</label>
                                </p>

                                {{-- tutup status data surat_konflik
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_konflik) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_konflik }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_konflik) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan tidak ada konflik pada
                                                orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="2" {{ ($data->a_surat_konflik == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_konflik" name="a_surat_konflik"
                                                        value="0" {{ ($data->a_surat_konflik == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_konflik }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_konflik JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_konflik --}}

                        {{-- kodong data surat_hak_cipta --}}
                        @if(!empty($data->surat_hak_cipta))
                        @php
                        $pecah = explode('.', $data->surat_hak_cipta);
                        $surat_hak_cipta = $pecah[1];
                        @endphp

                        @if($surat_hak_cipta == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_hak_cipta --}}
                                @if($data->a_surat_hak_cipta == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_hak_cipta
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_hak_cipta-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan bahwa lambang,simbol, nama,
                                                bendera memiliki hak paten,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="2" {{ ($data->a_surat_hak_cipta
                                                    == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="0" {{ ($data->a_surat_hak_cipta
                                                    == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_hak_cipta == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_hak_cipta }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_hak_cipta-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan bahwa lambang,simbol, nama,
                                                bendera memiliki hak paten,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="2" {{ ($data->a_surat_hak_cipta
                                                    == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="0" {{ ($data->a_surat_hak_cipta
                                                    == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_hak_cipta }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_hak_cipta --}}

                        {{-- buka JPG --}}
                        @elseif($surat_hak_cipta == 'png' or $surat_hak_cipta
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_hak_cipta JPG --}}
                                @if($data->a_surat_hak_cipta == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_hak_cipta
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_hak_cipta
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_hak_cipta) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_hak_cipta }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_hak_cipta) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan bahwa lambang,simbol, nama,
                                                bendera memiliki hak paten,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="2" {{ ($data->a_surat_hak_cipta
                                                    == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="0" {{ ($data->a_surat_hak_cipta
                                                    == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_hak_cipta == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_hak_cipta }}</label>
                                </p>

                                {{-- tutup status data surat_hak_cipta
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_hak_cipta) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_hak_cipta }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_hak_cipta) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat pernyataan bahwa lambang,simbol, nama,
                                                bendera memiliki hak paten,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="2" {{ ($data->a_surat_hak_cipta
                                                    == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_hak_cipta"
                                                        name="a_surat_hak_cipta" value="0" {{ ($data->a_surat_hak_cipta
                                                    == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_hak_cipta }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_hak_cipta JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_hak_cipta --}}

                        {{-- kodong data surat_laporan --}}
                        @if(!empty($data->surat_laporan))
                        @php
                        $pecah = explode('.', $data->surat_laporan);
                        $surat_laporan = $pecah[1];
                        @endphp

                        @if($surat_laporan == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_laporan --}}
                                @if($data->a_surat_laporan == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_laporan
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_laporan-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan untuk melaporkan setiap
                                                kegiatan orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="2" {{ ($data->a_surat_laporan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="0" {{ ($data->a_surat_laporan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_laporan == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_laporan }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_laporan-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan untuk melaporkan setiap
                                                kegiatan orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="2" {{ ($data->a_surat_laporan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="0" {{ ($data->a_surat_laporan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_laporan }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_laporan --}}

                        {{-- buka JPG --}}
                        @elseif($surat_laporan == 'png' or $surat_laporan
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_laporan JPG --}}
                                @if($data->a_surat_laporan == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_laporan
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_laporan
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_laporan) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_laporan }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_laporan) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan untuk melaporkan setiap
                                                kegiatan orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="2" {{ ($data->a_surat_laporan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="0" {{ ($data->a_surat_laporan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_laporan == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_laporan }}</label>
                                </p>

                                {{-- tutup status data surat_laporan
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_laporan) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_laporan }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_laporan) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat penyataan untuk melaporkan setiap
                                                kegiatan orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="2" {{ ($data->a_surat_laporan == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_laporan" name="a_surat_laporan"
                                                        value="0" {{ ($data->a_surat_laporan == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_laporan }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_laporan JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_laporan --}}

                        {{-- kodong data surat_rekom_agama --}}
                        @if(!empty($data->surat_rekom_agama))
                        @php
                        $pecah = explode('.', $data->surat_rekom_agama);
                        $surat_rekom_agama = $pecah[1];
                        @endphp

                        @if($surat_rekom_agama == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_agama --}}
                                @if($data->a_surat_rekom_agama == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_agama
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian agama
                                                untuk orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="2" {{
                                                        ($data->a_surat_rekom_agama == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="0" {{
                                                        ($data->a_surat_rekom_agama == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_agama }}</label>
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
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian agama
                                                untuk orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="2" {{
                                                        ($data->a_surat_rekom_agama == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="0" {{
                                                        ($data->a_surat_rekom_agama == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_agama }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_rekom_agama --}}

                        {{-- buka JPG --}}
                        @elseif($surat_rekom_agama == 'png' or $surat_rekom_agama
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_agama JPG --}}
                                @if($data->a_surat_rekom_agama == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_agama
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_agama) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_agama }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_agama) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian agama
                                                untuk orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="2" {{
                                                        ($data->a_surat_rekom_agama == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="0" {{
                                                        ($data->a_surat_rekom_agama == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_agama }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_agama) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_agama }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_agama) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian agama
                                                untuk orkemas sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="2" {{
                                                        ($data->a_surat_rekom_agama == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_agama"
                                                        name="a_surat_rekom_agama" value="0" {{
                                                        ($data->a_surat_rekom_agama == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_agama }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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

                        {{-- kodong data surat_rekom_skpd --}}
                        @if(!empty($data->surat_rekom_skpd))
                        @php
                        $pecah = explode('.', $data->surat_rekom_skpd);
                        $surat_rekom_skpd = $pecah[1];
                        @endphp

                        @if($surat_rekom_skpd == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_skpd --}}
                                @if($data->a_surat_rekom_skpd == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_skpd
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_rekom_skpd-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian dan SKPD
                                                kebudayaan untuk
                                                kepecayaan kepada tuhan Maha ESA sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="2" {{
                                                        ($data->a_surat_rekom_skpd== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="0" {{
                                                        ($data->a_surat_rekom_skpd == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_rekom_skpd == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_skpd }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal"
                                        href="#surat_rekom_skpd-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian dan SKPD
                                                kebudayaan untuk
                                                kepecayaan kepada tuhan Maha ESA sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="2" {{
                                                        ($data->a_surat_rekom_skpd== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="0" {{
                                                        ($data->a_surat_rekom_skpd == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_skpd }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_rekom_skpd --}}

                        {{-- buka JPG --}}
                        @elseif($surat_rekom_skpd == 'png' or $surat_rekom_skpd
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_skpd JPG --}}
                                @if($data->a_surat_rekom_skpd == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_skpd
                                        }}</label>
                                </p>

                                {{-- tutup status data surat_rekom_skpd
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_skpd) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_skpd }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_skpd) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian dan SKPD
                                                kebudayaan untuk
                                                kepecayaan kepada tuhan Maha ESA sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="2" {{
                                                        ($data->a_surat_rekom_skpd== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="0" {{
                                                        ($data->a_surat_rekom_skpd == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_surat_rekom_skpd == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_skpd }}</label>
                                </p>

                                {{-- tutup status data surat_rekom_skpd
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_skpd) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_skpd }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_skpd) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian dan SKPD
                                                kebudayaan untuk
                                                kepecayaan kepada tuhan Maha ESA sesuai,
                                                tervalidasi ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="2" {{
                                                        ($data->a_surat_rekom_skpd== 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd"
                                                        name="a_surat_rekom_skpd" value="0" {{
                                                        ($data->a_surat_rekom_skpd == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_skpd }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_surat_rekom_skpd JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data surat_rekom_skpd --}}

                    </div>
                    <div class="tab-pane" id="{{$data->adrt}}" role="tabpanel">
                        {{-- kodong data surat_rekom_skpd_kerja --}}
                        @if(!empty($data->surat_rekom_skpd_kerja))
                        @php
                        $pecah = explode('.', $data->surat_rekom_skpd_kerja);
                        $surat_rekom_skpd_kerja = $pecah[1];
                        @endphp

                        @if($surat_rekom_skpd_kerja == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_skpd_kerja --}}
                                @if($data->a_surat_rekom_skpd_kerja == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_skpd_kerja
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian, lembaga,
                                                SKPD yang membidangi
                                                urusan tenaga kerja sesuai,</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="2" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="0" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_skpd_kerja }}</label>
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
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian, lembaga,
                                                SKPD yang membidangi
                                                urusan tenaga kerja sesuai,</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="2" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="0" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_skpd_kerja }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_rekom_skpd_kerja --}}

                        {{-- buka JPG --}}
                        @elseif($surat_rekom_skpd_kerja == 'png' or $surat_rekom_skpd_kerja
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_rekom_skpd_kerja JPG --}}
                                @if($data->a_surat_rekom_skpd_kerja == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_rekom_skpd_kerja
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_skpd_kerja) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_skpd_kerja }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_skpd_kerja) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian, lembaga,
                                                SKPD yang membidangi
                                                urusan tenaga kerja sesuai,</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="2" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="0" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_rekom_skpd_kerja }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_rekom_skpd_kerja) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_rekom_skpd_kerja }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_rekom_skpd_kerja) }}"
                                                    alt="" class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat rekomendasi dari kementrian, lembaga,
                                                SKPD yang membidangi
                                                urusan tenaga kerja sesuai,</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="2" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_rekom_skpd_kerja"
                                                        name="a_surat_rekom_skpd_kerja" value="0" {{
                                                        ($data->a_surat_rekom_skpd_kerja == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_rekom_skpd_kerja }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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
                        @if(!empty($data->surat_izasah))
                        @php
                        $pecah = explode('.', $data->surat_izasah);
                        $surat_izasah = $pecah[1];
                        @endphp

                        @if($surat_izasah == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_izasah --}}
                                @if($data->a_surat_izasah == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_izasah
                                        }}</label>
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
                                            <label class="col-sm-12">Apakah surat_izasah terakhir (ketua,seketaris, dan
                                                bendahara)
                                                sesuai,tervalidasi
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="2" {{ ($data->a_surat_izasah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="0" {{ ($data->a_surat_izasah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_izasah }}</label>
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
                                            <label class="col-sm-12">Apakah surat_izasah terakhir (ketua,seketaris, dan
                                                bendahara)
                                                sesuai,tervalidasi
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="2" {{ ($data->a_surat_izasah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="0" {{ ($data->a_surat_izasah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_izasah }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_surat_izasah --}}

                        {{-- buka JPG --}}
                        @elseif($surat_izasah == 'png' or $surat_izasah
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_surat_izasah JPG --}}
                                @if($data->a_surat_izasah == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->surat_izasah
                                        }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_izasah) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_izasah }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_izasah) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat_izasah terakhir (ketua,seketaris, dan
                                                bendahara)
                                                sesuai,tervalidasi
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="2" {{ ($data->a_surat_izasah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="0" {{ ($data->a_surat_izasah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
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
                                            data-feather="check-circle"></span>{{
                                        $data->surat_izasah }}</label>
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
                                            <a href="{{ asset($data->nama . '/' . $data->surat_izasah) }}"
                                                data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->surat_izasah }}">

                                                <img src="{{ asset($data->nama . '/' . $data->surat_izasah) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah surat_izasah terakhir (ketua,seketaris, dan
                                                bendahara)
                                                sesuai,tervalidasi
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="2" {{ ($data->a_surat_izasah == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_surat_izasah" name="a_surat_izasah"
                                                        value="0" {{ ($data->a_surat_izasah == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->surat_izasah }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
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

                        {{-- kodong data skt --}}
                        @if(!empty($data->skt))
                        @php
                        $pecah = explode('.', $data->skt);
                        $skt = $pecah[1];
                        @endphp

                        @if($skt == 'pdf')
                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_skt --}}
                                @if($data->a_skt == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->skt
                                        }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#skt-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Surat keterangan terdaftar (SKT) Provinsi,
                                                sesuai ?
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="2" {{
                                                        ($data->a_skt == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="0" {{
                                                        ($data->a_skt == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_skt == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->skt }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <a class="btn btn-primary" data-toggle="modal" href="#skt-{{ $data->id }}">Lihat
                                        Data
                                    </a>
                                </p>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Surat keterangan terdaftar (SKT) Provinsi,
                                                sesuai ?
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="2" {{
                                                        ($data->a_skt == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="0" {{
                                                        ($data->a_skt == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->skt }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif
                            </div>
                        </div>
                        {{-- tutup aktif a_skt --}}

                        {{-- buka JPG --}}
                        @elseif($skt == 'png' or $skt
                        == 'jpg')

                        <div class="col-lg-12">
                            <div class="p-20 z-depth-bottom-1">

                                {{-- aktif a_skt JPG --}}
                                @if($data->a_skt == 0)

                                <p class="text-muted text-center"><label class="label label-inverse-primary"><span
                                            data-feather="loader"></span>{{
                                        $data->skt
                                        }}</label>
                                </p>

                                {{-- tutup status data skt
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
                                            <a href="{{ asset($data->nama . '/' . $data->skt) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->skt }}">

                                                <img src="{{ asset($data->nama . '/' . $data->skt) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Surat keterangan terdaftar (SKT) Provinsi,
                                                sesuai ?
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="2" {{
                                                        ($data->a_skt == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="0" {{
                                                        ($data->a_skt == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @elseif($data->a_skt == 2)

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-success"><span
                                            data-feather="check-circle"></span>{{
                                        $data->skt }}</label>
                                </p>

                                {{-- tutup status data skt
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
                                            <a href="{{ asset($data->nama . '/' . $data->skt) }}" data-lightbox="1"
                                                data-title="{{ $data->nama . '/' . $data->skt }}">

                                                <img src="{{ asset($data->nama . '/' . $data->skt) }}" alt=""
                                                    class="img-fluid img-thumbnail mx-auto d-block"
                                                    style="max-height: 200px;">


                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="form-group row">
                                        <p class="text-muted text-center">
                                            <label class="col-sm-12">Apakah Surat keterangan terdaftar (SKT) Provinsi,
                                                sesuai ?
                                                ?</label>
                                        </p>
                                        <p class="text-muted text-center">
                                        <div class="col-sm-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="2" {{
                                                        ($data->a_skt == 2 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-success">Lengkap</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="a_skt" name="a_skt" value="0" {{
                                                        ($data->a_skt == 0 ?
                                                    'checked' :
                                                    '')}}>
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="label label-lg label-danger">Tidak</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                @else

                                <p class="text-muted text-center p-b-5">
                                    <label class="label label-inverse-danger"><span data-feather="x-circle"></span>{{
                                        $data->skt }}</label>
                                </p>

                                <p class="text-muted text-center">
                                    <label class="col-sm-12">Data tidak lengkap yang dikirim, tunggu
                                        sampai pengguna memperbaiki</label>
                                </p>

                                @endif

                                {{-- tutup aktif a_skt JPG --}}
                            </div>
                        </div>
                        {{-- TUTUP jpg --}}
                        @else
                        {{-- SELAIN PDF DAN JPG HAH KOSONG --}}
                        @endif

                        {{-- tutup pdf --}}
                        @else

                        @endif
                        {{-- tutup kodong data skt --}}

                        <div class="col-lg-12">
                            <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title=".z-depth-top-1">
                                <p class="text-muted text-center p-b-5">Keterangan Diisi sesuai hasil
                                    validasi</p>
                                <div class="form-group form-primary">
                                    <textarea rows="10" cols="5" class="form-control" name="ket"
                                        placeholder="Keterangan"></textarea>
                                    <span class="form-bar"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <button type="submit"
                                    class="btn waves-effect waves-light hor-grd btn-grd-success">Simpan
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
<div id="surat_terdaftar_dikemenkumham-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_terdaftar_dikemenkumham }}
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
                    data="{{ asset($data->nama . '/' . $data->surat_terdaftar_dikemenkumham) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_pendaftaran-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_pendaftaran }}
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
                    data="{{ asset($data->nama . '/' . $data->surat_pendaftaran) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal 1-->
<div id="adrt-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->adrt }}
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
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->adrt) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="akte_pendirian-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->akte_pendirian }}
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
                    data="{{ asset($data->nama . '/' . $data->akte_pendirian) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal 1-->
<div id="keabsahan_kantor-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->keabsahan_kantor }}
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
                    data="{{ asset($data->nama . '/' . $data->keabsahan_kantor) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="program-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->program }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->program) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_keputusan-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_keputusan }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_keputusan) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="biodata_pengurus-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->biodata_pengurus }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->biodata_pengurus) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="ktp-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->ktp }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->ktp) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="foto-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->foto }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->foto) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_keterangan_domisili-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_keterangan_domisili }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_keterangan_domisili) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="npwp-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->npwp }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->npwp) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="foto_kantor-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->foto_kantor }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->foto_kantor) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_ketertiban-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_ketertiban }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_ketertiban) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_tidak_avilasi-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_tidak_avilasi }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_tidak_avilasi) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_konflik-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_konflik }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_konflik) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_hak_cipta-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_hak_cipta }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_hak_cipta) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_laporan-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_laporan }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_laporan) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_absah-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_absah }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->surat_absah) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_rekom_agama-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_rekom_agama }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_rekom_agama) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_rekom_skpd-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_rekom_skpd }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_rekom_skpd) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_rekom_skpd_kerja-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_rekom_skpd_kerja }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_rekom_skpd_kerja) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_rekom_kesediaan-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_rekom_kesediaan }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_rekom_kesediaan) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="surat_izasah-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->surat_izasah }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px"
                    data="{{ asset($data->nama . '/' . $data->surat_izasah) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div id="skt-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->skt }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->skt) }}"></object>
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
    $(document).on('click', 'input[name="a_surat_terdaftar_dikemenkumham"]', function() {
    $('input[name="a_surat_terdaftar_dikemenkumham"]').not(this).prop('checked', false);
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

$(document).on('click', 'input[name="a_program"]', function() {
    $('input[name="a_program"]').not(this).prop('checked', false);
});

$(document).on('click', 'input[name="a_surat_keputusan"]', function() {
    $('input[name="a_surat_keputusan"]').not(this).prop('checked', false);
});

$(document).on('click', 'input[name="a_biodata_pengurus"]', function() {
    $('input[name="a_biodata_pengurus"]').not(this).prop('checked', false);
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
$(document).on('click', 'input[name="a_skt"]', function() {
    $('input[name="a_skt"]').not(this).prop('checked', false);
});

</script>

@endsection
