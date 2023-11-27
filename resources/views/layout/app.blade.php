<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')

    @livewireStyles
</head>

<body class="antialiased">

    @includewhen(auth()->user()->user_type == 'admin', 'components.header2')
    @includewhen(auth()->user()->user_type == 'user', 'components.header')



    @if (auth()->user()->user_type == 'user')
        <div class="p-4  mx-12">
    @endif
    @if (auth()->user()->user_type == 'admin')
        <div class="p-4  sm:ml-64">
    @endif

    @includeWhen(auth()->user()->user_type == 'admin', 'components.side-bar')

    {{ $slot }}

    </div>

    @livewireScripts
    @livewire('livewire-ui-modal')

</body>
@include('layout.footer')

</html>
