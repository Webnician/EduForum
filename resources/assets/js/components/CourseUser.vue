<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Registered Students<span style="float: right"> <a class="btn-info" style="display: block;margin-left: auto;margin-right: auto; text-align: center" :href="'/registration/course/'+ course +'/create'" v-model="course">Add New User to Course </a></span></div>

                    <div class="panel-body">
                        <h3 class="list-heading">Students</h3>
                        <ul style=" text-decoration: underline;">
                            <li v-for="student of studentlist">
                                <form method="POST" action="/registration/delete">
                                <a :href="'/user/'+ student.student.id" v-model="student.student.id">
                                    {{ student.student.id }} {{ student.student.fname}} {{ student.student.lname}} {{ student.student.email}}</a>
                                    <input type="hidden" name="id" :value="student.student.user_course_id">
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
            ['studentlist', 'course'],
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
