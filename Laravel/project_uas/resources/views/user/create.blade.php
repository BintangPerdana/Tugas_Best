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
                            <h1 class="card-title text-primary">Tambah User</h1>
                            <form class="forms-sample" method="post" action="{{ route('user.store') }}"
                                enctype='multipart/form-data'>
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        <h5>Nama User</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" placeholder="Nama User">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">
                                        <h5>email</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">
                                        <h5>password</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isAdmin" class="col-sm-3 col-form-label">
                                        <h5>isAdmin</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="isAdmin" placeholder="isAdmin">
                                        @error('isAdmin')
                                            <span class="text-danger mt-3">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
        <!-- row end -->
    @endsection
