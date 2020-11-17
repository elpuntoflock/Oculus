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
                <h4 class="text-section"> </h4>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#clientes">
                    <i class="flaticon-users"></i>
                    <p>Clientes</p>
                    <span class="badge badge-count"> </span>
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
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#calendario"> 
                    <i class="flaticon-calendar"></i>
                    <p>Calendario</p>
                    <span class="badge badge-count badge-info">1</span>
                </a>
                <div class="collapse" id="calendario">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ url('evento') }}">
                                <span class="sub-item">Eventos</span>    
                            </a>
                            <a href="{{ url('evento/edit') }}">
                                <span class="sub-item">Editar Eventos</span>    
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="widgets.html">
                    <i class="flaticon-web"></i>
                    <p>Widgets</p>
                    <span class="badge badge-count badge-success">4</span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>