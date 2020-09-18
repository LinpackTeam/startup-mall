@extends('support_team.layout.app')
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
            <th>Founder Name</th>
            <th>Email</th>
            <th>Contact</th>
			<th>Remark</th>
            <th>Action</th>
            </tr>
          </thead>		  
          <tbody>
          @if(count($product)>0)
                          @php $i=1; @endphp
                          @foreach($product as $products)
						  
                        <tr>
						<form method="POST" action="{{route('status_update')}}" >
							  {{csrf_field()}}
                            <td>{{$i}}</td>
							 <td>{{$products->id}}</td>
                            <td>{{$products->name}}</td>
                            <td>{{$products->founder_name}}</td>
                           <td>{{$products->email}}</td>
                             <td>{{$products->Contact}}</td>
                           <td><input type="text" name="remark" style="border:none" placeholder="Write Remark if any">
						   <input type="hidden" name="id" value="{{$products->id}}">
						   </td>
                            <td>
							
						<input type="submit" name="accept" value="accept" >
						<input type="submit" name="accept" value="reject" >
						<input type="submit" name="accept" value="pending" >       
							</td>
							</form>
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