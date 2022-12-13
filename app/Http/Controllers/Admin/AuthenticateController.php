<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistAccount;
use App\Repositories\Interface\AuthenticateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{
    private $authenticateRepository;
    public function __construct(AuthenticateRepositoryInterface $inputauthenticateRepository)
    {
        $this->authenticateRepository = $inputauthenticateRepository;
    }
    public function login(Request $request)
    {   
        $email = $request->input('email', null);
        $messageNotify = session('message_noify', null);
        return view('admin.authenticate.login', compact('email', 'messageNotify'));
    }

    public function postLogin(Request $request)
    {

        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $request->validate([
            'email' => 'required|min:1|max:255',
            'password' => 'required|min:1|max:255',
        ]);
        $credentials = [
            'email' => $email,
            'password' => $password,
            'role' => 1,
            'is_deleted'=>0
        ];
        $credentials_Manager = [
            'email' => $email,
            'password' => $password,
            'role' => 9,
            'is_deleted'=>0
        ];
        if (Auth::guard('admin')->attempt($credentials) || Auth::guard('admin')->attempt($credentials_Manager)) {
            session()->flash('message_noify', 'Chào mừng Bạn đăng nhập thành công');
            return redirect()->route('admin.users.list_admin');
        }
        session()->flash('message_noify', 'Đăng nhập thất bại');
        return redirect()->route('admin.authenticate.login');
    }
    public function register(Request $request)
    {
        $messageNotify = session('message_noify', null);
        return view('admin.authenticate.register', compact('messageNotify'));
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
        $users_email =  $this->authenticateRepository->users_email($email);
        if (empty($users_email)) {
            $this->authenticateRepository->authenticate_postRegister($name, $email, $password,$avatar);
            Mail::to($email)->send(new RegistAccount());
            session()->flash('message_noify', 'Đăng Ký thành công');
            return redirect()->route('admin.authenticate.login');
        }
        session()->flash('message_noify', 'Đăng Ký thất bại');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.authenticate.login');
    }
}
