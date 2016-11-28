function showDateVN()
{
	var strdate;
	var dt = new Date();
              var strarrDay = new Array("Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"); 
              var strarrMonth = new Array("01","02","03","04","05","06","07","08","09","10","11","12"); 
              var strThu = dt.getDay();
              strThu = strarrDay[strThu] + ", ";
              var strDay=dt.getDate();
              if (strDay<10) strDay="0" + strDay
              var strMonth= dt.getMonth();
              strMonth= strarrMonth[strMonth] ;
              var strYears = dt.getYear();
              if (strYears<1900) strYears += 1900;
              strdate=strThu + " " + strDay + "/" + strMonth + "/" + strYears
              window.document.write (strdate);
}
function showDateEN()
{
	var strdate;
	var dt = new Date();
              var strarrDay = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); 
              var strarrMonth = new Array("01","02","03","04","05","06","07","08","09","10","11","12"); 
              var strThu = dt.getDay();
              strThu = strarrDay[strThu] + ", ";
              var strDay=dt.getDate();
              if (strDay<10) strDay="0" + strDay
              var strMonth= dt.getMonth();
              strMonth= strarrMonth[strMonth] ;
              var strYears = dt.getYear();
              if (strYears<1900) strYears += 1900;
              strdate=strThu + " " + strMonth + "/" + strDay + "/" + strYears
              window.document.write (strdate);
}
function showDateCN()
{
	var strdate;
	var dt = new Date();
              var strarrDay = new Array("星 期 日", "星 期 一", "星 期 二", "星 期 三", "星 期 四", "星 期 五", "星 期 六"); 
              var strarrMonth = new Array("01","02","03","04","05","06","07","08","09","10","11","12"); 
              var strThu = dt.getDay();
              strThu = strarrDay[strThu] + ", ";
              var strDay=dt.getDate();
              if (strDay<10) strDay="0" + strDay
              var strMonth= dt.getMonth();
              strMonth= strarrMonth[strMonth] ;
              var strYears = dt.getYear();
              if (strYears<1900) strYears += 1900;
              strdate=strThu + " " + strDay + "/" + strMonth + "/" + strYears
              window.document.write (strdate);
}
function openpage(pageurl, pagename, pagewidth, pageheight) 
{                                          
	var attr;                                          
	attr="width="+pagewidth+",height="+pageheight+",scrollbars=yes,status=no,title=yes,toolbars=yes,resizable=no";
	window.open(pageurl, pagename, attr);                                          
}

function GetPage(C, P)
{
	var frmSubmit=document.frmWebsite;
	frmSubmit.action="default.aspx?c=" + C + "&p=" + P;
	frmSubmit.submit();
}

function GetPage1(P)
{
	var frmSubmit=document.frmWebsite;
	frmSubmit.action="default.aspx?s=1&st=1&p=" + P;
	frmSubmit.submit();
}


function doPage(p, s)
{
	var frmSubmit=document.frmWebsite;
	frmSubmit.action="default.aspx?s="+ s + "&p=" + p;
	frmSubmit.submit();
}

function doAdvanceSearch()
{
	frmWebsite.action="default.aspx?s=1&st=1";
	frmWebsite.submit();
}

function trim(text)
{
	pos1=0;
	pos2=text.length-1;
	for(i=0;i<=text.length-1;i++)
		if(text.substr(i,1)==" ") pos1=i;
		else break;
	for(i=length-1;i>=0;i--)
		if(text.substr(i,1)==" ") pos2=i;
		else break;
	if (pos2<pos1) return "";
	return text.substr(pos1,pos2-pos1);
}

function trimstring(strin)
{ 
	var strtemp;
	var i; 
	strtemp="";
	i=0;
	if (strin.charAt(i)!=" "){strtemp=strtemp+strin.charAt(i);}
	for (var i=1;i<strin.length-1;i++){
		if (strin.charAt(i)==" "){
			if (strin.charAt(i+1)!=" ") {strtemp=strtemp+strin.charAt(i)}
		}
		else {strtemp=strtemp+strin.charAt(i)} 
	}
	i=strin.length;
	if (strin.charAt(i)!=" "){strtemp=strtemp+strin.charAt(i)}
	return strtemp; 
}