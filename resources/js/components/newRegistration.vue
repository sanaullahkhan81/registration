<template>

    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="background-color:white;">
                <form-wizard title="Masjid Al-Jannah Community Islamic School" subtitle="Admission Form">
                    <tab-content title="Section 1- Child’s Details">
                        <div>
                            <b-form inline>
                                <label class="sr-only" for="inline-form-input-name">Name</label>
                                <b-input
                                        id="inline-form-input-name"
                                        class="mb-2 mr-sm-2 mb-sm-0"
                                        placeholder="Jane Doe"
                                ></b-input>

                                <label class="sr-only" for="inline-form-input-username">Username</label>
                                <b-input-group prepend="@" class="mb-2 mr-sm-2 mb-sm-0">
                                    <b-input id="inline-form-input-username" placeholder="Username"></b-input>
                                </b-input-group>

                                <b-form-checkbox class="mb-2 mr-sm-2 mb-sm-0">Remember me</b-form-checkbox>

                                <b-button variant="primary">Save</b-button>
                            </b-form>
                        </div>

                    </tab-content>
                    <tab-content title="Additional Info">
                        My second tab content
                    </tab-content>
                    <tab-content title="Last step">
                        Yuhuuu! This seems pretty damn simple
                    </tab-content>
                </form-wizard>
            </div>


        </div>
    </div>


</template>

<script>
    export default {
        props: {

        title: {
            type: String,
            default: 'testing'
        },
        subtitle: {
            type: String,
            default: 'Steps'
        },

    },
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
