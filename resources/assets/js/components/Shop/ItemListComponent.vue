<template>
    <div>
        <h1>ok</h1>
        <hr>
        <div class="row">

            <div v-for="item in itemList" class="col-sm-6 col-lg-4  bg-items p-3">
                <div class="index-items text-center" v-bind:title="item.name">
                    <h5>{{item.name | strlimit}}</h5>
                    <img v-bind:src="imagelink+item.image" alt="Image">
                </div>
                <hr>
                <div class="text-right">Rs. {{item.price}}</div>
                <!--<a v-bind:href="shop.id">{{shop.name}}</a>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                itemList: '',
                // shop: {
                id: '',
                //     name: ''
                // },
                imagelink: server._url + '/images/shop/item/'
            }
        },
        methods: {
            itemShopList() {
                axios.get(server._url + '/shop/itemShopList/' + this.id).then((response) => {
                    this.itemList = response.data;
                    // this.shop.id = '/id/' + response.data.shop_id;
                    // this.shop.name = response.data.shop;
                    console.log(this.itemList);
                    // console.log(this.shop);
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
        },
        filters: {
            strlimit: function (value) {
                return value.slice(0, 18);
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
        border-bottom: 1px solid lightgrey;
    }

</style>
