<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mevcut Personeller</h4>
                <p class="card-title-desc">Aşağıda giriş yapmış personellerin listesini görüntüleyebilirsiniz.
                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Personel</th>
                                <th>Giriş</th>
                                <th>Geçen Süre</th>
                                <th>#</th>  
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $staff = $db->selectAnd("personels");
                                foreach ($staff as $s) {
                                    $user = $db->selectAnd("users",["id"=>$s["user"]]);
                                   
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$s["id"]?></th>
                                        <td><?=$user[0]["fname"].' '.$user[0]["lname"]?></td>
                                        <td><?=$s["created_at"]?></td>
                                        <td><?php
                                            $saat = date("H",$s["time"]);
                                            $dak =  date('i', $s["time"]);
                                            if($dak>60){
                                                echo $saat.' saat '.$dak.' dakika';
                                            }else{
                                                echo $dak.' dakika';
                                            }

                                      
                                        ?></td>
                           
                                       
                                       
                                       
                                        <td id="<?=$user[0]["id"]?>">
                  
                                            <a class="btn btn-danger btn-sm btnExitStaff"><i class="fas fa-times"></i></a>
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