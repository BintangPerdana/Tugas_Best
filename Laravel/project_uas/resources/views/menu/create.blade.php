@extends('layout.master')
@section('title', 'Tambah Menu')
<main id="main" class="main">

    @section('content')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                            <h1 class="card-title text-primary">Tambah Menu</h1>
                            <form class="forms-sample" method="post" action="{{ route('menu.store') }}"
                                enctype='multipart/form-data'>
                                @csrf
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">
                                        <h5>Nama menu</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_kategori" class="col-sm-3 col-form-label">
                                        <h5>Kategori</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="id_kategori" class="h-75">
                                            @foreach ($kategori->sortBy('nama_kategori') as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="npm" class="col-sm-3 col-form-label">
                                        <h5>deskripsi</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="deskripsi" placeholder="deskripsi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kota_lahir" class="col-sm-3 col-form-label">
                                        <h5>harga</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga" placeholder="harga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-3 col-form-label">
                                        <h5>Foto</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="foto" placeholder="foto">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('menu.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
        <!-- row end -->
    @endsection
