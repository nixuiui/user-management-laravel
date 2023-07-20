<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper">
        <a href="#" class="left-sidebar-toggle">Dashboard</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">Menu</li>
                        {{-- <li class="{{ active(['admin']) }}">
                            <a href="{{ route('admin') }}"><i class="icon mdi mdi-home"></i><span>Beranda</span></a>
                        </li> --}}
                        <li class="{{ active(['user*']) }}">
                            <a href="{{ route('user') }}"><i class="icon mdi mdi-account"></i><span>User</span></a>
                        </li>
                        <li class="{{ active(['role*']) }}">
                            <a href="{{ route('role') }}"><i class="icon mdi mdi-toys"></i><span>Role</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
</div>
