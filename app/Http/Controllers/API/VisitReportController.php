<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Visitreport;
use App\Models\Visitreportstate;
use Illuminate\Http\Request;

class VisitReportController extends Controller
{
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getVisitReport($id)
    {
        $visitReport = Visitreport::find($id);

        $visitReportView['id'] = $visitReport->id;
        $visitReportView['visit_id'] = Visit::find($visitReport->visit_id);
        $visitReportView['creationDate'] = $visitReport->creationDate;
        $visitReportView['comment'] = $visitReport->comment;
        $visitReportView['starScore'] = $visitReport->starScore;
        $visitReportView['visitreportstate_id'] = Visitreportstate::find($visitReport->visitreportstate_id);

        return $visitReportView;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($visit_id)
    {
//        $visitreports = Visitreport::find($visit_id)->visits;
//        $visits = [];
//
//        foreach($visitreports as $visitreport) {
//            $booking = [];
//
//            $booking['id'] = $activeBooking['id'];
//            $booking['driver'] = Driver::find($activeBooking['driver_id'])->firstName.' '. Driver::find($activeBooking['driver_id'])->lastName;
//            $booking['vehicle'] = Vehicle::find($activeBooking['vehicle_id'])->matriculation;
//            $booking['halfDay'] = $activeBooking['halfDay'] == 1 ? 'morning' : 'afternoon';
//            $booking['trip_type'] = TripType::find($activeBooking['trip_type_id'])->name;
//
//            $bookings[] = $booking;
//                }
//            }
//        }
//
//        return response()->json(['success'=> $visitreport], $this->successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitreport  $visitreport
     * @return \Illuminate\Http\Response
     */
    public function show(Visitreport $visitreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitreport  $visitreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
//        // This edit section will be used like to create a visitreport.
//        // A planned visit dispose a null visitreport that will be redacted by a visitor.
//        $visitreport = Visitreport::find($id);
//        $visitreport->update($request->all());
//        return $visitreport;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitreport  $visitreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitreport $visitreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitreport  $visitreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitreport $visitreport)
    {
        //
    }
}
