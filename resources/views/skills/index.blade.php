@extends('layouts.app')

@section('title', 'Skills')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Skills</h1>
        <a href="{{ route('skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Skill</a>
    </div>

    <div class="mt-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Employees</th>
                    <th class="px-4 py-2 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $skill->name }}</td>
                    <td class="px-4 py-2 border">
                        @foreach($skill->employees as $employee)
                            <span class="inline-block bg-green-100 text-green-800 rounded-full text-xs px-2 py-1 mr-1 mb-1">{{ $employee->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('skills.edit', $skill->id) }}" 
                           class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-3 py-1 rounded mr-2 transition">
                            Edit
                        </a>
                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold px-3 py-1 rounded transition"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
