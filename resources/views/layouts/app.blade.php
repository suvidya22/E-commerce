<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/css/maincss.css')}}" />
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

</head>

<body class="nk-body bg-lighter npc-general has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed" data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{asset('home')}}" class="logo-link nk-sidebar-logo">
                            
                            
                            <img class="logo-small logo-img logo-img-small" src="" alt="logo-small" />
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="{{ route('index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span><span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                
                                
                                <li class="nk-menu-item">
                                    <a href="{{ route('categories.list') }}" class="nk-menu-link ">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signal"></em></span><span class="nk-menu-text">Category management</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('products.list') }}" class="nk-menu-link ">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signal"></em></span><span class="nk-menu-text">Product management</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('orders.list') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span><span class="nk-menu-text">Order management </span>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-wrap">
                <div class="nk-header nk-header-fixed">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="#" class="logo-link">
                                    <img class="logo-light logo-img" src="" alt="l" />
                                    <img class="logo-dark logo-img" src="" alt="" />
                                </a>
                            </div>
                            <div class="nk-header-search ms-3 ms-xl-0"><em class="icon ni ni-search"></em><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything" /></div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head"><span class="sub-title nk-dropdown-title">Notifications</span><a href="#">Mark All as Read</a></div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em></div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have New <span>Notification</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em></div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center"><a href="#">View All</a></div>
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm"><em class="icon ni ni-user-alt"></em></div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-active">E-commerce User</div>
                                                    <div class="user-name dropdown-indicator">Suvidya Raj</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar"><span>AB</span></div>
                                                    <div class="user-info"><span class="lead-text">Suz</span><span class="sub-text">test@webandcrafts</span></div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href=""><em class="icon ni ni-user-alt"></em><span>View Profile</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright">&copy; 2023 <a href="#" target="_blank">FingerFrame</a></div>
                            <div class="nk-footer-links">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bundleb12b.js')}}"></script>
    <script src="{{asset('assets/js/scriptsb12b.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById("barChart").getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sst", "Sun"],
                datasets: [{
                    label: 'data-1',
                    data: [12, 19, 3, 17, 28, 24, 7],
                    backgroundColor: "#ba9d5a"
                }, {
                    label: 'data-2',
                    data: [30, 29, 5, 5, 20, 3, 10],
                    backgroundColor: "#5a3903"
                }]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                }
            }
        });
    </script>
</body>

</html>