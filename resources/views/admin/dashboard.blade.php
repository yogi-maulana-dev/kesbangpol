@extends('layouts.main_login_admin')

@section('admin_dashboard')
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
                            <th>Tujuan</th>
                            <th>Program</th>
                            <th>Data Upload</i></th>
                            <th>Status</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->tujuan }}</td>
                            <td>{{ $data->program }}</td>

                            <td> <button
                                    class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                    data-target="#tabbed-form" data-toggle="modal"><span
                                        data-feather="eye"></span></button>
                                <a href="/data/{{ $data->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
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
                        @endforeach --}}

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
