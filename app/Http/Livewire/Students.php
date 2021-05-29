<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class Students extends Component
{
    use WithPagination;

    /**
     * Indicates if user is being created.
     *
     * @var bool
     */
    public $creatingStudent = false;

    public $search = '';
    public $perPage = '10';

    public $name;
    public $last_name;
    public $mothers_last_name;
    public $curp;
    public $grade;
    public $group;
    public $first_period_qualification;
    public $second_period_qualification;
    public $third_period_qualification;
    public $observations;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10']
    ];

    protected $rules = [
        'name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'mothers_last_name' => 'required|max:255',
        'curp' => 'required|max:18',
        'grade' => 'required|max:1',
        'group' => 'required|max:1'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.max' => 'El campo nombre no debe tener más de 255 carácteres..',
        'last_name.required' => 'El campo apellido paterno es obligatorio.',
        'last_name.max' => 'El campo apellido paterno no debe tener más de 255 carácteres..',
        'mothers_last_name.required' => 'El campo apellido materno es obligatorio.',
        'mothers_last_name.max' => 'El campo apellido materno no debe tener más de 255 carácteres..',
        'curp.required' => 'El campo curp es obligatorio.',
        'curp.max' => 'El campo curp no debe tener más de 18 carácteres..',
        'grade.required' => 'El campo grado es obligatorio.',
        'grade.max' => 'El campo grado no debe tener más de 1 carácter..',
        'group.required' => 'El campo grupo es obligatorio.',
        'group.max' => 'El campo grupo no debe tener más de 1 carácter..',
    ];

    /**
     * Shows the create students screen.
     *
     * @return void
     */
    public function createStudent()
    {
        $this->name = '';
        $this->last_name = '';
        $this->mothers_last_name = '';
        $this->curp = '';
        $this->grade = '';
        $this->group = '';
        $this->first_period_qualification = '';
        $this->second_period_qualification = '';
        $this->third_period_qualification = '';
        $this->observations = '';

        $this->resetErrorBag();
        $this->dispatchBrowserEvent('creating-students');

        $this->creatingStudent = true;
    }

    /**
     * Create a new registered user.
     *
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store()
    {
        $this->validate();

        $student = new Student();
        $student->user_id = \Auth::user()->id;
        $student->name = $this->name;
        $student->last_name = $this->last_name;
        $student->mothers_last_name = $this->mothers_last_name;
        $student->curp = $this->curp;
        $student->grade = $this->grade;
        $student->group = $this->group;
        $student->first_period_qualification = $this->first_period_qualification;
        $student->second_period_qualification = $this->second_period_qualification;
        $student->third_period_qualification = $this->third_period_qualification;
        $student->observations = $this->observations;
        $student->save();

        $this->creatingStudent = false;
        $this->dispatchBrowserEvent('alert-message');

        session()->flash('flash.banner', 'Alumno creado con éxito.');
        session()->flash('flash.bannerStyle', 'success');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.students', [
            'students' => Student::where('name', 'LIKE', "%{$this->search}%")
                 ->orWhere('last_name', 'LIKE', "%{$this->search}%")
                 ->orWhere('mothers_last_name', 'LIKE', "%{$this->search}%")
                 ->orWhere('curp', 'LIKE', "%{$this->search}%")
                 ->paginate($this->perPage)
        ]);
    }
}
