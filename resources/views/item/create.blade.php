@extends('layouts.master')
@section('title', 'Add New Item')
@section('content')
    <h2>Add New Item</h2>
    <form action="{{ route('item.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="id">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" {{--pattern="[A-Z]{3}\d{3}"--}}
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        <div class="col-md-6 mb-3">
                <label for="nama">Nama Item</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="harga">Harga</label>
                <input type="number" step="0.2" class="form-control @error('harga') is-invalid @enderror"
                    name="harga" id="harga" min="0"  value="{{ old('harga') }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="stok">Stock</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stok" id="stok"
                    min="0"  value="{{ old('stok') }}">
                @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
        <a href="{{ route('item.index') }}" class="btn btn-primary btn-lg btn-block">back
            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
        </a>
    </form>
@endsection

