@component('mail::message')
# Pendaftaran Siswa

Selamat anda telah terdaftar di SMAN7 Kota Cirebon

@component('mail::button', ['url' => 'http://dianaart.epizy.com/?i=1'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent