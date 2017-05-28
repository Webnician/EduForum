<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <form method="POST" v-bind:action="action">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="id" :value="id">
                        <input type="hidden" name="actions" v-model="oper">

                    <div class="panel-heading" > <input  name="name" style="width:100%" v-model="name" placeholder="Change School Name"/></div>

                    <div class="panel-body">


                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                 <div class="col-lg-12 col-sm-12">
                                      <img style="display: block;margin-left: auto;margin-right: auto" :src="logo" />
                                </div>
                                 <div class="col-lg-12 col-sm-12">
                                     <!--<span  v-if="seen">Avatar Src : {{ avatar }}</span><br/>-->
                                    <input v-if="allowedit" class="top-margin"  name="logo" style="width:100%" v-model="logo" placeholder="Change Logo Src"/>
                                 </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row">
                                    <span>Website : {{ website }}</span><br/>
                                    <div class="col-lg-12 col-sm-12">
                                        <input v-if="allowedit"  name="website" style="width:100%" v-model="website" placeholder="Change Website"/>
                                    </div>
                                </div>
                                <div class="row top-margin">
                                    <span>System : {{ system }}</span><br/>
                                    <div class="col-lg-12 col-sm-12 ">
                                        <input v-if="allowedit"  name="system" style="width:100%" v-model="system" placeholder="Change System"/>
                                    </div>
                                </div>
                                <div class="row top-margin">
                                    <span>Ipeds Id : {{ ipeds }}</span><br/>
                                    <div class="col-lg-12 col-sm-12 ">
                                        <input v-if="allowedit"  name="ipeds" style="width:100%" v-model="ipeds" placeholder="Change Ipeds Id"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row top-margin">
                            <span>Admin : {{  adminfirstname }} {{ adminlastname }}</span><br/>
                            <div class="col-lg-12 col-sm-12 ">

                                <input v-if="allowedit"  name="adminid" style="width:100%" v-model="adminident" placeholder="Change Admin Id"/>
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
                    <form v-if="allowedit" style="margin-top: 1%" method="POST" v-bind:action="action">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="id" :value="id">
                        <input type="hidden" name="actions" value="delete">
                        <button  class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">Delete User</button>
                    </form>
                    <button  v-if="viewing" class="btn-info" v-on:click="viewtoedit" style=" display: block;margin-left: auto;margin-right: auto" type="button">{{ buttontext }}</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props:
            ['viewer', 'operation', 'buttxt', 'creator', 'actions', 'toedit', 'institutiondescription', 'institutionid', 'institutionlogo', 'institutionname', 'institutionwebsite', 'institutionipedsid', 'institutionsystem', 'adminfname', 'adminlname', 'adminid'],

        data(){
            return {
                csrf: "",
                id : this.institutionid,
                logo: this.institutionlogo,
                name : this.institutionname,
                system : this.institutionsystem,
                website : this.institutionwebsite,
                ipeds : this.institutionipedsid,
                description : this.institutiondescription,
                adminfirstname : this.adminfname,
                adminlastname : this.adminlname,
                adminident : this.adminid,
                action : this.actions,
                allowedit : this.toedit,
                creating : this.creator,
                buttontext : this.buttxt,
                oper : this.operation,
                viewing : this.viewer
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
                 this.action = '/institution/update';
                 this.oper = 'update';
                 this.buttontext = 'Update Institution';
                }

            },
        mounted() {
            this.csrf = window.Laravel.csrfToken
            console.log('Component mounted.')
        }
    }
</script>
