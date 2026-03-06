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

        <div class="w-1/5 h-full bg-amber-900">

        </div>

        <div class="w-4/5 bg-white overflow-y-auto ">

            {{-- navbar --}}
            @include('layouts.partials.navbar')

            <div class="p-5">
                @yield('content')

            </div>
        </div>
    </div>


    {{-- @include('layouts.partials.footer') --}}




</body>

</html>
