<div>
    <div class="mb-4">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Tasks</h1>
    </div>
    <section class=" bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div style="padding-left: 0rem; padding-right: 0rem" class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div style="position: relative;"
                class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <div class="lg:pr-3" action="#" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="relative mt-1 lg:w-64 xl:w-96">
                                <input wire:model.live="search" type="text" name="search" id="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search for Task">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <button type="button" data-modal-toggle="AddTaskModal"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white 
                            rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300
                             dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add new Task
                        </button>

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>


                                <th scope="col" class="px-4 py-3">Task</th>
                                <th scope="col" class="px-4 py-3">Assigned To</th>
                                <th scope="col" class="px-4 py-3">status</th>
                                <th scope="col" class="px-4 py-3">Priority</th>
                                <th scope="col" class="px-4 py-3">Date Due</th>
                                <th scope="col" class="px-4 py-3">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr wire:loading.class="opacity-50"
                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">

                                    <td scope="row"
                                        class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $task->title }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="avatar-group">

                                            <div class="flex -space-x-2 overflow-hidden">
                                                @foreach ($task->users as $user)
                                                    <img class="inline-block h-9 w-9 rounded-full ring-2 ring-white"
                                                        src="{{ getAvatar($user->avatar, $user->email) }}"
                                                        alt="">
                                                @endforeach
                                            </div>
                                        </div>

                                    </td>
                                    <td class="px-4 py-2">
                                        <span id="status-{{ $task->status }}"
                                            class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                            {{ $task->status }} </span>

                                    </td>
                                    <td class="px-4 py-2">
                                        <span id="priority-{{ $task->priority }}"
                                            class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                            {{ $task->priority }} </span>

                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $task->due_date }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <button wire:click="showTask({{ $task->id }},'view')" type="button"
                                            data-modal-toggle="showTaskModal"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center
                                            text-white rounded-lg bg-green-600 hover:bg-green-500 focus:ring-4 focus:ring-green-200 dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                            View
                                        </button>
                                        <button wire:click="showTask({{ $task->id }},'edit')" type="button"
                                            data-modal-toggle="editModal"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                        </button>
                                        <button type="button" data-modal-toggle="deleteModal"
                                            wire:click="setdeleteid({{ $task->id }})"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                        </button>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="flex justify-center items-center">
                                            <span class=" py-8 text-gray-400 text-xl"> No tasks found...</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                    aria-label="Table navigation">
                    {{ $tasks->links() }}

                </nav>
            </div>
        </div>
    </section>
    @include('livewire.admin.tasks.modals.add-task-modal')
    @include('livewire.admin.tasks.modals.edit-task-modal')
    @include('livewire.admin.tasks.modals.show-task')
    @include('livewire.admin.tasks.modals.delete-task-modal')

    @push('scripts')
    @endpush
</div>
