<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobLevel;
use DB;

class JobLevelController extends Controller
{
    public function index()
    {
        $levels = JobLevel::paginate(15);
        return view('pages.level.job-level', compact('levels'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'joblevel_name' => 'required'
        ]);

        $level = new JobLevel;
        $level->joblevel_name = $request->joblevel_name;
        $cek = $level->save();

        if ($cek) {
            return back()->with('success', 'Adding job level data successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Failed to add job level data');
        }
        
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'joblevel_name' => 'required'
        ]);

        $level = JobLevel::find($id);
        $level->joblevel_name = $request->joblevel_name;
        $cek = $level->save();

        if ($cek) {
            return back()->with('success', 'Updating job level data successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Failed to update job level data');
        }
        
    }

    public function destroy($id)
    {
        $level = JobLevel::findOrFail($id);
        $cek = $level->delete();

        if ($cek) {
            return back()->with('success', 'Deleting job level data successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Failed to delete job level data');
        }
        
    }
}
