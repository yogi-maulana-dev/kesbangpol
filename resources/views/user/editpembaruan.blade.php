@extends('layouts.main_admin')

@section('pembaruan')
    <div class="card">
        <div class="card-header">
            <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
            <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form method="post" action="{{ route('pembaruan.update', $pembaruan->id) }}" class="form-material"
                enctype="multipart/form-data">
                @method('put')
                @csrf


                @if ($pembaruan->a_surat_stlk == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">1. Surat Permohonan Perubahan STLK</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="surat_stlk" id="upload"
                                class="form-control upload @error('a_surat_stlk') is-invalid @enderror"
                                onchange="showFile()" accept="image/*, application/pdf">
                            @error('a_surat_stlk')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                @if ($pembaruan->a_sk_pengurusan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">2. Surat Keputusan Tentang Susunan Pengurus Ormas</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="sk_pengurusan" id="upload"
                                class="form-control upload @error('sk_pengurusan') is-invalid @enderror"
                                onchange="showFile()" accept="image/*, application/pdf">
                            @error('sk_pengurusan')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_sk_pengurusan --}}



                @if ($pembaruan->a_npwp == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">3. Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="npwp" id="upload"
                                class="form-control upload @error('a_npwp') is-invalid @enderror" onchange="showFile()"
                                accept="image/*, application/pdf">
                            @error('a_npwp')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif





                @if ($pembaruan->a_npwp == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">4. Nomor Pokolk Wajib Pajak Atas Nama Organisasi</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="npwp" id="upload"
                                class="form-control upload @error('a_npwp') is-invalid @enderror" onchange="showFile()"
                                accept="image/*, application/pdf">
                            @error('a_npwp')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                @if ($pembaruan->surat_domisili == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">5. Surat Keterangan Domisili Sekretariat Omas Yang
                            Diterbitkan Olah Lurah / Kepala Desa / Camat</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="surat_domisili" id="upload"
                                class="form-control upload @error('surat_domisili') is-invalid @enderror"
                                onchange="showFile()" accept="image/*, application/pdf">
                            @error('surat_domisili')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif


                @if ($pembaruan->a_foto_ketua == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">6. Pas Foto Ketua Organisasi Berwarna Terbaru</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="foto_ketua" id="upload"
                                class="form-control upload @error('foto_ketua') is-invalid @enderror" onchange="showFile()"
                                accept="image/*, application/pdf">
                            @error('foto_ketua')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif


                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                </div>

        </div>


        </form>
    </div>
    </div>
@endsection


{{-- <script>
    // Check HTML5 File API Browser Support
if (window.File && window.FileList && window.FileReader) {
       function showFile() {
           var preview = document.getElementById("preview");
           var fileInput = document.querySelector("input[type=file]");
           for (var i = 0; i < fileInput.files.length; i++) {
               var reader = new FileReader();
               reader.onload = function(readerEvent) {
                   var listItem = document.createElement("li");
                   listItem.innerHTML = "<img src='" + readerEvent.target.result + "' />";
                   preview.append(listItem);
               }
               reader.readAsDataURL(fileInput.files[i]);
           }
       }
   } else {
       alert("Your browser is too old to support HTML5 File API");
   }
</script> --}}
