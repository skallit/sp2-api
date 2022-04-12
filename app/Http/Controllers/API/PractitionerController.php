<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use App\Models\Sectordistrict;
use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    public $successStatus = 200;

    /**
     * @return Practitioner[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getPractitioners()
    {
        $practitioners = Practitioner::all();

        return $practitioners;
    }

    public function getPractitionerById($id)
    {
        $practitioner = Practitioner::find($id);


        $practitioner['sectordistrict_id'] = Sectordistrict::find($practitioner->sectordistrict_id);

        return $practitioner;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPractitioner(Request $request)
    {
        $input = $request->all();
        $practitioner = Practitioner::create($input);

        return response()->json(['success' => $practitioner], $this->successStatus);
    }

    public function editPractitioner(Practitioner $practitioner)
    {
        $data = Practitioner::find($practitioner->id);
    }
}
