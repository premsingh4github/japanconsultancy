<?php

namespace App\Exports;

use App\ClassBatchSection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ClassBatchSectionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $sections = ClassBatchSection::all();
        $class_section_student = $sections[0];
        if(\request('section_attendance_excel')){
            $class_section_student = ClassBatchSection::find(request('section_attendance_excel'));
        }
        $class_section_name = $class_section_student->class_room_batch->class_room->name.'-'.$class_section_student->class_room_batch->batch->name.')'. $class_section_student->class_section->name.'-'.$class_section_student->shift;
        return view('attendance.excel',[
            'class_section_student' => $class_section_student,
            'class_section_name' => $class_section_name
        ]);
    }
}
