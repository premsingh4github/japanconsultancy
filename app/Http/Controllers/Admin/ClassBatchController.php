<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\ClassRoom;
use App\ClassRoomBatch;
use App\Country;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassBatchController extends Controller
{
        public function add_record(){

            $batch = Batch::all();
            $class = ClassRoom::all();
            $ClassRoomBatch =ClassRoomBatch::all();
            $title = 'Add Class/Batch Record | Chubi Project : Management System';
            return view('Admin.Student.add_record', compact('', 'title','batch','class','ClassRoomBatch'));
        }
        public function list_record(){
            $class_batch = ClassRoomBatch::all();
            $class_room = ClassRoom::all();
            $batch = Batch::all();
            $title = 'Class/Batch Record | Chubi Project : Management System';
            return view('Admin.Student.list_record', compact('', 'title','class_batch','class_room','batch'));
        }
        public function post_class_record (Request $request){
            $this->validate($request, [
                'name' => 'required|unique:class_rooms,name'
            ]);

            $data['name']=$request->name;

            if (ClassRoom::create($data)) {
                return redirect()->back()->with('success', 'Record Saved Successfully');
            }

        }

        public function edit_class_room($id){
            $class_room = ClassRoom::findOrFail($id);
            $title='Edit Class Room -  Admin Panel';
            return view('Admin.Student.edit_class_room',compact('class_room','title'));
        }
        public function update_class_room(Request $request, $id){
            $this->validate($request, [
                'name' => 'required',
            ]);
            $class_room = ClassRoom::findOrFail($id);
            $class_room->name = \request('name');
            $class_room->save();
            return redirect('admin/list_record')->with('success', 'Record Updated');
        }

        public function post_batch_record (Request $request){
            $this->validate($request, [
                'name' => 'required|unique:batches,name'
            ]);

            $data['name']=$request->name;

            if (Batch::create($data)) {
                return redirect()->back()->with('success', 'Record Saved Successfully');
            }

        }
        public function post_classbatch_record (Request $request){
            $data['class_room_id']=1;
            $data['batch_id']=$request->batch_id;

            if (ClassRoomBatch::create($data)) {
                return redirect()->back()->with('success', 'Record Saved Successfully');
            }

        }
    public function destroy($id){
        $listStudents = Student::findOrFail($id);

        $listStudents->delete();

        return redirect()->back()->with('success', 'Record Deleted');

    }

}
