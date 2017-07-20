<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Assignments</div>

                    <div class="panel-body">
                        <div >Assignment</div>
                        <form id="assignment-insert-form" method="post" action="/assignment/insert">
                            <input type="hidden" name="user_id" :value="user.id">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="course_id" :value="course.id">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    Assignment Type : <br/>
                                    <div>
                                        <select name="assigntype">
                                            <option value="regular">Regular Assignment</option>
                                            <option value="quiz">Quiz</option>
                                        </select>
                                    </div>
                                    <div style="margin-top: 3%">
                                        Assignment Name : <br/>
                                        <input style="width: 100%" type="text" name="assignname" placeholder="Enter assignment Name"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div>
                                        Assignment Description : <br/>
                                        <input type="text" style="width:100%" name="assigndesc" placeholder="Enter Assignment Description"></input>
                                    </div>
                                    <div class="top-margin">
                                        Assignment open date : <br/>
                                        <input type="datetime-local" name="open_date"/>
                                    </div>
                                    <div class="top-margin">
                                        Assignment due date : <br/>
                                        <input type="datetime-local" name="end_date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row top-margin">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    Assignment Content : <br/>
                                    <textarea style="width:100%" name="assigncont" placeholder="Enter Assignment Content"></textarea>

                                </div>
                            </div>



                        </form>
                        <div class="row" style="text-align: center; margin-top: 3%">
                            <button v-on:click="submitAssignment()" style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-accepted-button">Add Assignment</button>
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
        props: [ 'theuser' , 'thecourse'],

        data(){


            return {
                user        : this.theuser ,
                course      : this.thecourse ,
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