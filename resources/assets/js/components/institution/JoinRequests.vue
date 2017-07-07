<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 inst-requests-div-root">
                <div class="panel panel-default">
                    <div class="panel-heading">Join Requests</div>

                    <div class="panel-body">
                    <ul>
                        <li v-for="(req, index) in requests">
                            <span>{{ req.theuser.fname }} {{req.theuser.lname}}</span>
                            <span style="margin-left: 5%">{{ req.theuser.email }}</span>
                            <span style="padding:.5%; margin-left: 5%" v-bind:class="getClasses(req, index)" :disabled="getButtonStatus(req)" >
                                <span v-if="getText(req, index) == 'pending' ">Status : Pending</span>
                                <span v-if="getText(req, index) == 'denied' ">Status : Denied</span>
                                <span v-if="getText(req, index) == 'accepted' ">Status : Accepted</span>
                                <span v-if="getText(req, index) == 'standard' ">Status : None</span>
                            </span>
                            <span style="float: right">
                                <form style="display: inline;" action="/join/request/update" method="post">
                                    <input type="hidden" name="institution" :value="institution.id"/>
                                    <input type="hidden" name="user" :value="theuser.id"/>
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="newstatus" value="accepted"/>
                                    <input type="hidden" name="request_id" :value="req.id" />
                                    <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-accepted-button">Accept</button>
                                </form>
                                <form style="display: inline;" action="/join/request/update" method="post">
                                    <input type="hidden" name="institution" :value="institution.id"/>
                                    <input type="hidden" name="user" :value="theuser.id"/>
                                    <input type="hidden" name="_token" :value="csrf">
                                    <input type="hidden" name="newstatus" value="denied"/>
                                    <input type="hidden" name="request_id" :value="req.id" />
                                    <button style="color: white; text-shadow: #000 1px 1px 1px 1px;" class="request-denied-button">Deny</button>
                                </form>


                            </span>
                        </li>
                    </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props:
            ['user', 'inst', 'joinrequests'],

        data(){


            return {
                csrf                    : "",
                theuser                 : this.user,
                institution             : this.inst,
                requests                : this.joinrequests,
                joinbut         : [' request-button'],
                deniedbut       : [' request-button request-denied-button'],
                pendbut         : [' request-button request-pending-button'],
                acceptedbut     : [' request-button request-accepted-button'],

            }
        },

        methods:
            {
                getClasses: function(request, index)
                {
                    if (request.request_status)
                    {
                        switch (request.request_status)
                        {
                            case 'pending':
                                return this.pendbut;
                                break;
                            case 'denied':
                                return this.deniedbut;
                                break;
                            case 'accepted':
                                return this.acceptedbut;
                                break;
                            default :
                                return this.joinbut;
                                break;
                        }
                    }
                    else
                    {
                        return this.joinbut;
                    }
                },

                getText : function(request,index)
                {

                    if (request.request_status)
                    {
                        switch (request.request_status)
                        {
                            case 'pending':
                                return 'pending';
                                break;
                            case 'denied':
                                return 'denied';
                                break;
                            case 'accepted':
                                return 'accepted';
                                break;
                            default :
                                return 'standard';
                                break;
                        }
                    }
                    else
                    {
                        return 'standard';
                    }
                },
                getButtonStatus(request)
                {
                    if (request.request_status)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            },

        mounted() {
            this.csrf = window.Laravel.csrfToken;

        }
    }
</script>