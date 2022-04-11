@extends('layouts.main_admin')

@section('dashboard')

<<<<<<< HEAD
@if ($datas->isEmpty())
 <div class="card">
=======
@foreach ($datas as $data)
    
@if ($data -> lengkap )
   <div class="card">
                                                    <div class="card-block">

                                            <div class="card-header">
                                                <h5>Data Organisasi Masyarakat Yang diajukan</h5>
                                                <span>Responsive will automatically detect new DataTable instances being created on a page and initialize itself if it finds the responsive option or responsive class name on the table, as shown in the other examples.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Organisasi</th>
                                                                <th>Tujuan</th>
                                                                <th>Program</th>
                                                                <th><i class="ti-eye"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($datas as $data)
                                                                     <tr>
                                                                <td>{{ auth()->user()->nama }}</td>
                                                                <td>{{ $data->tujuan }}</td>
                                                                <td>{{ $data->program }}</td>
                                                                <td><button class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-icon" data-toggle="modal" data-target="#myModal"><i class="ti-eye"></i></button></td>
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
                                                                <div class="modal fade" id="myModal">
                                                               
                                                                    <div class="modal-dialog modal-lg">
                                                                              
                                                                        <div class="modal-content ">
                                                                         
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Modal 1</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>

                                                                     
                                                                            <div class="container"></div>
                                                                            <div class="modal-body">Content for the dialog / modal goes here.
                                                                                <p class="p-t-40 p-b-40">more content</p>
                                                                                <a data-toggle="modal" href="#myModal2" class="btn btn-primary">Launch modal</a>
                                                                            </div>
                                                                            <div class="modal-footer"> <a href="#" data-dismiss="modal" class="btn">Close</a>
                                                                                <a href="#" class="btn btn-primary">Save changes</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="myModal2">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Modal 2</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="container"></div>
                                                                            <div class="modal-body">Content for the dialog / modal goes here.
                                                                                <p class="p-t-30 p-b-40">come content</p>
                                                                                <a data-toggle="modal" href="#myModal3" class="btn btn-primary">Launch modal</a>
                                                                            </div>
                                                                            <div class="modal-footer"> <a href="#" data-dismiss="modal" class="btn">Close</a>
                                                                                <a href="#" class="btn btn-primary">Save changes</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="myModal3">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Modal 3</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="container"></div>
                                                                            <div class="modal-body">Content for the dialog / modal goes here.
                                                                                <a data-toggle="modal" href="#myModal4" class="btn btn-primary">Launch modal</a>
                                                                            </div>
                                                                            <div class="modal-footer"> <a href="#" data-dismiss="modal" class="btn">Close</a>
                                                                                <a href="#" class="btn btn-primary">Save changes</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="myModal4">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Modal 4</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="container"></div>
                                                                            <div class="modal-body">Content for the dialog / modal goes here.</div>
                                                                            <div class="modal-footer"> <a href="#" data-dismiss="modal" class="btn">Close</a>
                                                                                <a href="#" class="btn btn-primary">Save changes</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Multi Model End-->
@else
      <div class="card">
>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f
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
<<<<<<< HEAD
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
                                                                
                                                                <td><button class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info" data-toggle="modal" data-target="#tabbed-form"><span data-feather="eye"></span></button>
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

                                                                  
                     <?php  $pecah1 = explode(".", $data->surat_pendaftaran );
             $surat_pendaftaran = $pecah1[1];

             $pecah2 = explode(".", $data->akte_pendirian );
             $akte_pendirian = $pecah2[1];

             $pecah3 = explode(".", $data->adrt );
             $adrt = $pecah3[1];

             $pecah4 = explode(".", $data->surat_keputusan );
             $surat_keputusan = $pecah4[1];

             $pecah5 = explode(".", $data->biodata_pengurus );
             $biodata_pengurus = $pecah5[1];

             $pecah6 = explode(".", $data->ktp );
             $ktp = $pecah6[1];

             $pecah7 = explode(".", $data->foto );
             $foto = $pecah7[1];

             $pecah8 = explode(".", $data->surat_keterangan_domisili );
             $surat_keterangan_domisili = $pecah8[1];

             $pecah9 = explode(".", $data->npwp );
             $npwp = $pecah9[1];

             $pecah10 = explode(".", $data->foto_kantor );
             $foto_kantor = $pecah10[1];

             $pecah11 = explode(".", $data->surat_keterangan_ketertiban );
             $surat_keterangan_ketertiban = $pecah11[1];

             $pecah12 = explode(".", $data->surat_tidak_avilasi );
             $surat_tidak_avilasi = $pecah12[1];

             $pecah13 = explode(".", $data->surat_konflik );
             $surat_konflik = $pecah13[1];

             $pecah14 = explode(".", $data->surat_hak_cipta );
             $surat_hak_cipta = $pecah14[1];

             $pecah15 = explode(".", $data->surat_laporan );
             $surat_laporan = $pecah15[1];

             $pecah16 = explode(".", $data->surat_absah );
             $surat_absah = $pecah16[1];

             $pecah17 = explode(".", $data->surat_rekom_agama );
             $surat_rekom_agama = $pecah17[1];

             $pecah18 = explode(".", $data->surat_rekom_skpd );
             $surat_rekom_skpd = $pecah18[1];

             $pecah19 = explode(".", $data->surat_rekom_skpd_kerja );
             $surat_rekom_skpd_kerja = $pecah19[1];

             $pecah20 = explode(".", $data->surat_rekom_kesediaan );
             $surat_rekom_kesediaan = $pecah20[1];

             $pecah21 = explode(".", $data->surat_izasah );
             $surat_izasah = $pecah21[1];

             $pecah2 = explode(".", $data->skt );
             $skt = $pecah2[1];

             $pecah22 = explode(".", $data->surat_ketertiban );
             $surat_ketertiban = $pecah22[1];

             ?>
{{ $ekstensi }}
                                                            
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
                                                          
                                                         
                                                             @endforeach
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane" id="data2" role="tabpanel">
                                                            <form class="md-float-material form-material">
                                                                @foreach ($datas as $data)

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

                                                          
                                                    
                                                                @endforeach
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane" id="data3" role="tabpanel">
                                                        <form class="md-float-material form-material">
                                                           
                                                             @foreach ($datas as $data)

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


=======

@endif

@endforeach
>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f

@endsection