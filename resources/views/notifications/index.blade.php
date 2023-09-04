<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Live Wire component --}}
                    <h1 class="text-2xl font-bold text-center mb-10 my-10">My notifications</h1>

                  @forelse ($notifications as $notification)
                    <div class="p-5 border border-gray-200 md:flex md:justify-between md:items-center">
                            <div>
                                <p>
                                    You have a new applicant in: 
                                    <span class="font-bold">{{$notification->data['jobOpening_name']}}</span>
                                </p>
        
                                <p>
                                    <span class="font-bold">{{$notification->created_at->diffForHumans()}}</span>
                                </p>
                            </div>

                            <div class="mt-5">
                                <a class="bg-blue-800 p-3 rounded-lg text-sm uppercase font-bold text-white" href="{{route('applicants.index',$notification->data['jobOpening_id'])}}">See applicants</a>
                            </div>
                    </div>
                    
                    @empty
                        <p>There are not notifications yet</p>
                  @endforelse


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
