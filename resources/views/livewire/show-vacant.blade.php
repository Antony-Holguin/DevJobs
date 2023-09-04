<div class="p-10">
    <div class="mb-5">
        <h2 class="font-bold text-3xl text-gray-800 my-3">
            {{$jobOpening->title}}
        </h2>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{$jobOpening->company}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Application deadline:
                <span class="normal-case font-normal">{{$jobOpening->last_day->toFormattedDateString()}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category:
                <span class="normal-case font-normal">{{$jobOpening->category->category}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary:
                <span class="normal-case font-normal">{{$jobOpening->salary->salary}}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacants').'/'.$jobOpening->image}}" alt="">
        </div>

        <div class="md:col-span-4">
            <h2 class="font-bold text-2xl mb-5">Description:</h2>
            <p> {{$jobOpening->description}}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>Do you want to apply for this job vacancy? <a class="font-bold text-indigo-600" href="{{route('register')}}">Register and apply to this and more vacancies</a> </p>
        </div>
    @endguest

    @cannot('create', App\Models\JobOpening::class)
        <p>Solo los devs acceder aqui</p>
        <livewire:apply-vacancy :jobOpening="$jobOpening">
    @endcannot

    
</div>
