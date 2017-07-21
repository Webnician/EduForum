<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Assignment List <span v-if="admin" style="float: right"><a :href="'/assignment/add/'+ theclass.id"><span style="margin-right: 2%"></span>   <i class="fa fa-plus-square" aria-hidden="true"></i></a></span></div>

                    <div class="panel-body">
                        <ul v-if="assignment_closed">
                            <li v-on:click="get_selected_assign(index)" v-for="(assign, index) in assignments">
                                {{assign.assignment_name}}<span style="float: right">{{assign.assignment_due_date}}</span>
                            </li>
                        </ul>
                        <div v-else="assignment_closed" class="row">
                            <div v-if="admin">
                                <div class="center" v-if="editAssign">
                                    <button class="request-accepted-button " v-on:click="submitAssignment()">Update Assignment</button>
                                    <button class="request-pending-button " v-on:click="stopEditing()">Cancel</button>
                                    <button class="request-denied-button " v-on:click="deleteAssignment()">Delete Assignment</button>
                                </div>
                                <div v-else="editAssign">
                                    <button class="request-pending-button ctr-block" v-on:click="editAssignment()">Edit Assignment</button>
                                </div>
                            </div>
                            <h4 ><span style="margin-left: 10%">Assignment</span>
                                <button style="float: right; color:#665; margin-right: 2%" @click="hide_selected_assignment()">
                                    X
                                </button>
                            </h4>
                            <form id="assignment-delete-form" action="/assignment/insert" method="post">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="course_id" :value="course.id">
                                <input type="hidden" name="actions" value="delete">
                                <input type="hidden" name="assignment_id" :value="selected_assignment.id">
                            </form>
                            <form id="assignment-update-form" action="/assignment/insert" method="post">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="course_id" :value="course.id">
                                <input type="hidden" name="actions" value="update">
                                <input type="hidden" name="assignment_id" :value="selected_assignment.id">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <h5 v-if="editAssign"><input type="text" name="assignname" v-model="selected_assignment.assignment_name"/> </h5>
                                <h5 v-else="editAssign">{{selected_assignment.assignment_name }}</h5>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                Opens : <br/>
                                <span v-if="editAssign">
                                    <input type="datetime-local" name="open_date" v-model="selected_assignment.assignment_open_date"/>
                                </span>
                                <span v-else="editAssign">
                                     {{selected_assignment.assignment_open_date }}
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                Due : <br/>
                                <span v-if="editAssign">
                                    <input type="datetime-local" name="end_date" v-model="selected_assignment.assignment_due_date"/>
                                </span>
                                <span v-else="editAssign">
                                    {{selected_assignment.assignment_due_date }}
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <span v-if="editAssign">
                                    <input type="text" style="width:100%" v-model="selected_assignment.assignment_description" name="assigndesc" placeholder="Enter Assignment Description" />
                                </span>
                                <span v-else="editAssign">
                                    {{selected_assignment.assignment_description }}
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <span v-if="editAssign">
                                    <textarea style="width:100%" v-model="selected_assignment.assignment_content" name="assigncont" placeholder="Enter Assignment Content" ></textarea>
                                </span>
                                <span v-else="editAssign">
                                   <span v-html="selected_assignment.assignment_content"></span>
                                </span>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>




    export default {
        props: [ 'teacher', 'course', 'students', 'adminuser', 'assign'],

        data(){


            return {
                studentlist         : this.students,
                instructor          : this.teacher,
                theclass            : this.course,
                admin               : this.adminuser,
                assignments         : this.assign,
                selected_assignment : false,
                assignment_closed   : true,
                editAssign          : false,
                csrf                : "" ,

            }
        },

        methods:
            {
                get_selected_assign(index)
                {
                    this.selected_assignment = this.assignments[index];
                    this.show_selected_assignment();
                },

                show_selected_assignment()
                {
                    this.assignment_closed = false;
                },
                hide_selected_assignment()
                {
                    this.assignment_closed = true;
                    this.editAssign = false;
                },
                editAssignment()
                {
                    this.editAssign = true;
                },
                deleteAssignment()
                {
                    document.getElementById("assignment-delete-form").submit();
                },
                stopEditing()
                {
                  this.editAssign = false;
                },
                submitAssignment()
                {
                    document.getElementById("assignment-update-form").submit();
                },
            },
        mounted() {
            this.csrf = window.Laravel.csrfToken
        },
    }
</script>