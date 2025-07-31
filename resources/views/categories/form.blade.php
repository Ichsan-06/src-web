<x-app-layout :assets="$assets ?? []">
    <form action="{{ isset($id) ? route('categories.update', $id) : route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($id))
            @method('PATCH')
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($id) ? 'Update' : 'New' }} Category Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="name">Name: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $data->name ?? '') }}" placeholder="Name" required>
                                </div>
                            </div>
                            <button type="button"
                                onclick="window.location.href='{{ isset($id) ? route('categories.index') : route('dashboard') }}'"
                                class="btn btn-primary">
                                {{ isset($id) ? 'Cancel' : 'Cancel' }}
                            </button>
                            <button type="submit"
                                class="btn btn-primary">{{ isset($id) ? 'Save' : 'Save' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
