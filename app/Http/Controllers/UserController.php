<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faskes;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('faskes')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $faskes = Faskes::all();
        return view('admin.users.create', compact('faskes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'usertype' => 'required|in:admin,rs,puskes,jr',
            'faskes_id' => 'required|exists:faskes,id'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
            'faskes_id' => $request->faskes_id
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $faskes = Faskes::all();
        return view('admin.users.edit', compact('user', 'faskes'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users,email,'.$id,
            'usertype' => 'required|in:admin,rs,puskes,jr',
            'faskes_id' => 'required|exists:faskes,id'
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'faskes_id' => $request->faskes_id
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:8|confirmed'
            ]);
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
