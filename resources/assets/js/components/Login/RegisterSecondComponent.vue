<template>
    <div>
        <h3>REGISTER 2</h3>
        <form v-on:submit.prevent="registerSecond()">
            <label><i class="fa fa-map-marker"></i> Address : </label>
            <input type="text" v-model="regData.address" class="form-control">
            <label><i class="fa fa-phone"></i> Phone : </label>
            <input type="number" v-model="regData.phone" class="form-control">
            <label><i class="fa fa-edit"></i> Bio : </label>
            <textarea class="form-control" v-model="regData.bio" rows="3" style="resize:none"></textarea><br>
            <input type="submit" class="btn btn-success btn-lg" value="Submit">

            <a v-on:click="goHome()" class="btn btn-secondary float-right">Skip</a>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                regData: {
                    id: this.$route.params.id,
                    address: '',
                    phone: '',
                    bio: '',
                    image: '',
                    token: server._token
                },
                link: server._url
            }
        },
        methods: {
            registerSecond() {
                axios.post(server._url + '/api/registerSecond', this.regData).then((response) => {
                    window.location.replace(this.link);
                });
            },
            goHome() {
                window.location.replace(this.link);
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
