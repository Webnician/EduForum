<template>


    <div class="container">
        <div class="row">
            <div class="panel panel-default" >
                <div class="panel-heading" v-model="theclass"><h3>{{ theclass.course_name }}</h3></div>
            </div>
        </div>


        <form action="/classpreferences/update" method="POST">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" v-for="(block, index) in theuiblock" :name="'block'+index"  v-model="block.title" />
        <button class="btn-info" type="submit">Save Layout</button>
        </form>

        <div class="row theuserinterface full-screen-user-interface" >
            <draggable v-model="theuiblock"  @start="drag=true" @end="drag=false">
                <!--<div v-for="(block, index) in theuiblock" :id="'position'+index" v-bind:class="{ mainContentArea: isMainArea(index)}" style="margin-top: 5%">-->
                <div v-for="(block, index) in theuiblock" :id="'position'+index" v-bind:class="getClasses(index)" style="margin-top: 5%">
                    <component v-bind:is="block.title" v-bind="theProps(block)" >
                        <!-- component changes when vm.currentView changes! -->
                    </component>
                </div>
            </draggable>
        </div>
        <div class="row theuserinterface mobile-user-interface" >
            <div v-model="theuiblock"  >
                <!--<div v-for="(block, index) in theuiblock" :id="'position'+index" v-bind:class="{ mainContentArea: isMainArea(index)}" style="margin-top: 5%">-->
                <div v-for="(block, index) in theuiblock" :id="'position'+index" v-bind:class="getClasses(index)" style="margin-top: 5%">
                    <component v-bind:is="block.title" v-bind="theProps(block)" >
                        <!-- component changes when vm.currentView changes! -->
                    </component>
                </div>
            </div>
        </div>


    </div>

</template>

<script>
    import draggable from 'vuedraggable';



    var Home3 = {
        template: '<p>Welcome home3!</p>'
    };


    export default {
        props:
            ['students', 'teacher', 'course', 'blocks', 'user', 'adminuser', 'schedule', 'files', 'assign', 'a_student'],

        data(){


            return {
                csrf                    : "",
                theuiblock              : this.blocks,
                maincont                : 'mainContent',
                secondaryContentArray   : ['col-lg-3 col-md-3 col-sm-12', 'componentBlock'],
                mainContentArray        : ['col-lg-6 col-md-6 col-sm-12', 'mainComponentBlock'],
                studentlist             : this.students,
                theclass                : this.course,
                instructor              : this.teacher,
                admin                   : this.adminuser,
                currentuser             : this.user,
                schedule_items          : this.schedule,
                class_files             : this.files,
                assignments             : this.assign,
                is_student              : this.a_student,

            }
        },
        computed :
            {

            },
        components: {
            draggable,
        },
        methods:
            {
                isMainArea: function(index){
                    if (index === 1) {
                        return true
                    }
                },

                getClasses: function(index)
                {
                    if (index === 1) {
                       return this.mainContentArray;
                    }
                    else
                    {
                        return this.secondaryContentArray;
                    }
                },
                theProps: function(block){
                    if (block.title === 'classlist') {
                        return {
                            students: this.studentlist,
                            teacher : this.instructor,
                        }
                    }
                    if (block.title === 'classdocs') {
                        return {
                            students: this.studentlist,
                            teacher : this.instructor,
                            course  : this.theclass,
                            files   : this.class_files,
                            cur_stud: this.is_student,
                        }
                    }
                    if (block.title === 'assignmentlist') {
                        return {
                            students    : this.studentlist,
                            teacher     : this.instructor,
                            course      : this.theclass,
                            adminuser   : this.admin,
                            assign      : this.assignments,
                            cur_stud    : this.is_student,
                            theuser     : this.currentuser,
                        }
                    }
                    if (block.title === 'classschedule') {
                        return {
//                            students    : this.studentlist,
//                            teacher     : this.instructor,
                            thecourse   : this.theclass,
                            schedule    : this.schedule_items,
                            theuser     : this.currentuser,
                            anadmin     : this.admin,
                            cur_stud    : this.is_student,
                        }
                    }
                    if (block.title === 'fileupload') {
                        return {
                            teacher     : this.instructor,
                            course      : this.theclass,
                            user        : this.currentuser,
                            adminuser   : this.admin,
                            cur_stud    : this.is_student,
                        }
                    }
                }

            },
        mounted() {
            this.csrf = window.Laravel.csrfToken;



        }
    }
</script>
