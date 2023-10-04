@extends('layout.master')
@section('title', 'Tambah Kategori')
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
                            <h1 class="card-title text-primary">Tambah Kategori</h1>
                            <form class="forms-sample" method="post" action="{{ route('kategori.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="nama_kategori" class="col-sm-3 col-form-label">
                                        <h5>Nama Kategori</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_kategori"
                                            placeholder="Nama Kategori">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">
                                        <h5>Deskripsi</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="deskripsi"
                                            placeholder="Deskripsi">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
        <!-- row end -->
    @endsection
