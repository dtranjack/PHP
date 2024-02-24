@extends('admin.adminPageLayout')
@section('title', 'Product List')
@section('content')

    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <!-- Table header -->
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">MANUFACTURER</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">CREATED DATE</th>
                                <th scope="col">UPDATED DATE</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Display product data -->
                            @forelse($data as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td class="tm-product-name">{{$d->name}}</td>
                                    <td>{{$d->price}}</td>
                                    <td>{{$d->size}}</td>
                                    <td>{{$d->manufacturer}}</td>
                                    <td>{{$d->stock}}</td>
                                    <td>{{$d->created_date}}</td>
                                    <td>{{$d->updated_date}}</td>
                                    <td>
                                        <a href="/admin/product/edit/{{$d->id}}" class="tm-product-edit-link">
                                            <i class="fas fa-pencil-alt tm-product-edit-icon fa-inverse"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form id="deleteForm{{$d->id}}" action="{{ route('admin.product.destroy', ['id' => $d->id]) }}" method="POST" class="tm-delete-product-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="tm-product-delete-link" onclick="confirmDelete({{$d->id}})">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center" style="font-size: 15px; font-weight: bold">
                                        No product found
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Display pagination links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $data->onEachSide(1)->links() }}
                    </div>

                    <!-- Action buttons -->
                    <div>
                        <a href="/admin/product/create" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
                        <a href="/admin/product/removedList" class="btn btn-primary btn-block text-uppercase mb-3">Recover product</a>
                    </div>
                </div>
            </div>

            <!-- JavaScript function to confirm product deletion -->
            <script>
                function confirmDelete(id) {
                    if (confirm('Are you sure you want to delete this product?')) {
                        document.getElementById('deleteForm'+id).submit();
                    }
                }
            </script>
@endsection
