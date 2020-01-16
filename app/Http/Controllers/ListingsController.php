<?php

namespace App\Http\Controllers;

use App\Listing;
use App\User;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()) {
            return view('listing/create');
        } else {
            return view('auth/login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'address'=>'required',
        //     'phone'=>'required',
        //     'bio'=>'required',
        // ]);

            $userid = auth()->user()->id;

            $listing = new Listing;
            $listing->user_id = $userid;
            $listing->name = $request->name;
            $listing->email = $request->email;
            $listing->address = $request->address;
            $listing->phone = $request->phone;
            $listing->bio = $request->bio;

            $listing->save();

            return redirect()->action('HomeController@index')->with('success', 'New Listing Created');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('listing/edit')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::find($id);

        $listing->name = $request->name;
        $listing->email = $request->email;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->bio = $request->bio;
        $listing->save();

        return redirect()->action('HomeController@index')->with('success', 'Listing Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        $listing->delete();

        return redirect()->action('HomeController@index')->with('success', 'Listing Deleted');
    }
}
