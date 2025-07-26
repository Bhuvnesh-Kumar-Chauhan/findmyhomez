@php
    $action = isset($setting) 
        ? route('admin.settings.update', $setting->id) 
        : route('admin.settings.store');
    $method = isset($setting) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="site_name" class="form-label">Site Name *</label>
            <input type="text" class="form-control @error('site_name') is-invalid @enderror" 
                   id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name ?? '') }}" required>
            @error('site_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                   id="logo" name="logo" accept="image/*">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            @if(isset($setting) && $setting->logo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 60px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_logo" name="remove_logo" value="1">
                        <label class="form-check-label" for="remove_logo">Remove current logo</label>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            <label for="favicon" class="form-label">Favicon</label>
            <input type="file" class="form-control @error('favicon') is-invalid @enderror" 
                   id="favicon" name="favicon" accept="image/*">
            @error('favicon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            @if(isset($setting) && $setting->favicon)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" class="img-thumbnail" style="max-height: 60px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_favicon" name="remove_favicon" value="1">
                        <label class="form-check-label" for="remove_favicon">Remove current favicon</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Rest of the form fields (same as in the previous example) -->
    <!-- ... -->

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#about_us, #terms_conditions, #privacy_policy',
        plugins: 'link lists',
        toolbar: 'undo redo | styleselect | bold italic | bullist numlist | link',
        height: 200,
        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px }'
    });
</script>
@endpush