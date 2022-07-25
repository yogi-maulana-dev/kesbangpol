@extends('layouts.main_admin')

@section('home')
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
                            <span class="pcoded-mtext">Perubahan</span>
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

                                        <div class="col-lg-12 col-md-12">
                                            <!-- page statustic card start -->
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="#" data-toggle="modal" data-target="#exampleModalLong">
                                                        <div class="card">
                                                            <div class="card-footer">
                                                                <div class="row align-items-center">
                                                                    <div class="col-4">
                                                                        <h4 class="text-c-yellow">Video Tutorial</h4>
                                                                    </div>
                                                                    <div class="col-8 text-end">
                                                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </a>

                                                    <div class="card-body bg-c-yellow">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Menu Ini adalah tutorial</p>
                                                            </div>
                                                            <div class="col-3 text-end">
                                                                <i class="feather icon-trending-up text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <a href="/dashboard">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-green">Pendaftaraan</h4>
                                                                </div>
                                                                <div class="col-4 text-end">
                                                                    <i class="feather icon-file-text f-28"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Ini adalah menu pendaftaran
                                                                    untuk organisasi kemasyarakatan yang
                                                                    baru</p>
                                                            </div>
                                                            <div class="col-3 text-end">
                                                                <i class="feather icon-trending-up text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <a href="/perpanjang">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-red">Perpanjang</h4>
                                                                </div>
                                                                <div class="col-4 text-end">
                                                                    <i class="feather icon-calendar f-28"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Ini adalah halaman untuk
                                                                    perpanjang data organisasi masyarakay yang
                                                                    terlah mendaftar</p>
                                                            </div>
                                                            <div class="col-3 text-end">
                                                                <i class="feather icon-trending-down text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <a href="/pembaruan">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-blue">Perubahan
                                                                    </h4>
                                                                </div>
                                                                <div class="col-4 text-end">
                                                                    <i class="feather icon-calendar f-28"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Ini adalah data jumlah
                                                                    pendaftar</p>
                                                            </div>
                                                            <div class="col-3 text-end">
                                                                <i class="feather icon-trending-down text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-blue">500</h4>
                            <h6 class="text-muted m-b-0">Downloads</h6>
                        </div>
                        <div class="col-4 text-end">
                            <i class="feather icon-thumbs-down f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-blue">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">% change</p>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-trending-down text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
                                        </div>
                                        <!-- page statustic card end -->
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Video Tutorial</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endsection
