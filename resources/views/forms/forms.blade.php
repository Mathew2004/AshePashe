<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Forms</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Forms</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">{{$subpage}}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Add {{$subpage}}</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                @if ($subpage == 'companies')

            <form action="{{route("store.company")}}" method="post" enctype="multipart/form-data"> @csrf
              <div class="form-group">
              <label for="name">Restaurant Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" />
              <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone
                else.</small>
              </div>
              <div class="form-group">
              <label for="desc">Description</label>
              @error('description')
          {{$message}}
        @enderror
              <textarea id="editor" name="description"></textarea>

              <div class="form-group">
                <label for="div">Select Category</label>
                <select name="category" class="form-select" id="div">
                @foreach ($categories as $category)

          <option value="{{$category->name}}">{{$category->name}}</option>
        @endforeach

                </select>
              </div>
              <div class="form-group">
                <label for="div">Select Division</label>
                <select name="division" class="form-select" id="div">
                @foreach ($divisions as $division)
          <option value="{{$division['name']}}">{{$division['name']}}</option>
        @endforeach

                </select>
              </div>

              <div class="form-group">
                <label for="city">Select City</label>
                <select class="form-select" name="city" id="city">
                @foreach ($districts as $dist)
          <option value="{{$dist['name']}}">{{$dist['name']}}</option>
        @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="map">Google Map Link</label>
                <input type="text" name="map" class="form-control" id="map" placeholder="Enter Map Link" />
                <!-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone
          else.</small> -->
              </div>
              <div class="form-group">
                <label for="iframe">Google Map Iframe</label>
                <input type="text" name="iframe" class="form-control" id="iframe"
                placeholder="Enter Map Iframe" />

              </div>
              <div class="form-group">
                <label for="img">Select Banner</label>
                <input type="file" name="image" class="form-control" id="img" />
              </div>

              </div>
              <div class="card-action">
              <button class="btn btn-success" type="submit">Submit</button>
              <button class="btn btn-danger">Cancel</button>
              </div>
            </form>

        @elseif($subpage == 'category')
        <form action="{{route("store.category")}}" method="post"> @csrf
          <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" />
          <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone
            else.</small>
          </div>

        </div>
        <div class="card-action">
        <button class="btn btn-success" type="submit">Submit</button>
        <button class="btn btn-danger">Cancel</button>
        </div>
        </form>

      @elseif($subpage == "products")
      <form action="{{route("store.product")}}" method="post" enctype="multipart/form-data"> @csrf
      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name"
        placeholder="Enter Name" />
        @error("name")
      {{$message}}
    @enderror
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        @error('description')
      {{$message}}
    @enderror
        <textarea id="editor" name="description">{{old('description')}}</textarea>

        <div class="form-group">
        <label for="div">Select Restaurent</label>
        <select name="company_id" class="form-select" value="{{old('company_id')}}" id="div">
          @foreach ($companies as $company)

        <option value="{{$company->name}}">{{$company->name}}</option>
      @endforeach

        </select>
        @error("company_id")
      {{$message}}
    @enderror
        </div>

        <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" value="{{old('price')}}" class="form-control" id="price" />
        </div>
        @error("price")
      {{$message}}
    @enderror
        <div class="form-group">
        <label for="img1">Image 1</label>
        <input type="file" name="image1" class="form-control" id="img1" />
        </div>
        @error("image1")
      {{$message}}
    @enderror
        <div class="form-group">
        <label for="img2">Image 2 (Optional)</label>
        <input type="file" name="image2" class="form-control" id="img2" />
        </div>
        @error("image2")
      {{$message}}
    @enderror
        <div class="form-group">
        <label for="img3">Image 3 (Optional)</label>
        <input type="file" name="image3" class="form-control" id="img3" />
        </div>
        @error("image3")
      {{$message}}
    @enderror

      </div>
      <div class="card-action">
        <button class="btn btn-success" type="submit">Submit</button>
        <button class="btn btn-danger">Cancel</button>
      </div>
      </form>

    @elseif($subpage == 'create-offer')
      <form action="{{route("store.offer")}}" method="post" enctype="multipart/form-data"> @csrf
      <div class="form-group">
        <label for="name">Product Name</label>
        <select name="product_id" id="prod_select" class="form-select" select value="{{old('company_id')}}"
        id="div">
        <option value="" selected>select product</option>
        @foreach ($products as $prod)
      <option value="{{$prod->id}}" id="price_data" data-price="{{$prod->price}}">{{$prod->name}}</option>
    @endforeach

        </select>
        @error("product_id")
      {{$message}}
    @enderror
      </div>
      <div class="form-group">
        <label for="name">Offer Type</label>
        <select name="offer_type" id="offer_type" class="form-select" value="{{old('offer_type')}}" id="div">
        <option value="2">Discount(%)</option>
        <option value="1">Buy One Get One</option>


        </select>
        <p>Price: <span id="dis_price"></span></p>

      </div>
      <!-- Hidden input field, initially hidden -->
      <div id="discount_input" style="display:block; margin-top: 10px;">
        <label for="discount_value">Enter Discount Percentage:</label>
        <input type="number" name="offer_percent" id="discount_value" class="form-control" min="0" max="100"
        placeholder="Enter discount percentage" value="0">
      </div>
      <div id="offer" style="display:none; margin-top: 10px;">
        <label for="offer_input">Offer Text</label>
        <input type="text" name="offer_buy" id="offer_desc" class="form-control" min="0" max="100"
        placeholder="Buy 1 Get 1">
      </div>



      <div>
        <label for="validity">Validity</label>
        <input type="datetime-local" id="validity" name="validity" class="form-control" min="0" max="100">
      </div>

      <div class="card-action">
        <button class="btn btn-success" type="submit">Submit</button>
        <button class="btn btn-danger">Cancel</button>
      </div>
      </form>

      @section("scripts")
      <script>
      $(document).ready(function () {
        var price;
        $('#prod_select').on('change', function () {
        var selectedValue = $(this).val();
        price = $(this).find('option:selected').data('price');
        $("#dis_price").text(price);

        })


          $('#discount_value').on('keyup', function () {
            // alert(price);
            var dis = $(this).val();
        
            if (dis > 100) {
              alert("Discount cannot be more than 100");
              this.value = 0;
            } else {
              let offer_price = price - price * (dis / 100);
              $("#dis_price").text(offer_price);
            
            }
        });

      });




      </script>

      @endsection

    @endif

              <!-- <div class="form-group">
                    <label class="control-label"> Static </label>
                    <p class="form-control-static">hello@example.com</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-select" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" />
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" rows="5">
                          </textarea>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                      Agree with terms and conditions
                    </label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Recipient's username"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" />
                      <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="basic-url">Your vanity URL</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                      <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <span class="input-group-text">$</span>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-text">With textarea</span>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-black btn-border" type="button">
                        Button
                      </button>
                      <input type="text" class="form-control" placeholder="" aria-label=""
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-border dropdown-toggle" type="button"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-icon">
                      <input type="text" class="form-control" placeholder="Search for..." />
                      <span class="input-icon-addon">
                        <i class="fa fa-search"></i>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-user"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="Username" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Image Check</label>
                    <div class="row">
                      <div class="col-6 col-sm-4">
                        <label class="imagecheck mb-4">
                          <input name="imagecheck" type="checkbox" value="1" class="imagecheck-input" />
                          <figure class="imagecheck-figure">
                            <img src="../assets/img/examples/product1.jpg" alt="title" class="imagecheck-image" />
                          </figure>
                        </label>
                      </div>
                      <div class="col-6 col-sm-4">
                        <label class="imagecheck mb-4">
                          <input name="imagecheck" type="checkbox" value="2" class="imagecheck-input" checked="" />
                          <figure class="imagecheck-figure">
                            <img src="../assets/img/examples/product4.jpg" alt="title" class="imagecheck-image" />
                          </figure>
                        </label>
                      </div>
                      <div class="col-6 col-sm-4">
                        <label class="imagecheck mb-4">
                          <input name="imagecheck" type="checkbox" value="3" class="imagecheck-input" />
                          <figure class="imagecheck-figure">
                            <img src="../assets/img/examples/product3.jpg" alt="title" class="imagecheck-image" />
                          </figure>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Color Input</label>
                    <div class="row gutters-xs">
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="dark" class="colorinput-input" />
                          <span class="colorinput-color bg-black"></span>
                        </label>
                      </div>
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="primary" class="colorinput-input" />
                          <span class="colorinput-color bg-primary"></span>
                        </label>
                      </div>
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="secondary" class="colorinput-input" />
                          <span class="colorinput-color bg-secondary"></span>
                        </label>
                      </div>
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="info" class="colorinput-input" />
                          <span class="colorinput-color bg-info"></span>
                        </label>
                      </div>
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="success" class="colorinput-input" />
                          <span class="colorinput-color bg-success"></span>
                        </label>
                      </div>
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="danger" class="colorinput-input" />
                          <span class="colorinput-color bg-danger"></span>
                        </label>
                      </div>
                      <div class="col-auto">
                        <label class="colorinput">
                          <input name="color" type="checkbox" value="warning" class="colorinput-input" />
                          <span class="colorinput-color bg-warning"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Size</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="value" value="50" class="selectgroup-input" checked="" />
                        <span class="selectgroup-button">S</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="value" value="100" class="selectgroup-input" />
                        <span class="selectgroup-button">M</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="value" value="150" class="selectgroup-input" />
                        <span class="selectgroup-button">L</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="value" value="200" class="selectgroup-input" />
                        <span class="selectgroup-button">XL</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Icons input</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="transportation" value="2" class="selectgroup-input" />
                        <span class="selectgroup-button selectgroup-button-icon"><i
                            class="icon-screen-smartphone"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="transportation" value="1" class="selectgroup-input" checked="" />
                        <span class="selectgroup-button selectgroup-button-icon"><i
                            class="icon-screen-tablet"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="transportation" value="6" class="selectgroup-input" />
                        <span class="selectgroup-button selectgroup-button-icon"><i
                            class="icon-screen-desktop"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="transportation" value="6" class="selectgroup-input" />
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times"></i></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label d-block">Icon input</label>
                    <div class="selectgroup selectgroup-secondary selectgroup-pills">
                      <label class="selectgroup-item">
                        <input type="radio" name="icon-input" value="1" class="selectgroup-input" checked="" />
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-sun"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="icon-input" value="2" class="selectgroup-input" />
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-moon"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="icon-input" value="3" class="selectgroup-input" />
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-tint"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="icon-input" value="4" class="selectgroup-input" />
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-cloud"></i></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Your skills</label>
                    <div class="selectgroup selectgroup-pills">
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="" />
                        <span class="selectgroup-button">HTML</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="CSS" class="selectgroup-input" />
                        <span class="selectgroup-button">CSS</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="PHP" class="selectgroup-input" />
                        <span class="selectgroup-button">PHP</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input" />
                        <span class="selectgroup-button">JavaScript</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="Ruby" class="selectgroup-input" />
                        <span class="selectgroup-button">Ruby</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="Ruby" class="selectgroup-input" />
                        <span class="selectgroup-button">Ruby</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="checkbox" name="value" value="C++" class="selectgroup-input" />
                        <span class="selectgroup-button">C++</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label class="mb-3"><b>Form Group Default</b></label>
                  <div class="form-group form-group-default">
                    <label>Input</label>
                    <input id="Name" type="text" class="form-control" placeholder="Fill Name" />
                  </div>
                  <div class="form-group form-group-default">
                    <label>Select</label>
                    <select class="form-select" id="formGroupDefaultSelect">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <label class="mt-3 mb-3"><b>Form Floating Label</b></label>
                  <div class="form-floating form-floating-custom mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating form-floating-custom mb-3">
                    <select class="form-select" id="selectFloatingLabel" required>
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                    <label for="selectFloatingLabel">Select</label>
                  </div>

                  <div class="form-group">
                    <label for="largeInput">Large Input</label>
                    <input type="text" class="form-control form-control-lg" id="largeInput" placeholder="Large Input" />
                  </div>
                  <div class="form-group">
                    <label for="largeInput">Default Input</label>
                    <input type="text" class="form-control form-control" id="defaultInput"
                      placeholder="Default Input" />
                  </div>
                  <div class="form-group">
                    <label for="smallInput">Small Input</label>
                    <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="Small Input" />
                  </div>
                  <div class="form-group">
                    <label for="largeSelect">Large Select</label>
                    <select class="form-select form-control-lg" id="largeSelect">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="defaultSelect">Default Select</label>
                    <select class="form-select form-control" id="defaultSelect">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="smallSelect">Small Select</label>
                    <select class="form-select form-control-sm" id="smallSelect">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div> -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- <footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
     
      <div class="copyright">
        2024, made with <i class="fa fa-heart heart text-danger"></i> by
        <a href="http://www.mathew2004.github.io">Evangel</a>
      </div>
      <!-- <div>
        Distributed by
        <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
      </div> -->
</div>

<script>
  document.getElementById('offer_type').addEventListener('change', function () {

    var selectedValue = this.value;
    var discountInput = document.getElementById('discount_input');
    var offer = document.getElementById('offer');
    var offer_field = document.getElementById('offer_desc');
    var dis_field = document.getElementById('discount_value');

    if (selectedValue == '2') {
      discountInput.style.display = 'block'; // Show the discount input field
      offer.style.display = 'none'; // Show the discount input field
      offer_field.value = "";
    } else if (selectedValue == '1') {
      offer.style.display = 'block'; // Hide the discount input field
      discountInput.style.display = 'none'; // Hide the discount input field
      dis_field.value = 0;
    }
  });

</script>