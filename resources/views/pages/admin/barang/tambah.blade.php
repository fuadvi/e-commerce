@extends('layouts.admin')

@section('content')
    <div class="content">

    <form action="{{ route('barang.store') }}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" id="nama" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Teuku FUad Maulana">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" name="type" value="{{ old('type') }}" placeholder="eletronik">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="21517461">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" placeholder="50">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <button class="btn btn-info form-control">Tambah</button>
        </div>
    </form>

    </div>
@endsection
