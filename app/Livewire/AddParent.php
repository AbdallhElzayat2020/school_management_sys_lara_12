<?php

namespace App\Livewire;

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddParent extends Component
{

    public $successMessage = '';

    public $catchError;

    public $currentStep = 1,

        // Father_INPUTS
        $email, $password,
        $name_father, $name_father_en,
        $national_id_father, $passport_id_father,
        $phone_father, $job_father, $job_father_en,
        $nationality_father_id, $blood_type_father_id,
        $address_father, $religion_father_id,

        // Mother_INPUTS
        $name_mother, $name_mother_en,
        $national_id_mother, $passport_id_mother,
        $phone_mother, $job_mother, $job_mother_en,
        $nationality_mother_id, $blood_type_mother_id,
        $address_mother, $religion_mother_id;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'national_id_father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_id_father' => 'min:10|max:10',
            'phone_father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'national_id_mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_id_mother' => 'min:10|max:10',
            'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => TypeBlood::all(),
            'Religions' => Religion::all(),
        ]);
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:my_parents,email|email',
            'password' => 'required',
            'name_father' => 'required',
            'name_father_en' => 'required',
            'job_father' => 'required',
            'job_father_en' => 'required',
            'national_id_father' => 'required|unique:my_parents,national_id_father',
            'passport_id_father' => 'required|unique:my_parents,passport_id_father',
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => 'required',
            'blood_type_father_id' => 'required',
            'religion_father_id' => 'required',
            'address_father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        $this->validate([
            'name_mother' => 'required',
            'name_mother_en' => 'required',
            'national_id_mother' => 'required|unique:my_parents,national_id_mother',
            'passport_id_mother' => 'required|unique:my_parents,passport_id_mother',
            'phone_mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'job_mother' => 'required',
            'job_mother_en' => 'required',
            'nationality_mother_id' => 'required',
            'blood_type_mother_id' => 'required',
            'religion_mother_id' => 'required',
            'address_mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        try {
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->name_father = ['en' => $this->name_father_en, 'ar' => $this->name_father];
            $My_Parent->national_id_father = $this->national_id_father;
            $My_Parent->passport_id_father = $this->passport_id_father;
            $My_Parent->phone_father = $this->phone_father;
            $My_Parent->job_father = ['en' => $this->job_father_en, 'ar' => $this->job_father];
            $My_Parent->nationality_father_id = $this->nationality_father_id;
            $My_Parent->blood_type_father_id = $this->blood_type_father_id;
            $My_Parent->religion_father_id = $this->religion_father_id;
            $My_Parent->address_father = $this->address_father;

            // Mother_INPUTS
            $My_Parent->name_mother = ['en' => $this->name_mother_en, 'ar' => $this->name_mother];
            $My_Parent->national_id_mother = $this->national_id_mother;
            $My_Parent->passport_id_mother = $this->passport_id_mother;
            $My_Parent->phone_mother = $this->phone_mother;
            $My_Parent->job_mother = ['en' => $this->job_mother_en, 'ar' => $this->job_mother];
            $My_Parent->nationality_mother_id = $this->nationality_mother_id;
            $My_Parent->blood_type_mother_id = $this->blood_type_mother_id;
            $My_Parent->religion_mother_id = $this->religion_mother_id;
            $My_Parent->address_mother = $this->address_mother;

            $My_Parent->save();
            $this->successMessage = trans('tables.success_msg');
            $this->clearForm();
            $this->currentStep = 1;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        }
    }


    //clearForm
    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name_father = '';
        $this->job_father = '';
        $this->job_father_en = '';
        $this->name_father_en = '';
        $this->national_id_father = '';
        $this->passport_id_father = '';
        $this->phone_father = '';
        $this->nationality_father_id = '';
        $this->blood_type_father_id = '';
        $this->address_father = '';
        $this->religion_father_id = '';

        /* Mother Information */
        $this->name_mother = '';
        $this->job_mother = '';
        $this->job_mother_en = '';
        $this->name_mother_en = '';
        $this->national_id_mother = '';
        $this->passport_id_mother = '';
        $this->phone_mother = '';
        $this->nationality_mother_id = '';
        $this->blood_type_mother_id = '';
        $this->address_mother = '';
        $this->religion_mother_id = '';
    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }


    protected function messages()
    {
        return [
            'email' => 'The email is required.',
            'password' => 'The password is required.',

            'name_father' => 'The father\'s name is required.',
            'name_father_en' => 'The father\'s name (English) is required.',
            'national_id_father' => 'The father\'s national ID is required.',
            'passport_id_father' => 'The father\'s passport ID is required.',
            'phone_father' => 'The father\'s phone number is required.',
            'phone_father.regex' => 'The father\'s phone number is invalid.',
            'phone_father.min' => 'The father\'s phone number is too short.',
            'phone_father.max' => 'The father\'s phone number is too long.',
            'job_father' => 'The father\'s job is required.',
            'job_father_en' => 'The father\'s job (English) is required.',
            'nationality_father_id' => 'The father\'s nationality is required.',
            'blood_type_father_id' => 'The father\'s blood type is required.',
            'religion_father_id' => 'The father\'s religion is required.',
            'address_father' => 'The father\'s address is required.',

            'name_mother' => 'The mother\'s name is required.',
            'name_mother_en' => 'The mother\'s name (English) is required.',
            'national_id_mother' => 'The mother\'s national ID is required.',
            'passport_id_mother' => 'The mother\'s passport ID is required.',
            'phone_mother' => 'The mother\'s phone number is required.',
            'job_mother' => 'The mother\'s job is required.',
            'job_mother_en' => 'The mother\'s job (English) is required.',
            'nationality_mother_id' => 'The mother\'s nationality is required.',
            'blood_type_mother_id' => 'The mother\'s blood type is required.',
            'religion_mother_id' => 'The mother\'s religion is required.',
            'address_mother' => 'The mother\'s address is required.',
        ];
    }
}
