<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\attendance;
use App\Models\studentAttendance;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\AttendanceReceived;

class AttendanceController extends Controller
{
  
    public function codePost(Request $request)
    {
        $pos = strpos($request->code, '#');
        $pos1 = strpos($request->code, '@');
        if($pos !== false){
            $code = substr($request->code, 1);
            $item = attendance::where('code',$code)->first();
            if(isset($item)){
                return redirect()->route('view.attendance', $item->id);
            }
            $item2 = attendance::where('codeNullable',$code)->first();
            if(isset($item2)){
                return redirect()->route('view.attendance', $item->id);
            }

        }else if($pos1 !== false ){
            $code = substr($request->code, 1);
            $item = attendance::where('code',$code)->first();
            if(isset($item)){
                $item->delete();
            }
        }  
        else{
            if($request->code == "!77168558"){
                return redirect()->route('register.view', ['code' => "!77168558"]);
            }else{
                $item = attendance::where('code',$request->code)->first();
                if(isset($item)){
                    return redirect()->route('complete.attendance',$item->id);
                }
            }
        }
        return redirect()->route('login');
        
    }

    public function attendance_complete($assist){
        $item = attendance::where('id',$assist)->first();
        $id = $item->group;
        $list = [];
        $group = DB::connection('notas')->table('groups')->where('id', $id)->first();
        $typeGroup = $this->getGroups($id);
        $students = DB::connection('notas')->table('group_students')->where('group_id', $id)->get();
        foreach ($students as $student) {
            $alumn = DB::connection('notas')->table('users')->where('id', $student->user_id)->first();
            array_push($list, [
                "id" => $alumn->id,
                "student" =>  $alumn->firstname." ".$alumn->lastname,
            ]);
        }
        return view('complete', compact('item', 'list','typeGroup'));
    }

    public function attendance_complete_post(Request $request){

        $item = attendance::where('id',$request->id_assist)->first();
        $item->state = true;
        $item->codeNullable = $item->code;
        $item->code = "";
        $item->save();
        //Buscar todos los estudiantes y saber si vinieron o no
        $students = DB::connection('notas')->table('group_students')->where('group_id', $item->group)->get();
        foreach ($students as $student) {
            $state = false;
            $checked = $student->user_id;
            if(isset($request->$checked)){
                $state = true;
            }
            studentAttendance::create([
                "attendance_id" => $request->id_assist,
                "student" => $student->user_id,
                "attendance" => $state
            ]);
        }

        $group = $this->getGroups($item->group);

        $listItem = studentAttendance::where('attendance_id', $id_assist)->get();
        foreach ($listItem as $list) {
            $alumn = DB::connection('notas')->table('users')->where('id', $list->student)->first();
            array_push($listAttendece,[
                "student_id" => $list->student,
                "student" => $alumn->firstname." ".$alumn->lastname,
                "attendance" => $list->attendance
            ]);
        }

        $attendance = $item;
        $studentAttendance = $listItem;

        //envia el correo
        Mail::to('sebastyampi@gmail.com')->send(new AttendanceReceived($attendance, $studentAttendance, $group));

        return redirect()->route('complete.attendance.details', $request->id_assist);

    }

    public function attendance_edit($id_assist){
        $listAttendece = [];
        $item = attendance::where('id',$id_assist)->first();
        $id = $item->group;
        $typeGroup = $this->getGroups($id);
        $listItem = studentAttendance::where('attendance_id', $id_assist)->get();
        foreach ($listItem as $list) {
            $alumn = DB::connection('notas')->table('users')->where('id', $list->student)->first();
            array_push($listAttendece,[
                "student_id" => $list->student,
                "student" => $alumn->firstname." ".$alumn->lastname,
                "attendance" => $list->attendance
            ]);
        }

        return view('editAtt', compact('listAttendece','item','typeGroup'));
    }

    public function attendance_update(Request $request){
        $listItem = studentAttendance::where('attendance_id', $request->id_assist)->get();
        foreach ($listItem as $item) {
            $state = false;
            $checked = $item->student;
            if(isset($request->$checked)){
                $state = true;
            }
            $item->attendance =  $state;
            $item->save();
        }
        return redirect()->route('complete.attendance.details', $request->id_assist);
    }

