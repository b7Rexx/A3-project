const cart = new Vue({
    el: '#cart',
    data: {
        cartListData: '',
        cartCountData: '',
        cartEmpty: '',
        token: server._token
    },
    methods: {
        addCart(id) {
            cartData = {
                item_id: id,
                _token: this.token
            };
            // console.log();
            axios.post(server._url + '/api/store/cart', cartData).then((response) => {
                if (response.data.status === true) {

                    var appendDiv = '<div class="rate-message alert alert-success"> <i class="fa fa-shopping-cart fa-2x"></i> Item Added to Cart!</div>';
                    $('.bg-content').append(appendDiv);
                    setTimeout(function () {
                        $('.rate-message').remove();
                    }, 3000);

                    this.cartCount();
                } else {
                    console.log(response);
                    alert('Something went wrong');
                }
            });
        },
        cartCount() {
            axios.get(server._url + '/api/get/cartItem').then(response => {

                if (response.data.status === false) {
                    this.cartCountData = '';
                    this.cartListData = '';
                    this.cartEmpty = true;
                } else {
                    this.cartCountData = response.data.length;
                    this.cartListData = response.data;
                    this.cartEmpty = false;
                }
            });
        },
        removeCartItem(value) {
            axios.get(server._url + '/api/remove/cartItem/' + (value)).then(response => {
                this.cartCount();
                // console.log(value);
                // console.log(this.cartListData);
                // console.log(response);
            });
        }
    },
    created() {
        this.cartCount()
    },
    filters: {
        strlimit: function (value) {
            return value.slice(0, 18);
        }
    }
});

