<template>
    <div>
        <h1>Item List</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
                </div>

            </div>
            <div class="col-sm-6 text-right">
                <router-link to="/action/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add item</router-link>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped">
                <tr class="bg-light">
                    <th>S/n</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <tr v-for="(item,key) in itemList">
                    <td>{{++key}}</td>
                    <td v-bind:title="item.name">{{item.name | strlimit}}</td>
                    <td><img v-bind:src="imagelink+item.image" alt="Image"></td>
                    <td>{{categoryValue[item.category_id]}}</td>
                    <td>Rs. {{item.price}}</td>
                    <td>{{item.status}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" v-on:click="editItem(item.id)"><i
                                class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" v-on:click="deleteItem(item.id)"><i
                                class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <div id="update-form">
            <form v-on:submit.prevent="updatePost()">
                Name : <input type="text" v-model="updateItem.name" class="form-control">
                Rs : <input type="number" v-model="updateItem.price" class="form-control">
                Status :
                <input type="radio" name="status" value="on" v-model="updateItem.status">on
                <input type="radio" name="status" value="off" v-model="updateItem.status">off
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
            <button v-on:click="closeUpdate()" class="btn btn-secondary">Back</button>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                itemList: '',
                updateItem: [],
                id: '',
                imagelink: server._url + '/images/shop/item/',
                categoryValue: {
                    1: 'Fish',
                    2: 'Aquarium',
                    3: 'Food',
                    4: 'Decoration',
                    5: 'Medicine',
                    6: 'Others',
                },
                token: server._token,
            }
        },
        methods: {
            itemShopList() {
                axios.get(server._url + '/shop/itemShopList/').then((response) => {
                    this.itemList = response.data;
                });
            },
            editItem(value) {
                axios.get(server._url + '/api/shop/item/' + value).then((response) => {
                    this.updateItem = response.data;
                    $('#update-form').show();
                    // console.log(this.updateItem);

                    // console.log(response.data);
                });
            },
            deleteItem(value) {
                var deleteID = {'id': value, '_token': this.token};

                if (confirm('Are you sure to delete this item ? ')) {
                    axios.post(server._url + '/shop/action/delete', deleteID).then((response) => {
                        // console.log(response);
                        this.itemShopList();
                    });
                }
            },
            updatePost() {
                this.updateItem['token'] = this.token;
                axios.post(server._url + '/shop/action/update', this.updateItem).then((response) => {
                    this.closeUpdate();
                    this.itemShopList();
                    // console.log(response);
                });
            },
            closeUpdate() {
                this.updateItem = [];
                $('#update-form').hide();
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
    td > img {
        height: 30px;
        width: 30px;
        transition: 0.5s ease;
        z-index: 1;
    }

    td > img:hover {
        height: 100px;
        width: 100px;
        z-index: 5;
    }

    #update-form {
        display: none;
        position: absolute;
        left: 100px;
        top: 200px;
        width: 300px;
        height: 500px;
        background: white;
        padding: 20px;
    }

    #update-form input {
        display: inline-block;
    }
</style>
