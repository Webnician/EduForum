<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact Component</div>

                    <div class="panel-body">

                        <ul>
                            <li v-for="(course, index) in contacts"><span class="contact-course-title">{{ course.name }}</span>
                                <ul>
                                    <li v-if="course.instructor_name"><span style="font-weight: bold;">Instructor : </span> {{ course.instructor_name }}
                                    <br />
                                        <span v-if="course.instructor_email" >
                                            <a :href="'mailto:' + course.instructor_email" v-model="course.instructor_email" >Contact</a>
                                        </span>
                                    </li>
                                    <li v-if="currentuser.id != user.id" v-for="(user, index) in course">
                                        <!--{{ user.fname}} {{ user.lname }}-->
                                        <a :href="'/user/'+ user.id" v-model="user.id">
                                             {{ user.fname }} {{ user.lname }}</a>
                                        <span v-if="user.email" style="float: right">
                                            <a :href="'mailto:' + user.email" v-model="user.email">Contact</a>
                                        </span>
                                    </li>
                                </ul>
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
        props: [ 'user_contacts', 'theuser' ],

        data(){


            return {
                contacts        : this.user_contacts,
                currentuser     : this.theuser,


            }
        },
    }
</script>
