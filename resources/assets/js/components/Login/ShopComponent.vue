<template>
    <div class="p-5 text-center">
        <h2> <i class="fa fa-shopping-cart fa-2x"></i>&nbsp;&nbsp;&nbsp; Sign In to Shop</h2>
        <a class="p-2">Don't have an account? Register <router-link to="/register">Here !</router-link></a>

        <div class="p-5">
            <form>
                <label>Email <i class="fa fa-envelope"></i> :</label>
                <input type="email" name="email" class="form-control">
                <label>Password <i class="fa fa-key"></i> : </label>
                <input type="password" name="password" class="form-control">
                <br>
                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>
    </div>
</template>

<script>
    export default {}
</script>

<style>

</style>