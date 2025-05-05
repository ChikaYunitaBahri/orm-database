@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Companies</h1>
        <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Company</a>
    </div>

    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-2 text-left">No</th>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $index => $company)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $company->name }}</td>
                    <td class="border px-4 py-2 text-center">
                        <a href="{{ route('companies.edit', $company->id) }}" 
                           class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-3 py-1 rounded mr-2 transition">
                            Edit
                        </a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
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
