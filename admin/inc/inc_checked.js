var vLng_upl_PROGID = "SidebarSynch.SBSynch";
var vLng_upl_CLSID = "028518E1-9FA8-44FC-92D7-5C54244B5F36";


function DataTableCheckBox_Click()
{
    var oTR = this.parentNode.parentNode;
    
    if(this.checked) 
      {
	  if(this.IsNewMessage) oTR.className += ' selected';
	  else oTR.className = 'selected';
	  g_oDataTable.CheckBoxes.NumberChecked++;
      }
    else 
      {
	  if(this.IsNewMessage) oTR.className = 'msgnew';
	  else oTR.className = 'msgold';
	  g_oDataTable.CheckBoxes.NumberChecked--;
      }
    
    g_oDataTable.SelectAllRows.checked = (g_oDataTable.CheckBoxes.NumberChecked == g_oDataTable.CheckBoxes.length) ? true : false;
}

function SelectAllRows_Click()
{
    var aCheckBoxes = g_oDataTable.CheckBoxes;
    var bChecked = g_oDataTable.SelectAllRows.checked;
    
    if(this.id == 'clearall' || this.id == 'checkall')
      {
	  bChecked = (this.id == 'clearall') ? false : true;
	  g_oDataTable.SelectAllRows.checked = bChecked;
      }
    
    var aRows = g_oDataTable.tBodies[0].rows;
    var nRows = aRows.length-1;
				
    if(bChecked)
      {
	  for(var i=nRows;i>=0;i--)
	    {
		aCheckBoxes[i].checked = bChecked;
		if(aCheckBoxes[i].IsNewMessage) aRows[i].className += ' selected';
		else aRows[i].className = 'selected';
	    }
      }
    else
      {
	  for(var i=nRows;i>=0;i--)
	    {
		aCheckBoxes[i].checked = bChecked;
		aRows[i].className = (aCheckBoxes[i].IsNewMessage) ? 'msgnew' : '';
	    }
      }
    
    g_oDataTable.CheckBoxes.NumberChecked = (bChecked) ? g_oDataTable.CheckBoxes.length : 0;
}

function DataTable_Init()
{
    g_oDataTable = document.getElementById("datatable");
    
    if(g_oDataTable)
      {
	  g_oDataTable.SelectAllRows = document.getElementById("selectallrows");
	  g_oDataTable.SelectAllRows.onclick = SelectAllRows_Click;		
	  
	  var oMouseOver = function(){this.style.textDecoration = 'underline';}
	  var oMouseOut = function(){this.style.textDecoration = 'underline';}
	  
	  document.getElementById("checkall").onclick = SelectAllRows_Click;
	  document.getElementById("clearall").onclick = SelectAllRows_Click;
	  
	  var aCheckBoxes = document.getElementsByName("Mid");
	  var aRows = g_oDataTable.tBodies[0].rows;
	  var nRows = aRows.length-1;
	  
	  for (var i = nRows; i >= 0; i--) {
	      aCheckBoxes[i].IsNewMessage = (aRows[i].className == 'msgnew') ? true : false;
	      aCheckBoxes[i].onclick = DataTableCheckBox_Click;
	  }
	  
	  g_oDataTable.CheckBoxes = aCheckBoxes;
	  g_oDataTable.CheckBoxes.NumberChecked = 0;					
      }
    else return false;
}
			

function IsControlInstalled()
{
    if (FolderViewVals.SidebarSyncActionType &&
	FolderViewVals.StateDynamic &&
	(FolderViewVals.yplus_browser || FolderViewVals.premium_user)) {
	
	try
	  {
	      var obj = new ActiveXObject(vLng_upl_PROGID);
	      if ( obj )     
		return true;  
	  }
	catch(e) {}
	return false;
    }
}
    
function InsertObjectTag()
{
    if (FolderViewVals.SidebarSyncActionType &&
	FolderViewVals.StateDynamic &&
	(FolderViewVals.yplus_browser || FolderViewVals.premium_user)) {

	var tag = "<OBJECT ID=sbSynch CLASSID=CLSID:" + vLng_upl_CLSID + "></OBJECT>";
	
	var here = document.all("iObjectHere");
	if (here)
	  here.insertAdjacentHTML("afterBegin", tag);
    }
}

function doSynch()
{
    if (FolderViewVals.SidebarSyncActionType &&
	FolderViewVals.StateDynamic &&
	(FolderViewVals.yplus_browser || FolderViewVals.premium_user)) {

	if ( IsControlInstalled() == true )
	  {
	      InsertObjectTag();
	      var obj = document.all("sbSynch");
	      if (obj && obj.object)
		obj.sbNotify("mail", FolderViewVals.SidebarSyncActionType, FolderViewVals.SidebarSyncUIDList);
	  }
    }
}
