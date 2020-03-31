@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Data Item</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/item/'. $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Item</label>
                                <input type="text" value="{{ $data->nama }}" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('nama') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stok" value="{{ $data->stok }}" class="form-control {{ $errors->has('stok') ? 'is-invalid':'' }}" >
                                <p class="text-danger">{{ $errors->first('stok') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" value="{{ $data->harga }}" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}" >
                                <p class="text-danger">{{ $errors->first('harga') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" value="{{ $data->image }}" class="form-control {{ $errors->has('image') ? 'is-invalid':'' }}" >
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                                <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
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