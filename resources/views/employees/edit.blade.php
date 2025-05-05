@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Edit Employee</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ $employee->name }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Company</label>
            <select name="company_id" class="w-full border rounded px-3 py-2" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>
                    {{ $company->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label class="block text-gray-700">Skills</label>
            <div class="relative">
                <div class="mt-1 w-full">
                    <div class="border border-gray-300 rounded-md p-2 cursor-pointer" onclick="toggleSkillsDropdown()">
                        <div id="skills-display" class="text-gray-500">Select</div>
                    </div>
                    <div id="skills-dropdown" class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                        @foreach($skills as $skill)
                        <div class="p-2 hover:bg-gray-100">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                    {{ in_array($skill->id, old('skills', $employee->skills->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <span class="ml-2">{{ $skill->name }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @error('skills')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <script>
            function toggleSkillsDropdown() {
                const dropdown = document.getElementById('skills-dropdown');
                dropdown.classList.toggle('hidden');
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const dropdown = document.getElementById('skills-dropdown');
                const display = document.getElementById('skills-display');

                if (!event.target.closest('#skills-dropdown') &&
                    event.target !== display &&
                    !event.target.closest('.border.border-gray-300.rounded-md.p-2')) {
                    dropdown.classList.add('hidden');
                }
            });

            // Update selected skills display
            const checkboxes = document.querySelectorAll('input[name="skills[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectedSkills);
            });

            function updateSelectedSkills() {
                const selected = [];
                const checkboxes = document.querySelectorAll('input[name="skills[]"]:checked');

                checkboxes.forEach(checkbox => {
                    selected.push(checkbox.nextElementSibling.textContent.trim());
                });

                const display = document.getElementById('skills-display');
                if (selected.length > 0) {
                    display.textContent = selected.join(', ');
                    display.classList.remove('text-gray-500');
                } else {
                    display.textContent = 'Select';
                    display.classList.add('text-gray-500');
                }
            }

            // Initialize display on page load
            document.addEventListener('DOMContentLoaded', updateSelectedSkills);
        </script>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
