///////////////////////////////////////////////////////////////////////////////
// Flash Template
///////////////////////////////////////////////////////////////////////////////
function insert_flash( _url , _width , _height )
{
    var writeStr =  '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="' + _width + '" height="' + _height + '" name="wmode">'
                  + '<param name="movie" value="' + _url + '">'
                  + '<param name="quality" value="high">'
                  + '<param name="wmode" value="transparent">'
                  + '<embed src="' + _url + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + _width + '" height="' + _height + '"></embed>'
                  + '</object>';

    document.write( writeStr );
}

///////////////////////////////////////////////////////////////////////////////
// ZTransferX Template
///////////////////////////////////////////////////////////////////////////////
function ZTransferX_object( _downloadURL )
{
    var writeStr =  '<OBJECT width = "0" height = "0" ID="ZTransferX" CLASSID="CLSID:C7C7225A-9476-47AC-B0B0-FF3B79D55E67" codebase="' + _downloadURL + '/ZTransferX.cab#version=1,0,3,6" VIEWASTEXT>'
                  + '<PARAM NAME="download.Server" VALUE="'+ _downloadURL + '">'
                  + '<PARAM NAME="download.Port" VALUE="80">'
                  + '<PARAM NAME="download.Instruction" VALUE="OzViewer.idf">'
                  + '<PARAM NAME="install.Base" VALUE="<PROGRAMS>/Forcs">'
                  + '<PARAM NAME="install.Namespace" VALUE="GSCONST">'
                  + '</OBJECT>';

    document.write( writeStr );

}

///////////////////////////////////////////////////////////////////////////////
// OZ Template
///////////////////////////////////////////////////////////////////////////////
function OZView_object( _server , _port , _reportname , _parms )
{
    var writeStr = '';
    
    writeStr = '<OBJECT id="objOZView" CLASSID="CLSID:0FF44578-C130-4A1F-AEE2-E902A7CDC3EC" width="100%" height="100%" border="0" VIEWASTEXT>'
             + '<param name="mayscript" value="true">'
             + '<param name="applet.configmode" value="html">'
             + '<param name="applet.isapplet" value="false">'
             + '<param name="applet.isframe" VALUE="false">'
             + '<param name="applet.smartframesize" value="true">'
             + '<param name="applet.usestatusbar" value="false">'
             + '<param name="language" value="ko/KR">'
             + '<param name="connection.compressedForm" value="true">'
             + '<param name="connection.compresseddatamodule" value="true">'
             + '<param name="FiresScriptEvents" value="true">'
             + '<param name="toolbar.all" value="true">'
             + '<param name="print.command" value="true">';

    // Form Location
    writeStr += '<param name="connection.server" value="' + _server + '">';
    writeStr += '<param name="connection.port" value="' + _port + '">';
    writeStr += '<param name="connection.reportname" value="' + _reportname + '">'

    // Parameters
    writeStr += '<param name="connection.pcount" value="' + _parms.length + '">';
    for( var i=0 ; i < _parms.length ; i++)
    {
        writeStr += '<param name="connection.args' + (i+1) + '" value="' + _parms[i][0] + '=' + _parms[i][1] + '">';    
    }

    writeStr += '</OBJECT> ';
    
    document.write( writeStr );

}