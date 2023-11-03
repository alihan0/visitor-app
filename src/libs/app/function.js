window.onload = function() {
    
    

    $("#callPerson").on("click", function(){
        $(this).toggle();
        
        
        setInterval(() => {
            $(this).show();
        }, 3000);

        $.ajax({
            type : 'POST',
            url  : '/app/core/send.php',
            dataType : 'JSON',
            data: {
                "req":"send"
            },
            success: function(r){
                toastr[r.type](r.msg);
            }
        })
    });

    

    $(".btnVisitorEnter").on("click", function(){
        $("#visitorModal").modal("show");


        var sig = $("#signature").signature({svgStyles: true});

        $('#inputPhone').usPhoneFormat({
            format: '(xxx) xxx-xxxx',
        });   


        $("#btnSaveVisit").on("click", function(){
           let imza = sig.signature('toSVG');
           let Fullname = $("#inputFullname").val();
           let Email = $("#inputEmail").val();
           let Phone = $("#inputPhone").val();
           let Company = $("#inputCompany").val();
           let Person = $("#inputPerson").val();
           let ReasonVisit = $("#inputReasonVisit").val();
           let resim = $("#resim_path").val();

           $.ajax({
            type : 'POST',
            url  : '/app/core/visitor.php',
            dataType : 'JSON',
            data : {
                "req":"add_visitor",
                Fullname:Fullname,
                Email:Email,
                Phone:Phone,
                Company:Company,
                Person:Person,
                ReasonVisit:ReasonVisit,
                imza:imza,
                resim:resim
            },
            success: function(r){
                console.log(r);
                toastr[r.type](r.msg);
                if(r.ok){
                    setInterval(() => {
                        window.location.assign("/visitorCard/show/"+r.last_id);
                    }, 1000);
                  /*  
                    $.ajax({
                        type : 'POST',
                        url  : '/app/core/visitor.php',
                        dataType: 'JSON',
                        data: {
                            "req":"visitor_detail",
                            id:r.last_id
                        },
                        success: function(d){
                         
                            jQuery('#qr').qrcode(d.qr);
                        }
                    })*/
                }
            }
           })

        })

    });
    
    $("#btnPrint").on("click", function(){
        $("#visitorCard").print({
            addGlobalStyles : true,
            stylesheet : null,
            rejectWindow : false,
            noPrintSelector : ".no-print",
            iframe : false,
            append : null,
            prepend : null
        });
    });

    $("#resimInput").on("change", function(){
        $(this).parent("div").removeClass("col-12");
        $(this).parent("div").addClass("col-8");
        $("#uploadBtn").removeClass("d-none");
    });
    $("#uploadBtn").on("click", function(){
   
        $(this).html('<i class="fas fa-spinner fa-spin"></i>');
        $(this).attr("disabled","disabled");
        var file_data = $('#resimInput').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);                         
        $.ajax({
            url: '/app/core/file.php', // <-- point to server-side PHP script 
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'POST',
            dataType: 'JSON',
            success: function(res){
                toastr[res.type](res.msg);
                $("#resim_path").val(res.img);
                $("#showImage").css("display","block");
                $("#showImage").html('<img style="size:background" width="50" src="https://akbil2.metatige.com/src/uploads/'+res.img+'"/>')
                $("#uploadBtn").html('Yükle');
                $("#uploadBtn").removeAttr("disabled","disabled");
            }
         });
    });

   


















    
     // A button for taking snaps
    
  

}