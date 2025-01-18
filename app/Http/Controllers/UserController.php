<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\Http\Requests\StoreUserRequest;
use Inertia\Inertia;

class UserController extends Controller
{
	public function getSignup(){
		
		return Inertia::render('Signup',[
			'roles' => Role::all()
		]);
	}
	
	public function postSignup(StoreUserRequest $request){
		
		$data = $request->validated();

		$user = new User();
		$user->first_name = $data['first_name'];
		$user->email = $data['email'];		
		$user->password = $data['password'];
		$user->role_id = $data['role_id'];
		
		$user->save();	
		
		return Inertia::render('Login');
	}
	
	public function getLogin(){
		return Inertia::render('Login');
	}
	
	public function postLogin(Request $request){
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
		]);
		
		if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
			if (Auth::user()->role_id == 1) { //Librarian			
				return redirect('/');
			} else {				
				return to_route('search');
			}
		}else{
			$errors = new MessageBag(['password' => ['Your email or password was not correct. Please try again!']]);
			return redirect()->back()->withErrors($errors);
		}
	}
	
	public function getLogout(){
		Auth::logout();
		
		return redirect('/');
	}
}