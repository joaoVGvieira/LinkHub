<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

// Rotas de autenticação customizadas
Route::middleware('guest')->group(function () {
    // Login - GET (exibir formulário)
    Route::get('/login', function () {
        return view('auth.custom-login');
    })->name('login');

    // Login - POST (processar login)
    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor, insira um email válido.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email ou senha incorretos. Verifique suas credenciais.',
        ])->onlyInput('email');
    });

    // Register - GET (exibir formulário)
    Route::get('/register', function () {
        return view('auth.custom-register');
    })->name('register');

    // Register - POST (processar registro)
    Route::post('/register', function (Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // Mensagens customizadas em português
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor, insira um email válido.',
            'email.max' => 'O email não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este email já está cadastrado. Tente fazer login ou use outro email.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Conta criada com sucesso! Bem-vindo ao LinkHub!');
    });
});

// Dashboard customizado
Route::get('/dashboard', function () {
    return view('custom-dashboard');
})->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('links', LinkController::class);

    // Rota de logout customizada
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('status', 'Você saiu da sua conta com sucesso!');
    })->name('logout');
});

// Rota dinâmica por último
Route::get('/{username}', [PublicProfileController::class, 'show'])->name('profile.show');