<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index', ['patients' => Patient::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'firstname' => 'required|regex:/^([A-Za-z])+$/|max:30',
            'secondname' => "required|regex:/^[A-Za-z-]+$/i|max:30",
            'gender' => 'required',
            'contact_number' => 'required|regex:/[0-9]+/|max:9',
          ];
        $error_messages = [
            'firstname.required' => 'Pole imię pacjenta jest wymagane',
            'firstname.regex' => 'Dla pola imię użyto niedozwolonych znaków',
            'firstname.max' => 'Przekroczono długość dla pola imię (max 30 znaków)',
            'secondname.required' => 'Pole nazwisko jest wymagane',
            'secondname.regex' => 'Dla pola nazwisko użytko niedozwolonych znaków',
            'secondname.max' => 'Przekroczono długość dla pola nazwisko',
            'gender.required' => 'Wybranie płci jest wymagane',
            'contact_number.required' => 'Pole telefon jest wymagane',
            'contact_number.regex' => 'W polu telefon użytko niedozwolonych znaków',
            'contact_number.max' => 'Telefon ma mieć 9 cyfr'


        ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        Patient::create($input);

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patients.show', [
            'p' => Patient::findOrFail($patient->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', [
            'p' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'firstname' => 'required|regex:/^([A-Za-z])+$/|max:30',
            'secondname' => "required|regex:/^[A-Z][-'a-zA-Z]+$/|max:30",
            'gender' => 'required',
            'contact_number' => 'required|regex:/^[1-9][0-9]*$/|max:9',
          ];
        $error_messages = [
            'firstname.required' => 'Pole imię pacjenta jest wymagane',
            'firstname.alpha' => 'Dla pola imię użyto niedozwolonych znaków',
            'firstname.max' => 'Przekroczono długość dla pola imię (max 30 znaków)',
            'secondname.required' => 'Pole nazwisko jest wymagane',
            'secondname.regex' => 'Dla pola nazwisko użyto niedozwolonych znaków',
            'secondname.max' => 'Przekroczono długość dla pola nazwisko',
            'gender.required' => 'Wybranie płci jest wymagane',
            'contact_number.required' => 'Pole telefon jest wymagane',
            'contact_number.regex' => 'W polu telefon użytko niedozwolonych znaków',
            'contact_number.max' => 'Telefon ma mieć 9 cyfr'


        ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $patient = Patient::where('id',$id)->firstOrFail();
        $patient ->update($input);
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        Patient::destroy($patient->id);
        return redirect()->route('patients.index');
    }
}
