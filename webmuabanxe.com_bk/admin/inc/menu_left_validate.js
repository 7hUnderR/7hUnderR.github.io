/*-------------------------------------------------------------------------------
	*	FileName ; $common.js
	* Function : validative functions
	* CreatedDate : 01/02/2003
	* LastUpdate : 25/10/2004
-------------------------------------------------------------------------------*/
/*The following functions are described by their names*/

//-------------------------------------------------------------------------------
function isSpaces (Str) {
	if (isEmpty (Str)) return true;
	var i = 0;	
	while (Str.charAt(i)==' ' && i<Str.length) {
		i++;
	}
	if (i== Str.length) return true;
	return false;
}

//-------------------------------------------------------------------------------
function isEmpty(Str) {
	empty = (Str === "") ? true :  false;
	return empty;
}

//-------------------------------------------------------------------------------
function isNumber(Digit) {
	return /^\d+[\.\d*]?$/.test(Digit);
}

//------------------------------------------------------------------------------
function isAlphabet(Digit) {
	return /^[a-zA-Z]$/.test(Digit);
}

//-------------------------------------------------------------------------------
function isInteger(Str) {
	return /^[+-]?\d+$/.test(Str);
}

//-------------------------------------------------------------------------------
function isFloat(Str) {
		return /^[+-]?\d+\.{1}\d*$/.test(Str);
}

//-------------------------------------------------------------------------------
function isCurrency(Str) {
		return /^\d+[.]{1}[0-9]{2,}$/.test(Str);
}

//-------------------------------------------------------------------------------
function isDate(Str) {
	var bool1=/^[0]?\d[\/|-][0-2]\d[\/|-]\d{4}$/.test(Str);		//0x month format 0X-2X date format
	var bool2=/^[1][0-2][\/|-][0-2]\d[\/|-]\d{4}$/.test(Str);	//1x month format 3X date format
	var bool3=/^[1][0-2][\/|-][3][0,1][\/|-]\d{4}$/.test(Str);	
	var bool4=/^[0]?\d[\/|-][3][0,1][\/|-]\d{4}$/.test(Str);
	return ((bool1)||(bool2)||(bool3)||(bool4));
}

//-------------------------------------------------------------------------------
function isValidDate(nDay,nMonth,nYear) {
	if (nMonth==2 && nDay > 29) return false;
	if (nMonth==2 && nDay ==29 && nYear % 4 !=0) return false;
	if (nDay==31 && (nMonth == 4 || nMonth == 6 || nMonth == 9 || nMonth == 11 )) return false;
	return true;
}

//-------------------------------------------------------------------------------
function isTime(Str) {
		var bool1 = /^[0-1]?\d:[0-5]\d(:[0-5]\d)?$/.test(Str);
		var bool2 = /^[2][0-3]:[0-5]\d(:[0-5]\d)?$/.test(Str);
		return ((bool1)||(bool2));
}

//-------------------------------------------------------------------------------
function isDateTime(Str) {
		var str = RemoveSpace(Str).split(' ');
		return isDate(str[0]) && isTime(str[1]);
}

