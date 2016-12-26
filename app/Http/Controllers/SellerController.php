<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Validator;
use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function postRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|min:6'
        ]);
        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $token = str_random(64);
        $seller = new Seller();

        $seller->name = $request['name'];
        $seller->email = $request['email'];
        $seller->password = md5($request['password']);
        $seller->api_token = $token;

        $seller->save();
        $seller->api_token = $token.'seller'.$seller->id;
        $seller->update();

        return response()->json(['id' => $seller->id, 'token' => $seller->api_token, 'type' => 'seller']);
    }

    public function checkSeller(Request $request)
    {
        $seller = Seller::find(intval($request['id']));
        if($seller->api_token == $request['token'])
        {
            return response()->json(['confirmed' => true]);
        }
        return response()->json(['confirmed' => $seller->api_token]);
    }

    public function postSignIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $seller = Seller::where('email', '=', $request['email'])->first();
        if(!$seller)
        {
            return response()->json(['errors' => 'Seller does not exist.']);
        }
        else if($seller->password !== md5($request['password']))
        {
            return response()->json(['errors' => 'Invalid password.']);
        }
        $seller->api_token = str_random(64).'seller'.$seller->id;
        $seller->update();
        return response()->json(['id' => $seller->id, 'token' => $seller->api_token, 'type' => 'seller']);
    }
}
