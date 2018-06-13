<template>
    <div class="p-5 text-center">
        <h2><i class="fa fa-user fa-2x"></i>&nbsp;&nbsp;&nbsp; Sign In to User</h2>
        <a class="p-2">Don't have an account? Register
            <router-link to="/register">Here !</router-link>
        </a>
        <div class="p-3">
            <form v-on:submit.prevent="login()">
                <label>Email <i class="fa fa-envelope"></i> :</label>
                <input type="email" v-model="logData.email" class="form-control">
                <label>Password <i class="fa fa-key"></i> : </label>
                <input type="password" v-model="logData.password" class="form-control">
                <br>
                <div class="alert alert-danger" v-if="login"><i class="fa fa-times"></i>Invalid email or password</div>

                <input type="checkbox" value="true" v-model="logData.remember">
                <label> <i class="fa fa-comment"></i> Remember SignIn </label>
                <br>
                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                logData: {
                    email: '',
                    password: '',
                    remember: '',
                    token: server._token,
                },
                loginstat:false
            }
        },
        methods: {
            login() {
                axios.post(server._url + '/user/api/login', this.logData).then((response) => {
                    console.log(response);
                    let stat = response.data.status;
                    if (stat === true) {
                        window.location.replace(server._url + '/user');
                    } else {
                        let loginstatus = this;
                        this.loginstat = true;
                        setTimeout(function () {
                            loginstatus.loginstat = false;
                        }, 5000);
                        console.log(response);
                    }
                }).catch(error => {
                    console.log(error.response)
                });
            }
        }
    }
</script>

<style>

</style>