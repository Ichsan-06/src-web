<x-app-layout :assets="$assets ?? []">
    <div>
        <?php
        $id = $id ?? null;
        ?>
        @if (isset($id))
            <form action="{{ route('role.permission.updateStore', $id) }}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{ route('role.permission.store') }}" method="post" enctype="multipart/form-data">
        @endif
        @csrf

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id !== null ? 'Update' : 'New' }} Role Information</h4>
                        </div>
                        <div class="card-action">
                            {{-- <a href="{{ route('role.index') }}" class="btn btn-primary" role="button">Back</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label fw-bold" for="name">Name: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $role->title ?? null }}" placeholder="Name" required>
                                </div>
                            </div>

                            <div class="form-group col-md-12" id="menu">
                                <label class="form-label fw-bold mb-2" for="menu">Menu: <span class="text-danger">*</span></label>

                                <div class="row">
                                    @foreach ($menus as $index => $menu)
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check border rounded p-2 h-100 shadow-sm">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="{{ $menu }}"
                                                    name="menu[]"
                                                    id="menu_{{ $index }}"
                                                    {{ in_array($menu, $permissions) ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label ms-2 fw-semibold" for="menu_{{ $index }}">
                                                    {{ ucfirst($menu) }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button
                                onclick="window.location.href='{{ $id !== null ? route('role.index') : route('dashboard') }}'"
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
        </form>
    </div>
</x-app-layout>
