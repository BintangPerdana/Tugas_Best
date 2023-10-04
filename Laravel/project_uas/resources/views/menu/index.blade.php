@extends('layout.master')
@section('title', 'Halaman Menu')

@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Menu</h4>
                        @can('isAdmin')
                            <a href="{{ route('menu.create') }}" class="btn btn-success mb-3"><i
                                    class="bi bi-plus-square me-2"></i>Tambah Menu</a>
                        @endcan
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Menu</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">deskripsi</th>
                                        <th class="text-center">harga</th>
                                        <th class="text-center">foto</th>
                                        @can('isAdmin')
                                        <th class="text-center">Edit/Hapus</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->nama_menu }}</td>
                                            <td class="text-center">{{ $data->kategori->nama_kategori }}</td>
                                            <td class="text-center">{{ $data->deskripsi }}</td>
                                            <td class="text-center">{{ $data->harga }}</td>
                                            <td class="text-center"><img src="{{ asset('images/menu/' . $data->foto) }}"
                                                    alt="{{ $data->nama_menu }}" width="100" height="90"></td>
                                            <td class="text-center">
                                                @can('isAdmin')
                                                    <form method="post" action="{{ route('menu.destroy', $data->id) }}">
                                                        <a href="{{ route('menu.edit', $data->id) }}"
                                                            class="btn btn-warning btn-rounded btn-xs">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Yakin Menghapus Menu')"class="btn btn-danger">Hapus</button>
                                                    </form>
                                                @endcan
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
