<?php
  
namespace App\Http\Controllers\Auth;
   

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirectors;

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
  
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', 'min:8'],
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                // $user = Auth::user();
                return redirect()->route('admin.index')->with('login','Login Berhasil');
            }else{
                return redirect()->route('user.index')->with('login','Login Success');
            }
        }else{
            return redirect()->route('login')
                ->with('alert','Email-Address or Password Are Wrong.');
        }
          
    }

    public function loginPage(){
        return view('auth.login');
    }

    public function index(){
        {
            return view('home');
        }
    }
}