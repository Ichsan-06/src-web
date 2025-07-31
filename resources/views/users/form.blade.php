<x-app-layout :assets="$assets ?? []">
    <div>
        <form action="{{ isset($id) ? route('users.update', $id) : route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($id))
                @method('PATCH')
            @endif
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($id) ? 'Update' : 'Add New' }} User</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="profile-img-edit position-relative">
                                <img src="{{ $profileImage ?? asset('images/avatars/01.png') }}" alt="User-Profile"
                                    class="profile-pic rounded avatar-100">
                                <input class="file-upload mt-2" type="file" accept="image/*" name="profile_image">
                            </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                    <span>Only</span>
                                    <a href="javascript:void();">.jpg</a>
                                    <a href="javascript:void();">.png</a>
                                    <a href="javascript:void();">.jpeg</a>
                                    <span>allowed</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status:</label>
                            <div class="grid" style="--bs-gap: 1rem">
                                <div class="form-check g-col-6">
                                    <input class="form-check-input" type="radio" name="status" value="active" id="status-active" {{ old('status') == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status-active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check g-col-6">
                                    <input class="form-check-input" type="radio" name="status" value="pending" id="status-pending" {{ old('status') == 'pending' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status-pending">
                                        Pending
                                    </label>
                                </div>
                                <div class="form-check g-col-6">
                                    <input class="form-check-input" type="radio" name="status" value="banned" id="status-banned" {{ old('status') == 'banned' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status-banned">
                                        Banned
                                    </label>
                                </div>
                                <div class="form-check g-col-6">
                                    <input class="form-check-input" type="radio" name="status" value="inactive" id="status-inactive" {{ old('status') == 'inactive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status-inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">User Role: <span class="text-danger">*</span></label>
                            <select class="form-control" name="user_role" required>
                                <option value="" selected disabled>Select User Role</option>
                                @foreach ($roles as $key => $role)
                                    <option value="{{ $key }}" {{ old('user_role') == $key ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($id) ? 'Update' : 'New' }} User Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="fname">First Name: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') ? old('first_name') : $data->first_name ?? '' }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="lname">Last Name: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') ? old('last_name') : $data->last_name ?? '' }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="add1">Address:</label>
                                    <textarea class="form-control" name="userProfile[street_addr_1]" id="add1" placeholder="Enter Street Address 1" required>{{ old('userProfile[street_addr_1]') ? old('userProfile[street_addr_1]') : $data->userProfile->street_addr_1 ?? '' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="mobno">Mobile Number:</label>
                                    <input class="form-control" type="text" name="userProfile[phone_number]" id="mobno" placeholder="Mobile Number" value="{{ old('userProfile[phone_number]') ? old('userProfile[phone_number]') : $data->userProfile->phone_number ?? '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="email">Email: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter e-mail" value="{{ old('email') ? old('email') : $data->email ?? '' }}" required>
                                </div>
                            </div>
                            <hr>
                            <h5 class="mb-3">Security</h5>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="uname">User Name: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" placeholder="Enter Username" value="{{ old('username') ? old('username') : $data->username ?? '' }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="pass">Password:</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label fw-bold" for="rpass">Repeat Password:</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button
                                onclick="window.location.href='{{ isset($id) ? route('users.index') : route('dashboard') }}'"
                                class="btn btn-primary ">
                                {{ isset($id) ? 'Cancel' : 'Cancel' }}
                            </button>
                            <button type="submit" class="btn btn-primary">{{ isset($id) ? 'Save' : 'Save' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</x-app-layout>
