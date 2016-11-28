<? include("dbconnect.php");?>
 <SCRIPT language=JavaScript>
<?
$table="tb_bac_1";
$query = "Select * FROM  $table order by ten_dv ASC";
$result = mysql_query($query);
$num=mysql_num_rows($result);
?>
var makenum = ".$num.";
var modelsArray_loai_dv = new Array(".$num.");
<?
$table="tb_bac_1";
$query = "Select * FROM  $table order by ten_dv ASC";
$result = mysql_query($query);
$k=-1;
while($rs= mysql_fetch_array($result)) 
{
$mang="";
$k++;
$cat=$rs["ma_bac_1"];
$cat_tam="\"".$rs["ten_dv"].":".$rs["ma_bac_1"]."\"";

$table_2="tb_bac_2";
$query_2 = "Select * FROM  $table_2 where ma_bac_1=$cat order by id ASC";
$result_2 = mysql_query($query_2);
$cuoi_cung="";
$cat_tam_s="";
while($rs_2= mysql_fetch_array($result_2)) 
{
$cat_tam_s.=",\"".$rs_2["ten_dv_tp"].":".$rs_2["ma_bac_2"]."\"";
}
$mang="modelsArray_loai_dv[";
$mang.=$k;
$mang.="] = new Array(";
$mang.=$cat_tam;
$mang.=$cat_tam_s;
$mang.=")";
$mang.=";";
echo"$mang " ;
} ?>;

//modelsArray[0] = new Array('.$cat_tam.','.$cat_tam_s.');
//modelsArray[1] = new Array("cat2:2","GT1:01","GT2:02","GT3:03");
//################################################################################
function getModels_loai_dv(myForm, myArray, selected_make_id, selected_model_id, default_string, all_models) {
  var arrayLength = myArray.length;
  var selMakeIndex = myForm.make_dv.selectedIndex;
  var selMake = myForm.make_dv.options[selMakeIndex].value;
  myForm.model_dv.options.length = 0;

  var modelIndex = 0;

  //Logic to display the default string!
  if(default_string)
  {
      myForm.model_dv.options[modelIndex] = new Option(default_string,"");
  }
  else
  {
      myForm.model_dv.options[modelIndex] = new  Option("Select Sub Catalog", "0");
  }
  if (selMakeIndex  == 0) {
      myForm.model_dv.disabled = true;
      if (myForm.trim_dv)
         getTrims(myForm, 100);
      return;
  }

  modelIndex++;

  for (var i=0;i<arrayLength;i++)  //For all makes
  {
    var mkSplitArray =  myArray[i][0].split(":");
    var make_dv = mkSplitArray[1];
    //alert(selMake + ":" + make);
    if (selMake == make_dv)  // For the choosen make
    {
      for (var j=1;j<myArray[i].length;j++) //For all the models within 
      {
        var splitArray = myArray[i][j].split(":");
        var modelName = splitArray[0];
        var modelId = splitArray[1];
        //var modelStr = splitArray[2];
        var value = modelId;// + ":" + modelStr;
	//var modelName = modelName.substr(0,truncate_limit);
       
        if (!modelName.match(/.Discontinued./)) 
        {
          myForm.model_dv.options[modelIndex] =   new Option (modelName, value);
          if (selected_model_id == modelId)
          {
            myForm.model_dv.selectedIndex = modelIndex;
	  }
          modelIndex++;
        }
      } // for j
      myForm.model_dv.disabled = false;
      //if (selMake != "") { myForm.model.focus(); }
      break;
    }
  } // for i

  if (myForm.model_dv.selectedIndex == 0) {
      if (myForm.trim_dv)
         getTrims(myForm, 100);
      return;
  }
  myForm.model_dv.disabled = false;
}
//################################################################################
</SCRIPT>
 
