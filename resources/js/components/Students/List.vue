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
        name: "StudentsList",
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
                    { field: 'forename', title: 'Student Name'},
                    { field: 'surname', title: 'Student Lastname'},
                    { field: 'gender', title: 'Gender'},
                    { field: 'post_code', title: 'Post Code'},
					{ field: 'date_of_birth', title: 'Post Code',  filter:'date', cell: this.birthday_date},
                    { field: 'id', title: 'Actions', cell: this.cellFunction, width:'100px',filterable:false }
                ],
            };
        },
        created(){
            this.fetchList();
        },
		methods:{
            fetchList(){
                let page_url = '/api/students/';
                if(this.page){
                    page_url = page_url + this.page
                }
                axios({
                    method: 'get',
                    url: page_url,
                    params: {
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
                            class: 'btn btn-xs btn-primary',
                            href: '/students/'+props.dataItem.id
                        },
                        domProps: {
                            innerHTML: '<i class="fa fa-eye" aria-hidden="true"></i>'
                        }
                    })
                ]);
            },
            birthday_date: function (h, tdElement , props, clickHandler ) {
                return h('td', props.dataItem.date_of_birth.substring(0,10));
            },
		}
    }
</script>

<style scoped>

</style>