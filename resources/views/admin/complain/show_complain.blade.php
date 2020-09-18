@extends('admin.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">
 

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Complains</h6>
      @if (count($errors) > 0)
                  @if($errors->any())
                    <div class="alert alert-primary" role="alert">
                      {{$errors->first()}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                  @endif
              @endif
        <a class="btn btn-success m-auto" style="float: right;" href="{{route('adminAddcomplain')}}">Add</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>S.No</th>
            <th>Complain Name</th>
			<th>Description</th>
            <th>Action</th>
            </tr>
          </thead>
         
          <tbody>
          @if(count($admincomplain)>0)
          @php $i=1; @endphp
          @foreach($admincomplain as $admincomplain)
        <tr>
            <td>{{$i}}</td>
            <td>{{$admincomplain->complain_name}}</td>
			<td align="center">{{$admincomplain->description}}</td>
              <td>
              <a href="{{route('adminEditcomplain', [$admincomplain->complain_id])}}" class="btn btn-primary">Edit</a>
              <a href="{{route('adminDeletecomplain', [$admincomplain->complain_id])}}" class="btn btn-danger">Delete</a>
        </td>
        </tr>
              @php $i++; @endphp
                @endforeach
              @else
                <tr>
                  <td>No data found</td>
                </tr>
              @endif
                       
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>

@endsection