<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
   
    <div class="space-y-4">
        @foreach ($jobs as $job)
        <div class="block px-4 py-6 border border-gray-200 rounded-lg hover:scale-110 transition duration-300 flex justify-between items-center">
            <!-- Job Information Link -->
            
            <a href="/jobs/{{$job['id']}}" class="flex-1">
                <div class="font-bold text-sm text-blue-500">
                    {{$job->employer->name}}
                </div>
                <div>
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }}
                </div>
            </a>
            {{-- @can('edit-job', $job)       --}}
                    {{-- if we are using gates --}}

            @can('edit',$job)
                
                <a href="/jobs/{{$job['id']}}/edit" class="flex items-center justify-center w-12 h-12 bg-blue-500 rounded-full hover:bg-blue-700 transition duration-300 ml-4 group">
                    <!-- Trash Bin Base -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                        <path d="M3 17.25V21h3.75l10.05-10.05-3.75-3.75L3 17.25zM20.71 5.63a1 1 0 0 0 0-1.41l-2.83-2.83a1 1 0 0 0-1.41 0l-1.57 1.58 3.75 3.75 1.58-1.57z"/>
                    </svg>
                </a>
                <!-- Trash Button -->
                <form action='/jobs/{{$job['id']}}' method="POST">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class="flex items-center justify-center w-12 h-12 bg-red-500 rounded-full hover:bg-red-700 transition duration-300 ml-4 group">
                        <!-- Trash Bin Base -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 3h6a1 1 0 011 1v1h3a1 1 0 010 2h-1v13a2 2 0 01-2 2H8a2 2 0 01-2-2V7H5a1 1 0 110-2h3V4a1 1 0 011-1zM8 9h8v9a1 1 0 01-1 1H9a1 1 0 01-1-1V9z"/>
                        </svg>
                        
                    </button>
                </form>
            @endcan

        </div>
            
        @endforeach
    </div>
    <script >

           function goToDelete(){
            window.location.href ='/jobs/delete';
           }

    </script>
    <div class="mt-4">
        {{$jobs->links()}}
    </div>
</x-layout> {{-- this is second way called named slot --}}