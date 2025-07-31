<x-app-layout :assets="$assets ?? []">
    <form action="{{ isset($id) ? route('banners.update', $id) : route('banners.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (isset($id))
            @method('patch')
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($id) ? 'Update' : 'New' }} Banner Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('banners.index') }}" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="title">Title: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $data->title ?? '') }}" placeholder="Title" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="file">File: <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <button type="button" onclick="window.location.href='{{ isset($id) ? route('banners.index') : route('dashboard') }}'" class="btn btn-secondary">
                                {{ isset($id) ? 'Cancel' : 'Cancel' }}
                            </button>
                            <button type="submit"
                                class="btn btn-primary">{{ isset($id) ? 'Update' : 'Save' }}</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
