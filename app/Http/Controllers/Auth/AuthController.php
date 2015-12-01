<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    // Where should the user be redirected to if their login succeeds?
	protected $redirectPath = '/profile';

	// Where should the user be redirected to if their login fails?
	protected $loginPath = '/login';

	// Where should the user be redirected to after logging out?
	protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:60',
            'username' => 'required|max:20',
            'city' => 'alpha|max:255',
            'country' => 'alpha|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'bio' => $data['bio'],
        ]);
    }
    
    /**
 	* Log the user out of the application.
 	*
 	* @return \Illuminate\Http\Response
 	*/
	public function getLogout()
	{
		// only show flash message if user logging out
		if (\Auth::check()) {
        	\Session::flash('flash_message', 'You have been logged out.');
        }
        
    	\Auth::logout();
    	return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
	}
	
	/**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
	public function getRegister() {
		return view("auth.register")->with('states', $this->getStates());
	}
	
   /**
    *
    */
    public function getStates() {
    	return file(storage_path() . "/app/text/states.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }
}
