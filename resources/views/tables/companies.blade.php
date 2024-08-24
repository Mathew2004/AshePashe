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
            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
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
                  <th>Category</th>
                  <th>Division</th>
                  <th>City</th>
                  <th>Map</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($compaines as $company)
            <tr>
              <td>{{$company->name}}</td>
              <td>{{$company->description}}</td>
              <td>{{$company->division}}</td>
              <td>{{$company->city}}</td>
              <td>{{$company->map}}</td>
              <!-- <td>Edinburgh</td> -->
              <td>
              <div class="form-button-action">
                <button type="button" id="edit-btn" data-id="{{$company->id}}" data-name="{{$company->name}}"
                data-description="{{$company->description}}" data-division="{{$company->division}}"
                data-city="{{$company->city}}" data-map="{{$company->map}}" data-cat="{{$company->category}}"
                data-iframe = "{{$company->iframe}}" data-banner="{{$company->image}}"
                data-bs-toggle="modal" data-bs-target="#updateModal" title=""
                class="btn btn-link btn-primary btn-lg edit-btn" data-original-title="Edit Task">
                <i class="fa fa-edit"></i>
                </button>
                <!-- <button type="button" data-bs-toggle="tooltip" data-id="{{$company->id}}" title="" class="btn btn-link btn-danger delete-btn"
            data-original-title="Remove">
            <i class="fa fa-times"></i>
            </button> -->
                <form action="{{ route('company.destroy', $company->id) }}" method="POST"
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

        <form id="editForm" method="POST" action="{{ route('companies.update', ['id' => 0]) }}" enctype="multipart/form-data"> @csrf
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Name</label>
                <input id="addName" name="name" type="text" class="form-control" placeholder="fill name" />
                @error('name')
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
              <div class="form-group form-group-default">
                <label>Category</label>
                <input id="addCat" name="category" type="text" class="form-control" placeholder="fill name" />
                @error('category')
          {{$message}}
        @enderror
              </div>
              <div class="form-group form-group-default">
                <label>Division</label>
                <input id="addDiv" name="division" type="text" class="form-control" placeholder="fill name" />
                @error('division')
                  {{$message}}
                @enderror
              </div>
              <div class="form-group form-group-default">
                <label>City</label>
                <input id="addCity" name="city" name="category" type="text" class="form-control"
                  placeholder="fill name" />
                @error('city')
                  {{$message}}
                @enderror
              </div>
              <div class="form-group form-group-default">
                <label>Map</label>
                <input id="addMap" name="map" type="text" class="form-control" placeholder="fill name" />
                @error('map')
                  {{$message}}
                @enderror
              </div>
              <div class="form-group form-group-default">
                <label>Iframe</label>
                <input id="addIframe" name="iframe" type="text" class="form-control" placeholder="fill name" />
                @error('map')
                  {{$message}}
                @enderror
              </div>
              <div class="form-group form-group-default">
                <label>Banner</label>
                <input id="addBanner" name="image" type="file"  class="form-control" placeholder="fill name" />
                <!-- <img src="{{$company->image}}" alt=""> -->
                @error('image')
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
      var cat = $(this).data('cat');
      var desc = $(this).data('description');
      var div = $(this).data('division');
      var city = $(this).data('city');
      var map = $(this).data('map');
      var iframe = $(this).data('iframe');
      var banner = $(this).data('banner');

      alert(desc);
      // Set the values in the modal
      $('#addName').val(name);
      $('.desc').val(name);
      // $('#desc').innerHTML(desc);

      $('#addCat').val(cat);
      $('#addDiv').val(div);
      $('#addCity').val(city);
      $('#addMap').val(map);
      $('#addId').val(id);
      $('#addIframe').val(iframe);
      $('#banner').val(banner);

      // Update the form action with the correct route
      var formAction = "{{ route('companies.update', ':id') }}";
      formAction = formAction.replace(':id', id);
      $('#editForm').attr('action', formAction);

    });



  });




</script>
@endsection