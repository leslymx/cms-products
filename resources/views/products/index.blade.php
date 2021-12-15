@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Dashboard overview -->
            <div class="card d-flex flex-row border-0 mb-3">
                <p class="mt-4 mx-3"> {{__('Dashboard overview')}}</p>
                <div class="card-body">
                    <div class="form-outline col-md-5">
                        <input class="border-light border-2 rounded form-control form-icon-trailing bg-white" type="text" placeholder="🔍  Search all...">
                    </div>
                </div>
                <a href="#" class="text-black mt-3 me-5 text-decoration-none">Help guides</a>
                <a href="#" class="text-black mt-3 me-3 text-decoration-none">Inbox
                    <img src="{{ asset('assets/svg/inbox-fill.svg')}}" alt="">
                    <span class="position-absolute rounded-circle bg-danger p-1"></span>
                </a>
                <div>
                    <a href="#" class="btn btn-small bg-purple-700 text-white mt-2 mx-4">Download client</a>
                </div>
                <div class="position-relative">
                    <img src="{{asset('assets/svg/profile.svg')}}" class="rounded-circle me-3 mt-1">
                    <span class="position-absolute bottom-30 start-70 translate-middle border border-light rounded-circle p-1 bg-success"></span>
                </div>
            </div>
            <!-- Order catalogue -->
            <div class="card border-light">
                <div class="border-0 border-2 text-gray-800 card-header bg-white fs-5 position-absolute top-0 start-0 mt-3">
                    {{ __('Order catalogue') }} 🆕
                </div>
                <div class="d-flex justify-content-end me-3 align-items-start mt-3">
                    <div class="form-outline me-3">
                        <input class="border-light rounded form-control form-icon-trailing bg-white" type="text" placeholder="Select column  ↓↑">
                    </div>
                    <div class="form-outline col-md-3">
                        <input class="border-light border-2 rounded form-control form-icon-trailing bg-white" type="text" placeholder="🔍  Search list...">
                    </div>

                    <div class="form-outline mx-3 ">
                        <img src="{{asset('assets/svg/filter-3-line.svg')}}" alt="" width="20" height="20" class="mt-2">
                    </div>
                    <div>
                        <a href="{{ route('products.create') }}" class="btn btn-small bg-purple-800 text-white">Add new</a>
                    </div>
                </div>

                <div class="card-body border-0">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table border-0 table-hover border-light">
                        <thead>
                            <tr class="bg-white-200">
                                <th>#</th>
                                <th>Product</th>
                                <th>Serial-code</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th colspan="2" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td class="col-md-4">{{ $product->product_name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product)}}" class="btn btn-sm btn-outline-success">Editar</a>
                                </td>
                                <td>
                                    <form action="{{route('products.destroy', $product)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-sm btn-outline-danger" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center border-radius">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection