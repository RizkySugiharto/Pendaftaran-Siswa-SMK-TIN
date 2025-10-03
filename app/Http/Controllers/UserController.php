<?php

namespace App\Http\Controllers;

use Database\Factories\userFactory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::select([ 'id', 'name', 'email' ]);
        $users->get();
        return view('admin.users', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::firstWhere(['email' => $validated['email']]);
        if ($user) {
            return redirect()->back()->withErrors(["Email sudah terdaftar!"]);
        }

        $user = new User($validated);
        $is_success = $user->save();

        if ($is_success) {
            return redirect()->back()->with(["message" => "User berhasil ditambahkan!"]);
        } else {
            return redirect()->back()->withErrors(["User gagal ditambahkan!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->validated('name');
        $user->email = $request->validated('email');
        if ($request->validated('password')) {
            $user->password = Hash::make($request->validated('password'));
        }

        if ($user->save()) {
            return redirect()->back()->with(["message" => "User berhasil diperbarui!"]);
        } else {
            return redirect()->back()->withErrors(["User gagal diperbarui!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $is_success = $user->delete();
        if ($is_success) {
            return redirect()->back()->withInput(["message" => "User berhasil dihapus!"]);
        } else {
            return redirect()->back()->withErrors(["User gagal dihapus!"]);
        }
    }

}
