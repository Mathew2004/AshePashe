<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables.Net</h3>
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
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Add Row</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                            data-bs-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">


                    <div class="table-responsive">



                        <table id="add-row" class="display table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>Price</th>
                                    <th>Res Id</th>
                                    <!-- <th>Map</th> -->
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($offers as $offer)
                                                        <tr>
                                                            <td>{{ App\Models\Products::where('id', $offer->product_id)->first()->name }}</td>
                                                            <td>{{$offer->offer_percent}}%</td>
                                                            <td>{{$offer->offer_buy}}</td>
                                                            <td>{{natural_time(new DateTime($offer->validity)) }}</td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <button type="button" id="edit-btn" data-id="{{$offer->id}}"
                                                                        data-product="{{$offer->product_id}}"
                                                                        data-product_name="{{ App\Models\Products::where('id', $offer->product_id)->first()->name }}"
                                                                        data-price="{{ App\Models\Products::where('id', $offer->product_id)->first()->price }}"
                                                                        data-offer_percent="{{$offer->offer_percent}}"
                                                                        data-offer_buy="{{$offer->offer_buy}}" data-validity="{{$offer->validity}}"
                                                                        
                                                                        data-bs-toggle="modal" data-bs-target="#updateModal" title=""
                                                                        class="btn btn-link btn-primary btn-lg edit-btn"
                                                                        data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <!-- <button type="button" data-bs-toggle="tooltip" data-id="{{$offer->id}}" title="" class="btn btn-link btn-danger delete-btn"
                                    data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                    </button> -->
                                                                    <form action="{{ route('destroy.offer', $offer->id) }}" method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>


                                                                </div>
                                                            </td>

                                                        </tr>
                                @endforeach

                            </tbody>
                        </table>






                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-light"> Row </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p class="small">
          Create a new row using this form, make sure you
          fill them all
        </p> -->

                <form id="editForm" action="/update/offers/0" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group">
                        <label for="name">Offer Type</label>
                        <select name="offer_type" id="offer_type" class="form-select" value="{{old('offer_type')}}"
                            id="div">
                            <option value="2">Discount(%)</option>
                            <option value="1">Buy One Get One</option>


                        </select>
                        <p>Price: <span id="dis_price"></span></p>

                    </div>
                    <!-- Hidden input field, initially hidden -->
                    <div id="discount_input" style="display:block; margin-top: 10px;">
                        <label for="discount_value">Enter Discount Percentage:</label>
                        <input type="number" name="offer_percent" id="discount_value" class="form-control" min="0"
                            max="100" placeholder="Enter discount percentage" value="0">
                    </div>
                    <div id="offer" style="display:none; margin-top: 10px;">
                        <label for="offer_input">Offer Text</label>
                        <input type="text" name="offer_buy" id="offer_desc" class="form-control" min="0" max="100"
                            placeholder="Buy 1 Get 1">
                    </div>



                    <div>
                        <label for="validity">Validity</label>
                        <input type="datetime-local" id="validity" name="validity" class="form-control" min="0"
                            max="100">
                    </div>

                    <div class="card-action">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </form>

               
            </div>

        </div>
    </div>
</div>


</div>


@section('scripts')
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

        $('.edit-btn').on('click', function () {
            // alert('name');
            // Get data attributes from the clicked button
            var id = $(this).data('id');
            var product = $(this).data('product');
            var product_name = $(this).data('product_name');
            var percentage = $(this).data('offer_percent');
            var buy_get = $(this).data('offer_buy');
            var validity = $(this).data('validity');
            var price = $(this).data('price');
            var offer_desc = $(this).data('offer_desc');
           
            alert(id);
            // Set the values in the modal
            $('#prod_slt').val(product);
            $('#prod_slt').text(product_name);
            // $('#editor').html(desc);
            $('#discount_value').val(percentage);
            $('#validity').val(validity);
            $('#offer_desc').val(offer_desc);
            $('#dis_price').text(price-price*(percentage/100));



            // Update the form action with the correct route
            var formAction = `/update/offers/${id}`;
            // formAction = formAction.replace(':id', id);
            $('#editForm').attr('action', formAction);

        });



    });




</script>
@endsection