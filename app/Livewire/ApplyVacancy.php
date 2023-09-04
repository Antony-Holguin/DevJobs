<?php

namespace App\Livewire;

use App\Models\JobOpening;
use App\Notifications\ApplicantNotification;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    public $cv;
    public $jobOpening;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(JobOpening $jobOpening){
        $this->jobOpening = $jobOpening;
    }

    public function apply(){
        $data = $this->validate();

        //Upload image
        $cv = $this->cv->store('public/cvs');
        $cvName = str_replace('public/cvs/','',$cv);

        $this->jobOpening->applicant()->create([
            'user_id' => auth()->user()->id,
            'cv' => $cvName,
        ]);

        //Notification
        $this->jobOpening->recruiter->notify(new ApplicantNotification($this->jobOpening->id,$this->jobOpening->title,auth()->user()->id));

        session()->flash('message', 'Your cv was sent correctly');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
