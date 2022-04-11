@extends('layouts.main_admin')

@section('container')

 <div class="card">
<div class="card-header">
    <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
    <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
</div>
<div class="card-block">
    <form  method="post" action="/data/edit/{{ $datas->id }}" class="form-material" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group form-default">
            <textarea class="form-control @error('tujuan') is-invalid 
            @enderror" name="tujuan" required="">{{ old('tujuan',$datas->tujuan ) }}</textarea>
            @error('tujuan')
            <div class="invalid-feedback">
{{ $message }}
            </div>
                
            @enderror
            <span class="form-bar"></span>
            <label class="float-label">Program Organisasi</label>
        </div>

           <div class="form-group form-default">
            <textarea class="form-control @error('program') is-invalid 
            @enderror" name="program" required="">{{ old('program',$datas->program ) }}</textarea>
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
                 {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();"/> --}}

               
               
@if ()
    

                     @elseif ()

                     @else

                 @endif
              
                                                                                  <div class="col-lg-12 col-sm-12">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        {{-- <a href="#" data-lightbox="1" data-title="{{ auth()->user()->nama.'/'.$data->surat_pendaftaran }}"> --}}
                                                                 
                                                                            <img id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                                                             
                                                            
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
              
                 <input type="file" name="surat_pendaftaran" class="form-control @error('surat_pendaftaran') is-invalid 
            @enderror" id="file" onchange="priviewImage()">

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


<script>




</script>


@endsection