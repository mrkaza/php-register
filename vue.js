var app = new Vue({
    el:'#app',
    data: {
        login:true,
        registration:false,

        }
        
    },
    methods: {
        showLogin() {
            this.login=true;
            this.registration=false;
        },
        showRegistration() {
            this.login=false;
            this.registration=true;
        }
    },

});