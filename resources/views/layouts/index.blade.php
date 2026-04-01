<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>




    <div class="h-screen overflow-hidden flex ">

        <x-sidebar />

        <div class="w-4/5 bg-white overflow-y-auto ">

            {{-- navbar --}}
            @include('layouts.partials.navbar')
            @include('layouts.partials.flasher')

            <div class="p-5">
                @yield('content')

            </div>
        </div>
    </div>


    {{-- @include('layouts.partials.footer') --}}




</body>

</html>
