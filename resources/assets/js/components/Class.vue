<template>


    <div class="container">
        <div class="row">
            <div class="panel panel-default" >
                <div class="panel-heading" v-model="theclass"><h3>{{ theclass.course_name }}</h3></div>

                <div class="panel-body">
                </div>
            </div>
        </div>


        <form action="/classpreferences/update" method="POST">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" v-for="(block, index) in theuiblock" :name="'block'+index"  v-model="block.title" />
        <button type="submit">Save Settings</button>
        </form>

        <div class="row theuserinterface" >
            <draggable v-model="theuiblock"  @start="drag=true" @end="drag=false">
                <!--<div v-for="(block, index) in theuiblock" :id="'position'+index" v-bind:class="{ mainContentArea: isMainArea(index)}" style="margin-top: 5%">-->
                <div v-for="(block, index) in theuiblock" :id="'position'+index" v-bind:class="getClasses(index)" style="margin-top: 5%">
                    <component v-bind:is="block.title" v-bind="theProps(block)" >
                        <!-- component changes when vm.currentView changes! -->
                    </component>
                </div>
            </draggable>
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
            ['students', 'teacher', 'course', 'blocks', 'user', 'adminuser'],

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
                        }
                    }
                    if (block.title === 'assignmentlist') {
                        return {
                            students: this.studentlist,
                            teacher : this.instructor,
                            course  : this.theclass,
                        }
                    }
                    if (block.title === 'classschedule') {
                        return {
                            students: this.studentlist,
                            teacher : this.instructor,
                            course  : this.theclass,
                        }
                    }
                    if (block.title === 'fileupload') {
                        return {
                            teacher     : this.instructor,
                            course      : this.theclass,
                            user        : this.currentuser,
                            adminuser   : this.admin,
                        }
                    }
                }

            },
        mounted() {
            this.csrf = window.Laravel.csrfToken;

        }
    }
</script>
