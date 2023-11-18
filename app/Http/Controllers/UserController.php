<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;
use Exception;
class UserController extends Controller
{
    public function  __construct(){
        $this->user = new User();
    }
    
    public function adminlogin(){
        return view('adminlogin');
    }
    public function userregister(){
        return view('userregister');
    }
    public function userlogin(){
        return view('userlogin');
    }

    public function logingoogle(){
        return socialite::driver('google')->redirect();
    }

    public function googlecallback(){
        $passwordshow = 'password';
        try{
            $user = Socialite::driver('google')->user();
            $finduser =$this->user::where('google_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
               return redirect('/home')->with('message',"User Login Successfully");
            }else{
                $newUser = User::create([
                    'name' =>$user->name,
                    'google_id' => $user->id,
                    'email' =>$user->email,
                    'password' =>encrypt('password'),
                ]);
                Auth::login($newUser);
               return redirect('/home')->with('message',"User Login Successfully");
            }
        } catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function saveuser(Request $r){
        $this->validate($r, ['name' => 'required','email' => 'required'],['name.required' => 'Name required','email.required' => 'Email required']);
        $this->user->name = $r->name;
        $this->user->user_role = isset($r->role)?$r->role:'subscriber';
        $this->user->email = $r->email;
        $this->user->password = isset($r->password)?$r->password:'password';
        $this->user->adminviewpassword = isset($r->password)?$r->password:'password';
        $this->user->save();

        $userId = Auth::id();
        $users = $this->user::where('id',$userId)->paginate(10);
        $userrole = isset($users[0]->user_role)?$users[0]->user_role:'';
        if($userrole == 'super_admin'){
            return redirect('/home')->with('message',"User registered Successfully");
        }else{
            return redirect('/userlogin')->with('message',"User registered Successfully");
        }






    }

    public function updateuser(Request $r, $id){
        $this->validate($r, ['name' => 'required','email' => 'required'],['name.required' => 'Name required','email.required' => 'Email required']);
        $user = User::find($id);
        $user->name = $r->name;
        $user->email = $r->email;
        $user->update();
        $userId = Auth::id();
        $users = $this->user::where('id',$userId)->paginate(10);
        $userrole = isset($users[0]->user_role)?$users[0]->user_role:'';
        return redirect('/home')->with('message',"User Detail Updated Successfully");
        
    }    

    public function updateuserbyadmin(Request $r){
        $user = User::find($r->ids);
        $user->name = $r->name;
        $user->email = $r->email;
        $user->user_role = $r->role;
        $user->password = isset($r->password)?$r->password:'password';
        $user->adminviewpassword = isset($r->password)?$r->password:'password';
        $user->update();
        echo json_encode(1);
        die;
    }    

    public function deleteuserbyadmin(Request $r){
        $user = User::find($r->ids);
        $user->delete();
        echo json_encode(1);
        die;
    }





   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $employee = $this->employee::find($id);
        $company = $this->company::pluck('name','id');
        return view('employee.edit-employee',['employee'=> $employee,'company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $employee = $this->employee::find($id);
        $employee->fname = $r->fname;
        $employee->lname = $r->lname;
        $employee->company = $r->company;
        $employee->email = $r->email;
        $employee->phone = $r->phone;
        $employee->save();
        return redirect('/employee')->with('message',"Employee Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = $this->employee::find($id);
        $employee->delete();
        return redirect('/employee')->with('message',"Employee Deleted Successfully");
    }
}