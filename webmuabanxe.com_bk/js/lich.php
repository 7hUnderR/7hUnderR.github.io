<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script language="javascript">
var ns6=document.getElementById&&!document.all
var ie4=document.all

var Selected_Month;
var Selected_Year;
var Current_Date = new Date();
var Current_Month = Current_Date.getMonth();

var Days_in_Month = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
var Month_Label = new Array('Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12');

var Current_Year = Current_Date.getYear();
if (Current_Year < 1000)
Current_Year+=1900


var Today = Current_Date.getDate();

function Header(Year, Month) {

   if (Month == 1) {
   Days_in_Month[1] = ((Year % 400 == 0) || ((Year % 4 == 0) && (Year % 100 !=0))) ? 29 : 28;
   }
   var Header_String = Month_Label[Month] + ' ' + Year;
   return Header_String;
}



function Make_Calendar(Year, Month) {
   var First_Date = new Date(Year, Month, 1);
   var Heading = Header(Year, Month);
   var First_Day = First_Date.getDay() + 1;
   if (((Days_in_Month[Month] == 31) && (First_Day >= 6)) ||
       ((Days_in_Month[Month] == 30) && (First_Day == 7))) {
      var Rows = 6;
   }
   else if ((Days_in_Month[Month] == 28) && (First_Day == 1)) {
      var Rows = 4;
   }
   else {
      var Rows = 5;
   }

   var HTML_String = '<table align="center" ><tr><td valign="top"><table border="1" align="center" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" width="192" class="text_def">';

   HTML_String += '<tr><th colspan=7 BGCOLOR="CCCCCC" class="tab_5_5_5_5" >' + Heading + '</font></th></tr>';

   HTML_String += '<tr><th align="center" bgcolor="#7fafe9">S</th><th align="center" bgcolor="#7fafe9">M</th><th align="center" bgcolor="#7fafe9">T</th><th align="center" bgcolor="#7fafe9">W</th>';

   HTML_String += '<th align="center" bgcolor="#7fafe9">T</th><th align="center" bgcolor="#7fafe9">F</th><th align="center" bgcolor="#7fafe9">S</th></tr>';

   var Day_Counter = 1;
   var Loop_Counter = 1;
   
   var date_get='<?=$date?>';
   var class_select='';
   var date_chay='';
   var fext='';
   var fext_m='';
   
   for (var j = 1; j <= Rows; j++) {
      HTML_String += '<tr ALIGN="left" VALIGN="top">';
      for (var i = 1; i < 8; i++) {
         if ((Loop_Counter >= First_Day) && (Day_Counter <= Days_in_Month[Month])) 
		 {
		 if(Day_Counter<10)
		   fext="0";
		 else
		   fext="";
		 if(Month<10)
		   fext_m="0";
		 else
		   fext_m="";
		   var Month_g=Month +1;

		
            if ((Day_Counter == Today) && (Year == Current_Year) && (Month == Current_Month)) {
               HTML_String += '<td BGCOLOR="CCCCCC" align="center" ><a href="./?Bcat=<?=$cat_s?>&lg=<?=$lg?>&start=0&date='+fext+Day_Counter+'/'+fext_m+Month_g+'/'+Year+'"><strong><font color="red">' + Day_Counter + '</font></strong></a></td>';
            }
            else {
              
			  date_chay=fext+Day_Counter+'/'+fext_m+Month_g+'/'+Year;
			  
			  if(date_chay==date_get)
			     class_select='bg_ngay';
			  else
			     class_select='bg_right_1';
				 
			  HTML_String += '<td align="center" class='+ class_select +'><a href="./?Bcat=<?=$cat_s?>&lg=<?=$lg?>&start=0&date='+fext+Day_Counter+'/'+fext_m+Month_g+'/'+Year+'">' + Day_Counter + '</a></td>';
            }
            Day_Counter++;    
         }
         else {
            HTML_String += '<td > </td>';
         }
         Loop_Counter++;
      }
      HTML_String += '</tr>';
   }
   HTML_String += '</table></td></tr></table>';
   cross_el=ns6? document.getElementById("Calendar") : document.all.Calendar
   cross_el.innerHTML = HTML_String;
}


function Check_Nums() {
   if ((event.keyCode < 48) || (event.keyCode > 57)) {
      return false;
   }
}



function On_Year() {
   var Year = document.when.year.value;
   if (Year.length == 4) {
      Selected_Month = document.when.month.selectedIndex;
      Selected_Year = Year;
      Make_Calendar(Selected_Year, Selected_Month);
   }
}

function On_Month() {
   var Year = document.when.year.value;
   if (Year.length == 4) {
      Selected_Month = document.when.month.selectedIndex;
      Selected_Year = Year;
      Make_Calendar(Selected_Year, Selected_Month);
   }
   else {
      alert('Please enter a valid year.');
      document.when.year.focus();
   }
}


function Defaults() {
   if (!ie4&&!ns6)
   return
   var Mid_Screen = Math.round(document.body.clientWidth / 2);
   document.when.month.selectedIndex = Current_Month;
   document.when.year.value = Current_Year;
   Selected_Month = Current_Month;
   Selected_Year = Current_Year;
   Make_Calendar(Current_Year, Current_Month);
}


function Skip(Direction) {
   if (Direction == '+') {
      if (Selected_Month == 11) {
         Selected_Month = 0;
         Selected_Year++;
      }
      else {
         Selected_Month++;
      }
   }
   else {
      if (Selected_Month == 0) {
         Selected_Month = 11;
         Selected_Year--;
      }
      else {
         Selected_Month--;
      }
   }
   Make_Calendar(Selected_Year, Selected_Month);
   document.when.month.selectedIndex = Selected_Month;
   document.when.year.value = Selected_Year;
}
</script>