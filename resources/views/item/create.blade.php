@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Item</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/item') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Item</label>
                                <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" placeholder="Masukkan Nama Item">
                                <p class="text-danger">{{ $errors->first('nama') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stok" class="form-control {{ $errors->has('stok') ? 'is-invalid':'' }}" placeholder="Masukkan Stok yang Tersedia">
                                <p class="text-danger">{{ $errors->first('stok') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Item</label>
                                <input type="number" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}" placeholder="Masukkan harga">
                                <p class="text-danger">{{ $errors->first('harga') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid':'' }}" >
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Simpan</button>
                                <a href="{{ url('/item')}}" class="btn btn-danger btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


