<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    {{-- <a href="/jobs" class="text-red-500 hover:underline"><- Back</a> --}}
    <x-slot:back href="/jobs">
    </x-slot:back>
   

    <h2 class="font-bold text-lg text-amya" > {{$job['title']}}</h2>
   
    <p>
        This job pays{{$job['salary']}}
    </p>

    {{-- @can('edit-job',$job) --}}
    @can('edit',$job)
        <div class="flex space-x-4 mt-8">
            <!-- Edit Button -->
            <a href='/jobs/{{$job['id']}}/edit' class="flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 4.379a2 2 0 012.828 0l1.415 1.415a2 2 0 010 2.828l-1.414 1.414-4.243-4.243 1.414-1.414zm0 0l-1.414 1.414-4.243 4.243-1.414 1.414v3.414h3.414l1.414-1.414 4.243-4.243-1.414-1.414zm-1.414 1.414l4.243 4.243-1.414 1.414-4.243-4.243 1.414-1.414z" />
                </svg>
                Edit
            </a>
        
            <!-- Delete Button -->
            <form method="POST" action='/jobs/{{$job['id']}}'>
                @csrf 
                @method('DELETE')
                <button  type='submit' class="flex items-center px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>
    @endcan
    </x-layout> {{-- this is second way called named slot --}}