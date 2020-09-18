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
            </tr>
          </thead>
          <tbody>
          @if(count($product)>0)
                          @php $i=1; @endphp
                          @foreach($product as $products)
                        <tr>
                            <td>{{$i}}</td>
							 <td>{{$products->city_id}}</td>
                            <td>{{$products->name_startup}}</td>
                            <td>{{$products->name_founder}}</td>
                           <td>{{$products->email}}</td>
                             <td>{{$products->contact}}</td>
                          

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