<SCRIPT language=JavaScript>
<?
include("dbconnect.php");
$table="tb_bac_2";
$query = "Select * FROM  $table order by ten_dv_tp ASC";
$result = mysql_query($query);
$num=mysql_num_rows($result);
?>
var makenum = ".$num.";
var modelsArray_loai_ct = new Array(".$num.");
<?
$table="tb_bac_2";
$query = "Select * FROM  $table order by ten_dv_tp ASC";
$result = mysql_query($query);
$k=-1;
while($rs= mysql_fetch_array($result)) 
{
$mang="";
$k++;
$cat=$rs["ma_bac_2"];
$cat_tam="\"".$rs["ten_dv_tp"].":".$rs["ma_bac_2"]."\"";

$table_2="tb_bac_3";
$query_2 = "Select * FROM  $table_2 where ma_bac_2=$cat order by id ASC";
$result_2 = mysql_query($query_2);
$cuoi_cung="";
$cat_tam_s="";
while($rs_2= mysql_fetch_array($result_2)) 
{
$cat_tam_s.=",\"".$rs_2["ten_dv_ct"].":".$rs_2["ma_bac_3"]."\"";

}
$mang="modelsArray_loai_ct[";
$mang.=$k;
$mang.="] = new Array(";
$mang.=$cat_tam;
$mang.=$cat_tam_s;
$mang.=")";
$mang.=";";
echo"$mang" ;
} ?>;

//modelsArray[0] = new Array('.$cat_tam.','.$cat_tam_s.');
//modelsArray[1] = new Array("cat2:2","GT1:01","GT2:02","GT3:03");
//################################################################################
function getModels_loai_ct(myForm, myArray, selected_make_id, selected_model_id, default_string, all_models) {
  var arrayLength = myArray.length;
  var selMakeIndex = myForm.model_dv.selectedIndex;
  var selMake = myForm.model_dv.options[selMakeIndex].value;
  myForm.model_ct.options.length = 0;

  var modelIndex = 0;

  //Logic to display the default string!
  if(default_string)
  {
      myForm.model_ct.options[modelIndex] = new Option(default_string,"");
  }
  else
  {
      myForm.model_ct.options[modelIndex] = new  Option("Select Sub Sub Catalog", "0");
  }
  if (selMakeIndex  == 0) {
      myForm.model_ct.disabled = true;
      if (myForm.trim_ct)
         getTrims(myForm, 100);
      return;
  }

  modelIndex++;

  for (var i=0;i<arrayLength;i++)  //For all makes
  {
    var mkSplitArray =  myArray[i][0].split(":");
    var model_dv = mkSplitArray[1];
    //alert(selMake + ":" + make);
    if (selMake == model_dv)  // For the choosen make
    {
      for (var j=1;j<myArray[i].length;j++) //For all the models within 
      {
        var splitArray = myArray[i][j].split(":");
        var modelName = splitArray[0];
        var modelId = splitArray[1];
        //var modelStr = splitArray[2];
        var value = modelId;// + ":" + modelStr;
	//var modelName = modelName.substr(0,truncate_limit);
       
        if (!modelName.match(/.Discontinued./)) 
        {
          myForm.model_ct.options[modelIndex] =   new Option (modelName, value);
          if (selected_model_id == modelId)
          {
            myForm.model_ct.selectedIndex = modelIndex;
	  }
          modelIndex++;
        }
      } // for j
      myForm.model_ct.disabled = false;
      //if (selMake != "") { myForm.model.focus(); }
      break;
    }
  } // for i

  if (myForm.model_ct.selectedIndex == 0) {
      if (myForm.trim_ct)
         getTrims(myForm, 100);
      return;
  }
  myForm.model_dv.disabled = false;
}
//################################################################################
function Check_Values(form1)
{
if(form.ma_bac_1.value ==0)
 {
    alert("Please select 'Catalog'!");
	form.ma_bac_1.focus();
    return (false);
  }   
 
  if(form.ma_bac_2.value ==0)
 {
    alert("Please select 'Sub Catalog'!");
	form.ma_bac_2.focus();
    return (false);
  }
}
</SCRIPT>

