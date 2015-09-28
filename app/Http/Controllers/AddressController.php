<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class AddressController extends Controller {

    public function __construct()
    {

    }

    public function index()
    {
        return view('address.index');
    }

    public function get(Request $request)
    {
        $zipcodeaddressinfo = zipcodeaddress($request->get('uf'),$request->get('cidade'), $request->get('endereco'));

        if ($zipcodeaddressinfo)
        {

            return $zipcodeaddressinfo->getJson();

        }
        return Response::json(['error' => 1]);

    }

}