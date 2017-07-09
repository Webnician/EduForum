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
                        <h3 v-if="requests.length != 0">Join Requests</h3>
                        <ul>
                            <li v-for="(req, index) in requests">{{ req.theuser.fname }} {{ req.theuser.lname }}
                            <span style="margin-left: 5%">{{ req.theuser.email }}</span>

                                <span style="margin-left: 5%">
                                    <input type="hidden" name="user" :value="req.theuser.id"/>
                                    <input type="hidden" name="course" :value="thecourse" />
                                    <input type="hidden" name="_token" :value="csrf">
                                    <button v-bind:class="getClasses(req, index)" :disabled="getButtonStatus(req)" >
                                        <span v-if="getText(req, index) == 'pending' ">Request Pending</span>
                                        <span v-if="getText(req, index) == 'denied' ">Request Denied</span>
                                        <span v-if="getText(req, index) == 'accepted' ">Accepted !</span>
                                        <span v-if="getText(req, index) == 'standard' ">Request Cancelled</span>
                                    </button>
                                </span>
                                <span style="float: right">
                                <form style="display: inline;" action="/join/request/course/update" method="post">

                                    <input type="hidden" name="user" :value="req.theuser.id"/>
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="newstatus" value="accepted"/>
                                    <input type="hidden" name="request_id" :value="req.id"/>
                                    <input type="hidden" name="course_id" :value="thecourse"/>
                                    <button style="color: white; text-shadow: #000 1px 1px 1px 1px;"
                                            class="request-accepted-button">Accept</button>
                                </form>
                                <form style="display: inline;" action="/join/request/course/update" method="post">

                                    <input type="hidden" name="user" :value="req.theuser.id"/>
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="newstatus" value="denied"/>
                                    <input type="hidden" name="request_id" :value="req.id"/>
                                    <input type="hidden" name="course_id" :value="thecourse"/>
                                    <button style="color: white; text-shadow: #000 1px 1px 1px 1px;"
                                            class="request-denied-button">Deny</button>
                                </form>


                            </span>
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
            ['studentlist', 'course', 'join_requests'],
        data(){
            return {
                csrf        : "",
                requests    : this.join_requests,
                thecourse   : this.course,
                joinbut         : ['request-button'],
                deniedbut       : ['request-button request-denied-button'],
                pendbut         : ['request-button request-pending-button'],
                acceptedbut     : ['request-button request-accepted-button'],
            }
        },

        methods:
            {
                getClasses: function(req, index)
                {
                    if (req)
                    {
                        switch (req.request_status)
                        {
                            case 'pending':
                                return this.pendbut;
                                break;
                            case 'denied':
                                return this.deniedbut;
                                break;
                            case 'accepted':
                                return this.acceptedbut;
                                break;
                            default :
                                return this.joinbut;
                                break;
                        }
                    }
                    else
                    {
                        return this.joinbut;
                    }
                },

                getText : function(req,index)
                {

                    if (req)
                    {
                        switch (req.request_status)
                        {
                            case 'pending':
                                return 'pending';
                                break;
                            case 'denied':
                                return 'denied';
                                break;
                            case 'accepted':
                                return 'accepted';
                                break;
                            default :
                                return 'standard';
                                break;
                        }
                    }
                    else
                    {
                        return 'standard';
                    }
                },
                getButtonStatus(req)
                {
                    if (req)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            },

        mounted() {
            this.csrf = window.Laravel.csrfToken

        }




    }
</script>
