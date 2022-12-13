<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\RegistAccount;
use App\Repositories\Interface\AuthenticateRepositoryInterfaceUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{
    private $authenticateRepositoryUsers;
    public function __construct(AuthenticateRepositoryInterfaceUsers $inputauthenticateRepositoryUsers)
    {
        $this->authenticateRepositoryUsers = $inputauthenticateRepositoryUsers;
    }
    public function login(Request $request)
    {
        $email = $request->input('email', null);
        $messageNotify = session('message_noify', null);
        return view('users.authenticate.login', compact('email', 'messageNotify'));
    }
    public function postlogin(Request $request)
    {
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $request->validate([
            'email' => 'required|min:1|max:255',
            'password' => 'required|min:1|max:255',
        ]);
        $credentials_users = [
            'email' => $email,
            'password' => $password,
            'role' => 0,
            'is_deleted' => 0
        ];
        if (Auth::guard('users')->attempt($credentials_users)) {
            return redirect()->route('users.home.index');
            session()->flash('message_noify', 'Đăng nhập thành công');
        }
        session()->flash('message_noify', 'Đăng nhập thất bại');
        return redirect()->route('users.authenticate.login');
    }
    public function register()
    {
        return view('users.authenticate.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'min:1|max:255',
            'email' => 'unique:users|min:1|max:255',
            'password' => 'confirmed|min:1|max:255',
        ]);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $avatar = $request->file('avatar');
        if ($avatar == null) {
            $avatar = asset('assets/admin/images/avatar.webp');
        }
        $users_email = $this->authenticateRepositoryUsers->users_email($email);
        if (empty($users_email))
            $this->authenticateRepositoryUsers->authenticate_post_register($name, $email, $password, $avatar);
        Mail::to($email)->send(new RegistAccount());
        session()->flash('message_noify', 'Đăng Ký thành công');
        return redirect()->route('users.authenticate.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.authenticate.login');
    }
    public function forgotPassword()
    {
        return view('users.authenticate.forgotpassword');
    }
    public function postforgotPassword(Request $request){
        $email=$request->input('email',null);
        $users = $this->authenticateRepositoryUsers->users_email($email);
        if(!empty($users)){
            $passwordNew = $this->passwordDefault();
            Mail::to($email)->send(new ForgotPassword($passwordNew));
            return redirect()->route('users.authenticate.login');
        }
        return redirect()->back()->withInput();
    }
    private function passwordDefault(){
        return "a123";
    }
}
