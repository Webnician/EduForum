
<template>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>

                    <div class="panel-body">

                            <!--action="/user/update"-->
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="actions" value="update">
                            <!--<input type="hidden" name="id" :value="id">-->
                            <!--{{ csrf_field() }}-->

                            <div v-if="addcoursetouser" class="row">
                                <form method="POST" v-bind:action="action" >
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="actions" value="user-insert">
                                    <input type="hidden" name="student" :value="student.id">
                                <h3>Add Course Registration</h3>
                                <h4> User : {{student.id}} - {{ student.fname }} {{student.lname}}</h4>
                                <select name="coursetouser" style=" text-decoration: underline;" v-model="selected">
                                    <option disabled value="">Please select A Course</option>
                                    <option v-for="course of courselist" v-bind:value="course.id">
                                        {{ course.id }} {{ course.course_name }}
                                    </option>
                                </select>
                                    <div class="row" style="margin-top: 3%">
                                        <button  class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">Add Registration</button>
                                    </div>
                                </form>
                            </div>
                            <div v-if="addusertocourse" class="row">
                                <form method="POST" v-bind:action="action" >
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="actions" value="course-insert">
                                    <input type="hidden" name="course" :value="course.id">
                                <h2>Add User to this Course</h2>
                                <h4> Course : {{course.id}} - {{ course.course_name }} </h4>
                                <select name="usertocourse" style=" text-decoration: underline;" v-model="selected">
                                    <option disabled value="">Please select A Student to Add</option>
                                    <option v-for="student of studentlist" v-bind:value="student.id">
                                        {{ student.id}} {{ student.fname}} {{ student.lname}}
                                    </option>
                                </select>
                                    <div class="row" style="margin-top: 3%">
                                        <button  class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">Add Registration</button>
                                    </div>
                                </form>
                            </div>





                        <!--<a href="/user/{id}">Back</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        props:
            [ 'studenta', 'coursea', 'studentlista', 'courselista', 'addusertocoursea', 'addcoursetousera'],

        data(){
            return {
                id: this.ids,
                student : this.studenta,
                course : this.coursea,
                studentlist : this.studentlista,
                courselist : this.courselista,
                addusertocourse : this.addusertocoursea,
                addcoursetouser : this.addcoursetousera,
                action : '/registration/insert',
                csrf: "",
                selected: ''

            }
        },

        mounted() {
            this.csrf = window.Laravel.csrfToken
        }
    }



</script>