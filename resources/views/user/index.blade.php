@extends('layouts.app')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <h3 class="fw-bold mb-4">
            Data Pengguna
        </h3>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Tidak ada data pengguna

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection