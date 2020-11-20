<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $status = false;
        $message = "";
        $data = null;
        $code = 401;

        $user = User::with('roles.permissions')->where('username', '=', $request->username)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // generate token
                $user->api_token = Str::random(60);
                $user->save();

                // ambil data roles dari user ini
                $roles = $user->roles->toArray();
                // deklarasi untuk data permissions
                $permissions = [];
                // looping roles untuk mendapatkan data permissions
                foreach ($roles as $role) {
                    // ambil data permissions dari role ini
                    $permission = $role['permissions'];
                    // cek apakah $permissions sudah ada isinya atau masih kosong
                    if (count($permissions) == 0) {
                        // jika kosong, simpan data permission langsung ke $permissions
                        $permissions = array_column($permission, 'name');
                    } else {
                        // jika sudah ada, gabungkan data permission ke $permissions
                        $permissions = array_merge($permissions, array_column($permission, 'name'));
                    }
                }

                // simpan data user ke $data
                $data = $user->toArray();
                // simpan data roles ke $data['roles']
                $data['roles'] = array_column($roles, 'name');
                // simpan data permissions ke $data['permissions']
                $data['permissions'] = $permissions;

                $message = 'Anda berhasil login. Selamat datang ' . $user->name;
                $status = true;
                $code = 200;
            } else {
                $message = "Username atau password salah. Silakan coba lagi.";
            }
        } else {
            $message = "Username atau password salah. Silakan coba lagi.";
        }

        return response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        ], $code);
    }
}
