<template>

    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="background-color:white;">
                <form-wizard title="Masjid Al-Jannah Community Islamic School" subtitle="Admission Form">
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
                                        <input id="dob" type="text" class="form-control" v-model="admission.student.date_of_birth">
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
                                        <select id="first-lang" type="text" class="form-control" v-model="admission.student.first_language">
                                            <option value="">Select Get from API</option>
                                            <option value="1">English</option>
                                            <option value="2">Spanish</option>
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
                                        <input id="cob" type="text" class="form-control" v-model="admission.student.country_of_birth">
                                    </div>
                                    <div class="form-group">
                                        <label for="eo">Ethnic Origin:</label>
                                        <select id="eo" type="text" class="form-control" v-model="admission.student.ethnic_origin">
                                            <option>Select toto get from api</option>
                                            <option>A</option>
                                            <option>B</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <select id="nationality" type="text" class="form-control" v-model="admission.student.nationality">
                                            <option>Select</option>
                                            <option>A</option>
                                            <option>B</option>
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
                                <ul  v-for="course in courses">
                                    <li>
                                        <label>{{course.course_name}}</label>
                                        <input type="checkbox" @change="addToList(course.id)">
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
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
                                <div class="col-md-12">
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
                        <table class="table"  v-for="(row, $index) in admission.guardians" v-bind:key='row.id'>
                           Parent /  Guardinan : # {{$index+1}}
                            <tr>
                                <th>Name</th>
                                <td><input class="form-control" v-model="row.name"></td>
                                <th>Occupation</th>
                                <td><input class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input class="form-control"></td>
                                <td>Post Code</td>
                                <td><input class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td><input class="form-control"></td>
                                <td>Mobile Number</td>
                                <td><input class="form-control"></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-primary btn-xs"
                                            @click="addRow($index)"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    <button class="btn btn-danger btn-xs"
                                            @click="removeRow($index)"><i
                                            class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </table>
                    </tab-content>
                    <tab-content title="Section 3">
                        Yuhuuu! This seems pretty damn simple
                    </tab-content>
                </form-wizard>
            </div>


        </div>
    </div>


</template>

<script>
    export default {
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
                    ]
                },
                courses:[]
            }
        },
        created() {
            this.getCourses();
        },
        methods:{
            addRow(index) {
                let self = this;
                console.log('minas')
                console.log(index)
                console.log(self.admission.guardians)
                try {
                    self.admission.guardians.splice(index + 1, 0, {
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
            removeRow(index) {
                let self = this;
                if (self.admission.guardians.length > 1) {
                    self.admission.guardians.splice(index, 1);
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
                console.log(this.admission.health_data.serious_illness_description.length)
                if(this.admission.health_data.serious_illness_description.length > 0){
                    this.admission.health_data.serious_illness = 1;
                }// TODO fix this
                if(this.admission.health_data.serious_illness_description.length === 0){
                    this.admission.health_data.serious_illness = 0;
                }

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
</style>
