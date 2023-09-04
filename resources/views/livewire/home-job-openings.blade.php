<div>
    <livewire:filter-job-opening>
   <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h1 class="font-extrabold text-4xl text-gray-700 mb-12">Our Avaible Vacancies</h1>
            <div class="bg-white shadow-sm rounded-lg p-6">
                @forelse ($jobOpenings as $jobOpening)
                    <div class="md:flex justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extra-bold text-gray-600" href="{{route('jobOpenings.show', $jobOpening->id)}}">{{$jobOpening->title}}</a>
                            <p class="text-base text-gray-600 mb-1">{{$jobOpening->company}}</p>
                            <p class="font-bold text-xs text-gray-600">
                                Last day to apply:
                                <span class="font-normal">{{$jobOpening->last_day->format('m/d/y')}}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-blue-800 p-3 rounded-lg text-sm uppercase font-bold text-white block text-center"  href="{{route('jobOpenings.show', $jobOpening->id)}}">Ver</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">There are not job openings avaible</p>
                @endforelse
            </div>
        </div>
   </div>
</div>
