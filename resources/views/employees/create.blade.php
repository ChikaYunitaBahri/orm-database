@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Add New Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Company</label>
            <select name="company_id" class="w-full border rounded px-3 py-2" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="skills" class="block text-gray-700 mb-1">Skills</label>
            <select name="skills[]" id="skills" class="w-full border rounded px-3 py-2" multiple>
                @foreach($skills as $skill)
                <option value="{{ $skill->id }}"
                    {{ isset($employee) && $employee->skills->contains($skill->id) ? 'selected' : '' }}>
                    {{ $skill->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Save</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.25rem;
        min-height: 2.5rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #10b981;
        border: none;
        color: white;
        padding: 0.25rem 0.75rem 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        position: relative;
        display: flex;
        align-items: center;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        position: absolute;
        left: 0.4rem;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        margin-right: 0.5rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #f87171;
    }
</style>
@endpush


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#skills').select2({
            placeholder: "Pilih skill...",
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endpush


