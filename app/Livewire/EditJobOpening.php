<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\JobOpening;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditJobOpening extends Component

    
{
    use WithFileUploads;

    public $title;
    public $salary;

    public $category;

    public $company;
    public $last_day;

    public $description;

    public $image;

    public $jobOpening_id;

    public $new_image;

    protected  $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024',
    ];

    public function mount(JobOpening $jobOpening){
        $this->title = $jobOpening->title;
        $this->salary = $jobOpening->salary_id;
        $this->category = $jobOpening->category_id;
        $this->company = $jobOpening->company;

        $this->last_day =  $jobOpening->last_day->format('Y/m/d');
        $this->last_day = str_replace('/','-', $this->last_day);

        $this->description = $jobOpening->description;

        $this->image = $jobOpening->image;

        $this->jobOpening_id = $jobOpening->id;
    }

    public function editVacant(){
        
        $data = $this->validate(); //It contains the currrent values of the form

        if($this->new_image){
            $image = $this->new_image->store('public/vacants');
            $data['image'] = str_replace('public/vacants','',$image);
        }
        $vacant = JobOpening::find($this->jobOpening_id); //Find Vacant

        //Update Values
        $vacant->title = $data['title']; 
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->last_day = $data['last_day'];
        $vacant->description = $data['description'];

        $vacant->image = $data['image'] ?? $vacant->image;

        //Save the vacant
        $vacant->save();

        //Redirect
        session()->flash('message', 'The vacant has been updated succesfully');
        return redirect()->route('jobOpenings.index');

    }
    
    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        
        return view('livewire.edit-job-opening',[
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }

    
}
