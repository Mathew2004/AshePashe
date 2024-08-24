@extends("front-end.layouts.main")
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
@push("title")
   {{$store->name}} - Ashe Pashe
@endpush
<!--
    - MAIN
  -->

@section("main-section")
<!--
      - BANNER
    -->

<div class="banner">

    <div class="container">

       
                <div class="slider-item">

                    @if (!$store->image)
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');


                            .upload-files-container {
                                background-color: #f7fff7;
                                width: 100%;
                                padding: 30px 60px;
                                border-radius: 40px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                flex-direction: column;
                                box-shadow: rgba(0, 0, 0, 0.24) 0px 10px 20px, rgba(0, 0, 0, 0.28) 0px 6px 6px;
                            }

                            .drag-file-area {
                                border: 2px dashed #7b2cbf;
                                border-radius: 40px;
                                margin: 10px 0 15px;
                                padding: 30px 50px;
                                width: 100%;
                                text-align: center;
                            }

                            .drag-file-area .upload-icon {
                                font-size: 50px;
                            }

                            .drag-file-area h3 {
                                font-size: 26px;
                                margin: 15px 0;
                            }

                            .drag-file-area label {
                                font-size: 19px;
                            }

                            .drag-file-area label .browse-files-text {
                                color: #7b2cbf;
                                font-weight: bolder;
                                cursor: pointer;
                            }

                            .browse-files span {
                                position: relative;
                                top: -25px;
                            }

                            .default-file-input {
                                opacity: 0;
                            }

                            .cannot-upload-message {
                                background-color: #ffc6c4;
                                font-size: 17px;
                                display: flex;
                                align-items: center;
                                margin: 5px 0;
                                padding: 5px 10px 5px 30px;
                                border-radius: 5px;
                                color: #BB0000;
                                display: none;
                            }

                            @keyframes fadeIn {
                                0% {
                                    opacity: 0;
                                }

                                100% {
                                    opacity: 1;
                                }
                            }

                            /* .cannot-upload-message span,
                                                    .upload-button-icon {
                                                        padding-right: 10px;
                                                    }

                                                    .cannot-upload-message span:last-child {
                                                        padding-left: 20px;
                                                        cursor: pointer;
                                                    } */

                            .file-block {
                                color: #f7fff7;
                                background-color: #7b2cbf;
                                transition: all 1s;
                                width: 390px;
                                position: relative;
                                display: none;
                                flex-direction: row;
                                justify-content: space-between;
                                align-items: center;
                                margin: 10px 0 15px;
                                padding: 10px 20px;
                                border-radius: 25px;
                                cursor: pointer;
                            }

                            .file-info {
                                display: flex;
                                align-items: center;
                                font-size: 15px;
                            }

                            .file-icon {
                                margin-right: 10px;
                            }

                            .file-name,
                            .file-size {
                                padding: 0 3px;
                            }

                            .remove-file-icon {
                                cursor: pointer;
                            }

                            .progress-bar {
                                display: flex;
                                position: absolute;
                                bottom: 0;
                                left: 4.5%;
                                width: 0;
                                height: 5px;
                                border-radius: 25px;
                                background-color: #4BB543;
                            }

                            .upload-button {
                                font-family: 'Montserrat';
                                background-color: #7b2cbf;
                                color: #f7fff7;
                                display: flex;
                                align-items: center;
                                font-size: 18px;
                                border: none;
                                border-radius: 20px;
                                margin: 10px;
                                padding: 7.5px 50px;
                                cursor: pointer;
                            }
                        </style>
                        <form action="{{route('add.store.image', $store->slug)}}" method="post" class="form-container"
                            enctype='multipart/form-data'> @csrf
                            <div class="upload-files-container">
                                <div class="drag-file-area">
                                    <span class="material-icons-outlined upload-icon"> file_upload </span>
                                    <h3 class="dynamic-message"> Drag & drop any file here </h3>
                                    <label class="label"> or <span class="browse-files">
                                            <input type="file" name="image" onchange="addImgName()" class="default-file-input" />
                                            <span class="browse-files-text">browse
                                                file</span> <span>from device</span> </span> </label>
                                </div>

                                <button type="submit" class="upload-button"> Upload </button>
                            </div>
                        </form>
                    @else 
                    <style>
