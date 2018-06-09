<template>
    <div>
        <h1>ok</h1>
        <hr>
        <div v-for="item in itemList" class="border bg-white p-1">
            <h3>{{item.name}}</h3>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                itemList: ''
            }
        },
        methods: {
            itemShopList() {
                axios.get(server._url + '/shop/itemShopList').then((response) => {
                    this.itemList = response.data;
                    console.log(this.itemList);
                });
            }
        },
        created: function () {
            this.itemShopList();
        },
        watch: {
            // Call the method again if the route changes
            '$route': function () {
                this.itemShopList();
            }
        }
    }
</script>

<style>

</style>
