<x-layout>
    <x-slot:heading>
        Create job
    </x-slot:heading>
    <x-slot:back href="/jobs">
    </x-slot:back>
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
<form id="createJob" method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful details of job.</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="title">Title</x-form-label>
            <x-form-input type="text" name="title" id="title" autocomplete="title" placeholder="Shift Leader"/>
            <x-form-error name='title'/>
          </x-form-field>
  
          {{-- <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
          </div> --}}
             <x-form-field>
            <x-form-label for="salary">Salary</x-form-label>
            <x-form-input type="text" name="salary" id="salary" autocomplete="salary" placeholder="$50,000/Year"/>
            <x-form-error name='salary'></x-form-error>
          </x-form-field>
        </div>

        {{-- <div class="mt-10">
          @if ($errors->any())
              <ul class="text-red-500 font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
          @endif
        </div>--}}{{-- this is how we can show the erros --}}
      </div>
  
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" onclick="clearCreateJob()" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <x-form-button id='submit' type="submit" disabled >Save</x-form-button>
    </div>

</form>


<script>
  addEventListener("DOMContentLoaded", (event) => {
    function clearCreateJob(){
        const form = document.getElementById('createJob');
        form.reset();
    }

    const title = document.getElementById('title');
    const salary = document.getElementById('salary');
    const error_message_salary = document.getElementById('error-message-salary');
    const error_message_title = document.getElementById('error-message-title');
    const submit = document.getElementById('submit');

    title.addEventListener('input',(e)=>{
        if(title.value.length < 3){
          submit.disabled = true;
          submit.classList.add('cursor-not-allowed');
          error_message_title.innerHTML = '<p id="error-message" class="text-red-500 font-bold mt-6">Title Must be 3 character long</p>'
        }else{
          submit.disabled = false;
          submit.classList.remove('cursor-not-allowed');
          error_message_title.innerHTML = '';
        }
    });

    salary.addEventListener('input',(e)=>{
      
        if(salary.value.length < 1 || salary.value.trim() == ''){
          submit.disabled = true;
          submit.classList.add('cursor-not-allowed');
          error_message_salary.innerHTML = '<p id="error-message" class="text-red-500 font-bold mt-6">salary can not be empty</p>'
        }else{
          submit.disabled = false;
          submit.classList.remove('cursor-not-allowed');
          error_message_salary.innerHTML = '';
        }
    });




  });

    


</script>
  
</x-layout> {{-- this is second way called named slot --}}