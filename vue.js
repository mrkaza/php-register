var app = new Vue({
    el:'#app',
    data: {
        errorMessage: '',
        succesMessage:'',
        login:true,
        registration:false,
        userInfo: {
            username: '',
            password: '',
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
        },
        // loginUser() {
        //     let logForm = this.formData(this.userInfo);
        //     axios.post('login.php', logForm).then(response => {
        //       console.log(response.data)
        //     })
        // },
        // formData(obj) {
        //     let form_data = new FormData();
        //     for (let key in obj) {
        //         form_data.append(key,obj[key]);
        //     }
        //     return form_data

        // }
    },

});