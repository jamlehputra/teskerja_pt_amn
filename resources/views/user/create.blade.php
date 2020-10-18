@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h2 class="float-left" style="padding-top:0.5%">Buat Cuti</h3>															
        </div>	
        <form action=" {{ url('user/store') }}" method="post">
            @csrf

           <div class="container-fluid">            
               <div class="pl-lg-4 mb-5">
                   <div class="row">
                     <div class="col-md-12">
                       <div class="form-group focused">
                         <label class="form-control-label">Nama</label>
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                         @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                         @endif
                       </div>
                     </div>
                     <div class="col-md-12">
                      <label class="form-control-label">Jabatan</label>
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required autocomplete="role" autofocus value="{{ old('role') }}">
                            <option value="" >Pilih Jabatan</option>
                            <option value="pegawai">Pegawai</option>
                            <option value="hrd">HRD</option>
                            <option value="admin">Admin</option>
                        </select>                                

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                      <label class="form-control-label">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                      <label class="form-control-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="col-md-12">
                        <label class="form-control-label">Password make sure</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    
                     <div class="col-md-12 mt-2">
                      <div class="form-group focused">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                      </div>
                    </div>
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

