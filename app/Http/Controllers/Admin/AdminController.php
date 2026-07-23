<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar admin
     */
    public function index()
    {
        $admins = User::orderBy('name')->get();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Form tambah admin
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Simpan admin baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,super_admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admins.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Form edit admin
     */
    public function edit(User $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update admin
     */
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'role' => 'required|in:admin,super_admin',
            'password' => 'nullable|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()
            ->route('admins.index')
            ->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Hapus admin
     */
    public function destroy(User $admin)
    {
        // Mencegah menghapus akun sendiri
        if ($admin->id === auth()->id()) {
            return redirect()
                ->route('admins.index')
                ->with('error', 'Kamu tidak dapat menghapus akun sendiri.');
        }

        // Mencegah menghapus super admin terakhir
        if (
            $admin->role === 'super_admin' &&
            User::where('role', 'super_admin')->count() <= 1
        ) {
            return redirect()
                ->route('admins.index')
                ->with('error', 'Minimal harus ada satu Super Admin.');
        }

        $admin->delete();

        return redirect()
            ->route('admins.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}