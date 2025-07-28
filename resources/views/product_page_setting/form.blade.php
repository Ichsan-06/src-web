<x-app-layout :assets="$assets ?? []">
    <div>
        <?php
        $id = $id ?? null;
        ?>
        @if (isset($id))
            {!! Form::model($data, [
                'route' => ['product_page_setting.update', $id],
                'method' => 'patch',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open(['route' => ['product_page_setting.add-benefit'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id !== null ? 'Update' : 'New' }} Benefit Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('product_page_setting.index') }}" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="title">Title: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::text('title', old('title') ?? $data->title ?? '', ['class' => 'form-control', 'placeholder' => 'Title', 'required']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="description">Description: <span
                                            class="text-danger">*</span></label>
                                    <textarea id="mytextarea" name="description">{{ old('description') ?? $data->description ?? '' }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="file">File: <span class="text-danger">*</span></label>
                                    {{-- IMG --}}
                                    @if ($id !== null)
                                        <p><img src="{{ asset($data->getFirstMediaUrl('image')) }}" alt="" width="100"></p>
                                        {{ Form::file('file', ['class' => 'form-control', 'placeholder' => 'File', 'nullable' => true]) }}
                                    @else
                                        {{ Form::file('file', ['class' => 'form-control', 'placeholder' => 'File', 'nullable' => true]) }}
                                    @endif
                                    <span class="text-muted">* File is not required if you don't want to change it</span>
                                </div>
                            </div>
                            <button
                                onclick="window.location.href='{{ $id !== null ? route('product_page_setting.index') : route('dashboard') }}'"
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
