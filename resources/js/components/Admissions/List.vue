<template>
	<div id="vueapp" class="vue-app">
		<Grid :style="{height: '100%'}"
			  :data-items="items"
			  :pageable="true"
			  :columns="columns"
			  :sortable="true"
			  :sort= "sort"
			  :skip= "skip"
			  :take="take"
			  :total="total"
			  @pagechange="pageChangeHandler"
			  @sortchange="sortChangeHandler"
			  :resizable="true"
			  :filterable="true"
			  :filter="filter"
			  @filterchange="filterChange"
		>
			<grid-norecords>
				<div  class="k-loading-mask customPosition"><span class='k-loading-text'></span>
					<div class='k-loading-image'/><div class='k-loading-color'/></div>
			</grid-norecords>
		</Grid>
	</div>
</template>

<script>
    import '@progress/kendo-theme-default/dist/all.css'

    import { Grid,GridNoRecords } from '@progress/kendo-vue-grid'
    Vue.component('grid-norecords', GridNoRecords);
    Vue.component('Grid', Grid);
	Vue.component('sibling-presence-filter', {
		template: `<div>
                <select ref='select' :value='value' @change='change' class="table-filter">

                    <option value="null" ></option>
                    <option value="1" >Yes</option>
                    <option value="0" >No</option>
                </select>
                <button v-if="this.value != ''" @click="reset">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>`,
		props: {
			grid: Grid,
			field: String,
			filterType: String,
			value: [String, Number, Boolean, Date],
			operator: null
		},
		methods: {
			change (ev) {
				this.$emit('change', { operator: 'eq', field: this.field, value: this.$refs.select.value, syntheticEvent: ev });
			},
			reset (ev) {
				this.$emit('change', { operator: 'eq', field: '', value: '', syntheticEvent: ev });
			}
		}
	});
    export default {
        name: "AdmissionsList",
        data(){
            return {
                items: [],
                selectedField: 'selected',
                selectedID: 1,
                skip: 0,
                take: 10,
                page: '',
                message: false,
                total:null,
                filter: null,
                sort: [
                    { field: 'created_at', dir: 'desc' }
                ],
                columns: [
                    { field: 'id', title: 'Application No'},
					{ field: 'student_id', title: 'Student ID'},
                    { field: 'student.forename', title: 'Student Full Name',cell:this.fullName},
					{ field: 'student.gender', title: 'Gender'},
					{ field: 'student.date_of_birth', title: 'Age', cell:this.age},
					{ field: 'student.address', title: 'Address'},
					{ field: 'other_children_at_institute', title: 'Siblings In Institute ', cell:this.siblingPreset, filterCell:"sibling-presence-filter"},
                    { field: 'id', title: 'Actions', cell: this.ActionButton, width:'100px',filterable:false }
                ],
            };
        },
        created(){
            this.fetchList();
        },
		methods:{
        	// Get data from server
            fetchList(){
                let page_url = '/api/admissions/';
                if(this.page){
                    page_url = page_url + this.page
                }
                axios({
                    method: 'get',
                    url: page_url,
                    params: {
                        admission_id : this.id,
                        sort: this.sort[0].field,
                        dir:  this.sort[0].dir,
                        filter: this.filter
                    },
                    headers: {
                        Authorization: 'Bearer ' + this.api_token
                    }
                }).then( (response)  =>{
                    this.items = response.data;
                    this.total = response.total;

                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
			// When a pagination is clicked, manage the actions
            pageChangeHandler: function(event) {
                console.log(event);
                this.skip = event.page.skip;
                this.take = event.page.take;
                let page = (this.take + this.skip)/this.take;
                this.page = '?page='+page;
                this.fetchContacts();

            },
			// When any colum header is clicked, manage the sort
            sortChangeHandler: function(e) {
                this.sort = e.sort;
                this.fetchList();
            },
			// When a filter is used update the table
            filterChange: function(ev) {
                console.log(ev)
                this.filter = ev.filter;
                this.fetchList();
            },
			// Convert given data to a button
			ActionButton: function (h, tdElement , props, clickHandler ) {
                return h('td',  [
                    h('a', {
                        attrs: {
                            class: 'space',
                            href: '/admissions/'+props.dataItem.id
                        },
                        domProps: {
                            innerHTML: '<i class="fa fa-eye" aria-hidden="true"></i>'
                        }
                    }),
                    h('a', {
                        attrs: {
                            class: 'space',
                            href: '/admissions/'+props.dataItem.id+'/edit'
                        },
                        domProps: {
                            innerHTML: '<i class="fa fa-edit" aria-hidden="true"></i>'
                        }
                    })
                ]);
            },
			// Convert first and last name into one cell
			fullName: function (h, tdElement, props, clickHandler) {
            	// console.log(props.dataItem)
				return h('td',  [
					h('span', {
						attrs: {
						},
						domProps: {
							innerHTML: props.dataItem.student.forename + ' ' + props.dataItem.student.surname
						}
					})
				]);
			},
			// Convert date of birth to student age
			age: function (h, tdElement, props, clickHandler) {
				// console.log(props.dataItem)
				let birthday = new Date(props.dataItem.student.date_of_birth);
				console.log(birthday);
				let ageDifMs = Date.now() - birthday.getTime();
				let ageDate = new Date(ageDifMs);
				let personAge =  Math.abs(ageDate.getUTCFullYear() - 1970);

				return h('td',  [
					h('span', {
						attrs: {
						},
						domProps: {
							innerHTML: personAge + ' Yrs'
						}
					})
				]);
			},
			siblingPreset: function (h, tdElement, props, clickHandler) {
				// console.log(props.dataItem)

				var presence = 'No';
				if(props.dataItem.other_children_at_institute == 1){
					presence ='Yes';
				}
				return h('td',  [
					h('span', {
						attrs: {
						},
						domProps: {
							innerHTML: presence
						}
					})
				]);
			},



		}
    }
</script>

<style>
	a.space {
		margin-left: 1em;
		margin-right: 0.2em;
	}

	.table-filter{
		width:70%;
	}

	main{
		min-width:90%;
	}

</style>