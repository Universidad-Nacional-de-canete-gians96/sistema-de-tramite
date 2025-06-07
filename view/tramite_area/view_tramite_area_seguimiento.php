<!-- INICIO DEL CONTENIDO -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-11">
                <h1 class="m-0">
                    <center><b>MANTENIMIENTO DE TRÁMITE</b></center>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-1">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><i class="nav-icon fas fa-search-minus"></i>&nbsp; Búsqueda</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary" id="insert">
                    <div class="card-header">
                        <h3 class="card-title font-w-600 d-flex-gap"><i class="fas fa-search"></i>BÚSQUEDA DE EXPEDIENTES</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>*Para realizar la búsqueda de un documento presentado debe de ingresar el
                            Número de Expediente del Documento y seleccionar el año de presentación:</p>
                        <br>
                        <div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nro. Expediente:</label><label class="span-red">(*)</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Nro. DNI:</label><label class="span-red">(*)</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="">&nbsp;</label><br>
                                            <button class="btn btn-danger" style="width:100%" onclick="Traer_Datos_Seguimiento()"><i class="fa fa-search"></i>&nbsp; Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card card-olive" id="dat">
                    <div class="card-header">
                        <h3 class="card-title font-w-600 d-flex-gap"><i class="fas fa-file-pdf "></i> DATOS DEL TRÁMITE REALIZADO
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">

                        </div>
                        <div class="col-sm-5">
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn3 btn-primary" id="btnNew"><i class="fa fa-search"></i>Nueva Búsqueda</button>
                                </div>
                                <div class="col-md-5">
                                    <button type="button" class="btn btn3 btn-danger" id="btnhistorial"><i class="fa fa-plus"></i>Mostrar Historial</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="callout callout-success">

                                    <table border="2" class="table-doc table-data" cellspacing="0" cellpadding="5" id="tableDoc">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <h5 class="font-w-600">DATOS DEL DOCUMENTO</h5>
                                                    </font>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Expediente</th>
                                                <td>
                                                    <p id="celdaexpe"></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>N° Documento</th>
                                                <td>
                                                    <p id="celdanro"></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tipo</th>
                                                <td>
                                                    <p id="celdatipo"></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Asunto</th>
                                                <td>
                                                    <p id="celdasunto"></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="callout callout-info">
                                    <table border="2" class="table-remi table-data" cellspacing="0" cellpadding="5" id="tableRemitente">
                                        <tr>
                                            <th colspan="2">
                                                <h5 class="font-w-600">DATOS DEL REMITENTE</h5>
                                                </font>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>DNI</th>
                                            <td>
                                                <p id="celdadni"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <td>
                                                <p id="celdadatos"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>RUC</th>
                                            <td>
                                                <p id="celdaruc"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Entidad</th>
                                            <td>
                                                <p id="celdaenti"></p>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    </div>