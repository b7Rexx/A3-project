<template>
    <div>
        <div class="text-center p-3">
            <h1><i class="fa fa-shopping-cart"></i> Register</h1>
        </div>
        <div class="p-5">
            <form v-on:submit.prevent="registerFirst()">
                <label><i class="fa fa-edit"></i> Name : </label>
                <input type="text" v-model="regData.name" class="form-control" required>
                <label><i class="fa fa-envelope"></i> Email : </label>
                <input type="email" v-model="regData.email" class="form-control" required>
                <label><i class="fa fa-key"></i> Password : </label>
                <input type="password" v-model="regData.password" class="form-control" required>
                <label><i class="fa fa-key"></i> Confirm password : </label>
                <input type="password" v-model="regData.password_confirmation" class="form-control" required><br>
                <input type="submit" class="btn btn-success btn-lg" value="Submit">
                <br><br>
                <router-link to="/" class="btn btn-secondary float-right">Back</router-link>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                regData: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    token: server._token
                }
            }
        },
        methods: {
            registerFirst() {
                axios.post(server._url + '/signup/register', this.regData).then((response) => {
                    let last_insert_id = response.data.last_insert_id;
                    let status = response.data.status;
                    if (status === true) {
                        window.location.replace(server._url + '/signup/register/' + last_insert_id);
                    } else {
                        console.log(response);
                        alert('failed');
                    }
                });
            }
        }
    }
</script>

<style>
    label {
        padding-left: 30px;
    }

    h5 {
        display: inline;
    }

    /*input[type="radio"]:checked {*/
    /*visibility: hidden;*/
    /*}*/


</style>
