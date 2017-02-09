<nav class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ url('/subscribers') }}">{{ trans('navbar.subscriber_list') }}</a></li>
                <li><a href="{{ url('/lists') }}">{{ trans('navbar.lists') }}</a></li>
                <li><a href="#">{{ trans('navbar.send_mail') }}</a></li>
                <li><a href="#">{{ trans('navbar.settings') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
