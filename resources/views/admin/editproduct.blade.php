@extends('layouts.admin-layout')

@section('title', 'Edit-product')

@push('styles')

<style>

     body{
          font-family: 'Poppins',sans-serif;
          background:rgb(245, 243, 241);
    }
           select, textarea {
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            align-items: center;
            width: 100%;
            border: 1px solid orangered;
        }
        input{
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            align-items: center;
             width: 100%;
             border:1px solid orangered;
        }
        form{
            border: 1px solid orangered;
            background: white;
            border-radius: 7px;
        }
        h1{
            color: orange;
            margin-top:-20px;
        }
        .color-option {
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  margin: 6px;
}

.color-box {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  border:1px solid grey;
  display: inline-block;
}



button{
    background-color: orange;
    border: 0;
      transition: all 0.3s;

}
button:hover{
    background-color: orangered;
    cursor: pointer;
    color: white;

}
  .form-section {
      background: white;
      padding: 20px;
      border-radius: 8px;
     border: 1px solid orangered;
      max-width: 650px;
      margin:20px auto;
    }
    .color-input {
      width: 70px;
      height: 38px;
      border: 1px solid #ced4da;
      border-radius: 4px;
    }
    .add-btn {
      background-color:orangered;
      color: white;
      width: 100%;
    }
    .form-control{
        border:1px solid orangered;
    }
</style>

@endpush









@section('content')
<div class="container w-75  p-3">
       <div class="row p-3">
    <form action="{{ route('product.update', $product->p_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h1 class="text-center text-warning p-3 mt-3">UPDATE PRODUCT</h1>

        <!-- Basic Info -->
        <label>Product Name</label>
        <input type="text" name="p_name" value="{{ $product->p_name }}" required>



        <label>Main Category:</label>
<select name="main_category_id" id="main_category" required>
    <option value="">Select Main Category</option>
    @foreach($mainCategories as $mainCat)
        <option value="{{ $mainCat->cat_id }}"
            {{ $product->main_category_id == $mainCat->cat_id ? 'selected' : '' }}>
            {{ $mainCat->cat_name }}
        </option>
    @endforeach
</select>

        <label>Category</label>
        <select name="p_category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->c_id }}" @selected($cat->c_id == $product->p_category_id)>{{ $cat->c_name }}</option>
            @endforeach
        </select>

        <label>Price</label>
        <input type="number" name="p_price" value="{{ $product->p_price }}" required>

        <div class="row">
            <div class="col-md-4">
                <label>Old Price</label>
                <input type="number" name="p_old_price" value="{{ $product->p_old_price }}">
            </div>
            <div class="col-md-4">
                <label>Stock</label>
                <input type="number" name="p_stock" value="{{ $product->p_stock }}">
            </div>
        </div>

        <label>Visibility</label>
        <select name="p_visibility_status">
            <option value="1" @selected($product->p_visibility_status==1)>Visible</option>
            <option value="0" @selected($product->p_visibility_status==0)>Invisible</option>
        </select>

        <label>Product Type</label>
        <input type="text" name="p_type" value="{{ $product->p_type }}">

        <hr>

        <!-- Colors Section -->
        <h4 class="text-warning">Product Colors</h4>
        <div id="colorcontainer">
            @foreach($product->colors as $i => $color)

            <div class="addcolor p-3 mb-3" data-color-index="{{ $i }}">
                <div class="d-flex">
                    <h5>Color {{ $i+1 }}</h5>
                    <button type="button" class="btn btn-danger btn-sm ms-auto removeBtn">Remove</button>
                </div>

                <div class="row">
                    <div class="col-md-4">

                        <label>Color Name</label>
                         <input type="hidden" name="color_id[]" value="{{ $color->color_id }}">
                        <input type="text" name="colorname[{{ $i }}]" value="{{ $color->color_name }}" required>
                        <input type="hidden" name="color_id[{{ $i }}]" value="{{ $color->color_id }}">
                    </div>
                    <div class="col-md-4">
                        <label>Color Code</label>
                        <input type="text" name="colorcode[{{ $i }}]" value="{{ $color->color_code }}" required>
                    </div>
                    <div class="col-md-4">
                        <label>Price Adjustment</label>
                        <input type="number" name="priceadjustment[{{ $i }}]" value="{{ $color->color_price_adjustment }}">
                    </div>

                    <label class="mt-2">Existing Images</label>
                    <div class="d-flex flex-wrap">
                        @foreach($color->images as $img)
                        <img src="{{ asset('storage/colors/'.$img->img_path) }}" width="70" height="70" class="me-2 mb-2">
                        @endforeach
                    </div>

                    <label class="mt-2">Upload New Images</label>
                    <input type="file" name="color_images[{{ $i }}][]" multiple>
                </div>

                <!-- Sizes Section -->
                <div class="size-section mt-3">
                    <label>Sizes</label>
                    <div class="sizeContainer">
                       @foreach($color->sizes as $sIndex => $s)
