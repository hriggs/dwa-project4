<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

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
            'username' => 'required|max:20|unique:users',
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
	public function getRegister(Request $request) {
		return view("auth.register")->with(['states'=>$this->returnStates(), 'data'=>$this->returnDropdownData($request)]);
	}
	
	/**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        return redirect($this->redirectPath())->with(['states'=>$this->returnStates(), 'data'=>$this->returnDropdownData($request)]);
        //return view("auth.register")->with(['states'=>$this->returnStates(), 'data'=>$this->returnDropdownData($request)]);
    }
    
   /**
    * Return an array which shows which dropdown values were selected
    * 
    *  @param $request request object
    */
    public function returnDropdownData(Request $request) {
    	
    	$data = [];
    	
    	// dropdown values	
    	$states = $this->returnStates();		  
    	
    	// for every puzzle value, save as selected if selected
    	for ($i = 0; $i < count($states); $i++) {
    		$request->input("state") == $states[$i] ? ($data[$states[$i]] = "selected") : ($data[$states[$i]] = "");
    		
    		//echo $states[$i] . "<br>";
    	}
    	
    	return $data;
    }
	
   /**
    * Returns array of states.
    */
    public function returnStates() {
    	return file(storage_path() . "/app/text/states.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }
}
