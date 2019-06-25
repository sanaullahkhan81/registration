<template>
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
                           value="1"
                           v-model="admission.offer_of_acceptance.other_children_at_institute"
                    />
                </div>
            </div>
            <div class="col-md-3">
                <label for="offer_of_acceptance_no">No</label>
                <input id="offer_of_acceptance_no"
                       type="radio" class="form-control move-left"
                       value="0"
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
                                       value="1"
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
                                       value="0"
                                       v-model="admission.offer_of_acceptance.accept_terms" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Office Use Only</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="dreceived">Date Received:</label>
                    </div>
                    <div class="col-sm-6">
                        <datepicker id="dreceived" class="form-control"
                                    v-model="admission.offer_of_acceptance.office_use.date_received"
                        >
                        </datepicker>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="passport">Passport:</label>
                    </div>
                    <div class="col-sm-6">
                        <input id="passport" type="checkbox" class="form-control"
                               v-model="admission.offer_of_acceptance.office_use.passport" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="birth_certificate">Birth Certificate:</label>
                    </div>
                    <div class="col-sm-6">
                        <input id="birth_certificate" type="checkbox" class="form-control"
                               v-model="admission.offer_of_acceptance.office_use.birth_certificate"
                        />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="enrolment_date">Enrolment Date:</label>
                    </div>
                    <div class="col-sm-6">
                        <datepicker id="enrolment_date" class="form-control"
                                    v-model="admission.offer_of_acceptance.office_use.enrolment_date"
                        >
                        </datepicker>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="application_number">Application Number:</label>
                    </div>
                    <div class="col-sm-6">
                        <input id="application_number" class="form-control"
                               v-model="admission.offer_of_acceptance.office_use.application_number"
                        />

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Vuelidate from 'vuelidate'
    import { required, minLength, between } from 'vuelidate/lib/validators'
    Vue.use(Vuelidate);
    export default {
        name: "step4",
        components: {Datepicker},
        data() {
            return {
                admission: {

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
                guardians:{
                   name:{
                       required
                   }

                }
            },


        },
        created() {
            // this.getCountries();
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
                console.log(isValid)
                // console.log(this.$v.form.surname)
                console.log(this.$v)
                this.$emit('on-validate', this.$data, isValid)
                return isValid
            }
        }

    }
</script>

<style scoped>

</style>