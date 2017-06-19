<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Class Documents</div>

                    <div class="panel-body">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Learning to Learn - LI1104</a></li>
                        <li><a href="#">Introduction to IS - CS102</a></li>
                        <li><a href="#">Algebra 1 - MATH100</a></li>
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
