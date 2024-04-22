<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">

        <span class="brand-text font-weight-light">Polling</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        @if(\Illuminate\Support\Facades\Request::hasAny("kk"))
                            <b>Hello</b>
                        @endif
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(Auth::user()->kode_role == 2)
                <li class="nav-item">
                    {{-- <a href="{{ route('kk-list') }}" class="nav-link"> --}}
                        
                    <a href="{{ route('mk-index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Matakuliah
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('kk-list') }}" class="nav-link"> --}}
                        
                    <a href="{{ route('poll-index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Polling
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('kk-list') }}" class="nav-link"> --}}
                        
                    <a href="{{ route('poll-index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Hasil
                        </p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->kode_role == 3)
                    <li class="nav-item">
                        {{-- <a href="{{ route('ctz-list') }}" class="nav-link"> --}}
                        <a href="/" class="nav-link">
                            <i class="nav-icon far fa-id-card"></i>
                            <p>
                                Voting
                            </p>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->kode_role == 1)
                    <li class="nav-item">
                        <a href="{{ route('admin-index') }}" class="nav-link">
                        {{-- <a href="/adminindex" class="nav-link"> --}}
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Roles
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="nav-icon fa fa-sign-out"></i>Logout
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
