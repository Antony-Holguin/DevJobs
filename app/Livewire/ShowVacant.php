<?php

namespace App\Livewire;

use Livewire\Component;

class ShowVacant extends Component
{
    public $jobOpening;
    public function render()
    {
        return view('livewire.show-vacant',[
            'jobOpening' => $this->jobOpening
        ]);
    }
}
