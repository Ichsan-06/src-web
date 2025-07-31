<x-app-layout :assets="$assets ?? []">
    <form action="{{ isset($id) ? route('review.update', $id) : route('review.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($id))
            @method('patch')
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($id) ? 'Update' : 'New' }} Review Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('review.index') }}" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="title">Title: <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $data->title ?? '') }}" placeholder="Title" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="title">Sub title: <span class="text-danger">*</span></label>
                                    <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title', $data->sub_title ?? '') }}" placeholder="Sub title" required>
                                </div>

                                {{-- Description --}}
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="description">Description: <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" placeholder="Description" required>{{ old('description', $data->description ?? '') }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="file">File: <span class="text-danger">*</span></label>

                                    @if (isset($id))
                                        <p><img src="{{ $data->image }}" alt="{{ $data->title }}" width="100" class="img-fluid"></p>
                                    @endif
                                    <input type="file" name="file" class="form-control" required>

                                    @if (isset($id))
                                        <span class="text-muted">* File is not required if you don't want to change it</span>
                                    @endif
                                </div>
                            </div>
                            <button type="button" onclick="window.location.href='{{ isset($id) ? route('review.index') : route('dashboard') }}'" class="btn btn-primary">
                                {{ isset($id) ? 'Cancel' : 'Cancel' }}
                            </button>
                            <button type="submit" class="btn btn-primary">{{ isset($id) ? 'Save' : 'Save' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
