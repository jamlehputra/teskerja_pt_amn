<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Cuti;
use App\Rincian;
use App\User;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'pegawai'){
            $cuti = Cuti::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(5);
        }else{

            $cuti = Cuti::orderBy('id', 'DESC')->paginate(5);
        }
        // $cuti = Cuti::orderBy('id', 'DESC')->paginate(5);

        $users = User::all();
        return view('cuti.index', compact('cuti', 'users'))
        ->with('i');
    }

    public function create()
    {
        return view('cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([           
            'request_date' => 'required|date',           
            'keterangan' => 'required', 
            'moreFields.*.dari_tanggal' => 'required|date',
            'moreFields.*.sampai_tanggal' => 'required|date',
            'moreFields.*.jenis_cuti' => 'required',                      
        ]);     
            $user = Auth()->user()->id;
            $lastId = Cuti::create([               
                'user_id' => $user,
                'request_date' => $request->request_date,                
                'keterangan' => $request->keterangan,                               
            ]);                   
        foreach ($request->moreFields as $key => $value) {
            Rincian::create( $value + ['cuti_id' => $lastId->id]);
        }
            
        return redirect()->route('cuties.detail',[$lastId->id])
                        ->with('success','Cuti created successfully.');
    }

    public function detail($id)
    {
        $cuti = Cuti::where('id', $id)->first();
        $detail = Rincian::where('cuti_id', $id)->get();
        return view('cuti.detail',compact('detail', 'cuti'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function edit($id)
    {
        $cuti = Cuti::where('id', $id)->first();
        // dd($cuti);
        $detail = Rincian::where('cuti_id', $id)->get();
        return view('cuti.edit',compact('detail', 'cuti'))
        ->with('i', (request()->input('page', 1) - 1) * 5);        
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::find($id);
        // dd($cuti);
        $request->validate([           
            'request_date' => 'required|date',           
            'keterangan' => 'required', 
            'moreFields.*.dari_tanggal' => 'required|date',
            'moreFields.*.sampai_tanggal' => 'required|date',
            'moreFields.*.jenis_cuti' => 'required',                                 
        ]);     
            $user = Auth()->user()->id;
            $lastId = Cuti::where('id',$cuti->id)->update([               
                'user_id' => $user,
                'request_date' => $request->request_date,                
                'keterangan' => $request->keterangan,                               
            ]);                   
        foreach ($request->moreFields as $key => $value) {
            Rincian::where('id',$value['id'])->update([
                'cuti_id' => $cuti->id,
                'dari_tanggal' => $value['dari_tanggal'],
                'sampai_tanggal' => $value['sampai_tanggal'],
                'jenis_cuti' => $value['jenis_cuti']
            ]);
        }
            
        return redirect()->route('cuties.index')
                        ->with('success','Cuti updated successfully.');
    }
    
    public function filter(Request $request)
    {
        // dd($request['keterangan']);
        $cuti = Cuti::whereBetween(
            'request_date', 
            [
                $request['start_date'],
                $request['end_date']
            ])
            ->where(
                'user_id', $request['user_id']
            )
            ->where(
                'keterangan', 'like', "%".$request['keterangan']."%"
            )->orderBy('id', 'DESC')->paginate(5);
            

        $users = User::all();
        return view('cuti.index', compact('cuti', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function destroy($id)
    {
        $cuti = Cuti::find($id);
        $cuti->delete();        
        return redirect()->route('cuties.index')
                        ->with('success','Deleted successfully');
    }
}
