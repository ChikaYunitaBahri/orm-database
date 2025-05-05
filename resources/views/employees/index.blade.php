@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Employee List</h2>
        <a href="{{ route('employees.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Add Employee</a>
    </div>
    <div class="mt-4">
        <table class="min-w-full bg-white border border-gray-200 table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4 border text-center w-12">No</th>
                    <th class="py-2 px-4 border text-left">Name</th>
                    <th class="py-2 px-4 border text-left">Company</th>
                    <th class="py-2 px-4 border text-left">Skills</th>
                    <th class="py-2 px-4 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border text-center">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border text-left">{{ $employee->name }}</td>
                    <td class="py-2 px-4 border text-left">{{ $employee->company->name }}</td>
                    <td class="py-2 px-4 border text-left">
                        @foreach ($employee->skills as $skill)
                        <span class="inline-block bg-gray-200 text-sm px-2 py-1 rounded mr-1 mb-1">{{ $skill->name }}</span>
                        @endforeach
                    </td>
                    <td class="py-2 px-4 border text-center">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-3 py-1 rounded mr-2 transition">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
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