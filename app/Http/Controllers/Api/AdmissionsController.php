<?php

namespace App\Http\Controllers\Api;

use App\Admission;
use App\Course;
use App\EmergencyContact;
use App\Guardian;
use App\HealthData;
use App\Student;
use App\StudentCourse;
use App\StudentGuardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmissionsController extends Controller
{

    public function index()
    {
        return Admission::with('student')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $x = 2;

        $student = new Student();
        $student->surname = $request->student['surname'];
        $student->forename = $request->student['forename'];
        $student->date_of_birth = $request->student['date_of_birth'];
        $student->gender = $request->student['gender'];
        $student->address = $request->student['address'];
        $student->post_code = $request->student['post_code'];
        $student->telephone = $request->student['telephone'];
        $student->mobile = $request->student['mobile'];
        $student->relationship_to_child = $request->student['relationship_to_child'];
        $student->country_id = $request->student['country_of_birth'];
        $student->ethnic_origin_id = $request->student['ethnic_origin'];
        $student->language_id = $request->student['first_language'];
        $student->nationality_id = $request->student['nationality'];

        // Save Courses
        if($request->courses){
            foreach ($request->courses as $course){
                StudentCourse::create([
                    'student_id' => $student->id,
                    'course_id' => $course
                ]);
            }
        }
        if($request->health_data){
            HealthData::create([
                'student_id' => $student->id,
                'serious_illness' => $request->health_data['serious_illness'],
                'serious_illness_description' => $request->health_data['serious_illness_description'],
                'serious_illness_relevant_info' =>$request->health_data['serious_illness_relevant_info'],
                'surgery_name' =>$request->health_data['surgery_name'],
                'doctor_name' =>$request->health_data['doctor_name'],
                'surgery_address' =>$request->health_data['surgery_address']
            ]);
        }
        if($request->guardians){
            foreach ($request->guardians as $guardian){
                $guardian = Guardian::create([
                                'name' => $request->guardians['name'],
                                'occupation' => $request->guardians['occupation'],
                                'address' => $request->guardians['address'],
                                'post_code' => $request->guardians['post_code'],
                                'telephone' => $request->guardians['contact_number'],
                                'mobile' => $request->guardians['mobile_number'],
                            ]);

                StudentGuardian::create([
                    'student_id' => $student->id,
                    'guardian_id' => $guardian->id
                ]);
            }
        }
        if($request->emergency_contacts){
            foreach ($request->emergeny_contacts as $contact){
                EmergencyContact::create([
                    'student_id' => $student->id,
                    'name' => $contact['name'],
                    'number' => $contact['number']
            ]);
            }

        }

        // TODO add former education somewhere
        $offer_of_acceptance = $request->offer_of_acceptance;

        dd($request);
    }

    public function show($admission_id)
    {
        return Admission::whereId($admission_id)->with('student')->first();
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
