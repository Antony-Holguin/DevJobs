<?php

namespace App\Livewire;

use App\Models\Category;
use livewire;
use App\Models\Salary;
use Livewire\Component;

class FilterJobOpening extends Component
{
    public $term;
    public $category;
    public $salary;

    public function readDataFromForm(){
       $this->dispatch('termsOfSearch', $this->term,$this->category,$this->salary);
    }
    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.filter-job-opening',[
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
