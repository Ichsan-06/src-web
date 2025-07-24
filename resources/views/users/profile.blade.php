<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                                <img src="{{ $profileImage ?? asset('images/avatars/01.png') }}" alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                <img src="{{ asset('images/avatars/avtar_1.png') }}" alt="User-Profile"
                                    class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                                <img src="{{ asset('images/avatars/avtar_2.png') }}" alt="User-Profile"
                                    class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                                <img src="{{ asset('images/avatars/avtar_4.png') }}" alt="User-Profile"
                                    class="theme-color-green-img img-fluid rounded-pill avatar-100">
                                <img src="{{ asset('images/avatars/avtar_5.png') }}" alt="User-Profile"
                                    class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                                <img src="{{ asset('images/avatars/avtar_3.png') }}" alt="User-Profile"
                                    class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                            </div>
                            <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                <h4 class="me-2 h4">{{ $data->full_name ?? 'Austin Robertson' }}</h4>
                                <span class="text-capitalize"> -
                                    {{ str_replace('_', ' ', auth()->user()->user_type) ?? 'Marketing Administrator' }}</span>
                            </div>
                        </div>
                        <ul class="d-flex nav nav-pills mb-0 text-center profile-tab iq-class" data-toggle="slider-tab"
                            id="profile-pills-tab" role="tablist">
                            {{-- <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab" aria-selected="false">Feed</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Activity</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-friends" role="tab" aria-selected="false">Friends</a>
                     </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#profile-profile"
                                    role="tab" aria-selected="false">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="profile-content tab-content">
                <div id="profile-profile" class="tab-pane fade active show">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex justify-content-between align-items-center">
                                <h4 class="card-title">About User</h4>
                                <div class="card-action">
                                    <span class="me-2">You can edit your profile here</span>
                                    <a href="{{route('users.edit', $data->id)}}" class="btn btn-sm btn-primary" role="button">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-1">First Name:</h6>
                                    <p>{{ $data->first_name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-1">Last Name:</h6>
                                    <p>{{ $data->last_name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-1">Email:</h6>
                                    <p><a href="#" class="text-body"> {{ $data->email }}</a></p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-1">Address:</h6>
                                    <p><a href="#" class="text-body" target="_blank"> {{ $data->userProfile->address }}</a></p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-1">Phone:</h6>
                                    <p><a href="#" class="text-body"> {{ $data->userProfile->phone_number }}</a></p>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="mb-1">Role:</h6>
                                    <p><a href="#" class="text-body"> {{ $data->roles->pluck('title')->first() }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>
