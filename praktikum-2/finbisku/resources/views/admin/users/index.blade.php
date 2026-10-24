@extends('layouts.admin')
@section('title', 'Users')
@section('content')
<x-page-header title="Daftar user" subtitle="Semua pengguna FINBISKU." />
<div class="bg-white border border-neutral-200 rounded-card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-neutral-50 text-left text-neutral-500">
            <tr>
                <th class="px-4 py-3 font-semibold">Nama</th>
                <th class="px-4 py-3 font-semibold">Email</th>
                <th class="px-4 py-3 font-semibold">Peran</th>
                <th class="px-4 py-3 font-semibold"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            @forelse ($users as $user)
                <tr class="hover:bg-neutral-50">
                    <td class="px-4 py-3"><a href="{{ route('admin.users.show', $user['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">{{ $user['nama'] }}</a></td>
                    <td class="px-4 py-3">{{ $user['email'] }}</td>
                    <td class="px-4 py-3"><x-badge>{{ $user['peran'] }}</x-badge></td>
                    <td class="px-4 py-3"><a href="{{ route('admin.users.show', $user['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Lihat</a></td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-6 text-center text-neutral-500">Belum ada user.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
