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
        return $result->whereNull('enrolment_date')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
                                'telephone' => $guardian['telephone'],
                                'mobile' => $guardian['mobile'],
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
                'teacher_name' => $request->additional_education['teacher_name'],
                'teacher_number' => $request->additional_education['teacher_number'],
                'books' => $request->additional_education['books'],
                'leaving_reason' => $request->additional_education['leaving_reason'],
                'former_education_details' => $request->additional_education['former_education_details'],
            ]);
        }

        if($request->offer_of_acceptance){
            $old_date = $request->offer_of_acceptance['accept_terms'];              // returns Saturday, January 30 10 02:06:34
            $old_date_timestamp = strtotime($old_date);
            $date_received = date('Y-m-d H:i:s', $old_date_timestamp);

            $old_date =  $request->offer_of_acceptance['office_use']['enrolment_date'];
            if(!is_null($old_date)){// returns Saturday, January 30 10 02:06:34
                $old_date_timestamp = strtotime($old_date);
                $enrolment_date = date('Y-m-d H:i:s', $old_date_timestamp);
            }else{
                $enrolment_date = null;
            }



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

        return response(['Saved'],200);
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
        // Update Student
        $student_id = $request->student['id'];
        $old_date = strtotime($request->student['date_of_birth']);
        $new_date = date('Y-m-d', $old_date);
        Student::whereId($student_id)
        ->update([
            'surname' => $request->student['surname'],
            'forename' => $request->student['forename'],
            'date_of_birth' => $new_date,
            'gender' => $request->student['gender'],
            'address' => $request->student['address'],
            'post_code' => $request->student['post_code'],
            'telephone' => $request->student['telephone'],
            'mobile' => $request->student['mobile'],
            'relationship_to_child' => $request->student['relationship_to_child'],
            'country_id' => $request->student['country_of_birth'],
            'ethnic_origin_id' => $request->student['ethnic_origin'],
            'language_id' => $request->student['first_language'],
            'nationality_id' => $request->student['nationality'],
        ]);

        // Save Courses
        if($request->courses){
            StudentCourse::whereStudentId($student_id)->delete();
            foreach ($request->courses as $course){
                StudentCourse::create([
                    'student_id' => $student_id,
                    'course_id' => $course
                ]);
            }
        }
        if($request->health_data){
            HealthData::whereStudentId($student_id)->update([
                'serious_illness' => $request->health_data['serious_illness'],
                'serious_illness_description' => $request->health_data['serious_illness_description'],
                'serious_illness_relevant_info' =>$request->health_data['serious_illness_relevant_info'],
                'surgery_name' =>$request->health_data['surgery_name'],
                'doctor_name' =>$request->health_data['doctor_name'],
                'surgery_address' =>$request->health_data['surgery_address']
            ]);
        }
        if($request->guardians){
            StudentGuardian::whereStudentId($student_id)->delete();
            foreach ($request->guardians as $guardian){
                if(isset($guardian['id'])){
                   Guardian::whereId($guardian['id'])
                                            ->update([
                                                'name' => $guardian['name'],
                                                'occupation' => $guardian['occupation'],
                                                'address' => $guardian['address'],
                                                'post_code' => $guardian['post_code'],
                                                'telephone' => $guardian['telephone'],
                                                'mobile' => $guardian['mobile']
                                            ]);

                    StudentGuardian::create([
                        'student_id' => $student_id,
                        'guardian_id' => $guardian['id']
                    ]);
                }else{
                    $guardian = Guardian::create([
                        'name' => $guardian['name'],
                        'occupation' => $guardian['occupation'],
                        'address' => $guardian['address'],
                        'post_code' => $guardian['post_code'],
                        'telephone' => $guardian['telephone'],
                        'mobile' => $guardian['mobile'],
                    ]);

                    StudentGuardian::create([
                        'student_id' => $student_id,
                        'guardian_id' => $guardian->id
                    ]);
                }
            }
        }
        if($request->emergency_contacts){
            $removed_contacts = EmergencyContact::whereStudentId($student_id)->get('id');
            foreach ($request->emergency_contacts as $contact){
                $contact_id = $contact['id'];
                if(isset($contact['id'])){
                    $removed_contacts = $removed_contacts
                        ->reject(function ($value)use ($contact_id){
                        return $value['id'] == $contact_id;
                    });
                EmergencyContact::whereId($contact['id'])
                    ->update([
                        'student_id' => $student_id,
                        'name' => $contact['name'],
                        'number' => $contact['number']
                     ]);
              }else{
                    EmergencyContact::create([
                        'student_id' => $student_id,
                        'name' => $contact['name'],
                        'number' => $contact['number']
                    ]);
                }
            }
            foreach($removed_contacts as $contact){
                $contact->delete();
            }
        } //TODO Check this!
        if($request->additional_education){
            if(isset($request->additional_education['id'])){
                FormerCourse::whereId($request->additional_education['id'])
                ->update([
                    'madrasa_name' => $request->additional_education['madrasa_name'],
                    'teacher_name' => $request->additional_education['teacher_name'],
                    'teacher_number' => $request->additional_education['teacher_number'],
                    'books' => json_encode($request->additional_education['books']),
                    'leaving_reason' => $request->additional_education['leaving_reason'],
                    'former_education_details' => $request->additional_education['former_education_details'],
                ]);
            }else{
                FormerCourse::create([
                    'student_id' => $student_id,
                    'madrasa_name' => $request->additional_education['madrasa_name'],
                    'teacher_name' => $request->additional_education['teacher_name'],
                    'teacher_number' => $request->additional_education['teacher_number'],
                    'books' => $request->additional_education['books'],
                    'leaving_reason' => $request->additional_education['leaving_reason'],
                    'former_education_details' => $request->additional_education['former_education_details'],
                ]);
            }
        }
        if($request->offer_of_acceptance){
            if($request->offer_of_acceptance['office_use']['date_received']) {
                $date_received = date('Y-m-d H:i:s',
                    strtotime($request->offer_of_acceptance['office_use']['date_received']));
            }
            $old_date =  $request->offer_of_acceptance['office_use']['enrolment_date'];
            if(!is_null($old_date)){// returns Saturday, January 30 10 02:06:34
                $old_date_timestamp = strtotime($old_date);
                $enrolment_date = date('Y-m-d H:i:s', $old_date_timestamp);
            }else{
                $enrolment_date = null;
            }
            if(is_null($request->offer_of_acceptance['other_children_at_institute'])){
                $other_children_at_institute = 0;
            }else{
                $other_children_at_institute = $request->offer_of_acceptance['other_children_at_institute'];
            }
            if(is_null($request->offer_of_acceptance['accept_terms'])){
                $accept_terms_conditions = 0;
            }else{
                $accept_terms_conditions = $request->offer_of_acceptance['accept_terms'];
            }


            Admission::where('student_id', $student_id)->update([
                'other_children_at_institute' => $other_children_at_institute,
                'accept_terms_conditions' => $accept_terms_conditions,
                'date_received' => $date_received,
                'passport' => $request->offer_of_acceptance['office_use']['passport'],
                'birth_certificate' => $request->offer_of_acceptance['office_use']['birth_certificate'],
                'enrolment_date' => $enrolment_date,
                'application_number' => $request->offer_of_acceptance['office_use']['application_number']
            ]);

        }
        return response('Admission updated',200);
        $s =2;

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
