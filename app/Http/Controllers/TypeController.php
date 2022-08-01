<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobType;
use Illuminate\Support\Facades\Auth;
use DB;

class TypeController extends Controller
{
    public function index()
    {
        $types = JobType::paginate(15);
        return view('pages.type.list-type', compact('types'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'type_name' => 'required'
        ]);

        $type = new JobType;
        $type->type_name = $request->type_name;
        $cek = $type->save();

        if ($cek) {
            return back()->with('success', 'Adding job type data successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Failed to add job type data');
        }
        
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'type_name' => 'required'
        ]);

        $type = JobType::find($id);
        $type->type_name = $request->type_name;
        $cek = $type->save();

        if ($cek) {
            return back()->with('success', 'Updating job type data successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Failed to update job type data');
        }
        
    }

    public function destroy($id)
    {
        $type = JobType::findOrFail($id);
        $cek = $type->delete();

        if ($cek) {
            return back()->with('success', 'Deleting job type data successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Failed to delete job type data');
        }
        
    }
}
