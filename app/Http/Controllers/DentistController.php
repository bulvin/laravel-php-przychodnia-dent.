<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DentistController extends Controller
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
//$dentists = Dentist::all();
        return view('dentists.index', ['dentists' => Dentist::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dentists.create');
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

            'fullname' => "required|regex:/^([^0-9!@#$%^&*()]*)$/|max:30",
            'birthday_date' => 'required|before:' . now()->toDateString(),
            'gender' => 'required',
            'contact_number' => 'required|regex:/[0-9]+/|max:9',
            'specialization' => 'required',
          ];
        $error_messages = [
            'fullname.required' => 'Pole nazwa dentysty jest wymagana',
            'fullname.regex' => 'Dla pola nazwa użyto niedozwolonych znaków',
            'fullname.max' => "Przekroczono ilość znaków dla pola imię (max 30 znaków)",
            'birthday_date.required' => 'Pole data urodzenia jest wymagana',
            'birthday_date.before' => 'Data nie może być przyszła',
            'gender.required' => 'Wybranie płci jest wymagane',
            'contact_number.required' => 'Pole telefon jest wymagane',
            'contact_number.regex' => 'W polu telefon użytko niedozwolonych znaków',
            'contact_number.max' => 'Telefon ma mieć 9 cyfr',
            'specialization.required' => 'Wybór specjalizacji jest wymagany'

        ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        Dentist::create($input);

        return redirect()->route('dentists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function show(Dentist $dentist)
    {
        $dentist = Dentist::findOrFail($dentist -> id);
        return view('dentists.show', ['d' => $dentist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dentist = Dentist::findOrFail($id);
        return view('dentists.edit', [
            'd' => $dentist
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
            'fullname' => "required|regex:regex:/^[a-z ,.'-]+$/i|max:30",
            'birthday_date' => 'required|before:' . now()->toDateString(),
            'gender' => 'required',
            'contact_number' => 'required|regex:/[0-9]+/|max:9',
            'specialization' => 'required',
          ];
        $error_messages = [
            'fullname.required' => 'Pole nazwa dentysty jest wymagana',
            'fullname.regex' => 'Dla pola nazwa użyto niedozwolonych znaków',
            'birthday_date.required' => 'Pole data urodzenia jest wymagana',
            'birthday_date.before' => 'Data nie może być przyszła',
            'gender.required' => 'Wybranie płci jest wymagane',
            'contact_number.required' => 'Pole telefon jest wymagane',
            'contact_number.regex' => 'W polu telefon użytko niedozwolonych znaków',
            'specialization.required' => 'Wybór specjalizacji jest wymagany'

        ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $dentist = Dentist::where('id',$id)->firstOrFail();
        $dentist->update($input);
        return redirect()->route('dentists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dentist = Dentist::findOrFail($id);
        Dentist::destroy($dentist->id);
        return redirect()->route('dentists.index');
    }
}
