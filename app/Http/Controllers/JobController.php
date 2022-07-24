<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use DB;

class JobController extends Controller
{
    
    public function index()
    {
        $jobs = Job::leftjoin('job_levels', 'job_levels.id', '=', 'jobs.joblevel_id')
                ->leftjoin('job_types', 'job_types.id', '=', 'jobs.type_id')
                ->where('company_id', Auth::user()->Company->id)
                ->select('jobs.*', 'job_types.type_name as type', 'job_levels.joblevel_name as level')->paginate(15);

        return view('pages.list-jobs')->with('jobs', $jobs);
    }
    
    public function create()
    {
        $listLevel = DB::table('job_levels')->pluck('joblevel_name', 'id');
        $listType = DB::table('job_types')->pluck('type_name', 'id');

        $category = SubCategory::leftjoin('categories', 'categories.id', '=', 'sub_categories.category_id')->get();
        $subcategory = $category->groupBy('category.category_name');

        return view('pages.create-job', compact('listLevel', 'listType', 'category', 'subcategory'));
    }

    public function searchDB(Request $request)
    {
          $search = $request->get('term');
      
          $result = DB::table('cities')->where('name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    }

}
