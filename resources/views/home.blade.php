{{-- 
<x-layout heading="hello">
    <h1>hello</h1>
</x-layout> this is a way to send prop 

and the way of commend in blade/laravel
--}}

<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>
    {{-- <h1>{{$greetings}}  Content will come here.</h1> --}}

    <h1>content will come here.</h1>
</x-layout> {{-- this is second way called named slot --}}