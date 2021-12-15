@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">{{ __('Creacion de producto') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            - {{ $error }} <br>
                            @endforeach
                        </div>
                        @endif

                        <form action="{{ route('products.store')}}" method="POST">
                            <div class="form-group">
                                <label>Product *: </label>
                                <input type="text" class="form-control" name="product_name" value="{{ old('product_name')}}">
                            </div>
                            <div class="form-group">
                                <label>Codigo serial *: </label>
                                <input type="text" class="form-control" name="sku" value="{{ old('sku') }}">
                            </div>
                            <div class="form-group">
                                <label>Stock *: </label>
                                <input type="number" class="form-control" name="stock">
                            </div>
                            <div class="form-group">
                                <label>Category *: </label>
                                <input type="text" class="form-control" name="category">
                            </div>
                            <div class="form-group mt-3">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                <a href="{{route('products.index')}}" class="btn btn-sm btn-danger"> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection