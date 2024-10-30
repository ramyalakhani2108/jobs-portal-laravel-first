<x-layout>
    <x-slot:heading>
        Edit job : {{$job->title}}
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
<form id="createJob" method="POST" action="/jobs/{{$job['id']}}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Original name = {{$job->title}}.</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input value="{{$job->title}}" type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Shift Leader">
              </div>
            </div>
            <p id="error-message-title" class="text-red-500 font-bold mt-6">
              @error('title')
              {{$message}}
              @enderror
            </p>
          </div>
  
          {{-- <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
          </div> --}}
          <div class="sm:col-span-4">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input value="{{$job->salary}}" type="text" name="salary" id="salary" autocomplete="salary" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="$50,000/Year">
              </div>
            </div>
            <p id="error-message-salary" class="text-red-500 font-bold mt-6">
              @error('salary')
              {{$message}}
              @enderror
            </p>
          </div>
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
      <a href='/jobs/{{$job['id']}}' class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button id='submit' type="submit"  class=" rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
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