<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use Session;

class SpecificationController extends Controller
{
    
    public function index(){
        $phones=Specification::
            orderBy('id','desc')->simplepaginate(50);
        return view('phones.index',[
                'phones'=>$phones
            ]);
    }
    
    
    
    
    
    public function addPhoto(Request $request){
        $validator=Validator::make($request->all(),[
            'myfile'=>'required'
        ]);

        if($validator->fails()){
            return redirect('/specifications')
            ->withInput()
            ->withErrors($validator);
        }
        
        $result=$request->file('myfile')->store('phones');
        $id=$request->id;
        Specification::where('id',$id)
            ->update(
                ['image_url'=>$result]
            );
       

        Session::flash('add_photo','successfully added');
        return redirect('/specifications');
    }
    
    
    public function getPhoneByCompany($companyId){
        $phones=Specification::where('company_id',$companyId)->orderBy('id','desc')->simplepaginate(50);
        return view('phones.index',[
                'phones'=>$phones
        ]);
    }
    
    
    
    
        
    
    //route for mobile api;
    public function addPhone(Request $req){
        $phone_id=$req->phone_id;
        $my_key=$req->my_key;
        $datas=$req->datas;
        $company_id=$req->company_id;
        $name=$req->name;
   
        
         DB::table('specifications')
	    ->updateOrInsert(
	        ['phone_id'=>$phone_id],
	        [
	            
	            $my_key=>$datas,
	            'company_id'=>$company_id,
	            'name'=>$name
	        
	       ]
	   );
        
        return $my_key." added";
    }
    

    public function getPhones(Request $req){
        $company_id=$req->company_id;
        $count=($req->page)-1;
        $count=$count*30;
        $datas=DB::table('specifications')
            ->selectRaw("
                    id,
                    name,
                    name
                ")
            ->where('company_id',$company_id)
            ->orderBy('id','desc')
            ->offset($count)
            ->limit(30)
            ->get();
            
        return $datas;
        
    }
    
    public function getPhoneDetail($id){
        $data=Specification::find($id);

        if($data!=null){
            $data->Network=json_decode($data->Network,true);
            $data->Launch=json_decode($data->Launch,true);
            $data->Body=json_decode($data->Body,true);
            $data->Display=json_decode($data->Display,true);
            $data->Platform=json_decode($data->Platform,true);
            $data->Memory=json_decode($data->Memory,true);
            $data->Main_Camera=json_decode($data->Main_Camera,true);
            $data->Selfie_camera=json_decode($data->Selfie_camera,true);
            $data->Sound=json_decode($data->Sound,true);
            $data->Comms=json_decode($data->Comms,true);
            $data->Features=json_decode($data->Features,true);
            $data->Battery=json_decode($data->Battery,true);
            $data->Misc=json_decode($data->Misc,true);
            $data->Tests=json_decode($data->Tests,true);
        }
        
        return $data;
    }
    
    
}
