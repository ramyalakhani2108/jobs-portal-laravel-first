<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form id="createJob" method="POST" action="/login">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-6">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="email">Email</x-form-label>
            <x-form-input type="email" name="email" id="email" autocomplete="email" value="{{old('email')}}" placeholder="example@example.com"/>
            <x-form-error name='email'/>
          </x-form-field>
          <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <x-form-input type="password" name="password" id="password"  autocomplete="password" placeholder="*********"/>
            <x-form-error name='password'/>
          </x-form-field>
        </div>
      </div>
  
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900 flex items-center justify-between">Home</a>
      <x-form-button id='submit' type="submit">Login</x-form-button>
    </div>

</form>


<script>
</script>
  
</x-layout> {{-- this is second way called named slot --}}