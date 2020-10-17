@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h3 class="float-left " style="padding-top:0.5%">Data Absen</h3>											
				<a href="{{ url('user/create') }}" class="btn btn-primary float-right">CREATE</a>
		</div>					
		<div class="container">
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
			@foreach ($user as $item)
			<tbody>
			<tr>
				<td>{{ ++$i }}</td>	
				<td>{{ $item->name }}</td>
				<td>{{ @$item->email}}</td>
				<td>{{ $item->role}}</td>				
			</tr>
			</tbody>				
			@endforeach
		</table>
		{{ $user->links() }}
		</div>
		</div>
	</div>
@endsection