@extends('layouts.main_admin')

@section('perpanjangan')
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
                <form method="post" action="/data" class="form-material" enctype="multipart/form-data">
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
                                    <th>Email Organisasi</th>
                                    <th>Status</i></th>
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

                                        <td>
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
                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

 @endif

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

@endsection
