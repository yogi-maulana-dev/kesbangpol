@extends('layouts.main_login_admin')

@section('admin_dashboard')
<style>
    .modal {
        overflow-y: auto;
    }

</style>
<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-yellow">$30200</h4>
                            {{-- <h6 class="text-muted m-b-0">Jumlah data Organisasi Masyarakat</h6> --}}
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart-2 f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-yellow">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">Jumlah Data Organisasi Masyarakat </p>

                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-up text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-green">290+</h4>
                            <h6 class="text-muted m-b-0">Page Views</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-file-text f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">Jumlah Yang sudah tervalidasi

                            </p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-up text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-red">145</h4>
                            <h6 class="text-muted m-b-0">Task</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-calendar f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-red">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">Jumlah yang belum tervalidasi</p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-down text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-blue">500</h4>
                            <h6 class="text-muted m-b-0">Downloads</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-thumbs-down f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-blue">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">% change</p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-down text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card social-card bg-twitter">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <i class="feather icon-twitter f-34 text-twitter social-icon"></i>
                        </div>
                        <div class="col">
                            <h6 class="m-b-0">Cara penggunaan Aplikasi</h6>
                            <p>Selamat datang pada aplikasi Kesbangpol mesuji</p>
                            <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                        </div>
                    </div>
                </div>
                <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>
            </div>
        </div>
    </div>
</div>



@endsection
