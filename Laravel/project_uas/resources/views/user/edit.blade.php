@extends('layout.master')
@section('title', 'Ubah Pesanan')
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
                            <h1 class="card-title text-primary">Ubah Pesanan</h1>
                            <form class="forms-sample" method="post" action="{{ route('user.update', $user) }}"
                                enctype='multipart/form-data'>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        <h5>Nama User</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" placeholder="Nama User"
                                            value="{{ old('name') ?? $user->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">
                                        <h5>Email</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="{{ old('email') ?? $user->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">
                                        <h5>Password</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isAdmin" class="col-sm-3 col-form-label">
                                        <h5>isAdmin</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="isAdmin" placeholder="isAdmin"
                                            value="{{ old('isAdmin') ?? $user->isAdmin }}">
                                        @error('isAdmin')
                                            <span class="text-danger mt-3">{{ $message }}</span>
                                        @enderror
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
