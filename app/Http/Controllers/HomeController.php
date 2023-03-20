<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Applications;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        $data = Applications::orderBy('updated_at', 'desc')
            ->select(['pet_name', 'photo_url'])
            ->where('status', 'processed')
            ->take(4)
            ->get();

        return view('index', compact('data'));
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return redirect()->back()->withErrors('wrong login or password');
        }

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->route('profile.index');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        User::create($data);
        Auth::attempt(['login' => $data['login'], 'password' => $data['password']]);

        return redirect()->route('profile.index');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
