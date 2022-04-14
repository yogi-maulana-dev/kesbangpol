@extends('layouts.main_admin')

@section('dashboard')

@if ($datas->isEmpty())
 <div class="card">
<div class="card-header">
    <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
    <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
</div>
<div class="card-block">
    <form  method="post" action="/data/posts" class="form-material" enctype="multipart/form-data">
        @csrf
        <div class="form-group form-default">
            <textarea class="form-control @error('tujuan') is-invalid 
            @enderror" name="tujuan" required=""></textarea>
            @error('tujuan')
            <div class="invalid-feedback">
{{ $message }}
            </div>
                
            @enderror
            <span class="form-bar"></span>
            <label class="float-label">Tujuan Organisasi</label>
        </div>

           <div class="form-group form-default">
            <textarea class="form-control @error('program') is-invalid 
            @enderror" name="program" required=""></textarea>
            @error('program')
            <div class="invalid-feedback">
{{ $message }}
            </div>
                
            @enderror
            <span class="form-bar"></span>
            <label class="float-label">Tujuan Organisasi</label>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Surat Pendaftaran</label>
            <div class="col-sm-8">
                <input type="file" name="surat_pendaftaran" class="form-control @error('surat_pendaftaran') is-invalid 
            @enderror">

                 @error('surat_pendaftaran')
            <div class="invalid-feedback">
{{ $message }}
            </div>
                
            @enderror

            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Akte Pendirian</label>
            <div class="col-sm-8">
                <input type="file" name="akte_pendirian" class="form-control @error('akte_pendirian') is-invalid 
            @enderror">

                 @error('akte_pendirian')
            <div class="invalid-feedback">
{{ $message }}
            </div>
                
            @enderror


            </div>
        </div>



    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Anggaran rumah Tangga</label>
        <div class="col-sm-8">
            <input type="file" name="adrt" class="form-control @error('adrt') is-invalid 
            @enderror">

                 @error('adrt')
            <div class="invalid-feedback">
{{ $message }}
</div>
                
            @enderror


        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Keputusan susunan Pengurus Orkermas secara lengkap</label>
        <div class="col-sm-8">
            <input type="file" name="surat_keputusan" class="form-control @error('surat_keputusan') is-invalid 
            @enderror">

                 @error('surat_keputusan')
            <div class="invalid-feedback">
{{ $message }}
</div>
                
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Biodata Pengurus</label>
        <div class="col-sm-8">
            <input type="file" name="biodata_pengurus" class="form-control @error('biodata_pengurus') is-invalid 
            @enderror">

                 @error('biodata_pengurus')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror

        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-1 col-form-label">KTP</label>
        <div class="col-sm-8">
            <input type="file" name="ktp" class="form-control @error('ktp') is-invalid 
            @enderror">

                 @error('ktp')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
  
        </div>
    </div>

    
    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Foto</label>
        <div class="col-sm-8">
            <input type="file" name="foto" class="form-control @error('foto') is-invalid 
            @enderror">

                 @error('foto')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

    
    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Keterangan Domisili</label>
        <div class="col-sm-8">
            <input type="file" name="surat_keterangan_domisili" class="form-control @error('surat_keterangan_domisili') is-invalid 
            @enderror">

                 @error('surat_keterangan_domisili')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

        <div class="form-group row">
        <label class="col-sm-1 col-form-label">NPWP Organisasi</label>
        <div class="col-sm-8">
            <input type="file" name="npwp" class="form-control @error('npwp') is-invalid 
            @enderror">

                 @error('npwp')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

        <div class="form-group row">
        <label class="col-sm-1 col-form-label">Foto Kantor Tampak Depan papan nama organisasi</label>
        <div class="col-sm-8">
            <input type="file" name="foto_kantor" class="form-control @error('foto_kantor') is-invalid 
            @enderror">

                 @error('foto_kantor')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


        <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Pernyataan Kesiapan menertibkan organisasi</label>
        <div class="col-sm-8">
            <input type="file" name="surat_ketertiban" class="form-control @error('surat_ketertiban') is-invalid 
            @enderror">

                 @error('surat_ketertiban')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

        <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Pernyataan Tidak Berafilasi dengan partai politik ditanda tangani ketua</label>
        <div class="col-sm-8">
            <input type="file" name="surat_tidak_avilasi" class="form-control @error('surat_tidak_avilasi') is-invalid 
            @enderror"> @error('surat_tidak_avilasi')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

            <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Pernyataan Tidak Tejadi Konflik pengurusan ditanda tangani ketua</label>
        <div class="col-sm-8">
            <input type="file" name="surat_konflik" class="form-control @error('surat_konflik') is-invalid 
            @enderror"> @error('surat_konflik')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Pernyataan Hak Cipta Simbol Organisasi ditanda tangani ketua dan seketaris</label>
        <div class="col-sm-8">
            <input type="file" name="surat_hak_cipta" class="form-control @error('surat_hak_cipta') is-invalid 
            @enderror"> @error('surat_hak_cipta')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Pernyataan sanggup menyampaikan laporan ditanda tangani ketua</label>
        <div class="col-sm-8">
            <input type="file" name="surat_laporan" class="form-control @error('surat_laporan') is-invalid 
            @enderror"> @error('surat_laporan')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Pernyataan bertanggung jawab keabsahan data ditanda tangan ketua dan seketaris</label>
        <div class="col-sm-8">
            <input type="file" name="surat_absah" class="form-control @error('surat_absah') is-invalid 
            @enderror"> @error('surat_absah')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Rekomendasi dari kementrian agama untuk orkermas keagamaan</label>
        <div class="col-sm-8">
            <input type="file" name="surat_rekom_agama" class="form-control @error('surat_rekom_agama') is-invalid 
            @enderror"> @error('surat_rekom_agama')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Rekomendasi dari kementrian dan SKPD bidang kebudayaan khusus kepercayaan pada tuhan yang Maha Esa</label>
        <div class="col-sm-8">
            <input type="file" name="surat_rekom_skpd" class="form-control @error('surat_rekom_skpd') is-invalid 
            @enderror"> @error('surat_rekom_skpd')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat Rekomendasi dari kementrian dan SKPD bidang tenaga kerja orkemas serikat buruh</label>
        <div class="col-sm-8">
            <input type="file" name="surat_rekom_skpd_kerja" class="form-control @error('surat_rekom_skpd_kerja') is-invalid 
            @enderror"> @error('surat_rekom_skpd_kerja')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>

         <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama anggota nama pejabat negara, pemerintahan, dan tokoh masyarakt</label>
        <div class="col-sm-8">
            <input type="file" name="surat_rekom_kesediaan" class="form-control @error('surat_rekom_kesediaan') is-invalid 
            @enderror"> 
            
            @error('surat_rekom_kesediaan')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


           <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama anggota nama pejabat negara, pemerintahan, dan tokoh masyarakt</label>
        <div class="col-sm-8">
            <input type="file" name="surat_izasah" class="form-control @error('surat_izasah') is-invalid 
            @enderror"> 
            
            @error('surat_izasah')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


       <div class="form-group row">
        <label class="col-sm-1 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama anggota nama pejabat negara, pemerintahan, dan tokoh masyarakt</label>
        <div class="col-sm-8">
            <input type="file" name="skt" class="form-control @error('skt') is-invalid 
            @enderror"> 
            
            @error('skt')
            <div class="invalid-feedback">
{{ $message }}
</div>
  @enderror
        </div>
    </div>


    <div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Submit</button>
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
                                                <span>Data yang sudah dikirim akan di proses sampa 3 x 24 jam, jika ada kesalahan atau kekurangan data mohon dilakukan pengirim data yang kurang sesuai syarat yang ada.</span>
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
                                                                
                                                                <td> <button class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info" data-toggle="modal" data-target="#tabbed-form"><span data-feather="eye"></span></button>
                                                                <a href="/data/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                                                 </td>
                                                          
                                                                <td>@if ($data->lengkap == 0)
                                                                    
                                                                 <div class="label-main">
                                                            <label class="label label-lg label-primary"><i class="fa fa-spinner"></i> Proses</label>
                                                            
                                                        </div>

                                             
                                                                    @else
                                                                    Sudah di verikasi
                                                                @endif</td>
                                                            </tr>
                                                        
                                                            @endforeach
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                              </div>
                                            </div>

                                               <!-- Modal small-->
                                                                {{-- <button type="button" class="btn btn-success waves-effect m-b-10" data-toggle="modal" data-target="#myModal">Multi Model</button>
                                                                <!-- Modal --> --}}
                                                                <div class="modal fade modal-flex" id="Modal-Multi" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Modal title</h4>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <div>
                                                                                    <button type="button" class="btn btn-default waves-effect m-t-20 " data-toggle="modal" data-target="#meta-Modal">Click Here!</button>
                                                                                </div>
                                                                                <div class="modal fade" id="meta-Modal" tabindex="-1" role="dialog">
                                                                                    <div class="modal-dialog modal-sm" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title">Modal title</h4>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <h5>Small Modal</h5>
                                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing .</p>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="m-t-10">Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Multi Model Start-->
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

                                                        {{-- <li class="nav-item waves-effect waves-dark">
                                                            <a class="nav-link" data-toggle="tab" href="#data5" role="tab">
                                                                <h6 class="m-b-0">Data 5</h6>
                                                            </a>
                                                            
                                                            <div class="slide"></div>
                                                        </li> --}}
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content p-t-30">
                                                        <div class="tab-pane active" id="data1" role="tabpanel">
                                                            <form class="md-float-material form-material">
                                                                 @foreach ($datas as $data)
                                                                {{-- awal --}}
                                                                 @if (!empty($data->surat_pendaftaran))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_pendaftaran); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_pendaftaran }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_pendaftaran)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_pendaftaran }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_pendaftaran) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_pendaftaran }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_pendaftaran)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_pendaftaran }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_pendaftaran) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}

   {{-- awal --}}
                                                                 @if (!empty($data->akte_pendirian))

                                                                 @php
                                                                       $pecah = explode(".", $data->akte_pendirian); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->akte_pendirian }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->akte_pendirian)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->akte_pendirian }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->akte_pendirian) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->akte_pendirian }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->akte_pendirian)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->akte_pendirian }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->akte_pendirian) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                                                                {{-- awal adrt --}}
                                                                 @if (!empty($data->adrt))

                                                                 @php
                                                                       $pecah = explode(".", $data->adrt); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->adrt }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->adrt)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->adrt }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->adrt) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->adrt }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->adrt)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->adrt }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->adrt) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}

   {{-- awal surat_keputusan --}}
                                                                 @if (!empty($data->surat_keputusan))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_keputusan); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_keputusan }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_keputusan)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_keputusan }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_keputusan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_keputusan }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_keputusan)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_keputusan }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_keputusan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}
   {{-- awal biodata_pengurus --}}
                                                                 @if (!empty($data->biodata_pengurus))

                                                                 @php
                                                                       $pecah = explode(".", $data->biodata_pengurus); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->biodata_pengurus }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->biodata_pengurus)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->biodata_pengurus }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->biodata_pengurus) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->biodata_pengurus }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->biodata_pengurus)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->biodata_pengurus }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->biodata_pengurus) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                                                                 
                                                          
                                                         
                                                             @endforeach
                                                            </form>
                                                        </div>


                                                        <div class="tab-pane" id="data2" role="tabpanel">
                                                            <form class="md-float-material form-material">
                                                                @foreach ($datas as $data)

                                                                {{-- awal surat_keterangan_domisili --}}
                                                                 @if (!empty($data->surat_keterangan_domisili))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_keterangan_domisili); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_keterangan_domisili }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_keterangan_domisili)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_keterangan_domisili }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_keterangan_domisili) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_keterangan_domisili }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_keterangan_domisili)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_keterangan_domisili }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_keterangan_domisili) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                              {{-- awal foto_kantor --}}
                                                                 @if (!empty($data->foto_kantor))

                                                                 @php
                                                                       $pecah = explode(".", $data->foto_kantor); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->foto_kantor }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->foto_kantor)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->foto_kantor }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->foto_kantor) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->foto_kantor }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->foto_kantor)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->foto_kantor }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->foto_kantor) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}   {{-- awal surat_ketertiban --}}
                                                                 @if (!empty($data->surat_ketertiban))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_ketertiban); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_ketertiban }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_ketertiban)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_ketertiban }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_ketertiban) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_ketertiban }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_ketertiban)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_ketertiban }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_ketertiban) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}

   {{-- awal surat_tidak_avilasi --}}
                                                                 @if (!empty($data->surat_tidak_avilasi))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_tidak_avilasi); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_tidak_avilasi }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_tidak_avilasi)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_tidak_avilasi }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_tidak_avilasi) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_tidak_avilasi }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_tidak_avilasi)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_tidak_avilasi }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_tidak_avilasi) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                                                         {{-- awal surat_konflik --}}
                                                                 @if (!empty($data->surat_konflik))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_konflik); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_konflik }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_konflik)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_konflik }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_konflik) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_konflik }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_konflik)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_konflik }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_konflik) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                                                                 

                                                          
                                                    
                                                                @endforeach
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane" id="data3" role="tabpanel">
                                                        <form class="md-float-material form-material">
                                                           
                                                             @foreach ($datas as $data)

                                                          {{-- awal surat_hak_cipta --}}
                                                                 @if (!empty($data->surat_hak_cipta))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_hak_cipta); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_hak_cipta }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_hak_cipta)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_hak_cipta }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_hak_cipta) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_hak_cipta }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_hak_cipta)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_hak_cipta }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_hak_cipta) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                                                           {{-- awal surat_laporan --}}
                                                                 @if (!empty($data->surat_laporan))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_laporan); 
                                                                              $surat_absah = $pecah[1]; 
                                                                 @endphp


                                                                @if ($surat_absah =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_laporan }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_laporan)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_laporan }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_laporan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($surat_absah =='png' or $surat_absah =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_laporan }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_laporan)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_laporan }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_laporan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}

   {{-- awal surat_absah --}}
                                                                 @if (!empty($data->surat_absah))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_absah); 
                                                                              $ekstensi = $pecah[1]; 
                                                                 @endphp


                                                                @if ($ekstensi =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_absah }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_absah)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_absah }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_absah) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($ekstensi =='png' or $ekstensi =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_absah }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_absah)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_absah }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_absah) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}

   {{-- awal surat_rekom_agama --}}
                                                                 @if (!empty($data->surat_rekom_agama))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_rekom_agama); 
                                                                              $ekstensi = $pecah[1]; 
                                                                 @endphp


                                                                @if ($ekstensi =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_rekom_agama }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_rekom_agama)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_rekom_agama }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_rekom_agama) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($ekstensi =='png' or $ekstensi =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_rekom_agama }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_rekom_agama)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_rekom_agama }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_rekom_agama) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}

   {{-- awal surat_rekom_skpd --}}
                                                                 @if (!empty($data->surat_rekom_skpd))

                                                                 @php
                                                                       $pecah = explode(".", $data->surat_rekom_skpd); 
                                                                              $ekstensi = $pecah[1]; 
                                                                 @endphp


                                                                @if ($ekstensi =='pdf')

                                                                                                                            
                                                            <p class="text-muted text-center p-b-5">{{ $data->surat_rekom_skpd }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_rekom_skpd)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_rekom_skpd }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_rekom_skpd) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @else @if ($ekstensi =='png' or $ekstensi =='jpg')

                                                               <p class="text-muted text-center p-b-5">{{ $data->surat_rekom_skpd }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_rekom_skpd)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_rekom_skpd }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_rekom_skpd) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @else

                                                                @endif

                                                                 @endif

                                                                 {{-- selesai 1 --}}
                                                                 @else
                                                                 @endif

                                                                 {{-- selesai 2 --}}


                                                                 
                                                            </div>

                                                          
                                                    
                                                                @endforeach
                            
                                                        </form>
                                                        </div>


                                                        <div class="tab-pane" id="data4" role="tabpanel">
                                                            <form class="md-float-material form-material">
                                                             
                                                                  @foreach ($datas as $data)

                                                              <p class="text-muted text-center p-b-5">{{ $data->surat_rekom_skpd_kerja }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_rekom_skpd_kerja)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_rekom_skpd_kerja }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_rekom_skpd_kerja) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            
                                                              <p class="text-muted text-center p-b-5">{{ $data->surat_rekom_kesediaan }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_rekom_kesediaan)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_rekom_kesediaan }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_rekom_kesediaan) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                                                 
                                                              <p class="text-muted text-center p-b-5">{{ $data->surat_izasah }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->surat_izasah)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_izasah }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->surat_izasah) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                               <p class="text-muted text-center p-b-5">{{ $data->skt }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->skt)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->skt }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->skt) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                                       <p class="text-muted text-center p-b-5">{{ $data->foto }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->foto)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->foto }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->foto) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                                           <p class="text-muted text-center p-b-5">{{ $data->ktp }}   </p>

                                                                     <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <a href="{{  asset(auth()->user()->nama.'/'.$data->ktp)  }}" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->ktp }}">
                                                                 
                                                                            <img src="{{ asset(auth()->user()->nama.'/'.$data->ktp) }}" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                          
                                                    
                                                                @endforeach
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tabbed form modal end -->
@endif



@endsection