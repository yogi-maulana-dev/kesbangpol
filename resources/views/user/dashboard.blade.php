@extends('layouts.main_admin')

@section('dashboard')

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

@endif

@endforeach

@endsection