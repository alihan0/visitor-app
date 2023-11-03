<div class="row">
    <div class="col-12 mb-4">
        <a class="btnAddVisitor btn btn-success float-end mr-2" ><i class="fas fa-plus"></i> Ziyaretçi Ekle</a>
        <a href="main.php?page=visitors&show=enter  "class="btn btn-success float-end" style="margin-right:15px"> Giriş Yapanlar</a>
        <a href="main.php?page=visitors&show=exit"class="btn btn-danger float-end"  style="margin-right:15px">Çıkış Yapanlar</a>
        <a href="main.php?page=visitors&show=wait" class="btn btn-warning float-end"  style="margin-right:15px">Beklemedekiler</a>
        <a href="main.php?page=visitors" class="btn btn-primary float-end"  style="margin-right:15px">Tümü</a>
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
                <h4 class="card-title">Beklemedeki Ziyaretçiler</h4>
                <p class="card-title-desc">Aşağıdaki tabloda ziyaretçi kaydı oluşturulmuş, ama henüz giriş yapmamış kayıtları görüntüleyebilirsiniz..
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>İsim</th>
                                <th>İletişim</th>
                                <th>Ziyaret Sebebi</th>
                                <th>Giriş</th>
                                <th>Çıkış</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $visitors = $db->selectAnd("visitors",["status"=>1]);
                                foreach ($visitors as $visitor) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$visitor["id"]?></th>
                                        <td><?=$visitor["full_name"]?> (<?=$visitor["company"]?>)</td>
                                        <td><?=$visitor["phone"]?><br><?=$visitor["email"]?></td>
                                        <td><?php
                                            $id = $visitor["person"];
                                            $users = $db->selectAnd("users",["id"=>$id]);
                                            
                                            echo $users[0]["fname"].' '.$users[0]["lname"];
                                        ?><br><?=$visitor["reason"]?></td>
                                       <td>
                                            <?=$visitor["enter_time"]?date("d/m/Y h:i", $visitor["enter_time"]):"-"?>
                                        </td>
                                        <td><?=$visitor["exit_time"]?date("d/m/Y h:i", $visitor["exit_time"]):"-"?></td>
                                       
                                        <td>
                                            <?php
                                            if($visitor["status"] == 0){
                                                echo "Çıkış Yapıldı";
                                            }elseif($visitor["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($visitor["status"] == 2){
                                                echo "Giriş Yapıldı";
                                            }
                                            ?>
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
    case 'exit':
        ?>
        <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Çıkış Yapan Ziyaretçiler</h4>
                <p class="card-title-desc">Aşağıdaki tabloda ziyaretçi kaydı oluşturulmuş ve çıkış yapmış ziyaretçileri görüntüleyebilirsiniz...
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>İsim</th>
                                <th>İletişim</th>
                                <th>Ziyaret Sebebi</th>
                                <th>Giriş</th>
                                <th>Çıkış</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $visitors = $db->selectAnd("visitors",["status"=>0]);
                                foreach ($visitors as $visitor) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$visitor["id"]?></th>
                                        <td><?=$visitor["full_name"]?> (<?=$visitor["company"]?>)</td>
                                        <td><?=$visitor["phone"]?><br><?=$visitor["email"]?></td>
                                        <td><?php
                                            $id = $visitor["person"];
                                            $users = $db->selectAnd("users",["id"=>$id]);
                                            
                                            echo $users[0]["fname"].' '.$users[0]["lname"];
                                        ?><br><?=$visitor["reason"]?></td>
                                        <td>
                                            <?=$visitor["enter_time"]?date("d/m/Y h:i", $visitor["enter_time"]):"-"?>
                                        </td>
                                        <td><?=$visitor["exit_time"]?date("d/m/Y h:i", $visitor["exit_time"]):"-"?></td>
                                    
                                        <td>
                                            <?php
                                            if($visitor["status"] == 0){
                                                echo "Çıkış Yapıldı";
                                            }elseif($visitor["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($visitor["status"] == 2){
                                                echo "Giriş Yapıldı";
                                            }
                                            ?>
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
        case 'enter':
            ?>
            <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Giriş Yapan Ziyaretçiler</h4>
                <p class="card-title-desc">Aşağıdaki tabloda ziyaretçi kaydı oluşturulmuş ve giriş yapmış fakat hala içeride bulunan ziyaretçileri görüntüleyebilirsiniz...
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>İsim</th>
                                <th>İletişim</th>
                                <th>Ziyaret Sebebi</th>
                                <th>Giriş</th>
                                <th>Çıkış</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $visitors = $db->selectAnd("visitors",["status"=>2]);
                                foreach ($visitors as $visitor) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$visitor["id"]?></th>
                                        <td><?=$visitor["full_name"]?> (<?=$visitor["company"]?>)</td>
                                        <td><?=$visitor["phone"]?><br><?=$visitor["email"]?></td>
                                        <td><?php
                                            $id = $visitor["person"];
                                            $users = $db->selectAnd("users",["id"=>$id]);
                                            
                                            echo $users[0]["fname"].' '.$users[0]["lname"];
                                        ?><br><?=$visitor["reason"]?></td>
                                        <td>
                                            <?=$visitor["enter_time"]?date("d/m/Y h:i", $visitor["enter_time"]):"-"?>
                                        </td>
                                        <td><?=$visitor["exit_time"]?date("d/m/Y h:i", $visitor["exit_time"]):"-"?></td>
                                      
                                        <td>
                                            <?php
                                            if($visitor["status"] == 0){
                                                echo "Çıkış Yapıldı";
                                            }elseif($visitor["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($visitor["status"] == 2){
                                                echo "Giriş Yapıldı";
                                            }
                                            ?>
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
    default:
        ?>
        <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tüm Ziyaretçiler</h4>
                <p class="card-title-desc">Aşağıdaki tabloda  tüm ziyaretçi kayıtlarını görüntüleyebilirsiniz..
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>İsim</th>
                                <th>İletişim</th>
                                <th>Ziyaret Sebebi</th>
                                <th>Giriş</th>
                                <th>Çıkış</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $visitors = $db->selectAnd("visitors");
                                foreach ($visitors as $visitor) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$visitor["id"]?></th>
                                        <td><?=$visitor["full_name"]?> (<?=$visitor["company"]?>)</td>
                                        <td><?=$visitor["phone"]?><br><?=$visitor["email"]?></td>
                                        <td><?php
                                            $id = $visitor["person"];
                                            $users = $db->selectAnd("users",["id"=>$id]);
                                            
                                            echo $users[0]["fname"].' '.$users[0]["lname"];
                                        ?><br><?=$visitor["reason"]?></td>
                                        <td>
                                            <?=$visitor["enter_time"]?date("d/m/Y h:i", $visitor["enter_time"]):"-"?>
                                        </td>
                                        <td><?=$visitor["exit_time"]?date("d/m/Y h:i", $visitor["exit_time"]):"-"?></td>
                                        <td>
                                            <?php
                                            if($visitor["status"] == 0){
                                                echo "Çıkış Yapıldı";
                                            }elseif($visitor["status"] == 1){
                                                echo "Beklemede";
                                            }elseif($visitor["status"] == 2){
                                                echo "Giriş Yapıldı";
                                            }
                                            ?>
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
}
?>


<div id="visitorModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ziyaretçi Girişi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <form>
                    


                    
                            

                            

            




            

                        <div class="row  mb-4">
                        <label for="inputFullname" class="col-sm-3 col-form-label">Ad Soyad</label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="inputFullname" placeholder="Ad soyad girin">
                                </div>
                                
                                </div>
                            </div>
                          
                        </div>

                        <div class="row  mb-4">
                        <label for="inputCompany" class="col-sm-3 col-form-label">Firma</label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                <input type="text" class="form-control" id="inputCompany" placeholder="Firma adı girin">
                                </div>
                                    
                                </div>
                            </div>
                          
                        </div>

                        <div class="row  mb-4">
                        <label for="inputEmail" class="col-sm-3 col-form-label">E-posta</label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                <input type="text" class="form-control" id="inputEmail" placeholder="E-posta girin">
                                </div>

                                </div>
                            </div>
                          
                        </div>
                        <div class="row  mb-4">
                        <label for="inputPhone" class="col-sm-3 col-form-label">Telefon</label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                <input type="text" class="form-control" id="inputPhone" placeholder="Telefon girin">
                                </div>
                                    
                                </div>
                            </div>
                          
                        </div>


                        <div class="row  mb-4">
                        <label for="inputPerson" class="col-sm-3 col-form-label">Görüşülecek Kişi:</label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                <select class="form-select" id="inputPerson">
                                        <option value="0">Seçiniz...</option>
                                        <?php 
                                        $users = $db->selectAnd("users",["status"=>1]);
                                        for($i=0;$i<count($users);$i++){
                                            ?>
                                            <option value="<?=$users[$i]["id"]?>"><?=$users[$i]["fname"].' '.$users[$i]['lname']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                    
                                </div>
                            </div>
                          
                        </div>

                        
                        
                        

                        

                        


                            <div class="row  mb-4">
                        <label for="inputReasonVisit" class="col-sm-3 col-form-label">Ziyaret Sebebi / İmza</label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                    <textarea rows="5" class="form-control" placeholder="Ziyaret sebebini girin" id="inputReasonVisit"></textarea>
                                </div>
                                <div class="col-6">
                                <div id="signature"></div>  
                                </div>
                                </div>
                            </div>
                          
                        </div>

                    </form>
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Vazgeç</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="btnSaveVisit">Kaydet</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>