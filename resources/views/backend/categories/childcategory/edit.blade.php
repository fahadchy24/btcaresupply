@extends('layouts.admin_app')

@section('title', 'Edit Child Category')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Categories</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('child.category') }}">Child Category</a></li>
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
    <div class="row">
        <div class="col-xl-12">
            <!-- Add Category -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Child Category</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('update-childcategory', $editChildCategory->id) }}" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">ChildCategory Name*</label>
                            <input type="text" class="form-control" name="childcategory_name" value="{{ $editChildCategory->childcategory_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="childcategory_url" value="{{ $editChildCategory->childcategory_url }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="CategoryName">SubCategory Name</label>
                            <select class="form-control" name="subcategory_id" id="CategoryName">
                                <option disabled="" selected="">Select a category</option>
                                @foreach($subcategories as $row)
                                <option {{$row->id == $editChildCategory->subcategory_id ? 'selected' : '' }} value="{{$row->id}}">{{$row->subcategory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="humbnail_Image">Thumbnail Image &nbsp;<small>(Default size:210x270px)</small></label>
                                <input type="file" name="thumbnail_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <img src="{{ $editChildCategory->thumbnail_image }}" style="width:200;height:150px;">
                                <input type="hidden" name="old_thumbnail" value="{{ $editChildCategory->thumbnail_image }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Cover_Image">Cover Image &nbsp;<small>(Default size:210x270px)</small></label>
                                <input type="file" name="cover_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <img src="{{ $editChildCategory->cover_image }}" style="width:200px;height:150px;">
                                <input type="hidden" name="old_cover" value="{{ $editChildCategory->cover_image }}">
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input checked" id="customCheck1" type="checkbox" name="status" value="1" @if($editChildCategory->status ==1) checked @endif>
                            <label class="custom-control-label" for="customCheck1">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush