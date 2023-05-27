@extends('layouts.app')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


<style>
    .data-table {
        border-collapse: collapse;
        width: 100%;
    }

    .data-table th,
    .data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .data-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .data-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .data-table tbody tr:hover {
        background-color: #ddd;
    }

    .data-table .toggle {
        appearance: none;
        width: 48px;
        height: 24px;
        background-color: #ddd;
        border-radius: 12px;
        position: relative;
        cursor: pointer;
    }

    .data-table .toggle:before {
        content: "";
        display: block;
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background-color: #fff;
        border-radius: 10px;
        transition: transform 0.2s ease;
    }

    .data-table .toggle:checked:before {
        transform: translateX(24px);
    }

    .data-table .toggle:checked {
        background-color: #42b983;
    }

    .data-table .toggle:focus {
        outline: none;
    }
</style>

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="nk-content-inner">
    <div class="nk-content-body">

        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Product Management</h3>
                </div>
                @if(session()->has('message'))
                <p>{{ session()->get('message') }}</p>
                @endif
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="more-options">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="#"><span>Active</span></a>
                                                </li>
                                                <li>
                                                    <a href="#"><span>Inactive</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="nk-block-tools-opt">
                                    <a class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal" href="#product-add"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table data-table" style='background-color: white;'>
            <thead>
                <tr>
                    <th width="10px">SN</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th width="50px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- Add product modal -->
<div class="modal fade" role="dialog" id="product-add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="title">Add Product</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="student-info">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="category">Category Name</label>
                                        <select name="category" class="form-control" id="category" name="category">
                                            <option value="">Select</option>
                                            @foreach($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group"><label class="form-label" for="name">Product Name</label><input type="text" class="form-control" id="name" name="name" placeholder="Product name" required /></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="price">Price</label><input type="text" class="form-control" id="price" name="price" placeholder="Price" required /></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="phone-no">Image</label>
                                        <div class="form-group"><input type="file" class="form-control" id="image" name="image" /></div>
                                        <img src="" id="current-icon" alt="Current Icon" width="50" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><button type="submit" id="add-product" class="btn btn-primary">Add</a></li>
                                        <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update product modal -->
<div class="modal fade" role="dialog" id="product-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                @csrf
                <h5 class="title">Edit Product</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="student-info">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group"><label class="form-label" for="category">Category Name</label>
                                    <select name="category_id" class="form-control" id="category_id" required>
                                        <option value="">Select</option>
                                        @foreach($categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group"><label class="form-label" for="name">Product Name</label><input type="text" class="form-control" id="edit-name" name="edit-name" placeholder="Product name" required /></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label class="form-label" for="price">Price</label><input type="number" class="form-control" id="edit-price" name="edit-price" placeholder="Price" required /></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-image">Upload Icon</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="edit-image" name="edit-image" onchange="previewImage(event)" />
                                        <div id="edit-image-preview" class="input-group-append"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li><button type="submit" id="update-product" class="btn btn-primary">Update</a></li>
                                    <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.list') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'category.name',
                    name: 'category_id'
                },

                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<div class="dropdown">' +
                            '<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>' +
                            '<div class="dropdown-menu dropdown-menu-end">' +
                            '<ul class="link-list-opt no-bdr">' +
                            '<li><a href="#" class="edit-btn" data-id="' + row.id + '" data-name="' + row.name + '"  data-category_id="' + row.category_id + '" data-price="' + row.price + '" ><em class="icon ni ni-pen"></em><span>Edit</span></a></li>' +
                            '<li><a href="#" class="delete-btn" data-id="' + row.id + '"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>' +
                            '</ul>' + '</div>' + '</div>';
                    }
                },
            ]
        });

    });

    $(document).on('click', '.edit-btn', function() {
        var productId = $(this).data('id');
        var category_id = $(this).data('category_id');
        $('#edit-name').val($(this).data('name'));
        $('#edit-price').val($(this).data('price'));
        $('#category_id').val(category_id);
        var imageSrc = $(this).data('image');
        var imagePreview = '<img src="' + imageSrc + '" alt="Image" width="50">';
        $('#edit-image-preview').html(imagePreview);
        $('#update-product').data('id', productId);
        $('#product-edit').modal('show');
    });

    $(function() {
        var editModal = $('#product-edit');
        var updateBtn = $('#update-product');
        updateBtn.click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var formData = new FormData();
            formData.append('category_id', $('#category_id').val());
            formData.append('edit-name', $('#edit-name').val());
            formData.append('edit-price', $('#edit-price').val());
            var fileInput = $('#edit-image')[0].files[0];
            if (fileInput) {
                formData.append('edit-image', fileInput);
            }
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '/products/update/' + id,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    editModal.modal('hide');
                    $('.data-table').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error updating product: ' + error);
                }
            });
        });
    });

    $(document).on('click', '.delete-btn', function(event) {
        event.preventDefault();
        var productId = $(this).data('id');
        var deleteUrl = "{{ route('products.delete', ':id') }}".replace(':id', productId);
        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: deleteUrl,
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('.data-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = '<img src="' + reader.result + '" alt="Image" width="50">';
            $('#edit-image-preview').html(imagePreview);
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>