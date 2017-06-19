<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Assignment List</div>

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
        props: [ 'teacher', 'course', 'students'],

        data(){


            return {
                studentlist: this.students,
                instructor: this.teacher,
                theclass : this.course,

            }
        },
    }
</script>