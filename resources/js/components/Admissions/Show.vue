<template>
	<div id="vueapp" class="vue-app">
		<small>Tidy HTML, make a form</small>
	application_number : {{admission.application_number}}
		<br />
		<strong>Student:</strong><br />
			Name: {{admission.student.forename}}<br />
			Name: {{admission.student.surname}}
	</div>
</template>

<script>
    import '@progress/kendo-theme-default/dist/all.css'

    import { Grid,GridNoRecords } from '@progress/kendo-vue-grid'
    Vue.component('grid-norecords', GridNoRecords);
    Vue.component('Grid', Grid);
    export default {
        name: "AdmissionsShow",
		props:['admission_id'],
        data(){
            return {
				admission:[]

            };
        },
        created(){
            this.fetchList();
        },
		methods:{
            fetchList(){
                let self = this;
                let page_url = '/api/admissions/'+ this.admission_id;
                axios({
                    method: 'get',
                    url: page_url,
					headers: {
                        Authorization: 'Bearer ' + this.api_token
                    }
                }).then( (response)  =>{
					console.log(response);
					self.admission = response.data;

                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

		}
    }
</script>

<style scoped>

</style>