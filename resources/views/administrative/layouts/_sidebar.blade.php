<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('assets/images/IPDC-logo.png') }}" width="100px">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            {{--            <li class="nav-item nav-category">Main</li>--}}
            {{--            <li class="nav-item ">--}}
            {{--                <a href="{{route('administrative.home', ['page' => 'home'])}}" class="nav-link">--}}
            {{--                    <i class="link-icon" data-feather="home"></i>--}}
            {{--                    <span class="link-title">Dashbord</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            
        </ul>
        {{--item--}}
            <li class="nav-item ">
                <a href="{{route('administrative.item')}}" class="nav-link">
                    <i class="link-icon" data-feather="cast"></i>
                    <span class="link-title">item</span>
                </a>
            </li>
</nav>

