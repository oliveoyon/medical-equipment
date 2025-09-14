@extends('admin.layouts.app')

@section('title', 'General Settings')
@section('page-title', 'General Settings')

@section('content')
    <form action="{{ route('admin.general-settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Company Name</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ old('company_name', $setting->company_name) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $setting->email) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $setting->phone) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="1">{{ old('address', $setting->address) }}</textarea>
                    </div>
                </div>

                <h5 class="mt-3">🌐 Social Links</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Facebook</label>
                        <input type="url" name="facebook" class="form-control"
                            value="{{ old('facebook', $setting->facebook) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control"
                            value="{{ old('linkedin', $setting->linkedin) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Twitter</label>
                        <input type="url" name="twitter" class="form-control"
                            value="{{ old('twitter', $setting->twitter) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Instagram</label>
                        <input type="url" name="instagram" class="form-control"
                            value="{{ old('instagram', $setting->instagram) }}">
                    </div>
                </div>

                <h5 class="mt-3">🎨 Branding</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @if ($setting->logo)
                            <img src="{{ asset('storage/' . $setting->logo) }}" height="50" class="mt-2 border p-1"
                                alt="Logo">
                        @endif

                    </div>
                    <div class="form-group col-md-6">
                        <label>Favicon</label>
                        <input type="file" name="favicon" class="form-control">
                        @if ($setting->favicon)
                            <img src="{{ asset('storage/' . $setting->favicon) }}" height="30" class="mt-2 border p-1">
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 2500,
                showConfirmButton: false
            })
        @endif
    </script>
@endpush
