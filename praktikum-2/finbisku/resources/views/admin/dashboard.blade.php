@extends('layouts.admin')
@section('title', 'Admin')
@section('content')
<x-page-header title="Dashboard admin" subtitle="Ringkasan contoh platform FINBISKU." />

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-6">
    @foreach ($stats as $stat)
        <x-stat-card :label="$stat['label']" :value="$stat['value']" :icon="$stat['icon']" :tone="$stat['tone']" />
    @endforeach
</div>

<h2 class="font-bold font-display text-neutral-800 mb-3">User terbaru</h2>
<div class="bg-white border border-neutral-200 rounded-card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-neutral-50 text-left text-neutral-500">
            <tr>
                <th class="px-4 py-3 font-semibold">Nama</th>
                <th class="px-4 py-3 font-semibold">Email</th>
                <th class="px-4 py-3 font-semibold">Peran</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            @forelse ($users as $user)
                <tr class="hover:bg-neutral-50">
                    <td class="px-4 py-3">{{ $user['nama'] }}</td>
                    <td class="px-4 py-3">{{ $user['email'] }}</td>
                    <td class="px-4 py-3"><x-badge>{{ $user['peran'] }}</x-badge></td>
                </tr>
            @empty
                <tr><td colspan="3" class="px-4 py-6 text-center text-neutral-500">Belum ada user.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
