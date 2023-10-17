@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Perfil</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Perfil</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        @if (!empty($user[0]->user_avatar))
                                            <a href="{{ url('empleado/perfil/' . $user[0]->id_usuario) }}"><img
                                                    alt=""
                                                    src="{{ URL::to('/assets/images/' . $user[0]->user_avatar) }}"
                                                    alt="{{ $user[0]->user_avatar }}"></a>
                                        @else
                                            <a href="{{ url('empleado/perfil/' . $user[0]->id_usuario) }}"
                                                class="avatar"><img src="{{ asset('/assets/images/img_n.jpg') }}"
                                                    alt="img_n"></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">

                                                <h3 class="user-name m-t-0 mb-0">{{ $user[0]->user_nombre }}</h3>
                                                <h6 class="text-muted">Departamento: {{ $user[0]->user_departamento }}</h6>
                                                <small class="text-muted">Puesto:{{ $user[0]->user_puesto }}</small>
                                                @if (is_null($user[0]->user_id))
                                                    <div class="staff-id">ID empleado: No se asignado Código de Empleado
                                                    </div>
                                                @else
                                                    <div class="staff-id">ID empleado: {{ $user[0]->user_id }}</div>
                                                @endif
                                                <div class="small doj text-muted">Fecha de Registro:
                                                    {{ $user[0]->user_fecha_ingreso }}</div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="#">Enviar
                                                        mensaje</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                @if (!empty($users))
                                                    <li>

                                                        <div class="title">Teléfono Móvil:</div>
                                                        <div class="text"><a
                                                                href="">{{ $users->telefono_movil }}</a></div>

                                                    </li>

                                                    <li>


                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href="">{{ $users->email }}</a>
                                                        </div>

                                                    </li>

                                                    <li>

                                                        <div class="title">Cumpleaños:</div>
                                                        <div class="text">
                                                            {{ date('d F, Y', strtotime($users->fecha_nacimiento)) }}
                                                        </div>

                                                    </li>
                                                    <li>

                                                        <div class="title">Dirección:</div>
                                                        <div class="text">{{ $users->direccion }}</div>

                                                    </li>
                                                    <li>

                                                        <div class="title">Género:</div>
                                                        <div class="text">{{ $users->genero }}</div>

                                                    </li>
                                                    <li>
                                                        <div class="title">Jefe Superior:</div>
                                                        <div class="text">

                                                            <a href="#">
                                                                {{ $users->jefe_inmediato }}
                                                            </a>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="title">Teléfono:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Cumpleaños:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Dirección:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Género:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Jefe Superior:</div>
                                                        <div class="text">

                                                            <a href="#">
                                                                <div class="text">N/A</div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon"
                                        href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Perfil</a>
                            </li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Documentos/Papeleria</a>
                            </li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank &
                                    Statutory <small class="text-danger">(Admin Only)</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Información Primaria del Empleado: <a href="#"
                                            class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">CUI-DPI:</div>
                                            <div class="text">{{ $users->cui_dpi }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Fecha Vencimiento DPI.</div>
                                            <div class="text">{{ date('d F, Y', strtotime($users->fecha_vec_dpi)) }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">NIT:</div>
                                            <div class="text"><a href="">{{ $users->nit }}</a></div>
                                        </li>
                                        <li>
                                            @if(is_null($users->no_licencia))
                                            <div class="title">No Licencia:</div>
                                            <div class="text"><a href="">NO APLICA</a></div>
                                            @else
                                            <div class="title">No Licencia:</div>
                                            <div class="text"><a href="">{{ $users->no_licencia }}</a></div>
                                            @endif
                                        </li>
                                        <li>
                                            @if(is_null($users->fecha_vec_licencia))
                                            <div class="title">Fecha Vencimiento Licencia:</div>
                                            <div class="text"><a
                                                    href="">NO APLICA</a>
                                            </div>
                                            @else
                                            <div class="title">Fecha Vencimiento Licencia:</div>
                                            <div class="text"><a
                                                    href="">{{ date('d F, Y', strtotime($users->fecha_vec_licencia)) }}</a>
                                            </div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tipo de Licencia:</div>
                                            <div class="text"><a href="">{{ $users->tipo_licencia }}</a></div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Información Secundaria del Empleado:</h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Teléfo Móvil:</div>
                                            <div class="text"><a href="">{{ $users->movil }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Nacionalidad</div>
                                            <div class="text">{{ $users->nacionalidad }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            <div class="text">{{ $users->religion }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Estado Civil:</div>
                                            <div class="text">{{ $users->estado_civil }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Total Hijos</div>
                                            <div class="text">{{ $users->total_hijos }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Información Bancaria</h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Banco:</div>
                                            <div class="text">{{ $users->banco }}</div>
                                        </li>

                                        <li>
                                            <div class="title">No. Cuenta:</div>
                                            <div class="text">{{ $users->no_cuenta }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Tipo Cuenta:</div>
                                            <div class="text">{{ $users->tipo_cuenta }}</div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Family Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#family_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Relationship</th>
                                                    <th>Date of Birth</th>
                                                    <th>Phone</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Leo</td>
                                                    <td>Brother</td>
                                                    <td>Feb 16th, 2019</td>
                                                    <td>9876543210</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a aria-expanded="false" data-toggle="dropdown"
                                                                class="action-icon dropdown-toggle" href="#"><i
                                                                    class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#education_info"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and
                                                            Science (UG)</a>
                                                        <div>Bsc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and
                                                            Science (PG)</a>
                                                        <div>Msc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Experience <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#experience_info"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Zen
                                                            Corporation</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Dalt
                                                            Technology</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Info Tab -->

                <!-- Projects Tab -->
                @if(is_null($users->cui_dpi))
                <div class="tab-pane fade" id="emp_projects">

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img-thumbnail  mx-auto d-block">
                                        <a href="{{ URL::to('/assets/images/img_n.jpg') }}" class="image-tile" target="_blank">
                                         <img class="img-fluid" src="{{ URL::to('/assets/images/falta_info.jpg') }}"  alt="NO FOTOGRAFIA" >
                                         </a>
                                      </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                @else
                <div class="tab-pane fade" id="emp_projects">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a  href="#" data-toggle="modal" data-target="#edit_dpi_frontal" data-toggle="modal"
                                                class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Actualizar</a>

                                        </div>
                                    </div>
                                    @if(is_null($users->img_frontal_dpi))
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/images/img_n.jpg') }} "class="image-tile" target="_blank">Fotografia Dpi Frontal</a></h4>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/images/img_n.jpg') }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/images/img_n.jpg') }}"  alt="NO FOTOGRAFIA" >
                                           </a>
                                        </div>
                                    </div>
                                    @else

                                    <h4 class="project-title"><a href="{{ URL::to('/assets/documentos_personales/' .$users->img_frontal_dpi) }} "class="image-tile" target="_blank">Fotografia Dpi Frontal</a></h4>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/documentos_personales/' .$users->img_frontal_dpi) }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/documentos_personales/' .$users->img_frontal_dpi) }}"  alt="{{ $users->img_frontal_dpi }}" >
                                           </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a  href="#" data-toggle="modal" data-target="#edit_dpi_adverso" data-toggle="modal"
                                            class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Actualizar</a>

                                        </div>
                                    </div>

                                    @if(is_null($users->img_adverso_dpi))
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/images/img_n.jpg') }} "class="image-tile" target="_blank">Fotografia DPI Adverso</a></h4>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/images/img_n.jpg') }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/images/img_n.jpg') }}"  alt="NO FOTOGRAFIA"  >
                                           </a>
                                        </div>
                                    </div>
                                    @else
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/documentos_personales/' .$users->img_adverso_dpi) }} "class="image-tile" target="_blank">Fotografia DPI Adverso</a></h4>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/documentos_personales/' .$users->img_adverso_dpi) }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/documentos_personales/' .$users->img_adverso_dpi) }}"  alt="{{ $users->img_adverso_dpi }}"  >
                                           </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a  href="#" data-toggle="modal" data-target="#edit_pdf_policiacos" data-toggle="modal"
                                            class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Actualizar</a>

                                        </div>
                                    </div>

                                    @if(is_null($users->pdf_policiacos))
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/images/pdf_n.jpg') }} "class="image-tile" target="_blank">Antecendentes Políciales</a></h4>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/images/pdf_n.jpg') }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/images/pdf_n.jpg') }}"  alt="NO FOTOGRAFIA"  >
                                           </a>
                                        </div>
                                    </div>
                                    @else
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/documentos_personales/pdf/' .$users->pdf_policiacos) }} "class="image-tile" target="_blank">Antecendentes Políciales</a></h4>
                                    <div class="col-lg-12 col-md-12">

                                            <embed src="{{ URL::to('/assets/documentos_personales/pdf/' .$users->pdf_policiacos) }}" type="application/pdf" width="100%" height="100%" />

                                    </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a  href="#" data-toggle="modal" data-target="#edit_pdf_penales" data-toggle="modal"
                                            class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Actualizar</a>

                                        </div>
                                    </div>
                                    @if(is_null($users->pdf_penales))
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/images/pdf_n.jpg') }} "class="image-tile" target="_blank">Antecendentes Penales</a></h4>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/images/pdf_n.jpg') }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/images/pdf_n.jpg') }}"  alt="NO FOTOGRAFIA"  >
                                           </a>
                                        </div>
                                    </div>
                                    @else
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/documentos_personales/pdf/' .$users->pdf_penales) }} "class="image-tile" target="_blank">Antecendentes Penales</a></h4>
                                    <div class="col-lg-12 col-md-12">


                                            <embed src="{{ URL::to('/assets/documentos_personales/pdf/' .$users->pdf_penales) }}" type="application/pdf" width="100%" height="100%" />

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a  href="#" data-toggle="modal" data-target="#edit_pdf_cv" data-toggle="modal"
                                            class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Actualizar</a>

                                        </div>
                                    </div>

                                    @if(is_null($users->pdf_cv))
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/images/pdf_n.jpg') }} "class="image-tile" target="_blank">Curriculum Vitae CV</a></h4>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-thumbnail  mx-auto d-block">
                                          <a href="{{ URL::to('/assets/images/pdf_n.jpg') }}" class="image-tile" target="_blank">
                                           <img class="img-fluid" src="{{ URL::to('/assets/images/pdf_n.jpg') }}"  alt="NO FOTOGRAFIA"  >
                                           </a>
                                        </div>
                                    </div>
                                    @else
                                    <h4 class="project-title"><a href="{{ URL::to('/assets/documentos_personales/pdf/' .$users->pdf_cv) }} "class="image-tile" target="_blank">Curriculum Vitae CV</a></h4>
                                    <div class="col-lg-12 col-md-12">

                                            <embed src="{{ URL::to('/assets/documentos_personales/pdf/' .$users->pdf_cv) }}" type="application/pdf" width="100%" height="1000px"  />

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                @endif
                <!-- /Projects Tab -->

                <!-- Bank Statutory Tab -->
                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Basic Salary Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary basis <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select salary basis type</option>
                                                <option>Hourly</option>
                                                <option>Daily</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary amount <small class="text-muted">per
                                                    month</small></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Type your salary amount" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment type</label>
                                            <select class="select">
                                                <option>Select payment type</option>
                                                <option>Bank transfer</option>
                                                <option>Check</option>
                                                <option>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> PF Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF contribution</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF No. <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3 class="card-title"> ESI Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI contribution</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI No. <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ESI rate</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Bank Statutory Tab -->
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">xxInformación del Perfil-Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('perfil/informacion/save') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block"
                                            src="{{ URL::to('/assets/images/' . $user[0]->user_avatar) }}"
                                            alt="{{ $user[0]->user_avatar }}">
                                        <div class="fileupload btn">
                                            <span class="btn-text">Editar</span>
                                            <input class="upload" type="file" id="images" name="images">
                                            @if (!empty($users))
                                                <input type="hidden" name="hidden_image" id="hidden_image"
                                                    value="{{ $user[0]->user_avatar }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nombre Completo:</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $user[0]->nombre_completo }}">
                                                <input type="hidden" class="form-control" id="user_id" name="user_id"
                                                    value="{{ $user[0]->id_usuario }}">
                                                <input type="hidden" class="form-control" id="email" name="email"
                                                    value="{{ $user[0]->user_correo }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento:</label>
                                                <div>
                                                    @if (!empty($users))
                                                        <input type="date" class="form-control" id="birthDate"
                                                            name="birthDate" min="1925-01-01" max="2004-01-01"
                                                            value="{{ $users->fecha_nacimiento }}" />
                                                    @else
                                                        <input type="date" class="form-control" id="birthDate"
                                                            name="birthDate" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Género</label>
                                                <select class="select form-control" id="gender" name="gender">
                                                    @if (!empty($users))
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    @else
                                                        <option value="{{ $users->genero }}"
                                                            {{ $users->genero == $users->genero ? 'selected' : '' }}>
                                                            {{ $users->genero }} </option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Direccion:</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $users->direccion }}">
                                        @else
                                            <input type="text" class="form-control" id="address" name="address">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="ACTIVO" readonly required>
                                        @else
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="{{ $users->estado }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad:</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="" name="country"
                                                value="{{ $users->ciudad }}">
                                        @else
                                            <input type="text" class="form-control" id="" name="country">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo Postal</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="pin_code" name="pin_code"
                                                value="{{ $users->codigo_postal }}">
                                        @else
                                            <input type="text" class="form-control" id="pin_code" name="pin_code">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número Teléfonico:</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="phoneNumber"
                                                name="phone_number" value="{{ $users->telefono_movil }}">
                                        @else
                                            <input type="text" class="form-control" id="phoneNumber"
                                                name="phone_number">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Departmento: <span class="text-danger">*</span></label>
                                        <select class="select" id="department" name="department">
                                            @if (!empty($users))
                                                <option value="{{ $users->departamento }}"
                                                    {{ $users->departamento == $users->departamento ? 'selected' : '' }}>
                                                    {{ $users->departamento }} </option>
                                                @foreach ($PersonalDepartamentos as $PersonalDepartamento)
                                                    <option value="{{ $PersonalDepartamento->nombre }}">
                                                        {{ $PersonalDepartamento->nombre }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($PersonalDepartamentos as $PersonalDepartamento)
                                                    <option value="{{ $PersonalDepartamento->nombre }}">
                                                        {{ $PersonalDepartamento->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Puesto-Designado <span class="text-danger">*</span></label>
                                        <select class="select" id="designation" name="designation">
                                            @if (!empty($users))
                                                <option value="{{ $users->puesto_designado }}"
                                                    {{ $users->puesto_designado == $users->puesto_designado ? 'selected' : '' }}>
                                                    {{ $users->puesto_designado }} </option>
                                                @foreach ($Puestos as $Puesto)
                                                    <option value="{{ $Puesto->nombre }}">{{ $Puesto->nombre }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($Puestos as $Puesto)
                                                    <option value="{{ $Puesto->nombre }}">{{ $Puesto->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jefe Inmediato: <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="reports_to" required>
                                            @if (!empty($users))
                                                <option value="{{ $users->jefe_inmediato }}"
                                                    {{ $users->jefe_inmediato == $users->jefe_inmediato ? 'selected' : '' }}>
                                                    {{ $users->jefe_inmediato }} </option>
                                                @foreach ($User as $Users)
                                                    <option value="{{ $Users->nombre }}">{{ $Users->nombre }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($User as $Users)
                                                    <option value="{{ $Users->nombre }}">{{ $Users->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Registrar Información</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Modal -->

        <!-- Personal Info Modal aqui es el modal de ingresar datos personales del Empleado -->

        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Datos Primario Personales del Empleado:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('empleado/informacion/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                readonly>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cui DPI:</label>
                                        <input type="text" class="form-control @error('cui_dpi') is-invalid @enderror"
                                            name="cui_dpi" value="{{ $users->cui_dpi }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha Vecimiento DPI:</label>

                                        <input type="date"
                                            class="form-control  @error('fecha_vec_dpi') is-invalid @enderror"
                                            type="text" name="fecha_vec_dpi" value="{{ $users->fecha_vec_dpi }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No. Licencia:</label>
                                        <input type="text"
                                            class="form-control @error('no_licencia') is-invalid @enderror"
                                            name="no_licencia" value="{{ $users->no_licencia }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha Vec. Licencia:</label>

                                        <input type="date"
                                            class="form-control  @error('fecha_vec_licencia') is-invalid @enderror"
                                            type="text" name="fecha_vec_licencia"
                                            value="{{ $users->fecha_vec_licencia }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Tipo Licencia:</label>
                                        <select class="select form-control" id="tipo_licencia" name="tipo_licencia">
                                            <option value="{{ $users->tipo_licencia }}"
                                                {{ $users->tipo_licencia == $users->tipo_licencia ? 'selected' : '' }}>
                                                {{ $users->tipo_licencia }} </option>
                                                <option value="NO APLICA">NO APLICA</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="M">M</option>
                                            <option value="T">T</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIT:</label>
                                        <input type="text" class="form-control @error('nit') is-invalid @enderror"
                                            name="nit" value="{{ $users->nit }}" required>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <h4>Datos Segundario Personales del Empleado:</h4>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Movil:</label>
                                        <input type="number" class="form-control @error('movil') is-invalid @enderror"
                                            name="movil" value="{{ $users->movil }}" required>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>NACIONALIDAD:</label>
                                        <input type="text"
                                            class="form-control @error('nacionalidad') is-invalid @enderror"
                                            name="nacionalidad" value="{{ $users->nacionalidad }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label>Religion:</label>
                                        <select class="select form-control" id="religion" name="religion">
                                            <option value="{{ $users->religion }}"
                                                {{ $users->religion == $users->religion ? 'selected' : '' }}>
                                                {{ $users->religion }} </option>
                                            <option value="EVANGELICA">EVANGELICA</option>

                                            <option value="CATOLICA">CATOLICA</option>
                                            <option value="MORMONA">MORMONA</option>
                                            <option value="TESTIGOS DE JEHOVA">TESTIGOS DE JEHOVA</option>
                                            <option value="OTRAS">OTRAS</option>
                                        </select>


                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label>Estado Civil:</label>
                                        <select class="select form-control" id="estado_civil" name="estado_civil">
                                            <option value="{{ $users->estado_civil }}"
                                                {{ $users->estado_civil == $users->estado_civil ? 'selected' : '' }}>
                                                {{ $users->estado_civil }} </option>
                                            <option value="SOLTERO">SOLTERO</option>
                                            <option value="VIUDO/A">VIUDO/A</option>
                                            <option value="DIVORCIADO">DIVORCIADO</option>

                                            <option value="CASADO">CASADO</option>
                                            <option value="OTROS">OTROS</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>TOTAL HIJOS:</label>
                                        <input type="number"
                                            class="form-control @error('total_hijos') is-invalid @enderror"
                                            name="total_hijos" value="{{ $users->total_hijos }}" required>
                                    </div>


                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <h4>Datos Bancarios:</h4>
                                </div>

                            </div>

                            <div class="row">



                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label>Banco:</label>
                                        <select class="select form-control" id="banco" name="banco">
                                            <option value="{{ $users->banco }}"
                                                {{ $users->banco == $users->banco ? 'selected' : '' }}>
                                                {{ $users->banco }} </option>
                                            <option value="El Crédito Hipotecario Nacional de Guatemala">El Crédito
                                                Hipotecario Nacional de Guatemala</option>

                                            <option value="Banco Inmobiliario, S.A.">Banco Inmobiliario, S.A.</option>
                                            <option value="Banco de los Trabajadores">Banco de los Trabajadores</option>
                                            <option value="‌Banco Industrial, S.A.">‌Banco Industrial, S.A.</option>
                                            <option value="Banco de Desarrollo Rural">Banco de Desarrollo Rural</option>
                                        </select>


                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No. Cuenta:</label>
                                        <input type="text"
                                            class="form-control @error('no_cuenta') is-invalid @enderror" name="no_cuenta"
                                            value="{{ $users->no_cuenta }}" required>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label>Tipo Cuenta:</label>
                                        <select class="select form-control" id="tipo_cuenta" name="tipo_cuenta">
                                            <option value="{{ $users->tipo_cuenta }}"
                                                {{ $users->tipo_cuenta == $users->tipo_cuenta ? 'selected' : '' }}>
                                                {{ $users->tipo_cuenta }} </option>
                                            <option value="AHORRO">AHORRO</option>
                                            <option value="MONETARIA">MONETARIA</option>

                                        </select>


                                    </div>
                                </div>

                            </div>





                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Registrar
                                    Informacion</button>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    <!-- Fotografia DPI FRONTO  -->
        <div id="edit_dpi_frontal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fotografía Frontal DPI:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dpi/dpifrontal/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                readonly>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dpi Frontal:<span class="text-danger">*</span></label>
                                        <input class="form-control dropify   @error('img_frontal_dpi') is-invalid @enderror" type="file" id="img_frontal_dpi" name="img_frontal_dpi" required>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                         @endif
                                        <input type="hidden" class="form-control" name="img_dpi_frontal_hidden" value="{{ $users->img_frontal_dpi }}"
                                        readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Registrar
                                    Informacion</button>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
            <!-- Fotografia DPI ADVERSO  -->
            <div id="edit_dpi_adverso" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Fotografía Adverso DPI:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('dpi/dpiadverso/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                    readonly>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Dpi Adverso:<span class="text-danger">*</span></label>
                                            <input class="form-control dropify   @error('img_adverso_dpi') is-invalid @enderror" type="file" id="img_adverso_dpi" name="img_adverso_dpi" required>
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                             @endif
                                            <input type="hidden" class="form-control" name="img_dpi_adverso_hidden" value="{{ $users->img_adverso_dpi }}"
                                            readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Registrar
                                        Informacion</button>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

                <!--  PDF POLICIACOS  -->
                <div id="edit_pdf_policiacos" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pdf Policiacos:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('policiacos/pdfpoliciacos/update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                        readonly>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pdf Policiacos:<span class="text-danger">*</span></label>
                                                <input class="form-control dropify   @error('pdf_policiacos') is-invalid @enderror" type="file" id="pdf_policiacos" name="pdf_policiacos" required>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                 @endif
                                                <input type="hidden" class="form-control" name="pdf_policiacos_hidden" value="{{ $users->pdf_policiacos }}"
                                                readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Registrar
                                            Informacion</button>
                                    </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

                    <!-- PDF PENALES -->
            <div id="edit_pdf_penales" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pdf Penales:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('penales/pdfpenales/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                    readonly>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pdf Penales:<span class="text-danger">*</span></label>
                                            <input class="form-control dropify   @error('pdf_penales') is-invalid @enderror" type="file" id="pdf_penales" name="pdf_penales" required>
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                             @endif
                                            <input type="hidden" class="form-control" name="pdf_penales_hidden" value="{{ $users->pdf_penales }}"
                                            readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Registrar
                                        Informacion</button>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

                      <!-- CV -->
                      <div id="edit_pdf_cv" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pdf Curriculum Vitae:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cv/pdfcv/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                            readonly>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Pdf CV:<span class="text-danger">*</span></label>
                                                    <input class="form-control dropify   @error('pdf_cv') is-invalid @enderror" type="file" id="pdf_cv" name="pdf_cv" required>
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                     @endif
                                                    <input type="hidden" class="form-control" name="pdf_cv_hidden" value="{{ $users->pdf_cv }}"
                                                    readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="submit-section">
                                            <button type="submit" class="btn btn-primary submit-btn">Registrar
                                                Informacion</button>
                                        </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>



<!-- ultimo div-->
    </div>


    <!-- FINN/Personal Info Modal -->

    <!-- Family Info Modal -->
    <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Family Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Family Member <a href="javascript:void(0);"
                                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birth <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birth <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Family Info Modal -->

    <!-- Emergency Contact Modal -->
    <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Primary Contact</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone 2</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Primary Contact</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone 2</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Emergency Contact Modal -->

    <!-- Education Modal -->
    <div id="education_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Education Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Oxford University"
                                                    class="form-control floating">
                                                <label class="focus-label">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Computer Science"
                                                    class="form-control floating">
                                                <label class="focus-label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="01/06/2002"
                                                        class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Starting Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="31/05/2006"
                                                        class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Complete Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="BE Computer Science"
                                                    class="form-control floating">
                                                <label class="focus-label">Degree</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Grade A" class="form-control floating">
                                                <label class="focus-label">Grade</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Oxford University"
                                                    class="form-control floating">
                                                <label class="focus-label">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Computer Science"
                                                    class="form-control floating">
                                                <label class="focus-label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="01/06/2002"
                                                        class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Starting Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="31/05/2006"
                                                        class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Complete Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="BE Computer Science"
                                                    class="form-control floating">
                                                <label class="focus-label">Degree</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Grade A" class="form-control floating">
                                                <label class="focus-label">Grade</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Education Modal -->

    <!-- Experience Modal -->
    <div id="experience_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Experience Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                    value="Digital Devlopment Inc">
                                                <label class="focus-label">Company Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                    value="United States">
                                                <label class="focus-label">Location</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                    value="Web Developer">
                                                <label class="focus-label">Job Position</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker"
                                                        value="01/07/2007">
                                                </div>
                                                <label class="focus-label">Period From</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker"
                                                        value="08/06/2018">
                                                </div>
                                                <label class="focus-label">Period To</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                    value="Digital Devlopment Inc">
                                                <label class="focus-label">Company Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                    value="United States">
                                                <label class="focus-label">Location</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                    value="Web Developer">
                                                <label class="focus-label">Job Position</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker"
                                                        value="01/07/2007">
                                                </div>
                                                <label class="focus-label">Period From</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker"
                                                        value="08/06/2018">
                                                </div>
                                                <label class="focus-label">Period To</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Experience Modal -->

    <!-- /Page Content -->
    </div>

        <!-- /Page Wrapper -->
        @section('script')

        <!-- /LLama la funcion de libreria dropify de imagen -->
        <script src="{{asset('assets/js/dropify.js')}}"></script>




        @endsection



@endsection
