<x-app-layout :assets="$assets ?? []">
    <form action="{{ isset($id) ? route('article.update', $id) : route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($id))
            @method('PATCH')
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ isset($id) ? 'Update' : 'New' }} Article Information</h4>
                </div>
                <div class="card-action">
                    <a href="{{ route('article.index') }}" class="btn btn-primary" role="button">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label fw-bold" for="title">Title: <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $data->title ?? '' }}" placeholder="Title" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label fw-bold" for="content">Content: <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" placeholder="Content" required>{{ old('content') ?? $data->content ?? '' }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label fw-bold" for="category_id">Category: <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}" {{ isset($id) && (old('category_id') == $item->id || $data->category_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label fw-bold" for="file">File: <span class="text-danger">*</span></label>
                            @if (isset($id))
                                <p><img src="{{ $data->getFirstMediaUrl('image') }}" alt="{{ $data->title }}" width="100"></p>
                            @endif
                            <input type="file" name="file" class="form-control" placeholder="File" {{ isset($id) ? '' : 'required' }}>
                            @if (isset($id))
                                <span class="text-muted">* File is not required if you don't want to change it</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label fw-bold" for="tags">Tags: <span class="text-danger">*</span></label>
                            <input type="text" name="tags" class="form-control" value="{{ old('tags') ?? $data->tags_name ?? '' }}" placeholder="Masukkan tag" required>
                        </div>
                    </div>
                    <button type="button"
                        onclick="window.location.href='{{ isset($id) ? route('article.index') : route('dashboard') }}'"
                        class="btn btn-primary ">
                        {{ isset($id) ? 'Cancel' : 'Cancel' }}
                    </button>
                    <button type="submit"
                        class="btn btn-primary">{{ isset($id) ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
