@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Produk/Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item" active>Produk/Barang</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if ($errors->any())
    <script>
        Swal.fire({
            title: "Terjadi Kesalahan",
            text: "@foreach($errors->all() as $error) {{ $error }} @endforeach",
            icon: "error"
        });
    </script>
    @endif 
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/product/create" class="btn btn-sm btn-primary">
                        Tambah Produk
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk/Barang</th>
                                <th>Deskripsi</th>
                                <th>Kode</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($product as $products)
                                <tr>
                                    <td>{{ ($product->currentPage() - 1) * $product->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $products->name }}</td>
                                    <td>{{ $products->description ?? '-' }}</td>
                                    <td>{{ $products->sku }}</td>
                                    <td>{{ $products->price }}</td>
                                    <td>{{ $products->stock }}</td>
                                    <td>{{ $products->category->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/product/edit/{{ $products->id }}" class="btn btn-sm btn-warning mr-2">
                                                Ubah
                                            </a>
                                            <form action="/product/{{ $products->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $product->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection