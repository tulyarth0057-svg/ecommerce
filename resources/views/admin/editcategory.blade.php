@extends('layouts.admin-layout')

@section('title', 'Edit-category')

@push('styles')
<style>
    body { background:#f8f9fa;font-family:'Poppins',sans-serif; }
    h1 { color: #ff6600; margin-bottom: 25px; text-align: center; }
    .form-label { color: #ff6600; font-weight: 600; }
    .btn-orange { background-color: #ff6600; color: white; }
    .btn-orange:hover { background-color: #e65c00; }
    button{ background: #ff6600; border:none; padding: 10px; color: white; border-radius: 5px; }
    .card{ max-width: 750px; }
</style>
@endpush


@section('content')

<div class="card w-100 mx-auto mt-4">
    <div class="card-header text-center bg-warning text-white">
        <h4>Edit Category</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('category.update', $category->c_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Important for updating -->




      <label class="form-label">Main Category:</label>
<select name="main_category_id" class="form-control" required>
    <option value="">Select Main Category</option>
    @foreach($mainCategories as $mainCat)
        <option value="{{ $mainCat->cat_id }}"
            {{ $category->main_category_id == $mainCat->cat_id ? 'selected' : '' }}>
            {{ $mainCat->cat_name }}
        </option>
    @endforeach
</select>



            <!-- Category Name -->
            <div class="mb-3">
                <label class="form-label text-center mt-3">Category Name</label>
                <input type="text" name="c_name" class="form-control" value="{{ old('c_name', $category->c_name) }}" required>
                @error('c_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Banner Image -->
            <div class="mb-3">
                <label class="form-label">Banner Image</label>
                <input type="file" name="c_banner_img" class="form-control" accept="image/*" onchange="previewBanner(event)" multiple>
                @error('c_banner_img') <small class="text-danger">{{ $message }}</small> @enderror
                <h6 class="mt-3">Existing banner</h6>
                @if($category->c_banner_img)
                    <img id="bannerPreview" src="{{ asset($category->c_banner_img) }}" style="height: 100px; margin-top:10px;" />
                @else
                    <img id="bannerPreview" src="#" style="display:none; height:100px; margin-top:10px;" />
                @endif
            </div>

            <!-- Category Image -->
            <div class="mb-3">
                <label class="form-label">Category Image</label>
                <input type="file" name="c_image" class="form-control">

                <h6 class="mt-3">Existing image</h6>
                @if($category->c_image)
                    <img src="{{ asset($category->c_image) }}" style="height: 120px; margin-top:10px;">
                @endif
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="c_description" class="form-control" rows="4" required>{{ old('c_description', $category->c_description) }}</textarea>
                @error('c_description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="text-center p-2">
                <button type="submit" class="button text-center">Update Category</button>
            </div>
        </form>

    </div>
</div>
@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#ff6600',
        });
    @endif

    function previewBanner(event) {
        var output = document.getElementById('bannerPreview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }
</script>
@endpush



