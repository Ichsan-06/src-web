<x-app-layout :assets="$assets ?? []">
    <form action="{{ isset($id) ? route('products.update', $id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($id))
            @method('PATCH')
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ isset($id) ? 'Update' : 'New' }} Product Information</h4>
                </div>
                <div class="card-action">
                    <a href="{{ route('products.index') }}" class="btn btn-primary" role="button">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label fw-bold" for="name">Name: <span
                                class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $data->name ?? '') }}" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label fw-bold" for="image">Image: <span
                                class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label fw-bold" for="price">Price: <span
                                class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $data->price ?? '') }}" placeholder="Price" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label fw-bold" for="category_id">Category: <span
                                class="text-danger">*</span></label>
                        <select name="category_id" class="form-control" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ isset($id) && (old('category_id') == $item->id || $data->category_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label fw-bold" for="unit_type">Unit Type: <span
                                class="text-danger">*</span></label>
                        <select name="unit_type" class="form-control" required>
                            <option value="" disabled selected>Select Unit Type</option>
                            <option value="pcs" {{ isset($id) && (old('unit_type') == 'pcs' || $data->unit_type == 'pcs') ? 'selected' : '' }}>Pcs</option>
                            <option value="kg" {{ isset($id) && (old('unit_type') == 'kg' || $data->unit_type == 'kg') ? 'selected' : '' }}>Kg</option>
                            <option value="ltr" {{ isset($id) && (old('unit_type') == 'ltr' || $data->unit_type == 'ltr') ? 'selected' : '' }}>Ltr</option>
                        </select>
                    </div>
                </div>
                <button type="button"
                    onclick="window.location.href='{{ isset($id) ? route('products.index') : route('dashboard') }}'"
                    class="btn btn-primary ">
                    {{ isset($id) ? 'Cancel' : 'Cancel' }}
                </button>
                <button type="submit"
                    class="btn btn-primary">{{ isset($id) ? 'Save' : 'Save' }}</button>
            </div>
        </div>
    </form>
</x-app-layout>
