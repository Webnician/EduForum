<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Class List</div>

                    <div class="panel-body">
                        <div v-model="instructor">Instructor<br/>{{ instructor.fname }}</div>
                        <ul>
                            <li v-for="student in studentlist">{{ student.student.fname }}</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>




    export default {
        props: [ 'teacher', 'course', 'blocks', 'students'],

        data(){


            return {
                studentlist: this.students,
                instructor: this.teacher,

            }
        },
    }
</script>