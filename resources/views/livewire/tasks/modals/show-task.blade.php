<!-- Main modal -->
<div wire:ignore.self id="showTaskModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <!-- Modal content -->
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <!-- Modal header -->
        <!-- component -->
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
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
                           {{$title}}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Category
                        </p>
                        @foreach ( $categories as $category )
                        <p>
                          {{$category->name}}
                        </p>
                          @endforeach
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-3 border-b">
                        <p class="text-gray-600">
                            Description
                        </p>
                        <p>
                            {{$description}}
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
                          {{$due_date}}
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
                                     {{ $user->username}}
                                    </span>
                                </div>
                                <a href="#" class="text-purple-700 hover:underline">
                                    {{$user->user_type}}
                                </a>
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>




            <!-- support me by buying a coffee -->
            <a href="https://www.buymeacoffee.com/danimai" target="_blank"
                class="bg-purple-600 p-2 rounded-lg text-white fixed right-0 bottom-0">
                Support me
            </a>
        </div>
    </div>
</div>
