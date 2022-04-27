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
                        <form class="md-float-material form-material">

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
                                                <label class="col-sm-12">Apakah data surat permohonan
                                                    terdaftar,
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
                                                <label class="col-sm-12">Apakah data surat permohonan
                                                    terdaftar,
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
                                                <label class="col-sm-12">Apakah data surat permohonan
                                                    terdaftar,
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

                                    @elseif ($data->a_akte_pendirian == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->akte_pendirian }}</label>
                                    </p>

                                    <p class="text-muted text-center">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            href="#pdf-{{$akte_pendirian->id }}">Lihat
                                            Data
                                        </a>
                                    </p>


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
                                                <label class="col-sm-12">Apakah data surat permohonan
                                                    terdaftar,
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

                                    @elseif ($data->a_akte_pendirian == 2)

                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span
                                                data-feather="check-circle"></span>{{
                                            $data->akte_pendirian }}</label>
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
                                                <label class="col-sm-12">Apakah data surat permohonan
                                                    terdaftar,
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
                            {{--
                        </form> --}}
                    </div>

                    <div class="tab-pane" id="{{$data->surat_pendaftaran}}" role="tabpanel">
                        <form class="md-float-material form-material">
                            dasdas

                    </div>
                    <div class="tab-pane" id="{{$data->akte_pendirian}}" role="tabpanel">
                        <form class="md-float-material form-material">
                            asdsad
                    </div>
                    <div class="tab-pane" id="{{$data->adrt}}" role="tabpanel">
                        dasdasdasd
                    </div>
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
<div id="tujuan-{{$data->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ $data->nama . '/' . $data->tujuan }}
                </h4>
                </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    src="http://127.0.0.1:8000/yrka1234/	tujuan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  /> -->
                <object width="100%" height="400px" data="{{ asset($data->nama . '/' . $data->tujuan) }}"></object>
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

$(document).on('click', 'input[name="a_tujuan"]', function() {
    $('input[name="a_tujuan"]').not(this).prop('checked', false);
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
