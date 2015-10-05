<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Canducci\ZipCode\ZipCodeUf;

class AddressController extends Controller {

    public function __construct()
    {

    }

    public function index()
    {
        $lists = ZipCodeUf::lists();
        return view('address.index')
            ->with('lists', $lists);
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