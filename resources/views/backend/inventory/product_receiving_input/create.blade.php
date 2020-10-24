@extends('layouts.admin_app')

@section('title', 'Add Received Product')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('product-receive.index')}}">Product Receiving Input</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('product-receive.create')}}">Add New</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<!-- Start Main Content -->
<div class="container-fluid mt--6">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Add Slider -->
        <div class="col-12">
            <div class="col">
                <div class="card-wrapper">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Add Received Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product-receive.store') }}" method="POST">
                            @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="form-control-label" for="receive_date">Receiving Date</label>
                                    <input type="text" class="form-control datepicker" id="receive_date" name="receive_date" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="vendor_id">Vendor Name</label>
                                    <select name="vendor_id" id="vendor_id" class="form-control" data-toggle="select">
                                            <option selected disabled>Select Vendor</option>
                                        @foreach ($vendors as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tracking_number">BOL/Tracking Number</label>
                                    <input type="text" class="form-control @error('tracking_number') is-invalid @enderror" id="phone" name="tracking_number" autocomplete="off" required>
                                    @error('tracking_number')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="sku">SKU</label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku">
                                    @error('sku')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="product_name">Product Name</label>
                                    <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="product_name">
                                    @error('product_name')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="quantity">Quantity</label>
                                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" autocomplete="off">
                                    @error('quantity')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="cost">Cost</label>
                                    <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" id="cost" autocomplete="off">
                                    @error('cost')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
@endsection

@push('scripts')

<script>
    $(function () {
        $('#sku').autocomplete({
            source:function(request,response){
             
                $.getJSON('?term='+request.term,function(data){
                     var array = $.map(data,function(row){
                         return {
                             value:row.sku,
                             label:row.product_name,
                             product_name:row.product_name
                         }
                     })

                     response($.ui.autocomplete.filter(array,request.term));
                })
            },
            minLength:1,
            delay:500,
            select:function(event,ui){
                $('#product_name').val(ui.item.product_name)
            }
        })
})
</script>

@endpush