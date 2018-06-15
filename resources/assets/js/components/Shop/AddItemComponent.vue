<template>
    <div>
        <div class="text-center p-3">
            <h1><i class="fa fa-clone"></i> Add Item</h1>
            <div class="alert alert-success" v-if="addStatus"><i class="fa fa-check-circle"></i> Item added
                successfully!
            </div>
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

            <div class="addImage">
                <form v-on:submit.prevent="addImage()">
                    <h5>Add image to item</h5>
                    <a id="close" class="btn btn-primary" v-on:click="closeImg()">skip</a>
                    <hr>
                    <label><i class="fa fa-image"></i> Image : </label>
                    <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                    <br><br>
                    <input type="submit" class="btn btn-success" value="Submit">
                </form>
            </div>
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
                imageData: {
                    file: '',
                    id: '',
                    token: server._token
                },
            }
        },
        methods: {
            addItem() {
                axios.post(server._url + '/shop/item/addItem', this.itemData).then((response) => {
                    let status = response.data.status;
                    if (status === true) {
                        // console.log(response);
                        this.imageData.id = response.data.last_id;
                        // window.location.replace(server._url + '/shop/items/');
                        // let stat = this;
                        // this.addStatus = true;
                        // setTimeout(function () {
                        //     stat.addStatus = false;
                        // }, 5000);
                        $('.addImage').css({display: 'block'});
                    } else {
                        console.log(response);
                        alert('failed');
                    }
                });
            },
            handleFileUpload() {
                this.imageData.file = this.$refs.file.files[0];
            },
            addImage() {
                let formData = new FormData();
                formData.append('file', this.imageData.file);
                formData.append('id', this.imageData.id);
                formData.append('token', this.imageData.token);

                axios.post(server._url + '/shop/item/addImage', formData, {headers: {'Content-Type': 'multipart/form-data'}}
                ).then((response) => {
                    // console.log(response);
                });
                this.closeImg();
            },
            closeImg() {
                $('.addImage').css({display: 'none'});
                let stat = this;
                this.addStatus = true;
                setTimeout(function () {
                    stat.addStatus = false;
                }, 5000);
            },
            getCat() {
                axios.get(server._url + '/api/categoryList').then((response) => {
                    this.catList = response.data;
                });
            }

        }
        ,
        created: function () {
            this.getCat()
        }
        ,
        watch: {
            // Call the method again if the route changes
            '$route':

                function () {
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
    .addImage {
        display: none;
        position: absolute;
        z-index: 5;
        padding: 70px 20px 70px 20px;
        background: white;
        border-radius: 10px;
        height: 300px;
        top: 40%;
    }

    #close {
        float: right;
    }
</style>
