
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
                            <input type="hidden" name="actions" value="update">
                            <input type="hidden" name="id" :value="id">
                            <!--{{ csrf_field() }}-->

                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="col-lg-12 col-sm-12">
                                    <img style="display: block;margin-left: auto;margin-right: auto" :src="avatar" />
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <span  v-if="seen">Avatar Src : {{ avatar }}</span><br/>
                                    <input  v-if="seen" name="avatar" style="width:100%" v-model="avatar" placeholder="Change Avatar Src"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="col-lg-6 col-sm-12">
                                    <span>First Name : {{ fname }}</span><br/>
                                    <input v-if="seen" name="fname" v-model="fname" placeholder="Change First Name"/>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <span>Last Name : {{ lname }}</span><br/>
                                    <input  v-if="seen" name="lname" v-model="lname" placeholder="Change Last Name"/>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <span>Email : {{ email }}</span><br/>
                                    <input  v-if="seen" name="email" v-model="email" placeholder="Change Email"/>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <span>Title : {{ title }}</span><br/>
                                    <input  v-if="seen" name="title" v-model="title" placeholder="Change Title"/>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <span>Institution : {{ institution }}</span><br/>
                                    <input  v-if="allowinstitution" name="institution" v-model="institution" placeholder="Change Institution"/>
                                    <input v-else type="hidden" name="institution" :value="institution">
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
                            <button  v-if="seen" class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">{{ buttontext }}</button>
                        </div>
                        </form>
                        <form v-if="showaddbut" style="margin-top: 1%" method="POST" action="/user/update">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="id" :value="id">
                            <input type="hidden" name="actions" value="delete">
                            <button  v-if="seen" class="btn-info" style="display: block;margin-left: auto;margin-right: auto" type="submit">Delete User</button>
                        </form>

                        <a href="/user/{id}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

   var x = document.getElementById('been').value;
   var isTrueSet = (x == 'true');

   var y = document.getElementById('showadd').value;
   var showAddButton = (y == 'true');

//   var theinsts =
//   var z = document.getElementById('institution').value;
//   if (!!z)
//   {
//       theinstitution = z;
//   }

//   var z = document.getElementById('institution').value;

    export default {
        props:
            [ 'allowinst', 'btntext', 'actions', 'emails','ids', 'fnames', 'lnames', 'avatars', 'titles', 'institutions', 'biographys'],

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
                seen: false,
                been: false,
                showaddbut: false,
                action: this.actions,
                buttontext: this.btntext,
                allowinstitution: this.allowinst
            }
        },

        mounted() {
            this.csrf = window.Laravel.csrfToken
//            this.seen = window.vis.seen

            this.seen = isTrueSet;
            this.showaddbut = showAddButton;
//            this.institution = theinstitution;

        }
    }

//    console.log(thefname)
//    const app = new Vue({
//        el: '#app',
//        data: {
//            message: 'Hello Vue!'
//        }
//    });
function seeit() {
    var check = document.getElementById('been').value;
    var boolean1 = Boolean.valueOf(check);
//        this.seen = true;
}
</script>