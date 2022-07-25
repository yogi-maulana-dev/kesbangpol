@extends('layouts.main_admin')

@section('perpanjang')
    <div class="card">
        <div class="card-header">
            <h5>Halaman Data Pendaftaran Organisasi Masyarakat</h5>
            <!--<span>Add class of <code>.form-control required</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form method="post" action="/perpanjang/{{ $perpanjang->id }}" class="form-material"
                enctype="multipart/form-data">
                @method('put')
                @csrf

                @if ($perpanjang->a_surat_pendaftaran == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">1. Surat Permohonan
                            Pendaftaran</label>
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


                @if ($perpanjang->a_akte_pendirian == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">2. Akte Pendirian Ormas
                            Yang Disahkan Oleh Notaris</label>
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

                @if ($perpanjang->a_adrt == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">3. Anggaran Dasar (AD)
                            Anggaran Rumah Tangga (ART) Yang Disahkan Oleh Notaris Dan
                            Organisasi Berdiri Berdasarkan (Menkumham/Berdasarkan
                            UUD)</label>
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


                {{-- ini adalah penutup a_tujuan --}}

                @if ($perpanjang->a_tujuan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">4. Tujuan Dan Program
                            kerja Organisasi</label>
                        <div class="col-sm-8">
                            <input type="file" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror">

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

                {{-- ini adalah penutup a_surat_keputusan --}}

                @if ($perpanjang->a_surat_keputusan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">5. Surat Keputusan Tentang Susunan Pengurus Ormas</label>
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

                @if ($perpanjang->a_biodata_pengurus == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">6. Biodata pangurus
                            organisasi (ketua, sekretaris dan bendahara atau sebutan
                            lainnya)</label>
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

                {{-- ini adalah penutup a_ktp --}}
                @if ($perpanjang->a_ktp == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">7. Kartu Tanda Penduduk (Mesuji) Pengurus Organisasi</label>
                        <div class="col-sm-8">
                            <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror">

                            @error('ktp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                @else
                @endif

                @if ($perpanjang->a_foto == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">8. Pas Foto Ketua Organisasi Berwarna Terbaru</label>
                        <div class="col-sm-8">
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_keterangan_domisili --}}

                @if ($perpanjang->a_surat_keterangan_domisili == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">9. Surat Keterangan Domisili Sekretariat Omas Yang
                            Diterbitkan Olah Lurah / Kepala Desa / Camat
                        </label>
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

                @if ($perpanjang->a_npwp == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">10. Nomor Pokolk Wajib Pajak Atas Nama Organisasi</label>
                        <div class="col-sm-8">
                            <input type="file" name="npwp" class="form-control @error('npwp') is-invalid @enderror">

                            @error('npwp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_npwp --}}

                {{-- ini adalah penutup a_foto_kantor --}}

                @if ($perpanjang->a_foto_kantor == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">11. Foto Kantor Atau Sekretariat Ormas, Tampak Depan Yang
                            Memuat Papan Nama</label>
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
                @else
                @endif



                {{-- ini adalah penutup a_surat_ketertiban --}}
                {{-- ini adalah penutup a_keabsahan_kantor --}}

                @if ($perpanjang->a_keabsahan_kantor == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">12. Keabsahan Kantor Atau Sekretariat Ormas Dilampiri Bukti
                            Kepemilikan, atau Surat Perjanjian Kontrak Atau Ijin Pakai Dari Pemilik/Pengelola</label>
                        <div class="col-sm-8">
                            <input type="file" name="keabsahan_kantor"
                                class="form-control @error('keabsahan_kantor') is-invalid @enderror">

                            @error('keabsahan_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_keabsahan_kantor --}}

                {{-- ini adalah penutup a_surat_memuat --}}

                @if ($perpanjang->a_surat_memuat == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">13. Surat Pernyataan Yang Memuat : 1. Pernyataan Tidak
                            Terjadi Konflik Kepengurusan Dan Perkara Pengadilan, 2. Pernyataan Bahwa Nama, Lambang, Bendera,
                            Tanda Gambar, Simbol, Atribut, Cap Stempel Yang Digunakan Belum Menjadi Hak Paten Atau Hak Cipta
                            Pihak Lain, 3. Pernyataan Kesanggupan Menyampaikan Laporan Perkembangan Dan Kegiatan Ormas
                            Setiap Akhir Tahun, 4. Surat Pernyataan Bahwa Bertanggung Jawab Terhadap Keabsahan Seluruh Isi,
                            Data, Dan Informasi Dokumen Atau Berkas Yang Diserahkan, Dan Bersedia Dituntut Secara Hukum. (Di
                            Tanda Tangani Ketua Dan Sekretaris)</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_memuat"
                                class="form-control @error('surat_memuat') is-invalid @enderror">
                            @error('surat_memuat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_memuat --}}

                {{-- ini adalah penutup a_surat_rekom_agama --}}

                @if ($perpanjang->a_surat_rekom_agama == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">14. Rekomendasi Dari Kementerian Agama Untuk Omas Yang
                            Memiliki Kekhususan Bidang Keagamaan **</label>
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

                @if ($perpanjang->a_surat_rekom_skpd_kepercayaan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">15. Rekomendasi Dari SKPD Yang Membidangi Urusan Kebudayaan
                            Untuk Ormas Yang Memiliki Kekhususan Bidang Kepercayaan Kepada Tuhan Yang Maha Esa **</label>
                        <div class="col-sm-8">
                            <input type="file" name="surat_rekom_skpd_kepercayaan"
                                class="form-control @error('surat_rekom_skpd_kepercayaan') is-invalid @enderror">
                            @error('surat_rekom_skpd_kepercayaan')
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

                @if ($perpanjang->a_surat_rekom_skpd_kerja == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">16. Rekomendasi Dari SKPD Yang Membidangi Urusan Tenaga
                            Kerja Untuk Ormas Serikat Buruh Dan Serikat Pekerja **</label>
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

                @if ($perpanjang->a_surat_rekom_kesediaan == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">17. Surat Pernyataan Kesediaan Atau Persetujuan Untuk Ormas
                            Yang Dalam Kepengurusannya Mencantumkan Nama Dari Pajabat Negara, Pejabat Pemerintah, Dan Tokoh
                            Masyarakat **</label>
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

                @if ($perpanjang->a_surat_izasah == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">18. Ijazah Terakhir Pengurus Harian (Ketua, Sekretaris,
                            Bendahara)</label>
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

                {{-- ini adalah penutup a_stlk --}}

                @if ($perpanjang->a_stlk == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">19. STLK Dari Badan Kesatuan Bangsa Dan Politik Provinsi
                            Lampung Bagi Organisasi Yang Memiliki Kepengurusan Tingkat Provinsi **</label>
                        <div class="col-sm-8">
                            <input type="file" name="stlk"
                                class="form-control @error('stlk') is-invalid @enderror">

                            @error('stlk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup stlk --}}



                {{-- ini adalah penutup a_surat_kemenkumham --}}

                @if ($perpanjang->a_surat_kemenkumham == 0)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">20. Surat Keterangan Terdaftar Di Kementrian Hukum Dan Ham
                            Bagi Ormas Yang Berbadan Hukum, Dan/ Atau Surat Keterangan Terdaftar Di Kementrian Dalam Negri
                            Bagi Ormas Yang Tidak Berbadan Hukum</label>
                        <div class="col-sm-8">
                            {{-- <img class="img-fluid " id="gambar" src="#" alt="Pilih Gambar" OnError=" $(this).hide();" /> --}}
                            <input type="file" name="surat_kemenkumham" id="upload"
                                class="form-control upload @error('surat_kemenkumham') is-invalid @enderror"
                                onchange="showFile()" accept="image/*, application/pdf">
                            @error('surat_kemenkumham')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @else
                @endif

                {{-- ini adalah penutup a_surat_kemenkumham --}}


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
