<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="#" class="app-brand-link">
      <span class="app-brand-logo demo">
<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
  <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
  <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
</svg>
</span>
            <span class="app-brand-text demo menu-text fw-bold">{{__('main.dashboard')}}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.index' ? 'active' : ''}}">
            <a href="{{route('dashboard.index')}}" class="menu-link">
                <i class="ti ti-home me-2 ti-sm" style="color: #8454dc;"></i>
                <div>{{__('main.main')}}</div>
            </a>
        </li>
        @if(checkIfHasPermission('settings-read'))
            <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'settings.index' ? 'active' : ''}}">
                <a href="{{route('settings.index')}}" class="menu-link">
                    <i class="ti ti-settings me-2 ti-sm" style="color: #810628;"></i>
                    <div>{{__('main.settings')}}</div>
                </a>
            </li>
        @endif
        <li class="menu-item {{in_array(\Illuminate\Support\Facades\Route::currentRouteName() ,['permissions.index','roles.index','admins.index']) ? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="ti ti-users me-2 ti-sm" style="color: #4CAF50;"></i>
                {{__('main.admins')}}
            </a>
            <ul class="menu-sub">
                @if(Auth::guard('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value)
                    @if(checkIfHasPermission('permissions-read'))
                        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'permissions.index' ? 'active' : ''}}">
                            <a href="{{route('permissions.index')}}" class="menu-link">
                                <i class="ti ti-lock-access me-2 ti-sm" style="color: #810628;"></i>
                                <div>{{__('main.permissions')}}</div>
                            </a>
                        </li>
                    @endif
                @endif
                @if(checkIfHasPermission('roles-read'))
                    <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'roles.index' ? 'active' : ''}}">
                        <a href="{{route('roles.index')}}" class="menu-link">
                            <i class="ti ti-shield-lock me-2 ti-sm" style="color: #b9a008;"></i>
                            <div>{{__('main.roles')}}</div>
                        </a>
                    </li>
                @endif
                @if(checkIfHasPermission('admins-read'))
                    <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'admins.index' ? 'active' : ''}}">
                        <a href="{{route('admins.index')}}" class="menu-link">
                            <i class="ti ti-user-circle me-2 ti-sm" style="color: #1610d0;"></i>
                            <div>{{__('main.admins')}}</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        @if(auth('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value)
            <li class="menu-item {{in_array(\Illuminate\Support\Facades\Route::currentRouteName() ,['commands.index','terminal.index','file-manager.index','env.index']) ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="ti ti-settings me-2 ti-sm" style="color: #4CAF50;"></i>
                    {{__('main.system_settings')}}
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'env.index' ? 'active' : ''}}">
                        <a href="{{route('env.index')}}" class="menu-link" >
                            <i class="ti ti-settings-bolt  me-2 ti-sm" style="color: #810628;"></i>
                            <div>Env</div>
                        </a>
                    </li>
                    @if(checkIfHasPermission('commands-read'))
                        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'commands.index' ? 'active' : ''}}">
                            <a href="{{route('commands.index')}}" class="menu-link">
                                <i class="ti ti-command me-2 ti-sm" style="color: #6b69ce;"></i>
                                <div>{{__("main.commands")}}</div>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item  {{\Illuminate\Support\Facades\Route::currentRouteName() == 'terminal.index' ? 'active' : ''}}">
                        <a href="{{route('terminal.index')}}" class="menu-link" target="_blank">
                            <i class="ti ti-terminal  me-2 ti-sm" style="color: #810628;"></i>
                            <div>{{__("main.terminal")}}</div>
                        </a>
                    </li>
                    <li class="menu-item  {{\Illuminate\Support\Facades\Route::currentRouteName() == 'file-manager.index' ? 'active' : ''}}">
                        <a href="{{route('file-manager.index')}}" class="menu-link" target="_blank">
                            <i class="ti ti-folder me-2 ti-sm" style="color: #810628;"></i>
                            <div>{{__("main.file_manager")}}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('backup')}}" class="menu-link">
                            <i class="ti ti-database-export me-2 ti-sm" style="color: #810628;"></i>
                            <div>{{__("main.backup_database")}}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/log-viewer')}}" class="menu-link" target="_blank">
                            <i class="ti ti-file-search me-2 ti-sm" style="color: #810628;"></i>
                            <div>Log Viewer</div>
                        </a>
                    </li>
                    @if(env('TELESCOPE_ENABLED') == true)
                        <li class="menu-item">
                            <a href="{{url('/telescope')}}" class="menu-link" target="_blank">
                                <i class="ti ti-telescope me-2 ti-sm" style="color: #810628;"></i>
                                <div>Telescope</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        <li class="menu-item ">
            <a href="{{route('logout')}}" class="menu-link">
                <i class="ti ti-logout me-2 ti-sm" style="color: #4CAF50;"></i>
                <div>{{__('main.logout')}}</div>
            </a>
        </li>
    </ul>
</aside>
