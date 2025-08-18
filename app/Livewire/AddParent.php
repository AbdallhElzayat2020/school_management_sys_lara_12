<?php

namespace App\Livewire;

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $updateMode = false;
    public $photos = [];
    public $show_table = true;
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
            'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // ensure selects are integers when changed
            'nationality_father_id' => 'sometimes|integer|exists:nationalities,id',
            'blood_type_father_id' => 'sometimes|integer|exists:type_bloods,id',
            'religion_father_id' => 'sometimes|integer|exists:religions,id',
            'nationality_mother_id' => 'sometimes|integer|exists:nationalities,id',
            'blood_type_mother_id' => 'sometimes|integer|exists:type_bloods,id',
            'religion_mother_id' => 'sometimes|integer|exists:religions,id',
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
            'nationality_father_id' => 'required|integer|exists:nationalities,id',
            'blood_type_father_id' => 'required|integer|exists:type_bloods,id',
            'religion_father_id' => 'required|integer|exists:religions,id',
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
            'nationality_mother_id' => 'required|integer|exists:nationalities,id',
            'blood_type_mother_id' => 'required|integer|exists:type_bloods,id',
            'religion_mother_id' => 'required|integer|exists:religions,id',
            'address_mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        try {
            $my_parent = MyParent::create([
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'name_father' => ['en' => $this->name_father_en, 'ar' => $this->name_father],
                'national_id_father' => $this->national_id_father,
                'passport_id_father' => $this->passport_id_father,
                'phone_father' => $this->phone_father,
                'job_father' => ['en' => $this->job_father_en, 'ar' => $this->job_father],
                'nationality_father_id' => $this->nationality_father_id,
                'blood_type_father_id' => $this->blood_type_father_id,
                'religion_father_id' => $this->religion_father_id,
                'address_father' => $this->address_father,
                'name_mother' => ['en' => $this->name_mother_en, 'ar' => $this->name_mother],
                'national_id_mother' => $this->national_id_mother,
                'passport_id_mother' => $this->passport_id_mother,
                'phone_mother' => $this->phone_mother,
                'job_mother' => ['en' => $this->job_mother_en, 'ar' => $this->job_mother],
                'nationality_mother_id' => $this->nationality_mother_id,
                'blood_type_mother_id' => $this->blood_type_mother_id,
                'religion_mother_id' => $this->religion_mother_id,
                'address_mother' => $this->address_mother,
            ]);


            foreach ($this->photos as $photo) {
                $filename = $photo->getClientOriginalName();
                $path = $photo->storeAs($this->national_id_father, $filename, 'parentAttachments');
                // $photo->storeAs($this->national_id_father, $filename, 'parentAttachments');

                $my_parent->images()->create(['url' => $path]);
            }

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
