@extends('admin.layouts.master')

@section('content')
<div class="row mb-2">
    <div class="col-sm-6">
        <a href="{{ url('admin') }}">
            <button type="button" class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>Back</button>
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Gallery</h3>
    </div>

    <form id="quickForm" method="POST" action="{{ route('admin.gallery.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $gallery->id }}">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title.." 
                       value="{{ old('title', $gallery->title) }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Current Images Display -->
            @if($gallery->image)
                <div class="form-group">
                    <label>Current Images:</label>
                    <div class="row">
                        @php
                            $images = is_string($gallery->image) ? json_decode($gallery->image) : $gallery->image;
                        @endphp
                        @if(is_array($images) || is_object($images))
                            @foreach($images as $image)
                                <div class="col-md-3 mb-3">
                                    <img src="{{ asset($image) }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif

            <!-- Single Image Upload Input that handles both single and multiple -->
            <div class="form-group">
                <label for="images">Update Images</label>
                <input type="file" name="images[]" class="form-control" multiple 
                       accept="image/*" onchange="previewImages(event)">
                <small class="text-muted">You can select one or multiple images</small>
                @error('images.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Preview Container -->
            <div class="row mt-3" id="imagePreviewContainer"></div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Gallery</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImages(event) {
    const container = document.getElementById('imagePreviewContainer');
    container.innerHTML = ''; // Clear previous previews
    
    const files = event.target.files;
    
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (file.type.startsWith('image/')) {
            const col = document.createElement('div');
            col.className = 'col-md-3 mb-3';
            
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'img-thumbnail';
            img.style.maxHeight = '150px';
            
            col.appendChild(img);
            container.appendChild(col);
        }
    }
}
</script>
@endpush
@stop
