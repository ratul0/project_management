<?php



Route::get('/',['as'=> 'home','uses'=> function(){
	return View::make('home');
}]);

Route::get('emails/register/{code}',['as'=>'emails.register','uses' => 'AuthController@emailRegister']);




/*before Login*/
Route::group(['before'=>'guest'],function(){
	/*AuthController*/
	Route::get('login',['as'=> 'login','uses'=>'AuthController@login']);
	Route::post('login',['as'=> 'doLogin','uses'=>'AuthController@doLogin']);


	Route::get('register',['as'=> 'register','uses'=>'AuthController@register']);
	Route::post('register',['as'=> 'doRegister','uses'=>'AuthController@doRegister']);
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

	Route::get('registration/complete', array('as' => 'registration.complete', 'uses' => 'AuthController@completeRegistration'));
	Route::post('registration/complete', array('as' => 'registration.doComplete', 'uses' => 'AuthController@doCompleteRegistration'));


});


Route::group(['before'=>'Admin'],function(){
	Route::get('invite/teacher',['as'=> 'teacher.invite','uses'=>'AuthController@inviteTeacher']);
	Route::post('invite/teacher',['as'=> 'teacher.doInvite','uses'=>'AuthController@doInviteTeacher']);
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





