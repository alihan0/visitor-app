<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            

                            <a href="https://metatige.com" target="_blank" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/metatige-vlight.png" alt="" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/metatige-hlight.png" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        

                        
                    </div>

                    <div class="d-flex">

                        

                        

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-customize"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="px-lg-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://metatige.com" target="_blank">
                                                <img src="https://metatige.com/img/core-img/metatige-hcolor.png" alt="Metatige Dijital" >
                                                <span>Metatige Dijital</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://randevular.net" target="_blank">
                                                <img src="https://randevular.net/assets/img/logo_1.png" alt="Randevular.NET | Kolay Randevu Yönetim Otomasyonu" >
                                                <span>Randevular.NET</span>
                                            </a>
                                        </div>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?=$admin[0]["username"]?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                            
                                <a class="dropdown-item text-danger" href="/admin/logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Çıkış Yap</span></a>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </header>