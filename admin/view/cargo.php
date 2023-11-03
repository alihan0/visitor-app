<div class="row">
    <div class="col-12 mb-4">

        <a href="main.php?page=cargo&show=done"class="btn btn-success float-end"  style="margin-right:15px">Teslim Alınanlar</a>
        <a href="main.php?page=cargo&show=wait" class="btn btn-warning float-end"  style="margin-right:15px">Beklemedekiler</a>
        <a href="main.php?page=cargo&show=reject" class="btn btn-danger float-end"  style="margin-right:15px">Reddedilenler</a>

    </div>
</div>

<?php

$show = @$_GET["show"];

switch ($show) {
    case 'wait':
        ?>
        <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Beklemedeki Kargolar</h4>
                <p class="card-title-desc">Lobiye teslim edilmiş olan fakat alıcısı tarafından teslim alınmamış, beklemedeki kargoları görebilirsiniz.
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Alıcı</th>
                                <th>Gönderici</th>
                                <th>Kargo Takip No</th>
                                <th>Kargo Firması</th>
                                <th>Durum</th>
                                <th>Tarih</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $cargos = $db->selectAnd("cargos",["status"=>1]);
                                foreach ($cargos as $cargo) {
                                    $user = $db->selectAnd("users",["id"=>$cargo["user"]]);
                                    $company = $db->selectAnd("cargo_company",["id"=>$cargo["company"]]);
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$cargo["id"]?></th>
                                        <td><?=$user[0]["fname"].' '.$user[0]["lname"]?></td>
                                        <td><?=$cargo["sender"]?></td>
                                        <td><?=$cargo["cargo_no"]?></td>
                                       <td><?=$company[0]["company_name"]?></td>
                                       
                                        <td>
                                        <?php
                                            if($cargo["status"] == 0){
                                                echo "Reddedildi";
                                            }elseif($cargo["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($cargo["status"] == 2){
                                                echo "Teslim alındı";
                                            }
                                            ?>
                                        </td>
                                        <td><?=$cargo["created_at"]?></td>
                                        <td id="<?=$cargo["id"]?>">
                                            <a class="btn btn-success btn-sm btnOkCargo"><i class="fas fa-check"></i></a>
                                            <a class="btn btn-danger btn-sm btnRedCargo"><i class="fas fa-times"></i></a>
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
    case 'done':
        ?>
        <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teslim Alınan Kargolar</h4>
                <p class="card-title-desc">Alıcısı tarafından teslim alınmış olan tüm kargoları aşağıda görüntüleyebilirsiniz.
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Alıcı</th>
                                <th>Gönderici</th>
                                <th>Kargo Takip No</th>
                                <th>Kargo Firması</th>
                                <th>Durum</th>
                                <th>Tarih</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $cargos = $db->selectAnd("cargos",["status"=>2]);
                                foreach ($cargos as $cargo) {
                                    $user = $db->selectAnd("users",["id"=>$cargo["user"]]);
                                    $company = $db->selectAnd("cargo_company",["id"=>$cargo["company"]]);
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$cargo["id"]?></th>
                                        <td><?=$user[0]["fname"].' '.$user[0]["lname"]?></td>
                                        <td><?=$cargo["sender"]?></td>
                                        <td><?=$cargo["cargo_no"]?></td>
                                       <td><?=$company[0]["company_name"]?></td>
                                       
                                        <td>
                                        <?php
                                            if($cargo["status"] == 0){
                                                echo "Reddedildi";
                                            }elseif($cargo["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($cargo["status"] == 2){
                                                echo "Teslim alındı";
                                            }
                                            ?>
                                        </td>
                                        <td><?=$cargo["created_at"]?></td>
                                
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
        case 'reject':
            ?>
            <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reddedilen Kargolar</h4>
                <p class="card-title-desc">Alıcısı tarafından reddedilmiş olan tüm kargoları aşağıda görüntüleyebilirsiniz.
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Alıcı</th>
                                <th>Gönderici</th>
                                <th>Kargo Takip No</th>
                                <th>Kargo Firması</th>
                                <th>Durum</th>
                                <th>Tarih</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $cargos = $db->selectAnd("cargos",["status"=>0]);
                                foreach ($cargos as $cargo) {
                                    $user = $db->selectAnd("users",["id"=>$cargo["user"]]);
                                    $company = $db->selectAnd("cargo_company",["id"=>$cargo["company"]]);
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$cargo["id"]?></th>
                                        <td><?=$user[0]["fname"].' '.$user[0]["lname"]?></td>
                                        <td><?=$cargo["sender"]?></td>
                                        <td><?=$cargo["cargo_no"]?></td>
                                       <td><?=$company[0]["company_name"]?></td>
                                       
                                        <td>
                                        <?php
                                            if($cargo["status"] == 0){
                                                echo "Reddedildi";
                                            }elseif($cargo["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($cargo["status"] == 2){
                                                echo "Teslim alındı";
                                            }
                                            ?>
                                        </td>
                                        <td><?=$cargo["created_at"]?></td>
                                
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
}
?>


