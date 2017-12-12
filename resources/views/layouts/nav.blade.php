
<div class="navbar bg-dark">
    <!--<div class="container d-flex justify-content-between">-->
            @guest
                <a style="color: white;" href="{{ route('login') }}" class="navbar-brand">Login</a>
                <a style="color: white;" href="{{ route('register') }}" class="navbar-brand">Register</a>
                @else
            <a style="color: white;" href="http://localhost:8080/laracast/public/tasks" class="nav-item nav-link">Tasks</a>
            <a style="color: white;" href="http://localhost:8080/laracast/public/tasks/create" class="nav-item nav-link">Create a New Task</a>
            <li class="dropdown">
                        <a style="color: white;" href="http://localhost:8080/laracast/public/home" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <!--<ul class="dropdown-menu" role="menu">-->
                            <li>
                                <a style="color: white;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                       <!-- </ul> -->
                    </li>
            @endguest
    <!--</div>-->
</div>
