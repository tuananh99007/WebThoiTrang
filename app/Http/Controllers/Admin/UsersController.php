<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistAccount;
use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    private $usersRepository;
    public function __construct(UsersRepositoryInterface $inputUsersRepository)
    {
        $this->usersRepository = $inputUsersRepository;
    }
    public function profile(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        return view('admin.users.profile', compact('userLogin'));
    }
    public function list_admin(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        if ($userLogin->role == 0) {
            return redirect()->route('users.home.index');
        }
        $request->validate([
            'name' => 'max:255',
            'email' => 'max:255',
        ]);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $role = $request->input('role', null);
        $usersList_admin = $this->usersRepository->users_list_admin($name, $email, $role);
        $messageNotify = session('message_noify', null);
        return view('admin.users.list_admin', compact('usersList_admin', 'name', 'messageNotify', 'userLogin', 'email', 'role'));
    }
    public function list_users(Request $request)
    {
        $request->validate([
            'name' => 'max:255',
            'email' => 'max:255',
        ]);
        $userLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $usersList_users = $this->usersRepository->users_list_users($name, $email);
        $messageNotify = session('message_noify', null);
        return view('admin.users.list_users', compact('usersList_users', 'name', 'messageNotify', 'userLogin', 'email'));
    }

    public function add(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        return view('admin.users.add', compact('userLogin'));
    }

    public function postadd(Request $request)
    {
        $request->validate([
            'email' => 'unique:users|min:1|max:255',
            'name' => 'required|min:1|max:255',
            'password' => 'required|confirmed|min:1|max:255',
            'role' => 'required|min:1|max:255',
        ]);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $role = $request->input('role', null);
        $avatar = $request->file('avatar');
        if ($avatar == null) {
            $avatar = asset('assets/admin/images/avatar.webp');
        }
        $users_email = $this->usersRepository->users_email($email);
        if (empty($users_email)) {
            $this->usersRepository->users_postadd($name, $email, $password, $role, $avatar);
            Mail::to($email)->send(new RegistAccount());
            session()->flash('message_noify', 'Bạn đã thêm tài khoản thành công');
            return redirect()->route('admin.users.list_admin');
        }
        session()->flash('message_noify', 'Thêm tài khoản thất bại');
        return redirect()->back()->withInput();
    }

    public function update(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $usersUpdate = $this->usersRepository->users_id($id);
        if (
            $userLogin->role == 1 & $usersUpdate->role == 9
            || $userLogin->role == 1 & $usersUpdate->role == 1 & $userLogin->id != $id
            || $userLogin->role == 9 & $usersUpdate->role == 9 & $userLogin->id != $id
        ) {
            abort(403);
        }
        return view('admin.users.update', compact('usersUpdate', 'userLogin'));
    }


    public function postupdate(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'min:1|max:255|',
            'role' => 'required|min:1|max:255',
            'password' => 'confirmed|max:255',
        ]);

        $id = $request->input('id', null);
        $users = $this->usersRepository->users_id($id);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $role = $request->input('role', null);
        $avatar = $request->file('avatar');
        if (empty($avatar) != true) {
            Storage::delete($users->avatar);
            $nameAvatar = $avatar->hashName();
            $urlAvatar = "/upload/users/" . $nameAvatar;
            $avatar->store('upload/users');
        } else {
            $urlAvatar = $users->avatar;
        }
        if ($password == null) {
            $password = $users->password;
        } else {
            $password = Hash::make($password);
        }
        if ($email == null) {
            $email = $users->email;
            $this->usersRepository->users_postupdate($id, $name, $email, $password, $role, $urlAvatar);
            session()->flash('message_noify', 'Bạn đã sửa tài khoản thành công');
            return redirect()->route('admin.users.list_admin');
        }
        return redirect()->back()->withInput();
    }

    public function detail(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $usersDetail = $this->usersRepository->users_id($id);
        return view('admin.users.detail', compact('usersDetail', 'userLogin'));
    }

    public function delete(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $users = $this->usersRepository->users_id($id);
        if (
            $userLogin->role == 1 & $users->role == 9
            || $userLogin->role == 1 & $users->role == 1
            || $userLogin->role == 9 & $users->role == 9 & $userLogin->id != $id
        ) {
            abort(403);
        }
        $this->usersRepository->Users_delete($id);
        session()->flash('message_noify', 'Bạn đã xóa tài khoản vào thùng rác');
        return redirect()->route('admin.users.list_admin');
    }

    public function detail_bin(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $request->validate([
            'name' => 'max:255',
            'email' => 'max:255',
        ]);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $role = $request->input('role', null);
        if ($userLogin->role == 9) {
            $usersDetail_bin = $this->usersRepository->users_detail_bin($name, $email, $role);
            $messageNotify = session('message_noify', null);
            return view('admin.users.detail_bin', compact('usersDetail_bin', 'name', 'messageNotify', 'userLogin', 'email'));
        } {
            abort(403);
        }
    }


    public function delete_trash(Request $request)
    {
        $id = $request->input('id', null);
        $this->usersRepository->users_delete_trash($id);
        session()->flash('message_noify', 'Bạn đã xóa vĩnh viễn tài khoản thành công');
        return redirect()->route('admin.users.detail_bin');
    }

    public function restore(Request $request)
    {
        $id = $request->input('id', null);
        $this->usersRepository->users_restore($id);
        session()->flash('message_noify', 'Bạn đã khôi phục tài khoản thành công');
        return redirect()->route('admin.users.detail_bin');
    }

    public function restore_all()
    {
        $this->usersRepository->Users_restore_all();
        session()->flash('message_noify', 'Bạn đã khôi phục tất cả tài khoản thành công');
        return redirect()->route('admin.users.detail_bin');
    }

    public function delete_all()
    {
        $this->usersRepository->Users_delete_all();
        session()->flash('message_noify', 'Bạn đã xóa vĩnh viễn tất cả tài khoản thành công');
        return redirect()->route('admin.users.detail_bin');
    }
}
