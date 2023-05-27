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
                    <h3 class="nk-block-title page-title">Category Management</h3>
                </div>
                @if(session()->has('message'))
                <p>{{ session()->get('message') }}</p>
                @endif
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="more-options">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal" href="#category-add" id="add-category-btn"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover data-table">
            <thead>
                <tr>
                    <th width="10px">SN</th>
                    <th>Category Name</th>
                    <th width="30px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Add category modal -->
<div class="modal fade" role="dialog" id="category-add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Create New Category</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="student-info">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <div class="form-group"><label class="form-label" for="display-name">Name</label><input type="text" class="form-control" name="display-name" id="display-name" placeholder="Category name" required='required' /></div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li><a href="#" id="add-category" class="btn btn-primary">Add</a></li>
                                    <li><a href="#" class="link link-light" data-bs-dismiss="modal">Cancel</a></li>
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
            ajax: "{{ route('categories.list') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
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
                            '<li><a href="#" class="delete-btn" data-id="' + row.id + '"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>' +
                            '</ul>' + '</div>' + '</div>';
                    }
                },
            ]
        });

    });

    $(document).ready(function() {
        $('#add-category').click(function() {
            var name = $('#display-name').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/categories/store',
                type: 'POST',
                data: {
                    name: name
                },
                success: function(response) {
                    console.log(response);
                    $('#category-add').modal('hide');
                    window.location.replace("{{ route('categories.list') }}");
                }
            });
        });
    });

    $(document).on('click', '.delete-btn', function(event) {
            event.preventDefault();
            var categoryId = $(this).data('id');
            var deleteUrl = "{{ route('categories.delete', ':id') }}".replace(':id', categoryId);
            if (confirm('Are you sure you want to delete this category?')) {
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
</script>