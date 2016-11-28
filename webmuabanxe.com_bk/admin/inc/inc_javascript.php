<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>
	function AcceptNumbersOnly() {
		switch (event.keyCode) {
			case 48:
			case 49:
			case 50:
			case 51:
			case 52:
			case 53:
			case 54:
			case 55:
			case 56:
			case 57:
			case 8:
			case 9:
			case 35:
			case 36:
			case 37:
			case 39:
			case 46:
			case 96:
			case 97:
			case 98:
			case 99:
			case 100:
			case 101:
			case 102:
			case 103:
			case 104:
			case 105:
				break;
			case 86:
				if (event.ctrlKey) {
					event.returnValue=true;
				}	else {
					event.returnValue=false;
				}
				break;
			case 45:
				event.returnValue=true;
				break;
			default:
				event.returnValue=false;
				break;
		}
	}
	
		
		function show_sub(name_s,url,t,l,w,h)
		{
			javascript:window.open(url,name_s,'mn_status=0,location=0,moveabled=0,toolbars=0,resizable=1,menubar=0,scrollbars=0,scrolling=0,top=' + (t-document.body.scrollTop) + ',left=' + (l-document.body.scrollLeft)+',width=' + w + ',height=' + h +'');
		}		  
			
		function GotoPage(iPage) {
			   document.frmPaging.curPg.value=iPage;
			   document.frmPaging.submit();
		}		  


		function p_color()
		{
		   show_sub('Color','admin_product_color.php',280,320,420,400);
		}
		function p_size()
		{
		   show_sub('Size','admin_product_size.php',280,320,420,400);
		}
		function p_made()
		{
		   show_sub('Size','admin_product_made.php',280,320,420,400);
		}
		
  function dem_chon()
			{			
				var strchon="";
				var alen=document.messageList.elements.length;				
				alen=(alen>2)?document.messageList.Mid.length:0;				
		      	if (alen>0)
				 {
			   		for(var i=0;i<alen;i++)
						if(document.messageList.Mid[i].checked==true)
							strchon+=document.messageList.Mid[i].value+",";
				 }
				else
				 {
					if(document.messageList.Mid.checked==true)
						strchon=document.messageList.Mid.value;
				 }				
				document.messageList.chon.value=strchon;	
				
				
			}
					
  function dem_chon_private_news()
			{			
				var strchon="";
				var str_khong_chon="";
				var alen=document.messageList.elements.length;				
				alen=(alen>2)?document.messageList.Mid.length:0;				
		      	if (alen>0)
				 {
			   		for(var i=0;i<alen;i++)
						if(document.messageList.Mid[i].checked==true)
							strchon+=document.messageList.Mid[i].value+",";
						else
						    str_khong_chon+=document.messageList.Mid[i].value+",";
				 }
				else
				 {
					if(document.messageList.Mid.checked==true)
						strchon=document.messageList.Mid.value;
				 }				
				document.messageList.chon.value=strchon;	
				document.messageList.khong_chon.value=str_khong_chon;	
				
				
			}
		
  function dem_chon_s()
			{			
				var strchon_s="";
				var alen=document.messageList.elements.length;				
				alen=(alen>2)?document.messageList.Mid_s.length:0;				
		      	if (alen>0)
				 {
			   		for(var i=0;i<alen;i++)
						if(document.messageList.Mid_s[i].checked==true)
							strchon_s+=document.messageList.Mid_s[i].value+",";
				 }
				else
				 {
					if(document.messageList.Mid_s.checked==true)
						strchon_s=document.messageList.Mid_s.value;
				 }				
				document.messageList.chon_s.value=strchon_s;	
			}
		
	    function getCheckedNum_muc()
			{
				var num = 0;                
				for(var i=0;i<document.messageList.elements.length;i++)
				{  
					var e = document.messageList.elements[i];
					if (e.name == 'Mid') {
						if(e.checked)
							num++;
					}
				}
				return num;
			}
		

	function update_quyen()
		{
				dem_chon();
				dem_chon_s();
				document.messageList.action="activate.php?ma_activate=update_quyen";
				document.messageList.target="";
				document.messageList.submit();
		}
	function update_quyen_catalog()
		{
				dem_chon();
				dem_chon_s();
				document.messageList.action="admin_activate.php?key=update_quyen_catalog&ma_act=update_quyen_catalog";
				document.messageList.target="";
				document.messageList.submit();
		}

	function delete_muc_do()
		{
			var checkedNum = getCheckedNum_muc();
			
			if(checkedNum == 0) {
					alert("Please select item !");
			}
		
			if(checkedNum > 0) {
		
				dem_chon();
				document.messageList.action="admin_delete_wait.php?ma_del=catalog&key=view";
				document.messageList.target="";
				document.messageList.submit();
			}
		}

		function activate_muc_do()
		{
			var checkedNum = getCheckedNum_muc();
			
			if(checkedNum == 0) {
					alert("Please select item !");
			}
		
			if(checkedNum > 0) {
		
				dem_chon();
				document.messageList.action="admin_activate.php?ma_act=activate_muc&key=muc";
				document.messageList.target="";
				document.messageList.submit();
			}
		}

		function deactivate_muc_do()
		{
			var checkedNum = getCheckedNum_muc();
			if(checkedNum == 0) {
					alert("Please select item !");
			}
		
			if(checkedNum > 0) {
		
				dem_chon();
				document.messageList.action="admin_activate.php?ma_act=deactivate_muc&key=muc";
				document.messageList.target="";
				document.messageList.submit();
			}
		}


	function delete_do()
	{
		var checkedNum = getCheckedNum_muc();
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
	
			 dem_chon();
			document.messageList.action="admin_delete_wait.php?ma_del=product&id=0";
			document.messageList.target="";
			document.messageList.submit();
		}
	}
	function activate_index()
	{
		var checkedNum = getCheckedNum_muc();
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
	
			 dem_chon();
			document.messageList.action="admin_activate.php?ma_act=activate_index&key=view";
			document.messageList.target="";
			document.messageList.submit();
		}
	}
	function deactivate_index(){
		var checkedNum = getCheckedNum_muc();
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
			dem_chon();
			document.messageList.action="admin_activate.php?ma_act=deactivate_index&key=view";
			document.messageList.target="";
			document.messageList.submit();
		}
	}
	
	
	function activate_do()
	{
		var checkedNum = getCheckedNum_muc();		
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
	
			 dem_chon();
			document.messageList.action="admin_activate.php?ma_act=activate&key=view";
			document.messageList.target="";
			document.messageList.submit();
		}
	}
	
	function deactivate_do()
	{
		var checkedNum = getCheckedNum_muc();		
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
			 dem_chon();
			document.messageList.action="admin_activate.php?ma_act=deactivate&key=view";
			document.messageList.target="";
			document.messageList.submit();
		}
	}

	function chuyen_baiviet(cat)
	{
		var checkedNum = getCheckedNum_muc();		
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
			 dem_chon();
			document.messageList.action="admin_chuyen_baiviet.php?cat="+cat+"&post";
			document.messageList.target="";
			document.messageList.submit();
		}
	}

	function update_all_do(file,query)
	{
			document.messageList.action=file+query;
			document.messageList.target="";
			document.messageList.submit();
	}

	
	function delete_all_do(file,query)
	{
		var checkedNum = getCheckedNum_muc();		
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
			dem_chon();
			document.messageList.action=file+query;
			document.messageList.target="";
			document.messageList.submit();
		}
	}
	
	function activate_all_do(file,query)
	{
		var checkedNum = getCheckedNum_muc();		
		if(checkedNum == 0) {
				alert("Please select item !");
		}
	
		if(checkedNum > 0) {
			dem_chon();
			document.messageList.action=file+query;
			document.messageList.target="";
			document.messageList.submit();
		}
	}
	function activate_hoat_dong(file,query)
	{
			dem_chon();
			document.messageList.action=file+query;
			document.messageList.target="";
			document.messageList.submit();
	}
 	function activate_private_news_do(file,query)
	{
		var checkedNum = getCheckedNum_muc();		

			dem_chon_private_news();
			document.messageList.action=file+query;
			document.messageList.target="";
			document.messageList.submit();
	}
	function update_industry(file,query)
	{
			document.messageList.action=file+query;
			document.messageList.target="";
			document.messageList.submit();
	}
</script>