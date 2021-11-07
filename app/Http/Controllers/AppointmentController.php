<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * Create a new process instance.
     *
     * @return void
     */
    public function __construct($request = null)
	{
        $this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('patient_id', auth()->user()->id)->paginate(10);
        return view('page.appointment.index')->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.register-appointment.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the request...
        $request->validate([
            'type_appointment'  => 'required',
            'date'              => 'required|date|after:today',
        ]);

        if(Appointment::where('patient_id', auth()->user()->id)->where('ailment', $request->type_appointment)->where('date_sched', $request->date)->doesntExist()){
            // Create and save the data...
            $data = Appointment::create([
                'ailment'       => $request->type_appointment,
                'date_sched'    => $request->date,
                'patient_id'    => auth()->user()->id,
            ]);

            // Redirect...
            return redirect()->route('appointmentappointment.history')->with('success', 'Appointment created successfully.');
        }

        if(Appointment::where('patient_id', auth()->user()->id)->where('ailment', $request->type_appointment)->where('date_sched', $request->date)->exists()){

            // Redirect...
            return redirect()->route('register.appointment.create');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
