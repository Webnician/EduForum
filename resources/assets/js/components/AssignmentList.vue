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
                            <h4 ><span style="margin-left: 10%">Assignment</span>
                                <button style="float: right; color:#665; margin-right: 2%" @click="hide_selected_assignment()">
                                    X
                                </button>
                            </h4>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <h5>{{selected_assignment.assignment_name }}</h5>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                Opens : <br/>
                                {{selected_assignment.assignment_open_date }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                Due : <br/>
                                {{selected_assignment.assignment_due_date }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                {{selected_assignment.assignment_description }}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div v-html="selected_assignment.assignment_content"></div>
                            </div>
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
                },
            },
    }
</script>