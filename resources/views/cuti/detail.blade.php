@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h2 class="float-left " style="padding-top:0.5%">Detail Cuti</h2>											
		</div>				
		<div class="card-body">
            @foreach ($cuti as $c)                
            <form>                         
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-username">Request Date</label>
                      <input type="text" id="input-username" class="form-control form-control-alternative" disabled placeholder="" value="{{$c->request_date}}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Requester</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" disabled placeholder="Jamaludin" value="{{$c->user->name}}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Keterangan</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" disabled placeholder="Liburan" value="{{$c->keterangan}}">
                    </div>
                  </div>
                </div>
            </form>
            @endforeach          
            <br>
		<div class="table-responsive myTable" id="myTable">		
		<table class="table align-items-center table-flush">
			<thead class="thead-light">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Tanggal Request</th>
				<th scope="col">Requester</th>				
				<th scope="col">Keterangan</th>
			</tr>
            </thead>
            @foreach ($detail as $item)                
			<tbody>
                <td>{{ ++$i }}</td>
                <td>{{ $item->dari_tanggal }}</td>
                <td>{{ $item->sampai_tanggal }}</td>
                <td>{{ $item->jenis_cuti }}</td>
            </tbody>
            @endforeach  
        </table>
        <div class="col-md-12 ">
            <div class="form-group focused float-right mt-3">
                <a href="{{ route('cuties.index') }}" class="btn btn-primary">Back</a>
                <a href="" class="btn btn-warning">Edit</a>
            </div>
        </div>
		</div>
        </div>
    </div>    
@endsection