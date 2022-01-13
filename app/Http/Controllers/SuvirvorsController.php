<?php

namespace App\Http\Controllers;

use App\Models\Suvirvor;
use Illuminate\Http\Request;

class SuvirvorsController extends Controller
{
    public function index()
    {
        $suvirvors= Suvirvor::all();
        return $suvirvors;
    }

    public function store(Request $request)
    {
        $suvirvor= new Suvirvor();
        $suvirvor->name=$request->name;
        $suvirvor->age=$request->age;
        $suvirvor->gender=$request->gender;
        $suvirvor->latitude=$request->latitude;
        $suvirvor->longitude=$request->longitude;
        $request->infected == 1 ? $suvirvor->infected=1 : $suvirvor->infected=0;
        $suvirvor->points=$request->points;
        $suvirvor->save();
    }

    public function update(Request $request, $id)
    {
        $suvirvor=Suvirvor::findOrFail($id);
        $suvirvor->name=$request->name;
        $suvirvor->age=$request->age;
        $suvirvor->gender=$request->gender;
        $suvirvor->latitude=$request->latitude;
        $suvirvor->longitude=$request->longitude;
        $request->infected == 1 ? $suvirvor->infected=1 : $suvirvor->infected=0;
        $suvirvor->points=$request->points;
        $suvirvor->save();
        return $suvirvor;

    }

    public function destroy($id)
    {
        Suvirvor::destroy($id);
    }
}
