@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Company</h1>
        <a href="{{ route('companies.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
    </div>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Company Name</label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}"
                   class="w-full border rounded py-2 px-3 @error('name') border-red-500 @enderror"
                   required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection