<style>
    select {
  font-family: 'FontAwesome'
}
</style>
<?php 
$setting = $db->selectAnd("settings");
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Görevli Personel</h4>
                <p class="card-title-desc">"Görevli Çağır" butonuna basıldığında SMS gönderilecek telefon numarasını girin. telefon numarası 905XXXXXXXXXX formatında, toplam 12 haneli olmalıdır. 
                </p>    
                
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <input type="text" class="form-control text-center" id="staffNumber"  value="<?=$setting[0]["staff_number"]?>">
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary btnPutStaff"><i class="fas fa-save"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">İletişim</h4>
                <p class="card-title-desc">Aşağıdaki listede bulunan iletişim kanalları, "Destek" kısmında listelenecektir.
                </p>    
                
                <div class="row">
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>İkon</th>
                                        <th>Başlık</th>
                                        <th>Değer</th>
                                        <th>#</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                        $support = $db->selectAnd("support");
                                        foreach ($support as $sup) {
                                           
                                        
                                            ?>
                                            <tr>
                                                <th scope="row"><?=$sup["id"]?></th>
                                                <td><i class="fas <?=$sup["icon"]?>"></i></td>
                                                <td><?=$sup["title"]?></td>
                                                <td><?=$sup["value"]?></td>
                                
                                            
                                            
                                            
                                                <td id="<?=$sup["id"]?>">
                        
                                                    <a class="btn btn-danger btn-sm btnDelSupport"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>

                    <div class="col-6">
                        <select  id="icon" class="form-select mb-2">
                            <option value="">Seçin</option>
                            <option value="fa-solid fa-phone">&#xf095;</option>
                            <option value="fa-solid fa-envelope">&#xf0e0;</option>
                        </select>
                        <input id="title" type="text" class="form-control mb-2" placeholder="Başlık">
                        <input id="value" type="text" class="form-control mb-2" placeholder="Değer">
                        <a class="btn btn-primary float-end btnAddSupport"><i class="fas fa-save"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>