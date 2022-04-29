@extends('layouts.main_admin')

@section('dashboard')
<style>
    .modal {
        overflow-y: auto;
    }

</style>

@if ($datas->isEmpty())
<div class="card">
    <div class="card-header">
        <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
        <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
    </div>
    <div class="card-block">
        <form method="post" action="/data" class="form-material" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">File Terdaftar dikemenkumham/kementerian dalam negeri</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_terdaftar_dikemenkumham" class="form-control @error('surat_terdaftar_dikemenkumham') is-invalid @enderror">

                    @error('surat_terdaftar_dikemenkumham')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tujuan Organisasi</label>
                <div class="col-sm-8">
                    <input type="file" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror">

                    @error('tujuan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Program Organiasi</label>
                <div class="col-sm-8">
                    <input type="file" name="program" class="form-control @error('program') is-invalid @enderror">

                    @error('program')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pendaftaran</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_pendaftaran" class="form-control @error('surat_pendaftaran') is-invalid @enderror">

                    @error('surat_pendaftaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Akte Pendirian</label>
                <div class="col-sm-8">
                    <input type="file" name="akte_pendirian" class="form-control @error('akte_pendirian') is-invalid @enderror">

                    @error('akte_pendirian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror


                </div>
            </div>



            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Anggaran rumah Tangga</label>
                <div class="col-sm-8">
                    <input type="file" name="adrt" class="form-control @error('adrt') is-invalid @enderror">

                    @error('adrt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror


                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Keputusan susunan Pengurus Orkermas secara
                    lengkap</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_keputusan" class="form-control @error('surat_keputusan') is-invalid @enderror">

                    @error('surat_keputusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Biodata Pengurus</label>
                <div class="col-sm-8">
                    <input type="file" name="biodata_pengurus" class="form-control @error('biodata_pengurus') is-invalid @enderror">

                    @error('biodata_pengurus')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">KTP</label>
                <div class="col-sm-8">
                    <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror">

                    @error('ktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-8">
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Keterangan Domisili</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_keterangan_domisili" class="form-control @error('surat_keterangan_domisili') is-invalid @enderror">

                    @error('surat_keterangan_domisili')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">NPWP Organisasi</label>
                <div class="col-sm-8">
                    <input type="file" name="npwp" class="form-control @error('npwp') is-invalid @enderror">

                    @error('npwp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Kantor Tampak Depan papan nama organisasi</label>
                <div class="col-sm-8">
                    <input type="file" name="foto_kantor" class="form-control @error('foto_kantor') is-invalid @enderror">

                    @error('foto_kantor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pernyataan Kesiapan menertibkan organisasi</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_ketertiban" class="form-control @error('surat_ketertiban') is-invalid @enderror">

                    @error('surat_ketertiban')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pernyataan Tidak Berafilasi dengan partai politik
                    ditanda tangani ketua</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_tidak_avilasi" class="form-control @error('surat_tidak_avilasi') is-invalid @enderror">
                    @error('surat_tidak_avilasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pernyataan Tidak Tejadi Konflik pengurusan ditanda
                    tangani ketua</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_konflik" class="form-control @error('surat_konflik') is-invalid @enderror"> @error('surat_konflik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pernyataan Hak Cipta Simbol Organisasi ditanda tangani
                    ketua dan seketaris</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_hak_cipta" class="form-control @error('surat_hak_cipta') is-invalid @enderror">
                    @error('surat_hak_cipta')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pernyataan sanggup menyampaikan laporan ditanda tangani
                    ketua</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_laporan" class="form-control @error('surat_laporan') is-invalid @enderror"> @error('surat_laporan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Pernyataan bertanggung jawab keabsahan data ditanda
                    tangan ketua dan seketaris</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_absah" class="form-control @error('surat_absah') is-invalid @enderror"> @error('surat_absah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Rekomendasi dari kementrian agama untuk orkermas
                    keagamaan</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_rekom_agama" class="form-control @error('surat_rekom_agama') is-invalid @enderror">
                    @error('surat_rekom_agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Rekomendasi dari kementrian dan SKPD bidang kebudayaan
                    khusus kepercayaan pada tuhan yang Maha Esa</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_rekom_skpd" class="form-control @error('surat_rekom_skpd') is-invalid @enderror">
                    @error('surat_rekom_skpd')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat Rekomendasi dari kementrian dan SKPD bidang tenaga
                    kerja orkemas serikat buruh</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_rekom_skpd_kerja" class="form-control @error('surat_rekom_skpd_kerja') is-invalid @enderror">
                    @error('surat_rekom_skpd_kerja')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama
                    anggota nama pejabat negara, pemerintahan, dan tokoh masyarakt</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_rekom_kesediaan" class="form-control @error('surat_rekom_kesediaan') is-invalid @enderror">

                    @error('surat_rekom_kesediaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama
                    anggota nama pejabat negara, pemerintahan, dan tokoh masyarakt</label>
                <div class="col-sm-8">
                    <input type="file" name="surat_izasah" class="form-control @error('surat_izasah') is-invalid @enderror">

                    @error('surat_izasah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama
                    anggota nama pejabat negara, pemerintahan, dan tokoh masyarakt</label>
                <div class="col-sm-8">
                    <input type="file" name="skt" class="form-control @error('skt') is-invalid @enderror">

                    @error('skt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary m-b-0">Simpan Data</button>
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
            <span>Data yang sudah dikirim akan di proses sampa 3 x 24 jam, jika ada kesalahan atau kekurangan data
                mohon dilakukan pengirim data yang kurang sesuai syarat yang ada.</span>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="new-cons" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Nama Organisasi</th>
                            <th>Tujuan</th>
                            <th>Program</th>
                            <th>Data Upload</i></th>
                            <th>Status</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ auth()->user()->nama }}</td>
                            <td>{{ $data->tujuan }}</td>
                            <td>{{ $data->program }}</td>

                            <td> <button class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info" data-target="#tabbed-form" data-toggle="modal"><span data-feather="eye"></span></button>
                                <a href="/data/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
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
                        <a class="nav-link active" data-toggle="tab" href="#data1" role="tab">
                            <h6 class="m-b-0">Data 1</h6>
                        </a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link" data-toggle="tab" href="#data2" role="tab">
                            <h6 class="m-b-0">Data 2</h6>
                        </a>
                        <div class="slide"></div>
                    </li>

                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link" data-toggle="tab" href="#data3" role="tab">
                            <h6 class="m-b-0">Data 3</h6>
                        </a>
                        <div class="slide"></div>
                    </li>

                    <li class="nav-item waves-effect waves-dark">
                        <a class="nav-link" data-toggle="tab" href="#data4" role="tab">
                            <h6 class="m-b-0">Data 4</h6>
                        </a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <!-- Tab panes -->

                <div class="tab-content p-t-30">
                    @foreach ($datas as $data)
                    <div class="tab-pane active" id="data1" role="tabpanel">
                        <form class="md-float-material form-material">
                            {{-- awal --}}
                            @if (!empty($data->surat_terdaftar_dikemenkumham))
                            @php
                            $pecah = explode('.', $data->surat_terdaftar_dikemenkumham);
                            $surat_terdaftar_dikemenkumham = $pecah[1];
                            @endphp

                            {{-- status data surat_terdaftar_dikemenkumham --}}
                            @if ($surat_terdaftar_dikemenkumham == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">
                                    @if ($data->a_surat_terdaftar_dikemenkumham == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>

                                    </p>
                                    @elseif ($data->a_surat_terdaftar_dikemenkumham == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
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
                                        <a class="btn btn-primary" data-toggle="modal" href="#surat_terdaftar_dikemenkumham">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_terdaftar_dikemenkumham == 'png' or $surat_terdaftar_dikemenkumham == 'jpg')
                            {{-- status data surat_terdaftar_dikemenkumham --}}
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">
                                    @if ($data->a_surat_terdaftar_dikemenkumham == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
                                    </p>
                                    @elseif ($data->a_surat_terdaftar_dikemenkumham == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{
                                            $data->surat_terdaftar_dikemenkumham }}</label>
                                    </p>
                                    @else
                                    @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_terdaftar_dikemenkumham) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_terdaftar_dikemenkumham }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_terdaftar_dikemenkumham) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_pendaftaran }}</label>

                                    </p>
                                    @elseif ($data->a_surat_pendaftaran == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_pendaftaran
                                            }}</label>
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
                                        <a class="btn btn-primary" data-toggle="modal" href="#surat_pendaftaran">Lihat
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
                                    <p class="text-muted text-center"><label class="label label-inverse-primary"><span data-feather="loader"></span>{{ $data->surat_pendaftaran }}</label>
                                    </p>
                                    @elseif ($data->a_surat_pendaftaran == 1)
                                    <p class="text-muted text-center">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_pendaftaran
                                            }}</label>
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_pendaftaran) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_pendaftaran }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_pendaftaran) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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
                                    {{-- status data surat_pendaftaran --}}
                                    @if ($data->a_akte_pendirian == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_pendaftaran }}</label>
                                    </p>
                                    @elseif ($data->a_akte_pendirian == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->akte_pendirian }}</label>
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
                                        <a data-toggle="modal" href="#akte_pendirian" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($akte_pendirian == 'png' or $akte_pendirian == 'jpg')
                            {{-- status data surat_pendaftaran --}}
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1 mx-auto">
                                    @if ($data->a_akte_pendirian == 0)
                                    <p class="text-muted text-center">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_pendaftaran }}</label>
                                    </p>
                                    @elseif ($data->a_akte_pendirian == 1)
                                    <p class="text-muted text-center">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_pendaftaran
                                            }}</label>
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->akte_pendirian) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->akte_pendirian }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->akte_pendirian) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->adrt }}</label>
                                        @elseif ($data->a_adrt == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->adrt }}</label>
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
                                        <a data-toggle="modal" href="#adrt" class="btn btn-primary">Lihat Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($adrt == 'png' or $adrt == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">
                                    @if ($data->a_adrt == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->adrt }}</label>
                                    </p>
                                    @elseif ($data->a_adrt == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->adrt }}</label>
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->adrt) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->adrt }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->adrt) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_keputusan }}</label>
                                    </p>
                                    @elseif ($data->a_surat_keputusan == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_keputusan }}</label>
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
                                        <a data-toggle="modal" href="#surat_keputusan" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_keputusan == 'png' or $surat_keputusan == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_keputusan == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_keputusan }}</label>
                                    </p>
                                    @elseif ($data->a_surat_keputusan == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_keputusan }}</label>
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_keputusan) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_keputusan }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_keputusan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_biodata_pengurus == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->biodata_pengurus }}</label>
                                    </p>
                                    @elseif ($data->a_biodata_pengurus == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->biodata_pengurus }}</label>
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
                                        <a data-toggle="modal" href="#biodata_pengurus" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($biodata_pengurus == 'png' or $biodata_pengurus == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_biodata_pengurus == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->biodata_pengurus }}</label>
                                    </p>
                                    @elseif ($data->a_biodata_pengurus == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->biodata_pengurus }}</label>
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->biodata_pengurus) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->biodata_pengurus }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->biodata_pengurus) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                    @foreach ($datas as $data)
                    <div class="tab-pane" id="data2" role="tabpanel">
                        <form class="md-float-material form-material">
                            {{-- awal --}}
                            @if (!empty($data->ktp))
                            @php
                            $pecah = explode('.', $data->ktp);
                            $ktp = $pecah[1];
                            @endphp

                            @if ($ktp == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_ktp == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->ktp }}</label>
                                        @elseif ($data->a_ktp == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->ktp }}</label>
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
                                    </p>

                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#ktp" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($ktp == 'png' or $ktp == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">
                                    @if ($data->a_ktp == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->ktp }}</label>
                                    </p>
                                    @elseif ($data->a_ktp == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->ktp }}</label>
                                    </p>
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
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->ktp) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->ktp }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->ktp) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_foto == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->foto }}</label>
                                        @elseif ($data->a_foto == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->foto }}</label>
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
                                    </p>

                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#foto" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($foto == 'png' or $foto == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-20 z-depth-bottom-1">
                                    @if ($data->a_foto == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->foto }}</label>
                                    </p>
                                    @elseif ($data->a_foto == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->foto }}</label>
                                    </p>
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

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->foto) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->foto }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->foto) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_keterangan_domisili == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_keterangan_domisili }}</label>
                                    </p>
                                    @elseif ($data->a_surat_keterangan_domisili == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_keterangan_domisili
                                            }}</label>
                                    </p>
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
                                        <a data-toggle="modal" href="#surat_keterangan_domisili" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_keterangan_domisili == 'png' or $surat_keterangan_domisili == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_keterangan_domisili == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_keterangan_domisili }}</label>
                                    </p>
                                    @elseif ($data->a_surat_keterangan_domisili == 1)
                                    <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_keterangan_domisili
                                        }}</label>
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
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_keterangan_domisili) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_keterangan_domisili }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_keterangan_domisili) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_npwp == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->npwp }}</label>
                                        @elseif ($data->a_npwp == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->npwp }}</label>
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
                                        <a data-toggle="modal" href="#npwp" class="btn btn-primary">Lihat
                                            Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($npwp == 'png' or $npwp == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_npwp == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->npwp }}</label>
                                        @elseif ($data->a_npwp == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->npwp }}</label>
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
                                    </p>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->npwp) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->npwp }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->npwp) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                            @if (!empty($data->foto_kantor))
                            @php
                            $pecah = explode('.', $data->foto_kantor);
                            $foto_kantor = $pecah[1];
                            @endphp

                            @if ($foto_kantor == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_foto_kantor == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->foto_kantor }}</label>
                                    </p>
                                    @elseif ($data->a_foto_kantor == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->foto_kantor }}</label>
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
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#foto_kantor" class="btn btn-primary">Lihat Data
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($foto_kantor == 'png' or $foto_kantor == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_foto_kantor == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->foto_kantor }}</label>
                                        @elseif ($data->a_foto_kantor == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->foto_kantor }}</label>
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

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->foto_kantor) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->foto_kantor }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->foto_kantor) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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
                            @endforeach

                        </form>
                    </div>
                    {{-- ini yang ketiga --}}
                    <div class="tab-pane" id="data3" role="tabpanel">
                        <form class="md-float-material form-material">
                            @foreach ($datas as $data)
                            {{-- awal --}}

                            @if (!empty($data->surat_ketertiban))
                            @php
                            $pecah = explode('.', $data->surat_ketertiban);
                            $surat_ketertiban = $pecah[1];
                            @endphp

                            @if ($surat_ketertiban == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_ketertiban == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_ketertiban }}</label>
                                    </p>
                                    @elseif ($data->a_surat_ketertiban == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_ketertiban }}</label>
                                    </p>
                                    @else
                                    @endif

                                    {{-- tutup status data surat_ketertiban
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_ketertiban" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_ketertiban == 'png' or $surat_ketertiban == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_ketertiban == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_ketertiban }}</label>
                                    </p>
                                    @elseif ($data->a_surat_ketertiban == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_ketertiban }}</label>
                                    </p>
                                    @else
                                    @endif

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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_ketertiban) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_ketertiban }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_ketertiban) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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

                            {{-- penutup Data surat_ketertiban --}}


                            {{-- awal --}}

                            @if (!empty($data->surat_tidak_avilasi))
                            @php
                            $pecah = explode('.', $data->surat_tidak_avilasi);
                            $surat_tidak_avilasi = $pecah[1];
                            @endphp

                            @if ($surat_tidak_avilasi == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_tidak_avilasi == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_tidak_avilasi }}</label>
                                    </p>
                                    @elseif ($data->a_surat_tidak_avilasi == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_tidak_avilasi
                                            }}</label>
                                    </p>
                                    @else
                                    @endif

                                    {{-- tutup status data surat_tidak_avilasi
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_tidak_avilasi" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_tidak_avilasi == 'png' or $surat_tidak_avilasi == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_tidak_avilasi == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_tidak_avilasi }}</label>
                                    </p>
                                    @elseif ($data->a_surat_tidak_avilasi == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_tidak_avilasi
                                            }}</label>
                                    </p>
                                    @else
                                    @endif

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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_tidak_avilasi) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_tidak_avilasi }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_tidak_avilasi) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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

                            {{-- penutup Data surat_tidak_avilasi --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_konflik))
                            @php
                            $pecah = explode('.', $data->surat_konflik);
                            $surat_konflik = $pecah[1];
                            @endphp

                            @if ($surat_konflik == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_konflik == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_konflik }}</label>
                                    </p>
                                    @elseif ($data->a_surat_konflik == 1)
                                    <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_konflik }}</label>
                                    </p>
                                    @else
                                    @endif

                                    {{-- tutup status data surat_konflik
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_konflik" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_konflik == 'png' or $surat_konflik == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_konflik == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_konflik }}</label>
                                    </p>
                                    @elseif ($data->a_surat_konflik == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_konflik }}</label>
                                    </p>
                                    @else
                                    @endif

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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_konflik) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_konflik }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_konflik) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data surat_konflik --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_hak_cipta))
                            @php
                            $pecah = explode('.', $data->surat_hak_cipta);
                            $surat_hak_cipta = $pecah[1];
                            @endphp

                            @if ($surat_hak_cipta == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_hak_cipta == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_hak_cipta }}</label>
                                        @elseif ($data->a_surat_hak_cipta == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_hak_cipta }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_hak_cipta
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_hak_cipta" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_hak_cipta == 'png' or $surat_hak_cipta == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    @if ($data->a_surat_hak_cipta == 0)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_hak_cipta }}</label>
                                    </p>
                                    @elseif ($data->a_surat_hak_cipta == 1)
                                    <p class="text-muted text-center p-b-5">
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_hak_cipta }}</label>
                                    </p>
                                    @else
                                    @endif

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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_hak_cipta) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_hak_cipta }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_hak_cipta) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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

                            {{-- penutup Data surat_hak_cipta --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_laporan))
                            @php
                            $pecah = explode('.', $data->surat_laporan);
                            $surat_laporan = $pecah[1];
                            @endphp

                            @if ($surat_laporan == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_laporan == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_laporan }}</label>
                                        @elseif ($data->a_surat_laporan == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_laporan }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_laporan
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">

                                        <a data-toggle="modal" href="#surat_laporan" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_laporan == 'png' or $surat_laporan == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_laporan == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_laporan }}</label>
                                        @elseif ($data->a_surat_laporan == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_laporan }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_laporan
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    </p>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_laporan) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_laporan }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_laporan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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

                            {{-- penutup Data surat_laporan --}}
                        </form>
                    </div>
                    {{-- ini yang ketiga --}}
                    @endforeach


                    {{-- ini yang empat --}}
                    <div class="tab-pane" id="data4" role="tabpanel">
                        <form class="md-float-material form-material">
                            @foreach ($datas as $data)
                            {{-- awal --}}
                            {{-- awal --}}

                            @if (!empty($data->surat_absah))
                            @php
                            $pecah = explode('.', $data->surat_absah);
                            $surat_absah = $pecah[1];
                            @endphp

                            @if ($surat_absah == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_absah == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_absah }}</label>
                                        @elseif ($data->a_surat_absah == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_absah }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_absah
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_absah" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_absah == 'png' or $surat_absah == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_absah == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_absah }}</label>
                                        @elseif ($data->a_surat_absah == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_absah }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_absah
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    </p>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_absah) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_absah }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_absah) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data surat_absah --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_rekom_agama))
                            @php
                            $pecah = explode('.', $data->surat_rekom_agama);
                            $surat_rekom_agama = $pecah[1];
                            @endphp
                            @if ($surat_rekom_agama == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_agama == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_agama }}</label>
                                        @elseif ($data->a_surat_rekom_agama == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_agama
                                            }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_rekom_agama
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_rekom_agama" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_rekom_agama == 'png' or $surat_rekom_agama == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_agama == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_agama }}</label>
                                        @elseif ($data->a_surat_rekom_agama == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_agama
                                            }}</label>
                                        @else
                                        @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_agama) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_rekom_agama }}">
                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_agama) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            @if (!empty($data->surat_rekom_skpd))
                            @php
                            $pecah = explode('.', $data->surat_rekom_skpd);
                            $surat_rekom_skpd = $pecah[1];
                            @endphp

                            @if ($surat_rekom_skpd == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_skpd == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_skpd }}</label>
                                        @elseif ($data->a_surat_rekom_skpd == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_skpd }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_rekom_skpd
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_rekom_skpd" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_rekom_skpd == 'png' or $surat_rekom_skpd == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_skpd == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_skpd }}</label>
                                        @elseif ($data->a_surat_rekom_skpd == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_skpd }}</label>
                                        @else
                                        @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_skpd) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_rekom_skpd }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_skpd) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data surat_rekom_skpd --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_rekom_skpd_kerja))
                            @php
                            $pecah = explode('.', $data->surat_rekom_skpd_kerja);
                            $surat_rekom_skpd_kerja = $pecah[1];
                            @endphp

                            @if ($surat_rekom_skpd_kerja == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_skpd_kerja == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_skpd_kerja }}</label>
                                        @elseif ($data->a_surat_rekom_skpd_kerja == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kerja
                                            }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_rekom_skpd_kerja
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_rekom_skpd_kerja" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_rekom_skpd_kerja == 'png' or $surat_rekom_skpd_kerja == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_skpd_kerja == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_skpd_kerja }}</label>
                                        @elseif ($data->a_surat_rekom_skpd_kerja == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_skpd_kerja
                                            }}</label>
                                        @else
                                        @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_skpd_kerja) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_rekom_skpd_kerja }}">
                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_skpd_kerja) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data surat_rekom_skpd_kerja --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_rekom_kesediaan))
                            @php
                            $pecah = explode('.', $data->surat_rekom_kesediaan);
                            $surat_rekom_kesediaan = $pecah[1];
                            @endphp

                            @if ($surat_rekom_kesediaan == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_kesediaan == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_kesediaan }}</label>
                                        @elseif ($data->a_surat_rekom_kesediaan == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_kesediaan
                                            }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_rekom_kesediaan
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_rekom_kesediaan" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_rekom_kesediaan == 'png' or $surat_rekom_kesediaan == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_rekom_kesediaan == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_rekom_kesediaan }}</label>
                                        @elseif ($data->a_surat_rekom_kesediaan == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_rekom_kesediaan
                                            }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_rekom_kesediaan
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    </p>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_kesediaan) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_rekom_kesediaan }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_kesediaan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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

                            {{-- penutup Data surat_rekom_kesediaan --}}

                            {{-- awal --}}

                            @if (!empty($data->surat_izasah))
                            @php
                            $pecah = explode('.', $data->surat_izasah);
                            $surat_izasah = $pecah[1];
                            @endphp

                            @if ($surat_izasah == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_izasah == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_izasah }}</label>
                                        @elseif ($data->a_surat_izasah == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_izasah }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_izasah
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#surat_izasah" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($surat_izasah == 'png' or $surat_izasah == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_surat_izasah == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->surat_izasah }}</label>
                                        @elseif ($data->a_surat_izasah == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->surat_izasah }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data surat_izasah
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    </p>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->surat_izasah) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->surat_izasah }}">

                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->surat_izasah) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">


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

                            {{-- penutup Data surat_izasah --}}

                            {{-- awal --}}

                            @if (!empty($data->skt))
                            @php
                            $pecah = explode('.', $data->skt);
                            $skt = $pecah[1];
                            @endphp

                            @if ($skt == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_skt == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->skt }}</label>
                                        @elseif ($data->a_skt == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->skt }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data skt
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#skt" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($skt == 'png' or $skt == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_skt == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->skt }}</label>
                                        @elseif ($data->a_skt == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->skt }}</label>
                                        @else
                                        @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->skt) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->skt }}">
                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->skt) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data skt --}}


                            {{-- awal --}}

                            @if (!empty($data->tujuan))
                            @php
                            $pecah = explode('.', $data->tujuan);
                            $tujuan = $pecah[1];
                            @endphp
                            @if ($tujuan == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_tujuan == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->tujuan }}</label>
                                        @elseif ($data->a_tujuan == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->tujuan }}</label>
                                        @else
                                        @endif
                                    </p>

                                    {{-- tutup status data tujuan
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#tujuan" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($tujuan == 'png' or $tujuan == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_tujuan == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->tujuan }}</label>
                                        @elseif ($data->a_tujuan == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->tujuan }}</label>
                                        @else
                                        @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->tujuan) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->tujuan }}">
                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->tujuan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data tujuan --}}

                            {{-- awal --}}

                            @if (!empty($data->program))
                            @php
                            $pecah = explode('.', $data->program);
                            $program = $pecah[1];
                            @endphp

                            @if ($program == 'pdf')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_program == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->program }}</label>
                                        @elseif ($data->a_program == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->program }}</label>
                                        @else
                                        @endif
                                    </p>
                                    {{-- tutup status data program
                                    /**
                                    * Show the form for creating a new resource.
                                    * Whatapps 6289631031237
                                    * email : yogimaulana100@gmail.com
                                    * https://github.com/Ays1234
                                    * https://serbaotodidak.com/
                                    */ --}}
                                    <p class="text-muted text-center p-b-5">
                                        <a data-toggle="modal" href="#program" class="btn btn-primary">Lihat
                                            Data</a>
                                    </p>
                                </div>
                            </div>
                            @elseif ($program == 'png' or $program == 'jpg')
                            <div class="col-lg-12">
                                <div class="p-2 z-depth-bottom-1" data-toggle="tooltip" data-placement="top" title="" data-original-title=".z-depth-top-1">
                                    <p class="text-muted text-center p-b-5">
                                        @if ($data->a_program == 0)
                                        <label class="label label-inverse-primary"><span data-feather="loader"></span>{{
                                            $data->program }}</label>
                                        @elseif ($data->a_program == 1)
                                        <label class="label label-inverse-success"><span data-feather="check-circle"></span>{{ $data->program }}</label>
                                        @else
                                        @endif
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
                                                <a href="{{ asset(auth()->user()->nama . '/' . $data->program) }}" data-lightbox="1" data-title="{{ auth()->user()->nama . '/' . $data->program }}">
                                                    <img src="{{ asset(auth()->user()->nama . '/' . $data->program) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
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

                            {{-- penutup Data program --}}
                            @endforeach
                        </form>
                    </div>
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



