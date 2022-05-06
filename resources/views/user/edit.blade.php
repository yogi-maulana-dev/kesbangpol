@extends('layouts.main_admin')

@section('dashboard')
    <div class="card">
        <div class="card-header">
            <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
            <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form method="post" action="/berita/{{ $data->id }}" class="form-material" enctype="multipart/form-data">
                @method('put')
                @csrf

                @if ($data->a_surat_terdaftar_dikemenkumham == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">File Terdaftar dikemenkumham/kementerian dalam negeri</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="surat_terdaftar_dikemenkumham" id="upload"
                                class="form-control upload @error('surat_terdaftar_dikemenkumham') is-invalid @enderror"
                                onchange="showFile()" accept="image/*, application/pdf">
                            @error('surat_terdaftar_dikemenkumham')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_terdaftar_dikemenkumham --}}

                @if ($data->a_tujuan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tujuan Organisasi </label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="tujuan" id="upload"
                                class="form-control upload @error('tujuan') is-invalid @enderror" onchange="showFile()"
                                accept="image/*, application/pdf">
                            @error('tujuan')
                                <div class="invalid-feedback">

                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_tujuan --}}

                @if ($data->a_program == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Program Organisasi</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="program" id="upload"
                                class="form-control upload @error('program') is-invalid @enderror" onchange="showFile()"
                                accept="image/*, application/pdf">
                            @error('program')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_program --}}

                @if ($data->a_surat_pendaftaran == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pendaftaran</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="surat_pendaftaran" id="upload"
                                class="form-control upload @error('surat_pendaftaran') is-invalid @enderror"
                                onchange="showFile()" accept="image/*, application/pdf">
                            @error('surat_pendaftaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_pendaftaran --}}


                @if ($data->a_akte_pendirian == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Akte Pendirian</label>
                        <div class="col-sm-8">
                            <input type="file" name="akte_pendirian"
                                class="form-control @error('akte_pendirian') is-invalid @enderror">

                            @error('akte_pendirian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>
                    </div>
                @else
                @endif



                {{-- ini adalah penutup a_adrt --}}

                @if ($data->a_adrt == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Anggaran rumah Tangga</label>
                        <div class="col-sm-8">
                            <input type="file" name="adrt" class="form-control @error('adrt') is-invalid @enderror">

                            @error('adrt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_adrt --}}

                {{-- ini adalah penutup a_surat_keputusan --}}

                @if ($data->a_surat_keputusan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan ketersediaan</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_keputusan"
                                class="form-control @error('surat_keputusan') is-invalid @enderror">

                            @error('surat_keputusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_keputusan --}}

                {{-- ini adalah penutup a_biodata_pengurus --}}

                @if ($data->a_biodata_pengurus == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Biodata Pengurus</label>
                        <div class="col-sm-8">
                            <input type="file" name="biodata_pengurus"
                                class="form-control @error('biodata_pengurus') is-invalid @enderror">

                            @error('biodata_pengurus')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_biodata_pengurus --}}

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">KTP</label>
                    <div class="col-sm-8">
                        <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror">

                        @error('ktp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                {{-- ini adalah penutup a_surat_keterangan_domisili --}}

                @if ($data->a_surat_keterangan_domisili == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Keterangan Domisili</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_keterangan_domisili"
                                class="form-control @error('surat_keterangan_domisili') is-invalid @enderror">

                            @error('surat_keterangan_domisili')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_keterangan_domisili --}}

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

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto Kantor Tampak Depan papan nama organisasi</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto_kantor"
                            class="form-control @error('foto_kantor') is-invalid @enderror">

                        @error('foto_kantor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                {{-- ini adalah penutup a_surat_ketertiban --}}

                @if ($data->a_surat_ketertiban == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan Kesiapan menertibkan organisasi</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_ketertiban"
                                class="form-control @error('surat_ketertiban') is-invalid @enderror">

                            @error('surat_ketertiban')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_ketertiban --}}

                {{-- ini adalah penutup a_surat_tidak_avilasi --}}

                @if ($data->a_surat_tidak_avilasi == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan Tidak Berafilasi dengan partai politik
                            ditanda tangani ketua</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_tidak_avilasi"
                                class="form-control @error('surat_tidak_avilasi') is-invalid @enderror">
                            @error('surat_tidak_avilasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_tidak_avilasi --}}

                {{-- ini adalah penutup a_surat_konflik --}}

                @if ($data->a_surat_konflik == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan Tidak Tejadi Konflik pengurusan ditanda
                            tangani
                            ketua</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_konflik"
                                class="form-control @error('surat_konflik') is-invalid @enderror"> @error('surat_konflik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_konflik --}}


                {{-- ini adalah penutup a_surat_hak_cipta --}}

                @if ($data->a_surat_hak_cipta == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan Hak Cipta Simbol Organisasi ditanda tangani
                            ketua
                            dan seketaris</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_hak_cipta"
                                class="form-control @error('surat_hak_cipta') is-invalid @enderror">
                            @error('surat_hak_cipta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_hak_cipta --}}


                {{-- ini adalah penutup a_surat_laporan --}}

                @if ($data->a_surat_laporan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan sanggup menyampaikan laporan ditanda tangani
                            ketua</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_laporan"
                                class="form-control @error('surat_laporan') is-invalid @enderror"> @error('surat_laporan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_laporan --}}

                {{-- ini adalah penutup a_surat_absah --}}

                @if ($data->a_surat_absah == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Pernyataan bertanggung jawab keabsahan data ditanda
                            tangan
                            ketua dan seketaris</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_absah"
                                class="form-control @error('surat_absah') is-invalid @enderror">
                            @error('surat_absah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_absah --}}

                {{-- ini adalah penutup a_surat_rekom_agama --}}

                @if ($data->a_surat_rekom_agama == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Rekomendasi dari kementrian agama untuk orkermas
                            keagamaan</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_rekom_agama"
                                class="form-control @error('surat_rekom_agama') is-invalid @enderror">
                            @error('surat_rekom_agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_rekom_agama --}}

                {{-- ini adalah penutup a_surat_rekom_skpd --}}

                @if ($data->a_surat_rekom_skpd == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Rekomendasi dari kementrian dan SKPD bidang kebudayaan
                            khusus
                            kepercayaan pada tuhan yang Maha Esa</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_rekom_skpd"
                                class="form-control @error('surat_rekom_skpd') is-invalid @enderror">
                            @error('surat_rekom_skpd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_rekom_skpd --}}


                {{-- ini adalah penutup a_surat_rekom_skpd_kerja --}}

                @if ($data->a_surat_rekom_skpd_kerja == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat Rekomendasi dari kementrian dan SKPD bidang tenaga
                            kerja
                            orkemas serikat buruh</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_rekom_skpd_kerja"
                                class="form-control @error('surat_rekom_skpd_kerja') is-invalid @enderror">
                            @error('surat_rekom_skpd_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_rekom_skpd_kerja --}}

                {{-- ini adalah penutup a_surat_rekom_kesediaan --}}

                @if ($data->a_surat_rekom_kesediaan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama
                            anggota nama
                            pejabat negara, pemerintahan, dan tokoh masyarakt</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_rekom_kesediaan"
                                class="form-control @error('surat_rekom_kesediaan') is-invalid @enderror">

                            @error('surat_rekom_kesediaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_rekom_kesediaan --}}




                {{-- ini adalah penutup a_surat_izasah --}}

                @if ($data->a_surat_izasah == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat pernyataan persetujuan, untuk menyantumkan nama
                            anggota nama
                            pejabat negara, pemerintahan, dan tokoh masyarakt</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_izasah"
                                class="form-control @error('surat_izasah') is-invalid @enderror">

                            @error('surat_izasah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_izasah --}}

                {{-- ini adalah penutup a_skt --}}

                @if ($data->a_skt == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surat keterangan terdaftar dari provinsi</label>
                        <div class="col-sm-8">
                            <input type="file" name="skt" class="form-control @error('skt') is-invalid @enderror">

                            @error('skt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup skt --}}


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