.file-input-container {
    position: relative;
    width: 100%;
    max-width: 300px;
    margin: 20px 0;
}

.file-input-label {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 15px;
    border: 2px solid #007bff;
    border-radius: 8px;
    background-color: #fff;
    color: #007bff;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}

.file-input-label:hover {
    background-color: #007bff;
    color: #fff;
}

.file-input-label .file-input-text {
    margin-right: 10px;
    flex-grow: 1;
    text-align: center;
}

.file-input {
    display: none;
}

.file-input-container input[type="file"]::file-selector-button {
    display: none;
}


                    </style>
                        <form action="{{route('add.store.image', $store->slug)}}" style="display: flex; justify-content:end"
                            method="post" enctype='multipart/form-data'> @csrf
                            <!-- <input type="file" name="image" class="upload-button" /> -->
                            
                            <label for="file-input" class="file-input-label">
                                <span class="file-input-text">Choose a file...</span>
                                <input type="file" id="file-input"  name="image"  class="file-input" onchange="showFileName(this)">
                            </label>

                            <button type="submit" class="banner-btn"> Edit </button>
                        </form>
                        <img src="{{url($store->image)}}" alt="women's latest fashion sale" class="banner-img">

                    @endif


                </div>
           
        <!-- </div> -->
        

    </div>

</div>

<!-- Desgin Text Area -->
<style>
    .textarea-container {
    position: relative;
    width: 100%;
    max-width: 500px;
    margin: 20px 0;
}

.textarea-container label {
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
    display: block;
}

#custom-textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    resize: vertical;
    outline: none;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

#custom-textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

#custom-textarea::placeholder {
    color: #aaa;
    font-style: italic;
}
</style>

<!--
      - PRODUCT
    -->

