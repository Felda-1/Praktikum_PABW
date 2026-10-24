@extends('layouts.panel')

@section('homeUrl', route('admin.dashboard'))
@section('profileUrl', route('admin.profile'))
@section('userName', 'Administrator')
@section('userRole', 'admin')

@section('menu')
<x-sidebar-heading>Ringkasan</x-sidebar-heading>
<x-sidebar-item :href="route('admin.dashboard')" icon="layout-dashboard" :active="request()->routeIs('admin.dashboard')">Dashboard</x-sidebar-item>
<x-sidebar-heading>Manajemen</x-sidebar-heading>
<x-sidebar-item :href="route('admin.articles.index')" icon="file-text" :active="request()->routeIs('admin.articles.*')">Articles</x-sidebar-item>
<x-sidebar-item :href="route('admin.users.index')" icon="users" :active="request()->routeIs('admin.users.*')">Users</x-sidebar-item>
<x-sidebar-heading>Pengaturan</x-sidebar-heading>
<x-sidebar-item :href="route('admin.profile')" icon="user" :active="request()->routeIs('admin.profile')">Profile</x-sidebar-item>
@endsection

@section('headerLeft')
<h2 class="text-lg font-bold font-display text-neutral-800 hidden md:block uppercase tracking-wider">Administrator Panel</h2>
@endsection
