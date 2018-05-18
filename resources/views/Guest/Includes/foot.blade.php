<script>
    var server = {
        _url: '{{URL::to('/')}}',
        _token: '{{csrf_token()}}'
    };
</script>

<script src="{{URL::to('js/app.js')}}"></script>
<script src="{{URL::to('js/vuelogin.js')}}"></script>
</body>
</html>