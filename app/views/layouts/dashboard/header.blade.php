<div class="navbar main-bar navbar-default">
    <!-- <div class="container"> -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/'); }}" target="_new">
                {{ (!empty($siteName)) ? $siteName : ""}}

                <div class="visible-sm"><img class="ajax-loader ajax-loader-sm" src="{{ asset('assets/img/ajax-load.gif') }}" style="float: right;"/></div>
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ URL::to('dashboard'); }}"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a></li>
                @if (Sentry::check())
                    {{ (!empty($navPages)) ? $navPages : '' }}
                    @if($currentUser->hasAccess('view-users-list') || $currentUser->hasAccess('groups-management'))
                    <li class="dropdown" >
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> <span>Users</span></a></a>
                        <ul class="dropdown-menu">
                            @if($currentUser->hasAccess('view-users-list'))
                            <li><a href="{{ URL::to('dashboard/users'); }}">Users</a></li>
                            @endif

                            @if($currentUser->hasAccess('groups-management'))
                            <li><a href="{{ URL::to('dashboard/groups'); }}">Groups</a></li>
                            @endif
                            @if($currentUser->hasAccess('permissions-management'))
                            <li><a href="{{ URL::to('dashboard/permissions'); }}">Permissions</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>

            @if(Sentry::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm"><img class="ajax-loader ajax-loader-lg" src="{{ asset('assets/img/ajax-load.gif') }}" style="float: right;"/></li>
                {{ (!empty($navPagesRight)) ? $navPagesRight : '' }}
                <li><a href="{{ URL::route('showUser', Sentry::getUser()->id ) }}"><span class="text">{{ Sentry::getUser()->username }}</span></a></li>
                <li><a title="Logout" href="{{ URL::to('dashboard/logout'); }}"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
            @endif
        </div>
    <!-- </div> -->
</div>