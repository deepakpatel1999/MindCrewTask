<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$per = DB::table('permission')->where('status','=', 1)->get();
    	return view('user_dashboard',compact('per'));
        //return view('home');
    }
    public function handleAdmin()
    {
    	return view('admin_dashboard');
    	//return view('handleAdmin');
    }
    public function User_list()
    {
    	$user = DB::table('users')->where('is_admin','=', 0)->get();

    	return view('User_list', compact('user'));

    }
    public function permission()
    {
    	$permission = DB::table('permission')->get();

    	return view('permission', compact('permission'));

    }
    public function Program()
    {
    	return view('program');
    	
    }
    public function Programfile(Request $request)
    {
    	$files=$request->file;
$fp = fopen($files, "r");//open file in read mode    
while(!feof($fp)) {  
	echo fgetc($fp);  
}  
fclose($fp); 



}
public function update_permission(Request $request)
{
	$id=$request->id;
	$status=$request->status;
	$result= DB::table('permission')->where('id', $id)->update(['status'=>$status]);
	return $result;

}

public function User_add(Request $request)
{
	$this->validate($request,[
		'name'=>'required',
		'email'=>'required',
		'password'=>'required'
	]);
	$name= $request->name;
	$email= $request->email;
	$pass= $request->password;
	$password= bcrypt($request->password);
	$remember_token= $request->_token;
	$created_at=date("Y/m/d H:i:s");
	$use=DB::table('users')->insert(['name'=>$name,'email'=>$email,'password'=>
		$password,'created_at'=>$created_at,'remember_token'=>$remember_token]);

 	$mail = Mail::raw('Dear User your Name-'.$name.',Email-'.$email.'<br>Password-'.$pass, function ($message) use($email) {
		$message->from('test@gmail.com');
		$message->to($email);
		$message->subject('User Login Details');
  });
	if($use){
		return redirect()->back()->with('succsess',"Record successfully");
	}else{
		return redirect()->back()->with('faile',"somthing wrong");
	}   
}
public function User_adit(Request $request)
{
	$this->validate($request,[
		'name'=>'required',
		'email'=>'required',
		'password'=>'required'
	]);
	$id= $request->id;
	$name= $request->name;
	$email= $request->email;
	$password= bcrypt($request->password);
	$remember_token= $request->_token;
	$created_at=date("Y/m/d H:i:s");
	$use=DB::table('users')->where('id',$id)->update(['name'=>$name,'email'=>$email,'password'=>$password,'created_at'=>$created_at,'remember_token'=>$remember_token]);
	if($use){
		return redirect()->back()->with('upsuccsess',"Update successfully");
	}else{
		return redirect()->back()->with('uffaile',"somthing wrong");
	}   
}
public function delete(Request $request)
{ 
	$id=$request->id;
	$delete = DB::table('users')->where('id',$id)->delete();

	if($delete){
		return redirect()->back()->with('delsuccsess',"delete successfully");
	}else{
		return redirect()->back()->with('delfaile',"somthing wrong");
	} 
}
}
