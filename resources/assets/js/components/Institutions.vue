<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="margin-bottom: 2%">
                            Institution Component
                    </div>
                    <div class="panel-body">
                        <span class="col-lg-12 col-md-12 col-sm-12 ">
                    <span style="float: right;"> <a class="btn-info"
                   style="display: block;margin-left: auto;margin-right: auto; text-align: center;  color:linen"
                   href="/institution">Create New Institution</a>
                    </span></span>

                        <h3 class="list-heading">Institutions</h3>
                        <ul style=" text-decoration: underline;">
                            <li v-for="inst of institutionlist">
                                <a :href="'/institution/'+ inst.id" v-model="inst.id">
                                {{ inst.id }} - {{ inst.institution_name }} </a>
                                <!--{{ institution_name }} - {{ system_id }} - {{ admin_id }}-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props:
            ['institutionlist'],

        data(){
            return {
//                id: this.ids,
//                link: this.inst.id
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
