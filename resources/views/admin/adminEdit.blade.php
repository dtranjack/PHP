@extends('admin.adminPageLayout')
@section('title', 'Edit')
@section('content')
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <form action="{{ route('admin.product.update', ['id' => $editItem->id]) }}" method="POST" class="tm-edit-product-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label
                                    for="name"
                                >Product Name
                                </label>
                                <input id="name"
                                       name="name"
                                       type="text"
                                       value="{{$editItem->name}}"
                                       class="form-control validate"/>
                                <!-- Repeat this pattern for other fields -->

                            </div>
                            <div class="row">
                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                <label
                                    for="price"
                                >Price</label
                                >
                                <input
                                    id="price"
                                    name="price"
                                    type="number"
                                    value="{{$editItem->price}}"
                                    class="form-control validate">
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
                                    value="{{$editItem->size}}"
                                    class="form-control validate">
                            </div>
                            </div>
                            <div class="form-group mb-3">
                                <label
                                    for="manu"
                                >Manufacturer</label
                                >
                                <input
                                    id="manu"
                                    name="manufacturer"
                                    type="text"
                                    value="{{$editItem->manufacturer}}"
                                    class="form-control validate">
                            </div>
                            <div class="form-group mb-3">
                                <label for="stock">Stock</label>
                                <input id="stock" name="stock" type="number" value="{{$editItem->stock}}" class="form-control validate">
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label
                                        for="created_date"
                                    >Created Date
                                    </label>
                                    <input
                                        id="created_date"
                                        name="created_date"
                                        type="text"
                                        value="{{$editItem->created_date}}"
                                        class="form-control validate"
                                        data-large-mode="true"
                                        disabled="disabled"
                                    />
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label
                                        for="updated_date"
                                    >Update Date
                                    </label>
                                    <input
                                        id="updated_date"
                                        name="updated_date"
                                        type="text"
                                        value="{{$editItem->updated_date}}"
                                        class="form-control validate"
                                        data-large-mode="true"
                                        disabled="disabled"
                                    />
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
