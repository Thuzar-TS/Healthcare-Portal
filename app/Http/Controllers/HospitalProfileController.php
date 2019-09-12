<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HospitalProfile;
use DB;
use App\Category;

class HospitalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = value;
        // foreach($test as $test){
        //     $favourite_list = HospitalProfile::where('id',$test)->get();
        // }
        
        // return response()->json(array_reverse($favourite_list));
    }

    public function getFavouriteHospital($local_sto) {
        $query = "SELECT hospital_profiles.* ,customers.*, townships.township_name, townships.city_id, cities.city_name FROM `hospital_profiles`
                    JOIN customers ON hospital_profiles.customer_id = customers.id
                    JOIN townships ON townships.id = customers.townships_id
                    JOIN cities ON townships.city_id = cities.id
                    WHERE hospital_profiles.id IN (" . $local_sto . ")";
        $fav_hospital = DB::select($query);
        foreach($fav_hospital as $fav) {
            $fea_arr = explode(",", $fav->special_features);
            $fav->special_features = $fea_arr;
        }
        return $fav_hospital;
    }

    public function getPostalList(){
        $query = "SELECT zipcode.id, zipcode.pref, CONCAT(zipcode.zip7_code,' ', zipcode.pref,' ', zipcode.city,' ', zipcode.street) AS name
                    FROM zipcode";
        $postal_list = DB::select($query);
        return $postal_list;
        // return $postal_list;
    }

    public function getCitiesName() {
        $query = "SELECT cities.id, cities.city_name FROM cities";
        $city_list = DB::select($query);
        return $city_list;
    }

    public function getSelectedCityName($selectedId){
        $query = "SELECT cities.id AS c_Id, zipcode.id, zipcode.pref, CONCAT(zipcode.city,' ', zipcode.street) AS street FROM zipcode
                    RIGHT JOIN cities
                    ON zipcode.city_id = cities.id
                    WHERE zipcode.id = $selectedId";
        $selectedCity = DB::select($query);
        return $selectedCity;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite_list = HospitalProfile::find($id);
        $favourite_list->delete();
        return response()->json('The successfully deleted');
    }
}
