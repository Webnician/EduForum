<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Class Schedule</div>

                    <div class="panel-body">
                        At a time when the schedule system is in place, its home shall be here
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