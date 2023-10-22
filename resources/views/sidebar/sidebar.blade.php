
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu</span>
                </li>
                <li class="{{set_active(['home','em/dashboard'])}} submenu">
                    <a href="#" class="{{ set_active(['home','em/dashboard']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Panel</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['home'])}}" href="{{ route('home') }}">Panel de administración</a></li>
                        <li><a class="{{set_active(['em/dashboard'])}}" href="#">Panel de empleados</a></li>
                    </ul>
                </li>

                <li class="menu-title"> <span>Item's</span> </li>
                <li class="{{set_active(['employee/profile/*']) ? 'noti-dot' : ''}} submenu">
                    <a href="#"><i class="la la-user"></i>
                        <span> Catalogos </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        @if (Auth::user()->nombre_rol=='Super Admin')
                        <li><a class="{{set_active(['form/empresas/page'])}}" href="{{ route('form/empresas/page') }}"> Empresas</a></li>
                        @endif
                        <li><a class="{{set_active(['form/descuentos/page'])}}" href="{{ route('form/descuentos/page') }}"> Tipo Descuentos</a></li>

                        <li><a class="{{set_active(['form/rol_usuario/page'])}}" href="{{ route('form/rol_usuario/page') }}"> Rol Usuario</a></li>
                        <li><a class="{{set_active(['form/departamentos/page'])}}" href="{{ route('form/departamentos/page') }}"> Departamentos</a></li>

                        <li><a class="{{set_active(['form/puestos/page'])}}" href="{{ route('form/puestos/page') }}"> Puestos</a></li>
                        <li><a class="{{set_active(['form/planillas/page'])}}" href="{{ route('form/planillas/page') }}"> Tipo Planillas</a></li>
                    </ul>
                </li>

                @if (Auth::user()->nombre_rol=='Super Admin')
                    <li class="menu-title"> <span>Autenticación</span> </li>
                    <li class="{{set_active(['search/user/list','userManagement','activity/log','activity/login/logout'])}} submenu">
                        <a href="#" class="{{ set_active(['search/user/list','userManagement','activity/log','activity/login/logout']) ? 'noti-dot' : '' }}">
                            <i class="la la-user-secret"></i> <span> Controlador de usuario</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                            <li><a class="{{set_active(['search/user/list','userManagement'])}}" href="{{ route('userManagement') }}">Listado de Usuario</a></li>


                            <li><a class="{{set_active(['activity/log'])}}" href="{{ route('activity/log') }}">Registro de actividades</a></li>
                            <li><a class="{{set_active(['activity/login/logout'])}}" href="{{ route('activity/login/logout') }}">Actividades Usuario</a></li>
                        </ul>
                    </li>
                @endif





                <li class="menu-title"> <span>Recursos Humanos</span> </li>

                <li class="{{set_active(['form/salary/page','form/payroll/items'])}} submenu">
                    <a href="#" class="{{ set_active(['form/salary/page','form/payroll/items']) ? 'noti-dot' : '' }}"><i class="la la-money"></i>
                    <span>
                        Nómina Electrónica  </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/planillaselectronica/page'])}}" href="{{ route('form/planillaselectronica/page') }}">
                         Emitir Nominal </a></li>
                         <li><a class="{{set_active(['form/planillas/page'])}}" href="#">
                          Registro de Asistencia </a></li>
                        <li><a class="{{set_active(['form/salary/page'])}}" href="#">
                            Descuentos Empleados </a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Empleados</span> </li>
                <li class="{{set_active(['all/employee/list','all/employee/list','all/employee/card','form/holidays/new','form/leaves/new',
                    'form/leavesemployee/new','form/leavesettings/page','attendance/page',
                    'attendance/employee/page','form/departments/page','form/designations/page',
                    'form/timesheet/page','form/shiftscheduling/page','form/overtime/page'])}} submenu">
                    <a href="#" class="{{ set_active(['all/employee/list','all/employee/card','form/holidays/new','form/leaves/new',
                    'form/leavesemployee/new','form/leavesettings/page','attendance/page',
                    'attendance/employee/page','form/departments/page','form/designations/page',
                    'form/timesheet/page','form/shiftscheduling/page','form/overtime/page']) ? 'noti-dot' : '' }}">
                        <i class="la la-user"></i> <span>Empleados</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['all/employee/list','all/employee/card'])}}" href="{{ route('todos/empleados/card') }}">Todos Empleados</a></li>


                    </ul>
                </li>

                <li class="menu-title"> <span>Area Financiera</span> </li>
                <li class="{{set_active(['create/estimate/page','form/estimates/page','payments','expenses/page'])}} submenu">
                    <a href="#" class="{{ set_active(['create/estimate/page','form/estimates/page','payments','expenses/page']) ? 'noti-dot' : '' }}">
                        <i class="la la-files-o"></i>
                        <span> Créditos </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['create/estimate/page','form/estimates/page'])}}" href="#">Tipo de Creditos</a></li>
                        <li><a class="{{set_active(['payments'])}}" href="#">Listado de Creditos</a></li>
                        <li><a class="{{set_active(['expenses/page'])}}" href="#">Reportes</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
