<template>

    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="background-color:white;">
                <form-wizard title="Masjid Al-Jannah Community Islamic School"
                             subtitle="Admission Form" @on-complete="saveForm">
                    <tab-content title="Section 1- Child’s Details">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="surname">Surname:</label>
                                        <input id="surname" type="text" class="form-control" v-model="admission.student.surname">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth:</label>
                                        <datepicker id="dob" class="form-control"
                                                    v-model="admission.student.date_of_birth">
                                        </datepicker>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender:</label>
                                        <select id="gender" type="text" class="form-control" v-model="admission.student.gender">
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="first-lang">Mother tongue/First Language:</label>
                                        <select id="first-lang" class="form-control" v-model="admission.student.first_language">
                                                <option disabled value="">Please select one</option>
                                                <option v-for="language in languages" v-bind:value="language.id">
                                                    {{ language.language }}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="forename">Forename (s):</label>
                                        <input id="forename" type="text" class="form-control" v-model="admission.student.forename">
                                    </div>
                                    <div class="form-group">
                                        <label for="cob">Country of Birth:</label>
                                        <select id="cob" class="form-control" v-model="admission.student.country_of_birth">
                                            <option disabled value="">Please select one</option>
                                            <option v-for="country in countries" v-bind:value="country.id">
                                                {{ country.country_name }}
                                            </option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="eo">Ethnic Origin:</label>
                                        <select id="eo" class="form-control" v-model="admission.student.ethnic_origin">
                                                <option disabled value="">Please select one</option>
                                                <option v-for="ethnic in ethnics" v-bind:value="ethnic.id">
                                                    {{ ethnic.ethnic_origin_name }}
                                                </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <select id="nationality" class="form-control" v-model="admission.student.nationality">
                                                <option disabled value="">Please select one</option>
                                                <option v-for="nationality in nationalities" v-bind:value="nationality.id">
                                                    {{ nationality.nationality_name }}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone:</label>
                                        <input id="phone" type="text" class="form-control" v-model="admission.student.telephone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input id="mobile" type="text" class="form-control" v-model="admission.student.mobile">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <textarea id="address" class="form-control" v-model="admission.student.address">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postcode">Postcode:</label>
                                        <input id="postcode" type="text" class="form-control" v-model="admission.student.post_code">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="relation">Relationship to child:</label>
                                        <input id="relation" type="text" class="form-control" v-model="admission.student.relationship_to_child">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <h3>Courses</h3>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <li class="list-group-item" v-for="course in courses">
                                            <label>{{course.course_name}}</label>
                                            <input type="checkbox" @change="addToList(course.id)">
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center p-top">
                                    <h3>Contact</h3>
                                </div>
                                <div class="col-md-12 text-center">
                                    <table class="table-contact">
                                        <tr>
                                            <th>Ousman Annsary (Imam)</th>
                                            <td>07443844312</td>
                                        </tr>
                                        <tr>
                                            <th>Shabbir Ahmad (Admin)</th>
                                            <td>07982961448<br />01753315618</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center p-top">
                                    <h3>Child’s Health</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="allergies_details">
                                            Does your child suffer from any serious illness/allergies?
                                            If so please give details:</label>
                                        <textarea id="allergies_details" class="form-control"
                                                  v-model="admission.health_data.serious_illness_description"
                                                  @change="serious_illness_update">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="relevant_info">Any other relevant information:</label>
                                        <textarea id="relevant_info" class="form-control"
                                                  v-model="admission.health_data.serious_illness_relevant_info">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name_of_surgery">Name of Surgery: </label>
                                        <textarea id="name_of_surgery" class="form-control"
                                                  v-model="admission.health_data.surgery_name">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name_of_doctor">Name of Doctor: </label>
                                        <textarea id="name_of_doctor" class="form-control"
                                                  v-model="admission.health_data.doctor_name">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="surgery_address">Address of Surgery:  </label>
                                        <textarea id="surgery_address" class="form-control"
                                                  v-model="admission.health_data.surgery_address">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tab-content>
                    <tab-content title="Section 2- Parents/Guardians Details">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table"  v-for="(row, $index) in admission.guardians"
                                       v-bind:key='row.id'>
                                    Parent /  Guardinan : # {{$index+1}}
                                    <tr>
                                        <th>Name</th>
                                        <td><input class="form-control" v-model="row.name"></td>
                                        <th>Occupation</th>
                                        <td><input class="form-control" v-model="row.occupation"></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><input class="form-control" v-model="row.address"></td>
                                        <td>Post Code</td>
                                        <td><input class="form-control" v-model="row.post_code"></td>
                                    </tr>
                                    <tr>
                                        <td>Contact Number</td>
                                        <td><input class="form-control" v-model="row.contact_number"></td>
                                        <td>Mobile Number</td>
                                        <td><input class="form-control" v-model="row.mobile_number"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <button class="btn btn-primary btn-xs"
                                                    @click="addRow($index, 'guardians')"><i
                                                    class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"
                                                    @click="removeRow($index, 'guardians')"><i
                                                    class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12 text-center">
                                <h3>Emergency Contact Details</h3>
                            </div>
                            <div class="col-md-12">
                                <table class="table">
                                    <tr v-for="(row,$index) in admission.emergency_contacts">
                                        <th>({{$index+1}}) Name: </th>
                                        <td><input class="form-control" v-model="row.name" /></td>
                                        <th>Number :</th>
                                        <td><input class="form-control" v-model="row.number" /> </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs"
                                                    @click="addRow($index, 'emergency_contacts')"><i
                                                    class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"
                                                    @click="removeRow($index, 'emergency_contacts')"><i
                                                    class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </tab-content>
                    <tab-content title="Section 3">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3>(Only to be filled in if your child has attended a Madrasa
                                    or has had home tuition, etc.)</h3>
                            </div>
                            <div class="col-md-12 text-center">
                                <p>Name and contact details of current/last teacher and Madrasa: </p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="school_name">Madrasa Name:</label>
                                    <input id="school_name" type="text" class="form-control"
                                           v-model="admission.additional_education.madrasa_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="school_teacher">Madrasa Name:</label>
                                        <input id="school_teacher" type="text" class="form-control"
                                               v-model="admission.additional_education.teacher">
                                    </div>
                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_number">Madrasa Name:</label>
                                    <input id="teacher_number" type="text" class="form-control"
                                           v-model="admission.additional_education.number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Please give full details with names of all the Islamic books he has studied
                                   to date and how much Qaida or Qur’an has been read:
                                </p>
                                <table class="table">
                                    <tr v-for="(row, $index) in admission.additional_education.books"
                                        v-bind:key='row.id'>
                                        <td><label for="book">Islamic book:</label></td>
                                        <td>
                                            <input id="book" class="form-control" v-model="row.book_name" />
                                        </td>
                                        <td>
                                            <label for="qaidah">Qaidah:</label>
                                        </td>
                                        <td><input id="qaidah" v-model="row.qaidah"/></td>
                                        <td>
                                            <label for="quran">Quran:</label>
                                        </td>
                                        <td><input id="quran" v-model="row.quran"/></td>
                                        <td>
                                            <button class="btn btn-primary btn-xs"
                                                    @click="addRow($index, 'additional_education')"><i
                                                    class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"
                                                    @click="removeRow($index, 'additional_education')"><i
                                                    class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="leaving_reason">Why is your child leaving their current Madrasa?
                                    </label>
                                    <input id="leaving_reason" type="text" class="form-control"
                                           v-model="admission.additional_education.leaving_reason">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="former_education_details">
                                        Please provide any other detail you think will be useful for us:
                                    </label>
                                    <input id="former_education_details" type="text" class="form-control"
                                           v-model="admission.additional_education.former_education_details">
                                </div>
                            </div>
                        </div>
                    </tab-content>
                    <tab-content title="Section 4- Offer of Acceptance">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <p>Do you have any other children studying at this institute?:</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="offer_of_acceptance_yes">Yes</label>
                                    <input id="offer_of_acceptance_yes"
                                           type="radio" class="form-control move-left"
                                           value="Yes"
                                           v-model="admission.offer_of_acceptance.other_children_at_institute"
                                    />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="offer_of_acceptance_no">No</label>
                                    <input id="offer_of_acceptance_no"
                                           type="radio" class="form-control move-left"
                                           value="No"
                                           v-model="admission.offer_of_acceptance.other_children_at_institute"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        Please note that there may be a waiting list and places would be awarded
                                        on a first come first served basis. There is an equal opportunity policy
                                        in operation. There will also be a short assessment to check the child’s
                                        ability.
                                        I hereby apply for my child to be admitted Masjid Al-Jannah
                                        Community Islamic School. I agree to abide by all the schools
                                        regulations and will support the ethos and Islamic Practices.
                                    </p>
                                    <h3 class="text-center">Rules and Regulations</h3>
                                    <ol>
                                        <li>
                                            To dress our children in an Islamic way is very important.
                                            All children must dress appropriately, for boys A White
                                            Kurta/Thawb/Shalwar Kameez/Jubba etc.,
                                            Trousers (that stay above the ankles at all times) and a Hat.
                                            Clothing should not contain pictures or large writings.
                                        </li>
                                        <li>
                                            Uneven haircuts are not allowed in Islam.  Therefore short back and
                                            sides or any other styles are not allowed. Any child with un-Islamic
                                            haircut will not be allowed in the Madrasah.
                                        </li>
                                        <li>
                                            Parent(s)/Guardian(s) are obliged to respect the timings. Punctual
                                            attendance of the times given is necessary from Monday to Friday. Students
                                            are expected to arrive on time for classes and any late arrivals or
                                            absentees will not be tolerated.
                                        </li>
                                        <li>
                                            All absences must be explained by a note signed by the
                                            parent/guardian upon return.
                                        </li>
                                        <li>
                                            In the case of any event whereby the student needs to take a number of
                                            days off, permission should be sought from the Head Teacher.
                                        </li>
                                        <li>
                                            A re-registration fee will apply for any child who leaves the madrasah
                                            and wishes to re-join subject to availability.
                                        </li>
                                        <li>
                                            Parents/guardians shall be expected to ensure that the child prepares for
                                            his/her lessons at home.
                                        </li>
                                        <li>
                                            Any queries or complaints should be made only to the Head teacher
                                            not directly to a teacher. There must be no interruptions made by
                                            any parent or representative whilst teaching is in progress.
                                        </li>
                                        <li>
                                            Any behavioural problems from a student will not be tolerated and
                                            appropriate action will be taken. The Madrasah has a strict 4 stage
                                            behaviour policy. If the student misbehaves then these steps will be
                                            taken in sequence, though some behaviour may result in immediate expulsion.
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <b>Stage 1:</b> A verbal warning
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Stage 2:</b> The Head Teacher will discuss the matter with the
                                                    student and Detention given.
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Stage 3:</b> Letter will be sent home and The Parents/Guardians
                                                    of the child will be called in to have a meeting with the
                                                    Head Teacher and class Teacher and the student may be suspended.
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Stage 4:</b> The student will be excluded if deemed appropriate
                                                </li>

                                            </ul>
                                        </li>
                                        <li>
                                            The Madrasah has a detention policy which applies to all children,
                                            irrespective of age. Any Teacher or the Head Teacher can give detention
                                            to any child if they consider it necessary and has the right to keep
                                            the child back after class hours up to 15 minutes without prior notice.
                                            If a child is given detention for more than 15 minutes, then a letter
                                            will be sent home with the child, to notify the parent/guardian in advance.
                                            Failure to attend the detention will lead to the child being suspended.
                                        </li>
                                        <li>
                                            Parents/Guardians should notify the Head teacher prior to admission of any
                                            health problems that their child has. Also keep the Madrasah informed of
                                            the child’s health.
                                        </li>
                                        <li>
                                            Parents/Guardians will not interfere with regards to the running and
                                            arrangements of the Madrasah.
                                        </li>
                                        <li>
                                            Children are not allowed to attend the Madrasah with mobile phones;
                                            hand held game consoles, iPods, iPads, mp3s, Penknives, sweets,
                                            chewing gum etc. Any child found to be in possession of any of these
                                            items will have them confiscated immediately and may not be returned
                                            to the child.
                                        </li>
                                        <li>
                                            All <strong>females</strong> coming to drop and /or collect the child
                                            must cover their heads (in accordance with Islamic ethics)
                                        </li>
                                        <li>
                                            Any deliberate damage to the property of the masjid will have to be
                                            reimbursed by the parents/guardians.
                                        </li>
                                        <li>
                                            Safety of the children outside the lesson hours in masjid premises
                                            is the responsibility of the parents/guardians.
                                        </li>
                                        <li>
                                            Students are not allowed to take part in any activity during the
                                            class hours. E.g.  clubs, trips, family outings etc.
                                        </li>
                                        <li>
                                            All the above Rules and Regulations and any further rules decided by
                                            the Head teacher or committee will have to be followed.
                                        </li>
                                    </ol>
                                    <p>
                                        Please note that the above terms and subject to change
                                    </p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="accept_terms_yes" class="col-sm-8 col-form-label">
                                                    I understand & accept the terms set out in this section
                                                    of the application form.
                                                </label>
                                                <div class="col-sm-4">
                                                    <input id='accept_terms_yes' type="radio" class="form-control"
                                                           value="Yes"
                                                           v-model="admission.offer_of_acceptance.accept_terms" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="accept_terms_no" class="col-sm-8 col-form-label">
                                                    I do not accept the terms set out in this section of the
                                                    application form.
                                                </label>
                                                <div class="col-sm-4">
                                                    <input id='accept_terms_no' type="radio" class="form-control"
                                                           value="No"
                                                           v-model="admission.offer_of_acceptance.accept_terms" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tab-content>
                </form-wizard>
            </div>
        </div>
    </div>


