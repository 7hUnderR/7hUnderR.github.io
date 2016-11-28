function y2k(number) { return (number < 1000) ? number + 1900 : number; }

function isDate (day,month,year) {

    var today = new Date();
    year = ((!year) ? y2k(today.getYear()):year);
    month = ((!month) ? today.getMonth():month-1);
    if (!day) return false
    var test = new Date(year,month,day);
    if ( (y2k(test.getYear()) == year) &&
         (month == test.getMonth()) &&
         (day == test.getDate()) )
        return true;
    else
        return false
}

function isEmail(email) {
    invalidChars = " ~\'^\`\"*+=\\|][(){}$&!#%/:,;ðüþýöçÐÜÞÝÖÇ";

    // Check for null
//    if (email == "") {
//        return true;
//    }

    // Check for invalid characters as defined above
    for (i=0; i<invalidChars.length; i++) {
        badChar = invalidChars.charAt(i);
        if (email.indexOf(badChar,0) > -1) {
            return false;
        }
    }
    lengthOfEmail = email.length;
    if ((email.charAt(lengthOfEmail - 1) == ".") || (email.charAt(lengthOfEmail - 2) == ".")) {
        return false;
    }
    Pos = email.indexOf("@",1);
    if (email.charAt(Pos + 1) == ".") {
        return false;
    }
    while ((Pos < lengthOfEmail) && ( Pos != -1)) {
        Pos = email.indexOf(".",Pos);
        if (email.charAt(Pos + 1) == ".") {
            return false;
        }
        if (Pos != -1) {
            Pos++;
        }
    }

    // There must be at least one @ symbol
    atPos = email.indexOf("@",1);
    if (atPos == -1) {
        return false;
    }

    // But only ONE @ symbol
    if (email.indexOf("@",atPos+1) != -1) {
        return false;
    }

    // Also check for at least one period after the @ symbol
    periodPos = email.indexOf(".",atPos);
    if (periodPos == -1) {
        return false;
    }
    if (periodPos+3 > email.length) {
        return false;
    }
    return true;
}

function isURL(argvalue) {

  if (argvalue.indexOf(" ") != -1)
    return false;
  else if (argvalue.indexOf("http://") == -1)
    return false;
  else if (argvalue == "http://")
    return false;
  else if (argvalue.indexOf("http://") > 0)
    return false;

  argvalue = argvalue.substring(7, argvalue.length);
  if (argvalue.indexOf(".") == -1)
    return false;
  else if (argvalue.indexOf(".") == 0)
    return false;
  else if (argvalue.charAt(argvalue.length - 1) == ".")
    return false;

  if (argvalue.indexOf("/") != -1) {
    argvalue = argvalue.substring(0, argvalue.indexOf("/"));
    if (argvalue.charAt(argvalue.length - 1) == ".")
      return false;
  }

  if (argvalue.indexOf(":") != -1) {
    if (argvalue.indexOf(":") == (argvalue.length - 1))
      return false;
    else if (argvalue.charAt(argvalue.indexOf(":") + 1) == ".")
      return false;
    argvalue = argvalue.substring(0, argvalue.indexOf(":"));
    if (argvalue.charAt(argvalue.length - 1) == ".")
      return false;
  }

  return true;

}

function isValidStr(argvalue,minlen) {
	if (argvalue.length<minlen) {
		return false;
	} else {
		return true;
	}

}
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
function AcceptNumbersAndPlus() {
	var compareString = '0123456789+';
		var mainString=String.fromCharCode(window.event.keyCode);
		if(compareString.indexOf(mainString)!=-1)
			return;
		else
			window.event.returnValue=false;
}

