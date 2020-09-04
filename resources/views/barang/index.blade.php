@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Barang</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/barang/new ') }}" class="btn btn-primary btn-sm float-right" style="margin:5px;">Tambah Data</a>&nbsp;&nbsp;
                                <a href="{{ url('home')}}" class="btn btn-success btn-sm float-right" style="margin:5px;">Go to Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barang as $bar)
                                <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td>{{ $bar->nama_barang }}</td>
                                    <td>{{ $bar->jumlah_barang }}</td>
                                    <td>{{ $bar->is_active }}</td>
                                    <td>{{ $bar->created_at->format('d-m-Y') }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <form action="{{ url('/barang/' . $bar->id) }}" method="POST">
                                            <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/barang/' . $bar->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection