@extends('admin.adminPageLayout')
@section('title', 'Create')
@section('content')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Create Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <form action="{{route('admin.product.store')}}" method="POST" class="tm-edit-product-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label
                                        for="name"
                                    >Product Name
                                    </label>
                                    <input id="name"
                                           name="name"
                                           type="text"
                                           placeholder="Insert name here"
                                           class="form-control validate"/>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                            for="price"
                                        >Price in $</label
                                        >
                                        <input
                                            id="price"
                                            name="price"
                                            type="number"
                                            placeholder="Insert price here"
                                            class="form-control validate">
                                        @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                            for="size"
                                        >Size</label
                                        >
                                        <input
                                            id="size"
                                            name="size"
                                            type="number"
                                            placeholder="Insert size here"
                                            class="form-control validate">
                                        @error('size')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label
                                        for="manufacturer"
                                    >Manufacturer</label
                                    >
                                    <input
                                        id="manufacturer"
                                        name="manufacturer"
                                        type="text"
                                        placeholder="Insert Manufacturer here"
                                        class="form-control validate">
                                    @error('manufacturer')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="stock">Stock</label>
                                    <input id="stock" name="stock" type="number"
                                           placeholder="Insert stock numbers here" class="form-control validate">
                                    @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Create
                                        Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
