<template>

    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="background-color:white;">
                <form-wizard title="Masjid Al-Jannah Community Islamic School" subtitle="Admission Form">
                    <tab-content title="Section 1- Child’s Details">


                    </tab-content>
                    <tab-content title="Section 2- Parents/Guardians Details">

                    </tab-content>
                    <tab-content title="Section 3">

                    </tab-content>
                    <tab-content title="Section 4- Offer of Acceptance">

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

<style scoped>
    @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-xldj{border-color:inherit;text-align:left}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
</style>
