@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data User</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/crud') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid':'' }}" placeholder="Masukkan Nama Depan">
                                <p class="text-danger">{{ $errors->first('first_name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid':'' }}" placeholder="Masukkan Nama Akhir">
                                <p class="text-danger">{{ $errors->first('last_name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid':'' }}" >
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Simpan</button>
                                <a href="{{ url('/crud')}}" class="btn btn-danger btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


