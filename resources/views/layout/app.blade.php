<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')

    @livewireStyles
</head>

<body class="antialiased">

    @includewhen(auth()->user()->user_type == 'admin', 'components.header2')



    <div class="p-4 sm:ml-64">
        @includeWhen(auth()->user()->user_type == 'admin', 'components.side-bar')

        {{ $slot }}

    </div>

    @livewireScripts
    @livewire('livewire-ui-modal')

</body>
@include('layout.footer')

</html>
