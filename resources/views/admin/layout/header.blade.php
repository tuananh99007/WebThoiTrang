<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            @if ($userLogin->role == 1)
            <a class="navbar-brand" >Admin - Thời Trang AMOS</a>
            @else
            <a class="navbar-brand" >Manager - Thời Trang AMOS</a>
            @endif
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="{{ route('admin.authenticate.logout') }}">
                        <i class="material-icons">input</i></a></li>
            </ul>
        </div>
    </div>
</nav>
