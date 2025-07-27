<x-app-layout :assets="$assets ?? []">
    <div>
        <?php
        $id = $id ?? null;
        ?>
        @if (isset($id))
            {!! Form::model($data, [
                'route' => ['products.update', $id],
                'method' => 'patch',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open(['route' => ['products.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id !== null ? 'Update' : 'New' }} Product Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('products.index') }}" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="name">Name: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="image">Image: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image', 'required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="price">Price: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Price', 'required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="category_id">Category: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::select('category_id', $categories->pluck('name', 'id'), old('category_id'), ['class' => 'form-control', 'placeholder' => 'Select Category', 'required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="unit_type">Unit Type: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::select('unit_type', ['pcs' => 'Pcs', 'kg' => 'Kg', 'ltr' => 'Ltr'], old('unit_type'), ['class' => 'form-control', 'placeholder' => 'Select Unit Type', 'required']) }}
                                </div>
                            </div>
                            <button
                                onclick="window.location.href='{{ $id !== null ? route('categories.index') : route('dashboard') }}'"
                                class="btn btn-primary ">
                                {{ $id !== null ? 'Cancel' : 'Cancel' }}
                            </button>
                            <button type="submit"
                                class="btn btn-primary">{{ $id !== null ? 'Save' : 'Save' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</x-app-layout>
