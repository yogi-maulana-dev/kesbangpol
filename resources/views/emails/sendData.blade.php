@component('mail::message')
# Hai {{ $maildata['email'] }}

Selamat data anda lengkap dan telah terverifikasi, selanjutnya silahkan kumpulkan seluruh data berupa cetakan (hardcopy)
ke Kantor Badan Kesatuan Bangsa Dan Politik Kabupaten Mesuji.

@component('mail::button', ['url' => route('user.login')])
Klik untuk login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
