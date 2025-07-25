<x-app-layout :assets="$assets ?? []">
    <div>
        <?php
        $id = $id ?? null;
        ?>
        @if (isset($id))
            {!! Form::model($data, [
                'route' => ['banners.update', $id],
                'method' => 'patch',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open(['route' => ['banners.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id !== null ? 'Update' : 'New' }} Banner Information</h4>
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
                                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title', 'required']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="file">File: <span
                                            class="text-danger">*</span></label>
                                    {{ Form::file('file', ['class' => 'form-control', 'placeholder' => 'File', 'required']) }}
                                </div>
                            </div>
                            <button
                                onclick="window.location.href='{{ $id !== null ? route('banners.index') : route('dashboard') }}'"
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
