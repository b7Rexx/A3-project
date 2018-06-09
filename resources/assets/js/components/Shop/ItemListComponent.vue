<template>
    <div>
        <h1>ok</h1>
        <hr>
        <div class="row">

            <div v-for="item in itemList" class="col-sm-5 col-md-4 item text-center">
                <h5>{{item.name}}</h5>
                <img v-bind:src="imagelink+item.image" alt="Image">
                <a>Rs. {{item.price}}</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                itemList: '',
                imagelink: server._url + '/images/shop/item/'
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
    .item {
        position: relative;
        background: white;
        padding: 15px;
        border-right: 1px solid lightgrey;
    }

    .item > img {
        max-width: 120px;
        max-height: 120px;
        border-radius: 60px;
    }

    .item > a {
        position: absolute;
        bottom: 10px;
        right: 10px;
        font-size:18px;
        color:green;
    }
</style>
