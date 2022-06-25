<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use App\Country;
use App\Safe;
use App\Bar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

 ///Operations on country table//////
    //view table of countries //
    public function ViewCountry()
    {
        $countries = Country::all();
        return view('ViewCountries',compact('countries'));
    }
    //create new country
    public function CreateCountry(Request $request)
    {
        $country = new Country;
        $country->name = $request->name;
        $country->longitude = $request->lng;
        $country->latitude = $request->lat;
        $country->save();
        return redirect()->back();
    }
    ///delete country///
    public function DeleteCountry($id)
    {
        Country::find($id)->delete();     
        return redirect()->back();
    }

    ///Operations on wieght table//////
    //view table of wieghts //
    public function ViewWeights()
    {
        $weights = Weight::all();
        return view('ViewWeights',compact('weights'));
    }
    /// create weight//
    public function CreateWeight(Request $request )
    {
        $measuring_unit = new Weight;
        $measuring_unit->measure_unit = $request->measure_unit;
        $measuring_unit->save();
        return redirect()->back();
    }
    ///delete weight///
    public function DeleteWeight($id)
    {
        Weight::find($id)->delete();     
        return redirect()->back();
    }

    ///Operations on safe table//////
    //view table of safes //
    public function ViewSafes()
    {
        $safes = Safe::all();
        $countries = Country::all();
        return view('ViewSafes',compact('safes','countries'));
    }
    /// create safe///
    public function CreateSafe(Request $request )
    {
        $safe = new Safe;
        $safe->type = $request->type;
        $safe->country_id = $request->country_id;
        $safe->save();
        return redirect()->back();
    }
    ///delete safe///
    public function DeleteSafe($id)
    {
        Safe::find($id)->delete();     
        return redirect()->back();
    }

    ///Operations on bar table//////
    //view table of bar //
    public function ViewBars()
    {
        $safes = Safe::all();
        $weights = Weight::all();
        $bars = Bar::all();
        return view('ViewBars',compact('safes','weights','bars'));
    }
    /// create safe///
    public function CreateBar(Request $request )
    {
        $bar = new Bar;
        $bar->name = $request->name;
        $bar->measurement = $request->measurement;
        $bar->weight_id = $request->weight_id;
        $bar->safe_id = $request->safe_id;
    /////Checking if Bar type is equal to Safe type////
        $safe = Safe::find($request->safe_id);
        $cnt=0;
        foreach( $safe->toArray() as $key => $value )
        {
               $cnt++;
               if($cnt==2)
                    $safe_id1 = $value;
        }
        if($safe_id1 == $request->type ){
            $bar->type = $request->type;
        }
        else{
            return redirect()->back()->withMessage('Invalid!');
        }
    /////////////////////////////////////////////////
        $bar->save();
        return redirect()->back();
    }
    ///delete safe///
    public function DeleteBar($id)
    {
        Bar::find($id)->delete();     
        return redirect()->back();
    }

}
