<template>
    <div>
        <span>Don't have an account? <router-link to="register">Register Here ! </router-link></span><br>
        <h3>Select Account Type :</h3>
        <hr>
        <router-link to="user">
            <h3>User </h3><i class="fa fa-user fa-2x pr-5 pl-2"></i><i class="fa fa-arrow-right fa-2x pl-5"></i>
        </router-link>
        <br><br>
        <router-link to="shop">
            <h3>Shop </h3><i class="fa fa-shopping-cart fa-2x pr-5 pl-2"></i>
            <i class="fa fa-arrow-right fa-2x pl-5"></i>
        </router-link>
    </div>
</template>

<script>
    export default {}
</script>

<style>
    h3 {
        display: inline;
        padding-left: 20px;
    }

    .animate {
        transition: opacity .5s;
    }
</style>