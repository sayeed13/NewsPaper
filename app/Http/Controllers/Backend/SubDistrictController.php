<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{
    public function index()
    {
        $subdistricts = DB::table('subdistricts')
            ->join('districts', 'subdistricts.district_id', 'districts.id')
            ->select('subdistricts.*', 'districts.district_name')
            ->orderBy('id', 'desc')
            ->paginate('3');
        return view('backend.subdistrict.index', ['subdistricts' => $subdistricts]);
    }

    public function addSubDistrict()
    {
        $districts = District::all();
        return view('backend.subdistrict.create', ['districts' => $districts]);
    }

    public function storeSubDistrict(Request $request)
    {
        $request->validate([
            'subdistrict_name' => 'required|max:255',
        ]);

        $subdistrict = new Subdistrict();
        $subdistrict->subdistrict_name = $request->subdistrict_name;
        $subdistrict->district_id = $request->district_id;
        $subdistrict->save();

        return Redirect()->route('subdistrict')->with('message', 'Your Sub-District has been publish successfully!');
    }

    public function editSubDistrict($id)
    {
        $subdistricts = Subdistrict::findOrFail($id);
        $districts = District::all();

        return view('backend.subdistrict.edit', [
            'subdistricts' => $subdistricts,
            'districts' => $districts,
        ]);
    }


    public function updateSubDistrict(Request $request, $id)
    {
        $subdistricts = Subdistrict::findOrFail($id);
        $subdistricts->subdistrict_name = $request->subdistrict_name;
        $subdistricts->district_id = $request->district_id;
        $subdistricts->save();

        return Redirect()->route('subdistrict')->with('message', 'Your Sub-District has been Updated successfully!');
    }


    public function deleteSubDistrict($id)
    {
        $subdistricts = Subdistrict::findOrFail($id);
        $subdistricts->delete();

        return Redirect()->route('subdistrict')->with('message', 'Your Sub-District has been Deleted successfully!');
    }
}
