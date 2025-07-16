@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <img src="{{ asset('icons/user.svg') }}" alt="Users Icon" class="w-8 h-8">
                <h1 class="text-2xl font-bold">All Users</h1>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded shadow">
                <thead class="bg-gray-100 border-b text-sm text-gray-700">
                    <tr>
                        <th class="text-left px-4 py-2">#</th>
                        <th class="text-left px-4 py-2">Name</th>
                        <th class="text-left px-4 py-2">Email</th>
                        <th class="text-left px-4 py-2">Phone</th>
                        <th class="text-left px-4 py-2">Role</th>
                        <th class="text-left px-4 py-2">Registered</th>
                        <th class="text-left px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->phone }}</td>
                            <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2">
                                {{-- You can later add view/edit/delete --}}
                                <a href="#" class="text-blue-600 hover:underline text-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
