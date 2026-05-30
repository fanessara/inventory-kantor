@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-4">

                    <!-- HEADER -->
                    <div class="text-center mb-4">

                        <div class="mb-3">

                            <i class="mdi mdi-account-circle"
                               style="font-size:90px; color:#2563eb;"></i>

                        </div>

                        <h3 class="fw-bold">
                            Edit Profile
                        </h3>

                        <p class="text-muted">
                            Kelola informasi akun Anda
                        </p>

                    </div>

                    <!-- ALERT -->
                    @if(session('success'))

                        <div class="alert alert-success rounded-3">

                            {{ session('success') }}

                        </div>

                    @endif

                    <!-- FORM -->
                    <form action="{{ route('update.profile') }}"
                          method="POST">

                        @csrf

                        <!-- NAMA -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Nama Lengkap

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control rounded-3"
                                   value="{{ $user->name }}"
                                   required>

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Email

                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control rounded-3"
                                   value="{{ $user->email }}"
                                   required>

                        </div>

                        <!-- ROLE -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Role

                            </label>

                            <input type="text"
                                   class="form-control rounded-3 bg-light"
                                   value="{{ strtoupper($user->role) }}"
                                   readonly>

                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Password Baru

                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control rounded-3"
                                   placeholder="Kosongkan jika tidak ingin mengganti password">

                            <small class="text-muted">

                                Isi password baru jika ingin mengganti password akun

                            </small>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">

                            <a href="/dashboard"
                               class="btn btn-light rounded-3 px-4">

                                Kembali

                            </a>

                            <button type="submit"
                                    class="btn btn-primary rounded-3 px-4">

                                <i class="mdi mdi-content-save"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection