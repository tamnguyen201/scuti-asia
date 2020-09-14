<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="{{Auth::guard('admin')->user()->avatar}}" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <a href="{{ route('admin.information') }}" style="text-decoration: none">
                <div class="profile-usertitle-name">{{Auth::guard('admin')->user()->name}}</div>
            </a>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>@lang('custom.menu.online')</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{route('admin.home')}}"><em class="fa fa-dashboard">&nbsp;</em> @lang('custom.menu.dashboard')</a></li>
        <li class="{{ (request()->is('admin/employees*')) ? 'active' : '' }}"><a href="{{route('employees.index')}}"><span class="fa fa-users">&nbsp;</span> @lang('custom.menu.manager')</a></li>
        <li class="{{ (request()->is('admin/categories')) ? 'active' : '' }}"><a href="{{route('categories.index')}}"><span class="fa fa-tasks">&nbsp;</span> @lang('custom.menu.category')</a></li>
        <li class="{{ (request()->is('admin/jobs')) ? 'active' : '' }}"><a href="{{route('jobs.index')}}"><span class="fa fa-laptop">&nbsp;</span> @lang('custom.menu.job')</a></li>
        <li class="{{ (request()->is('admin/locations')) ? 'active' : '' }}"><a href="{{route('locations.index')}}"><span class="fa fa-location-arrow">&nbsp;</span> @lang('custom.menu.location')</a></li>
        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-child">&nbsp;</em> @lang('custom.menu.recruitment_detail') <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a href="{{route('jobs.index')}}"><span class="fa fa-laptop">&nbsp;</span> @lang('custom.menu.job')</a></li>
                <li><a class="" href="{{route('candidates.index')}}">
                <span class="fa fa-list-ul">&nbsp;</span> @lang('custom.menu.list')
                </a>
                </li>
                <li><a class="" href="{{route('candidates.evaluating')}}">
                <span class="fa fa-file-text">&nbsp;</span> @lang('custom.menu.evaluating')
                </a>
                </li>
                <li><a class="" href="{{route('candidates.finish')}}">
                <span class="fa fa-check">&nbsp;</span> @lang('custom.menu.finishing')
                </a>
                </li>
                <li><a class="" href="{{route('candidates.failed')}}">
                <span class="fa fa-times">&nbsp;</span> @lang('custom.menu.failed')
                </a>
                </li>
            </ul>
        </li>
        <li class="{{ (request()->is('admin/fullcalendar')) ? 'active' : '' }}"><a href="{{ route('fullcalendar.show') }}"><em class="fa fa-calendar">&nbsp;</em> @lang('custom.menu.calendar') </a></li>
        <li class="{{ (request()->is('admin/contacts')) ? 'active' : '' }}"><a href="{{route('contacts.index')}}"><span class="fa fa-phone">&nbsp;</span> @lang('custom.menu.contact')</a></li>
        <li class="parent {{ (request()->is('admin/companies')) ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-item-3">
            <em class="fa fa-cogs">&nbsp;</em> @lang('custom.menu.setting') <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li><a class="" href="{{route('companies.index')}}">
                <span class="fa fa-arrow-right">&nbsp;</span> @lang('custom.menu.company_info')
                </a>
                </li>
                <li><a class="" href="{{route('company_images.index')}}">
                <span class="fa fa-arrow-right">&nbsp;</span> @lang('custom.menu.company_images')
                </a>
                </li>
                <li><a class="" href="{{route('new-spaper.index')}}">
                <span class="fa fa-arrow-right">&nbsp;</span> @lang('custom.menu.new_spaper')
                </a>
                </li>
                <li><a class="" href="{{route('main-member.index')}}">
                <span class="fa fa-arrow-right">&nbsp;</span> @lang('custom.menu.main_member')
                </a>
                </li>
                <li><a class="" href="{{route('benefits.index')}}">
                <span class="fa fa-arrow-right">&nbsp;</span> @lang('custom.menu.benefit')
                </a>
                </li>
                <li><a class="" href="{{route('sections.index')}}">
                <span class="fa fa-arrow-right">&nbsp;</span> @lang('custom.menu.section')
                </a>
                </li>
            </ul>
        </li>
        <li><a href="{{route('admin.logout')}}"><em class="fa fa-power-off">&nbsp;</em> @lang('custom.menu.logout')</a></li>
    </ul>
</div>

