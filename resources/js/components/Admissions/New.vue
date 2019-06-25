<template>

    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="background-color:white;">
                <form-wizard title="Masjid Al-Jannah Community Islamic School"
                             subtitle="Admission Form" @on-complete="saveForm" >
                    <tab-content title="Section 1- Child’s Details" :before-change="()=>validateStep('step1')">
                        <step1 ref="step1" @on-validate="mergePartialModels"></step1>
                    </tab-content>
                    <tab-content title="Section 2- Parents/Guardians Details" :before-change="()=>validateStep('step2')">
                        <step2 ref="step2" @on-validate="mergePartialModels"></step2>
                    </tab-content>
                    <tab-content title="Section 3" :before-change="()=>validateStep('step3')">
                        <step3 ref="step3" @on-validate="mergePartialModels"></step3>
                    </tab-content>
                    <tab-content title="Section 4- Offer of Acceptance" :before-change="()=>validateStep('step4')">
                        <step4 ref="step4" @on-validate="mergePartialModels"></step4>
                    </tab-content>
                </form-wizard>
            </div>
        </div>
    </div>


</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Vuelidate from 'vuelidate'

    import step1 from './Step1';
    import step2 from './Step2';
    import step3 from './Step3';
    import step4 from './Step4';

    import { required} from 'vuelidate/lib/validators'
    Vue.use(Vuelidate);
    export default {
        props:['api_token','admission_id','student_id'],
        components: {Datepicker, step1, step2, step3, step4},
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
                errors: [],
            }

        },
        validations: {
            admission:{
                student:{
                    surname:{
                        required
                    }
                }
            },
            form: ['surname',]
        },

        created() {
            if(typeof this.admission_id !== "undefined"){
                console.log('An existing Form')
                this.createForm();
            }
            // this.getCourses();

            // this.getEthnic();
            // this.getLanguages();
            // this.getNationalities();

        },
        methods:{
            createForm(){ // when form is not new
                let self =this;
                axios.get('/api/students/'+this.student_id)
                    .then(function (response) {
                        self.admission.student = response.data;
                        self.admission.student.country_of_birth = response.data.country_id;
                        self.admission.student.ethnic_origin = response.data.ethnic_origin_id;
                        self.admission.student.nationality = response.data.nationality_id;
                        self.admission.student.first_language = response.data.language_id;
                        self.admission.health_data = response.data.health_data;
                        self.admission.guardians = response.data.guardians;
                        if (response.data.emergency_contacts && response.data.emergency_contacts.length) {
                            self.admission.emergency_contacts = response.data.emergency_contacts;
                        }
                        if (response.data.admission && Object.keys(response.data.admission).length) {
                            console.log(response.data.admission);
                            let key = self.admission.offer_of_acceptance;
                            let source = response.data.admission;
                            key.other_children_at_institute = source.other_children_at_institute;
                            if(source.accept_terms_conditions === 'true'){
                                key.accept_terms = 1;
                            }else{
                                key.accept_terms = 0;
                            }
                            key.office_use.application_number = source.application_number;
                            // key.office_use.birth_certificate = source.birth_certificate;
                            if(source.birth_certificate == 1){
                                key.office_use.birth_certificate = true;
                            }else{
                                key.office_use.birth_certificate = false;
                            }
                            key.office_use.date_received = source.date_received;
                            // key.office_use.passport = source.passport;
                            if(source.passport == 1){
                                key.office_use.passport = true;
                            }else{
                                key.office_use.passport = false;
                            }
                            key.office_use.enrolment_date = source.enrolment_date;


                            // self.admission.offer_of_acceptance = response.data.admission;
                            if(typeof response.data.admission.office_use !== "undefined"){
                                alert('2');
                                self.admission.offer_of_acceptance.office_use = [{

                                    date_received:'',
                                    passport:'',
                                    birth_certificate:'',
                                    enrolment_date: '',
                                    application_number:''

                                }]
                            }

                        }
                        self.admission.additional_education =  response.data.former_course[0];
                        // self.admission.courses = response.data.courses;
                        response.data.courses.forEach(function(course) {
                            self.addToList(course.id);
                        });

                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
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

            addToList(course){
                //console.log(course)
                var index = this.admission.courses.indexOf(course);
                //console.log(index);
                if (index === -1) {
                    this.admission.courses.push(course);
                } else {
                    this.admission.courses.splice(index, 1);
                }
                // console.log(this.admission.courses)
            },

            serious_illness_update(){
                if(this.admission.health_data.serious_illness_description.length > 0){
                    this.admission.health_data.serious_illness = 1;
                }// TODO fix this
                if(this.admission.health_data.serious_illness_description.length === 0){
                    this.admission.health_data.serious_illness = 0;
                }

            },

            saveForm(){
                let self = this;
                //const data = new URLSearchParams();
                //data.append('admission', this.admission);

                if(typeof this.admission_id !== "undefined"){
                    var type = "PUT";
                    var url = '/api/admissions/' + this.admission_id;
                }else{
                    var type = "POST";
                    var url = 'api/admissions';
                }
                axios({
                    method: type,
                    url: url,
                    headers: { Authorization: 'Bearer ' + this.api_token },
                    data: self.admission
                }).then( (response)  =>{
                    console.log(response);
                    window.location = '/admissions';
                })
                    .catch(error => {
                        console.log(error.response)
                    });
            },
            validateStep(name) {
                var refToValidate = this.$refs[name];
                return refToValidate.validate();
            },
            mergePartialModels(model, isValid){
                if(isValid){
                    // merging each step model into the final model
                    this.finalModel = Object.assign({},this.finalModel, model)
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
    .p-top{padding-top:2.5em;}
    .move-left {
        width: auto;
        box-shadow: none;
    }
</style>
