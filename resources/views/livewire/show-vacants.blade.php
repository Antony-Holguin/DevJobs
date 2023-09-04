
<div>  
       <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
            @if ($jobOpenings->count() >0)
                

            @foreach ($jobOpenings as $jobOpening )
                <div class="p-6 text-gray-900 border-b dark:text-gray-100 md:flex md:justify-between">
                        <div class="leading-10">
                            <a href="{{route('jobOpenings.show', $jobOpening->id)}}" class="text-xl font-bold">
                                {{$jobOpening->title}}
                            </a>

                            <p class="text-sm text-gray-800 font-bold">
                                {{$jobOpening->company}}
                            </p>

                            <p class="text-sm text-gray-500">
                                <span class="font-bold ">Last day: </span>{{$jobOpening->last_day->format('d/m/Y')}}
                            </p>
                        </div>

                        <div class="flex flex-col items-stretch md:flex-row md:items-center gap-4 text-center mt-5 md:mt-0">
                            <a class="bg-slate-800 p-3 px-4 py-2 rounded-lg uppercase text-white" href="{{route('applicants.index', $jobOpening)}}">Applicants: {{$jobOpening->applicant->count()}}</a>
                            <a class="bg-blue-800 p-3 px-4 py-2 rounded-lg uppercase text-white" href="{{route('jobOpenings.edit', $jobOpening->id)}}">Edit</a>
                            <button onclick="showAlert({{$jobOpening->id}})" wire:click="$emit=('showAlert') " class="bg-red-800 p-3 px-4 py-2 rounded-lg uppercase text-white">Delete</button>
                        </div>

                    

                </div>

                <div class="flex justify-center mt-10">
                    {{$jobOpenings->links()}}
                </div>
            @endforeach
            @else
                    <p class="p-3 text-center text-sm text-gray-600">There are no vacancies to display</p>
            @endif
                
        </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showAlert(jobOpening){
           
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteVacant');
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
        }
    </script>
    
   
@endpush
