<script language="javascript" >
function SetViewTableDiv(tableName)
{
    var str = AdFindObjectID(tableName + 'Loc').style.display;
    if (str == 'block')
    {
        AdFindObjectID(tableName + 'Loc').style.display = "none";
        AdFindObjectID(tableName).src = "styles/<?=$style_path?>/AdImgDown.gif";
    }
    else
    {
        AdFindObjectID(tableName + 'Loc').style.display = "block";
        AdFindObjectID(tableName).src = "styles/<?=$style_path?>/AdImgUp.gif";
    }
    
}
//-----------------------------------------------
function AdFindObjectID(idName)
{
	return document.getElementById(idName);
}
function AdFindObjectName(strName)
{
	return document.getElementsByName(strName);
}
//-----------------------------------------------
function SetBlockAdWebServer(strName,intTabLength)
{
    try
    {
        var strDivName = strName.substring(0,strName.length-2);
        var AdDiv = AdFindObjectID(strDivName);
        for (var i = 1; i <= intTabLength; i++)
        {
            var stri = strDivName;
            if (i<10) 
                stri = strDivName+'0'+i;
            else 
                stri = strDivName+i;
            AdFindObjectID(stri).className = "tabgrey";
        }
        var strfile = AdFindObjectID(strName).headers;
        AdFindObjectID(strName).className = "tabgreen";
        AdDiv.innerHTML = AdGenerateHTML('/AdTest/XML/ad' + strfile + '.xml','/AdTest/XSLT/ad' + strfile + '.xsl');
    }
    catch(ex){}
}
//-----------------------------------------------
function SetBlockAdWebClient(strName,intTabLength)
{
    try
    {
        var strDivName = strName.substring(0,strName.length-2);
        for (var i = 1; i <= intTabLength; i++)
        {
            var stri = strDivName;
            if (i<10) 
                stri = strDivName+'0'+i;
            else 
                stri = strDivName+i;
            AdFindObjectID(stri).className = "tabgrey";
            AdFindObjectID(AdFindObjectID(stri).headers).style.display = "none";
        }
        AdFindObjectID(strName).className = "tabgreen";
        AdFindObjectID(AdFindObjectID(strName).headers).style.display = "block";
    }
    catch(ex){}
}
//----------------------------------------------
function AdGenerateHTML(XMLFile,XSLFile)
{
    try
    {
    	var xml;
    	var xsl;
        if (window.ActiveXObject)
        {
			xml = new ActiveXObject("Microsoft.XMLDOM");
            xsl = new ActiveXObject("Microsoft.XMLDOM");
        }
        else if (document.implementation && document.implementation.createDocument)
        {
            xml= document.implementation.createDocument("","",null);
            xsl= document.implementation.createDocument("","",null);
        }
        else
        {
            return 'Your browser cannot handle this script';
        }
        xml.async = false;
        xml.validateOnParse=true;
        xml.load(XMLFile);
        xsl.async = false;
        xsl.validateOnParse=true;
        xsl.load(XSLFile);
 	    return xml.transformNode(xsl);
        //-----------//-----------
 	}
    catch(errorobject)
    {
        return '<b>'+errorobject+'</b>';
    }
}
</script>