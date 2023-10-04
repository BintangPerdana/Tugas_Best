@extends('layout.master')
@section('title', 'Halaman User')
<main id="main" class="main">
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User</h4>
                        <a href="{{ route('user.create') }}" class="btn btn-success mb-3"><i
                                class="bi bi-plus-square me-2"></i>Tambah User</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">Email User</th>
                                        <th class="text-center">isAdmin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->name }}</td>
                                            <td class="text-center">{{ $data->email }}</td>
                                            <td class="text-center">{{ $data->isAdmin }}</td>
                                            <td class="text-center">
                                                <form method="post" action="{{ route('user.destroy', $data->id) }}">
                                                    <a href="{{ route('user.edit', $data->id) }}"
                                                        class="btn btn-warning btn-rounded btn-xs">Ubah</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Yakin Menghapus Pesanan')"class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
        <!-- row end -->
    @endsection
