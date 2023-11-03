<?php

$show = @$_GET["show"];
$q = @$_GET["q"];

switch ($show) {
    case 'admin':

        switch ($q) {
            case 'all':
                ?>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <a href="main.php?page=account&show=admin&q=add" class="btn btn-success float-end"  style="margin-right:15px">Yeni Ekle</a>
                            <a href="main.php?page=account&show=admin&q=all" class="btn btn-primary float-end"  style="margin-right:15px">Tüm Yöneticiler</a>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tüm Yöneticiler</h4>
                                <p class="card-title-desc">Tabloda sistemde kayıtlı olan yöneticileri görüntüleyebilirsiniz.
                                </p>    
                                
                                <div class="table-responsive">
                                    <table class="table mb-0">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kullanıcı adı</th>
                                                <th>Durum</th>
                                                <th>#</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                                $admins = $db->selectAnd("admin");
                                                foreach ($admins as $admin) {
                                                   
                                                
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$admin["id"]?></th>
                                                        <td><?=$admin["username"]?></td>
                                                        <td><?php if($admin["status"]==1){echo"aktif";}?></td>
                                                        
                                        
                                                    
                                                    
                                                    
                                                        <td id="<?=$admin["id"]?>">
                                        
                                                            <a class="btn btn-danger btn-sm btnDelAdmin"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'add':
                ?>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="main.php?page=account&show=admin&q=add" class="btn btn-success float-end"  style="margin-right:15px">Yeni Ekle</a>
                        <a href="main.php?page=account&show=admin&q=all" class="btn btn-primary float-end"  style="margin-right:15px">Tüm Yöneticiler</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Yönetici Ekle</h6>
                                <hr>
                                <div class="row  mb-4">
                                    <label for="inputFullname" class="col-sm-3 col-form-label">Kullanıcı Adı</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputAdminUname" placeholder="Kullanıcı adı girin">
                                    </div>
                                </div>
                                <div class="row  mb-4">
                                    <label for="inputFullname" class="col-sm-3 col-form-label">Şifre</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputAdminPassword" placeholder="Şifre girin">
                                    </div>
                                </div>
                                <a class="btn btn-primary float-end btnAddAdmin"><i class="fas fa-save"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
        }
        break;
    case 'staff':

        switch ($q) {
            case 'all':
                ?>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <a href="main.php?page=account&show=staff&q=add" class="btn btn-success float-end"  style="margin-right:15px">Yeni Ekle</a>
                            <a href="main.php?page=account&show=staff&q=all" class="btn btn-primary float-end"  style="margin-right:15px">Tüm Personeller</a>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tüm Personeller</h4>
                                <p class="card-title-desc">Tabloda sistemde kayıtlı olan personelleri görüntüleyebilirsiniz.
                                </p>    
                                
                                <div class="table-responsive">
                                    <table class="table mb-0">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>İsim</th>
                                                <th>E-posta</th>
                                                <th>Telefon</th>
                                                <th>Durum</th>
                                                <th>#</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                                $staffs = $db->selectAnd("users");
                                                foreach ($staffs as $staff) {
                                                   
                                                
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$staff["id"]?></th>
                                                        <td><?=$staff["fname"].' '.$staff["lname"]?></td>
                                                        <td><?=$staff["email"]?></td>
                                                        <td><?=$staff["phone"]?></td>
                                                        <td><?php if($staff["status"]==1){echo"aktif";}?></td>
                                                        
                                        
                                                    
                                                    
                                                    
                                                        <td id="<?=$staff["id"]?>">
                                                     
                                                            <a class="btn btn-danger btn-sm btnDelStaff"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'add':
                ?>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="main.php?page=account&show=staff&q=add" class="btn btn-success float-end"  style="margin-right:15px">Yeni Ekle</a>
                        <a href="main.php?page=account&show=staff&q=all" class="btn btn-primary float-end"  style="margin-right:15px">Tüm Personel</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Personel Ekle</h6>
                                <hr>
                                <div class="row  mb-4">
                                    <label for="inputStaffFname" class="col-sm-3 col-form-label">Ad</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputStaffFname" placeholder="Ad girin">
                                    </div>
                                </div>
                                <div class="row  mb-4">
                                    <label for="inputStaffLname" class="col-sm-3 col-form-label">Soyad</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputStaffLname" placeholder="Soyad girin">
                                    </div>
                                </div>
                                <div class="row  mb-4">
                                    <label for="inputStaffEmail" class="col-sm-3 col-form-label">E-posta</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputStaffEmail" placeholder="E-posta girin">
                                    </div>
                                </div>
                                <div class="row  mb-4">
                                    <label for="inputStaffPhone" class="col-sm-3 col-form-label">Telefon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputStaffPhone" placeholder="Telefon girin">
                                    </div>
                                </div>
                                <a class="btn btn-primary float-end btnAddStaff"><i class="fas fa-save"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
        }
        break;
    case 'cargo':

        switch ($q) {
            case 'all':
                ?>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <a href="main.php?page=account&show=cargo&q=add" class="btn btn-success float-end"  style="margin-right:15px">Yeni Ekle</a>
                            <a href="main.php?page=account&show=cargo&q=all" class="btn btn-primary float-end"  style="margin-right:15px">Tüm Kargo Firmaları</a>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tüm Kargo Firmaları</h4>
                                <p class="card-title-desc">Tabloda sistemde kayıtlı olan kargo firmalarını görüntüleyebilirsiniz.
                                </p>    
                                
                                <div class="table-responsive">
                                    <table class="table mb-0">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Firma Adı</th>
                                                <th>Durum</th>
                                                <th>#</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                                $cargos = $db->selectAnd("cargo_company");
                                                foreach ($cargos as $cargo) {
                                                   
                                                
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$cargo["id"]?></th>
                                                        <td><?=$cargo["company_name"]?></td>
                                                        <td><?php if($cargo["status"]==1){echo"aktif";}?></td>
                                                        
                                        
                                                    
                                                    
                                                    
                                                        <td id="<?=$cargo["id"]?>">
                                                     
                                                            <a class="btn btn-danger btn-sm btnDelCargo"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'add':
                ?>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="main.php?page=account&show=cargo&q=add" class="btn btn-success float-end"  style="margin-right:15px">Yeni Ekle</a>
                        <a href="main.php?page=account&show=cargo&q=all" class="btn btn-primary float-end"  style="margin-right:15px">Tüm Kargo Firmaları</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Kargo Firması Ekle</h6>
                                <hr>
                                <div class="row  mb-4">
                                    <label for="inputCargoName" class="col-sm-3 col-form-label">Firma Adı</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputCargoName" placeholder="Firma adı girin">
                                    </div>
                                </div>
                                
                                
                                
                                <a class="btn btn-primary float-end btnAddCargo"><i class="fas fa-save"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                break;
        }
        break;
}