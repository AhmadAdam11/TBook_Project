<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'password' => 'required|min:6',
            'class' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'class' => $request->class,
        ]);

        return redirect()->back()->with('success', 'User ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:users,name,' . $id,
            'password' => 'nullable|min:6',
            'class' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->class = $request->class;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
