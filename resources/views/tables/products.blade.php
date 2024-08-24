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
                                @foreach ($products as $product)
                                                        <tr>
                                                            <td>{{$product->name}}</td>
                                                            <td>{{$product->description}}</td>
                                                            <td>{{$product->price}}</td>
                                                            <td>{{$product->company_id}}</td>
                                                            
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <button type="button" id="edit-btn" data-id="{{$product->id}}"
                                                                        data-name="{{$product->name}}"
                                                                        data-description="{{$product->description}}"
                                                                        data-price="{{$product->price}}"
                                                                        data-slug="{{$product->slug}}"
                                                                        data-company_id="{{$product->company_id}}" data-bs-toggle="modal"
                                                                        data-bs-target="#updateModal" title=""
                                                                        class="btn btn-link btn-primary btn-lg edit-btn"
                                                                        data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <!-- <button type="button" data-bs-toggle="tooltip" data-id="{{$product->id}}" title="" class="btn btn-link btn-danger delete-btn"
                                    data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                    </button> -->
                                                                    <form action="{{ route('destroy.product', $product->id) }}" method="POST"
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

                <form id="editForm" method="POST" action="{{ route('update.product', ['id' => 0]) }}"> @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Name</label>
                                <input id="addName" name="name" type="text" class="form-control"
                                    placeholder="fill name" />
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group form-group-default">
                                <label>Slug</label>
                                <input id="addSlug" name="slug" type="text" class="form-control"
                                    placeholder="fill Slug" />
                                @error('slug')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group form-group-default">
                                <label>Description</label>
                                <textarea name="description" class="desc" id="editor">
                                
                                </textarea>
                                @error('description')
                                    {{$message}}
                                @enderror
                            </div>

                        </div>
                        <div class="form-group form-group-default">
                            <label>Price</label>
                            <input id="price" name="price" type="text" class="form-control" placeholder="" />
                            @error('price')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="div">Select Restaurent</label>
                            <select name="company_id" class="form-select" id="div">
                                <option value="{{$product->company_id}}">{{$product->company_id}}</option>
                                @foreach ($companies as $company)

                                    <option value="{{$company->name}}">{{$company->name}}</option>
                                @endforeach

                            </select>
                            @error("company_id")
                                {{$message}}
                            @enderror
                        </div>


                    </div>




            </div>
            <div class="modal-footer border-0">
                <button type="submit" id="addRowButton" class="btn btn-primary">
                    Update
                </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


@section('scripts')
<script>
    $(document).ready(function () {

        $('.edit-btn').on('click', function () {
            // alert('name');
            // Get data attributes from the clicked button
            var id = $(this).data('id');
            var name = $(this).data('name');
            var slug = $(this).data('slug');
            var desc = $(this).data('description');
            var price = $(this).data('price');
            var company_id = $(this).data('company_id');


            alert(desc);
            // Set the values in the modal
            $('#addName').val(name);
            $('#addSlug').val(slug);
            $('#editor').html(desc);
            $('#price').val(price);
            $('#company_id').val(company_id);
            // $('#desc').innerHTML(desc);



            // Update the form action with the correct route
            var formAction = "{{ route('update.product', ':id') }}";
            formAction = formAction.replace(':id', id);
            $('#editForm').attr('action', formAction);

        });



    });




</script>
@endsection