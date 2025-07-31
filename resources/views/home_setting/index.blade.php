<x-app-layout :assets="$assets ?? []">
    <div>
        <form action="{{ isset($id) ? route('home_setting.update', $id) : route('home_setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($id))
                @method('PUT')
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
                                        <input type="text" name="company_name" value="{{ old('company_name') ?? $homeSetting->company_name ?? null }}" class="form-control" placeholder="PT SRC Indonesia Sembilan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="company_email">Company Email:</label>
                                        <input type="email" name="company_email" value="{{ old('company_email') ?? $homeSetting->company_email ?? null }}" class="form-control" placeholder="company@gmail.com">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label fw-bold" for="company_description">Company Description:</label>
                                        <textarea name="company_description" class="form-control" placeholder="...." rows="3">{{ old('company_description') ?? $homeSetting->company_description ?? null }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label fw-bold" for="company_address">Company Address:</label>
                                        <textarea name="company_address" class="form-control" placeholder="Jl. Raya Kencana Kencana" rows="3">{{ old('company_address') ?? $homeSetting->company_address ?? null }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="company_phone">Company Phone:</label>
                                        <input type="text" name="company_phone" value="{{ old('company_phone') ?? $homeSetting->company_phone ?? null }}" class="form-control" placeholder="08123456789">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="whatsapp">Whatsapp:</label>
                                        <input type="text" name="whatsapp" value="{{ old('whatsapp') ?? $homeSetting->whatsapp ?? null }}" class="form-control" placeholder="08123456789">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="facebook">Facebook:</label>
                                        <input type="text" name="facebook" value="{{ old('facebook') ?? $homeSetting->facebook ?? null }}" class="form-control" placeholder="https://www.facebook.com/">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="instagram">Instagram:</label>
                                        <input type="text" name="instagram" value="{{ old('instagram') ?? $homeSetting->instagram ?? null }}" class="form-control" placeholder="https://www.instagram.com/">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="twitter">Twitter:</label>
                                        <input type="text" name="twitter" value="{{ old('twitter') ?? $homeSetting->twitter ?? null }}" class="form-control" placeholder="https://twitter.com/">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="linkedin">LinkedIn:</label>
                                        <input type="text" name="linkedin" value="{{ old('linkedin') ?? $homeSetting->linkedin ?? null }}" class="form-control" placeholder="https://www.linkedin.com/">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="youtube">YouTube:</label>
                                        <input type="text" name="youtube" value="{{ old('youtube') ?? $homeSetting->youtube ?? null }}" class="form-control" placeholder="https://www.youtube.com/">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="latitude">Latitude:</label>
                                        <input type="text" name="latitude" value="{{ old('latitude') ?? $homeSetting->latitude ?? null }}" class="form-control" placeholder="-6.2088">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="longitude">Longitude:</label>
                                        <input type="text" name="longitude" value="{{ old('longitude') ?? $homeSetting->longitude ?? null }}" class="form-control" placeholder="106.8456">
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label fw-bold" for="logo">Logo:</label>
                                            {{-- Show Logo --}}
                                            @if (isset($homeSetting->logo))
                                                <p><img src="{{ asset($homeSetting->logo) }}" alt="Logo" class="img-fluid block" width="100"></p>
                                            @endif

                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <small class="text-danger">*For Change Only</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label fw-bold" for="favicon">Favicon:</label>
                                            {{-- Show Favicon --}}
                                            @if (isset($homeSetting->favicon))
                                                <p><img src="{{ asset($homeSetting->favicon) }}" alt="Favicon" class="img-fluid block" width="100"></p>
                                            @endif
                                            <input type="file" name="favicon" class="form-control" accept="image/*">
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
                                        <input type="text" name="section_1_title" value="{{ old('section_1_title') ?? $homeSetting->section_1_title ?? null }}" class="form-control" placeholder="Section 1 Title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label fw-bold" for="section_1_sub_title">Sub Title:</label>
                                        <input type="text" name="section_1_sub_title" value="{{ old('section_1_sub_title') ?? $homeSetting->section_1_sub_title ?? null }}" class="form-control" placeholder="Section 1 Sub Title">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label fw-bold" for="section_1_description">Description:</label>
                                        <textarea name="section_1_description" class="form-control" placeholder="...." rows="3">{{ old('section_1_description') ?? $homeSetting->section_1_description ?? null }}</textarea>
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
    </div>
</x-app-layout>

