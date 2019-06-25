<template>
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
                <label for="school_teacher">Teachers Name:</label>
                <input id="school_teacher" type="text" class="form-control"
                       v-model="admission.additional_education.teacher_name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="teacher_number">Teachers Number:</label>
                <input id="teacher_number" type="text" class="form-control"
                       v-model="admission.additional_education.teacher_number">
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
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Vuelidate from 'vuelidate'
    import { required, minLength, between } from 'vuelidate/lib/validators'
    Vue.use(Vuelidate);
    export default {
        name: "step3",
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
                }
            }
        },
        validations: {
            admission:{

            },


        },
        created() {
            // this.getCountries();
        },
        methods: {
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