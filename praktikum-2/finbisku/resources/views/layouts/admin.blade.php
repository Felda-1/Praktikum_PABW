@extends('layouts.panel')

@section('homeUrl', '/admin')
@section('profileUrl', '/admin/profile')
@section('userName', 'Administrator')
@section('userRole', 'admin')

@section('menu')
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Ringkasan</div>
<x-sidebar-item href="/admin" icon="layout-dashboard" :active="request()->is('admin')">Dashboard</x-sidebar-item>
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Manajemen</div>
<x-sidebar-item href="/admin/articles" icon="file-text" :active="request()->is('admin/articles*')">Articles</x-sidebar-item>
<x-sidebar-item href="/admin/users" icon="users" :active="request()->is('admin/users*')">Users</x-sidebar-item>
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Pengaturan</div>
<x-sidebar-item href="/admin/profile" icon="user" :active="request()->is('admin/profile')">Profile</x-sidebar-item>
@endsection

@section('headerLeft')
<h2 class="text-lg font-bold font-display text-neutral-800 hidden md:block uppercase tracking-wider">Administrator Panel</h2>
@endsection
