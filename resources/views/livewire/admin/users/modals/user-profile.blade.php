<!-- Main modal -->
<div wire:ignore.self id="profileModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
   
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <!-- component -->
            <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
            <link rel="stylesheet"
                href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

            <section class="pt-16 bg-blueGray-50">
                <div class="w-full  px-4 mx-auto">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                        <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full px-4 flex justify-center">
                                    <div class="relative">
                                        <img alt="..."
                                            src="{{getAvatar($avatar)}}"
                                            class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                                    </div>
                                </div>
                                <div class="w-full px-4 text-center mt-20">
                                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                {{$taskCount}}
                                            </span>
                                            <span class="text-sm text-blueGray-400">Tasks</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                {{$contributeCount}}
                                            </span>
                                            <span class="text-sm text-blueGray-400">Contribute</span>
                                        </div>
                                        <div class="lg:mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                               {{$completedCount}}
                                            </span>
                                            <span class="text-sm text-blueGray-400">Completed </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-12">
                                <h3 class="text-xl font-semibold leading-normal  text-blueGray-700 mb-2">
                                    {{$username}}
                                   
                                </h3>
                                
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    <i class="fas fas fa-envelope mr-2 text-lg text-blueGray-400"></i>
                                    {{$email}}
                                </div>
                                <div class=" text-blueGray-600">
                                    <i class="fas fa-solid fa-clock mr-2 text-xl text-blueGray-400"></i>
                                    Member since {{$created_at}}
                                </div>
                                <div class="mb-2 text-blueGray-600 mt-10">
                                    <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                    Role - {{$user_type}}
                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                                    Team Zgoum Tech
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Modal body -->

        
    </div>
</div>
