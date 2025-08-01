<!-- Show Service Type Details -->
@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Service Type Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Service Types</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="mb-1">Name:</h5>
                                <p class="text-muted">{{ $serviceType->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-1">Description:</h5>
                                <p class="text-muted">{{ $serviceType->description }}</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('service-types.edit', $serviceType->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('service-types.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
