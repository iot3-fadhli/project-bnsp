@extends('layouts.guest')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Belum Punya Akun?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Buat akun Baru</a>
        </div>
    </form>
@endsection
