<?php

class AuthController extends \BaseController {

	public function login()
	{
		return View::make('auth.login')
					->with('title', 'Login');
	}

	public function doLogin()
	{
		$rules = array
		(
					'email'    => 'required',
					'password' => 'required'
		);
		$allInput = Input::all();
		$validation = Validator::make($allInput, $rules);

		//dd($allInput);


		if ($validation->fails())
		{

			return Redirect::route('login')
						->withInput()
						->withErrors($validation);
		} else
		{

			$credentials = array
			(
						'email'    => Input::get('email'),
						'password' => Input::get('password')
			);

			if (Auth::attempt($credentials))
			{
				return Redirect::intended('dashboard');
			} else
			{
				return Redirect::route('login')
							->withInput()
							->withErrors('Error in Email Address or Password.');
			}
		}
	}

	public function logout(){
		Auth::logout();

		return Redirect::route('login')
					->with('success','You are Successfully logged out.');
	}

	public function register(){
		return View::make('auth.register')
					->with('title','Register');
	}

	public function doRegister(){
		$rules = [
					'name'                  => 'required|alpha_num',
					'email'                 => 'required|email|unique:users',
					'password'              => 'required|confirmed',
					'password_confirmation' => 'required'
		];

		$data = Input::all();

		$validation = Validator::make($data,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{

			$user = new User();
			$user->name = $data['name'];
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);

			if($user->save()){
				return Redirect::route('login')
							->with('success',"Account Created Successfully.Login Now.");
			}else{
				return Redirect::back()
							->with('error',"something went wrong! Try again.")
							->withInput();
			}
		}

	}

	public function inviteTeacher(){
		return View::make('auth.inviteTeacher')
					->with('title','Invite Teacher');
	}

	public function doInviteTeacher(){
		$rules = [

					'email'                 =>	'required|email|unique:users'
		];
		$inputData = Input::all();
		$validator = Validator::make($inputData, $rules);

		if ($validator->fails()) {

			// redirect our user back to the form with the errors from the validator
			return Redirect::back()
						->withErrors($validator)->withInput();

		}else{

			$random_hash = md5(uniqid(rand(), true));
			$data = [
						'code'  =>  $random_hash
			];

			Mail::send('emails.register', $data, function($message) use ($inputData)
			{
				$message->to($inputData['email'])->subject('Welcome!');
			});

			$user = User::create([

						'email' => $inputData['email'],
						'password' 	=> Hash::make('user'),
						'confirmation_code' => $data['code'],
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')


			]);

			// attach user in assigned_role table
			$user->attachRole(Role::where('name',Config::get('globalData.roles.Teacher'))->first());


			return Redirect::route('dashboard')
						->with('success','Invitation send to Teacher.');
		}
	}


	public function emailRegister($code){
		if($user = User::where('confirmation_code',$code)->first()){
			Auth::login($user);
			return Redirect::route('registration.complete');
		}
	}

	public function completeRegistration(){
		return View::make('auth.teacherRegister');
	}

	public function doCompleteRegistration(){
		$rules = [
					'first_name' => 'required',
					'last_name'  => 'required',
					'mobile'     => 'required',
					'password'              =>	'required|confirmed',
					'password_confirmation' => 	'required'
		];
		$data = Input::all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {

			// redirect our user back to the form with the errors from the validator
			return Redirect::back()
						->withErrors($validator)->withInput();

		}else{
			$user = User::find(Auth::user()->id);

			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->mobile = $data['mobile'];
			$user->password = Hash::make($data['password']);
			$user->confirmation_code = null;
			if($user->save()){
				Auth::logout();
				return Redirect::route('login');

			}else{
				return Redirect::back()->withErrors($validator)->withInput();
			}
		}
	}

}