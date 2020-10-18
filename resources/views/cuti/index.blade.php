@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h2 class="float-left " style="padding-top:0.5%">Leave Request</h2>											
			<a href="{{ route('cuties.create') }}" class="btn btn-primary float-right">CREATE</a>
		</div>				
		<div class="col-md-12">
			<form action="{{ route('cuties.filter') }}" method="GET">								  
				<div class="form-row">
				  <div class="form-group col-md-3">
					<label for="inputCity">Start Date</label>
					<input type="date" name="start_date" class="form-control date-picker" id="start_date">
				  </div>				  
				  <div class="form-group col-md-3">
					<label for="inputZip">End Date</label>
					<input type="date" name="end_date" class="form-control" id="end_date">
				  </div>
				  <div class="form-group col-md-3">
					<label for="inputCity">Request</label>
					<select name="user_id" class="form-control">
						@foreach ($users as $user)
							<option value="{{$user->id}}">
								{{ $user->name }}
							</option>
						@endforeach
					</select>
				  </div>
				  <div class="form-group col-md-3">
					<label for="inputCity">Keterangan</label>
					<input type="text" name="keterangan" class="form-control" id="start_date">
				  </div>
				</div>
				<div class="float-right">
					<button type="submit" class="btn btn-primary" id="generate"><i class="fa fa-search"></i> Generate</button>
					<a href="{{ route('cuties.index') }}" class="btn btn-success"><i class="fa fa-undo"></i> Refresh</a>
				</div>
			</form>
		</div>
		<br>
		<div class="container">
			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
			<div class="table-responsive myTable" id="myTable">		
			<table class="table align-items-center table-flush">
				<thead class="thead-light">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Tanggal Request</th>
					<th scope="col">Requester</th>				
					<th scope="col">Keterangan</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				@foreach ($cuti as $item)
				<tbody>
				<tr>
					<td>{{ ++$i }}</td>	
					<td>{{ $item->request_date }}</td>
					<td>{{ @$item->user->name}}</td>
					<td>{{ $item->keterangan}}</td>
					<td>
						<form action="{{ route('cuties.destroy',$item->id) }}" method="POST">                    
			
							<a class="btn btn-sm btn-warning" href="{{ route('cuties.edit',$item->id) }}">Edit</a>							
							@csrf
							@method('DELETE')
							
							<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
							<a class="btn btn-sm btn-primary" href="{{ route('cuties.detail',$item->id) }}">Detail</a>
						</form>
					</td>
				</tr>
				</tbody>				
				@endforeach
			</table>
		{{ $cuti->links() }}
		</div>
		</div>
	</div>
@endsection