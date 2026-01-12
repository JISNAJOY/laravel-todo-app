<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Success message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Task Button -->
        <a href="{{ route('tasks.create') }}"
           class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Task
        </a>

        <!-- Tasks List -->
        @if($tasks->count())
            <div class="bg-white shadow rounded">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-3 border">Title</th>
                            <th class="p-3 border">Description</th>
                            <th class="p-3 border w-40">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="p-3 border">{{ $task->title }}</td>
                                <td class="p-3 border">{{ $task->description }}</td>
                                <td class="p-3 border">
                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task) }}"
                                          method="POST"
                                          class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Delete this task?')"
                                                class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">No tasks found. Create one!</p>
        @endif

    </div>
</x-app-layout>
