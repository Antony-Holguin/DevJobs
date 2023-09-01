<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="createVacant">
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" autofocus autocomplete="name" />
        {{-- <x-input-error :messages="$errors->get('title')" class="mt-2" /> --}}

        @error('title')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div class="mt-4">
        <x-input-label for="salary" :value="__('Salary')" />
        <select id="salary" wire:model="salary" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900
         dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
          dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option selected  value="">-- Select an option --</option>
            @foreach ($salaries as $salary )
                <option   value="{{$salary->id}}">{{$salary->salary}}</option>
            @endforeach
            {{-- <option value="1">Recruiter</option>
            <option value="2">Developer</option> --}}
        </select>

        {{-- <x-input-error :messages="$errors->get('salary')" class="mt-2" /> --}}
        @error('salary')
            <livewire:show-alert :message="$message"/>
        @enderror
        
            
    </div>

    {{--Categories--}}
    <div class="mt-4">
        <x-input-label for="categories" :value="__('Categories')" />
        <select id="categories" wire:model="category" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900
         dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
          dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option  selected value="">-- Select an option --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
            
            
        </select>

        {{-- <x-input-error :messages="$errors->get('categories')" class="mt-2" /> --}}
        @error('category')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input placeholder="Netflix, Uber, Spotify, etc..." id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" autofocus autocomplete="name" />
        @error('company')
            <livewire:show-alert :message="$message"/>
        @enderror
        {{-- <x-input-error :messages="$errors->get('company')" class="mt-2"  /> --}}
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')" />
        <x-text-input  id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" autofocus autocomplete="name" />
        {{-- <x-input-error :messages="$errors->get('last_day')" class="mt-2"  /> --}}
        @error('last_day')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <textarea  class="w-full rounded-lg border-gray-300" wire:model="description">{{@old('description')}}</textarea>
        {{-- <x-input-error :messages="$errors->get('description')" class="mt-2"  /> --}}

        @error('description')
            <livewire:show-alert :message="$message"/>
        @enderror
        
    </div>

    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file" wire:model="image" autofocus autocomplete="name" />
        {{-- <x-input-error :messages="$errors->get('company')" class="mt-2"  /> --}}

        @error('image')
            <livewire:show-alert :message="$message"/>
        @enderror

        <div class="my-5 w-80">
            @if ($image)
                <span class="font-bold">Preview of the image:</span>
                <img src="{{$image->temporaryUrl()}}" alt="">
            @endif
        </div>
    </div>

   

    <x-primary-button>
        Create Vacant
    </x-primary-button>
</form>

