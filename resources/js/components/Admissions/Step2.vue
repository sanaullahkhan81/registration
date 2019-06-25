<template>
    <div class="row">
        <div class="col-md-12" v-bind:class="{ 'has-error': $v.admission.guardians.$error }">

            <span class="help-block" v-if="$v.admission.guardians.$error && !$v.admission.guardians.firstName">
                        At least one guardian must be entered
            </span>
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
                    <td><input class="form-control" v-model="row.telephone"></td>
                    <td>Mobile Number</td>
                    <td><input class="form-control" v-model="row.mobile"></td>
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
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Vuelidate from 'vuelidate'
    import { required, minLength, between } from 'vuelidate/lib/validators'
    const firstName = (myArray) => myArray[0].name.length > 5;

    Vue.use(Vuelidate);
    export default {
        name: "step2",
        components: {Datepicker},
        data() {
            return {
                admission: {
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
                }
            }
        },
        validations: {
            admission:{
                guardians:{
                    firstName
                }
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
                console.log(isValid);
                this.$emit('on-validate', this.$data, isValid)
                return isValid
            }
        }

    }
</script>

<style scoped>

</style>