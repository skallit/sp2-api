<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public $successStatus = 200;


    /**
     * @return array
     */
    public function getVisit()
    {
//        $visits = [];
//        $visitsToDisplay = Visit::all();
//        foreach ($visitsToDisplay as $visitToDisplay){
//            $visit = [];
//
//            $visit['attendedDate'] = Carbon::parse($visitToDisplay->attendedDate)->format('d/m/Y H:i:s');
//            $visit['practitioner'] = Practitioner::find($visitToDisplay->practitioner_id)->firstname.' '.Practitioner::find($visitToDisplay->practitioner_id)->lastname;
//            $visit['address'] = Practitioner::find($visitToDisplay->practitioner_id)->address;
//            $visits[] = $visit;
//        }
        $visits = Visit::with('employee')->with('practitioners')->get();

        return $visits;
    }

    public function getPractitioners()
    {
        $practitioners = Practitioner::all();

        return $practitioners;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function createVisit(Request $request)
    {
        $visit = new Visit();
        $visit->practitioner_id = $request->practitioner_id;
        $visit->employee_id = Auth::user()->id;
        $visit->attendedDate = $request->attendedDate;
        $visit->visitstate_id = $request->visitstate_id;
        return response()->json(['success'=> $visit], $this->successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $data = Visit::find($visit->id)->delete();
        return response()->json(['success'=> $data], $this->successStatus);
    }
}