//-------------------------------------------------------------------------------
function isDomain (Str) {
	// The pattern for matching all special characters. 
  	//These characters include ( ) < > [ ] " | \ / ~ ! @ # $ % ^ & ? ` ' : ; , 
	var specialChars="\\(\\)<>#\\$&\\*!`\\^\\?~|/@,;:\\\\\\\"\\.\\[\\]";
	// The range of characters allowed in a username or domainname. 
	// It really states which chars aren't allowed. 
	var validChars="\[^\\s" + specialChars + "\]";
	 // An atom (basically a series of  non-special characters.) 
	var atom=validChars + '+';
	// The structure of a normal domain 
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	
	// Check if IP
	var ipDomainPat=/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/;
	var IPArray=Str.match(ipDomainPat);
	if (IPArray!=null) {
  	// this is an IP address
	 	 for (var i=1;i<=4;i++) {
	    		if (IPArray[i]>255) {
	 			return false
	   		 }
   		 }
	}
	// Check Domain
	var domainArray=Str.match(domainPat)
	if (domainArray==null) {
    		return false;
	}

	/* domain name seems valid, but now make sure that it ends in a
	 three-letter word (like com, edu, gov ... ) or a two-letter word,
   	representing country (uk, vn) or a four-letter word (.info), and that there's a hostname preceding 
   	the domain or country. */

	/* Now we need to break up the domain to get a count of how many atoms
	it consists of. */
	var atomPat=new RegExp(atom,"g")
	var domArr=Str.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || domArr[domArr.length-1].length>4) {
	 // the address must end in a two letter or three letter word or four-letter word.
		return false;
	}

	// Make sure there's a host name preceding the domain.
	if (len<2) {
   		 return false;
	}

	return true;
}

//-------------------------------------------------------------------------------
function isOpenDomain (Str) { // E.g : lengvu.saigonnet.vn:81 or 203.162.6.65:8080
	var pos=Str.indexOf(':');
	if (pos==-1) {
		return (isDomain(Str))
	}
	else {
		domain=Str.substring(0,pos);
		openDomain = Str.substring(pos,Str.length);
	}
		return ((/^[\:]{1}\d+$/.test(openDomain))&&(isDomain(domain)));
}

//-------------------------------------------------------------------------------
function isUser (Str) {
	var specialChars="\\(\\)<>#\\$&\\*!`\\^\\?~|/@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	/* The pattern applies if the "user" is a quoted string (in
   	which case, there are no rules about which characters are allowed
   	and which aren't; anything goes).  E.g. "le nguyen vu"@webtome.com
   	is a valid (legal) e-mail address. */
	var quotedUser="(\"[^\"]*\")";
	var atom=validChars + '+'
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	// See if "user" is valid 
	if (Str.match(userPat)==null) {
    		return false ;
	}
	return true;
}

//-------------------------------------------------------------------------------
function isURL(Str) { //not include http://
	var pos=Str.indexOf('/');
	var domain = (pos==-1)?Str:Str.substring(0,pos);
	var subURL = (pos==-1)?'':Str.substring(pos,Str.length);
	if (!isOpenDomain(domain)) {
		return false;
	}
	if ((subURL=='')||(subURL.length==1)) {
		return true;
	}
	var subPat = /^\/[^\/\\]+\.?[^\/\\]+(\/[^\/\\]*\.{0,1}[^\/\\]*)*$/;
	var ArrayURL=subURL.match(subPat);
	if (ArrayURL==null) {
		return false;
	}
	return true;
}

