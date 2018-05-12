@include('Admin.Includes.head')
@include('Admin.Includes.header')

@include('Admin.Includes.nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>@yield('page-sub-title')</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              {{-------------BODY PARTS----------------}}
                @yield('body')
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@include('Admin.Includes.footer')
@include('Admin.Includes.foot')
