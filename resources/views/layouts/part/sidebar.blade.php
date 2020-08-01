<div class="sidebar">

<div class="sidebar-background"></div>
<div class="sidebar-wrapper scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{ asset('img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a href="index.html">
                    <i class="flaticon-home"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#clientes">
                    <i class="flaticon-users"></i>
                    <p>Clientes</p>
                    <span class="badge badge-count">1</span>
                    <span class="caret"></span>
                    
                </a>
                <div class="collapse" id="clientes">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ url('contacto') }}">
                                <span class="sub-item">Buscar</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('contacto/create') }}">
                                <span class="sub-item">Crear</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/gridsystem.html">
                                <span class="sub-item">Grid System</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/panels.html">
                                <span class="sub-item">Panels</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/notifications.html">
                                <span class="sub-item">Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/sweetalert.html">
                                <span class="sub-item">Sweet Alert</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/font-awesome-icons.html">
                                <span class="sub-item">Font Awesome Icons</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/flaticons.html">
                                <span class="sub-item">Flaticons</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/typography.html">
                                <span class="sub-item">Typography</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#forms">
                    <i class="flaticon-agenda-1"></i>
                    <p>Forms</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="forms">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="forms/forms.html">
                                <span class="sub-item">Basic Form</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/formvalidation.html">
                                <span class="sub-item">Form Validation</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/formwidget.html">
                                <span class="sub-item">Form Widget</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/formwizard.html">
                                <span class="sub-item">Form Wizard</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/formupload.html">
                                <span class="sub-item">Multiple Upload</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/formwysiwyg.html">
                                <span class="sub-item">WYSIWYG Editor</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#tables">
                    <i class="flaticon-box"></i>
                    <p>Tables</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="tables/tables.html">
                                <span class="sub-item">Basic Table</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables/datatables.html">
                                <span class="sub-item">Datatables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#maps">
                    <i class="flaticon-placeholder"></i>
                    <p>Maps</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="maps">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="maps/googlemaps.html">
                                <span class="sub-item">Google Maps</span>
                            </a>
                        </li>
                        <li>
                            <a href="maps/fullscreenmaps.html">
                                <span class="sub-item">Full Screen Maps</span>
                            </a>
                        </li>
                        <li>
                            <a href="maps/jqvmap.html">
                                <span class="sub-item">JQVMap</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#charts">
                    <i class="flaticon-graph"></i>
                    <p>Charts</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="charts/charts.html">
                                <span class="sub-item">Chart Js</span>
                            </a>
                        </li>
                        <li>
                            <a href="charts/sparkline.html">
                                <span class="sub-item">Sparkline</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="calendar.html">
                    <i class="flaticon-calendar"></i>
                    <p>Calendar</p>
                    <span class="badge badge-count badge-info">1</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="widgets.html">
                    <i class="flaticon-web"></i>
                    <p>Widgets</p>
                    <span class="badge badge-count badge-success">4</span>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Snippets</h4>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#email-nav">
                    <i class="flaticon-mailbox"></i>
                    <p>Email</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="email-nav">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="email-inbox.html">
                                <span class="sub-item">Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="email-compose.html">
                                <span class="sub-item">Email Compose</span>
                            </a>
                        </li>
                        <li>
                            <a href="email-detail.html">
                                <span class="sub-item">Email Detail</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#messages-app-nav">
                    <i class="flaticon-message"></i>
                    <p>Messages App</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="messages-app-nav">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="messages.html">
                                <span class="sub-item">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="conversations.html">
                                <span class="sub-item">Conversations</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="projects.html">
                    <i class="flaticon-agenda-1"></i>
                    <p>Projects</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="boards.html">
                    <i class="flaticon-web-1"></i>
                    <p>Boards</p>
                    <span class="badge badge-count">4</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="invoice.html">
                    <i class="flaticon-file-1"></i>
                    <p>Invoices</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="pricing.html">
                    <i class="flaticon-price-tag"></i>
                    <p>Pricing</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="faqs.html">
                    <i class="flaticon-round"></i>
                    <p>Faqs</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#custompages">
                    <i class="flaticon-placeholder"></i>
                    <p>Custom Pages</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="custompages">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="login.html">
                                <span class="sub-item">Login & Register 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="login2.html">
                                <span class="sub-item">Login & Register 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="userprofile.html">
                                <span class="sub-item">User Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="404.html">
                                <span class="sub-item">404</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#submenu">
                    <i class="flaticon-mailbox"></i>
                    <p>Menu Levels</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                    <ul class="nav nav-collapse">
                        <li>
                            <a data-toggle="collapse" href="#subnav1">
                                <span class="sub-item">Level 1</span>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="subnav1">
                                <ul class="nav nav-collapse subnav">
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Level 2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Level 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#subnav2">
                                <span class="sub-item">Level 1</span>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="subnav2">
                                <ul class="nav nav-collapse subnav">
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Level 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sub-item">Level 1</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>