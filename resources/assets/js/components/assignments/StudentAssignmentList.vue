<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Assignments</div>

                    <div class="panel-body">
                        <h4 style="margin-bottom: 5%"><span style="float: left">{{ the_assign.assignment_name }}</span>
                            <span style="float: right">{{ the_assign.assignment_description}}</span> </h4>
                        <div class="row" style="border-top: 2px solid #000; padding-top: 2%" v-for="(assign, index) in assignments">
                            <div class="ctr-block center"><span>{{ assign.user.fname }} {{assign.user.lname }}</span><span style="margin-left: 3%">{{assign.user.email}}</span> </div>
                            <div v-html="assign.submission"></div>
                        </div>

                        <div class="row" style="text-align: center; margin-top: 3%">
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
        props: [ 'theuser' , 'thecourse', 'assign', 'assignm'],

        data(){


            return {
                user        : this.theuser ,
                course      : this.thecourse ,
                assignments : this.assign,
                the_assign  : this.assignm,
                csrf        : "" ,

            }
        },
        methods:
            {
            },
        mounted() {
            this.csrf = window.Laravel.csrfToken
        },
    }
</script>