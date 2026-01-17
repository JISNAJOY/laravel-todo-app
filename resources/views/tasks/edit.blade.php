<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded p-6">

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Task Title -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title', $task->title) }}"
                           class="w-full mt-1 border-gray-300 rounded"
                           required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Task Description -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Description</label>
                    <textarea name="description"
                              class="w-full mt-1 border-gray-300 rounded"
                              rows="4">{{ old('description', $task->description) }}</textarea>
                </div>

                <!-- Task Completion Checkbox -->
                <div class="mb-4 flex items-center gap-2">
                    <input type="checkbox" name="is_completed" value="1"
                           {{ $task->is_completed ? 'checked' : '' }}>
                    <label class="text-gray-700">Mark as Completed</label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update Task
                    </button>

                    <a href="{{ route('tasks.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Cancel
                    </a>
                </div>
            </form>

        </div>

    </div>
</x-app-layout>
