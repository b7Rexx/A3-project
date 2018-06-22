/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 90);
/******/ })
/************************************************************************/
/******/ ({

/***/ 90:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(91);


/***/ }),

/***/ 91:
/***/ (function(module, exports) {

var cart = new Vue({
    el: '#cart',
    data: {
        cartListData: '',
        cartCountData: '',
        cartEmpty: '',
        token: server._token
    },
    methods: {
        addCart: function addCart(id) {
            var _this = this;

            cartData = {
                item_id: id,
                _token: this.token
            };
            // console.log();
            axios.post(server._url + '/api/store/cart', cartData).then(function (response) {
                if (response.data.status === true) {

                    var appendDiv = '<div class="rate-message alert alert-success"> <i class="fa fa-shopping-cart fa-2x"></i> Item Added to Cart!</div>';
                    $('.bg-content').append(appendDiv);
                    setTimeout(function () {
                        $('.rate-message').remove();
                    }, 3000);

                    _this.cartCount();
                } else {
                    console.log(response);
                    alert('Something went wrong');
                }
            });
        },
        cartCount: function cartCount() {
            var _this2 = this;

            axios.get(server._url + '/api/get/cartItem').then(function (response) {

                if (response.data.status === false) {
                    _this2.cartCountData = '';
                    _this2.cartListData = '';
                    _this2.cartEmpty = true;
                } else {
                    _this2.cartCountData = response.data.length;
                    _this2.cartListData = response.data;
                    _this2.cartEmpty = false;
                }
            });
        },
        removeCartItem: function removeCartItem(value) {
            var _this3 = this;

            axios.get(server._url + '/api/remove/cartItem/' + value).then(function (response) {
                _this3.cartCount();
                // console.log(value);
                // console.log(this.cartListData);
                // console.log(response);
            });
        }
    },
    created: function created() {
        this.cartCount();
    },

    filters: {
        strlimit: function strlimit(value) {
            return value.slice(0, 18);
        }
    }
});

/***/ })

/******/ });