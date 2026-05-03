@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Akun anda</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Email Telah dikirim, silahkan cek email anda untuk verifikasi!
                    </div>
                    @endif

                    <p>Sebelum masuk ke aplikasi, silahkan cek emial anda untuk verifikasi email anda dengan klik link
                        verifikasi yang telah dikrim. Jika anda belum mendapatkan email silahkan klik link di bawah
                        untuk kirim ulang email verifikasi</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik disini untuk kirim
                            ulang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection