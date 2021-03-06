@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>


            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_action_access')
                <li class="{{ $request->segment(2) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('group_access')
            <li class="{{ $request->segment(2) == 'groups' ? 'active' : '' }}">
                <a href="{{ route('admin.groups.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.groups.title')</span>
                </a>
            </li>
            @endcan

            @can('contract_access')
            <li class="{{ $request->segment(2) == 'contracts' ? 'active' : '' }}">
                <a href="{{ route('admin.contracts.index') }}">
                    <i class="fa fa-files-o"></i>
                    <span class="title">@lang('quickadmin.contracts.title')</span>
                </a>
            </li>
            @endcan

            @can('betriebspartner_access')
            <li class="{{ $request->segment(2) == 'partnercompanies' ? 'active' : '' }}">
                <a href="{{ route('admin.companies.index') }}">
                    <i class="fa fa-university"></i>
                    <span class="title">Vertriebspartner</span>
                </a>
            </li>
            @endcan
<!-- ############################################################################################# -->
            @can('supplier_access')
            <li class="{{ $request->segment(2) == 'partnercompanies' ? 'active' : '' }}">
                <a href="{{ route('admin.suppliers.index') }}">
                    <i class="fa fa-university"></i>
                    <span class="title">Versorger</span>
                </a>
            </li>
            @endcan

            @can('betriebspartner_access')
            <li class="{{ $request->segment(2) == 'partnercompanies' ? 'active' : '' }}">
                <a href="{{ route('admin.companies.index') }}">
                    <i class="fa fa-gift"></i>
                    <span class="title">Angebote</span>
                </a>
            </li>
            @endcan

            @can('betriebspartner_access')
            <li class="{{ $request->segment(2) == 'partnercompanies' ? 'active' : '' }}">
                <a href="{{ route('admin.offers.index') }}">
                    <i class="fa fa-gift"></i>
                    <span class="title">Angebote</span>
                </a>
            </li>
            @endcan
<!-- ################################################################################################# -->





            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Passwort ändern</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Abmelden</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
