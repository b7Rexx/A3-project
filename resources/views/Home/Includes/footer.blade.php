<div class="footer-links">
    <div class="row p-4">
        <div class="col-md-4 col-sm-6 text-center">
            <a href="{{route('home')}}"><img src="{{URL::to('images/A3logo.png')}}" height="100px" alt="icon"></a>
        </div>
        <div class="col-md-4 col-sm-3">
            <br><h4>Fast Links</h4>
            <a href="#">Home</a><br>
            <a href="#">Events</a><br>
            <a href="#">Images</a><br>
            <a href="#">Videos</a>
        </div>
        <div class="col-md-4 col-sm-3">
            <br><h4>Company</h4>
            <a href="/Company/Food-Hygiene">Food Hygiene</a>
            <br><a href="/Company/Training">Training</a>
            <br><a href="/Company/Home-Stay">Home Stay</a>
            <br><a href="/Company/Restaurant-Management">Restaurant Management</a>
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
<script src="{{URL::to('js/app.js')}}"></script>
<script src="{{URL::to('home/custom.js')}}"></script>
@yield('js')
</body>
</html>