<x-app-layout :assets="$assets ?? []">
    <div>
        <?php
        $id = $id ?? null;
        ?>
        @if (isset($id))
            {!! Form::model($data, [
                'route' => ['home_setting.update', $id],
                'method' => 'patch',
                'enctype' => 'multipart/form-data',
            ]) !!}
        @else
            {!! Form::open(['route' => ['home_setting.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Info Company</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="company_name">Company Name:</label>
                                    {{ Form::text('company_name', old('company_name') ?? $homeSetting->company_name ?? null, ['class' => 'form-control', 'placeholder' => 'PT SRC Indonesia Sembilan']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="company_email">Company Email:</label>
                                    {{ Form::email('company_email', old('company_email') ?? $homeSetting->company_email ?? null, ['class' => 'form-control', 'placeholder' => 'company@gmail.com']) }}
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="company_description">Company Description:</label>
                                    {{ Form::textarea('company_description', old('company_description') ?? $homeSetting->company_description ?? null, ['class' => 'form-control', 'placeholder' => '....', 'rows' => 3]) }}
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="company_address">Company Address:</label>
                                    {{ Form::textarea('company_address', old('company_address') ?? $homeSetting->company_address ?? null, ['class' => 'form-control', 'placeholder' => 'Jl. Raya Kencana Kencana']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="company_phone">Company Phone:</label>
                                    {{ Form::text('company_phone', old('company_phone') ?? $homeSetting->company_phone ?? null, ['class' => 'form-control', 'placeholder' => '08123456789']) }}
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="whatsapp">Whatsapp:</label>
                                    {{ Form::text('whatsapp', old('whatsapp') ?? $homeSetting->whatsapp ?? null, ['class' => 'form-control', 'placeholder' => '08123456789']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="facebook">Facebook:</label>
                                    {{ Form::text('facebook', old('facebook') ?? $homeSetting->facebook ?? null, ['class' => 'form-control', 'placeholder' => 'https://www.facebook.com/']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="instagram">Instagram:</label>
                                    {{ Form::text('instagram', old('instagram') ?? $homeSetting->instagram ?? null, ['class' => 'form-control', 'placeholder' => 'https://www.instagram.com/']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="twitter">Twitter:</label>
                                    {{ Form::text('twitter', old('twitter') ?? $homeSetting->twitter ?? null, ['class' => 'form-control', 'placeholder' => 'https://twitter.com/']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="linkedin">LinkedIn:</label>
                                    {{ Form::text('linkedin', old('linkedin') ?? $homeSetting->linkedin ?? null, ['class' => 'form-control', 'placeholder' => 'https://www.linkedin.com/']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="youtube">YouTube:</label>
                                    {{ Form::text('youtube', old('youtube') ?? $homeSetting->youtube ?? null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="latitude">Latitude:</label>
                                    {{ Form::text('latitude', old('latitude') ?? $homeSetting->latitude ?? null, ['class' => 'form-control', 'placeholder' => '-6.2088']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="longitude">Longitude:</label>
                                    {{ Form::text('longitude', old('longitude') ?? $homeSetting->longitude ?? null, ['class' => 'form-control', 'placeholder' => '106.8456']) }}
                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="logo">Logo:</label>
                                        {{-- Show Logo --}}
                                        @if (isset($homeSetting->logo))
                                            <p><img src="{{ asset($homeSetting->logo) }}" alt="Logo" class="img-fluid block" width="100"></p>
                                        @endif

                                        {{ Form::file('logo', ['class' => 'form-control']) }}
                                        <small class="text-danger">*For Change Only</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="favicon">Favicon:</label>
                                        {{-- Show Favicon --}}
                                        @if (isset($homeSetting->favicon))
                                            <p><img src="{{ asset($homeSetting->favicon) }}" alt="Favicon" class="img-fluid block" width="100"></p>
                                        @endif
                                        {{ Form::file('favicon', ['class' => 'form-control']) }}
                                        <small class="text-danger">*For Change Only</small>
                                    </div>
                                </div>

                            </div>
                            {{-- <button type="submit"
                                class="btn btn-primary">{{ $id !== null ? 'Save' : 'Save' }}</button> --}}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Section 1</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_1_title">Title:</label>
                                    {{ Form::text('section_1_title', old('section_1_title') ?? $homeSetting->section_1_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 1 Title']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_1_sub_title">Sub Title:</label>
                                    {{ Form::text('section_1_sub_title', old('section_1_sub_title') ?? $homeSetting->section_1_sub_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 1 Sub Title']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="section_1_description">Description:</label>
                                    {{ Form::textarea('section_1_description', old('section_1_description') ?? $homeSetting->section_1_description ?? null, ['class' => 'form-control', 'placeholder' => '....', 'rows' => 3]) }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h4 class="mb-3">Slider</h4>
                            <button type="button" class="btn btn-sm btn-primary" id="add-image">+ Tambah Gambar</button>
                        </div>
                        <div class="image-wrapper">
                            @if ($homeSetting)
                                @foreach ($homeSetting->homeSliders as $slider)
                                    <img src="{{ asset($slider->getFirstMediaUrl('section_1_images')) }}" alt="Slider" class="img-fluid block mb-2" width="100">
                                    <div class="row image-group">
                                        <div class="form-group col-md-10">
                                            <input type="file" name="section_1_images[]" class="form-control" accept="image/*">
                                        </div>
                                        <div class="form-group col-md-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger remove-image">Hapus</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Section 2</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_2_title">Title:</label>
                                    {{ Form::text('section_2_title', old('section_2_title') ?? $homeSetting->section_2_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 2 Title']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_2_sub_title">Sub Title:</label>
                                    {{ Form::text('section_2_sub_title', old('section_2_sub_title') ?? $homeSetting->section_2_sub_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 2 Sub Title']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="section_2_banner">Banner:</label>
                                    @if ($homeSetting && $homeSetting->getFirstMediaUrl('section_2_banner'))
                                        <p> <img src="{{ $homeSetting->getFirstMediaUrl('section_2_banner') }}" alt="Section 2 Banner" width="100" class="mb-2"></p>
                                    @endif
                                    {{ Form::file('section_2_banner', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Section 3</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="video_1">Video 1:</label>
                                    {{ Form::file('video_1', ['class' => 'form-control']) }}
                                    <small class="text-danger">*For Change Only</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="registered_shop">Registered Shop:</label>
                                    {{ Form::number('registered_shop', old('registered_shop') ?? $homeSetting->registered_shop ?? null, ['class' => 'form-control', 'placeholder' => 'Registered Shop']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="wholesale_partners">Wholesale Partners:</label>
                                    {{ Form::number('wholesale_partners', old('wholesale_partners') ?? $homeSetting->wholesale_partners ?? null, ['class' => 'form-control', 'placeholder' => 'Wholesale Partners']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="paguyuban_src">Paguyuban SRC:</label>
                                    {{ Form::number('paguyuban_src', old('paguyuban_src') ?? $homeSetting->paguyuban_src ?? null, ['class' => 'form-control', 'placeholder' => 'Paguyuban SRC']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="bumn_partner">BUMN Partner:</label>
                                    {{ Form::number('bumn_partner', old('bumn_partner') ?? $homeSetting->bumn_partner ?? null, ['class' => 'form-control', 'placeholder' => 'BUMN Partner']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="total_province">Total Province:</label>
                                    {{ Form::number('total_province', old('total_province') ?? $homeSetting->total_province ?? null, ['class' => 'form-control', 'placeholder' => 'Total Province']) }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Section 4</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_4_title">Title:</label>
                                    {{ Form::text('section_4_title', old('section_4_title') ?? $homeSetting->section_4_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 4 Title']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_4_sub_title">Sub Title:</label>
                                    {{ Form::text('section_4_sub_title', old('section_4_sub_title') ?? $homeSetting->section_4_sub_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 4 Sub Title']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="section_4_banner">Banner:</label>
                                    @if ($homeSetting && $homeSetting->getFirstMediaUrl('section_4_banner'))
                                        <p> <img src="{{ $homeSetting->getFirstMediaUrl('section_4_banner') }}" alt="Section 4 Banner" width="100" class="mb-2"></p>
                                    @endif
                                    {{ Form::file('section_4_banner', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="image-wrapper">
                            <button type="button" class="btn btn-sm btn-primary mb-3" id="add-block">+ Tambah</button>
                            <div id="dynamic-blocks">
                                <div class="row dynamic-group mb-3">
                                    @if ($homeSetting)
                                        @foreach ($homeSetting->homeSection4s as $index => $section4)
                                            <div class="form-group col-md-4">
                                                <label class="form-label fw-bold">Title:</label>
                                                <input type="text" name="section_4_blocks[{{ $index }}][title]" value="{{ old('section_4_blocks.0.title') ?? $section4->title ?? null }}" class="form-control" placeholder="Title">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label fw-bold">Sub Title:</label>
                                                <input type="text" name="section_4_blocks[{{ $index }}][subtitle]" value="{{ old('section_4_blocks.0.subtitle') ?? $section4->subtitle ?? null }}" class="form-control" placeholder="Sub Title">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label fw-bold">File:</label>
                                                <input type="file" name="section_4_blocks[{{ $index }}][file]" class="form-control" accept="image/*">
                                            </div>
                                            <div class="form-group col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-block">X</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Section 5</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_5_title">Title:</label>
                                    {{ Form::text('section_5_title', old('section_5_title') ?? $homeSetting->section_5_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 5 Title']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="section_5_sub_title">Sub Title:</label>
                                    {{ Form::text('section_5_sub_title', old('section_5_sub_title') ?? $homeSetting->section_5_sub_title ?? null, ['class' => 'form-control', 'placeholder' => 'Section 5 Sub Title']) }}
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-primary">{{ $id !== null ? 'Save' : 'Save' }}</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</x-app-layout>