//-------------------------------------------------------------------------------
function isEmail (emailStr) {
	/* The pattern for matching fits the user@domain format. */
	var emailPat=/^(.+)@(.+)$/ ;
	var matchArray=emailStr.match(emailPat);
	if (matchArray==null) {
 	 /* Too many/few @'s or something; basically, this address doesn't
    	 even fit the general mould of a valid e-mail address. */
		return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];

	// See if "user" is valid 
	if (!isUser(user)) {
    	// user is not valid
   		 return false ;
	}

	// Check Domain
	if (!isDomain(domain)) {
   		return false;
	}
	return true;
}
function isUserName(strUserName){
	return /^[a-z0-9_\-]{4,15}$/.test(strUserName);
}
//-------------------------------------------------------------------------------
function isPhone(strPhone) {
//	return  /^(\d{6,15})$/.test(strPhone);
	return  /^[\+\-\(]?(\d*[\.\-\(\)\s\+]*\d*)*$/.test(strPhone);
}

//-------------------------------------------------------------------------------
function checkNumRange (value, nMin,nMax){
	if (!isInteger(value)) return false;
	if (value <nMin || value > nMax ) return false;
	return true;
}

//-------------------------------------------------------------------------------
function isFlash(fileName) {
  if (fileName=='') {
   	return false;   	
  }
  var ext = getExtension(fileName).toLowerCase();
  var e;
for(e in arrFlashFiles){
	if(arrFlashFiles[e]==ext) return true;
}
return false;
}

//-------------------------------------------------------------------------------
function isPix(fileName) {
  if (fileName=='') {
   	return false;   	
  }
  var ext = getExtension(fileName).toLowerCase();
  var e;
for(e in arrPixFiles){
	if(arrPixFiles[e]==ext) return true;
}
return false;
}

//-------------------------------------------------------------------------------
function getExtension(fileName){
		return fileName.substr(fileName.lastIndexOf(".")+1);
}

function CheckAll_bottom(f)
{
	if(f.allbox_up.checked) {
		for(var i=0;i<f.elements.length;i++)
		{
			var e=f.elements[i];
			if((e.name!='allbox_up')&&(e.type=='checkbox')&&(e.disabled==false)) {
				if(!e.checked) {
					e.click();
				}
			}
		}
	}else {
		for(var i=0;i<f.elements.length;i++)
		{
			var e=f.elements[i];
			if((e.name!='allbox_up')&&(e.type=='checkbox')&&(e.disabled==false)) {
				e.click();
			}
		}
	}
}
function CheckAll_bottom_v2(f)
{
	if(f.allbox_up.checked) {
		for(var i=0;i<f.elements.length;i++)
		{
			var e=f.elements[i];
			if((e.name!='allbox_up')&&(e.type=='checkbox')&&(e.disabled==false)) {
				if(!e.checked) {
					e.click();
				}
			}
		}
	}else {
		for(var i=0;i<f.elements.length;i++)
		{
			var e=f.elements[i];
			if((e.name!='allbox_up')&&(e.type=='checkbox')&&(e.disabled==false)) {
				e.click();
			}
		}
	}
}
 function pasteClass(e,classSelect,classNormal)
    {
	var r = null;
	if (e.parentNode && e.parentNode.parentNode) {
	    r = e.parentNode.parentNode;
	}
	else if (e.parentElement && e.parentElement.parentElement) {
	    r = e.parentElement.parentElement;
	}
	if (r) {
		r.className = e.checked ? classSelect : classNormal;
	}
    }

 function nothing(e,bg)
    {
	var r = null;
	if (e.parentNode && e.parentNode.parentNode) {
	    r = e.parentNode.parentNode;
	}
	else if (e.parentElement && e.parentElement.parentElement) {
	    r = e.parentElement.parentElement;
	}
	if (r) {
		r.style.backgroundColor=bg;
	}
    }

											function checkContact(f){
												f.sender.value = Trim(f.sender.value);
												f.address.value = Trim(f.address.value);
												f.phone.value = Trim(f.phone.value);
												f.email.value = Trim(f.email.value);
												f.content.value = Trim(f.content.value);
												f.title.value = Trim(f.title.value);
												if(f.sender.value==''){
													alert('Vui lòng nhập họ tên của bạn !');
													f.sender.focus();
													return false;
												}
												if((f.phone.value!='')&&(!isPhone(f.phone.value))){
													alert('Vui lòng nhập chính xác số điện thoại');
													f.phone.focus();
													return false;
												}
												if(!isEmail(f.email.value)){
													alert('Vui lòng nhập chính xác email, chúng tôi sẽ trả lời bạn qua email này !');
													f.email.focus();
													return false;
												}
												if(f.title.value==''){
													alert('Vui lòng nhập tiêu đề !');
													f.title.focus();
													return false;
												}
												if(f.content.value==''){
													alert('Vui lòng nhập nội dung !');
													f.content.focus();
													return false;
												}
												return true;
											}
											function checkRegister(f){
												f.username.value = Trim(f.username.value);
												f.name.value = Trim(f.name.value);
												f.address.value = Trim(f.address.value);
												f.phone.value = Trim(f.phone.value);
												f.email.value = Trim(f.email.value);
												f.note.value = Trim(f.note.value);
												if(f.username.value==''){
													alert('Vui lòng chọn username !');
													f.username.focus();
													return false;
												}
												if(!isUserName(f.username.value)){
													alert('Username bạn chọn không hợp lệ.\nUsername chỉ bao gồm các kí tự [a-z0-9_-] , nhiều hơn 3 kí tự và ít hơn 16 kí tự !\nVui lòng kiểm tra lại !');
													f.username.focus();
													return false;
												}
												if(f.name.value==''){
													alert('Vui lòng nhập họ tên của bạn !');
													f.name.focus();
													return false;
												}
												if((f.phone.value!='')&&(!isPhone(f.phone.value))){
													alert('Vui lòng nhập chính xác số điện thoại');
													f.phone.focus();
													return false;
												}
												if(!isEmail(f.email.value)){
													alert('Vui lòng nhập chính xác email, chúng tôi sẽ gửi thông tin account của bạn đến email này !');
													f.email.focus();
													return false;
												}
												return true;
											}

function checkLogin(f){
		if(Trim(f.username.value)=='') {
				alert('Vui lòng nhập username để login !');
				f.username.focus();
				return false;
		}
		if(f.password.value=='') {
				alert('Vui lòng nhập password để login !');
				f.password.focus();
				return false;
		}
		return true;
}

											function checkProfile(f){
												f.name.value = Trim(f.name.value);
												f.address.value = Trim(f.address.value);
												f.phone.value = Trim(f.phone.value);
												f.email.value = Trim(f.email.value);
												if(f.name.value==''){
													alert('Vui lòng nhập họ tên của bạn !');
													f.name.focus();
													return false;
												}
												if((f.phone.value!='')&&(!isPhone(f.phone.value))){
													alert('Vui lòng nhập chính xác số điện thoại');
													f.phone.focus();
													return false;
												}
												if(!isEmail(f.email.value)){
													alert('Vui lòng nhập chính xác email, chúng tôi sẽ gửi thông tin account của bạn đến email này !');
													f.email.focus();
													return false;
												}
												if(f.change_pass.checked){
													if(f.password_old.value==''){
														alert('Vui lòng nhập password cũ !');
														f.password_old.focus();
														return false;
													}
													if(f.password_new.value==''){
														alert('Vui lòng nhập password mới !');
														f.password_new.focus();
														return false;
													}
													if(f.password_new.value.length<4){
														alert('Password nên nhiều hơn 3 kí tự ! Vui lòng kiểm tra lại !');	
														f.password_new.focus();
														return false;
													}
													if(f.retype.value==''){
														alert('Vui lòng xác nhận lại password !');
														f.retype.focus();
														return false;
													}
													if(f.retype.value!=f.password_new.value){
														alert('Password xác nhận không đúng ! Vui lòng xác nhận lại !');	
														f.retype.focus();
														return false;
													}
												}
												return true;
											}
function checkForgot(f){
	f.username.value = Trim(f.username.value);
	f.email.value = Trim(f.email.value);
	if((f.username.value=='')&&(f.email.value=='')){
		alert('Vui lòng nhập username hoặc email !');
		f.username.focus();
		return false;
	}
}
	function checkEmail(f){
		f.email.value = Trim(f.email.value)
		if(!isEmail(f.email.value)){
			alert('Vui lòng nhập chính xác email của bạn, cám ơn !');
			f.email.focus();
			return false;
		}
		window.open('newsletter.php?email='+f.email.value,'','width=300,height=100');
		return false;
	}

function checkSendMail2Friend(f){
	f.email.value = Trim(f.email.value)
	window.open('send_mail.php?email_to_1='+f.email.value,'','width=400,height=300');
	return false;
}