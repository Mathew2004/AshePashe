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
                  <th>id</th>
                  <th>Category</th>
                  
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
             
              <td>
              <div class="form-button-action">
                <button type="button" id="edit-btn" data-id="{{$category->id}}" data-name="{{$category->name}}"
                
                data-bs-toggle="modal" data-bs-target="#updateModal" title=""
                class="btn btn-link btn-primary btn-lg edit-btn" data-original-title="Edit Task">
                <i class="fa fa-edit"></i>
                </button>
                <!-- <button type="button" data-bs-toggle="tooltip" data-id="{{$category->id}}" title="" class="btn btn-link btn-danger delete-btn"
            data-original-title="Remove">
            <i class="fa fa-times"></i>
            </button> -->
                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
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

        <form id="editForm" method="POST" action="{{ route('update.category', ['id' => 0]) }}"> @csrf
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Name</label>
                <input id="addName" name="name" type="text" class="form-control" placeholder="fill name" />
                @error('name')
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
   

      alert(name);
      // Set the values in the modal
      $('#addName').val(name);
    
      // Update the form action with the correct route
      var formAction = "{{ route('update.category', ':id') }}";
      formAction = formAction.replace(':id', id);
      $('#editForm').attr('action', formAction);

    });



  });




</script>
@endsection