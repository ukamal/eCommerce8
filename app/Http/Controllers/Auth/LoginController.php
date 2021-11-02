<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $validData = User::where('email',$email)->first();
        $password_check = password_verify($password, @$validData->password);
        if($password_check == false){
            return redirect()->back()->with('message','Email or Password does not match!');
        }
        if($validData->status == '0'){
            return redirect()->back()->with('message','Sorry you are not verified yet!');
        }
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('login');
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //login with facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        //return home after login
        return redirect()->route('home');
    }

        //login with github
        public function redirectToGithub()
        {
            return Socialite::driver('github')->redirect();
        }
        public function handleGithubCallback()
        {
            $user = Socialite::driver('github')->user();
    
            $this->_registerOrLoginUser($user);

            //return home after login
            return redirect()->route('home');
        }

        //login with google
        public function redirectToGoogle()
        {
            return Socialite::driver('google')->redirect();
        }
        public function handleGoogleCallback()
        {
            $user = Socialite::driver('google')->user();
    
            $this->_registerOrLoginUser($user);

            //return home after login
            return redirect()->route('home');
        }

        protected function _registerOrLoginUser($data){
            $user = User::where('email','=', $data->email)->first();
            if (!$user) {

                $code = rand(0000,9999);

                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->avatar = $data->avatar;
                
                $user->code = $code;
                $user->status = '0';
                $user->usertype = 'customer';

                $user->save();
            }

            Mail::send('frontend.email.verify_email', $data, function($message) use ($data){
                $message->from('flkamal2016@gmail.com','Online shopping');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });
    
            Auth::login($user);
        }


}
