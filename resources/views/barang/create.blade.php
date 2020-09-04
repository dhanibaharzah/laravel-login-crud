@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Barang</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/barang') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('nama_barang') ? 'is-invalid':'' }}" placeholder="Masukkan nama barang">
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Barang</label>
                                <textarea name="description" cols="10" rows="10" class="form-control {{ $errors->has('jumlah_barang') ? 'is-invalid':'' }}"></textarea>
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Simpan</button>
                                <a href="{{ url('barang')}}" class="btn btn-danger btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection