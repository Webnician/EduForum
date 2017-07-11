<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 join-inst-div-root">
                <div class="panel panel-default">
                    <div class="panel-heading">Departments
                        <span style="margin-left: 5%">
                            <button class="btn-info">
                                <a style="color: linen" :href="'/institution/'+ institution.id ">Manage Insitution</a>
                            </button>
                        </span>
                        <span v-if="closed" style="float: right">
                            <a @click="show_dept_add()">
                                <span style="margin-right: 2%">
                                </span>
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </a>
                        </span>
                        <span v-else="closed" style="float: right">
                            <a @click="show_faculty_add()">
                                <span style="margin-right: 2%">
                                </span>
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>

                    <div class="panel-body">
                        <div v-if="closed" id="department-listing">
                        <ul>
                            <li v-for="(dept, index) in departments">
                                <form :id="'update-dept-'+ index" style="display: inline;" action="/departments/update" method="post">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="action" value="update"/>
                                    <input type="hidden" name="dept_name" :value="dept.department_name"/>
                                    <input type="hidden" name="dept_head_id" :value="dept.head.id"/>
                                    <input type="hidden" name="department_id" :value="dept.id"/>
                                    <input type="hidden" name="institution_id" :value="institution.id"/>
                                <div style="width: 20%; display: inline-block">
                                <input v-if="dept_editing" type="text" v-model="dept.department_name"/>
                                <span v-else="dept_editing" style="">{{ dept.department_name }}</span>
                                </div>
                                <span style="margin-left: 5%">
                                    <input v-if="dept_editing" type="text" v-model="dept.head.id"/>
                                    <a v-else="dept_editing" :href="'/user/'+ dept.head.id">{{ dept.head.fname }} {{ dept.head.lname }}</a>
                                </span>
                                </form>
                                <span  v-on:click="get_selected_item(index)" style="margin-left: 5%">
                                    Department Faculty
                                </span>
                                <div class="ctr-block top-margin center">
                                    <div v-if="dept_editing">
                                        <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" @click="submit_dept_edit(index)" class="request-accepted-button">Update Department</button>
                                        <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" @click="hide_dept_edit()" class="request-pending-button">Cancel</button>
                                    </div>

                                    <div v-else="dept_editing">
                                    <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" @click="show_dept_edit()" class="request-pending-button">Edit Department</button>
                                    <form style="display: inline;" action="/departments/update" method="post">
                                            <input type="hidden" name="_token" :value="csrf">
                                            <input type="hidden" name="action" value="delete"/>
                                            <input type="hidden" name="department_id" :value="dept.id"/>
                                            <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-denied-button">Remove Department</button>
                                    </form>
                                    </div>
                                </div>

                            </li>
                        </ul>
                        </div>
                        <div v-else="closed">
                            <h4 style="margin-bottom: 3%">Faculty
                                <button style="float: right; color:#665" @click="itemHide()">
                                    X
                                </button>
                            </h4>
                            <ul>
                                <li v-for="(fac, index) in selected_department.users">
                                    <span>
                                        <a :href="'/user/'+ fac.id">
                                        {{ fac.fname }} {{ fac.lname }}
                                        </a>
                                    </span>
                                    <span style="float: right">

                                        <form style="display: inline;" action="/departments/faculty/update" method="post">

                                            <input type="hidden" name="user" :value="fac.id"/>
                                            <input type="hidden" name="_token" :value="csrf">
                                            <input type="hidden" name="action" value="delete"/>
                                            <input type="hidden" name="user_dept_id" :value="fac.dept_record.id">
                                            <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-denied-button">Remove from Department</button>
                                        </form>
                                    </span>

                                </li>
                            </ul>
                            <div>
                                <form style="display: inline;" action="/departments/faculty/update" method="post">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="action" value="insert"/>
                                    <input type="hidden" name="dept_id" :value="selected_department.id"/>
                                    <input type="text" name="user_id" placeholder="User Id"/>
                                    <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-pending-button">Add to Department</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div v-if="dept_add_form" class="panel panel-default">
                    <div class="panel-heading">
                        Add New Department
                        <button style="float: right; color:#665" @click="hide_dept_add()">
                            X
                        </button>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/departments/update">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="institution_id" :value="institution.id"/>
                            <input type="hidden" name="action" value="insert"/>
                            <input type="text" name="dept_name" placeholder="Department Name"/>
                            <input type="text" name="dept_head_id" placeholder="Department Head Id"/>
                            <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="btn-info">Add Department</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props: ['user', 'depts', 'inst'],

        data(){
            return {
                theuser                 : this.user,
                departments             : this.depts,
                csrf                    : "",
                selected_department     : false,
                closed                  : true,
                creating                : false,
                editing                 : false,
                existingopen            : false,
                institution             : this.inst,
                dept_add_form           : false,
                dept_editing            : false,
                faculty_add_form        : false,


            }
        },

        methods:
            {

                itemShow (index) {
//                this.$modal.show('class-schedule-item');
                    this.existingopen = true;
                    this.closed = false;

                },
                itemHide () {
//                this.$modal.hide('class-schedule-modal');
                    this.existingopen = false;
                    this.editing = false;
                    this.creating = false;
                    this.closed = true;
                },
                get_selected_item(index)
                {
                    this.selected_department = this.departments[index];
                    this.itemShow(index);
//                alert(index);
                },
                show_dept_add()
                {
                    this.dept_add_form = true;
                },

                hide_dept_add()
                {
                    this.dept_add_form = false;
                },
                show_dept_edit()
                {
                    this.dept_editing = true;
                },
                hide_dept_edit()
                {
                    this.dept_editing = false;
                },
                submit_dept_edit(index)
                {
                    document.getElementById("update-dept-"+ index).submit();
                },
                show_faculty_add()
                {
                    this.faculty_add_form = true;
                },
                hide_faculty_add()
                {
                    this.faculty_add_form = false;
                },

            },

        mounted() {
            this.csrf = window.Laravel.csrfToken
        }
    }
</script>