<div class="row bg-light p-2 mb-2">

    <!-- Correct hidden ID -->
    <input type="hidden"
           name="size_id[{{ $i }}][{{ $sIndex }}]"
           value="{{ $s->size_id }}">

    <div class="col-md-6">
        <label>Size Name</label>
        <input type="text"
               name="sizename[{{ $i }}][{{ $sIndex }}]"
               value="{{ $s->size_name }}">
    </div>

    <div class="col-md-6">
        <label>Price Adjustment</label>
        <input type="number"
               name="sizepriceadjustment[{{ $i }}][{{ $sIndex }}]"
               value="{{ $s->size_price_adjustment }}">
    </div>
</div>
@endforeach

                    </div>
                    <button type="button" class="btn btn-warning mt-2 add-size-btn">+ Add Size</button>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-warning w-25 mt-3" id="addcolorbtn">+ Add Color</button>

        <label class="mt-4">Short Description</label>
        <textarea name="p_short_description" rows="3">{{ $product->p_short_description }}</textarea>

        <label class="mt-4">Long Description</label>
        <textarea id="productDescription" name="p_long_description">{{ $product->p_long_description }}</textarea>

        <div class="text-center mt-4">
            <button type="submit" class="btn text-white w-50 p-3 border bg-warning">Update Product</button>
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

    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#main_category').change(function() {
    var mainId = $(this).val();

    if(mainId) {
        $.ajax({
            url: '/admin/get-categories/' + mainId,
            type: 'GET',
            success: function(data) {
                var categorySelect = $('#category');
                categorySelect.empty();
                categorySelect.append('<option value="">Select Category</option>');
                $.each(data, function(key, category){
                    categorySelect.append('<option value="'+ category.c_id +'">'+ category.c_name +'</option>');
                });
            },
            error: function() {
                alert('Error fetching categories.');
            }
        });
    } else {
        $('#category').empty().append('<option value="">Select Category</option>');
    }
});

</script>

<script>
let colorIndex = {{ count($product->colors) }};

// Add new color
$('#addcolorbtn').click(function(e){
    e.preventDefault();
    let html = `
    <div class="addcolor p-3 mb-3" data-color-index="${colorIndex}">
        <div class="d-flex">
            <h5>Color ${colorIndex+1}</h5>
            <button type="button" class="btn btn-danger btn-sm ms-auto removeBtn">Remove</button>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Color Name</label>
                <input type="text" name="colorname[${colorIndex}]" required>
            </div>
            <div class="col-md-4">
                <label>Color Code</label>
                <input type="text" name="colorcode[${colorIndex}]" required>
            </div>
            <div class="col-md-4">
                <label>Price Adjustment</label>
                <input type="number" name="priceadjustment[${colorIndex}]">
            </div>
            <label class="mt-2">Upload Images</label>
            <input type="file" name="color_images[${colorIndex}][]" multiple>
        </div>
        <div class="size-section mt-3">
            <label>Sizes</label>
            <div class="sizeContainer"></div>
            <button type="button" class="btn btn-warning mt-2 add-size-btn">+ Add Size</button>
        </div>
    </div>`;
    $('#colorcontainer').append(html);
    colorIndex++;
});


$('#colorcontainer').on('click', '.removeBtn', function(){
    $(this).closest('.addcolor').remove();
});

$('#colorcontainer').on('click', '.add-size-btn', function(){
    let parentColor = $(this).closest('.addcolor');
    let idx = parentColor.data('color-index');

    parentColor.find('.sizeContainer').append(`
        <div class="row bg-light p-2 mb-2">
            <input type="hidden" name="size_id[${idx}][]" value="">
            <div class="col-md-6">
                <label>Size Name</label>
                <input type="text" name="sizename[${idx}][]" placeholder="Size Name">
            </div>
            <div class="col-md-6">
                <label>Price Adjustment</label>
                <input type="number" name="sizepriceadjustment[${idx}][]" placeholder="Price Adjustment">
            </div>
        </div>
    `);
});




</script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
 <script>
    $('#productDescription').summernote({
      placeholder: 'Type product description...',
      tabsize: 2,
      height: 200
    });
  </script>

@endpush
