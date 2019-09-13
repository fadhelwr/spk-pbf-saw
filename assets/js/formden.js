/* formden.js v1.15, Copyright 2015 Pareto Software LLC
The following code may be freely used with the Formden.com form processing service.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

var formden=function(){
	var hooks_object={}
	hooks_object.success=false;
	hooks_object.errors=false;

	var builder_hooks_object={}
	builder_hooks_object.success=false;
	builder_hooks_object.errors=false;
  
  var callbacks={};
	//Start of helper functions
	//JSON stringify for legacy browsers
	//https://github.com/douglascrockford/JSON-js/blob/master/json2.js	
	eval((function(x){var d="";var p=0;while(p<x.length){if(x.charAt(p)!="`")d+=x.charAt(p++);else{var l=x.charCodeAt(p+3)-28;if(l>4)d+=d.substr(d.length-x.charCodeAt(p+1)*96-x.charCodeAt(p+2)+3104-l,l);else d+="`";p+=4}}return d})("if (typeof JSON !== \"object\") {` /!= {};}(function () {var rx_one = /^[\\],:{}\\s]*$/, rx_two = /\\\\(?:[\"\\\\\\/bfnrt]|u[0-9a-fA-F]{4})/g` J\"hre` g!\"[^\"\\\\\\n\\r]*\"|true|false|null|-?\\d+(?:\\.\\d*)?(?:[eE][+\\-]?\\d+)?` h#four = /(?:^|:|,)(?:\\s*\\[)+` ;#escapabl`!0![\\\\\\\"\\u0000-\\u001f\\u007f` (!9` (!ad\\u06` :\"604\\u070f\\u17b4\\u17b5\\u200c-` \"!f\\u2028` (!2` (!60` (!6f\\ufeff\\ufff0-` \"!f]`!L#dangerous`!M\"`!J!` 9~;`$p%f(n) {return n < 10 ? \"0\" + n : n;}` C%this_value(` J&this.` 0!Of();}`&3'Date.prototype.to`&E&` l$\") {` 12= `&P)`!'#isFinite(`!)*) ?`!C\"getUTCFullYear() + \"-\" + f` L\"` :\"Month` 8!1` +3Date()` 8!T` ,-Hours` 7#:` k.inute` &6Second` 8$Z\" : null;};Boolean`\"X0`#q&;Number` &;String` &;}var gap, indent, meta, rep`%W&quote(s` k!) {`(Z(.lastIndex = 0;`$<#` 5)test` T%? \"\\\"\" + ` +\".replace(` F(,`%,'a`+n#c =`!U![a]` }$`&;#c === \"` j\"\" ? c : \"\\\\u\" + (\"000`'D!a.charCodeAt(0).to`\"z\"(16)).slice(-4);}`$.!\\\"\"` a!`!`'` 0#`(!'str(key, holder`!c#i, k, v, length, mind =`#_\"partial, `#y! =` T#[key];if (` 2\"&&`\"6$` A#`.t'` -,`$n%`(d,` {$` :((key`)S*rep` A6rep.call(`!a\", `\"J!` 9!);}switch` a%` 1\" {case`$'%:`$F#`%}\"` S#` <\"n`'@!` 9%`*.%` a#? `$:#` )#: \"null\"` W#b`(C\"\":` e$ll` b%` L)` I#`#7#:if (!`!c$` I#` r#}gap +=`(##;`$E# = [`$6\"O` ^!`(d)`(}#apply`!a$`#I![`!*\" Array]\") {`%I\"`$'%` )\";for (i`(W! i <`%n#; i += 1) {`!?#[i] =`&M!i`#y$ ||`!q%v =`&4$` s#`!B!`/C![]\" : gap` (!\\n\" +` )!+` I%join(\",` 2%`'}\"` )!`'8!+ \"` _!\"[\"` D.\"` I!]\";gap =` L!`)Z$v`&D\"rep`'*'`&H%`$+#`\"o(rep`\"PE`'6*`\"{!`*]') {k` k\"[i];v`#5#k`'4%`)'!`#U&.push(`&\"k) + (`#)#: `\"T!:`\"A!v);}}}} else {`!]!k in`'q%`%P1hasOwnProperty`(i\"` L!, k)) {` nj`%-8{}`%>'{`$rS` _!\"{`%05}`%32default:;}`+q(JSON.`$L\"ify !`+x,meta = {'\\b':\"\\\\b\", '\\t` '!t` '!n` '!n` '!f` '!f` '!r` '!r\", '\"` &!\\\"` 3!\\` '\"\\\"};`!.+=`1+'`$9#`1V#r, space`/Y$`\":#\"\";`+$\"` %#`\"-&` I!`&i\"`,~#)`%h#`'F'` @!`'D(` f\"+= \" \";`&>$` `2`'[&`!9%` i\"}`(y!`!p%`!P!` %$`)6*` -\"`#d* &&`(h(` 8'`14$||` S,`&>$` B!`\"F$) {throw new Error(\"`#a*\");}`%V#str(\"\", {'':`#t!});}`1W)` V!parse`%Q.` 1'`$V(text, reviv`41%j;` 7%walk`2)(` ;#`4S\"`3bV`$$`*0b`!`!` ,%`!=\"`\"\\!undefined`4C$[k] = v;`,3$delete`!<\"[k]`*u!`#g#`\"l#`!,\"`\"W'`+u%}text =`3=$text);rx_dangerous.lastIndex`'H!`&>!` 3(test` Q\") {` f#text.`%l#` A),`$I'a`4''\\\\u\" + (\"0000\" + a.charCodeAt(0)`3s%(16)).slice(-4);})`1.#x_one`!C&`!2(two, \"@\")` ()hree, \"]` )*four, \"\"))) {j = eval(\"(\" +`\"1! + \")\")`-\"$`(5%`#a!`%W\"`(v&?`$n\"{'':j}` q! : j;}`(C&Syntax`(G(`'W!\"`(.!})();"));	

	//jQuery-free AJAX
	/*|--minAjax.js--|
	  |--(A Minimalistic Pure JavaScript Header for Ajax POST/GET Request )--|
	  |--Author : flouthoc (gunnerar7@gmail.com)(http://github.com/flouthoc)--|
	  |--Contributers : Add Your Name Below--|
	  */	
	function initXMLhttp() {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			//code for IE7,firefox chrome and above
			xmlhttp = new XMLHttpRequest();
		} else {
			//code for Internet Explorer
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		return xmlhttp;
	}

	function minAjax(config) {
		if (!config.url) {
			if (config.debugLog == true){console.log("No Url!");}
			return;
		}
		
		if (!config.type) {

			if (config.debugLog == true)
				console.log("No Default type (GET/POST) given!");
			return;

		}
		
		if (!config.method) {
			config.method = true;
		}
		
		if (!config.debugLog) {
			config.debugLog = false;
		}
		
		var xmlhttp = initXMLhttp();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (config.success) {
					config.success(xmlhttp.responseText, xmlhttp.readyState);
				}
				if (config.debugLog == true)
					console.log("SuccessResponse");
				if (config.debugLog == true)
					console.log("Response Data:" + xmlhttp.responseText);
			} else {
				if (config.debugLog == true)
					console.log("FailureResponse --> State:" + xmlhttp.readyState + "Status:" + xmlhttp.status);
			}
		}

		var sendString=config.data;

		if (config.type == "GET") {
			xmlhttp.open("GET", config.url + "?" + sendString, config.method);
			xmlhttp.send();

			if (config.debugLog == true)
				console.log("GET fired at:" + config.url + "?" + sendString);
		}
		if (config.type == "POST") {
			xmlhttp.open("POST", config.url, config.method);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(sendString);

			if (config.debugLog == true)
				console.log("POST fired at:" + config.url + " || Data:" + sendString);
		}
	}	

	//detect support for CORS
	function supportsCors() {
	  var xhr = new XMLHttpRequest();
	  if ("withCredentials" in xhr) {
		// Supports CORS
		return true;
	  } else if (typeof XDomainRequest != "undefined") {
		// IE only has partial support...reject.
		return false;
	  }
	  return false;
	}	
	
	//get home value
	function get_home(){
		var home=window.location.href;
		var home_re=/#formden=\w\w\w\w\w\w/g
		return home.replace(home_re, '')
	}
	
	//Serializes the form so it can be sent via AJAX
	function serialize(form) { //https://code.google.com/p/form-serialize/  MIT license
		if (!form || form.nodeName !== "FORM") {
			return;
		}
		var i, j, q = [];
		for (i = form.elements.length - 1; i >= 0; i = i - 1) {
			if (form.elements[i].name === "") {
				continue;
			}
			switch (form.elements[i].nodeName) {
			case 'INPUT':
				switch (form.elements[i].type) {
				case 'text':
				case 'hidden':
				case 'password':
				case 'url':
				case 'email':
				case 'button':
				case 'reset':
				case 'submit':
					q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
					break;
				case 'checkbox':
				case 'radio':
					if (form.elements[i].checked) {
						q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
					}						
					break;
				case 'file':
					break;
				}
				break;			 
			case 'TEXTAREA':
				q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
				break;
			case 'SELECT':
				switch (form.elements[i].type) {
				case 'select-one':
					q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
					break;
				case 'select-multiple':
					for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
						if (form.elements[i].options[j].selected) {
							q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
						}
					}
					break;
				}
				break;
			case 'BUTTON':
				switch (form.elements[i].type) {
				case 'reset':
				case 'submit':
				case 'button':
					q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
					break;
				}
				break;
			}
		}
		return q.join("&");
	}

	function deserialize(serializedString, form){
		serializedString = serializedString.replace(/\+/g, '%20'); 
		var formFieldArray = serializedString.split("&");
		// Loop over all name-value pairs
		for (var i = 0; i < formFieldArray.length; i++) {
			var pair=formFieldArray[i];
			var nameValue = pair.split("=");
			var name = decodeURIComponent(nameValue[0]);
			var value = decodeURIComponent(nameValue[1]);
			// Find one or more fields
			var fields=document.getElementsByName(name);
			var field=[];
			if (fields.length<1){continue}
			else if (fields.length>1){
				for (var j = 0; j < fields.length; j++) {
					if (fields[j].form==form){field.push(fields[j])}
				}
			}
			else{
				field.push(fields[0]);
			}
			
			//Multiple fields are checkboxes and radios
			if (field.length>1){
				for (var k = 0; k < field.length; k++){
					current_field=field[k];
					if (current_field.value==value){
						current_field.checked=true;
					}		
				}	
			}
			//Everything else is a single field
			else{
				var field=field[0];
				var type=field.type;
				if (!field || type=='submit' || type=='hidden'){continue}
				if (field.form!=field.form){continue}
				if (field.type == "radio" && field.type == "checkbox"){continue}
				if (value){
					field.value=value;
				}		
			}		
		} 	
	}
	
	
	//Gets the parent of an input and the last parent within a form
	function input_family(name, form){
		var fields=document.getElementsByName(name);
		var field=[];
		if (fields.length>1){
			for (var j = 0; j < fields.length; j++) {
				if (fields[j].form==form){field.push(fields[j])}
			}
		}
		else if (fields.length==1){
			if (fields[0].form==form){
				field.push(fields[0]);
			}
		}
		else {return false}
		if (field.length<1){return false}
		var input=field[0]; //initial input
		var parent=input.parentNode;
		var last_parent=false;
		i=0;
		while (!last_parent){
			if (input.parentNode==form){last_parent=input; break}
			else {input=input.parentNode}
			i=i+1;
			if (i>20){last_parent=false;} //check for errors
		}
		return {'parent': parent, 'last_parent': last_parent}
	}	
	
	function get_submit(form){
		var all_elements=form.elements;
		for(var i=0;i<all_elements.length;i++){	
			var element=all_elements[i];
			if (element.type=='submit'){
				return element
			}
		}
	}
	
	function get_error_span(form_group){ //see if the error location has been set manually
		var spans=form_group.getElementsByTagName("span");	
		for (var property in spans) {
			if (spans.hasOwnProperty(property)) {
				var span=spans[property];
				if (span.className==formden.error_pointer){return span}
			}
		}
		return false
	}
	
	function remove_help_block(form_group){
	
	}
	
	function show_validation_messages(errors, form){	
		var errors_length=errors.length;
		for (var i = 0; i < errors_length; i++) {
			var error=errors[i];
			var family=input_family(error.name, form);
			var manual_error_location=family?get_error_span(family.last_parent):false;
			remove_help_block(family.last_parent);
			if (family.last_parent){
				var new_class=family.last_parent.className+' has-error';
				family.last_parent.setAttribute("class", new_class);
			}
			if (family.parent){
				var addon_group=family.parent.className.search("input-group")>-1?true:false;
				var help = document.createElement('p')
				help.setAttribute("class", "help-block");
				help.innerHTML = error.message;
				if (manual_error_location){destination=manual_error_location}				
				else if(family.parent.tagName=='LABEL'){
					var inline=family.parent.className.search('-inline')>-1?true:false;
					if (inline){var destination=family.parent.parentNode;}
					else{var destination=family.parent.parentNode.parentNode}
				}
				else if (addon_group){var destination=family.parent.parentNode}
				else{var destination=family.parent}
				destination.appendChild(help);
			}
		}	
	}	
	//end of helper functions

	var cors; var site;
	function init(){
		cors=supportsCors();
		all_forms=identify_all_forms();
		set_handlers(all_forms);
		if (!cors){just_posted();}
	}
	
	//Gets all forms on the page posting to Formden and identifies them
	function identify_all_forms(){
		var temp=[]
		var forms=document.getElementsByTagName("form");
		for(var i=0;i<forms.length;i++){	
			var form=forms[i];
			var action=form.action;
			var post_re=/(http.?\:\/\/[^\/]*)\/(post)\/(\w\w\w\w\w\w\w\w)\//g;
			var post_match=post_re.exec(action);
			if (post_match){
				if (cors){
					form.action=post_match[1]+'/ajax/'+post_match[3]+'/';
				}
				else{//identify forms with unique id's for easy selection
					form.setAttribute("id", "formden_"+post_match[3]);	
					site=post_match[1];
				}
				temp.push(form);
			}
		}
		return temp
	}	
	
	function set_handlers(all_forms){
		var all_forms_length=all_forms.length;
		for(var i=0; i<all_forms_length; i++){	
			var form=all_forms[i];
			if(cors){ //post via AJAX
				form.onsubmit=submit_ajax;
			}
			else{ //prepare form for manual posting
				prepare_post(form);
			}	
		}	
	}
	
	//If posting the form, append a hidden value with the current url, so we can redirect back
	function prepare_post(form){
		var home_cleaned=get_home();
		var url_input=document.createElement("input");
		url_input.setAttribute("id", "formden_home");				
		url_input.setAttribute("type", "hidden");
		url_input.setAttribute("name", "_home");		
		url_input.setAttribute("value", home_cleaned);
		form.appendChild(url_input);
	}
	
	function submit_ajax(event){
			var dots=0; var suffix; 
			var event = event || window.event; // for old ie
			event.preventDefault ? event.preventDefault() : event.returnValue = false; //cross-browser way to stop form from submitting via HTML
			var form=this;
			var form_data=serialize(this);
			var action=this.action;
			var submit=get_submit(form);
			var original_submit_text=submit.innerHTML;			
			function thinking(form, submit){ //animates 
				if (dots<1){dots=1; suffix='.'}
				else if (dots<2){dots=2; suffix='..'}
				else if(dots<3){dots=3; suffix='...'}
				else{dots=0; suffix=''}
				submit.innerHTML=formden.submission_text?formden.submission_text+suffix:original_submit_text.trim()+'ing'+suffix;
			}
			var thinking_interval=setInterval(function(){thinking(form, submit)}, 300);	
			function done_thinking(){
				clearInterval(thinking_interval);
				submit.innerHTML=original_submit_text;
			}
			
		  minAjax({
			url:action,//request URL
			type:"POST",//Request type GET/POST
			//Send Data in form of GET/POST
			data: form_data,
			debugLog: false,
			//CALLBACK FUNCTION with RESPONSE as argument
			success: function(data){
				data=JSON.parse(data);
				done_thinking();				
				if (data.success){formden.success(data, form);}
				else{formden.errors(data, form);}
			}
			});
	}
	
	//CORS not supported, redirect back after POST
	function just_posted(){
		function getHashValue(key) {
		 var matches=location.hash.match(new RegExp(key+'=([^&]*)'))
		 if (matches){
			return matches[1]
		 }
		 else return false
		}
		var token = getHashValue('#formden');
		if (token){ //if _formden is in url, the form was just posted

			//use push state to get rid of the hash value	
			var home_cleaned=get_home();	
			if (window.history.pushState){
				window.history.pushState({}, "Title", home_cleaned);
			}

			//send JSONP Request
			var script = document.createElement('script');
			script.type = 'text/javascript';	
			script.src = site+'/post-response/'+token+'/';
			var head = document.getElementsByTagName("head")[0]; //because ie8 doesn't support document.head
			head.appendChild(script);
		}
	}	
	
	
	//This function is called when just_posted appends the script
	function post_response(data){
		var form=document.getElementById(data.form_id);
		if (data.success){formden.success(data, form);}
		else{
			deserialize(data.serialized_data, form);
			errors(data, form);
		}
	}
	
  function remove_form(form){
    var parent=form.parentNode;
    parent.removeChild(form);
    formden.callbacks.remove_form_complete();
  }
  
  function display_thanks(form_parent, message){
      var newp = document.createElement("p"); 
			var message= document.createTextNode(message); 
			newp.appendChild(message); //add the text node to the newly created div. 
			form_parent.appendChild(newp);
  }
  
	function success(data, form){ //data posted to formden
		if (data.redirect){
			if (top.location.href!= window.location.href) {
			   top.location.href = data.redirect_url;
			}
			else{
				window.location.href=data.redirect_url;
			}

		}
		else if (data.thankyou){
      var form_parent=form.parentNode;
      callbacks['remove_form_complete']=function(){formden.display_thanks(form_parent, data.thankyou_message);}      
      formden.remove_form(form);
		}
    
		if(hooks_object.success){hooks_object.success(form);}
		if(builder_hooks_object.success){builder_hooks_object.success(form);}		    
	}
	
	function errors(data, form){ //data rejected by formden
		if(!data.errors){alert('There was an error sending your message'); return} //if data rejected, but no errors, something is wrong
		//first remove any existing errors
		function remove_by_class(class_name, remove_element){
			var old_errors=form.querySelectorAll('.'+class_name);
			var old_errors_length=old_errors.length;
			for (var i = old_errors_length - 1; i >= 0; i--){
				var element=old_errors[i];
				if (remove_element){element.parentNode.removeChild(element);}
				else{element.className=element.className.replace( /(?:^|\s)has-error(?!\S)/g , '' );}
			}		
		}
		remove_by_class("help-block", true);
		remove_by_class("has-error", false);	
		
		//then show new errors
		show_validation_messages(data.errors, form);
		if(hooks_object.errors){hooks_object.errors(form);}
		if(builder_hooks_object.errors){builder_hooks_object.errors(form);}		
		
	}	

	return{
			init: init,
			success: success,
			errors: errors,
			response: post_response,
			submission_text: false,
			hooks: hooks_object,
      remove_form: remove_form,
      display_thanks: display_thanks,
      callbacks: callbacks,
      builder_hooks: builder_hooks_object,
			error_pointer:'error'
	}
}()

//jquery-free to load when ready
var readyStateCheckInterval = setInterval(function() {
	if (document.readyState === "complete") {
		clearInterval(readyStateCheckInterval);
		formden.init();
	}
}, 10);









