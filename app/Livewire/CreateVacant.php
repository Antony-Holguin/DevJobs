<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\JobOpening;
use App\Models\Salary;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
        public $title;
        public $salary;
        public $category;
        public $company;
        public $last_day;
        public $description;
        public $image;

        protected  $rules = [
            'title' => 'required|string',
            'salary' => 'required',
            'category' => 'required',
            'company' => 'required',
            'last_day' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:1024',
        ];

    use WithFileUploads;

    public function createVacant(){
        $data = $this->validate();

        //Upload image
        $image = $this->image->store('public/vacants');
        $imageName = str_replace('public/vacants/','',$image);

        JobOpening::create([
            'title'=> $data['title'],
            'salary_id'=> $data['salary'],
            'category_id'=>$data['category'],
            'user_id'=> auth()->user()->id,
            'company'=>$data['company'],
            'last_day'=>$data['last_day'],
            'description'=>$data['description'],
            'image'=> $imageName,
            
        ]);

        session()->flash('message', 'The vacant was succcesfuly posted');

        return redirect()->route('jobOpenings.index')->with('message', 'Vacant posted succesfully');
    }

    public function render()
    {
        
        
        //db
        $salaries = Salary::all();

        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
