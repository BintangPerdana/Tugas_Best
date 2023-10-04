@extends('layout.master')
@section('title', 'Tambah Pesanan')
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
                            <h1 class="card-title text-primary">Tambah Pesanan</h1>
                            <form class="forms-sample" method="post" action="{{ route('pesanan.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="nama_menu" class="col-sm-3 col-form-label">
                                        <h5>Nama Menu</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="nama_menu" class="h-75">
                                            @foreach ($menu->sortBy('nama_menu') as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_menu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="npm" class="col-sm-3 col-form-label">
                                        <h5>Jumlah Pesanan</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jumlah_pesanan"
                                            placeholder="Jumlah Pesanan">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('pesanan.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
        <!-- row end -->
    @endsection