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

    /**
     * Indicates if user is being updated.
     *
     * @var bool
     */
    public $updatingStudent = false;

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

    public $student = null;

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
     * Shows the update students screen.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updateStudent(Student $student)
    {
        $this->student = $student;

        $this->name = $student->name;
        $this->last_name = $student->last_name;
        $this->mothers_last_name = $student->mothers_last_name;
        $this->curp = $student->curp;
        $this->grade = $student->grade;
        $this->group = $student->group;
        $this->first_period_qualification = $student->first_period_qualification;
        $this->second_period_qualification = $student->second_period_qualification;
        $this->third_period_qualification = $student->third_period_qualification;
        $this->observations = $student->observations;

        $this->resetErrorBag();
        $this->dispatchBrowserEvent('updating-students');

        $this->updatingStudent = true;
    }

    /**
     * Create a new registered student.
     *
     * @return void
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
     * Update a registered student.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $this->student->name = $this->name;
        $this->student->last_name = $this->last_name;
        $this->student->mothers_last_name = $this->mothers_last_name;
        $this->student->curp = $this->curp;
        $this->student->grade = $this->grade;
        $this->student->group = $this->group;
        $this->student->first_period_qualification = $this->first_period_qualification;
        $this->student->second_period_qualification = $this->second_period_qualification;
        $this->student->third_period_qualification = $this->third_period_qualification;
        $this->student->observations = $this->observations;
        $this->student->save();

        $this->updatingStudent = false;
        $this->dispatchBrowserEvent('alert-message');

        session()->flash('flash.banner', 'Alumno actualizado con éxito.');
        session()->flash('flash.bannerStyle', 'success');
    }

    /**
     * Destroy a registered student
     * 
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function destroy(Student $student)
    {
        $student->delete();
        
        session()->flash('flash.banner', 'Alumno eliminado con éxito.');
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
            'students' => Student::where('user_id', \Auth::user()->id)
                 ->finderFilter($this->search)
                 ->paginate($this->perPage)
        ]);
    }
}
