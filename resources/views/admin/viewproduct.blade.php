 @extends('layouts.admin-layout')

 @section('title', 'View-product')

@push('styles')
{{-- <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f5f3f1;
    }
    .card-1{
        height:auto;
        border: 1px solid rgb(201, 200, 200);
        background:white;

    }

      .product-banner {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        /* box-shadow: 0 8px 20px rgba(0,0,0,0.15); */
        width: 100%;

    }

    .product-banner img {
        width: 100%;
        height: 330px;
        object-fit: cover;
        transition: all 0.5s;
        border-radius: 20px;
    }

    .product-banner:hover img {
        transform: scale(1.05);
    }

    .banner-title {
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background:rgb(252, 95, 39);
        padding: 8px 25px;
        border-radius: 20px;
        font-size: 22px;
        font-weight: 600;
        color: white;
        backdrop-filter: blur(5px);

    }
    .product-modern-card-2 {
        border-radius: 15px;
        background: orangered;
        padding: 35px 40px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
        justify-content: space-between;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
        border: 1px solid #eee;
    }


       .product-modern-card {
        border-radius: 15px;
        background: orangered;
        padding: 35px 40px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
        border: 1px solid #eee;
    }

    .detail-box {
        background: #fff;
        padding: 18px 25px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        flex: 1;
        min-width: 220px;
        border: 1px solid #f0f0f0;
        transition: 0.3s ease;
    }

    .detail-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .detail-title {
        font-size: 14px;
        font-weight: 600;
        color: #777;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .csi{
        background: orangered;
    }






</style> --}}
<style>
body {
    background:#f5f7fb;
    font-family: 'Poppins', sans-serif;
}
h4{
    background-color: orangered;
}


</style>
@endpush






@section('content')
<div class="container my-5">

    <!-- PAGE TITLE -->
    <h1 class="mb-4 fw-bold border-start border-5 ps-3 border-primary">Product Details</h1>

    <!-- PRODUCT BANNER -->
    @if($product->category && $product->category->c_banner_img)
  <div class="position-relative mb-4 shadow rounded overflow-hidden h-50">
    <img src="{{ asset($product->category->c_banner_img) }}"
         class="img-fluid w-100 "
         onclick="openPreview(this)">
    <span class="position-absolute bottom-0 start-0 bg-white px-3 py-1 rounded m-3 fw-semibold">Product Banner</span>
</div>


    @endif

    <!-- PRODUCT DETAILS CARD -->
    <div class="card mb-4 shadow">
        <div class="card-body row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

            <div class="col">
                <div class="text-muted small">Product Name</div>
                <div class="fw-bold text-primary">{{ $product->p_name }}</div>
            </div>

            <div class="col">
                <div class="text-muted small">Main Category</div>
                <div class="fw-semibold text-danger">{{ $product->mainCategory->cat_name ?? 'No Main Category' }}</div>
            </div>

            <div class="col">
                <div class="text-muted small">Category</div>
                <div class="fw-semibold text-info">{{ $product->category->c_name ?? $product->p_category_id }}</div>
            </div>

            <div class="col">
                <div class="text-muted small">Price</div>
                <div class="fw-bold text-danger">₹{{ $product->p_price }}</div>
            </div>

            <div class="col">
                <div class="text-muted small">Visibility</div>
                @if($product->p_visibility_status)
                    <span class="badge bg-success">Visible</span>
                @else
                    <span class="badge bg-secondary">Hidden</span>
                @endif
            </div>

        </div>
    </div>

    <!-- COLORS / SIZES / IMAGES -->
    <h4 class="text-center  text-white rounded py-2 mb-3">Colors • Sizes • Images</h4>

    @foreach($product->colors as $color)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">

            <!-- Color Info -->
            <div class="d-flex align-items-center mb-3">
                <span class="d-inline-block rounded me-3" style="width:30px; height:30px; background:{{ $color->color_code }}; border:2px solid #ffb243;"></span>
                <div class="fw-bold me-3">{{ $color->color_name }}</div>
                <div>₹{{ $color->color_price_adjustment }}</div>
            </div>

            <!-- Images -->
            <div class="mb-2 fw-semibold">Images:</div>
            <div class="d-flex flex-wrap gap-2 mb-3">
                @foreach($color->images as $img)
                    <img src="{{ asset('storage/colors/' . $img->img_path) }}" class="img-thumbnail" style="width:75px; height:75px; object-fit:cover; cursor:pointer;" onclick="openPreview(this)">
                @endforeach
            </div>

            <!-- Sizes -->
            <div class="mb-2 fw-semibold">Sizes:</div>
            <div class="d-flex flex-wrap gap-2">
                @foreach($color->sizes as $size)
                    <div class="border rounded px-2 py-1 d-flex align-items-center gap-2">
                        {{ $size->size_name }}
                        @if($size->image)
                            <img src="{{ asset('uploads/products/'.$size->image) }}" style="width:55px; height:40px; object-fit:cover; border-radius:5px;" onclick="openPreview(this)">
                        @endif
                        <span class="fw-semibold">₹{{ $size->size_price_adjustment }}</span>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    @endforeach

    <!-- DESCRIPTION -->
    <h4 class="text-center  text-white rounded py-2 mb-3">Product Description</h4>
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="mb-3">
                <div class="fw-semibold">Short Description</div>
                <p>{{ Str::limit($product->p_short_description, 400) }}</p>
            </div>
             <hr>
            <div>
                <div class="fw-semibold">Long Description</div>
                <p>{!! $product->p_long_description !!}</p>
            </div>
        </div>
    </div>

</div>
@endsection






<div id="imgPreviewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000; transition:all 1s;">
    <span style="position:absolute; top:20px; right:30px; color:white; font-size:30px; cursor:pointer; transition:all 1s;" onclick="closePreview()">&times;</span>
    <img id="previewImg" src="" style="max-width:90%; max-height:90%; border-radius:10px; box-shadow:0 0 15px white;">
</div>




@push('scripts')


<script>
function openPreview(img) {
    const modal = document.getElementById('imgPreviewModal');
    const preview = document.getElementById('previewImg');
    preview.src = img.src;  // set clicked image src
    modal.style.display = 'flex'; // show modal
}

function closePreview() {
    document.getElementById('imgPreviewModal').style.display = 'none';
}

// Optional: close modal if clicked outside image
document.getElementById('imgPreviewModal').addEventListener('click', function(e) {
    if(e.target.id === 'imgPreviewModal') {
        closePreview();
    }
});
</script>

@endpush

