@component('mail::message')
# Selamat Mendaftar {{$maildata['email']}} pada Aplikasi {{ config('app.name') }}

Silakan verikasi akun anda dengan memasukan kode token : <br><center><input type="text" value="{{$maildata['token_aja'] }}"></center>
@component('mail::button', ['url' => route('user.verifikasi')])
Link Verifikasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
