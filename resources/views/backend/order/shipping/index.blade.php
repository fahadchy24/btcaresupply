@extends('layouts.admin_app')

@section('title', 'Shipping Methods')

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
                            <li class="breadcrumb-item active"><a href="{{route('vendor.index')}}">Shipping Methods</a></li>
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
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 float-left">Shipping Charges List</h3>
                    <a class="btn btn-sm btn-primary float-right" href="{{route('shipping-methods.create')}}">Add New</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl No.</th>
                                <th>Title</th>
                                <th>Shipping price</th>
                                <th>Tax</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $shipping as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->tax}}</td>
                                <td>
                                    <a title="Edit" class="btn btn-sm btn-info" id="edit" href="{{ route('shipping-methods.edit', $row->id) }}"><i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('shipping-methods.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this field?');" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
    <!-- Footer -->
    <footer class="footer pt-0 pl-2">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center text-lg-left text-muted">
                    © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">BTCare</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</div>
<!-- End Main Content -->
@endsection

@push('scripts')

@endpush