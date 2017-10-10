<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?php base_url()?>assets/images/favicon_1.ico">

    <title>Back-Office</title>

    <!-- Base Css Files -->
    <link href="<?php base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="<?php base_url()?>assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php base_url()?>assets/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="<?php base_url()?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- animate css -->
    <link href="<?php base_url()?>assets/css/animate.css" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="<?php base_url()?>assets/css/waves-effect.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?php base_url()?>assets/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Datepicker -->
    <link href="<?php base_url()?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <!-- Custom Files -->
    <link href="<?php base_url()?>assets/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?php base_url()?>assets/js/modernizr.min.js"></script>

</head>



<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Trigger </span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <form class="navbar-form pull-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                        </div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </form>

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="text-center notifi-title">Notification</li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php base_url()?>assets/images/users/avatar-11.jpg" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <img src="<?php base_url()?>assets/images/users/avatar-11.jpg" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Jean Luc<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                            <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </div>

                    <p class="text-muted m-0">Administrateur</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li class="has_sub">
                        <a href="index.html" class="waves-effect"><i class="md-account-child"></i><span> Utilisateur </span></a>
						
							<ul class="list-unstyled">
                                    <li><a href="<?php echo base_url("Utilisateur")?>">Mise a jour utilisateur</a></li>
                            </ul>
                    </li>
                    <li class="has_sub">
                        <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Endroit </span></a>
						<ul class="list-unstyled">
                                    <li><a href="<?php echo base_url("Endroit")?>">Liste Endroit</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Avis </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url("Avis")?>">Liste Avis</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Liste Endroit</h3>

                                <button id="addToTable" class="btn btn-success waves-effect waves-light" onclick="add_matiere()">Nouveau endroit <i class="fa fa-plus"></i></button>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="table" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Ville</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div> <!-- container -->
        </div> <!-- content -->
        <footer class="footer text-right">
            2015 © Jean Luc.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <div class="side-bar right-bar nicescroll">
        <h4 class="text-center">Chat</h4>
        <div class="contact-list nicescroll">
        </div>
    </div>
    <!-- /Right-bar -->
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php base_url()?>assets/js/waves.js"></script>
<script src="<?php base_url()?>assets/js/wow.min.js"></script>
<script src="<?php base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php base_url()?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php base_url()?>assets/assets/jquery-detectmobile/detect.js"></script>
<script src="<?php base_url()?>assets/assets/fastclick/fastclick.js"></script>
<script src="<?php base_url()?>assets/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php base_url()?>assets/assets/jquery-blockui/jquery.blockUI.js"></script>


<!-- CUSTOM JS -->
<script src="<?php base_url()?>assets/js/jquery.app.js"></script>

<script src="<?php base_url()?>assets/assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php base_url()?>assets/assets/datatables/dataTables.bootstrap.js"></script>

<!-- Datepicker -->
<script src="<?php base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Endroit/ajax_list')?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },
            ],

        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });
    function add_endroit()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add endroit'); // Set Title to Bootstrap modal title
    }

    function edit_endroit(endroit_id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('Endroit/ajax_edit/')?>/" + endroit_id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="endroit_id"]').val(data.endroit_id);
                $('[name="ville"]').val(data.ville);
                $('[name="image"]').val(data.image);
                $('[name="description"]').val(data.description);           
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit endroit'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('Endroit/ajax_add')?>";
        } else {
            url = "<?php echo site_url('Endroit/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }

    function delete_endroit(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('Endroit/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

</script>

<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title">Modification endroit</h3>
                </div>
                <div class="panel-body form">
                    <form action="#" id="form" class="form-horizontal">
                        <input type="hidden" value="" name="id"/>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Ville :</label>
                                <div class="col-md-9">
                                    <input name="ville" placeholder="Quel ville ?" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Image :</label>
                                <div class="col-md-9">
                                    <input name="image" placeholder="image" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="control-label col-md-3">Description :</label>
                                <div class="col-md-9">
                                    <textarea name="description" placeholder="Quelque description" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                        </div>
                    </form>
                </div>

                <div class="panel-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Enregistre</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->
</body>
</html>