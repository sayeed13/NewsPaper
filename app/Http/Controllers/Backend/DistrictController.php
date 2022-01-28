<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('created_at', 'desc')->paginate('3');
        return view('backend.district.index', ['districts' => $districts]);
    }

    public function addDistrict()
    {
        return view('backend.district.create');
    }

    public function storeDistrict(Request $request)
    {
        $request->validate([
            'district_name' => 'required|max:255',
        ]);

        $district = new District();
        $district->district_name = $request->district_name;
        $district->save();

        return Redirect()->route('districts')->with('message', 'Your District has been publish Successfully!');
    }

    public function editDistrict($id)
    {
        $districts = District::findOrFail($id);
        return view('backend.district.edit', ['districts' => $districts]);
    }

    public function updateDistrict(Request $request, $id)
    {

        $district = District::findOrFail($id);
        $district->district_name = $request->district_name;
        $district->save();

        return Redirect()->route('districts')->with('message', 'Your District has been Update Successfully!');
    }

    public function deleteDistrict($id)
    {
        $districts = District::findOrFail($id);
        $districts->delete();

        return Redirect()->route('districts')->with('message', 'Your District has been Deleted Successfully!');
    }
}
