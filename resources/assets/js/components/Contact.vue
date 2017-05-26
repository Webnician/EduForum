<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact Component</div>

                    <div class="panel-body">
                        <h3 class="list-heading">LI1104</h3>
                        <ul style=" text-decoration: underline;">
                        <li><a href="#">John Bohnam</a></li>
                        <li><a href="#">Billy Jean</a></li>
                        <li><a href="#">Willy Wonka</a></li>
                        </ul>
                        <h3 class="list-heading">CS102</h3>
                        <ul style=" text-decoration: underline;">
                            <li><a href="#">James Rollins</a></li>
                            <li><a href="#">Larry Niven</a></li>
                            <li><a href="#">Robert Heinlein</a></li>
                            <li><a href="#">Anne Rice</a></li>
                            <li><a href="#">Bernard Cornwell</a></li>
                        </ul>
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