@foreach ($datas as $data)
<!-- Modal 1-->
<div id="surat_terdaftar_dikemenkumham" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">
                    {{ auth()->user()->nama . '/' . $data->surat_terdaftar_dikemenkumham }}</h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_terdaftar_dikemenkumham) }}"></object>
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


<!-- Modal 2-->
<div id="surat_pendaftaran" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_pendaftaran }}</h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_pendaftaran) }}"></object>
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


<!-- Modal 3-->
<div id="akte_pendirian" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->akte_pendirian }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->akte_pendirian) }}"></object>
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

<!-- Modal adrt-->
<div id="adrt" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->adrt }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->adrt) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tujuan-->
<div id="tujuan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->tujuan }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/tujuan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->tujuan) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/tujuan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data="http://127.0.0.1:8000/yrka1234/tujuan20220416012844.pdf"
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

<!-- Modal program-->
<div id="program" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->program }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        src="http://127.0.0.1:8000/yrka1234/program20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->program) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        src="http://127.0.0.1:8000/yrka1234/program20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        data="http://127.0.0.1:8000/yrka1234/program20220416012844.pdf"
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

<!-- Modal surat_keputusan-->
<div id="surat_keputusan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_keputusan }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_keputusan) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->biodata_pengurus }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->biodata_pengurus) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->ktp }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->ktp) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->foto }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->foto) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->npwp }}
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->npwp) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_keterangan_domisili }}
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_keterangan_domisili) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->foto_kantor }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->foto_kantor) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_ketertiban }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_ketertiban) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal surat_tidak_avilasi-->
<div id="surat_tidak_avilasi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_tidak_avilasi }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_tidak_avilasi20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_tidak_avilasi) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_tidak_avilasi20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data="http://127.0.0.1:8000/yrka1234/surat_tidak_avilasi20220416012844.pdf"
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

