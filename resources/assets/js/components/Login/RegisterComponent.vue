<template>
    <div>
        <h3>REGISTER</h3>
        <form action="">
            <label v-on:click="radioC"><h5>User </h5><i class="fa fa-user fa-2x pr-2"></i></label><input
                type="radio" name="type" checked>
            <label v-on:click="radioC"><h5>Shop </h5><i class="fa fa-shopping-cart fa-2x pr-2"></i></label><input
                type="radio"
                name="type"><br>
            <label><i class="fa fa-edit"></i>Name : </label>
            <input type="text" name="name" class="form-control">
            <label><i class="fa fa-envelope"></i>Email : </label>
            <input type="email" name="email" class="form-control">
            <label><i class="fa fa-key"></i> Password : </label>
            <input type="password" name="pass" class="form-control">
            <label><i class="fa fa-key"></i> Confirm password : </label>
            <input type="password" name="c_pass" class="form-control"><br>

            <input type="submit" class="btn btn-success btn-lg" value="Submit">
        </form>
    </div>
</template>

<script>
    export default {
        method() {
            return {
                radioC: function () {
                    alert('ok');
                }
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

    input[type="radio"]:checked {
        visibility: hidden;
    }


</style>