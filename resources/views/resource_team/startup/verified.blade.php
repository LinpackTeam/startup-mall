@extends('resource_team.layout.app')
@section ('content')
 <style>
     input[type="file"] {
    background-color:transparent;
    padding:0px;
}
 </style>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example8" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>S.No</th>
			<th>Start-up ID</th>
            <th>Start-up Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if(count($product)>0)
                          @php $i=1; @endphp
                          @foreach($product as $products)
                        <tr>
                            <td>{{$i}}</td>
							 <td>{{$products->startup_id}}</td>
                            <td>{{$products->name_startup}}</td>
                           <td>{{$products->email}}</td>
                             <td>{{$products->contact}}</td>
                           
                            <td>
                               <a href="{{route('view-startup',$products->startup_id)}}" style="width: 28px; padding-left: 5px;" class="btn btn-info" style="width: 10px;" style="color: #008000;"><i class="fa fa-eye" style="width: 10px;"></i></a>
              
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
@foreach($product as $products)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reject Start-Up</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
			
				Do you want to reject start-up?
				<input type="text" name="reason" placeholder="Specify the reason" required>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="{{route('reject', $products->id)}}" class="btn btn-primary">Reject</a>
			</div>
		</div>
	</div>
</div>
@endforeach 
@foreach($product as $products)
<!-- Modal -->
<div class="modal fade" id="exampleModal1{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Accept Start-Up</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Do you want to Accept the start-up?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="{{route('accept', $products->id)}}" class="btn btn-primary">Accept</a>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection