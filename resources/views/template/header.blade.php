<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <!-- Logo icon --><b>
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            </b>
                <span>ClientSync</span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img  src="{{asset('/images/pp.png')}}">
                        <span class="hidden-md-down" >
                            <span th:if="${#authentication.principal instanceof T(org.springframework.security.core.userdetails.User)}">
                                <span th:if="${#strings.contains(#authentication.principal.username, '@')}" th:text="${#strings.substringBefore(#authentication.principal.username, '@')}">Admin</span>
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
{{--                    <div class="dropdown-menu dropdown-menu-right animated flipInY">--}}
{{--                        <!-- text-->--}}
{{--                        <a th:if="${!#authorization.expression('hasRole(''ROLE_CUSTOMER'')')}"--}}
{{--                           th:href="${home + 'employee/profile'}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>--}}
{{--                        <a th:if="${#authorization.expression('hasRole(''ROLE_CUSTOMER'')')}"--}}
{{--                           th:href="${home + 'customer/profile'}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>--}}
{{--                        <!-- text-->--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a th:if="${#authentication.principal instanceof T(org.springframework.security.core.userdetails.User) and !#authorization.expression('hasRole(''ROLE_CUSTOMER'')')}"--}}
{{--                           th:href="${home + 'change-password'}" class="dropdown-item"><i class="fas fa-key"></i> change password</a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <!-- text-->--}}
{{--                        <form th:action="@{/logout}" method="post">--}}
{{--                            <button type="submit"><i class="fa fa-power-off"></i> Logout</button>--}}
{{--                        </form>--}}
{{--                        <!-- text-->--}}
{{--                    </div>--}}
                </li>
                <!-- ============================================================== -->
                <!-- End User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            </ul>
        </div>
    </nav>
</header>
