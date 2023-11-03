<style>
.kbw-signature { width: 300px; height: 200px; margin:auto }
canvas{border:2px solid #ddd;width: 100%; height: 200px;}


    #my_camera{
        width: 147px;
        height: 110px;
        border: 1px solid #ddd;
        border-radius:4px
    }

</style>
<div id="visitorModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","visitor_entry")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <form>
                    


                    
                            

                            

            <div class="row mb-4">
                <label for="inputFullname" class="col-sm-3 col-form-label"><?=Lang::line("form","photo")?></label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-6 ">

                        <div id="my_camera" class="text-center mb-2"><i  style="margin-top:40px" class="fas fa-camera fa-2x "></i></div>


	

                        <div id="results"  ></div>

                                                
                                            </div>
                                            <div class="col-6">



    <input type=button class="btn btn-primary col-12 mb-2 btnSet" value="<?=Lang::line("button","take_photo")?>">
    <input onClick="take_snapshot()" type=button class="btn btn-warning col-12 mb-2 btnSnap d-none" value="<?=Lang::line("button","snap")?>">
    <input onClick="saveSnap()" type=button class="btn btn-success col-12 mb-2 btnSave d-none" value="<?=Lang::line("button","save")?>">

    <input type="hidden" id="resim_path">
                                            </div>

                    </div>
                    <div class="row">
                        
                    </div>
                </div>
            </div>




            

                        <div class="row  mb-4">
                        <label for="inputFullname" class="col-sm-3 col-form-label"><?=Lang::line("form","name_company")?></label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="inputFullname" placeholder="<?=Lang::line("form","enter_name")?>">
                                </div>
                                <div class="col-6">
                                <input type="text" class="form-control" id="inputCompany" placeholder="<?=Lang::line("form","enter_company")?>">
                                </div>
                                </div>
                            </div>
                          
                        </div>

                        <div class="row  mb-4">
                        <label for="inputFullname" class="col-sm-3 col-form-label"><?=Lang::line("form","email_phone")?></label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                <input type="text" class="form-control" id="inputEmail" placeholder="<?=Lang::line("form","enter_email")?>">
                                </div>
                                <div class="col-6">
                                <input type="text" class="form-control" id="inputPhone" placeholder="<?=Lang::line("form","enter_phone")?>">
                                </div>
                                </div>
                            </div>
                          
                        </div>

                        
                        

                        

                        <div class="row mb-4">
                                <label for="inputPerson" class="col-sm-3 col-form-label"><?=Lang::line("form","contact_person")?>:</label>
                                <div class="col-sm-9">
                                <select class="form-select" id="inputPerson">
                                        <option value="0"><?=Lang::line("form","select")?></option>
                                        <?php 
                                        $users = $database->selectAnd("users",["status"=>1]);
                                        for($i=0;$i<count($users);$i++){
                                            ?>
                                            <option value="<?=$users[$i]["id"]?>"><?=$users[$i]["fname"].' '.$users[$i]['lname']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row  mb-4">
                        <label for="inputFullname" class="col-sm-3 col-form-label"><?=Lang::line("form","reason_signature")?></label>
                            <div class="col-sm-9">
                                <div class="row">
                                <div class="col-6">
                                    <textarea rows="5" class="form-control" placeholder="<?=Lang::line("form","reason_visit")?>" id="inputReasonVisit"></textarea>
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
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("task","close")?></button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="btnSaveVisit"><?=Lang::line("button","save")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div id="detailModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ziyaretçi Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 border" id="visitorCard>
                        <h1 class="card-title text-center mt-3">ZIYARETÇI</h1>
                        <hr>
                        <center>
                            <span id="name" class="font-weight-bold h4"></span><br>
                            <span id="company"></span><br>
                            <span id="email"></span> | <span id="phone"></span>
                            <hr>
                                        <div id="qr"></div>
                        </center>
                    
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Vazgeç</button>
                <button type="button" class="btn btn-success waves-effect waves-light" id="btnPrint">Yazdır</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    $(".btnSet").on("click", function(){
        $(this).attr("disabled",true);
        $(".btnSnap").removeClass("d-none");
        Webcam.set({
           width: 147,
           height: 110,
           image_format: 'jpeg',
           jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
    })
        
     

       // preload shutter audio clip
       var shutter = new Audio();
     shutter.autoplay = false;
     shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
    
     function take_snapshot() {
        $(".btnSet").addClass("d-none");
        $(".btnSnap").val("<?=Lang::line("button","resnap")?>");
        $(".btnSave").removeClass("d-none");
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
          //  Webcam.reset();
            document.getElementById('results').innerHTML = 
                '<img id="imageprev" src="'+data_uri+'"/>';
            } );

          
     }
 /*    $(".btnSnap").on("click", function(){
        // play sound effect
        shutter.play();
            
         
     })*/
    


      
   
     function saveSnap(){
       // Get base64 value from <img id='imageprev'> source
       var base64image = document.getElementById("imageprev").src;
    
       Webcam.upload( base64image, '/app/core/snap.php', function(code, text) {
            $("#my_camera").addClass("d-none");
            let obj = JSON.parse(text);
            $("#resim_path").val(obj.file);
            toastr[obj.type](obj.msg);
           //console.log(text);
       });

    }
</script>











