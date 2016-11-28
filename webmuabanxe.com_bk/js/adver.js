var arrDate = GMTUTime.split(' ');
var currentServerDate = arrDate[0];
var width_right = 120;
var width_left = 168;
var width_bottom = 775;
function viewAdver(type){
	var arrAdver = new Array();
	var pos='';
	var width=0;
	var adver_type;
	switch (type) {
	   case 'left' :
		  pos = '1';
		  width = width_left;
		  arrAdver = arrLeftAdver;
		  adver_type = 'Left';
		  break;
	   case 'right' :
		  pos = '2';
		  width = width_right;
		  arrAdver = arrRightAdver;
		  adver_type = 'Right';
		  break;
	   case 'bottom' :
		  pos = '3';
		  width = width_bottom;
		  arrAdver = arrBottomAdver;
		  adver_type = 'Bottom';
		  break;
	} 
	var returnStr = '';	
	dataSrc = '';
	limdex = 0;
	if(width){
		//returnStr += '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" align="center">';
		var nothing = true;
		for(i=0;i<arrAdver.length;i++){
			var arrItem = arrAdver[i];
			if(arrItem.length){
				//var arrPage = new Array();
				//arrPage = arrItem[1].split('#');
				//if(arrPage.length){
					//for(j=0;j<arrPage.length;j++){
						//if((arrPage[j]==pageID)&&(isAvailable(arrItem[4],currentServerDate,arrItem[5]))){
						if((isAvailable(arrItem[3],currentServerDate,arrItem[4]))){	
							if((pos=='1')) {//left||right
								dataSrc = '';
								strWH = '';
								if(parseInt(arrItem[6])>0) 	{strWH +=' width="'+arrItem[6]+'" ';}
								if(parseInt(arrItem[7])>0) 	strWH +=' height="'+arrItem[7]+'" ';
								if(isPix(arrItem[5])){
									dataSrc = '<img border="0" src="'+arrItem[5]+'" '+strWH+'  align="center">';	
								}
								else if(isFlash(arrItem[5])){
									dataSrc = '<embed src="'+arrItem[5]+'" '+strWH+' quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>';	
								}
							    returnStr += '<tr>';
        						returnStr += '<td width="100%"  align="center"   style="padding-top:3px;">';
        						returnStr += '<a href="'+arrItem[2]+'" onClick="window.open(\'ad_click.php?id='+arrItem[0]+'\');return false;">'+dataSrc+'</a></td>';
      							returnStr += '</tr>';
							    returnStr += '<tr>';
        						returnStr += '<td width="100%" height="5"  align="center"  style="BORDER-BOTTOM: #316531 1px solid" ></td>';
      							returnStr += '</tr>';
							}
							else if(pos=='2'){
								dataSrc = '';
								strWH = '';
								if(parseInt(arrItem[6])>0) 	strWH +=' width="'+arrItem[6]+'" ';
								if(parseInt(arrItem[7])>0) 	strWH +=' height="'+arrItem[7]+'" ';
								if(isPix(arrItem[5])){
									dataSrc = '<img border="0" src="'+arrItem[5]+'" '+strWH+'  align="center">';	
								}
								else if(isFlash(arrItem[5])){
									dataSrc = '<embed src="'+arrItem[5]+'" '+strWH+' quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>';	
								}
							    returnStr += '<tr>';
        						returnStr += '<td width="100%"   style="padding-top:3px; ">';
        						returnStr += '<a href="'+arrItem[2]+'" onClick="window.open(\'ad_click.php?id='+arrItem[0]+'\');return false;">'+dataSrc+'</a></td>';
      							returnStr += '</tr>';
							    returnStr += '<tr>';
        						returnStr += '<td width="100%" height="5"  align="center" style="BORDER-BOTTOM: #316531 1px solid" ></td>';
      							returnStr += '</tr>';
							}
							else if (pos=='3') {//bottom
								dataSrc = '';
								strWH = '';
								if(parseInt(arrItem[6])>0) 	{strWH +=' width="'+arrItem[6]+'" '; limdex += parseInt(arrItem[6])+1;}
								if(parseInt(arrItem[7])>0) 	strWH +=' height="'+arrItem[7]+'" ';
								if(isPix(arrItem[5])){
									dataSrc = '<img border="0" src="'+arrItem[5]+'" '+strWH+' style="margin-right:1px;margin-left:0px;margin-top:0px;margin-bottom:0px;">';	
								}
								else if(isFlash(arrItem[5])){
									dataSrc = '<embed src="'+arrItem[5]+'" '+strWH+' quality="high" style="margin-right:1px;margin-left:0px;margin-top:0px;margin-bottom:0px;" wmode="transparent" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>';	
								}
								returnStr += '<TD><a onMouseOver="adverStop()" onMouseOut="adverStart()" href="'+arrItem[2]+'" onClick="window.open(\'ad_click.php?id='+arrItem[0]+'\');return false;">'+dataSrc+'</a></TD>';	
							}
							nothing = false;
							//break;
						}
					//}
				//}
			}
		}
		if(pos=='3'){
			//returnStr = '<marquee id="bottomAdver" class="hotnews" behavior="scroll" direction="left" scrollamount="2"><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="1" align="center"><tr>' + returnStr + '</tr></table></marquee>';
			returnStr = '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="1" align="center"><tr>' + returnStr + '</tr></table>';
		}else{
			returnStr = '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" align="center">' + returnStr + '</table>';	
			document.write(returnStr);
		}
		//returnStr += '</table>';
	}
	return returnStr;
}
function viewPopup(){
	arrAdver = arrPopupAdver;
	for(i=0;i<arrAdver.length;i++){
		var arrItem = arrAdver[i];
		if(arrItem.length){
			var arrPage = new Array();
			arrPage = arrItem[1].split('#');
			if(arrPage.length){
				for(j=0;j<arrPage.length;j++){
					if((arrPage[j]==pageID)&&(isAvailable(arrItem[4],currentServerDate,arrItem[5]))){
						popupImage(arrItem[6],null, null, null, null,1,arrItem[3],arrItem[0]);
						break;
					}
				}
			}
		}
	}
}
function DateToInt(date){
	return parseInt(Date.parse(date));
}
function isAvailable(startDate,currentServerDate,expriedDate){
	var startInt = 	DateToInt(startDate);
	var currentInt = DateToInt(currentServerDate);
	var expiredInt = DateToInt(expriedDate);
	return ((currentInt >= startInt) && (currentInt <= expiredInt));
}