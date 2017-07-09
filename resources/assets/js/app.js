
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('user', require('./components/User.vue'));
Vue.component('calendar', require('./components/Calendar.vue'));
Vue.component('schedule', require('./components/Schedule.vue'));
Vue.component('contact', require('./components/Contact.vue'));
Vue.component('vmenu', require('./components/vMenu.vue'));
Vue.component('institutions', require('./components/Institutions.vue'));
Vue.component('institution', require('./components/Institution.vue'));
Vue.component('courses', require('./components/Courses.vue'));
Vue.component('course', require('./components/Course.vue'));
Vue.component('singleuser', require('./components/SingleUser.vue'));
Vue.component('userlist', require('./components/UserList.vue'));
Vue.component('usercourse', require('./components/UserCourse.vue'));
Vue.component('courseuser', require('./components/CourseUser.vue'));
Vue.component('register', require('./components/Registration.vue'));
Vue.component('class', require('./components/Class.vue'));
Vue.component('classschedule', require('./components/ClassSchedule.vue'));
Vue.component('classlist', require('./components/ClassList.vue'));
Vue.component('assignmentlist', require('./components/AssignmentList.vue'));
Vue.component('classdocs', require('./components/ClassDocuments.vue'));
Vue.component('fileupload', require('./components/FileUpload.vue'));
Vue.component('joininstitution', require('./components/institution/JoinInstitution.vue'));
Vue.component('joinrequests', require('./components/institution/JoinRequests.vue'));
Vue.component('joincourse', require('./components/courses/JoinCourse.vue'));



// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

const userd = new Vue({

    el: '#app',
    data: {
        // seen: true,
        tabs: [
            { name: 'First' },
            { name: 'Second' }
        ]
    },
    components: {
        'my-comp': {
            template: "#mycomp",
            props: ['tabs'],
        }
    }
});
