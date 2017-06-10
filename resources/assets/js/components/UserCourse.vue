<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Registered Courses<span style="float: right"> <a class="btn-info" style="display: block;margin-left: auto;margin-right: auto; text-align: center" :href="'/registration/user/' + user + '/create'" v-model="user">Add to New Course </a></span></div>
                    <div class="panel-body">
                        <h3 class="list-heading">Courses</h3>
                        <ul style=" text-decoration: underline;">

                            <li v-for="course of courselist">
                                <form method="POST" action="/registration/delete">
                                <a :href="'/course/'+ course.id" v-model="course.id">
                                    {{ course.course.id }} {{ course.course.course_name }}</a>

                                    <input type="hidden" name="id" :value="course.course.user_course_id">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <button  class="btn-info" style="display: inline-block;margin-left: 10%;margin-right: auto" type="submit">Delete Registration</button>
                                </form>

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
            ['courselist', 'user'],

        data(){
            return {
                 csrf: "",
            }
        },

        mounted() {
            this.csrf = window.Laravel.csrfToken
        }
    }
</script>