    public function attendance_complete_details($id_assist){
        $listStudent = [];
        $item = attendance::where('id',$id_assist)->first();
        $id = $item->group;
        $typeGroup = $this->getGroups($id);
        $list = studentAttendance::where('attendance_id', $id_assist)->get();
        foreach ($list as $show) {
            $alumn = DB::connection('notas')->table('users')->where('id', $show->student)->first();
            array_push($listStudent, [
                "id" => $alumn->id,
                "student" => $alumn->firstname." ".$alumn->lastname,
                "attendance" => $show->attendance
            ]);
        }
        $qrCode = $this->qr_code(route('complete.attendance.details', $id_assist),$id_assist);

        return view('details', compact('item', 'listStudent','typeGroup', 'qrCode'));
    }

    public function attendance_list(){
        $listAttendece = [];
        $list = attendance::orderBy('date', 'desc')->get();
        foreach ($list as $show) {
            //$alumn = DB::connection('notas')->table('users')->where('id', $show->student)->first();
            $name_group = $this->getGroups($show->group);
            array_push($listAttendece, [
                "id" => $show->id,
                "group" => $name_group['name'],
                "teacher" => $show->teacher,
                "date" => $show->date,
                "code" => $show->code,
                "state" => $show->state,
                "nullable" => $show->codeNullable,
            ]);
        }
        return view('list', compact('listAttendece'));
    }

    public function attendance(){
        $groups = $this->getGroups(false);
        return view('codeRegister', compact('groups'));
    }

    public function getGroups($id = false){
        if($id == false){
            $groups = [];
            $list = DB::connection('notas')->table('groups')->get();
            foreach ($list as $group) {
                $codigo = $group->code;
                $program = DB::connection('notas')->table('programs')->where('id', $group->program_id)->first();
                $schedules = DB::connection('notas')->table('schedules')->where('id', $group->schedule_id)->first();
                $name_tec = $this->getTypeProgram($program->type);
                $item_fill = array(
                    "id" => $group->id, 
                    "name" => $group->code." -  ".$name_tec.$program->name." - ".$schedules->name);
    
                array_push($groups, $item_fill);
    
            }
            return $groups;
        }else{

            $group = DB::connection('notas')->table('groups')->where('id', $id)->first();
            $program = DB::connection('notas')->table('programs')->where('id', $group->program_id)->first();
            $schedules = DB::connection('notas')->table('schedules')->where('id', $group->schedule_id)->first();
            $name_tec = $this->getTypeProgram($program->type);
            $item_fill = array(
                "id" => $group->id, 
                "name" => $group->code." -  ".$name_tec.$program->name." - ".$schedules->name);

            return $item_fill;
        }
       
    }

    public function getTypeProgram($type){
        $name_tec = "";
        switch ($type) {
            case 'Tecnico':
                $name_tec = "Tecnico Laboral En ";
                break;
            case 'Diplomado':
                # code...
                $name_tec = "Diplomado ";
                break;
            case 'Seminario':
                # code...
                $name_tec = "Seminario ";
                break;
            case 'Curso':
                # code...
                $name_tec = "Curso ";
                break;
            case 'Otro':
                $name_tec = " ";
                break;
        }
        return $name_tec;
    }

    public function registerAttendance(Request $request){
        $item = attendance::create([
            "group" => $request->group,
            "teacher" => $request->teacher,
            "date" => $request->date,
            "state" => false,
        ]);
        return redirect()->route('view.attendance', $item->id);
    }

    public function attendance_view($id){

        $item = attendance::where('id', $id)->first();
        $objectProgram = $this->getGroups($item->group);
        $requestItem = array(
            "id" => $item->id,
            "group" => $objectProgram["name"],
            "teacher" => $item->teacher,
            "date" => $item->date,
            "code" => $item->code,
            "state" => $item->state,
        );
        return view('detailsRegister', compact('requestItem'));
    }

    public function qr_code($URL,$code){
        return QrCode::generate($URL, '../public/qrcodes/'.$code.'.svg');
    }

   
}
