@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Formulario Registro Técnico</h2>
            <ol class="breadcrumb">
                <li>
                    Empleados
                </li>
                <li>
                    <a href="{{ route('tecnicos') }}">Técnico</a>
                </li>
                <li class="active">
                    <strong>Crear</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Foto</h5>
                    </div>
                    <div>

                        <div class="ibox-content no-padding border-left-right">

                            <img id="pf_foto"  class="img-responsive" style="height: 350px; width: 300px;" >
                            <input type='file' name='img_avatar' id='verborgen_file' />

                        </div>
                        <div class="ibox-content profile-content">
                            <h5>
                                Observaciones
                            </h5>
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Datos personales</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div>
                            {!! Form::open(['url' => 'tecnico/store','method'=>'POST','class' => 'form-horizontal', 'name' => 'frm-data-store-tecnico', 'id' => 'frm-data-store-tecnico']) !!}

                            <div class="form-group validate-tecnico" id="div-ci">
                                <label class="col-sm-2 control-label">Cédula de Identidad *</label>
                                <div class="col-sm-10">
                                    <input type="number" name="ci" class="form-control">
                                </div>
                                <p id="err-edt-ci" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-tecnico" id="div-nombres">
                                <label class="col-sm-2 control-label">Nombre completo *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombres" class="form-control">
                                </div>
                                <p id="err-edt-nombres" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-tecnico" id="div-apellido_paterno">
                                <label class="col-sm-2 control-label">Apellido paterno *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="apellido_paterno" class="form-control">
                                </div>
                                <p id="err-edt-apellido_paterno" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-tecnico" id="div-apellido_materno">
                                <label class="col-sm-2 control-label">Apellido materno *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="apellido_materno" class="form-control">
                                </div>
                                <p id="err-edt-apellido_materno" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-at" aria-hidden="true"></i></span>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    </span>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Teléfono fijo:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        <input type="number" name="telefono_fijo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Teléfono celular:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                        <input type="number" name="telefono_celular" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-3 col-md-3">
                                    <a href="{{route('tecnicos')}}" class="btn btn-default">Cancelar</a>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <button class="btn btn-primary" type="submit"  id="btn-crear-tecnico">Guardar cambios</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@push('head')
    <link href="{{ asset('site/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Steps -->
    <script src="{{ asset('site/js/plugins/steps/jquery.steps.min.js') }}"></script>
    <!-- Jquery Validate -->
    <script src="{{ asset('site/js/plugins/validate/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
            ////////////////////////////////////////////

            $('#verborgen_file').hide();
            $('#pf_foto').css('background-image', 'url("'+'{{ asset('site/img/profile_big.jpg') }}'+'")');
            $('#pf_foto').on('click', function () {
                $('#verborgen_file').click();
            });
            $('#verborgen_file').change(function () {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onloadend = function () {
                    $('#pf_foto').css('background-image', 'url("' + reader.result + '")');
                }
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    $('#pf_foto').css('background-image', 'url("")');
                }

            });
            $("[name='frm-data-img']").submit(function(e){
                var file=$("#verborgen_file").val();
                if(file==''){
                    alert("Porfavor seleccione una imagen");
                    e.preventDefault();
                }else{

                }
            });
        });

    </script>
@endpush
@endsection