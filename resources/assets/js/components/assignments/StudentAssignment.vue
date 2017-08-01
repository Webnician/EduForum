<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit Assignment</div>

                    <div class="panel-body">

                        <form id="assignment-insert-form" method="post" action="/assignment/student-insert">
                            <input type="hidden" name="user_id" :value="user.id">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="course_id" :value="course.id">
                            <input type="hidden" name="assignment_id" :value="assignment.id">
                            <input type="hidden" name="actions" value="insert">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    Assignment Title : <br/>
                                    <div>
                                        <h4>{{assignment.assignment_description}}</h4>
                                    </div>
                                    <div style="margin-top: 3%">
                                        Assignment : <br/>
                                        <div v-html="assignment.assignment_content" ></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="top-margin">
                                        Assignment open date : <br/>
                                        <div>{{assignment.assignment_open_date }}</div>
                                    </div>
                                    <div class="top-margin">
                                        Assignment due date : <br/>
                                        <div>{{assignment.assignment_due_date }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row top-margin">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    Assignment Submission : <br/>
                                    <textarea style="width:100%" name="assigncont" placeholder="Enter Assignment Content"></textarea>

                                </div>
                            </div>



                        </form>
                        <div class="row" style="text-align: center; margin-top: 3%">
                            <button v-on:click="submitAssignment()" style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-accepted-button">Submit Assignment</button>
                            <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-denied-button">
                                <a style="color: white" :href="'/class/'+ course.id">Back</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>




    export default {
        props: [ 'theuser' , 'thecourse', 'assign'],

        data(){


            return {
                user        : this.theuser ,
                course      : this.thecourse ,
                assignment  : this.assign,
                csrf        : "" ,

            }
        },
        methods:
            {
                submitAssignment: function()
                {
                    document.getElementById("assignment-insert-form").submit();
                },
            },
        mounted() {
            this.csrf = window.Laravel.csrfToken
        },
    }
</script>