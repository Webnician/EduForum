<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">User List Component
                        <span v-if="admin"><a style="max-width:15%; display: inline-block;margin-left: 10%;margin-right: auto; text-align: center" class="request-button" v-model="institution" :href="'/join/institution/'+ institution.id" >Manage Join Requests</a></span>
                        <span style="float: right"> <a class="btn-info" style="display: block;margin-left: auto;margin-right: auto; text-align: center" href="/user">Create New User</a></span>
                    </div>

                    <div class="panel-body">
                        <h3 class="list-heading">Users</h3>
                        <ul style=" text-decoration: underline;">
                            <li v-for="user in userlist">
                                <a :href="'/user/'+ user.id" v-model="user.id">
                                    {{ user.id }} - {{ user.fname }} {{ user.lname }}</a>

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
            ['userlist', 'persadmins', 'inst' ],

        data(){
            return {
                institution     : this.inst,
                admin           : this.persadmins,
            }
        },

    }
</script>
