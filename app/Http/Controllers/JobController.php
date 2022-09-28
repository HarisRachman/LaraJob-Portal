<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use DB;

class JobController extends Controller
{
    
    public function index()
    {
        if(Auth::user()->role_id == 2) {
            $jobs = Job::leftjoin('job_levels', 'job_levels.id', '=', 'jobs.joblevel_id')
                ->leftjoin('job_types', 'job_types.id', '=', 'jobs.type_id')
                ->where('company_id', Auth::user()->Company->id)
                ->select('jobs.*', 'job_types.type_name as type', 'job_levels.joblevel_name as level')->paginate(15);
        } else {
            $jobs = Job::leftjoin('job_levels', 'job_levels.id', '=', 'jobs.joblevel_id')
                ->leftjoin('job_types', 'job_types.id', '=', 'jobs.type_id')
                ->select('jobs.*', 'job_types.type_name as type', 'job_levels.joblevel_name as level')->paginate(15);
        }

        return view('pages.job.list-jobs')->with('jobs', $jobs);
    }
    
    public function create()
    {
        $listLevel = DB::table('job_levels')->pluck('joblevel_name', 'id');
        $listType = DB::table('job_types')->pluck('type_name', 'id');

        $category = Category::with('SubCategory')->get();

        return view('pages.job.create-job', compact('listLevel', 'listType', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'lokasi' => 'required',
            'type' => 'required',
            'level' => 'required',
            'education' => 'required',
            'category' => 'required',
            'jam_kerja' => 'required',
            'deskripsi' => 'required',
            'experience' => 'required'
        ]);

        $job = new Job;
        $job->company_id = Auth::user()->Company->id;
        $job->job_title = $request->title;
        $job->slug_title = \Str::slug($request->title);
        $job->job_location = $request->lokasi;
        $job->type_id = $request->type;
        $job->category_id = $request->category;
        $job->joblevel_id = $request->level;
        $job->education = implode(', ', $request->education);
        $job->work_time = $request->jam_kerja;
        $job->experience = $request->experience;
        $job->salary = $request->salary1." Jt - ".$request->salary2.' Jt';
        $job->job_description = $request->deskripsi;
        
        $save = $job->save();

        if($save) {
            return redirect()->route('listJob')->with('success', 'Adding job data successfully');
        }else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to add data');
        }

    }

    public function edit($id)
    {
        $category = Category::with('SubCategory')->get();
        $listLevel = DB::table('job_levels')->pluck('joblevel_name', 'id');
        $listType = DB::table('job_types')->pluck('type_name', 'id');
        $job = Job::where('id', $id)->first();
        return view('pages.job.edit-job', compact('job', 'listLevel', 'listType', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'lokasi' => 'required',
            'type' => 'required',
            'level' => 'required',
            'education' => 'required',
            'category' => 'required',
            'jam_kerja' => 'required',
            'deskripsi' => 'required',
            'experience' => 'required'
        ]);

        $job = Job::find($id);
        $job->company_id = Auth::user()->Company->id;
        $job->job_title = $request->title;
        $job->slug_title = \Str::slug($request->title);
        $job->job_location = $request->lokasi;
        $job->type_id = $request->type;
        $job->category_id = $request->category;
        $job->joblevel_id = $request->level;
        $job->education = implode(',', $request->education);
        $job->work_time = $request->jam_kerja;
        $job->experience = $request->experience;
        $job->salary = $request->salary1." Jt - ".$request->salary2.' Jt';
        $job->job_description = $request->deskripsi;
        
        $save = $job->save();

        if($save) {
            return redirect()->route('listJob')->with('success', 'Updating job data successfully');
        }else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to update data');
        }

    }

    public function publish(Request $request, $id)
    {
        $job = Job::find($id);
        // \dd($job->status);
        if ($job->status == 'Published') {
            $job->status = "Not Published";
        } else {
            $job->status = "Published";
        }
        
        $save = $job->save();

        if($save) {
            if ($job->status == 'Published') {
                return redirect()->route('listJob')->with('success', 'Publishing job vacancy successfully');
            } else {
                return redirect()->route('listJob')->with('success', 'Unpublishing job vacancy successfully');
            }
        }else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to unpublish job vacancy');
        }

    }

    public function view($id)
    {
        $job = Job::find($id);

        // dd($job->Category);

        return view('pages.job.view', compact('job'));
    }

    public function destroy($id)
    {
        // dd($id);
        $job = Job::findOrFail($id);
        $cek = $job->delete();

        if($cek) {
            return redirect()->route('listJob')->with('success', 'Deleting job data successfully');
        }else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to delete data');
        }
    }

    public function searchDB(Request $request)
    {
          $search = $request->get('term');
      
          $result = DB::table('cities')->where('name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    }

}
