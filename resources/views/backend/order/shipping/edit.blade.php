@extends('layouts.admin_app')

@section('title', 'Edit Shipping')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Orders</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('shipping-methods.index')}}">Shipping Methods</a></li>
                            <li class="breadcrumb-item active"><a href="#">Edit Shipping Charges</a></li>
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
                            <h3 class="mb-0">Edit Shipping Charges</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('shipping-methods.update', $editShipping->id) }}" method="POST">
                            @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $editShipping->title }}" required>
                                    @error('title')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="price">Shipping Price</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{$editShipping->price}}" required>
                                    @error('price')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tax">Tax</label>
                                    <input type="text" class="form-control @error('tax') is-invalid @enderror" id="tax" name="tax" value="{{$editShipping->tax}}" required>
                                    @error('tax')
                                        <span class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Update</button>
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