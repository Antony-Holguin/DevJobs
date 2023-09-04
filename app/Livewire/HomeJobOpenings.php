<?php

namespace App\Livewire;

use App\Models\JobOpening;
use Livewire\Component;

class HomeJobOpenings extends Component
{
    public $term;
    public $category;
    public $salary;
    protected $listeners = ['termsOfSearch' => 'search'];

    public function search($term, $category, $salary){
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;
    }
    
    public function render()
    {
        $jobOpenings = JobOpening::when($this->term, function($query){
            $query->where('title', 'LIKE', "%".$this->term."%");
        })
        ->when($this->category, function($query){
            $query->where('category_id', $this->category);
        })
        ->when($this->salary, function($query){
            $query->where('salary_id', $this->salary);
        })
        
        ->get();

        return view('livewire.home-job-openings',[
            'jobOpenings' => $jobOpenings
        ]);
    }
}
