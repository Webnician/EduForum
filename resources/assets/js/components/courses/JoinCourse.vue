<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 join-inst-div-root">
                <div class="panel panel-default">
                    <div class="panel-heading">Join Courses</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="(course, index) in courses"><span class="inst-join-name">{{ course.course_name }}</span>
                                <span style="margin-left: 5%" class="course-join-dates">{{ course.course_start_date }} - {{ course.course_end_date }}</span>
                                <form style="display: inline;" action="/join/request/course" method="post">
                                    <input type="hidden" name="institution" :value="institution.id"/>
                                    <input type="hidden" name="user" :value="user.id"/>
                                    <input type="hidden" name="course" :value="course.id" />
                                    <input type="hidden" name="_token" :value="csrf">
                                    <button v-bind:class="getClasses(course, index)" :disabled="getButtonStatus(course)" >
                                        <span v-if="getText(course, index) == 'pending' ">Request Pending</span>
                                        <span v-if="getText(course, index) == 'denied' ">Request Denied</span>
                                        <span v-if="getText(course, index) == 'accepted' ">Accepted !</span>
                                        <span v-if="getText(course, index) == 'standard' ">Join Course</span>
                                    </button>
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

        props: ['usera', 'inst', 'coursesa', 'joinrequests'],

        data(){
            return {
                user         : this.usera,
                institution    : this.inst,
                join_requests   : this.joinrequests,
                courses         : this.coursesa,
                joinbut         : ['right request-button'],
                deniedbut       : ['right request-button request-denied-button'],
                pendbut         : ['right request-button request-pending-button'],
                acceptedbut     : ['right request-button request-accepted-button'],
                csrf            : "",

            }
        },

        methods:
            {
                getClasses: function(inst, index)
                {
                    if (inst.request)
                    {
                        switch (inst.request.request_status)
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

                getText : function(inst,index)
                {

                    if (inst.request)
                    {
                        switch (inst.request.request_status)
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
                getButtonStatus(inst)
                {
                    if (inst.request)
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