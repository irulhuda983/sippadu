<?php
$plugins_name = 'qzprint';
$folder_plugins['print']=contenturl.'plugins/print/';
//echo $folder_plugins['print'];
/*
<applet id="qz" code="qz.PrintApplet.class" archive="qz-print.jar" width="100" height="100">
<param name="jnlp_href" value="qz-print_jnlp.jnlp">
<param name="cache_option" value="plugin">
<param name="disable_logging" value="false">
<param name="initial_focus" value="false">
<param name="codebase_lookup" value="false">
</applet>
 * 
	<script type="text/javascript" src="<?php echo $folder_plugins['print']; ?>js/html2canvas.js"></script>
	<script type="text/javascript" src="<?php echo $folder_plugins['print']; ?>js/jquery.plugin.html2canvas.js"></script>

*/
?>
<div id="qz-alert" style="position: fixed; width: 60%; margin: 0 4% 0 36%; z-index: 900;"></div>
<div id="qz-pin" style="position: fixed; width: 30%; margin: 0 66% 0 4%; z-index: 900;"></div>

                    <div id="qz-connection" class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-sm btn-flat btn-info pull-left" data-toggle="tooltip" title="Jalankan Server Printer" id="launch" href="#" onclick="launchQZ();" style="display: none;">
                        <i class="fa fa-external-link"></i>
                    </button>
                    <h3 class="panel-title">
                        Printer Status: <span id="qz-status" class="text-muted" style="font-weight: bold;">Unknown</span>
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="btn-toolbar">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-success" onclick="startConnection();">Connect</button>
                            <button type="button" class="btn btn-warning" onclick="endConnection();">Disconnect</button>
                        </div>
                        <button type="button" class="btn btn-info" onclick="listNetworkDevices();">List Network Info</button>
                        <button type="button" class="btn btn-info" onclick="findPrinters();">List Printer</button>
                        <button type="button" class="btn btn-info" onclick="findDefaultPrinter();">default Printer</button>
                    </div>
                </div>
            </div>
<?php
//<input type=button onClick="findPrinter('Fax',true)" value="Detect Printer">

