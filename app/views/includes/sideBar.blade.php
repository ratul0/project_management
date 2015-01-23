<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            @if(Entrust::hasRole('Admin'))

                <li>
                    <a href="{{route('teacher.invite')}}"><i class="fa fa-dashboard fa-fw"></i> Invite Teacher</a>
                </li>

                <li>
                    <a href="{{route('student.invite')}}"><i class="fa fa-dashboard fa-fw"></i> Invite Student</a>
                </li>
            @endif

            {{--<li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.html">Flot Charts</a>
                    </li>
                    <li>
                        <a href="morris.html">Morris.js Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>--}}

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->