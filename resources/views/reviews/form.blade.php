<x-app-layout :assets="$assets ?? []">
    <div>
        <?php
        $id = $id ?? null;
        ?>
        @if (isset($id))
            {!! Form::model($data, [
                'route' => ['review.update', $id],
                'method' => 'patch',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open(['route' => ['review.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id !== null ? 'Update' : 'New' }} Review Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('review.index') }}" class="btn btn-primary" role="button">Back</a>
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
                                    <label class="form-label fw-bold" for="title">Sub title: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::text('sub_title', old('sub_title') ?? $data->sub_title ?? '', ['class' => 'form-control', 'placeholder' => 'Sub title', 'required']) }}
                                </div>

                                {{-- Description --}}
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="description">Description: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::textarea('description', old('description') ?? $data->description ?? '', ['class' => 'form-control', 'placeholder' => 'Description', 'required']) }}
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="file">File: <span
                                            class="text-danger">*</span></label>

                                    @if (isset($id))
                                        <p><img src="{{ $data->image }}" alt="{{ $data->title }}" width="100" class="img-fluid"></p>
                                    @endif
                                    {{ Form::file('file', ['class' => 'form-control', 'placeholder' => 'File', 'required']) }}

                                    @if (isset($id))
                                        <span class="text-muted">* File is not required if you don't want to change it</span>
                                    @endif
                                </div>
                            </div>
                            <button
                                onclick="window.location.href='{{ $id !== null ? route('review.index') : route('dashboard') }}'"
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
