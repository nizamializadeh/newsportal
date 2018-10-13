<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('admin/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{auth()->user()->name }}
            </div>
            <div class="email">
                {{auth()->user()->email}}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{request()->routeIs('dashboard') ? 'active' : ''}}">
                <a href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{(request()->routeIs('author.index') || request()->routeIs('tag.index') || request()->routeIs('category.index')) ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle ">
                    <i class="material-icons">fiber_new</i>
                    <span>News managment</span>
                </a>
                <ul class="ml-menu">
                    {{--@if ( auth()->user()->role == 1)--}}
                         {{--do something--}}
                    {{--@endif--}}
                        <li class="{{request()->routeIs('abouts.index') ? 'active' : ''}}">
                            <a href="{{route('abouts.index')}}">Abouts</a>
                        </li>

                    <li class="{{request()->routeIs('category.index') ? 'active' : ''}}">
                        <a href="{{route('category.index')}}">Categories</a>
                    </li>
                    <li class="{{request()->routeIs('contact.index') ? 'active' : ''}}">
                        <a href="{{route('contact.index')}}">Contact</a>
                    </li>
                    <li class="{{request()->routeIs('main.index') ? 'active' : ''}}">
                        <a href="{{route('main.index')}}">Main</a>
                    </li>
                    <li class="{{request()->routeIs('post.index') ? 'active' : ''}}">
                        <a href="{{route('post.index')}}">Post</a>
                        <a href="{{route('post.index')}}">Post</a>
                    </li>
                    <li class="{{request()->routeIs('tag.index') ? 'active' : ''}}">
                        <a href="{{route('tag.index')}}">Tags</a>
                    </li>
                    <li class="{{request()->routeIs('social.index') ? 'active' : ''}}">
                        <a href="{{route('social.index')}}">Social</a>
                    </li>
                    <li class="{{request()->routeIs('testimonail.index') ? 'active' : ''}}">
                        <a href="{{route('testimonail.index')}}">Testimonail</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="javascript:void(0);">NewsPortal</a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>