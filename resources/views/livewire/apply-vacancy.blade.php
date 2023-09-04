<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Apply for this vacancy
    </h3>

    @if (session()->has('message'))
        <div class=" uppercase border border-bg-green-600 bg-green-100 text-green-600 font-bold p-2 my-5">
            {{session('message')}}
        </div>
        @else
            <form wire:submit.prevent="apply" class="w-96 mt-5">
                <div class="mb-4">
                    <x-input-label for="cv" :value="__('Curriculum Vitae (PDF)')" />
                    <input wire:model="cv" type="file" accept=".pdf" class="block w-full">
                    <x-primary-button class="mt-10">
                        {{__('Apply')}}
                    </x-primary-button>
                </div>
        
                @error('cv')
                    <livewire:show-alert :message="$message">
                @enderror
            </form>

    @endif

    

</div>
