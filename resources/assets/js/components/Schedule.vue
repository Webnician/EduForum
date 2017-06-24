<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Schedule Component<span style="float: right"><a href="#"><span style="margin-right: 2%"></span>   <i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></span></div>

                    <div class="panel-body">

                        <ul>
                            <li v-on:click="get_selected_item(index)" v-for="(item, index) in schedule_items"><a>{{ item.type }}</a><span style="float: right">{{ item.event_date_time }}</span> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <modal name="schedule-modal" id="schedule-modal"
                   @closed="modalHide('schedule-modal')"
                   :height="500"
                   classes="scheduling-modal"
                   :adaptive=true
            >
                <div class="container modal-content" style="height:100%">
                    <div class="col-lg-12 col-md-12 col-sm-12 modal-head" style="background-color: #8da8c5; color:#fff; margin-top: 3%; margin-bottom:3%;">
                    <h3 >Schedule Item
                        <button style="float: right; color:#665" @click="modalHide('schedule-modal')">
                            X
                        </button>
                    </h3>
                    </div>
                    <form action="/schedule/update" method="post" id="scheduleUpdateForm">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="actions" value="update">
                    <input v-if="editing" type="text" v-model="selected_schedule_item.type" name="type">
                        <h4 v-else="editing">{{ selected_schedule_item.type }}</h4>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                            <h5>Scheduled Time</h5>
                            Start :
                            <input v-if="editing" type="datetime-local" v-model="selected_schedule_item.event_date_time" name="starttime">
                            <p v-else="editing">{{ selected_schedule_item.event_date_time }}</p>
                            End :
                            <input v-if="editing" type="datetime-local" v-model="selected_schedule_item.event_end_time" name="endtime">
                            <p v-else="editing">{{ selected_schedule_item.event_end_time }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5>Description</h5>
                            <input style="width:100%" v-if="editing" type="text" v-model="selected_schedule_item.description" name="description">
                            <p v-else="editing">{{ selected_schedule_item.description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div>
                                <h5>Course : </h5>
                                {{ selected_schedule_item.course_id }}
                            </div>
                            <div>
                                <h5>Institution : </h5>
                                {{ selected_schedule_item.institution_id }}
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>

                    </form >
                    <form action="/schedule/update" method="post" id="scheduleDeleteForm">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="actions" value="delete">
                        <input type="text" v-model="selected_schedule_item.id" name="itemid">
                    </form>
                    <div v-if=" selected_schedule_item.user_id == user.id ">
                        <div class="schedule-buttons" v-if="editing"
                             style=" display: block;margin-left: auto;margin-right: auto; text-align:center;">
                            <button  class="btn-info" type="button" style="display: inline-block" @click="submitForm">
                                Update Item
                            </button>
                            <button class="btn-info" style=" display: inline-block" type="button" @click="submitDelete">
                                Delete Item
                            </button>
                        </div>
                        <button v-else="editing"  class="btn-info" v-on:click="viewtoedit" style=" display: block;margin-left: auto;margin-right: auto" type="button">Edit Item</button>

                    </div>
                </div>
            </modal>
        </div>
    </div>


</template>

<script>

    import vmodal from 'vue-js-modal'

    Vue.use(vmodal);

    export default {
        props: [ 'schedule', 'theuser'],

        data(){


            return {
                schedule_items          : this.schedule,
                selected_schedule_item  : false,
                user                    : this.theuser,
                editing                 : false,
                csrf                    : "",

            }
        },
        methods: {
            modalShow () {
                this.$modal.show('schedule-modal');
            },
            modalHide () {
                this.$modal.hide('schedule-modal');
                this.editing = false;
            },
            get_selected_item(index)
            {
                this.selected_schedule_item = this.schedule_items[index];
                this.modalShow();
//                alert(index);
            },
            viewtoedit ()
            {
                this.editing = true;
            },
            submitForm ()
            {
                document.getElementById("scheduleUpdateForm").submit();
            },
            submitDelete ()
            {
                document.getElementById("scheduleDeleteForm").submit();
            }
        },
        mounted() {
            this.csrf = window.Laravel.csrfToken;

        }
    }
</script>
