<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\NatureOfBusiness;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeOfContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $natureOfBusinesses = NatureOfBusiness::where('deleted_at', null)->get();

        return view('/maintenance/typeOfContract');
    }

   
}
