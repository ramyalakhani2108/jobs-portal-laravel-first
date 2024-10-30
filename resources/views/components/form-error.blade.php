@props(['name'])
<p id="error-message-salary" class="text-red-500 font-bold mt-6">
    @error($name)
    {{$message}}
    @enderror
  </p>