<!-- Modal surat_konflik-->
<div id="surat_konflik" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_konflik }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_konflik20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_konflik) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_konflik20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data="http://127.0.0.1:8000/yrka1234/surat_konflik20220416012844.pdf"
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

<!-- Modal surat_hak_cipta-->
<div id="surat_hak_cipta" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_hak_cipta }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_hak_cipta20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_hak_cipta) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_hak_cipta20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data="http://127.0.0.1:8000/yrka1234/surat_hak_cipta20220416012844.pdf"
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

<!-- Modal surat_laporan-->
<div id="surat_laporan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_laporan }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_laporan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_laporan) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_laporan20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data="http://127.0.0.1:8000/yrka1234/surat_laporan20220416012844.pdf"
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

<!-- Modal surat_absah-->
<div id="surat_absah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_absah }} </h4>
            </div>
            <div class="modal-body">
                <!-- <embed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_absah20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400px"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            scrolling="auto"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          /> -->
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_absah) }}"></object>
                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            src="http://127.0.0.1:8000/yrka1234/surat_absah20220416012844.pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width="600"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height="400"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ></iframe> -->

                <!-- <object
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="application/pdf"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data="http://127.0.0.1:8000/yrka1234/surat_absah20220416012844.pdf"
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

<!-- Modal surat_rekom_agama-->
<div id="surat_rekom_agama" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_rekom_agama }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_agama) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal surat_rekom_skpd-->
<div id="surat_rekom_skpd" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_rekom_skpd }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_skpd) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_rekom_skpd_kerja }}
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_skpd_kerja) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_rekom_kesediaan }}
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_rekom_kesediaan) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->surat_izasah }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->surat_izasah) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
                <h4 class="modal-title">{{ auth()->user()->nama . '/' . $data->skt }} </h4>
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
                <object width="100%" height="400px" data="{{ asset(auth()->user()->nama . '/' . $data->skt) }}"></object>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">
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
