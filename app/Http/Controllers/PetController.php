<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, Pet $pet)
    {
        return view('pets.index')->with('pets', $pet->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Check if all the fields are set. There are build in ways to validate this but I wanted better control of the return.
        foreach(['name', 'type', 'address'] as $field) {
            if($request->$field == null) {
                return response()->json(array('msg'=> "$field has not been filled in"), 200);
            }
        }

        // If the above passes, try to create the entry
        $response = DB::table('pets')->insert([
            'name' => $request->name,
            'type' => $request->type,
            'address' => $request->address
        ]);

        // Quick check if the entry succeeded.
        if($response) {
            $pets = Pet::all();
            return response()->json(['html' => view('pets.overview',compact('pets'))->render()]);
        } else {
            return response()->json(array('msg'=> "Something went wrong"), 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $deleted = DB::table('pets')->where('id', $id)->delete();

        if($deleted) {
            $pets = Pet::all();
            return response()->json(['html' => view('pets.overview',compact('pets'))->render()]);
        }
    }
}
