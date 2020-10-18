@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h2 class="float-left" style="padding-top:0.5%">Edit Cuti</h3>															
        </div>	
        <form action="{{ route('cuties.update',$cuti->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

           <div class="container-fluid">            
               <div class="pl-lg-4 mb-5">
                   <div class="row">                  
                    
                    <div class="col-md-12">
                       <div class="form-group focused">
                         <label class="form-control-label">Request Date</label>
                        <input name="request_date" required class="form-control form-control-alternative" placeholder="Request Date" type="date" value="{{ $cuti->request_date }}">
                        @if ($errors->has('request_date'))
                          <span class="text-danger">{{ $errors->first('request_date') }}</span>
                         @endif
                       </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group focused">
                          <label class="form-control-label">Requester</label>
                          <input name="" required class="form-control form-control-alternative" disabled value=" {{ Auth::user()->name }}" type="text">
                        </div>
                      </div>
                     <div class="col-md-12">
                       <div class="form-group focused">
                         <label class="form-control-label">Keterangan</label>
                       <input name="keterangan" required class="form-control form-control-alternative" placeholder="Keterangan" type="text" value="{{ $cuti->keterangan }}">
                       @if ($errors->has('keterangan'))
                          <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                         @endif
                       </div>
                     </div>
                     
                     {{--Rincian Cuti --}}
                     <div class="col-md-12">                                                
                          @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            </div>
                          @endif
                          @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                            </div>
                          @endif
                          <table class="table table-bordered" id="dynamicAddRemove">                                                              
                            <tr>
                              <th>Dari Tanggal</th>
                              <th>Sampai Tanggal</th>
                              <th>Jenis Cuti</th>                              
                            </tr>
                            @foreach ($detail as $d)                                               
                            <tr> 
                                <input type="hidden" name="moreFields[{{ $loop->index }}][id]" value="{{ $d->id }}">
                                <td>
                                    
                                    <input type="date" required name="moreFields[{{ $loop->index }}][dari_tanggal]"  class="form-control " value="{{ $d->dari_tanggal }}" /></td>                          
                                <td><input type="date" required name="moreFields[{{ $loop->index }}][sampai_tanggal]"  class="form-control" value="{{ $d->sampai_tanggal }}" /></td>  
                                <td><input type="text" required name="moreFields[{{ $loop->index }}][jenis_cuti]" placeholder="Jenis Cuti" class="form-control" value="{{ $d->jenis_cuti }}" /></td>                                
                            </tr>  
                            @endforeach             
                          </table> 
                          <div class="col-md-12">
                            <div class="form-group focused float-right mt-3">
                              <a href="{{ route('cuties.index') }}" class="btn btn-light">Back</a>
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                     </div>
                     {{-- End Rincian --}}
                   </div>
               </div>
           </div>           
        </form> 
      </div>      
<script src="{{asset('admin/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
  var i = 0;
  $("#add-btn").click(function(){
  ++i;
  $("#dynamicAddRemove").append('<tr><td><input type="date" name="moreFields['+i+'][dari_tanggal]" class="form-control" /></td><td><input type="date" name="moreFields['+i+'][sampai_tanggal]"  class="form-control" /></td><td><input type="text" name="moreFields['+i+'][jenis_cuti]" placeholder="Jenis Cuti" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
  });
  $(document).on('click', '.remove-tr', function(){  
  $(this).parents('tr').remove();
  });  
  </script>
@endsection