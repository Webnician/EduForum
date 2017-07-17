<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Assignment List <span v-if="admin" style="float: right"><a href="/assignment/add"><span style="margin-right: 2%"></span>   <i class="fa fa-plus-square" aria-hidden="true"></i></a></span></div>

                    <div class="panel-body">
                        At some point in the near future when the assignment system is in place. Here there shall reside, assignments
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>




    export default {
        props: [ 'teacher', 'course', 'students', 'adminuser'],

        data(){


            return {
                studentlist : this.students,
                instructor  : this.teacher,
                theclass    : this.course,
                admin       : this.adminuser,

            }
        },
    }
</script>