?>
<script defer type="text/javascript">
var pinHTML = $();
startConnection();
    function launchQZ() {
        if (!qz.websocket.isActive()) {
            window.location.assign("qz-mod:launch");
            //Retry 5 times, pausing 1 second between each attempt
            startConnection({ retries: 5, delay: 1 });
        }
    }
    function startConnection(config) {
        if (!qz.websocket.isActive()) {
            updateState('Menunggu Printer Koneksi', 'default');

            qz.websocket.connect(config).then(function() {
                updateState('Active', 'success');
                findVersion();
            }).catch(handleConnectionError);
        } else {
            displayMessage('An active connection with QZ already exists.', 'alert-warning');
        }
    }
    function endConnection() {
        if (qz.websocket.isActive()) {
            qz.websocket.disconnect().then(function() {
                updateState('Inactive', 'default');
            }).catch(handleConnectionError);
        } else {
            displayMessage('No active connection with QZ exists.', 'alert-warning');
        }
    }
    function listNetworkDevices() {
        var listItems = function(obj) {
            var html = '';
            var labels = { mac: 'MAC', ip: 'IP', up: 'Up', ip4: 'IPv4', ip6: 'IPv6', primary: 'Primary' };

            Object.keys(labels).forEach(function(key) {
                if (!obj.hasOwnProperty(key)) { return; }
                if (key !== 'ip' && obj[key] == obj['ip']) { return; }

                var value = obj[key];
                if (key === 'mac') { value = obj[key].match(/.{1,2}/g).join(':'); }
                if (typeof obj[key] === 'object') { value = value.join(', '); }

                html += '<li><strong>' + labels[key] + ':</strong> ' + value + '</li>';
            });

            return html;
        };

        qz.networking.devices().then(function(data) {
            var list = '';
            for(var i = 0; i < data.length; i++) {
                var info = data[i];

                list += "<li>" +
                        "   <strong>" + (info.name || "UNKNOWN") + (info.id ? " (" + info.id + ")" : "") + "</strong>" +
                        "   <ul>" + listItems(info) + "</ul>" +
                        "</li>";
            }

            pinMessage("<strong>Network details:</strong><br/><ul>" + list + "</ul>");
        }).catch(displayError);
    }
    function findPrinters() {
        qz.printers.find().then(function(data) {
            var list = '';
            for(var i = 0; i < data.length; i++) {
                list += "&nbsp; " + data[i] + "<br/>";
            }

            displayMessage("<strong>Available printers:</strong><br/>" + list, null, 5000);
        }).catch(displayError);
    }
    function findDefaultPrinter(set) {
        qz.printers.getDefault().then(function(data) {
            displayMessage("<strong>Found:</strong> " + data);
            if (set) { setPrinter(data); }
        }).catch(displayError);
    }
    function getDefaultPrinter(){
        qz.printers.getDefault().then(function(data) {
            displayMessage("<strong>Found:</strong> " + data);
            if (set) { setPrinter(data); }
        }).catch(displayError);
    }
    function sendSerialData() {
        var properties = {
            baudRate: $("#serialBaud").val(),
            dataBits: $("#serialData").val(),
            stopBits: $("#serialStop").val(),
            parity: $("#serialParity").val(),
            flowControl: $("#serialFlow").val()
        };

        qz.serial.sendData($("#serialPort").val(), $("#serialCmd").val(), properties).catch(displayError);
    }
    function findPrinter(query, set) {
        console.log(query);
        qz.printers.find(query).then(function(data) {
            displayMessage("<strong>Found:</strong> " + data);
            if (set) { setPrinter(data); }
        }).catch(displayError);
    }
    function updateState(text, css) {
        $("#qz-status").html(text);
        $("#qz-connection").removeClass().addClass('panel panel-' + css);

        if (text === "Inactive" || text === "Error") {
            $("#launch").show();
        } else {
            $("#launch").hide();
        }
    }
    function handleConnectionError(err) {
        updateState('Error', 'danger');

        if (err.target != undefined) {
            if (err.target.readyState >= 2) { //if CLOSING or CLOSED
                displayError("Connection to QZ Tray was closed");
            } else {
                displayError("A connection error occurred, check log for details");
                console.error(err);
            }
        } else {
            displayError(err);
        }
    }
    function displayMessage(msg, css, time) {
        if (css == undefined) { css = 'alert-info'; }

        var timeout = setTimeout(function() { $('#' + timeout).alert('close'); }, time ? time : 5000);

        var alert = $("<div/>").addClass('alert alert-dismissible fade in ' + css)
                .css('max-height', '20em').css('overflow', 'auto')
                .attr('id', timeout).attr('role', 'alert');
        alert.html("<button type='button' class='close' data-dismiss='alert'>&times;</button>" + msg);

        $("#qz-alert").append(alert);
    }
    function displayError(err) {
        console.error(err);
        displayMessage(err, 'alert-danger');
    }
    var qzVersion = 0;
    function findVersion() {
        qz.api.getVersion().then(function(data) {
            $("#qz-version").html(data);
            qzVersion = data;
        }).catch(displayError);
    }
    function pinMessage(msg, id, css) {
        if (css == undefined) { css = 'alert-info'; }

        var alert = $("<div/>").addClass('alert alert-dismissible fade in ' + css)
                .css('max-height', '20em').css('overflow', 'auto').attr('role', 'alert')
                .html("<button type='button' class='close' data-dismiss='alert'>&times;</button>");

        var text = $("<div/>").html(msg);
        if (id != undefined) { text.attr('id', id); }

        alert.append(text);

        $("#qz-pin").append(alert);
    }
    function setPrinter(printer) {
        var cf = getUpdatedConfig();
        cf.setPrinter(printer);

        if (typeof printer === 'object' && printer.name == undefined) {
            var shown;
            if (printer.file != undefined) {
                shown = "<em>FILE:</em> " + printer.file;
            }
            if (printer.host != undefined) {
                shown = "<em>HOST:</em> " + printer.host + ":" + printer.port;
            }

            $("#configPrinter").html(shown);
        } else {
            if (printer.name != undefined) {
                printer = printer.name;
            }

            if (printer == undefined) {
                printer = 'NONE';
            }
            $("#configPrinter").html(printer);
        }
    }
    var cfg = null;
    function getUpdatedConfig() {
        if (cfg == null) {
            cfg = qz.configs.create(null);
        }

        updateConfig();
        return cfg
    }
    function updateConfig() {
        var pxlSize = null;
        if ($("#pxlSizeActive").prop('checked')) {
            pxlSize = {
                width: $("#pxlSizeWidth").val(),
                height: $("#pxlSizeHeight").val()
            };
        }

        var pxlMargins = $("#pxlMargins").val();
        if ($("#pxlMarginsActive").prop('checked')) {
            pxlMargins = {
                top: $("#pxlMarginsTop").val(),
                right: $("#pxlMarginsRight").val(),
                bottom: $("#pxlMarginsBottom").val(),
                left: $("#pxlMarginsLeft").val()
            };
        }

        var copies = 1;
        var jobName = null;
        if ($("#rawTab").hasClass("active")) {
            copies = $("#rawCopies").val();
            jobName = $("#rawJobName").val();
        } else {
            copies = $("#pxlCopies").val();
            jobName = $("#pxlJobName").val();
        }

        cfg.reconfigure({
                            altPrinting: $("#rawAltPrinting").prop('checked'),
                            encoding: $("#rawEncoding").val(),
                            endOfDoc: $("#rawEndOfDoc").val(),
                            perSpool: $("#rawPerSpool").val(),

                            colorType: $("#pxlColorType").val(),
                            copies: copies,
                            density: $("#pxlDensity").val(),
                            duplex: $("#pxlDuplex").prop('checked'),
                            interpolation: $("#pxlInterpolation").val(),
                            jobName: jobName,
                            margins: pxlMargins,
                            orientation: $("#pxlOrientation").val(),
                            paperThickness: $("#pxlPaperThickness").val(),
                            printerTray: $("#pxlPrinterTray").val(),
                            rasterize: $("#pxlRasterize").prop('checked'),
                            rotation: $("#pxlRotation").val(),
                            scaleContent: $("#pxlScale").prop('checked'),
                            size: pxlSize,
                            units: $("input[name='pxlUnits']:checked").val()
                        });
    }

    function getUpdatedOptions(onlyPixel) {
        if (onlyPixel) {
            return {
                pageWidth: $("#pPxlWidth").val(),
                pageHeight: $("#pPxlHeight").val()
            };
        } else {
            return {
                language: $("input[name='pLanguage']:checked").val(),
                x: $("#pX").val(),
                y: $("#pY").val(),
                dotDensity: $("#pDotDensity").val(),
                xmlTag: $("#pXml").val(),
                pageWidth: $("#pRawWidth").val(),
                pageHeight: $("#pRawHeight").val()
            };
        }
    }


</script>
