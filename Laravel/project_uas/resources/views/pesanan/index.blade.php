@extends('layout.master')
@section('title', 'Halaman Pesanan')

@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pesanan</h4>
                        <a href="{{ route('pesanan.create') }}" class="btn btn-success mb-3"><i
                                class="bi bi-plus-square me-2"></i>Tambah Pesanan</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Menu</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Jumlah Pesanan</th>
                                        <th class="text-center">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->menu->nama_menu }}</td>
                                            <td class="text-center">{{ $data->menu->kategori->nama_kategori }}</td>
                                            <td class="text-center">{{ $data->jumlah_pesanan }}</td>
                                            <td class="text-center">{{ $data->total_harga }}</td>
                                            <td class="text-center">
                                                <form method="post" action="{{ route('pesanan.destroy', $data->id) }}">
                                                    <a href="{{ route('pesanan.edit', $data->id) }}"
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
