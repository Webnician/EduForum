<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Assignment</div>

                    <div class="panel-body">
                        <div >Assignment</div>


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