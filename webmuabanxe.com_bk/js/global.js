var link_colors = new Array('#ffff66','#a0ffff','#99ff99','#ff9999','#ff66ff');
var SearchBoxMessage = "";

String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); };

String.prototype.truncate = function(threshold,preserve,literal){
	if (this.length > threshold){
		var string = this.substring(0,threshold).replace(/\w+$/,'').trim();
		
		return (preserve) ? String.Format('{0} <span style="display:none;">{1}</span>',(literal) ? string + literal : string,escape(this)) : (literal) ? string + literal : string;
	}
	
	return (this) ? this.toString() : '';
}

jQuery.each( [ "lt", "gt" ], function(i,n){ jQuery.fn[ n ] = function(num,fn) { return this.filter( ":" + n + "(" + num + ")", fn ); }; });

function init_google(){
	var pattern = /.*.\./i;

	if (document.URL.indexOf("s=&O") < 0){
		var url_parts = document.URL.split('?');
		
		if (url_parts[1]){ 
			var url_args = url_parts[1].split('&');

			for(var i=0; i<url_args.length; i++){
				var keyval = url_args[i].split('=');

				if (keyval[0] == 's'){
					go_google(decode_url(keyval[1]));
				
					return;
				}
			}
		}
	}
}

function decode_url(url){
	return unescape(url.replace(/\+/g,' '));
}

function go_google(terms){
	terms = terms.replace(/\"/g,"");
	var exclude = "|a|to|on|an|in|is|at|the|by|it|or|i|me|my|get|go|are|too|if|of|so|";
	var terms_split = terms.split(' ');
	var c = 0;
	var cont = document.getElementById('gHighlights');

	if(cont != null && cont != ""){
	    for(var i=0; i<terms_split.length; i++){
	        var pipeterms = "|"+ terms_split[i]+"|";
	        
	        if(terms_split[i].length > 2 && exclude.indexOf(pipeterms) <0){
				highlight_goolge(terms_split[i],cont ,link_colors[c]);
				c = (c == link_colors.length-1) ? 0 : c+1;
		    }
	    }
	}
}

function highlight_goolge(term, container, color){
	var term_low = term.toLowerCase();

    for(var i=0; i<container.childNodes.length; i++){
		var node = container.childNodes[i];

		if (node.nodeType == 3){
			var data = node.data;
			var data_low = data.toLowerCase();

			if (data_low.indexOf(term_low) != -1){
				var new_node = document.createElement('SPAN');
				var result;
				
				node.parentNode.replaceChild(new_node,node);

				while((result = data_low.indexOf(term_low)) != -1){
					new_node.appendChild(document.createTextNode(data.substr(0,result)));
					new_node.appendChild(create_node_google(document.createTextNode(data.substr(result,term.length)),color));
					
					data = data.substr(result + term.length);
					data_low = data_low.substr(result + term.length);
				}
				new_node.appendChild(document.createTextNode(data));
			}
		}
		else
			highlight_goolge(term, node, color);
	}
}

function create_node_google(child, color){
	var node = document.createElement('SPAN');

	node.style.fontWeight = "bold";
	node.appendChild(child);

	return node;
}


function deadCenter(w,h,url) {
	window.name="main2";

	if (window.screen) {
		var chasm = screen.availWidth;
		var mount = screen.availHeight;

		putItThere = window.open(url,'posB','width=' + w + ',height=' + h + ',status=1,scrollbars=1,resizable=1,left=' + ((chasm - w - 10) * .5) + ',top=' + ((mount - h - 30) * .5));
	}
}

function ss(w){
	window.status = "go to " + w;

	return true;
}

function cs(){
	window.status = "";
}

function openWindow(url){
    window.open(url,'eHow','right=10,top=10,width=400,height=300,,resizable=1,scrollbars=yes,titlebar=no,toolbar=no');
}

function disableSelection(e) {
	e.onselectstart = function() { return false; };
	e.unselectable = "on";
	e.style.MozUserSelect = "none";
}

function Search(Options){
	document.getElementById('Options').value = Options;

	$(".SearchBalloons .Tab").each(
		function(){
			$(this).removeClass("selected");
	});

	switch(Options){
		case "2":
			$(".SearchResources").addClass("selected");
			break;
		case "3":
			$(".SearchMembers").addClass("selected");
			break;
	    case "4":
			$(".SearchVideos").addClass("selected");
			break;
		default:
			$(".SearchHowTo").addClass("selected");
	}
}

function validateSearch(e,type,baseURL){
	switch($("#"+e+" input:eq(0)").val()){
		case SearchBoxMessage:
			break;
		case "":
			break;
		default:
			switch((type > 0)? $("#"+e+" select").val() : $("#"+e+" input:eq(1)").val()){
				case "2":
					$("#"+e).attr("action","http://" + baseURL + "/resources-shopping.html");
				default:
			}

			document.forms[e].submit();
			
			return true;
	}
}

function switchTab(id, n){
	var tab = $(id + " .TabNavigation li");
	var content = $(id + " .TabContent");
	
	content.gt(0).hide();
	
	if ($.browser.safari) $(function(){ content.gt(0).hide(); });
	
	tab.click(function(){
		disableSelection(this);
		
		if($(this).attr("class") != "Selected"){
			tab.removeClass("Selected");

			$(this).addClass("Selected");
			
			content.hide().eq(tab.index(this)).fadeIn((n)?n:"fast").get(0).focus();
		}

		return false;
	});
}


function setFontSize(id, os){
	$(id).each(
		function(i){
			$(this).css("font-size", parseInt($(this).css("font-size").split("px")[0]) + os + "px");
	});
}

function jSectionExpander(linkId,elementId,elementThreshold,fadeTimeout,linkText){
	if($(elementId).length < --elementThreshold) return;
	
	if (linkText){
		var originalLinkText = $(linkId).html();
		
		$(linkId).html(linkText);
	}

	$(elementId).gt(elementThreshold).hide();
	
	$(linkId).click( function(){		
		if ($(this).attr("href")) $(this).unbind().html(originalLinkText);
		else $(this).hide();

		$(elementId).gt(elementThreshold).each( function(i){ $(this).fadeIn(fadeTimeout*i); });

		return false;
	});
}

function jToggleBgColor(id,color){
	var bgColor = $(id).css("background-color");
	
	$(id).focus(function(){ $(this).css("background-color",color); });
	$(id).blur(function(){ $(this).css("background-color",bgColor); });
}

function jToggleElementOpacity(e,b){ return e.fadeTo(250,(b) ? 0.33 : 1.0).css({ 'cursor' : (b) ? 'default' : 'pointer' }) }