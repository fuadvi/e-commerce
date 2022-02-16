@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Daftar Product </h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Name</th>
                                <th>type</th>
                                <th>price</th>
                                <th>Quantity</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="serial">{{ $loop->iteration }}</td>
                                <td>  <span class="name">{{ $product->name }}</span> </td>
                                <td> <span class="product">{{ $product->type }}</span> </td>
                                <td><span class="count">{{ $product->price }}</span></td>
                                <td><span class="count">{{ $product->quantity }}</span></td>
                                <td>
                                    <a href="" class="btn btn-info">edit</a>
                                    <form action="{{ route('barang.destroy',$product->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center h3">DATA MASIH KOSONG</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
@endsection