<div class="product-container">

    <div class="container">


        <!--
        - SIDEBAR
      -->

        <div class="sidebar  has-scrollbar" data-mobile-menu>
        
        <form action="{{route('update.store.info', $store->slug)}}" method="post"> @csrf
            <div class="sidebar-category">

                <div class="sidebar-top">
                    <input type="text" class="sidebar-title" name="name" value="{{$store->name}}"/>

                    <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>

                <ul class="sidebar-menu-category-list">

                    <li class="sidebar-menu-category">
                        
                            <!-- <input type="hidden" name="company_id" class="email-field" value="{{$store->name}}"> -->
                            <label for="custom-textarea">Description</label>
                            <textarea type="text" id="custom-textarea" name="description" cols="25" rows="5" required>
                                {{$store->description}}
                            </textarea>
                            <label for="phn">Address</label>
                          
                            <input type="text" id="custom-textarea" name="map"  placeholder="Store Address"
                                value="{{$store->map}}">
                            <label for="phn">Iframe</label>
                            <input type="text" name="iframe" id="custom-textarea" class="email-field" placeholder="Store Iframe"
                                value="{{$store->iframe}}">
                            <label for="phn">Phone</label>
                            <input type="tel" id="phn" name="phone" class="email-field" placeholder="Contact Number"
                                value="{{$store->phone}}">
                            <label for="phn">Division</label>
                            <select name="division" class="email-field" id="">
                                <option value="{{$store->division}}">
                                    {{$store->division ? $store->division : "select division"}}</option>
                                @foreach ($divisions as $division)
                                    <option value="{{$division['name']}}">{{$division['name']}}</option>
                                @endforeach
                            </select>
                            <label for="phn">City</label>
                            <select name="city" class="email-field" id="">
                                <option value="{{$store->city}}">{{$store->city ? $store->city : "select City"}}</option>
                                @foreach ($districts as $dist)
                                    <option value="{{$dist['name']}}">{{$dist['name']}}</option>
                                @endforeach
                            </select>



                            <button type="submit" class="btn-newsletter">Save</button>

                        </form>

                    </li>



                </ul>

            </div>


        </div>

        <!--
          - PRODUCT GRID
        -->

        <div class="product-main">

            <h2 class="title">Menu's ({{$products->count()}})</h2>

            <div class="product-grid">

                @foreach ($products as $prod)

                    <div class="showcase">

                        <div class="showcase-banner">

                            <img src="{{url("/uploads/products/" . $prod->image1)}}" alt="{{$prod->name}}" width="300"
                                class="product-img default">
                            <img src="{{url("/uploads/products/" . $prod->image2)}}" alt="{{$prod->name}}" width="300"
                                class="product-img hover">

                            <p class="showcase-badge">15%</p>

                            <div class="showcase-actions">
                                <form action="{{ route('delete.seller.product', $prod->slug) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action" type="submit">
                                        <ion-icon name="trash"></ion-icon>
                                    </button>
                                </form>


                                <button class="btn-action" id="edit-product" data-id="{{$prod->id}}"
                                    data-name="{{$prod->name}}" data-description="{{$prod->description}}"
                                    data-price="{{$prod->price}}" data-slug="{{$prod->slug}}"
                                    data-company_id="{{$prod->company_id}}"
                                    onclick="document.getElementById('update-product-modal').style.display='block'">
                                    <ion-icon name="pencil"></ion-icon>
                                </button>

                             

                            </div>

                        </div>

                        <div class="showcase-content">

                            <a href="/product/{{$prod->slug}}" class="showcase-category">{{$prod->name}}</a>

                            <a href="/product/{{$prod->slug}}">
                                <h3 class="showcase-title">{{$prod->company_id}}</h3>
                                <h3 class="showcase-title">Distance: {{$prod->company_id}}</h3>
                            </a>

                            <div class="showcase-rating">  
                                    @if ($prod->rating)
                                    
                                        @for ($i=1; $i<=number_format($prod->rating->avg('rating'),1); $i++)
                                            <ion-icon name="star"></ion-icon>
                                        @endfor
                                        @for ($i=5; $i>number_format($prod->rating->avg('rating'),1); $i--)
                                            <ion-icon name="star-outline"></ion-icon>
                                        @endfor
                                        <p>({{ number_format($prod->rating->avg('rating'),1) }})</p>
                                    
                                    @endif
              
                            </div>

                            <div class="price-box">
                                <p class="price">Tk.{{$prod->offer ? ($prod->price - $prod->price*($prod->offer->offer_percent/100)): $prod->price }}</p>
                                @if ($prod->offer)
                                    <del>Tk.{{$prod->price}}</del>
                                @endif
                                
                             </div>


                        </div>

                    </div>
                @endforeach


                <style>
                    .add-product-box {
                        border: 3px dotted #111;
                        height: 200px;
                        width: 200px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                </style>
                <div class="add-product-box">
                    <button class="banner-btn" onclick="document.getElementById('add-product-modal').style.display='block'">Add Product+</button>
                    
                </div>
                



            </div>

        </div>


    </div>

</div>




<!-- Create Store Modal -->
<div id="add-product-modal" class="store-modal" style="display:none">
    @include("front-end.seller.add-product") 
    <!-- <h1>Hello</h1> -->
</div>

<!-- Update Product Modal -->
<div id="update-product-modal" class="store-modal" style="display:none">
    @include("front-end.seller.update-product") 

</div>





@endsection


@section("scripts")

<script>
    // const modalCloseBtn = document.getElementById('close');
    // modalCloseBtn.addEventListener('click', function () {
    //     alert("da");
    // });

    $(document).ready(function () {

        $('#edit-product').on('click', function () {
            // alert('name');
            document.getElementById('update-product-modal').style.display = 'block';
            // Get data attributes from the clicked button
            var id = $(this).data('id');
            var name = $(this).data('name');
            var slug = $(this).data('slug');
            var desc = $(this).data('description');
            var price = $(this).data('price');
            var company_id = $(this).data('company_id');
            alert(slug);
            // Set the values in the modal
            $('#addName').val(name);
            $('#addSlug').val(slug);
            // $('#editor').html(desc);
            $('#price').val(price);
            $('#company_id').val(company_id);
            // $('#desc').innerHTML(desc);



            // Update the form action with the correct route
            var formAction = "{{ route('update.seller.product', ':slug') }}";
            formAction = formAction.replace(':slug', slug);
            $('#editForm').attr('action', formAction);

        });



    });


</script>
<script>
    function showFileName(input) {
        const fileName = input.files[0]?.name || 'Choose a file...';
        input.previousElementSibling.textContent = fileName;
        
    }
    function addImgName(){
        $('.dynamic-message').text($('.default-file-input').val());
    }

</script>
@endsection

