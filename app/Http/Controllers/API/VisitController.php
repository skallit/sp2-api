<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Practitioner;
use App\Models\Visit;
use App\Models\Visitreport;
use App\Models\Visitstate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public $successStatus = 200;

    /**
     * @return array
     */
    public function getPlannedVisit()
    {
        $visits = Visit::with('employee')
            ->with('practitioners')
            ->whereDate('attendedDate', now()->addDay())
            ->where('employee_id', '=', Auth::id())
            ->where('visitstate_id','=','1' and '3')
            ->get();

        return $visits;
    }

    public function getFinishedVisit()
    {
        $visits = Visit::with('employee')
            ->with('practitioners')
            ->whereDate('attendedDate', now())
            ->where('employee_id', '=', Auth::id())
            ->where('visitstate_id','=','2')
            ->get();

        return $visits;
    }

    public function getVisitById($id)
    {
//        $visit = Visit::where('id', $id)->first();
//        if ($visit->employee_id == Auth::id()) {
//            $visit = Visitreport::where('visit_id',$id)
//                && Visit::where('id',$id);
//            return $visit;
//        }else{
//            return response('Vous n\'êtes pas autorisé à accéder à cette page.');
//        }

        $visit = Visit::find($id);

        $visitView['id'] = $visit->id;
        $visitView['practitioner_id'] = Practitioner::find($visit->practitioner_id);
        $visitView['employee_id'] = Employee::find($visit->employee_id);
        $visitView['address'] = Practitioner::find($visit->practitioner_id)->address;
        $visitView['attendedDate'] = $visit->attendedDate;
        $visitView['visitstate_id'] = Visitstate::find($visit->visitstate_id);

        return $visitView;
    }

    public function getVisitsByPractitioner($id)
    {
        $practitioner = Practitioner::where("id",$id)
            ->with('visits')
            ->first();


        foreach ($practitioner->visits as $visit){
            if ($visit->visitstate_id == 2) {
                $visitreport = Visitreport::where('visit_id', $visit->id)->get();
                $visit['visitReport'] = $visitreport;
            }
        }
       // $visits = Visit::where('practitioner_id',$id)->get();
//        $visits = DB::table('practitioners')
//            ->join('visits', 'practitioners.id', '=', 'visits.practitioner_id')
//            ->join('visitreports', 'visits.id', '=', 'visitreports.visit_id')
//            ->where('practitioner_id', $id)
//            ->get();


        return $practitioner;
    }

    public function updateVisit(Visit $visit, Request $request)
    {
        $update = Visit::find($visit->id);
        //$update =
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVisit(Request $request)
    {
//        $visit = new Visit();
//        $visit->practitioner_id = $request->practitioner_id;
//        $visit->employee_id = Auth::user()->id;
//        $visit->attendedDate = $request->attendedDate;
//        $visit->visitstate_id = $request->visitstate_id;
        $input = $request->all();
        $input['employee_id'] = Auth::user()->id;
        $visit = Visit::create($input);

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

    public function delete($id)
    {
        //
    }



    public function cancelVisit(Visit $visit)
    {
        //$visit = Visit::all()->where('id','=',$id);
        //dd($visit);
        //dd($visit->employee_id);
        $data = Visit::find($visit->id);
        $data->visitstate_id=4;
        return $data->save();
        //return $visit->delete();
    }

}
