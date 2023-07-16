<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\OccupationCategory;
use App\Models\BusinessCategory;
use App\Models\SpecialityCategory;
use App\Models\LocationCategory;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('job.index');
    }

    //api route
    public function search(Request $request)
    {

        if($request->q){
//            $data = OccupationCategory::where('category_name', 'LIKE', '%' . $request->q . '%')->with('post')->get();
            $posts = Post::whereHas('occupation_category', function ($query) use ($request) {
                return $query->where('category_name', 'LIKE', '%' . $request->q . '%');
            })->orWhereHas('business_category', function ($query) use ($request) {
                return $query->where('category_name', 'LIKE', '%' . $request->q . '%');
            })->orWhereHas('speciality_category', function ($query) use ($request) {
                return $query->where('category_name', 'LIKE', '%' . $request->q . '%');
            })->orWhereHas('location_category', function ($query) use ($request) {
                return $query->where('category_name', 'LIKE', '%' . $request->q . '%');
            })->with('company')->with('speciality_category')->get();
            // dd($posts); exit;
            //$posts = $posts->has('company')->with('company');
            foreach($posts as $post) {
                $post->spcategorycustom_jp = $post->spcategory_jp;
            }
            return $posts->toJson();
        }
    }
    public function getOccategories()
    {
        $occategories = OccupationCategory::all();
        return $occategories->toJson();
    }
    public function getBucategories()
    {
        $bucategories = BusinessCategory::all();
        return $bucategories->toJson();
    }
    public function getSpcategories()
    {
        $spcategories = SpecialityCategory::all();
        return $spcategories->toJson();
    }
    public function getLocategories()
    {
        $locategories = LocationCategory::all();
        return $locategories->toJson();
    }
    public function getAllOrganization()
    {
        $companies = Company::all();
        return $companies->toJson();
    }
    public function getAllByTitle()
    {
        $posts = Post::where('deadline', '>', Carbon::now())->get()->pluck('id', 'job_title');
        return $posts->toJson();
    }
}
