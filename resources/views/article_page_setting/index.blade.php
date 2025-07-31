@push('scripts')
@endpush

<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Article Page Setting</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Form Set Link Youtube --}}
                        <form action="{{ route('article_page_setting.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $articlePageSettings->title ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Sub title</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') ?? $articlePageSettings->subtitle ?? '' }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
