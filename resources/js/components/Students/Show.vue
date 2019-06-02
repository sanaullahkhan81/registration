<template>
	<div id="vueapp" class="vue-app">
		<h2>Student Details</h2>
		<small>Tidy HTML, make a form</small>
		<table class="table">
			<tbody>
			<tr>
				<th>First Name</th>
				<td>{{student.forename}}</td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td>{{student.surname}}</td>
			</tr>
			<tr>
				<th>mobile</th>
				<td>{{student.mobile}}</td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>{{student.gender}}</td>
			</tr>
			<tr>
				<th>Lang</th>
				<td>{{student.language.language}}</td>
			</tr>
			<tr>
				<th>country</th>
				<td>{{student.country.country_name}}</td>
			</tr>
			<tr>
				<th>nationality</th>
				<td>{{student.nationality.nationality_name}}</td>
			</tr>
			<tr>
				<th>ethnic</th>
				<td>{{student.ethnic.ethnic_origin_name}}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{student.address}}</td>
			</tr>
			<tr>
				<th>Post Code</th>
				<td>{{student.post_code}}</td>
			</tr>
			<tr>
				<th>relationship_to_child</th>
				<td>{{student.relationship_to_child}}</td>
			</tr>
			<tr>
				<th>Parents/Guardians</th>
				<td>
					<table class="table table-borderless">
						<tr>
							<th>Name</th>
							<th>Mobile</th>
							<th>address</th>
							<th>post_code</th>
							<th>occupation</th>
							<th>telephone</th>
						</tr>
						<tr v-for="parent in student.guardians">
							<td>{{parent.name}}</td>
							<td>{{parent.mobile}}</td>
							<td>{{parent.address}}</td>
							<td>{{parent.post_code}}</td>
							<td>{{parent.occupation}}</td>
							<td>{{parent.telephone}}</td>
						</tr>
					</table>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
    import '@progress/kendo-theme-default/dist/all.css'

    import { Grid,GridNoRecords } from '@progress/kendo-vue-grid'
    Vue.component('grid-norecords', GridNoRecords);
    Vue.component('Grid', Grid);
    export default {
        name: "StudentShow",
		props:['student_id'],
        data(){
            return {
				student:{
				    language:{},
                    country:{country_name:''},
                    nationality:{nationality_name:''},
                    ethnic:{ethnic_origin_name:''}
				}

            };
        },
        created(){
            this.fetchList();
        },
		methods:{
            fetchList(){
                let self = this;
                let page_url = '/api/students/'+ this.student_id;
                axios({
                    method: 'get',
                    url: page_url,
                    headers: {
                        Authorization: 'Bearer ' + this.api_token
                    }
                }).then( (response)  =>{
					console.log(response);
					self.student = response.data;
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