<?php



Route::get('/',['as'=> 'home','uses'=> function(){
	return View::make('home');
}]);

Route::get('emails/register/{code}',['as'=>'emails.register','uses' => 'AuthController@emailRegister']);
Route::get('emails/student/register/{code}',['as'=>'emails.student.register','uses' => 'AuthController@studentEmailRegister']);




/*before Login*/
Route::group(['before'=>'guest'],function(){
	/*AuthController*/
	Route::get('login',['as'=> 'login','uses'=>'AuthController@login']);
	Route::post('login',['as'=> 'doLogin','uses'=>'AuthController@doLogin']);



	/*AuthController*/
});

/*For All Logged In Users*/
Route::group(['before'=>'auth'],function(){
	/*AuthController*/
	Route::get('logout',['as'=> 'logout','uses'=>'AuthController@logout']);
	/*AuthController*/

	/*DashboardController*/
	Route::get('dashboard',['as'=> 'dashboard','uses'=>'DashboardController@home']);
	/*DashboardController*/

	/*UserController*/

	Route::get('user/profile',['as'=> 'user.profile.show','uses'=>'UserController@profile']);
	Route::get('user/profile/update',['as'=> 'user.profile.update','uses'=>'UserController@profileUpdate']);
	Route::put('user/profile',['as'=> 'user.doProfile','uses'=>'UserController@doProfile']);


	/*UserController*/



});


Route::group(['before'=>'Admin'],function(){
	Route::get('invite/teacher',['as'=> 'teacher.invite','uses'=>'AuthController@inviteTeacher']);
	Route::post('invite/teacher',['as'=> 'teacher.doInvite','uses'=>'AuthController@doInviteTeacher']);

	Route::get('invite/student',['as'=> 'student.invite','uses'=>'AuthController@inviteStudent']);
	Route::post('invite/student',['as'=> 'student.doInvite','uses'=>'AuthController@doInviteStudent']);
});

Route::group(['before'=>'Teacher'],function(){
	Route::get('registration/complete', ['as' => 'registration.complete', 'uses' => 'AuthController@completeRegistration']);
	Route::post('registration/complete', ['as' => 'registration.doComplete', 'uses' => 'AuthController@doCompleteRegistration']);

});

Route::group(['before'=>'Student'],function(){
	Route::get('registration/complete/student', ['as' => 'registration.student.complete', 'uses' => 'AuthController@completeStudentRegistration']);
	Route::post('registration/complete/student', ['as' => 'registration.student.doComplete', 'uses' => 'AuthController@doCompleteStudentRegistration']);

});

Route::group(['before'=> 'AdminTeacher'],function(){
	Route::resource('batches', 'BatchesController');
});




/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/test', function()
{
	return dd(Entrust::hasRole('Admin'));
	/*$data = ['name' => 'test'];

	Mail::send('emails.welcome', $data, function($message)
	{

		$message->to('ratulcse27@gmail.com')->subject('Welcome!');
	});*/



});





