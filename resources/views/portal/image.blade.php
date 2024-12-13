@extends('portal.layouts.master')
@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-5">
            <h2 class="display-4 font-weight-light" style="color:#ffb600">Gallery</h2>
            <p class="font-italic text-muted">A view of our work</p>
        </div>
    </div>
</div>
<style>
    .gallerycontainer img {
        border-radius: 8px !important;
        position: relative;
        width: 100%;
        height: 100%;
    }
    .gallerimage {
        position: relative;
        overflow: hidden;
    }
    .des {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(64, 153, 255, 0.3);
        color: black;
        padding: 20px;
        border-radius: 8px;
        transform: translateY(-100%);
        opacity: 0;
        transition: transform 0.7s ease, opacity 0.7s ease;
    }
    .gallerimage:hover .des {
        transform: translateY(0);
        opacity: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .image-title {
        font-size: 18px;
        color: white;
        text-transform: capitalize;
    }
</style>
<section class="container-fluid p-0 m-0">
    <div class="container gallerycontainer p-0">
        <div class="row">
            @foreach ($gallerys as $gallery)
                @if (!empty($gallery->image) && is_array($gallery->image))
                    <div class="col-md-4 rounded py-1 p-0 m-0">
                        <div class="col-12">
                            <div class="gallerimage">
                                <!-- Display only the first image -->
                                <img src="{{ asset($gallery->image[0]) }}" alt="{{ $gallery->title }}" class="col-12 rounded p-0 m-0" style="height: 300px;">
                                <div class="des">
                                    <h5 class="image-title">{{ $gallery->title }}</h5>
                                    <!-- Button to toggle image display -->
                                    <button class="btn btn-primary" onclick="showOtherImages('{{ json_encode($gallery->image) }}', '{{ $gallery->title }}')">Other Images</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Modal to display other images -->
<div class="modal fade" id="otherImagesModal" tabindex="-1" aria-labelledby="otherImagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otherImagesModalLabel">Gallery Images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="modalImagesContainer"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function showOtherImages(images, title) {
        const parsedImages = JSON.parse(images);
        const modalContainer = document.getElementById('modalImagesContainer');
        modalContainer.innerHTML = '';

        parsedImages.forEach(image => {
            const imageHtml = `
                <div class="col-md-4">
                    <img src="${image}" alt="${title}" class="img-fluid mb-3 rounded" style="height: 200px;">
                </div>
            `;
            modalContainer.innerHTML += imageHtml;
        });

        const modalTitle = document.getElementById('otherImagesModalLabel');
        modalTitle.textContent = title;
        new bootstrap.Modal(document.getElementById('otherImagesModal')).show();
    }
</script>
@endsection
