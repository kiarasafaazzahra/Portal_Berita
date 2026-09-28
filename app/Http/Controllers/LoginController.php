<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $penulis = Penulis::where('username', $request->username)
                          ->where('password', $request->password)
                          ->first();

        if ($penulis) {session(['key' => [$penulis]]);

            return redirect()->route('berita.index');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->forget('key');

        return redirect()->route('login');
    }
}
