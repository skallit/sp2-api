<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Medecine;

class MedecineController extends Controller
{
    public $successStatus = 200;

    public function getMedecines()
    {
        $medecines = Medecine::get();

        return $medecines;
    }
}
