<div class="footer-links">
    <button onclick="topFunction()" id="myBtn" title="Back to top"><i class="fa fa-chevron-down"></i></button>
    <div class="row p-4">
        <div class="col-md-4 col-sm-6 text-center">
            <a href="{{route('home')}}"><img src="{{URL::to('images/A3logo.png')}}" height="100px" alt="icon"></a>
        </div>
        <div class="col-md-4 col-sm-3">
            <br><h4>Fast Links</h4>
            <a href="{{url('/')}}" class="fa fa-caret-right"> Home</a><br>
            <a href="{{url('/list/shop')}}" class="fa fa-caret-right"> Shops</a><br>
            <a href="{{url('/list/user')}}" class="fa fa-caret-right"> Users</a><br>
            <a href="{{url('/item/browse')}}" class="fa fa-caret-right"> Items</a><br>
            <a href="{{url('/list/post')}}" class="fa fa-caret-right"> Posts</a><br>
        </div>
        <div class="col-md-4 col-sm-3">
            <br><h4>Login Features</h4>
            <a href="{{url('/user/signup')}}" class="fa fa-caret-right"> User SignUp</a><br>
            <a href="{{url('/user/signup/register')}}" class="fa fa-caret-right"> User Register</a><br>
            <a href="{{url('/shop/signup')}}" class="fa fa-caret-right"> Shop SignUp</a><br>
            <a href="{{url('/shop/signup/register')}}" class="fa fa-caret-right"> Shop Register</a><br>
            <a href="{{url('/forum')}}" class="fa fa-caret-right"> Forum</a><br>
            <a href="{{url('/feedback')}}" class="fa fa-caret-right"> Feedback</a><br>
        </div>
    </div>
</div>

<!--Footer-->
<footer>
    <!--Copyright-->
    <div class="text-center">
        © 2018 Copyright:
        <a href="#">{{$mains['admin']}}</a>
    </div>
    <!--/.Copyright-->
</footer>
<!--/.Footer-->

<!--container div close-->
</div>
<script>
    var server = {
        _url: '{{URL::to('/')}}',
        _token: '{{csrf_token()}}'
    };
</script>
<script src="{{URL::to('js/app.js')}}"></script>
<script src="{{URL::to('js/cart.js')}}"></script>
<script src="{{URL::to('home/custom.js')}}"></script>

@yield('js')
</body>
</html>