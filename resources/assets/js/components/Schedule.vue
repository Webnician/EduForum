<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Schedule Component<span style="float: right"><a href="#"><span style="margin-right: 2%"></span>   <i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></span></div>

                    <div class="panel-body">

                        <ul>
                            <li v-for="item in schedule_items"><a>{{ item.type }}</a><span style="float: right">{{ item.event_date_time }}</span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        props: [ 'schedule', 'theuser'],

        data(){


            return {
               schedule_items   : this.schedule,
                user            : this.theuser,

            }
        },
    }
</script>
