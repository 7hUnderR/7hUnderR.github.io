<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->

function check(checked)
{
  for(var i=0;i<document.form.elements.length;i++)
  {  
     var e = document.form.elements[i];
     if (e.name == 'chkBuyOfferIds') {
        e.checked = checked;
     }
  }
}
function delete_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_delete_wait.php?ma_del=company&id=0";
        document.form.target="";
        document.form.submit();
    }
}
function activate_index()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_activate.php?ma_act=act_company_index&key=c";
        document.form.target="";
        document.form.submit();
    }
}
function deactivate_index()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_activate.php?ma_act=deact_company_index&key=c";
        document.form.target="";
        document.form.submit();
    }
}


function activate_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_activate.php?ma_act=activate_company&key=c";
        document.form.target="";
        document.form.submit();
    }
}

function deactivate_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_activate.php?ma_act=deactivate_company&key=c";
        document.form.target="";
        document.form.submit();
    }
}

function getCheckedNum()
{
    var num = 0;                
    for(var i=0;i<document.form.elements.length;i++)
    {  
        var e = document.form.elements[i];
        if (e.name == 'chkBuyOfferIds') {
            if(e.checked)
                num++;
        }
    }
    return num;
}

 function checkInput()
		   {
				var alen=document.form.elements.length;
				var isChecked=false;
				var isNum=true;
				alen=(alen>7)?document.form.chkBuyOfferIds.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
					{
						if(document.form.chkBuyOfferIds[i].checked==true)
						{
							isChecked=true;							
							break;
						}
					}
										
				}else
				{
					if(document.form.chkBuyOfferIds.checked==true)
						isChecked=true;
				}
				
				if (isChecked)											
					calculatechon();
			return isChecked;
		  } 
function calculatechon()
			{			
				var strchon="";
				var alen=document.form.elements.length;				
				alen=(alen>7)?document.form.chkBuyOfferIds.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						if(document.form.chkBuyOfferIds[i].checked==true)
							strchon+=document.form.chkBuyOfferIds[i].value+",";
				}else
				{
					if(document.form.chkBuyOfferIds.checked==true)
						strchon=document.form.chkBuyOfferIds[i].value;
				}
				document.form.chkids.value=strchon;	
				
			}	

function GotoPage(iPage) {
       document.form.curPg.value=iPage;
       document.form.submit();
}		
function GotoPage_(iPage) {
       document.form_.curPg_.value=iPage;
       document.form_.submit();
}		

function view_skqa(id)
	{
		var arg= "width=400,height=520,resizable=no,scrollbars=no,status=0,top=0,left=0";			
		window.open ("inc/popup_skqa.php?id="+ id ,"a",arg);	
		
	}
</script>
