<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">User</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if($active == 'usercreate') class="active" @endif><a href="{{ route('user.create') }}">Create</a></li>
                    <li @if($active == 'userlist') class="active" @endif><a href="{{ route('user.list') }}">List</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>