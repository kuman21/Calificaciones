<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class QualificationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $student = Student::where('curp', mb_strtolower($request->curp))->first();

        if (!is_object($student)) {
            session()->flash('flash.banner', 'La curp no coincide con nuestros registros, verifica que este escrita correctamente.');
            session()->flash('flash.bannerStyle', 'danger');

            return back();
        }

        return view('qualifications.show')->with('student', $student);
    }
}
