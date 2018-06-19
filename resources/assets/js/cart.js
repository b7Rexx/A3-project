const cart = new Vue({
        el: '#cart',
        data: {
            cartListData: '',
            cartCountData: '',
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
                        alert('item added to cart');
                        this.cartCount();
                    } else {
                        console.log(response);
                        alert('Something went wrong');
                    }
                });
            },
            cartCount() {
                axios.get(server._url + '/api/get/cartItem').then(response => {
                    this.cartCountData = response.data.length;
                    this.cartListData = response.data;
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
    })
;
