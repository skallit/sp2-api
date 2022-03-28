<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use App\Models\Visit;
use App\Models\Visitreport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public $successStatus = 200;

    /**
     * @return array
     */
    public function getPlannedVisit()
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
        $visits = Visit::with('employee')
            ->with('practitioners')
            ->where('employee_id', '=', Auth::id())
            ->where('visitstate_id','=','1' and '3')
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
        $visit = Visit::with('employee')
            ->with('practitioners')
            ->where('id', $id)
            ->get();

        return $visit;
    }

    //public function createVisitReport($id)
    //{
        //
    //}

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


    /**
     * @param $id
     * @return bool|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteVisit($id)
    {
        //$visit = Visit::all()->where('id','=',$id);
        //dd($visit);
        $visit = Visit::where('id', $id)->first();
        //dd($visit->employee_id);
        if($visit->employee_id == Auth::id()){
            $delete = Visitreport::where('visit_id',$id)->delete()
                && Visit::where('id',$id)->delete();
            return $delete;
        }
        else {
            return response('Vous n\'êtes pas autorisé à supprimer cette visite.');
        }
        //return $visit->delete();
    }
}
