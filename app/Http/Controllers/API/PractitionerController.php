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

        $practitionerView['id'] = $practitioner->id;
        $practitionerView['lastname'] = $practitioner->lastname;
        $practitionerView['firstname'] = $practitioner->firstname;
        $practitionerView['address'] = $practitioner->address;
        $practitionerView['email'] = $practitioner->email;
        $practitionerView['website'] = $practitioner->website;
        $practitionerView['meeting_online'] = $practitioner->meeting_online;
        $practitionerView['status'] = $practitioner->status;
        $practitionerView['tel'] = $practitioner->tel;
        $practitionerView['notorietyCoeff'] = $practitioner->notorietyCoeff;
        $practitionerView['complementarySpeciality'] = $practitioner->complementarySpeciality;
        $practitionerView['sectordistrict_id'] = Sectordistrict::find($practitioner->sectordistrict_id);

        return $practitionerView;
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
