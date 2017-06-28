<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Class Schedule<span style="float: right" v-if="admin">
                        <a @click="clickToCreateItem()"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></span></div>

                    <div class="panel-body">
                        <!--<div v-if="creating">-->
                            <!--<form action="/schedule/update" method="post" id="scheduleUpdateForm">-->
                                <!--<input type="hidden" name="_token" :value="csrf">-->
                                <!--<input type="hidden" name="actions" value="insert">-->
                                <!--<input type="hidden" name="courseid" :value="theclass.id">-->
                                <!--<input type="hidden" name="userid" :value="user.id">-->
                                <!--<h4><input type="text" name="type" placeholder="Type / Title">-->
                                    <!--<button style="float: right; color:#665" @click="clickToExitCreate()">-->
                                        <!--X-->
                                    <!--</button>-->
                                <!--</h4>-->
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12 ">-->
                                        <!--Start :<input type="datetime-local" name="starttime">-->
                                        <!--End : <input type="datetime-local" name="endtime">-->
                                    <!--</div>-->
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12 ">-->
                                        <!--<input type="text" name="location" placeholder="Location">-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                    <!--<textarea name="description" placeholder="Description"></textarea>-->
                                <!--</div>-->
                            <!--</form>-->
                        <!--</div>-->

                        <div class="class-item-list" v-if="closed">
                            <ul>
                                <li v-on:click="get_selected_item(index)" v-for="(item, index) in schedule_items">
                                    <a>{{ item.type }}</a><span style="float: right">{{ item.event_date_time }}</span>
                                </li>
                            </ul>
                        </div>
                        <div v-else="closed" id="class-schedule-item">
                            <div class="container " style="height:100%">
                                <div class="col-lg-12 col-md-12 col-sm-12 " style=" margin-top: 3%; margin-bottom:3%;">
                                    <h4 >Schedule Item
                                        <button style="float: right; color:#665" @click="itemHide()">
                                            X
                                        </button>
                                    </h4>
                                    <form style="color: #665;" action="/schedule/update" method="post" id="scheduleDeleteForm">
                                        <input type="hidden" name="_token" :value="csrf">
                                        <input type="hidden" name="actions" value="delete">
                                        <input type="hidden" name="courseid" :value="theclass.id">
                                        <input type="hidden" name="userid" :value="user.id">
                                        <input type="hidden" name="itemid" :value="selected_schedule_item.id">
                                    </form>
                                    <form style="color: #665; padding-bottom:2%;" action="/schedule/update" method="post" id="scheduleUpdateForm">
                                        <input type="hidden" name="_token" :value="csrf">
                                        <input type="hidden" name="actions" :value="submitaction">
                                        <input type="hidden" name="courseid" :value="theclass.id">
                                        <input type="hidden" name="userid" :value="user.id">
                                        <input type="hidden" name="itemid" :value="selected_schedule_item.id">
                                        <h4>
                                            <input class="ctr-block" v-if="editing" type="text" name="type" v-model="selected_schedule_item.type" placeholder="Type / Title">
                                            <span v-else="editing">{{ selected_schedule_item.type }}</span>
                                        </h4>
                                        <div class="row">
                                            Start :
                                                <input class="ctr-block" v-bind="selected_schedule_item.event_date_time" v-if="editing" v-model="selected_schedule_item.event_date_time" type="datetime-local" name="starttime">
                                                <span v-else="editing">{{ selected_schedule_item.event_date_time }}</span>
                                        </div>
                                        <div class="row">
                                            End :
                                            <input  class="ctr-block" v-if="editing" v-model="selected_schedule_item.event_end_time" type="datetime-local" name="endtime">
                                            <span v-else="editing">{{ selected_schedule_item.event_end_time }}</span>
                                        </div>
                                        <div class="row">
                                            Location :
                                            <input class="ctr-block" v-if="editing" type="text" v-model="selected_schedule_item.location" name="location" placeholder="Location">
                                            <span v-else="editing">{{ selected_schedule_item.location }}</span>
                                        </div>
                                        <div class="row">
                                            Description :
                                            <textarea class="ctr-block" v-if="editing" name="description" v-model="selected_schedule_item.description" placeholder="Description"></textarea>
                                            <span v-else="editing">{{selected_schedule_item.description }}</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="admin">
                            <div style=" " v-if="existingopen" class="col-lg-12 col-md-12 col-sm-12 ">
                                <div style=" " v-if="editing" class="col-lg-12 col-md-12 col-sm-12 ">
                                    <button @click="submitForm()" class="btn-info ctr-block"
                                            style="display:inline-block; ">Update Item
                                    </button>
                                </div>
                                <div style=" " v-else="editing" class="col-lg-12 col-md-12 col-sm-12 ">
                                    <button @click="editItem()" class="btn-info ctr-block"
                                            style="display:inline-block; ">Edit Item
                                    </button>
                                    <button @click="submitDelete()" class="btn-info ctr-block"
                                            style="display:inline-block; ">Delete Item
                                    </button>
                                </div>
                            </div>
                            <div v-if="creating" class="col-lg-12 col-md-12 col-sm-12 ">
                                <button @click="submitForm()"  class="btn-info ctr-block" style="display:inline-block; ">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>



</template>

<script>


    import vmodal from 'vue-js-modal'

    Vue.use(vmodal);

    export default {
        props: [ 'theuser', 'thecourse', 'schedule', 'anadmin'],

        data(){


            return {
                user                    : this.theuser,
                theclass                : this.thecourse,
                schedule_items          : this.schedule,
                csrf                    : "",
                selected_schedule_item  : false,
                closed                  : true,
                admin                   : this.anadmin,
                creating                : false,
                editing                 : false,
                existingopen            : false,
                submitaction            : "insert"

            }
        },

        methods: {

            itemShow () {
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
                this.selected_schedule_item = this.schedule_items[index];
                this.itemShow();
//                alert(index);
            },
            clickToCreateItem ()
            {
              this.creating = true;
              this.selected_schedule_item = false;
              this.editing = true;
                this.closed = false;
                this.submitaction = 'insert'
            },
            clickToExitCreate ()
            {

              this.creating = false;
            },
            editItem ()
            {
                this.submitaction = 'update'
                this.editing =true;
            },
            submitForm ()
            {
                document.getElementById("scheduleUpdateForm").submit();
            },
            submitDelete ()
            {
                document.getElementById("scheduleDeleteForm").submit();
            },


        },

        mounted() {
            this.csrf = window.Laravel.csrfToken;

        }
    }
</script>