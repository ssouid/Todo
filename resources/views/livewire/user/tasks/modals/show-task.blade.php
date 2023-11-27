<!-- Main modal -->
<div wire:ignore.self id="showTaskModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <!-- Modal content -->
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <!-- Modal header -->
        <button type="button" class="close" wire:click="resetInput()"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-toggle="showTaskModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close</span>
        </button>
        <!-- component -->
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
        <!-- component -->
        <!-- Modal body -->
        <!-- component -->
        <!-- This is an example component -->
        <div class=" w-800 min-h-screen flex items-center justify-center ">

            <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl p-2">
                <div class="p-4 border-b">
                    <h2 class="text-2xl ">
                        Task Information
                    </h2>
                </div>
                <div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Title
                        </p>
                        <p>
                           {{ $title }}
                        </p>
                    </div>
                    <div class="contents md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Category
                        </p>
                        
                
                        <span style="background-color:rgb(125 211 252 / var(--tw-bg-opacity)); " class="contents bg-sky-300">
                         category
                        </span>  
                       
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Description
                        </p>
                        <p>
                            {{ $description }}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Status
                        </p>
                        <p>
                            <span id="status-{{ $status }}"
                                class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                {{ $status }} </span>
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                           Priority
                        </p>
                        <p>
                            <span id="priority-{{ $priority }}"
                                class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                {{ $priority }} </span>
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Due Date
                        </p>
                        <p>
                          {{ $due_date }}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3">
                        <p class="text-gray-600">
                           Assgin to 
                        </p>
                        <div class="space-y-2">
                            @foreach ($selectdtask as $user)
                            <div class="w-full border-2 flex items-center p-2 rounded justify-between space-x-2">
                                <div class="space-x-2 truncate">
                                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                                    src="{{ getAvatar($user->avatar, $user->email) }}"
                                    alt="">
                                    <span>
                                     {{ $user->username }}
                                    </span>
                                </div>
                                <a href="#" class="text-purple-700 hover:underline">
                                    {{ $user->user_type }}
                                </a>
                            </div> @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
