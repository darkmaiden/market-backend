<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function postRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6'
        ]);
        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $token = str_random(64);
        $customer = new Customer();

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = md5($request['password']);

        $customer->save();
        $customer->api_token = $token."customer".$customer->id;
        $customer->update();

        return response()->json(['id' => $customer->id, 'token' => $token, 'type' => 'customer']);
    }


    public function checkCustomer(Request $request)
    {
        $customer = Customer::find(intval($request['id']));
        if($customer->api_token == $request['token'])
        {
            return response()->json(['confirmed' => true]);
        }
        return response()->json(['confirmed' => $customer->api_token]);
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

        $customer = Customer::where('email', '=', $request['email'])->first();
        if(!$customer)
        {
            return response()->json(['errors' => 'Customer does not exist.']);
        }
        else if($customer->password !== md5($request['password']))
        {
            return response()->json(['errors' => 'Invalid password.']);
        }
        $customer->api_token = str_random(64).'customer'.$customer->id;
        $customer->update();
        return response()->json(['id' => $customer->id, 'token' => $customer->api_token, 'type' => 'customer']);
    }
    
}
