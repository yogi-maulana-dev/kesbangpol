@extends('layouts.main_login_admin') @section('berita')
<style>
    .modal {
        overflow-y: auto;
    }
</style>


<div class="card">
    <div class="card-block">

        <div class="card-header">
            <h5>Halaman Berita yang akan di tampilkan pada aplikasi kesbang pol mesuji</h5>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="new-cons" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</i>
                            </th>
                            {{--
                            <th>Nomor Whatsapp</i>
                            </th> --}}
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $berita)
                        <tr>
                            <td>{{ $berita->nama }}</td>
                            <td>{{ $berita->email }}</td>

                            <td> <button class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info" data-target="#tabbed-form-{{ $berita->id }}" data-titleku="DataOrkemas" data-toggle="modal"><span data-feather="eye"></span></button>                                {{-- <a href="/data/{{ $berita->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                            </td>

                            <td>
                                @if ($berita->lengkap == 0)
                                <div class="label-main">
                                    <label class="label label-lg label-primary"><i class="fa fa-spinner"></i>
                                        Proses</label>

                                </div>
                                @else Sudah di verikasi @endif
                            </td>

                            <td>
                                <form method="post" action="/send/mail">
                                    @csrf
                                    <input class="form-control" type="text" name="nama" value="{{ $berita->nama }}">
                                    <input class="form-control" type="text" name="email" value="{{ $berita->email }}">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Kirim ke Email Saya</button>
                                    </div>
                                </form>
                                {{-- <a href="{{ route('download', $berita->nama) }}" target="_blank" rel="noopener" class="btn btn-primary btn-sm text-white">
                                Download
                                </a> --}}

                            </td>
                            <td>
                                <a href="{{ route('admin.download', $berita->nama) }}" target="_blank" rel="noopener" class="btn btn-success btn-sm text-white">
                                    Download
                                </a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endforeach





<!--

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).on('click', 'input[name="a_surat_terdaftar_dikemenkumham"]', function() {
        $('input[name="a_surat_terdaftar_dikemenkumham"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_surat_pendaftaran"]', function() {
        $('input[name="a_surat_pendaftaran"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_adrt"]', function() {
        $('input[name="a_adrt"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_keabsahan_kantor"]', function() {
        $('input[name="a_keabsahan_kantor"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_program"]', function() {
        $('input[name="a_program"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_surat_keputusan"]', function() {
        $('input[name="a_surat_keputusan"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_biodata_pengurus"]', function() {
        $('input[name="a_biodata_pengurus"]').not(this).prop('checked', false);
    });


    $(document).on('click', 'input[name="a_akte_pendirian"]', function() {
        $('input[name="a_akte_pendirian"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_ktp"]', function() {
        $('input[name="a_ktp"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_foto"]', function() {
        $('input[name="a_foto"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_surat_keterangan_domisili"]', function() {
        $('input[name="a_surat_keterangan_domisili"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_npwp"]', function() {
        $('input[name="a_npwp"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_foto_kantor"]', function() {
        $('input[name="a_foto_kantor"]').not(this).prop('checked', false);
    });

    $(document).on('click', 'input[name="a_surat_ketertiban"]', function() {
        $('input[name="a_surat_ketertiban"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_tidak_avilasi"]', function() {
        $('input[name="a_surat_tidak_avilasi"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_konflik"]', function() {
        $('input[name="a_surat_konflik"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_hak_cipta"]', function() {
        $('input[name="a_surat_hak_cipta"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_laporan"]', function() {
        $('input[name="a_surat_laporan"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_absah"]', function() {
        $('input[name="a_surat_absah"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_rekom_agama"]', function() {
        $('input[name="a_surat_rekom_agama"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_rekom_skpd"]', function() {
        $('input[name="a_surat_rekom_skpd"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_rekom_skpd_kerja"]', function() {
        $('input[name="a_surat_rekom_skpd_kerja"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_rekom_kesediaan"]', function() {
        $('input[name="a_surat_rekom_kesediaan"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_surat_izasah"]', function() {
        $('input[name="a_surat_izasah"]').not(this).prop('checked', false);
    });
    $(document).on('click', 'input[name="a_skt"]', function() {
        $('input[name="a_skt"]').not(this).prop('checked', false);
    });
</script> -->

@endsection