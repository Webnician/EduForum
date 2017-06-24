<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Calendar Component</div>

                    <div class="panel-body">
                        I'm a calendar vue component
                        <iframe src="https://calendar.google.com/calendar/embed?src=olaf.broms%40onlinelearning-c.org&ctz=America/Chicago" style="border: 0" width="100%" height="auto" frameborder="0" scrolling="no"></iframe>
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
