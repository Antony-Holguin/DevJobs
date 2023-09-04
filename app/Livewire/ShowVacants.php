<?php

namespace App\Livewire;

use App\Models\JobOpening;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ShowVacants extends Component
{
    protected $listeners = ['deleteVacant'];
    public function deleteVacant(){
        dd('deleting');
    }

    use WithPagination;
    public function render()
    {
        
        //Return vacancies that belongs to a user
        $jobOpenings = JobOpening::where('user_id', auth()->user()->id)->paginate(10);


        return view('livewire.show-vacants', [
            'jobOpenings' => $jobOpenings
        ]);
    }
}
