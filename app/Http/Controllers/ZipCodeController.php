<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class ZipCodeController extends Controller {

    public function __construct()
    {

    }

    public function index()
    {

        return view('zipcode.index');

    }

    public function get(Request $request)
    {
        $zip = $request->get('zip', '0');

        if ($zip !== '0' && mb_strlen($zip) === 8 && preg_match("/^[0-9]{8}?$/", $zip))
        {

            $zipcodeinfo = zipcode($zip);

            if ($zipcodeinfo)
            {

                return $zipcodeinfo->getJson();

            }

        }

        return Response::json(['error' => 1]);

    }

}