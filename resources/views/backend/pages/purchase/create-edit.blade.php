@extends('backend.layouts.admin-app')



@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Purchase</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ @$editData ? 'Edit' : 'Add new' }}

                </li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">
                    {{ @$editData ? 'Edit Purchase Form' : 'Create Purchase Form' }}
                </h1>

            </div>
            <div>
                <a href="{{ route('purchase.index') }}" class="btn btn-outline-info"><i class="fa fa-list me-1"></i> View
                    All</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" name="date" id="date" class="form-control"
                                        placeholder="MM/DD/YYYY">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block"
                                            style="border-top-left-radius: unset; border-bottom-left-radius: unset;">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    @error('date')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="purchase_no">Purchase no <span class="text-danger">*</span></label>
                                <input type="text" name="purchase_no" class="form-control" id="purchase_no"
                                    placeholder="Enter purchase no">
                                @error('purchase_no')
                                    <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                                <select class="form-control" name="supplier_id" id="supplier_id">
                                    <option value="">Select..</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ @$editData && $supplier->id == $editData->supplier_id ? 'selected' : '' }}>
                                            {{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="category_id">Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" id="category_id">

                                </select>
                                @error('category_id')
                                    <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="product_id">Product Name <span class="text-danger">*</span></label>
                                <select class="form-control" name="product_id" id="product_id">

                                </select>
                                @error('product_id')
                                    <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group pt-2">
                                <button class="btn btn-success addeventmore mt-4 text-white">
                                    <i class="fa fa-plus"></i>
                                    Add Item</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Card Body --}}
                {{-- Start Card Body --}}
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ @$editData ? route('purchase.update', $editData->id) : route('purchase.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @if (@$editData)
                            @csrf
                            @method('PUT')
                        @else
                            @csrf
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Categoy</th>
                                        <th scope="col">Product name</th>
                                        <th scope="col">Pcs/Kg</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="addrow" class="addrow">
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>
                                            <input type="text" name="estimated_amount" value="0"
                                                id="estimated_amount"
                                                class="form-control form-control-sm text-end estimated_amount bg-success"
                                                readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton">Purchase Store</button>
                        </div>

                    </form>
                    <!-- End of Form -->
                </div>
                {{-- End Card Body --}}
            </div>
        </div>
    </div>
    <x-flash />
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{ date }}" />
        <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}" />
        <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}" />

        <td><input type="hidden" name="category_id[]" value="@{{ category_id }}">
            @{{ category_name }}
        </td>
        <td><input type="hidden" name="product_id[]" value="@{{ product_id }}">
            @{{ product_name }}
        </td>
        <td><input type="number" min="1" class="form-control form-control-sm text-end buying_qty" name="buying_qty[]" value="1"></td>
        <td><input type="number" min="1" class="form-control form-control-sm text-end unit_price" name="unit_price[]" value=""></td>
        <td><input type="text" class="form-control form-control-sm" name="description[]"></td>
        <td><input class="form-control form-control-sm text-end buying_price" name="buying_price[]" value="0" readonly></td>
        <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>

    </tr>

</script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".addeventmore", function() {
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            var source = $('#document-template').html();
            var template = Handlebars.compile(source);

            var data = {
                date: date,
                purchase_no: purchase_no,
                supplier_id: supplier_id,
                category_id: category_id,
                category_name: category_name,
                product_id: product_id,
                product_name: product_name
            };
            var html = template(data);
            $("#addrow").append(html);
        });
        $(document).on('click', '.removeeventmore', function() {
            $(this).closest('.delete_add_more_item').remove();
            totalAmountPrice();
        });

        $(document).on('keyup click', '.unit_price,.buying_qty', function() {
            var unit_price = $(this).closest('tr').find('input.unit_price').val();
            var qty = $(this).closest('tr').find('input.buying_qty').val();
            var total = unit_price * qty;
            $(this).closest('tr').find('input.buying_price').val(total);
            totalAmountPrice();
        });

        // Calculate Sum of Amount in invoice
        function totalAmountPrice() {
            var sum = 0;
            $('.buying_price').each(function() {
                var value = $(this).val();
                if (!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
                $('#estimated_amount').val(sum);
            });
        }
    });
</script>

<script>
    $(function() {
        $(document).on('change', '#supplier_id', function() {
            var supplier_id = $(this).val();

            $.ajax({
                url: "{{ route('get-category') }}",
                type: "GET",
                data: {
                    supplier_id: supplier_id,
                },
                success: function(data) {
                    var html = '<option value="">Select..</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.category.id + '">' + v
                            .category.name + '</option>';
                    });
                    $('#category_id').html(html);
                }
            });
        });
    });
</script>
<script>
    $(function() {
        $(document).on('change', '#category_id', function() {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('get-product') }}",
                type: "GET",
                data: {
                    category_id: category_id,
                },
                success: function(data) {
                    var html = '<option value="">Select..</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name +
                            '</option>';
                    });
                    $('#product_id').html(html);
                }
            });
        });
    });
</script>
