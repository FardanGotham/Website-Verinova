@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto">

<div class="bg-white rounded-xl shadow p-6">

<h1 class="text-2xl font-bold mb-6">
Edit Admin
</h1>

<form action="{{ route('admins.update',$admin) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label>Nama</label>

<input
type="text"
name="name"
value="{{ $admin->name }}"
class="w-full border rounded-lg p-3">

</div>

<div class="mb-4">

<label>Email</label>

<input
type="email"
name="email"
value="{{ $admin->email }}"
class="w-full border rounded-lg p-3">

</div>

<div class="mb-4">

<label>Password Baru (Opsional)</label>

<input
type="password"
name="password"
class="w-full border rounded-lg p-3">

</div>

<div class="mb-6">

<label>Role</label>

<select
name="role"
class="w-full border rounded-lg p-3">

<option
value="admin"
{{ $admin->role=='admin'?'selected':'' }}>
Admin
</option>

<option
value="super_admin"
{{ $admin->role=='super_admin'?'selected':'' }}>
Super Admin
</option>

</select>

</div>

<button
class="bg-blue-600 text-white px-5 py-3 rounded-lg">

Update

</button>

</form>

</div>

</div>

@endsection