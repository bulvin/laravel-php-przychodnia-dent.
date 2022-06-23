<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servicess.index', ['services' => Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicess.create');
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

            'name' => "required|unique:services,name|alpha|max:30",
            'price' => "required|numeric|between:0,5000",
            'description' => 'required',
          ];
        $error_messages = [
            'name.required' => 'Pole nazwy jest wymagane',
            'name.unique' => 'Ta nazwa już istnieje',
            'name.max' => 'Przekroczono ilość znaków dla pola nazwa',
            'price.required' => 'Pole ceny jest wymagane',
            'price.numeric' => 'Użyto niedozwolonych znaków',
            'price.between' => 'Cena ma być od 0 do 5000 zł!',
            'description.required' => 'Pole Opisu jest wymagane',

        ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        Service::create($input);

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }


    public function edit($id)
    {

            $service = Service::findOrFail($id);
            return view('servicess.edit', [
                's' => $service
            ]);
    }


    public function update(Request $request, $id)
    {

        $service = Service::findOrFail($id);

        $rules = [

            'name' => 'required|max:30|unique:services,name,'.$id,
            'price' => "required|numeric|between:0,5000",
            'description' => 'required',
          ];
        $error_messages = [
            'name.required' => 'Pole nazwy jest wymagane',
            'name.unique' => 'Ta nazwa już istnieje',
            'name.max' => 'Przekroczono ilość znaków dla pola nazwa',
            'price.required' => 'Pole ceny jest wymagane',
            'price.numeric' => 'Użyto niedozwolonych znaków',
            'price.between' => 'Cena ma być od 0 do 5000 zł!',
            'description.required' => 'Pole Opisu jest wymagane',

        ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $service->update($input);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        Service::destroy($service->id);
        return redirect()->route('services.index');
    }
}
