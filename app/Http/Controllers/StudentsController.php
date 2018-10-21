<?php

namespace App\Http\Controllers;

use App\Student;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;

class StudentsController extends Controller
{
    public function stuForm(Request $request)
    {
        //session()->flush();
        //$student_form = Student::get(['id','firstName','lastName','sex']);
        $student_form = Student::withTrashed()->orderBy('id')->get();
        $soft_deletes = Student::onlyTrashed()->orderBy('id')->get();
        // passing data from DB for Views
        return view('layout.stuForm', ['student_info' => $student_form, 'trashed' => $soft_deletes]);
    }

    public function insert_student(Request $request)
    {
        /*
        $rules = [
            'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'sex' => 'required',
                'note' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
*/
        /*$add = new Student;
        $add->firstName = request('firstName');
        $add->lastName = request('lastName');
        $add->email = request('email');
        $add->sex = request('sex');
        $add->note = request('note');
        $add->save();
    */


        $attribute = [
            'firstName' => trans('admin.firstName'),
            'user_id' => trans('admin.user_id'),
            'email' => trans('admin.email'),
            'sex' => trans('admin.sex'),
            'note' => trans('admin.note'),
        ];
        $data = $this->validate($request, [
            'firstName' => trans('admin.required'),
            'user_id' => trans('admin.required'),
            'email' => trans('admin.required'),
            'sex' => trans('admin.required'),
            'note' => trans('admin.required'),
        ], [], $attribute);
        // DB::table('students')->insert($request->all());
        /* 'firstName' => Lang::get('admin.required'),
            'lastName' => Lang::get('admin.required'),
            'email' => Lang::get('admin.required'),
            'sex' => Lang::get('admin.required'),
            'note' => Lang::get('admin.required'),*/
        Student::Create($request->all());
        /*    $student = Student::Create($request->all())->render();
            $html = view('layout.row_student',['students'=>$student]);
            return response(['status'=>true,'result'=>$html]);
            }*/
        //session()->flash('message1','Student Add ');
        //session()->push('message',['key1' => 'val1']);

        /*
                Student::create([
                      'firstName' => request('firstName'),
                      'lastName' => request('lastName'),
                      'email' => request('email'),
                      'sex' => request('sex'),
                      'note' => request('note'),
                  ]);
        */
        return redirect('student/form');

    }
    public function delete($id = null)
    {
        if ($id != null) {
            $del = Student::find($id);
            $del->delete();
        } elseif (request()->has('restore') and request()->has('id')) {
            Student::whereIn('id', request('id'))->restore();
        } elseif (request()->has('forcedelete') and request()->has('id')) {
            Student::whereIn('id', request('id'))->forceDelete();
        } elseif (request()->has('delete') and request()->has('id')) {
            Student::destroy(request('id'));
        }

        return redirect('student/form');
    }
}
