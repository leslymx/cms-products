@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">{{ __('Editar producto') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Nombre de producto* </label>
                            <input type="text" name="product_name" class="form-control" required value="{{ old('product_name', $product->product_name) }}">
                        </div>
                        <div class="form-group">
                            <label> Codigo de serie* </label>
                            <input type="text" name="sku" class="form-control" required value="{{ old('sku', $product->sku) }}">
                        </div>
                        <div class="form-group">
                            <label> Existencias* </label>
                            <input type="number" name="stock" class="form-control" required value="{{ old('stock', $product->stock) }}">
                        </div>
                        <div class="form-group">
                            <label> Categoria </label>
                            <input type="text" name="category" class="form-control" required value="{{ old('category', $product->category) }}">
                        </div>
                        <div class="form-group mt-3">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-success">
                            <a href="{{route('products.index')}}" class="btn btn-sm btn-danger"> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection