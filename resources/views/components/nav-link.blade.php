{{-- <!-- <a {{ $attributes }}>{{ $slot }}</a> for learning purpose -->  --}}
@props(['active' => false,'type' => 'a']) {{-- by default make it inactive --}}
{{-- @php 
   if($active){
     echo "<font style='color:white'>-></style>";
   }
@endphp --}}
{{-- above snippet is for learning purpose just uncomment to relearn --}}
<a {{ $attributes }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}">{{ $slot }}</a>

{{-- @if($type == 'a')
    <a {{ $attributes }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}">{{ $slot }}</a>

@elseif($type == 'button')
    <button {{ $attributes }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}">{{ $slot }}</button>

@endif --}}
{{-- learning if else block using blade helper --}}