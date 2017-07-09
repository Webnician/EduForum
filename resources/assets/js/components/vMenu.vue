<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Courses<span style="float: right"><a href="/join/course"><span style="margin-right: 2%"></span>   <i class="fa fa-plus-square" aria-hidden="true"></i></a></span></div>

                    <div class="panel-body">
                        <div class="empty-notif" v-if="courses.length == 0">Your Courses will show up here<br /><a class="empty-notif-link" href="#"> Register Now!</a></div>
                        <div  v-if="showcourses">
                            <h3>Registrations</h3>
                            <ul >
                                <li v-for="courses in mycourses" ><a :href="'class/' + courses.course_id" >{{courses.title}}</a></li>
                            </ul>
                        </div>
                        <div   v-if="showtaught">
                            <h3>Teaching</h3>
                            <ul >
                                <li v-for="courses in taught" ><a :href="'class/' + courses.id" >{{courses.course_name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props: [ 'courses', 'taughtcourses'],

        data(){


            return {
                mycourses   : this.courses,
                taught      : this.taughtcourses,
                csrf        : "",
                showcourses : true,
                showtaught  : true,

            }
        },
        methods:{
            showTaught: function(taught) {
                if(taught.length <= 0)
                {
                    this.showtaught = false;
                }
            },
            showCourses: function(mycourses)
            {
              if(mycourses.length <= 0)
              {
                  this.showcourses = false;
              }
            }

        },
        beforeMount(){
            this.showCourses(this.mycourses);
            this.showTaught(this.taught);
        },
        mounted() {

            console.log('Component mounted.')
        }
    }
</script>
