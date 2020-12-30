<?php
$plugins_name = 'qzprint';
$folder_plugins['print']=contenturl.'plugins/print/';
?>
<script defer type="text/javascript">
    var dataPrinter_Config = null;
var DivErr = $("#ctp-alert");
$(function(){
    if(typeof qz == undefined && !qz){
        alert("Aplikasi printer tidak di temukan.\n silahkan masuk ke settingan printer, dan tekan f5(+ctrl) untuk mengulang!")
    }
/* for default or blubird promise script*/
    //qz.api.setPromiseType(function promise(resolver) { return new Promise(resolver); });
/* for default or Q promise script */
    qz.api.setPromiseType(Q.Promise);
	qz.security.setCertificatePromise(function(resolve, reject) {
        $.ajax("<?php echo $folder_plugins['print']; ?>cert/digital-certificate.txt?z_="+Date.now()).then(resolve, reject);
    });
    qz.security.setSignaturePromise(function(toSign) {
        return function(resolve, reject) {
            $.ajax("<?php echo $folder_plugins['print']; ?>asset/signing/sign-message.php?request=" + toSign+"&z_="+Date.now()).then(resolve, reject);
        };
    })
    getUpdatedConfig();
});
    function getUpdatedConfig() {
        if (dataPrinter_Config == null) {
            dataPrinter_Config = qz.configs.create(null);
        }

        updateConfig();
        return dataPrinter_Config
    }
     function updateConfig() {
        var datacfg = {
                "printer"   :{"name":"Epson"},
                config      :{
                            copies : 1,
                            jobName : 'Datadunia TestPrinting',
                            altPrinting : false,
                            encoding : null,
                            endOfDoc : null,
                            perSpool : 1,
                            colorType : "blackwhite",//color,grayscale,blackwhite
                            density : null,
                            duplex : false,
                            interpolation : '',//'',bicubic,bilinear,nearest-neighbor
                            orientation :'',//'',portrait,landscape,reverse-landscape
                            paperThickness : null,
                            printerTray : null,
                            rasterize : false,
                            rotation : null,
                            scaleContent : false,
                            units : 'in',//in,mm,cm
                            pxlMargins : 0,
                            pxlSize : null,
                        }
                }
        if(GetLokalData("printer")!==null && GetLokalData("printer")!=='' ){
            try{
                var datacfgi = JSON.parse(GetLokalData("printer"));
                dataPrinter_Config.setPrinter(datacfgi.printer);
            }catch(e){
                SimpanLokalData("printer",JSON.stringify(datacfg));
                updateConfig();
            }
        }else{
            SimpanLokalData("printer",JSON.stringify(datacfg));
            updateConfig();
            }
//            SimpanLokalData("printer",JSON.stringify(datacfg));
        dataPrinter_Config.reconfigure(datacfg.config)
    }
    function saveConfigLocalBrowser(cfg){
        SimpanLokalData("printer",JSON.stringify(cfg));
    }
    function getUpdatedOptions() {
        return {
            pageWidth: null,
            pageHeight: null,
            language: "ESCP",
            x: 0,
            y: 0,
            dotDensity: "single",
            xmlTag: "v7:Image",
            pageWidth: '480',
            pageHeight: null
        };       
    }
    function handelKoneksiError(err) {
        updateState('Error', 'danger');
        if (err.target != undefined) {
            if (err.target.readyState >= 2) { //if CLOSING or CLOSED
                tampilkanError("Koneksi ke server printer di tutup");
            } else {
                tampilkanError("Koneksi Error, log detail tersedia untuk developer");
                (isDebug)?console.error(err):function(){};
            }
        } else {
            tampilkanError(err);
        }
    }
    function tampilkanPesan(msg, css, time) {
        if (css == undefined) { css = 'alert-info'; }

        var timeout = setTimeout(function() { $('#' + timeout).alert('close'); }, time ? time : 5000);

        var alert = $("<div/>").addClass('alert alert-dismissible fade in ' + css)
                .css('max-height', '20em').css('overflow', 'auto')
                .attr('id', timeout).attr('role', 'alert');
        alert.html("<button type='button' class='close' data-dismiss='alert'>&times;</button>" + msg);

        DivErr.append(alert);
    }
    function tampilkanError(err) {
        tampilkanPesan(err, 'alert-danger');
    }
 
</script>