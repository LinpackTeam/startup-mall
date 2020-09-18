@extends('admin.layout.app')
 
@section ('content')

 <style>
     input[type="file"] {
    background-color:transparent;
    padding:0px;
}

 </style>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example8" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>S.No</th>
            <th>product Name</th>
            <th>Start-up Name</th>
            <th>MRP</th>
            <th>Product quantity</th>
            <th>product stock</th>
            <th>product Description</th>
            <th>Action</th>
            </tr>
          </thead>
    
          <tbody>
          @if(count($product)>0)
                          @php $i=1; @endphp
                          @foreach($product as $products)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$products->product_name}}</td>
                           <td>{{$products->brand_name}}</td>
                           <td>{{$products->mrp}}</td>
                             <td>{{$products->qty}} &nbsp;{{$products->unit}}</td>
                             <td>{{$products->stock}}</td>
                            <td>{{$products->description}}</td>
                            <td>
                               <a href="#" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;" style="color: #008000;"><i class="fa fa-eye" style="width: 10px;"></i></a>
                               <a href="#" class="btn btn-success">Approve</a>
              <a href="#" class="btn btn-danger">Reject</a>
							</td>

                        </tr>
                        @php $i++; @endphp
                        @endforeach
                      @else
                        <tr>
                          <td>No data found</td>
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
<div class="modal fade" id="exampleModal{{$products->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Do you want to delete product?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="{{route('delete-product', $products->product_id)}}" class="btn btn-primary">Delete</a>
			</div>
		</div>
	</div>
</div>
@endforeach   
@endsection