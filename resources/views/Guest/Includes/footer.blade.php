<!--Footer-->
<footer>
    <!--Copyright-->
    <div class="text-center bg-dark">
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
<script src="{{URL::to('js/guestCustom.js')}}"></script>
<script src="{{URL::to('js/vuelogin.js')}}"></script>
</body>
</html>