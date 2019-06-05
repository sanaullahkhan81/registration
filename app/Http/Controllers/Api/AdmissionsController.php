<?php

namespace App\Http\Controllers\Api;

use App\Admission;
use App\Course;
use App\EmergencyContact;
use App\FormerCourse;
use App\Guardian;
use App\HealthData;
use App\Student;
use App\StudentCourse;
use App\StudentGuardian;
use App\Utility\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmissionsController extends Controller
{

    public function index(Request $request)
    {
        $result = Admission::with('student');
        $result = $result->orderBy('other_children_at_institute', 'ASC')
                          ->orderBy('enrolment_date', 'ASC')
                          ;


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
        $x = 2;

        $old_date = strtotime($request->student['date_of_birth']);
        $new_date = date('Y-m-d', $old_date);

        $student = new Student();
        $student->surname = $request->student['surname'];
        $student->forename = $request->student['forename'];
        $student->date_of_birth = $new_date;
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
        $student->save();

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
                                'name' => $guardian['name'],
                                'occupation' => $guardian['occupation'],
                                'address' => $guardian['address'],
                                'post_code' => $guardian['post_code'],
                                'telephone' => $guardian['contact_number'],
                                'mobile' => $guardian['mobile_number'],
                            ]);

                StudentGuardian::create([
                    'student_id' => $student->id,
                    'guardian_id' => $guardian->id
                ]);
            }
        }
        if($request->emergency_contacts){
            foreach ($request->emergency_contacts as $contact){
                EmergencyContact::create([
                    'student_id' => $student->id,
                    'name' => $contact['name'],
                    'number' => $contact['number']
            ]);
            }

        }

        if($request->additional_education){
            FormerCourse::create([
                'student_id' => $student->id,
                'madrasa_name' => $request->additional_education['madrasa_name'],
                'teacher_name' => $request->additional_education['teacher'],
                'teacher_number' => $request->additional_education['number'],
                'books' => $request->additional_education['books'],
                'leaving_reason' => $request->additional_education['leaving_reason'],
                'former_education_details' => $request->additional_education['former_education_details'],
            ]);
        }

        if($request->offer_of_acceptance){
            $old_date = $request->offer_of_acceptance['accept_terms'];              // returns Saturday, January 30 10 02:06:34
            $old_date_timestamp = strtotime($old_date);
            $date_received = date('Y-m-d H:i:s', $old_date_timestamp);

            $old_date =  $request->offer_of_acceptance['office_use']['enrolment_date'];           // returns Saturday, January 30 10 02:06:34
            $old_date_timestamp = strtotime($old_date);
            $enrolment_date = date('Y-m-d H:i:s', $old_date_timestamp);


            Admission::create([

                'student_id' => $student->id,
                'other_children_at_institute' => $request->offer_of_acceptance['other_children_at_institute'],
                'accept_terms_conditions' => $request->offer_of_acceptance['accept_terms'],
                'date_received' => $date_received,
                'passport' => $request->offer_of_acceptance['office_use']['passport'],
                'birth_certificate' => $request->offer_of_acceptance['office_use']['birth_certificate'],
                'enrolment_date' => $enrolment_date,
                'application_number' => $request->offer_of_acceptance['office_use']['application_number']
            ]);

        }


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
