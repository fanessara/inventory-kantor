@extends('auth.app')

@section('content')
<div class="row w-100 mx-0">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h4>Inventori Kantor</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            
            <!-- Tampilkan Pesan Error Jika Login Gagal -->
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Action Mengarah ke Route Login -->
            <form class="pt-3" action="{{ route('login.post') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <!-- Ubah type jadi text, dan name="username" -->
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Username"
                        required
                    />
                </div>
                
                <div class="form-group">
                    <input
                        type="password"
                        class="form-control form-control-lg"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required
                    />
                </div>
                
                <div class="mt-3">
                    <!-- Ubah tag <a> jadi <button type="submit"> -->
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        SIGN IN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection