<?php

namespace App\Http\Controllers\Api;

use App\Student;
use App\Utility\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $result = Student::with('courses','admission')->has('admission');
        if($request->get('filter')){
            $filters = json_decode($request->get('filter'))->filters;
            foreach ($filters as $filter){

                $result = Filter::filter($filter, $result);
            }
        }
        if($request->get('sort') && $request->get('dir')){
            $result->orderBy($request->get('sort'),$request->get('dir'));
        }

        return $result->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function show($student_id)
    {
        $student = Student::with([
            'language','country',
            'nationality','ethnic',
            'guardians', 'courses',
            'health_data'
        ])
                          ->whereId($student_id)
                          ->first();
        return response($student,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
