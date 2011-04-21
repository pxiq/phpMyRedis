Element.implement({
    append: function(newhtml) {
        return this.set("html", this.get("html") + newhtml);
    }
});
var opend = null;
var countd = 1;

function updateKeyType(type) {
	if(type != 'string') {
		document.getElementById('add_field').style.display = 'block';
	} else {
		document.getElementById('add_field').style.display = 'none';
	}
	
	switch(type) {
		case 'string':
			var code = '<tr><td class="secondaryheader"> Value: </td><td><input type="text" name="value_1" class="text" /></td><td style="padding-left: 5px" class="secondaryheader"></td><td class="inputarea"></td></tr>';
		break;
		case 'hash' :
			var code = '<tr><td class="secondaryheader"> Field: </td><td><input type="text" name="hash_field_'+ window.countd+'" class="text" /></td><td style="padding-left: 5px" class="secondaryheader"> Value: </td><td class="inputarea"><input type="text" name="hash_value_'+ window.countd+'" class="text" /></td></tr>';
		break;
	} 
	$('add_container').set('html',code);
	
	window.opend = type;
}
 

	
function addField(){
	switch(window.opend) {
		case 'hash' : addNewHash(); break;
	}
}

function addNewList() {
	
}

function addNewHash() {
	window.countd++;
	var code = '<tr><td class="secondaryheader"> Field: </td><td><input type="text" name="hash_field_'+ window.countd+'" class="text" /></td><td style="padding-left: 5px" class="secondaryheader"> Value: </td><td class="inputarea"><input type="text" name="hash_value_'+ window.countd+'" class="text" /></td></tr>';
	$('add_container').append(code);
	$('count').value = window.countd;
}

function changeExpire(val) {
	if(val != 'none')
		$('expire_time').disabled = "";
}