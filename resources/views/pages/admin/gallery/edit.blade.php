@extends('layouts.admin')

@section('content')
    <div class="content">

    <form action="{{ route('gallery.update',$gallery->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
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
            <img src="{{ Storage::url($gallery->image)}}" style="width: 100%" class="figure-img img-fluid rounded">
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <select name="barang_id" class="form-control">
                @foreach ($barang as $item)
                    <option value="{{ $item->id }}" {{ $gallery->barang_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" id="image" class="form-control-file" name="image">
        </div>

        <div class="mb-3">
            <button class="btn btn-info form-control">Tambah</button>
        </div>
    </form>

    </div>
@endsection
