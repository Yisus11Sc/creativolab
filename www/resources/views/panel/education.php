<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Educación </title>

    <!-- Custom fonts for this template-->
    <link href="/assets/core/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/core/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Product Tour JavaScript Library --->
    <link href="/assets/core/product-tour/lib.css" rel="stylesheet">

    <!-- Module Toogle -->
    <link href="/assets/styles/toggle.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include __DIR__ . "/layouts/sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column m-0 p-0">

        <!-- Main Content -->
        <div id="content">

            <?php include __DIR__ . "/layouts/topbar.php" ?>

            <!-- Begin Page Content -->
            <div class="container-fluid p-3">

                <!-- Page Heading -->
                <div class="row p-0 m-0">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="mb-4 text-gray-900 font-weight-bold module">
                            Mi educación
                        </h3>
                        <div class="enable-module-toggle">
                            <label class="toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                   title="Show module">
                                <input
                                        type="checkbox"
                                    <?php
                                    if (isset($data) && $data['user']->isEducationEnabled()) {
                                        echo "checked";
                                    }
                                    ?>
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row p-0 m-0">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="module-fields" action="<?php echo $_ENV['APP_URL'] . '/module/education'; ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div class="form-group col-12" id="level-group">
                                                <label for="level" class="font-weight-bold text-gray-900"> Nivel escolar </label>
                                                <select id="level" class="form-control form-control-sm custom-select" name="level">
                                                    <option value="" selected> Seleccionar nivel </option>
                                                    <option value="Licenciatura"> Licenciatura </option>
                                                    <option value="Maestria"> Maestria </option>
                                                    <option value="Doctorado"> Doctorado </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12" id="degree-group">
                                                <label for="degree" class="font-weight-bold text-gray-900"> Título </label>
                                                <input id="degree" class="form-control" type="text" placeholder="Título" name="degree"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12" id="institute-group">
                                                <label for="institute" class="font-weight-bold text-gray-900">Institución</label>
                                                <input id="institute" class="form-control" type="text" placeholder="Institución educativa" name="institute">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6" id="startedAt-group">
                                                <label for="startedAt" class="font-weight-bold text-gray-900">
                                                    Inicio
                                                </label>
                                                <select id="startedAt" class="form-control custom-select" name="startedAt">
                                                    <option value="" selected> Año </option>
                                                    <option value="2022"> 2022 </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-6" id="endedAt-group">
                                                <label for="endedAt" class="font-weight-bold text-gray-900">
                                                    Culminación
                                                </label>
                                                <select id="endedAt" class="form-control custom-select" name="endedAt">
                                                    <option value="" selected> Año </option>
                                                    <option value="2022"> 2022 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12" id="details-group">
                                                <label for="details "class="font-weight-bold text-gray-900"> Detalles </label>
                                                <textarea id="details" rows="3" class="form-control" type="text" placeholder="Detalles" name="details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar </button>
                                        <button type="submit" id="add" class="btn btn-primary"> Añadir </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <button class="btn btn-success m-0 font-weight-bold shadow-sm" type="button" data-toggle="modal" data-target="#exampleModal">
                            &plus; Añadir nivel educativo
                        </button>
                    </div>

                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->

                <div class="col-12 p-0 m-0 module-content">
                    <div class="col-12 d-flex flex-wrap p-0">
                        <?php
                        if (isset($data['degrees']) && !empty($data['degrees'])) {
                            $degrees = $data['degrees'];

                            foreach ($degrees as $degree) {

                        ?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body">
                                        <p class="font-weight-bold mb-2 text-gray-900 h5">
                                            <?php echo $degree->getDegree() ?>
                                        </p>
                                        <p class="text-muted mb-2 text-gray-600 font-italic">
                                            <?php echo $degree->getLevel() ?>
                                        </p>
                                        <p class="text-muted mb-2 text-gray-600">
                                            <?php echo $degree->getInstitute() ?>
                                        </p>
                                        <p class="mb-0 text-gray-500">
                                            <?php echo $degree->getDetails() ?>
                                        </p>
                                    </div>
                                    <div class="card-footer bg-white d-flex justify-content-between font-italic">
                                        <div>
                                            <?php echo $degree->getStartedAt() . " - " . $degree->getEndedAt()  ?>
                                        </div>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                 aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">
                                                    Actions
                                                </div>
                                                <a class="dropdown-item"
                                                   href="<?php echo $_ENV['APP_URL'] . $_SERVER['REQUEST_URI'] . "/" .$degree->getId() ?>">
                                                    <i class="fa fa-pen text-gray-700 mr-2"> </i> Editar
                                                </a>
                                                <button class="dropdown-item" onclick="remove(<?php echo $degree->getId()?>);">
                                                    <i class="fa fa-trash text-gray-700 mr-2"> </i> Borrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</div>
<!-- End of Page Wrapper -->

<?php include __DIR__ . "/layouts/footer.php" ?>

<script src="/assets/core/sweetalert2/sweetalert2.js"> </script>

<!-- Prueba -->
<script type="text/javascript" src="/assets/scripts/education.js"></script>

<!-- Product Tour Library JavaScript -->
<script src="/assets/core/product-tour/lib.js"></script>

<script>
    /**
     * Product Tour JavaScript Library
     * */
    let isActive = localStorage.getItem('product-tour-is-active');
    if (isActive === null) {

        let tourOptions = {
            options: {
                darkLayerPersistence: true,
                next: 'Next',
                prev: 'Previous',
                finish: 'Okay!',
                mobileThreshold: 768
            },
            tips: [
                {
                    title: 'Módulo',
                    description: 'Este es el nombre del módulo',
                    selector: '.module',
                    x: 50,
                    y: 50,
                    offx: 0,
                    offy: 19,
                    position: 'bottom',
                    onSelected: false
                },
                {
                    title: 'Habilitar sección',
                    description: 'Esta opción te permite habilitar esta sección en tu plantilla',
                    selector: '.enable-module-toggle',
                    x: 50,
                    y: 50,
                    offx: -32,
                    offy: -17,
                    position: 'left', onSelected: false
                },
                {
                    title: 'Campos del módulo',
                    description: 'Aquí podrás agregar un nuevo contenido',
                    selector: '.module-fields',
                    x: 50,
                    y: 50,
                    offx: -32,
                    offy: -17,
                    position: 'left', onSelected: false
                },
                {
                    title: 'Contenido del módulo',
                    description: 'Aquí se muestra todo el contenido agregado',
                    selector: '.module-content',
                    x: 50,
                    y: 50,
                    offx: 0,
                    offy: 0,
                    position: 'left', onSelected: false
                }
            ]
        };
        ProductTourJS.init(tourOptions);
        ProductTourJS.start();
    }
</script>

</body>

</html>