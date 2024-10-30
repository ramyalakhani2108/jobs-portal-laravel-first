<x-layout>
    <x-slot:heading>
        Register
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
<form id="createJob" method="POST" action="/register">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-6">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="first_name">First Name</x-form-label>
            <x-form-input type="text" name="first_name" id="first_name" :value="old('first_name')" autocomplete="first_name" placeholder="John"/>
            <x-form-error name='first_name'/>
          </x-form-field>

          <x-form-field>
            <x-form-label for="last_name">Last Name</x-form-label>
            <x-form-input type="text" name="last_name" id="last_name" :value="old('last_name')" autocomplete="last_name" placeholder="Doe"/>
            <x-form-error name='last_name'/>
          </x-form-field>

          <x-form-field>
            <x-form-label for="email">Email</x-form-label>
            <x-form-input type="email" name="email" id="email" :value="old('email')" autocomplete="email" placeholder="example@example.com"/>
            <x-form-error name='email'/>
          </x-form-field>

          <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <x-form-input type="password" name="password" id="password" autocomplete="password" placeholder="*********"/>
            <x-form-error name='password'/>
          </x-form-field>
          
          <x-form-field>
            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
            <x-form-input type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" placeholder="*********"/>
            <x-form-error name='password_confirmation'/>
          </x-form-field>

        </div>
      </div>
  
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900 flex items-center justify-between">Home</a>
      <x-form-button id='submit' type="submit">Register</x-form-button>
    </div>

</form>


<script>
</script>
  
</x-layout> {{-- this is second way called named slot --}}