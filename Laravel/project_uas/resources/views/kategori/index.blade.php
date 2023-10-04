@extends('layout.master')
@section('title', 'Halaman Kategori')

@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Menu</h4>
                        <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3"><i
                                class="bi bi-plus-square me-2"></i>Tambah Kategori</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->nama_kategori }}</td>
                                            <td class="text-center">{{ $data->deskripsi }}</td>
                                            <td class="text-center">
                                                <form method="post" action="{{ route('kategori.destroy', $data->id) }}">
                                                    <a href="{{ route('kategori.edit', $data->id) }}"
                                                        class="btn btn-warning btn-rounded btn-xs">Ubah</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Yakin Menghapus Kategori')"class="btn btn-danger">Delete</button>
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
