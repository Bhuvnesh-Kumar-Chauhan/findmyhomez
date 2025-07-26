@php
    $action = isset($testimonial) 
        ? route('admin.testimonials.update', $testimonial->id) 
        : route('admin.testimonials.store');
    $method = isset($testimonial) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="client_name" class="form-label">Client Name *</label>
            <input type="text" class="form-control @error('client_name') is-invalid @enderror" 
                   id="client_name" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}" required>
            @error('client_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="client_photo" class="form-label">Client Photo</label>
            <input type="file" class="form-control @error('client_photo') is-invalid @enderror" 
                   id="client_photo" name="client_photo" accept="image/*">
            @error('client_photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            @if(isset($testimonial) && $testimonial->client_photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}" class="img-thumbnail" style="max-height: 100px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_photo" name="remove_photo" value="1">
                        <label class="form-check-label" for="remove_photo">Remove current photo</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" 
                   id="position" name="position" value="{{ old('position', $testimonial->position ?? '') }}">
            @error('position')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" 
                   id="company" name="company" value="{{ old('company', $testimonial->company ?? '') }}">
            @error('company')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="content" class="form-label">Testimonial Content *</label>
            <textarea class="form-control @error('content') is-invalid @enderror" 
                      id="content" name="content" rows="4" required>{{ old('content', $testimonial->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="rating" class="form-label">Rating *</label>
            <select class="form-select @error('rating') is-invalid @enderror" 
                    id="rating" name="rating" required>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ (old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '') }}>
                        {{ str_repeat('★', $i) . str_repeat('☆', 5 - $i) }} ({{ $i }} star{{ $i > 1 ? 's' : '' }})
                    </option>
                @endfor
            </select>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Status *</label>
            <select class="form-select @error('status') is-invalid @enderror" 
                    id="status" name="status" required>
                <option value="active" {{ (old('status', $testimonial->status ?? '') === 'active' ? 'selected' : '' )}}>Active</option>
                <option value="inactive" {{ (old('status', $testimonial->status ?? '') === 'inactive' ? 'selected' : '' )}}>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>