<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Course List Component<span style="float: right"> <a class="btn-info" style="display: block;margin-left: auto;margin-right: auto; text-align: center" href="/course">Create New Course</a></span></div>

                    <div class="panel-body">
                        <h3 class="list-heading">Courses</h3>
                        <ul style=" text-decoration: underline;">
                            <li v-for="course of courselist">
                                <a :href="'/course/'+ course.id" v-model="course.id">
                                    {{ course.id }} - {{ course.course_name }} </a>
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
            ['courselist'],

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
