<template>

    <div v-if="admin" class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">File Upload</div>

                    <div class="panel-body">
                       <form action="/files/upload" id="thefile" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="_token" :value="csrf">
                           <input type="hidden" name="course" :value="theclass.id">
                           <input type="hidden" name="user" :value="currentuser.id">
                           <input type="file"  multiple   name="file" id="file"  class="input-file">
                           <!--accept="image/*"-->
                           <button v-on:click="checkForFiles()">Send it off</button>
                           <p v-if="isSaving">
                               Uploading files...
                           </p>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>







    export default {
        props: [ 'teacher', 'course', 'user', 'adminuser'],

        data(){


            return {
                instructor  : this.teacher,
                theclass    : this.course,
                currentuser : this.user,
                csrf        : "",
                isSaving    : false,
                admin       : this.adminuser,
            }
        },
        methods: {
            checkForFile()
            {
//                if (event) event.preventDefault()

                this.isSaving = true;
                let data = new FormData();
                jQuery.each(jQuery('#file')[0].files, function(i, file) {
                    data.append('file-'+i, file);
                });
//                alert('hello!');

                jQuery.ajax({
                    url: 'coursedocs',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(data){
                        alert(data);
                    }
                });
            },

        },


        mounted() {

            this.csrf = window.Laravel.csrfToken;

        },
    }
</script>
