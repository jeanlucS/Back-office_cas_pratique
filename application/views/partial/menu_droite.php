<div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <img src="<?php base_url()?>assets/images/users/avatar-11.jpg" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Jean Luc <span class="caret"></span></a>
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
                                    <li><a href="<?php echo base_url("Utilisateur")?>">Liste Utilisateur</a></li>
                            </ul>

                    </li>
                    <li class="has_sub">
                        <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Endroit</span></a>
						<ul class="list-unstyled">
                                    <li><a href="<?php echo base_url("Endroit")?>">Mise a jour endroit</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-palette"></i> <span>Avis</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url("Avis")?>">Liste Avis</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="index.html" class="waves-effect"><i class="md md-home"></i><span> Tableau de beaure </span></a>

                            <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url("Dashboard")?>">Tranche d'âge</a></li>
                            </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>