<template>
    <div>
        <div class="text-center p-3">
            <h1><i class="fa fa-clone"></i> Add Item</h1>
            <div class="alert alert-success" v-if="addStatus"><i class="fa fa-check-circle"></i> Item added successfully!</div>
        </div>
        <div class="pl-5 pr-5">
            <form v-on:submit.prevent="addItem()">
                <label><i class="fa fa-edit"></i> Name : </label>
                <input type="text" v-model="itemData.name" class="form-control" required>
                <label><i class="fa fa-th"></i> Category : </label>
                <select v-model="itemData.category" class="form-control" required>
                    <option> -- Select a Category--</option>
                    <option v-for="cat in catList" v-bind:value="cat.id">{{cat.name}}</option>
                </select>

                <label><i class="fa fa-money"></i> Price </label>
                <input type="number" v-model="itemData.price" class="form-control">
                <label><i class="fa fa-check"></i> Status </label><br>
                <input type="radio" v-model="itemData.status" value="on">Available
                <input type="radio" v-model="itemData.status" value="off">Not available <br>
                <br>
                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                itemData: {
                    name: '',
                    category: '',
                    price: '0',
                    status: 'on',
                    shop_id: server._shopid,
                    token: server._token
                },
                catList: [],
                addStatus: false,
            }
        },
        methods: {
            addItem() {
                axios.post(server._url + '/shop/items/addItem', this.itemData).then((response) => {
                    let status = response.data.status;
                    if (status === true) {
                        // window.location.replace(server._url + '/shop/items/');
                        let stat = this;
                        this.addStatus = true;
                        setTimeout(function () {
                            stat.addStatus = false;
                        }, 5000);
                    } else {
                        console.log(response);
                        alert('failed');
                    }
                });
            },
            getCat() {
                axios.get(server._url + '/api/categoryList').then((response) => {
                    this.catList = response.data;
                });
            }

        },
        created: function () {
            this.getCat()
        },
        watch: {
            // Call the method again if the route changes
            '$route': function () {
                this.getCat();
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
