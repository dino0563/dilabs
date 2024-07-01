@extends('templates.admin')

@section('title', 'Edit User')

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">User Form</h5>
                <small class="text-muted float-end">Edit a User item</small>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                value="{{ old('name', $user->name) }}" required>
                            @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                value="{{ old('email', $user->email) }}" required>
                            @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="current_password" class="form-label">Current
                            Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="current_password" name="current_password" />
                            @if ($errors->has('current_password'))
                            <div class="text-danger">{{ $errors->first('current_password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="new_password" class="form-label">New
                            Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="new_password" name="new_password" />
                            @if ($errors->has('new_password'))
                            <div class="text-danger">{{ $errors->first('new_password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="new_password_confirmation"
                            class="form-label">Confirm New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="new_password_confirmation"
                                name="new_password_confirmation" />
                            @if ($errors->has('new_password_confirmation'))
                            <div class="text-danger">{{ $errors->first('new_password_confirmation') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="profile_photo">Profile Picture</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control dropify" data-max-file-size="10M"
                                data-allowed-file-extensions="png jpg jpeg" id="profile_photo" name="profile_photo"
                                accept=".jpg, .jpeg, .png">
                            <small class="text-muted">Maximum file size: 10MB</small>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Add your custom scripts if any -->
@endsection

@push('admin_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
<script>
    document.getElementById('password').addEventListener('input', function() {
            if (this.value.length >= 6) {
                this.style.border = '2px solid green';
            } else {
                this.style.border = '2px solid red';
            }
        });

        document.getElementById('password').addEventListener('blur', function() {
            if (this.value.length < 6) {
                this.style.border = '2px solid red';
                alert('Password must be at least 6 characters long.');
            } else {
                this.style.border = '2px solid green';
            }
        });


        function togglePasswordVisibility(button, fieldId) {
            const field = document.getElementById(fieldId);
            if (field.getAttribute('type') === "password") {
                field.setAttribute('type', "text");
                button.innerHTML = "<i class='bx bx-hide'></i>";
            } else {
                field.setAttribute('type', "password");
                button.innerHTML = "<i class='bx bx-show-alt'></i>";
            }
        };
</script>
@endpush
