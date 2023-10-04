@extends('layout.master')
@section('title', 'Ubah Menu')
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
                            <h1 class="card-title text-primary">Ubah Menu</h1>
                            <form class="forms-sample" method="post" action="{{ route('menu.update', $menu) }}"
                                enctype='multipart/form-data'>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="nama_menu" class="col-sm-3 col-form-label">
                                        <h5>Nama Menu</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu"
                                            value="{{ old('nama_menu') ?? $menu->nama_menu }}">
                                        @error('nama_menu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_kategori" class="col-sm-3 col-form-label">
                                        <h5>Kategori</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="id_kategori" class="h-75">
                                            @foreach ($kategori as $data)
                                                <option @if ($menu->id_kategori == $data->id) selected @endif
                                                    value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deksripsi" class="col-sm-3 col-form-label">
                                        <h5>deskripsi</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="deskripsi" placeholder="deskripsi"
                                            value="{{ old('deskripsi') ?? $menu->deskripsi }}">
                                        @error('deskripsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 col-form-label">
                                        <h5>harga</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga" placeholder="harga"
                                            value="{{ old('harga') ?? $menu->harga }}">
                                        @error('harga')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-3 col-form-label">
                                        <h5>foto</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="foto" placeholder="foto"
                                            value="{{ $menu->foto }}">
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
