
        @extends('layouts.master')
        @section('title', 'Edit item')
        @section('content')
            <h2>Update New Item</h2>
            <form action="{{ route('item.update', ['item' => $item->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama">Nama Item</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                            value="{{ old('nama') ?? $menu->nama }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="genre">Harga</label>
                        <input type="number" step="0.2" class="form-control @error('harga') is-invalid @enderror"
                            name="harga" id="harga" min="0"
                            value="{{ old('harga') ?? $item->harga }}">
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
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
            </form>
        @endsection


    </div>
@endsection
