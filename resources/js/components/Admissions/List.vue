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
                    { field: 'application_number', title: 'App No'},
                    { field: 'student.forename', title: 'Student Name'},
                    { field: 'student.surname', title: 'Student Lastname'},
                    { field: 'student.enrolment_date', title: 'enrolment_date',  filter:'date', cell: this.enrolment_date},
                    { field: 'id', title: 'Actions', cell: this.cellFunction, width:'100px',filterable:false }
                ],
            };
        },
        created(){
            this.fetchList();
        },
		methods:{
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
            pageChangeHandler: function(event) {
                console.log(event);
                this.skip = event.page.skip;
                this.take = event.page.take;
                let page = (this.take + this.skip)/this.take;
                this.page = '?page='+page;
                this.fetchContacts();

            },
            sortChangeHandler: function(e) {
                this.sort = e.sort;
                this.fetchList();
            },
            filterChange: function(ev) {
                console.log(ev)
                this.filter = ev.filter;
                this.fetchList();
            },
            cellFunction: function (h, tdElement , props, clickHandler ) {
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
            enrolment_date: function (h, tdElement , props, clickHandler ) {
                return h('td', props.dataItem.enrolment_date.substring(0,10));
            },
		}
    }
</script>

<style>
	a.space {
		margin-left: 1em;
		margin-right: 0.2em;
	}
</style>