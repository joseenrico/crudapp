@extends('layouts.master')

@section('content')
    <section class="row">
        <div class="container">
            <h4>Edit Produk</h4>
            <form action="{{ route('product.update', $product->id) }}" method="POST" accept-charset="utf-8"
                class="justify-content-center">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Produk</label>
                    <input name="name" type="text" class="form-control" id="title" aria-describedby="fet1"
                        placeholder="" value="{{ $product->name }}">
                    <span id="fet1" class="sr-only">Masukan nama produk yang dijual</span>
                </div>
                <div class="form-group">
                    <label for="desc">Deskripsi Produk</label>
                    <input name="description" type="text" class="form-control" id="desc" aria-describedby="fet2"
                        placeholder="" value="{{ $product->description }}">
                    <span id="fet2" class="sr-only">Masukan keterangan produk yang dijual</span>
                </div>
                <div class="form-group">
                    <div class="d-flex">
                        <label for="image">Image Produk</label>
                        <img src="{{ $product->image }}" class="img-thumbnail" width="200" />
                    </div>
                    <input name="image" type="text" class="form-control" id="image" aria-describedby="fet2"
                        placeholder="">
                    <span id="fet2" class="sr-only">Masukan keterangan produk yang dijual</span>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('home') }}" class="btn btn-danger">
                    Batal
                </a>
            </form>
        </div>
    </section>
@endsection
