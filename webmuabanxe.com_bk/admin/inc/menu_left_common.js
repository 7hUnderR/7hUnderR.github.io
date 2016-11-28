/*-------------------------------------------------------------------------------
	*	FileName ; $common.js
	* Function : commmon utilies functions
	* CreatedDate : 01/02/2003
	* LastUpdate : 01/03/2003
-------------------------------------------------------------------------------*/
function stoperror(){ 
return true 
} 
window.onerror=stoperror 

//------------------------------------------------
// Function Name : LTrim 
// Actions : Remove left string.
//------------------------------------------------
function LTrim(Str) {
	return Str.replace(/^\s+/, '');
}

//------------------------------------------------
// Function Name : RTrim 
// Actions : Remove right space.
//------------------------------------------------
function RTrim(Str) {
	return Str.replace(/\s+$/, '');
}

//------------------------------------------------
// Function Name : Trim 
// Actions : Remove left&right space.
//------------------------------------------------
function Trim(Str) {
	return RTrim(LTrim(Str));
}

//------------------------------------------------
// Function Name : RemoveSpace 
// Actions : Remove left, right & all unwanted spaces inside a Str
//------------------------------------------------
function RemoveSpace(Str) {
	var str = Trim(Str).replace(/\s+/g, ' ');
	str = str.replace(/\s+[,]/g, ',');
	str = str.replace(/\s+[;]/g, ' ;');
	str = str.replace(/\s+[:]/g, ' :');
	return str.replace(/\s+[.]/g, '.');
}

//------------------------------------------------
// Function Name : AddSpace 
// Actions : Add some space to correct sentense
//------------------------------------------------
function AddSpace(Str) {
	var str = Str.replace(/\,/g, ', ');
	str = str.replace(/;/g, '; ');
	str = str.replace(/;/g, ' ;');
	str = str.replace(/\./g, '. ');
	str = str.replace(/\:/g, ' :');
	str = str.replace(/\:/g, ': ');
	str = RemoveSpace(str);
	return str;
}

//------------------------------------------------
// Function Name : TypingCheck 
// Actions : Check spell
//------------------------------------------------
function TypingCheck(Str) {
	var arrayStr = new Array();
	Str = AddSpace(Str);
	for (var i = 0; i < Str.length; i++) {
			arrayStr[i] = Str.charAt(i);
	}
	for (var i = 0; i < Str.length; i++) {
		if ( ( (isPeriod = (arrayStr[i] == '.')) || (arrayStr[i] == ',') || (arrayStr[i] == ';') )  && (i != Str.length - 1) ) {
			arrayStr[i+2] = isPeriod ? arrayStr[i+2].toUpperCase() : arrayStr[i+2].toLowerCase();
		}
	}
	arrayStr[0] = arrayStr[0].toUpperCase();
	var str = "";
	for (var i = 0; i < Str.length; i++) {
			str += arrayStr[i];
	}
	return str;
}

function checkSearch(f) {
	var keys;
	var keys_lower;
	var keys_upper;
	f.action = '';
	keys = Trim(f.k.value);
	if (keys!='') {
	 	f.k.value = keys;
		keys_lower = keys.toLowerCase();
		f.l.value = keys_lower;
		keys_upper = keys.toUpperCase();
		f.u.value = keys_upper;
		switch(f.search_where.value){
			case '2' :
				f.action = 'news.php';
				return true;
			case '4' :
				f.action = 'service.php';
				return true;
			default :
				f.action = 'search_product.php';
				return true;
		}
	}
	f.action = '';
	return false;
}	
function checkNewsletter(f){
	if(isEmail(f.email.value)){
		window.open('newsletter.php?email='+f.email.value,'PopNewsLetter','width=350,height=60');
	}
	else{
		alert('Email không hợp lệ. Vui lòng kiểm tra lại !');
		f.email.focus();
	}
	return false;
}
function checkMail(f){
	if(isEmail(f.email.value)){
		window.open('mail2friend.php?email='+f.email.value,'PopEmail','width=350,height=60');
	}
	else{
		alert('Email không hợp lệ. Vui lòng kiểm tra lại !');
		f.email.focus();
	}
	return false;
}
	function setCookie(name,value){
		document.cookie = name + '=' + escape(value) +  ';path=/';
		return ;
	}
	function getCookie(name){
		var cname = name + '=';
		var dc = document.cookie;
		if (dc.length > 0) {
			var begin = dc.indexOf(cname);
			if (begin != -1) {
			begin += cname.length;
			var end = dc.indexOf(';', begin);
			if (end == -1) end = dc.length;
				return unescape(dc.substring(begin, end));
			}
		}
		return null;
	}
	
function GetYear() {
	var mydate=new Date()
	var year=mydate.getYear()
	if (year < 1000)
		year+=1900
	document.write (year)
}

function DateDisplay() {
	var mydate=new Date()
	var year=mydate.getYear()
	if (year < 1000)
		year+=1900
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10) daym="0"+daym
		var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
		var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
		document.write(dayarray[day]+", "+montharray[month]+" "+daym+", "+year)
}
	function getCategoryName(id){
		var i;
		for(i=0;i<Tree.length;i++){
			var arrElement = Tree[i].split('|');
			if(arrElement[0]==id){
				return arrElement[2];
			}
		}
		return 'Products';
	}
	function getCategoryName4member(id){
		var i;
		for(i=0;i<Tree4member.length;i++){
			var arrElement = Tree4member[i].split('|');
			if(arrElement[0]==id){
				return arrElement[2];
			}
		}
		return '';
	}
	function instantStr(str){
		var imax = str.length;
		var str_new = '';
		for(var i=0;i<str.length;i++){
			str_new += str.charAt(i)+'&nbsp;'; 
		}
		return str_new;
	}
	function getTopicName(id){
		var i;
		for(i=0;i<arr_document_topic.length;i++){
			if(arr_document_topic[i][0]==id) return arr_document_topic[i][1];
		}
		return 'N/A';
	}
	function setCookie(name,value){
		document.cookie = name + '=' + escape(value) +  ';path=/';
		return ;
	}
	function getCookie(name){
		var cname = name + '=';
		var dc = document.cookie;
		if (dc.length > 0) {
			var begin = dc.indexOf(cname);
			if (begin != -1) {
			begin += cname.length;
			var end = dc.indexOf(';', begin);
			if (end == -1) end = dc.length;
				return unescape(dc.substring(begin, end));
			}
		}
		return null;
	}	