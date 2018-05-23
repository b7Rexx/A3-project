<template>
    <div>
        <h3>REGISTER</h3>
        <form v-on:submit.prevent="registerFirst()">
            <label v-on:click="checkUser()"><h5>User </h5><i class="fa fa-user fa-2x pr-2"></i></label>
            <input type="radio" v-model="regData.type" value="user">
            <label v-on:click="checkShop()"><h5>Shop </h5><i class="fa fa-shopping-cart fa-2x pr-2"></i></label>
            <input type="radio" v-model="regData.type" value="shop"><br>
            <label><i class="fa fa-edit"></i>Name : </label>
            <input type="text" v-model="regData.name" class="form-control">
            <label><i class="fa fa-envelope"></i>Email : </label>
            <input type="email" v-model="regData.email" class="form-control">
            <label><i class="fa fa-key"></i> Password : </label>
            <input type="password" v-model="regData.password" class="form-control">
            <label><i class="fa fa-key"></i> Confirm password : </label>
            <input type="password" v-model="regData.password_confirmation" class="form-control"><br>
            <input type="submit" class="btn btn-success btn-lg" value="Submit">

            <router-link to="/home" class="btn btn-secondary float-right">Back</router-link>
        </form>
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
                    type: 'user',
                    token: server._token
                }
            }
        },
        methods: {
            registerFirst() {
                axios.post(server._url + '/api/register', this.regData).then((response) => {
                    let last_insert_id = response.data.last_insert_id;
                    let status = response.data.status;
                    if (status === true) {
                        window.location.replace(server._url + '/login/registerSecond/'+last_insert_id);
                    } else {
                        console.log(response);
                        alert('failed');
                    }
                });
            },
            checkUser(){
                this.regData.type = 'user';
            },
            checkShop(){
                this.regData.type = 'shop';
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
