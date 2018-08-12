<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\User;
use DB;

class AjaxDemoController extends Controller
{

  /**
   * Show the application myform.
   * Show all the styudent type listed i the database
   * @return \Illuminate\Http\Response
   */
  public function form()
  {
    $studenttype = DB::table('studenttype')->pluck("name","id")->all();
    return view('form',compact('studenttype'));
  }
  /**
   * Show the message before joining queue
   * @return \Illuminate\Http\Response
   */
  public function readthis()
  {
    return view('readthis');
  }

  /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjax(Request $request)
    {
    	if($request->ajax()){
    		$concern = DB::table('concern')->where('id_studenttype',$request->id_studenttype)->pluck("name","name")->all();
    		$data = view('ajax-select',compact('concern'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }

  /**
   * Submit button function.
   * 
   * @return \Illuminate\Http\Response
   */
  public function submit(Request $request){
  
    //Create new data in database for student table
    $message = new Student;
    $message->student_number = $request->input('student_number');
    $message->student_type_id = $request->input('id_studenttype');
    $message->student_concern = $request->input('id_concern');
    //Save message
    $message->save();
    //Redirect
    return redirect('/queueline')->with('success', 'Reminder: Please take note of your queuing number.');
  }
    
  // Show all the student in queue
  public function getQueueline(){

    $students = Student::orderBy('id', 'DESC')->get();
    return view('queueline')->with('students', $students);   

  }  
  
}
