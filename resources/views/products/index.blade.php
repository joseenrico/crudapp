@extends('layouts.master')

@section('content')
    <section class="d-flex justify-content-center">
        <div class="p-4">
            <div class="p-2 pull-left">
                <a href="{{ route('product.add') }}" class="btn btn-lg btn-primary">
                    <span>+ Tambah</span>
                </a>
            </div>
            <table class="table table-responsive table-hover table-stripped">
                <caption>Daftar Produk</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($product) <= 0)
                        <tr>
                            <td colspan="4">data kosong</td>
                        </tr>
                    @endif
                    {{-- Pengulangan untuk menampilkan data yang mana data tersebut dinamis dari database --}}
                    @foreach ($product as $key => $item)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ $item->image }}" class="img-responsive" width="100" height="100" />
                            </td>
                            <td>
                                <div class="d-flex align-content-between justify-content-between ">
                                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    {{-- Buat form untuk delete agar aman --}}
                                    <form class="mx-2" action="{{ route('product.delete', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Hapus" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop
