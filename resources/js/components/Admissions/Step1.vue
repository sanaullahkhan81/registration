<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group"  v-bind:class="{ 'has-error': $v.admission.student.surname.$error }">
                    <label for="surname">Surname:</label>
                    <input id="surname"  class="form-control"
                           v-model.trim="admission.student.surname">
                    <span class="help-block" v-if="$v.admission.student.surname.$error && !$v.admission.student.surname.required">
                        Surname name is required
                    </span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': $v.admission.student.date_of_birth.$error }">
                    <label for="dob">Date of Birth:</label>
                    <datepicker id="dob" class="form-control"
                                v-model="admission.student.date_of_birth">
                    </datepicker>
                    <span class="help-block" v-if="$v.admission.student.date_of_birth.$error && !$v.admission.student.date_of_birth.required">
                        date_of_birth name is required
                    </span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': $v.admission.student.gender.$error }">
                    <label for="gender">Gender:</label>
                    <select id="gender" type="text" class="form-control"
                            v-model="admission.student.gender">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span class="help-block" v-if="$v.admission.student.gender.$error && !$v.admission.student.gender.required">
                        Gender name is required
                    </span>
                </div>
                <div class="form-group">
                    <label for="first-lang">Mother tongue/First Language:</label>
                    <select id="first-lang" class="form-control"
                            v-model="admission.student.first_language">
                        <option disabled value="">Please select one</option>
                        <option v-for="language in languages" v-bind:value="language.id">
                            {{ language.language }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" v-bind:class="{ 'has-error': $v.admission.student.forename.$error }">
                    <label for="forename">Forename (s):</label>
                    <input id="forename" type="text" class="form-control"
                           v-model.trim="admission.student.forename">
                    <span class="help-block" v-if="$v.admission.student.forename.$error && !$v.admission.student.forename.required">forename name is required</span>
                </div>
                <div class="form-group">
                    <label for="cob">Country of Birth:</label>
                    <select id="cob" class="form-control"
                            v-model="admission.student.country_of_birth">
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
                    <select id="nationality" class="form-control"
                            v-model="admission.student.nationality">
                        <option disabled value="">Please select one</option>
                        <option v-for="nationality in nationalities"
                                v-bind:value="nationality.id">
                            {{ nationality.nationality_name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Telephone:</label>
                    <input id="phone" type="text" class="form-control"
                           v-model="admission.student.telephone">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input id="mobile" type="text" class="form-control"
                           v-model="admission.student.mobile">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" class="form-control"
                              v-model="admission.student.address">
                                        </textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="postcode">Postcode:</label>
                    <input id="postcode" type="text" class="form-control"
                           v-model="admission.student.post_code">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="relation">Relationship to child:</label>
                    <input id="relation" type="text" class="form-control"
                           v-model="admission.student.relationship_to_child">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <h3>Courses</h3>
            </div>
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item" v-for="(course,index) in courses">
                        <label :for="course.id">{{course.course_name}}</label>
                        <input type="checkbox" v-model="admission.courses"
                               :value="course.id"
                               :id="course.id"
                               :checked="isChecked(index)" />
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
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Vuelidate from 'vuelidate'
    import { required, minLength, between } from 'vuelidate/lib/validators';
    const mustBeCool = (value) => !helpers.req(value) || value.indexOf('cool') >= 0;
    const uzunolsun = (value) =>  value.length >= 2;

    Vue.use(Vuelidate);
    export default {
        name: "step1",
        components: {Datepicker},
        data() {
            return {
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
                        teacher_name: '',
                        teacher_number: '',
                        books:[{book_name: '', qaidah: '', quran: '' }],
                        leaving_reason: '',
                        former_education_details: ''
                    },
                    offer_of_acceptance:{
                        other_children_at_institute:'',
                        accept_terms:'',
                        office_use:{
                            date_received:'',
                            passport:'',
                            birth_certificate:'',
                            enrolment_date: '',
                            application_number:''
                        }
                    }
                },
                courses:[],
                countries:[],
                ethnics:[],
                languages:[],
                nationalities:[],
            }
        },
        validations: {
            admission:{
                student:{
                    surname:{

                        uzunolsun
                    },
                    forename:{
                        required
                    },
                    date_of_birth:{
                        required
                    },
                    gender:{
                        required
                    }

                }
            },


        },
        created() {
            this.getCountries();
            this.getCourses();
            this.getEthnic();
            this.getLanguages();
            this.getNationalities();
        },
        methods: {
            getCountries(){
                let self = this;
                axios.get('/api/countries')
                    .then(function (response) {
                        self.countries = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            getCourses(){
                let self = this;
                axios({
                    method: 'get',
                    url: '/api/courses',
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
            getEthnic(){
                let self = this;
                axios.get('/api/ethnics')
                    .then(function (response) {
                        self.ethnics = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            getLanguages(){
                let self = this;
                axios.get('/api/languages')
                    .then(function (response) {
                        self.languages = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            getNationalities(){
                let self = this;
                axios.get('/api/nationalities')
                    .then(function (response) {
                        self.nationalities = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },

            isChecked(index){
                return this.admission.courses.id === this.courses[index].id

            },
            serious_illness_update(){
                if(this.admission.health_data.serious_illness_description.length > 0){
                    this.admission.health_data.serious_illness = 1;
                }// TODO fix this
                if(this.admission.health_data.serious_illness_description.length === 0){
                    this.admission.health_data.serious_illness = 0;
                }

            },
            validate() {
                this.$v.admission.$touch();
                var isValid = !this.$v.admission.$invalid
                // console.log(isValid)
                // console.log(this.$v.form.surname)
                // console.log(this.$v)
                this.$emit('on-validate', this.$data, isValid)
                return isValid
            }
        }

    }
</script>

<style scoped>

</style>