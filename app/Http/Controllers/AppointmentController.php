<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\Service;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index', ['appointments' => Appointment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create', ['patients' => Patient::all(), 'dentists' => Dentist::all(), 'services' => Service::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $input = $request->all();
        $patient = $request->patient;
        $visit = new Appointment;

        $patient = Patient::findOrFail($request->patient);
        $dentist = Dentist::findOrFail($request->dentist);
        $visit->patient_id = $patient->id;
        $visit->dentist_id = $dentist->id;
        $visit->appointment_date = $request->appointment_date;
        $visit->appointment_hour = $request->appointment_hour;

        $services = $request->service;

        $visit->save();
        foreach($services as $s){
            $visit->services()->attach($s);
        }

        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $appointment = Appointment::findOrFail($appointment->id);
        return view('appointments.show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $appointment = Appointment::findOrFail($appointment->id);

        return view('appointments.edit', [
            'a' => $appointment,
            'dentists' => Dentist::all(),
            'services' => Service::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment = Appointment::findOrFail($appointment->id);
        $input = $request->all();
        $appointment->dentist_id = $request->dentist;
        $appointment->update($input);

        $appointment->services()->sync($request->input('service', []));


        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment = Appointment::findOrFail($appointment->id);
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