</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        props:['api_token'],
        components: {Datepicker},
        data(){
            return{
                admission: {
                    student: {
                        surname: '',
                        forename: '',
                        date_of_birth:'',
                        country_of_birth: '',
                        gender: '',
                        ethnic_origin: '',
                        first_language: '',
                        nationality: '',
                        address:'',
                        post_code: '',
                        mobile: '',
                        telephone: '',
                        relationship_to_child:''
                    },
                    courses:[],
                    health_data:{
                        serious_illness:'',
                        serious_illness_description:'',
                        serious_illness_relevant_info: '',
                        surgery_name: '',
                        doctor_name: '',
                        surgery_address: ''
                    },
                    guardians:[
                        {
                            name:'',
                            address:'',
                            occupation: '',
                            contact_number: '',
                            mobile_number: '',
                            post_code:''
                        }
                    ],
                    emergency_contacts:[
                        {
                            name:'',
                            number: ''
                        }
                    ],
                    additional_education:{
                        madrasa_name: '',
                        teacher: '',
                        number: '',
                        books:[{book_name: '', qaidah: '', quran: '' }],
                        leaving_reason: '',
                        former_education_details: ''
                    },
                    offer_of_acceptance:{
                        other_children_at_institute:'',
                        accept_terms:''
                    }

                },
                courses:[],
                countries:[],
                ethnics:[],
                languages:[],
                nationalities:[]
            }
        },
        created() {
            this.getCourses();
            this.getCountries();
            this.getEthnic();
            this.getLanguages();
            this.getNationalities();
        },
        methods:{
            addRow(index, table) {
                let self = this;
                if(table === 'additional_education')
                {
                    var path = self.admission.additional_education.books
                }else{
                    var path = self.admission[table];
                }
                try {
                    path.splice(index + 1, 0, {
                        name:'',
                        address:'',
                        occupation: '',
                        contact_number: '',
                        mobile_number: '',
                        post_code:''
                    },);
                } catch (e) {
                    console.log(e);
                }
            },
            removeRow(index, table) {
                let self = this;
                if(table === 'additional_education')
                {
                    var path = self.admission.additional_education.books
                }else{
                    var path = self.admission[table];
                }
                if (path.length > 1) {
                    path.splice(index, 1);
                }
            },
            getCourses(){
                let self = this;
                axios({
                    method: 'get',
                    url: 'api/courses',
                    headers: {
                        Authorization: 'Bearer ' + this.api_token
                    }
                }).then( (response)  =>{
                   self.courses = response.data;
                })
                        .catch(function (error) {
                            console.log(error);
                    });
            },
            addToList(course){
                var index = this.admission.courses.indexOf(course);
                if (index === -1) {
                    this.admission.courses.push(course);
                } else {
                    this.admission.courses.splice(index, 1);
                }
                console.log(this.admission.courses)
            },
            serious_illness_update(){
                if(this.admission.health_data.serious_illness_description.length > 0){
                    this.admission.health_data.serious_illness = 1;
                }// TODO fix this
                if(this.admission.health_data.serious_illness_description.length === 0){
                    this.admission.health_data.serious_illness = 0;
                }

            },
            getCountries(){
                let self = this;
                axios.get('api/countries')
                .then(function (response) {
                    self.countries = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
            getEthnic(){
                let self = this;
                axios.get('api/ethnics')
                        .then(function (response) {
                            self.ethnics = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
            },
            getLanguages(){
                let self = this;
                axios.get('api/languages')
                        .then(function (response) {
                            self.languages = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
            },
            getNationalities(){
                let self = this;
                axios.get('api/nationalities')
                        .then(function (response) {
                            self.nationalities = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
            },
            saveForm(){
                let self = this;
                console.log(self.admission)
                //const data = new URLSearchParams();
                //data.append('admission', this.admission);
                axios({
                    method: 'post',
                    url: 'api/admissions',
                    headers: { Authorization: 'Bearer ' + this.api_token },
                    data: self.admission
                }).then( (response)  =>{
                    //
                })
                .catch(error => {
                    console.log(error.response)
                });
            }
        }
    }

</script>
<style scoped>
    .table-contact {
        margin: auto;
        width: 50% !important;
        border: 1px solid black;
    }
    .p-top{padding-top:2.5em;}
    .move-left {
        width: auto;
        box-shadow: none;
    }
</style>
