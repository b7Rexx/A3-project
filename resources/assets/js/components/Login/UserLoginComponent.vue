<template>
    <div>
        <h3>USER</h3>
        <form action="">
            <label>Email <i class="fa fa-envelope"></i> :</label>
            <input type="email" name="email" class="form-control">
            <label>Password <i class="fa fa-key"></i> : </label>
            <input type="password" name="password" class="form-control">
            <br>
            <input type="submit" class="btn btn-success" value="Login">
            <router-link to="/home"><input type="button" class="btn btn-secondary float-right" value="Back"></router-link>
        </form>

    </div>
</template>

<script>
    export default {}
</script>

<style>

</style>