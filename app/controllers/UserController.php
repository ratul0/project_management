<?php

class UserController extends \BaseController {



	public function profile(){
		return View::make('users.showProfile')
					->with('user',Auth::user())
					->with('title','Profile');
	}

	public function profileUpdate(){


		return View::make('users.updateProfile')
					->with('user',Auth::user())
					->with('title','Profile');
	}




	public function doProfile(){
		$rules = [
					'first_name' => 'required',
					'last_name'  => 'required',
					'mobile'     => 'required'
		];

		$data = Input::all();
		$validation = Validator::make($data,$rules);
		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{

			//$user = User::find(Auth::user()->id);
			$user = Auth::user();
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->mobile = $data['mobile'];

			
			if($user->save()){

				return Redirect::route('user.profile.show')
							->with('success',"Account Updated Successfully");
			}else{
				return Redirect::back()
							->with('error',"something went wrong! Try again.")
							->withInput();
			}
		}
	}

}