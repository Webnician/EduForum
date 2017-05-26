<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Schedule Component</div>

                    <div class="panel-body">
                        <span style="float: right"><a href="#"><span style="margin-right: 2%">Add Item</span>   <i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
