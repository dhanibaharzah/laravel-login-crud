@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <br>
                    <a href="{{ url('product')}}" class="btn btn-danger">Manajemen Produk</a>
                    <a href="{{ url('crud')}}" class="btn btn-warning">Manajemen User</a>
                    <a href="{{ url('item')}}" class="btn btn-success">Manajemen Item</a>
                    <a href="{{ url('barang')}}" class="btn btn-success">Manajemen Barang</a>
                                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
