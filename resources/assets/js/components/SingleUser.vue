<template>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>

                    <div class="panel-body">
                        <form method="POST" v-bind:action="action" >
                            <!--action="/user/update"-->
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="actions" v-model="oper">
                            <input type="hidden" name="id" :value="id">
                            <!--{{ csrf_field() }}-->

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="col-lg-12 col-sm-12">
                                        <img style="display: block;margin-left: auto;margin-right: auto" :src="avatar" />
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <!--<span  v-if="seen">Avatar Src : {{ avatar }}</span><br/>-->
                                        <input class="top-margin"  v-if="editor" name="avatar" style="width:100%" v-model="avatar" placeholder="Change Avatar Src"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="col-lg-6 col-sm-12">
                                        <span>First Name : {{ fname }}</span><br/>
                                        <input v-if="editor"  name="fname" v-model="fname" placeholder="Change First Name"/>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <span>Last Name : {{ lname }}</span><br/>
                                        <input  v-if="editor" name="lname" v-model="lname" placeholder="Change Last Name"/>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 top-margin">
                                        <span>Email : {{ email }}</span><br/>
                                        <input v-if="editor"  name="email" v-model="email" placeholder="Change Email"/>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 top-margin">
                                        <span>Title : {{ title }}</span><br/>
                                        <input v-if="editor" name="title" v-model="title" placeholder="Change Title"/>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>Institution : {{ institution }}</span><br/>
                                        <input v-if="editor"  name="institution" v-model="institution" placeholder="Change Institution"/>
                                        <input  type="hidden" name="institution" :value="institution">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3%">
                                <div class="col-lg-12 col-sm-12">
                                    <textarea name="biography" style="width: 100%; height:100px" v-model="biography" placeholder="Change Biography"/>
                                    <!--<span>Biography : {{ title }}</span><br/>-->
                                </div>
                            </div>

                            <div class="row" style="margin-top: 3%">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>Address : {{ address }}</span><br/>
                                        <input v-if="editor"  name="address" v-model="address" placeholder="Change Address "/>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>City : {{ city }}</span><br/>
                                        <input v-if="editor"  name="city" v-model="city" placeholder="Change City"/>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>State : {{ state }}</span><br/>
                                        <input v-if="editor"  name="state" v-model="state" placeholder="Change State"/>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>Zip Code : {{ zip }}</span><br/>
                                        <input v-if="editor"  name="zip" v-model="zip" placeholder="Change Zip Code"/>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>Country : {{ country }}</span><br/>
                                        <input v-if="editor"  name="country" v-model="country" placeholder="Change Country"/>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>Phone Number : {{ phone }}</span><br/>
                                        <input v-if="editor"  name="phone" v-model="phone" placeholder="Change Phone"/>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 top-margin">
                                        <span>Type User : {{ type }}</span><br/>
                                        <input v-if="editor"  name="type" v-model="type" placeholder="Change Contact Type"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row" v-if="editor" style="margin-top: 3%">
                                <button   class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">{{ buttontext }}</button>
                            </div>
                        </form>
                        <form v-if="allowedit" style="margin-top: 1%" method="POST" action="/user/update">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="id" :value="id">
                            <input type="hidden" name="actions" value="delete">
                            <button   class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">Delete User</button>
                        </form>
                        <button  v-if="viewing" class="btn-info" v-on:click="viewtoedit" style=" display: block;margin-left: auto;margin-right: auto" type="button">{{ buttontext }}</button>
                        <!--<a href="/user/{id}">Back</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>


    export default {
//
//        buttxt = "{{ $course['buttxt'] }}" operation = "{{ $course['operation'] }}" actions = "{{ $course['actions'] }}"
//    :editmode = "{{ $course['editmode'] }}" :viewer = "{{ $course['viewer'] }}" :toedit = "{{ $course['toedit'] }}" :creator = "{{ $course['creator'] }}"
//    :ids="{{ $id }}"  emails="{{ $email }}" fnames="{{ $fname }}"
//    lnames="{{ $lname }}" avatars="{{ $avatar }}" titles="{{ $title }}" institutions="{{ $institution }}" biographys="{{ $biography }}"
//    city = " {{$city}}" state = "{{$state}}" zip = "{{ $zip }}" country = "{{$country}}" phone = "{{$phone}}" type = "{{$type}}"

        props:
            [ 'buttxt', 'operation', 'actions', 'editmode','viewer', 'toedit', 'creator', 'ids', 'emails', 'fnames', 'lnames',
                 'avatars', 'titles', 'institutions', 'biographys', 'addresses', 'citys', 'states', 'zips', 'countrys', 'phones', 'types'
            ],

        data(){
            return {
                id: this.ids,
                fname: this.fnames,
                lname: this.lnames,
                avatar: this.avatars,
                email: this.emails,
                title: this.titles,
                biography: this.biographys,
                institution: this.institutions,
                csrf: "",
                action : this.actions,
                allowedit : this.toedit,
                creating : this.creator,
                buttontext : this.buttxt,
                oper : this.operation,
                viewing : this.viewer,
                editor : this.editmode,
                address : this.addresses,
                city : this.citys,
                state : this.states,
                zip : this.zips,
                country : this.countrys,
                phone : this.phones,
                type : this.types
            }
        },

        mounted() {
            this.csrf = window.Laravel.csrfToken


        },
        methods:
            {
                viewtoedit: function()
                {
                    this.allowedit = true;
                    this.viewing = false;
                    this.editor = true;
                    this.action = '/user/update';
                    this.oper = 'update';
                    this.buttontext = 'Update User';
                }

            },
    }


</script>