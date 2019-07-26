<?php

namespace App\Http\Controllers\Admin;

use App\ResidensalCardTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResidensalCardTimeController extends Controller
{
    public function add_residensal(Request $request){
        if ($request->isMethod('get')){
            $list_residensal= ResidensalCardTime::all();
            $title = 'Add Residensal Card Time Period | Chubi Project : Management System';
            return view('Admin.Residensal.add_residensal',compact('','title','list_residensal'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|unique:residensal_card_times,name',
            ]);

        }

        $data['name']=$request->name;
        if (ResidensalCardTime::create($data)) {
            return redirect()->back()->with('success', 'Record Saved Successfully');
        }
    }

    public function list_residensal(Request $request){
        if ($request->isMethod('get')) {
            $list_residensal= ResidensalCardTime::all();
            $title = 'Residensal Time  Record | Chubi Project : Management System';
            return view('Admin.Residensal.list_residensal', compact('', 'title','list_residensal'));
        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|unique:residensal_card_times,name',
            ]);

        }

        $data['name']=$request->name;
        if (ResidensalCardTime::create($data)) {
            return redirect()->back()->with('success', 'Record Saved Successfully');
        }

    }
    public function edit_residensal($id){
        $list_residensal = ResidensalCardTime::findOrfail($id);
        $title = 'Edit Residensal Card Time Record | Chubi Project : Management System';
        return view('Admin.Residensal.edit_residensal', compact('', 'title','list_residensal'));
    }

    public function update_residensal(Request $request, $id){
        $list_residensal = ResidensalCardTime::findOrFail($id);
        $requestData = \request()->all();
        $list_residensal->update($requestData);
        return redirect('admin/add-residensal')->with('success', 'Recored Updated');
    }

}
