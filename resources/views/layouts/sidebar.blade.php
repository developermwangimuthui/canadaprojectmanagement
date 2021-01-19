<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Bantu Khaya Group <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
    <ul class="metismenu">
    <li class="g_heading">Project</li>
    <li class="{{ Route::currentRouteNamed('home') ? 'active ' : '' }}"><a href="{{route('home')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
    <li class="{{ Route::currentRouteNamed('project.home') ? 'active ' : '' }}"><a href="{{route('project.home')}}"><i class="fa fa-list-ol"></i><span>Project list</span></a></li>

    <li class="g_heading">Support</li>
    <li><a href="javascript:void(0)"><i class="fa fa-support"></i><span>Need Help?</span></a></li>
    <li><a href="javascript:void(0)"><i class="fa fa-tag"></i><span>ContactUs</span></a></li>
    </ul>
    </nav>
    </div>
