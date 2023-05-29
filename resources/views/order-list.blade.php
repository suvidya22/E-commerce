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
                    <h3 class="nk-block-title page-title">Orders</h3>
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
                                    <a class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal" href="#order-add" id="add-order-btn"><em class="icon ni ni-cart"></em><span>Order Now!</span></a>
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
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Net Amount</th>
                    <th>Order Date</th>
                    <th width="30px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Add order modal -->
<div class="modal fade" role="dialog" id="order-add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <h5 class="title">New Order</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="student-info">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="display-name">Customer Name</label><input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer name" required='required' /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="display-name">Phone</label><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required='required' /></div>
                                </div>
                                <div class="col-md-10">
                                    <label class="form-label" for="category">Select Product</label>
                                    <select name="product" class="form-control" id="product">
                                        <option value="">Select</option>
                                        @foreach($products as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group"><label class="form-label" for="display-name">Quantity</label><input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity" required='required' /></div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><a href="#" id="add-order" class="btn btn-primary">Add Product</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div id="order-items-container"></div>
                            <div class="text-right">
                                <ul class=" flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li><button type="submit" class="btn btn-primary" id="save-order">Place Order</a></li>
                                    <li><a href="#" class="link link-light" data-bs-dismiss="modal">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!--- invoice ---->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailsModalLabel">Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" border="1">
                    <tbody>
                        <tr>
                            <td>Order ID:</td>
                            <td><span id="order-id"></span></td>
                        </tr>
                        <tr>
                            <td>Customer Name:</td>
                            <td><span id="customer-name"></span></td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td><span id="price"></span></td>
                        </tr>
                    </tbody>
                </table>
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
            ajax: "{{ route('orders.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'order_id',
                    name: 'order_id'
                },
                {
                    data: 'customer_name',
                    name: 'customer_name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        var date = new Date(data);
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();
                        var formattedDate = day + '-' + month + '-' + year;
                        return formattedDate;
                    }
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
                            '<li><a href="#" class="edit-btn" data-id="' + row.id + '" data-order_id="' + row.order_id + '" data-name="' + row.customer_name + '" data-name="' + row.phone + '" data-amount="' + row.price + '" data-created_at="' + row.created_at + '"><em class="icon ni ni-pen"></em><span>Edit</span></a></li>' +
                            '<li><a href="#" class="delete-btn" data-id="' + row.id + '"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>' +
                            '<li><a href="#" class="invoice-btn" data-id="' + row.id + '" data-order_id="' + row.order_id + '" data-price="' + row.price + '" ><em class="icon ni ni-trash"></em><span>Invoice</span></a></li>'
                            '</ul>' +
                            '</div>' +
                            '</div>';
                    }
                },
            ]
        });

        $('#add-order').click(function() {
            var product = $('#product').val();
            var quantity = $('#quantity').val();
            var productName = $('#product option:selected').text();
            if (product && quantity) {
                var orderItemRow = `
                    <div class="order-item-row row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="product-name-${product}">${productName}</label>
                                <input type="hidden" name="product[]" value="${product}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label" for="quantity-${product}">Quantity</label>
                                <input type="number" class="form-control" name="quantity[]" id="quantity-${product}" value="${quantity}" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li><a href="#" class="remove-order-item btn btn-danger" data-product="${product}">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                `;
                $('#order-items-container').append(orderItemRow);

                $('#product').val('');
                $('#quantity').val('');
            }
        });

        $(document).on('click', '.remove-order-item', function() {
            var product = $(this).data('product');
            $(this).closest('.order-item-row').remove();
        });
    });

    $(document).on('click', '.invoice-btn', function(event) {
    event.preventDefault();
    var orderId = $(this).data('order_id');
    var customerName = $(this).data('name');
    var phone = $(this).data('phone');
    var price = $(this).data('price');
    var createdAt = $(this).data('created_at');

    $('#orderDetailsModal').find('.modal-body #order-id').text(orderId);
    $('#orderDetailsModal').find('.modal-body #customer-name').text(customerName);
    $('#orderDetailsModal').find('.modal-body #phone').text(phone);
    $('#orderDetailsModal').find('.modal-body #price').text(price);
    $('#orderDetailsModal').find('.modal-body #created-at').text(createdAt);

    $('#orderDetailsModal').modal('show');
});


    $(document).on('click', '.delete-btn', function(event) {
        event.preventDefault();
        var orderId = $(this).data('id');
        var deleteUrl = "{{ route('orders.delete', ':id') }}".replace(':id', orderId);
        if (confirm('Are you sure you want to delete this Order?')) {
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