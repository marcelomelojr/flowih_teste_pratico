<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.index',
            [
                'users' => $users
            ]);
    }

    public function cars()
    {
        $cars = Car::paginate(10);

        return view('admin.cars',
            [
                'cars' => $cars
            ]);

    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->fill($request->all());
            $user->save();

            notify()->success('Usuário atualizado com sucesso!', 'Sucesso');
            return redirect()->route('admin.users');
        } catch (\Exception $e) {
            notify()->error('Erro ao atualizar usuário!', 'Erro');
            return redirect()->back();
        }
    }
}
