@extends('layouts.main_admin')

@section('perpanjang')
    <style>
        .modal {
            overflow-y: auto;
        }

    </style>

    @if ($perpanjangans->isEmpty())
        <div class="card">
            <div class="card-header">
                <h5>Halaman Data Perpanjangan Organisasi Masyarakat</h5>
                <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
            </div>
            <div class="card-block">
                <form method="post" action="{{ route('user.perpanjang.save') }}" class="form-material"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Keputusan Pengurusan</label>
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
                        <label class="col-sm-3 col-form-label">Foto Ketua</label>
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
                    <h5>Data Perpanjangan Organisasi Masyarakat Yang diajukan</h5>
                    <span>Data yang sudah dikirim akan di proses sampa 3 x 24 jam, jika ada kesalahan atau kekurangan data
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
                                @foreach ($perpanjangans as $perpanjangan)
                                    <tr>
                                        <td>{{ auth()->user()->nama }}</td>
                                        <td>{{ auth()->user()->email }}</td>

                                        <td> <button
                                                class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                                data-target="#tabbed-form" data-toggle="modal"><span
                                                    data-feather="eye"></span></button>
                                            @if ($perpanjangan->lengkap == 3)
                                            @else
                                                <a href="/perpanjangan/{{ $perpanjangan->id }}/edit"
                                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($perpanjangan->lengkap == 3)
                                                <div class="label-main">
                                                    <label class="label label-lg label-success"><i
                                                            class="fa fas fa-check"></i>
                                                        Data perpanjangan sudah lengkap</label>
                                                </div>
                                            @else
                                                <div class="label-main">
                                                    <label class="label label-lg label-primary"><i
                                                            class="fa fa-spinner"></i>
                                                        Belum mulai</label>

                                                </div>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            @if ($perpanjangan->lengkap == 3)
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
                                <a class="nav-link active" data-toggle="tab" href="#data1" role="tab">
                                    <h6 class="m-b-0">Data Perpanjagan 1</h6>
                                </a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->

                        <div class="tab-content p-t-30">
                            @foreach ($perpanjangans as $perpanjangan)
                                <div class="tab-pane active" id="data1" role="tabpanel">
                                    <form class="md-float-material form-material">
                                        {{-- awal --}}
                                        @if (!empty($perpanjangan->sk_pengurusan))
                                            @php
                                                $pecah = explode('.', $perpanjangan->sk_pengurusan);
                                                $sk_pengurusan = $pecah[1];
                                            @endphp

                                            {{-- status data sk_pengurusan --}}
                                            @if ($sk_pengurusan == 'pdf')
                                                <div class="col-lg-12">
                                                    <div class="p-20 z-depth-bottom-1">
                                                        @if ($perpanjangan->a_sk_pengurusan == 0)
                                                            <p class="text-muted text-center p-b-5">
                                                                <label class="label label-inverse-primary"><span
                                                                        data-feather="loader"></span>{{ $perpanjangan->sk_pengurusan }}</label>

                                                            </p>
                                                        @elseif ($perpanjangan->a_sk_pengurusan == 1)
                                                            <p class="text-muted text-center p-b-5">
                                                                <label class="label label-inverse-success"><span
                                                                        data-feather="check-circle"></span>{{ $perpanjangan->sk_pengurusan }}</label>
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
                                                            <a class="btn btn-primary" data-toggle="modal"
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
                                                        @if ($perpanjangan->a_sk_pengurusan == 0)
                                                            <p class="text-muted text-center p-b-5">
                                                                <label class="label label-inverse-primary"><span
                                                                        data-feather="loader"></span>{{ $perpanjangan->sk_pengurusan }}</label>
                                                            </p>
                                                        @elseif ($perpanjangan->a_sk_pengurusan == 1)
                                                            <p class="text-muted text-center p-b-5">
                                                                <label class="label label-inverse-success"><span
                                                                        data-feather="check-circle"></span>{{ $perpanjangan->sk_pengurusan }}</label>
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
                                                                    <a href="{{ asset(auth()->user()->email . '/pembaruan/' . $perpanjangan->sk_pengurusan) }}"
                                                                        data-lightbox="1"
                                                                        data-title="{{ auth()->user()->email . '/pembaruan/' . $perpanjangan->sk_pengurusan }}">

                                                                        <img src="{{ asset(auth()->user()->email . '/pembaruan/' . $perpanjangan->sk_pengurusan) }}"
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

    @foreach ($perpanjangans as $perpanjangan)
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
                            {{ auth()->user()->email . '/pembaruan/' . $perpanjangan->sk_pengurusan }}
                        </h4>
                        </h4>
                    </div>
                    <div class="modal-body">

                        <object width="100%" height="400px"
                            data="{{ asset(auth()->user()->email . '/pembaruan/' . $perpanjangan->sk_pengurusan) }}"></object>

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
