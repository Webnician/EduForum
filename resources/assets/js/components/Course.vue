<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <form method="POST" v-bind:action="action">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="id" :value="id">
                        <input type="hidden" name="actions" v-model="oper">


                        <div class="panel-body">


                            <div class="row left-margin">
                                <div class="col-lg-6 col-sm-12 ">
                                    <h3>Course Information</h3>
                                    <div class="row">
                                        <span class="left-margin">Course Name : {{  name }}</span><br/>
                                        <input v-if="allowedit"  name="name" style="width:100%" v-model="name" placeholder="Change Course Name"/>
                                    </div>
                                    <div class="row top-margin">
                                        <span class="left-margin">Course Department : {{  course_department }}</span><br/>
                                        <input v-if="allowedit"  name="department_id" style="width:100%" v-model="course_department" placeholder="Change Department Id"/>
                                    </div>
                                    <div class="row top-margin">
                                        <span class="left-margin">Course Rating : {{  course_score }}</span><br/>
                                        <input v-if="allowedit"  name="course_score" style="width:100%" v-model="course_score" placeholder="Course Score" readonly/>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <h3>Instructor Information</h3>
                                    <div class="row top-margin">

                                        <span class="left-margin">Instructor : {{ teacherfirstname }} {{ teacherlastname }} </span>
                                        <span v-if="editor" style="margin-left: 10%">
                                             <a class="btn-secondary btn-primary" :href="'/user/'+ teacherident" v-model="teacherident">
                                            View Instructor </a>
                                        </span>
                                        <div class="col-lg-12 col-sm-12 ">
                                            <input v-if="allowedit"  name="teacherid" style="width:100%" v-model="teacherident" placeholder="Change Teacher Id"/>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row top-margin">

                                <div class="col-lg-12 col-sm-12 ">
                                    <span>Description : </span><br/>
                                    <textarea name="description" style="width: 100%; height:100px" v-model="description" placeholder="Description"/>
                                </div>
                            </div>


                        </div>
                        <div class="row" style="margin-top: 3%">
                            <button  v-if="allowedit" class="btn-info" style=" display: block;margin-left: auto;margin-right: auto" type="submit">{{ buttontext }}</button>


                        </div>
                    </form>
                    <form v-if="editor" style="margin-top: 1%" method="POST" v-bind:action="action">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="id" :value="id">
                        <input type="hidden" name="actions" value="delete">
                        <button  class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">Delete Course</button>
                    </form>
                    <button  v-if="viewing" class="btn-info" v-on:click="viewtoedit" style=" display: block;margin-left: auto;margin-right: auto" type="button">{{ buttontext }}</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

//        buttxt = "{{ $course['buttxt'] }}" operation = "{{ $course['operation'] }}" actions = "{{ $course['actions'] }}"
//    :editmode = "{{ $course['editmode'] }}" viewer = "{{ $course['viewer'] }}" toedit = "{{ $course['toedit'] }}" creator = "{{ $course['creator'] }}"
//    id = "{{ $course['id'] }}" course_name = "{{ $course['course_name'] }}" teacher_id="{{ $course['teacher_id'] }}" teacherfname = "{{ $course['teacherfname'] }}"
//    teacherlname = "{{ $course['teacherlname'] }}" score = " {{ $course['score'] }}" department_id = " {{ $course['department_id'] }}"
        props:
            ['buttxt', 'operation', 'actions', 'editmode', 'viewer', 'toedit', 'creator', 'ids', 'course_name', 'teacher_id', 'teacherfname', 'teacherlname', 'score', 'deparmtent_id', 'desc'],

        data(){
            return {
                csrf: "",
                id : this.ids,
                name : this.course_name,
                teacherfirstname : this.teacherfname,
                teacherlastname : this.teacherlname,
                teacherident : this.teacher_id,
                course_score : this.score,
                course_department : this.department_id,
                description : this.desc,
                action : this.actions,
                allowedit : this.toedit,
                creating : this.creator,
                buttontext : this.buttxt,
                oper : this.operation,
                viewing : this.viewer,
                editor : this.editmode
//                id: institutionlist.id
//                id: this.ids,
//                link: this.inst.id
            }
        },
        methods:
            {
                viewtoedit: function()
                {
                    this.allowedit = true;
                    this.viewing = false;
                    this.editor = true;
                    this.action = '/course/update';
                    this.oper = 'update';
                    this.buttontext = 'Update Course';
                }

            },
        mounted() {
            this.csrf = window.Laravel.csrfToken
            console.log('Component mounted.')
        }
    }
</script>
