<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 join-inst-div-root">
                <div class="panel panel-default">
                    <div class="panel-heading">Request to Join Institution</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="(institution, index) in institutions"><span class="inst-join-name">{{ institution.institution_name }}</span>
                                <span class="inst-join-location">{{ institution.contact_info[0].contact_city }}, {{ institution.contact_info[0].contact_state }}</span>
                                <form style="display: inline;" action="/join/request" method="post">
                                    <input type="hidden" name="institution" :value="institution.id"/>
                                    <input type="hidden" name="user" :value="theuser.id"/>
                                    <input type="hidden" name="_token" :value="csrf">
                                <button v-bind:class="getClasses(institution, index)" :disabled="getButtonStatus(institution)" >
                                    <span v-if="getText(institution, index) == 'pending' ">Request Pending</span>
                                    <span v-if="getText(institution, index) == 'denied' ">Request Denied</span>
                                    <span v-if="getText(institution, index) == 'accepted' ">Accepted !</span>
                                    <span v-if="getText(institution, index) == 'standard' ">Request to Join</span>
                                </button>
                                </form>
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

        props: ['user', 'institutionlist', 'joinrequests'],

        data(){
            return {
                theuser         : this.user,
                institutions    : this.institutionlist,
                join_requests   : this.joinrequests,
                joinbut         : ['right request-button'],
                deniedbut       : ['right request-button request-denied-button'],
                pendbut         : ['right request-button request-pending-button'],
                acceptedbut     : ['right request-button request-accepted-button'],
                csrf            : "",

            }
        },

        methods:
            {
                getClasses: function(inst, index)
                {
                    if (inst.request)
                    {
                     switch (inst.request.request_status)
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

                getText : function(inst,index)
                {

                    if (inst.request)
                    {
                        switch (inst.request.request_status)
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
                getButtonStatus(inst)
                {
                    if (inst.request)
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
            this.csrf = window.Laravel.csrfToken
        }
    }
</script>