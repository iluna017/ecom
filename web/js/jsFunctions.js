/**
 * 
 * @param params
 * @param type
 * @param dataType
 * @param url
 * @returns {String}
 */
function execAjax(params, type, dataType, url){
	var result;
	var par={params:params};
	$.ajax({
		data:  par,
		type: type, 
		async: false,
		traditional: true,
		dataType: dataType,
		url: url,
		success: function(data) {
			result=data;
			//alert(data);
			waitingDialog.hide();
		},
		error: function(jqXHR,exception, error) {
			waitingDialog.hide();
			//alert("status:"+jqXHR.status);
			alert(exception);
			alert(error);
			alert("error:"+jqXHR.responseText);
			console.log("error:"+jqXHR.responseText);
			result= '';
		}
	});
	return result;
}
function execAjaxNoWait(params, type, dataType, url){
	var result;
	$.ajax({
		data: params,
		type: type, 
		async: false,
		traditional: true,
		dataType: dataType,
		url: url,
		success: function(data) {
			result=data;
			//waitingDialog.hide();
		},
		error: function(jqXHR,exception, error) {
			//waitingDialog.hide();
			//alert("status:"+jqXHR.status);
			//alert(exception);
			alert(error);
			//alert("error:"+jqXHR.responseText);
			result= '';
		}
	});

	return result;
}

function concatMsg(label,i){
	var msg="";
	var msgComplete="";
	
	if(!isEmpty(label)){
		if(i>1){
			msg+=",";
		}
		msg+=label;
	}
	if(!isEmpty(msg)){
		msgComplete="Existen campos que son obligatorios!!!";
	}
	return msgComplete;
}

function cleanAlertDiv(){
	hideDiv('alertDiv',false);
	$('#alertDiv').html('');
}
function cleanAlertDiv(alertDiv){
	hideDiv(alertDiv,false);
	$('#'+alertDiv).html('');
}

function messageAlertDiv(alertDiv,message){
	hideDiv(alertDiv,true);
	$('#'+alertDiv).html(message);
}

function validateRequiredFields(fieldReq){
	var label="";
	var msg="";
	var validate=true;
	var arrayFieldReq=fieldReq.split(",");
	for(var i=0; i < arrayFieldReq.length; i++){
		label=validaInput(arrayFieldReq[i]);
		msg=concatMsg(label,i);
	}
	if(!isEmpty(msg)){
		hideDiv('alertDiv',true);
		msg="Existen campos que son obligatorios!!!";
		$('#alertDiv').html(msg);
		validate=false;
	}
	return validate;
}
function validateRequiredFields(fieldReq,alertDiv){
	var label="";
	var msg="";
	var validate=true;
	var arrayFieldReq=fieldReq.split(",");
	for(var i=0; i < arrayFieldReq.length; i++){
		label=validaInput(arrayFieldReq[i]);
		msg=concatMsg(label,i);
	}
	if(!isEmpty(msg)){
		hideDiv(alertDiv,true);
		msg="Existen campos que son obligatorios!!!";
		$('#'+alertDiv).html(msg);
		validate=false;
	}
	return validate;
}

function validaInput(controlName){
	var label="";
	if(isEmpty($('#'+controlName).val())){
	    label=$('#'+controlName+'Label').html();
		$('#'+controlName).css('border','1px solid rgba(255,0,0,0.4)');
	}else{
		$('#'+controlName).css('border','1px solid #ccc');
	}
	return label;
}

function successDiv(msg){
	hideDiv('alertDiv',false);
	hideDiv('successDiv',true);
	$('#successDiv').html(msg);
}
function getLastTrTable(tableName, attribute){
	var attr = $('#tabla-categorias tr:last').attr(attribute);
	return attr;
}


/**
 * 
 * @param str
 * @returns {Boolean}
 */
function isEmpty(str) {
	return typeof str == 'string' && !str.trim() || typeof str == 'undefined' || str === null || str == 'null';
}

/**
 * 
 * @param e
 * @returns {Boolean}
 */
function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
			if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
				if (unicode<48||unicode>57){ //if not a number
					//alert('Solo se aceptan números!!!');
					return false //disable key press
				}
			}
}
/**
 * 
 * @param operation
 * @param data
 * @returns
 */
function successFunction(operation,data){
	alert('Exito:'+operation+','+data);
	return data;
}

/**
 * 
 * @param operation
 * @param data
 */
function errorFunction(operation,data){
	alert('Error:'+operation+','+data);
}

function defaultValue(fieldValue,defaultValue){
	var value=fieldValue;
	if(fieldValue != undefined){
		if(isEmpty(fieldValue)){
			value=defaultValue;
		}else{value=fieldValue.toUpperCase();}
	}else{value=defaultValue;}
	return value;
}

function getDate(dateReceived){
	var date="";
	if(!isEmpty(dateReceived)){
		var d = dateReceived.substring(8,10);
		var m =  dateReceived.substring(5,7);
		var y = dateReceived.substring(0,4);
		var h = dateReceived.split(" ")[1].substring(0,2);
		var mi = dateReceived.split(" ")[1].substring(3,5);
		date=d + "/" + m + "/" + y; //+ " "+h+":"+mi;
	}
	return date;
}
function getYear(){
	var d = new Date();
	var year = d.getFullYear();
	return year;
}

function addCommas(str) {
	var parts = (str + "").split("."),
	main = parts[0],
	len = main.length,
	output = "",
	i = len - 1;

	while(i >= 0) {
		output = main.charAt(i) + output;
		if ((len - i) % 3 === 0 && i > 0) {
			output = "," + output;
		}
		--i;
	}
	// put decimal part back
	if (parts.length > 1) {
		output += "." + parts[1];
	}
	return output;
}

function formatoMoneda(control){
	var val=$('#'+control).val();
	if(!isEmpty(val)){
		$('#'+control).val(removeMonedaF(val));
		val=$('#'+control).val();
		$('#'+control).val(addCommas(val));
	}
}
/**
 * 
 * @param field
 * @param rules
 * @returns {String}
 */

function getFieldSub(field,rules){
	var value="";
	var iterate=rules.split(",")[0];
	var separator=rules.split(",")[1];
	fields=field.split(separator);
	if(fields.length >= iterate){
		value=fields[iterate-1];
	}
	return value;	
}

/**
 * 
 * @param controlName
 * @param colNames
 * @param data
 */
function fillCombo(controlName,colNames,data){
	var select = $('#'+controlName);
	$('#'+controlName).find('option').remove();
	var selectOpt="";
	if(data.length > 0){
		try{
			selectOpt="<option></option>";
			select.append(selectOpt);
			for(var i = 0; i < data.length; i++){
				colId  = data[i][colNames[0]];
				colVal = data[i][colNames[1]];
				if(!isEmpty(colId) && !isEmpty(colVal)){
					selectOpt="<option value='"+colId+"'>"+colVal+"</option>";
					select.append(selectOpt);
					selectOpt="";
				}
			}
		}catch(err){alert(err);
		alert(colId+","+colVal);
		}
	}
}

function dbFormatDate(date){
	var day;
	var month;
	var year;
	var hours;
	var minutes;
	var nDate="";
	if(!isEmpty(date)){
		day=date.substring(0,2);
		month=date.substring(3,5);
		year=date.substring(6,10);
		nDate="TO_DATE('"+year+month+day+"','YYYYMMDD')";
	}
	return nDate;
}

function dbFormatDateH(date,hora){
	var day;
	var month;
	var year;
	var hours;
	var minutes;
	var nDate="";
	if(!isEmpty(date)){
		day=date.substring(0,2);
		month=date.substring(3,5);
		year=date.substring(6,10);
		nDate="TO_DATE('"+year+month+day+" "+hora+"','YYYYMMDD HH24:mi')";
	}
	return nDate;
}


/**
 * 
 * @param controlName
 * @param colNames
 * @param data
 * @returns
 */
function fillTable(controlName,colNames,data,heigthPX){
	var table = $('#'+controlName);
	cleanTable(controlName);
	if(data.length==0){
		modal("Mensaje","No hay resultados para mostrar!");
	}else{
		if(data.length > 2){
			$('#'+controlName+'Table').css("overflow", "scroll");
			$('#'+controlName+'Table').css("height",heigthPX);
		}
		for(var i = 0; i < data.length; i++){
			var tr = $('<tr id="'+(i+1)+'" name="'+(i+1)+'"></tr>');
			for(var j=0; j < colNames.length;j++){
				colsName=colNames[j];
				if(colsName.indexOf('DATE') != -1){
					col=colsName.substring(colsName.indexOf("_") + 1,colsName.length);
					value=data[i][col];					
					tr.append('<td>' + getDate(value) + '</td>');
				}else{
					if(colsName.indexOf('MONEY') != -1){
						colName=colsName.substring(colsName.indexOf("_") + 1,colsName.length);
						var money=addCommas(data[i][colName]);
						if(!isEmpty(money)){ money='$'+money;}
						tr.append('<td>' + money + '</td>');
					}else{
						if(colsName.indexOf('CONCAT') != -1){
							columnNames=colsName.substring(colsName.indexOf("_") + 1,colsName.length);
							var fieldName=columnNames.split("|")[0];
							var values=columnNames.split("|")[1];
							var valNames=values.split(",");
							var valueF="";
							var space=" ";
							for(var p=0; p< valNames.length; p++){
								if(!((p+1)==valNames.length)){
									valueF+= data[i][valNames[p]]+space;
								}else{
									valueF+= data[i][valNames[p]];
								}
							}
							tr.append('<td>' + valueF + '</td>');
						}else{
							if(colsName.indexOf('ACTION') != -1||colsName.indexOf('SELECT') != -1){
								colAction=colsName.substring(colsName.lastIndexOf("_") + 1,colsName.length);
								parameters=colsName.substring(colsName.indexOf("_") + 1,colsName.lastIndexOf("_"));
								var arrayP=parameters.split(",");
							for(var k=0; k< arrayP.length;k++){colAction=colAction.replace(arrayP[k],"\""+data[i][arrayP[k]]+"\"");}
								tr.append('<td>' + colAction + '</td>');
							}else{
										tr.append('<td>' + data[i][colsName] + '</td>');
							}	
						}
					}
				}
			}
			table.append(tr);	
		}
	}
	return table; 	
}

function cleanTable(controlName){
	$('#'+controlName+'Table').css('overflow','');
	$('#'+controlName+'Table').css('height','');
	$('#'+controlName+' tbody').remove();
}

function clean(fieldsClean){
	var array=new Array();
	var fieldName="";
	array= fieldsClean.split(',');

	for(var i=0; i< array.length;i++){
		fieldName=array[i];
		if(fieldName.indexOf('CHK') != -1){
			field=fieldName.substring(fieldName.indexOf("_") + 1,fieldName.length);
			chkField(field,"N");
		}else{
			$('#'+fieldName).val('');
		}
	}
}

/**
 * 
 * @param columnNames
 * @param fieldNames
 * @param data
 */
function fillFieldsPrefix(columnNames,fieldNames, data){
	if(data.length==0){
		alert("No hay resultados para mostrar!");
	}else{
		for(var i = 0; i < data.length; i++){
			for(var j=0; j < columnNames.length;j++){				
				if(columnNames[j]!=""){
					if(columnNames[j].indexOf('DATE') != -1){
						colName=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
						fillField(fieldNames[j],getDate(data[i][colName]));
					}else{
						if(columnNames[j].indexOf('CONCAT') != -1){
							colNames=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
							var fieldName=colNames.split("|")[0];
							var values=colNames.split("|")[1];
							var valNames=values.split(",");
							var valueF="";
							var space=" ";
							for(var p=0; p< valNames.length; p++){
								if(!((p+1)==valNames.length)){
									valueF+= data[i][valNames[p]]+space;
								}else{
									valueF+= data[i][valNames[p]];
								}
							}
							fillField(fieldNames[j],valueF);
						}else{
							if(columnNames[j].indexOf('CHK') != -1){
								colName=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
								chkField(fieldNames[j],data[i][colName]);
							}else{
								if(columnNames[j].indexOf('RAD') != -1){
									colName=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
									radioField(fieldNames[j],data[i][colName]);
								}
								else{
									colName=columnNames[j];
									fillField(fieldNames[j],data[i][colName]);
								}
							}
						}
					}					
				}			
			}
		}	
	}
}
/**
 * 
 * @param columnNames
 * @param data
 */
function fillFields(columnNames, data){
	if(data.length==0){
		alert("No hay resultados para mostrar!");
	}else{
		for(var i = 0; i < data.length; i++){
			for(var j=0; j < columnNames.length;j++){				
				if(columnNames[j]!=""){
					if(columnNames[j].indexOf('DATE') != -1){
						colName=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
						fillField(colName,getDate(data[i][colName]));
					}else{
						if(columnNames[j].indexOf('CONCAT') != -1){
							colNames=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
							var fieldName=colNames.split("|")[0];
							var values=colNames.split("|")[1];
							var valNames=values.split(",");
							var valueF="";
							var space=" ";
							for(var p=0; p< valNames.length; p++){
								if(!((p+1)==valNames.length)){
									valueF+= data[i][valNames[p]]+space;
								}else{
									valueF+= data[i][valNames[p]];
								}
							}
							fillField(fieldName,valueF);
						}else{
							if(columnNames[j].indexOf('CHK') != -1){
								colName=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
								chkField(colName,data[i][colName]);
							}else{
								if(columnNames[j].indexOf('RAD') != -1){
									colName=columnNames[j].substring(columnNames[j].indexOf("_") + 1,columnNames[j].length);
									radioField(colName,data[i][colName]);
								}
								else{
									colName=columnNames[j];
									fillField(colName,data[i][colName]);
								}
							}
						}
					}
				}					
			}			
		}
	}	
}

/**
 * 
 * @param controlName
 * @param data
 */
function fillField(controlName, data){
	if(!isEmpty(data)){
		if($('#'+controlName)){$('#'+controlName).val(data);}
	}
}

function chkField(controlName, data){
	if(!isEmpty(data)){
		if(data =='S'){
			if($('#'+controlName)){document.getElementById(controlName).checked = true;}
			//$('#'+controlName).attr('checked',true);
		}else{if($('#'+controlName)){document.getElementById(controlName).checked = false;}
			}
	}
}
function radioField(controlName,data){
	if(!isEmpty(data)){
		$('input:radio[name="'+controlName+'"]').filter('[value="'+data+'"]').attr('checked', true);		
	}
}

function hideDivMultipleArray(array,show){
	for(var name in array){
		hideDivMultiple(array[name],show);
	}
}

/**
 * 
 * @param div
 * @param show
 */
function hideDivMultiple(fields,show){
	var array=new Array();
	array=fields.split(',');
	for(var i=0; i< array.length;i++){
		hideDiv(array[i],show);
	}
}

/**
 * 
 * @param div
 * @param show
 */
function hideDiv(div,show){
	if(show){
		$("#"+div).show();
	}else{
		$("#"+div).hide();
	}
}

/**
 * 
 * @param sel
 */

function onchageValue(sel){
	var optSel=$('#'+sel.id).val();
	var val="";
	$('#'+sel.id+' option').each(function() {
		val=$(this).val();
		if(optSel == val){
			hideDiv(val,true);
		}else{
			hideDiv(val,false);
		}
	});	
}

/**
 * Formato correcto de una fecha DD/MM/YYYY
 * @param d
 * @param e
 */
function dtval(d,e) {
	var pK = e ? e.which : window.event.keyCode;
	var dt = d.value;
	var da = dt.split('/');
	for (var a = 0; a < da.length; a++) {if (da[a] != +da[a]) da[a] = da[a].substr(0,da[a].length-1);}
	if (da[0] > 31) {da[1] = da[0].substr(da[0].length-1,1);da[0] = '0'+da[0].substr(0,da[0].length-1);}
	if (da[1] > 12) {da[2] = da[1].substr(da[1].length-1,1);da[1] = '0'+da[1].substr(0,da[1].length-1);}
	if (da[2] > 9999) da[1] = da[2].substr(0,da[2].length-1);
	dt = da.join('/');
	if (dt.length == 2 || dt.length == 5) dt += '/';
	d.value = dt;
}

function checkedC(control){
	var isChecked="N";
	if($('#'+control).is(':checked')){
		isChecked="S";
	}
	return isChecked;
}
/**
 * 
 * @param formName
 */
function formValidator(formName){
	var resutl=false;
	$('#'+formName).bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},			
		excluded: ':disabled',
		onError:function(e){
			e.preventDefault();
			e.returnValue = false;
		},
		onSuccess:function(e){
		}

	});

}
/**
 * 
 * @param formName
 * @param dateName
 * @param isRequired
 */
function initDatePicker(formName,dateName,format){	
	var date=$(function () {

		$('#'+dateName).datetimepicker(
				{format:format});

	});	

}
/**
 * 
 * @param formName
 * @param field
 */
function disableValidator(formName,field){
	$('#'+formName).data('bootstrapValidator');
	bootstrapValidator.enableFieldValidators(field, false);
}
/**
 * 
 * @param formName
 * @param field
 */
function revalidate(formName, field){
	$('#'+formName)
	.bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},			
		excluded: ':disabled'			
	})
	.change(function(e){
		$('#'+formName).bootstrapValidator('revalidateField', field);		
	})
	.end();

}

function isValidFormField(formName, field){
	var bootstrapValidator=$('#'+formName).bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},			
		excluded: ':disabled'			
	});
	var valid=	$('#'+formName).data('bootstrapValidator').isValidField(field);
	alert(valid);
	if(valid==null){valid=true;}
	return valid;
}



/**
 * 
 * @param enabledForms
 * @param disabledForms
 */
function initForms(enabledForms,disabledForms){
	controlForm(enabledForms,false,true);
	controlForm(disabledForms,true,false);

}
/**
 * 
 * @param formList
 * @param disabled
 * @param checked
 */
function controlForm(formList,disabled,checked){
	var arrayList= new Array();
	arrayList=formList.split(",");
	var fields=new Array();
	for(var i=0;i< arrayList.length;i++){
		fields=$('#'+arrayList[i]).find("input");		
		for(var j=0;j< fields.length;j++){
			if($('#'+fields[j].id).is("[type=text]")){
				$('#'+fields[j].id).prop('disabled', disabled);

			}if($('#'+fields[j].id).is("[type=radio]")){
				$('#'+fields[j].id).prop('checked', checked);
			}			
		}
	}
}
/**
 * 
 * @param controls
 * @param isEnable
 */
function enableDisFields(controls,isEnable){
	var arrayList= new Array();
	arrayList=controls.split(",");
	for(var i=0;i< arrayList.length;i++){
		enableDis(arrayList[i],isEnable);
	}
}

function compareDatesSimple(dateI,dateII){
	var validate=-2;
	//alert('entro:'+dateI+','+dateII);
	if(!isEmpty($('#'+dateI).val()) && !isEmpty($('#'+dateII).val())){
		month=$('#'+dateI).val().substring(0,2);
		day=$('#'+dateI).val().substring(3,5);
		year=$('#'+dateI).val().substring(6,10);
		var dateIS=day+"/"+month+"/"+year;
		month1=$('#'+dateII).val().substring(0,2);
		day1=$('#'+dateII).val().substring(3,5);
		year1=$('#'+dateII).val().substring(6,10);
		var dateIIS=day1+"/"+month1+"/"+year1;
		var date1 = new Date(dateIS);
		var date2 = new Date(dateIIS);
		var diff = date1.valueOf() - date2.valueOf();

		if(diff > 0){ //date1>date2
			validate=1;
		}
		if(diff == 0){
			validate=0;
		}
		if(diff < 0 ){ //date1 < date2
			validate=-1;
		}
	}
	return validate;
}

function compareDates(dateI,dateII,hoursI, hoursII){
	var validate=-2;
	if(!isEmpty($('#'+dateI).val()) && !isEmpty($('#'+dateII).val())&& !isEmpty($('#'+hoursI).val()) && !isEmpty($('#'+hoursII).val())){
		month=$('#'+dateI).val().substring(0,2);
		day=$('#'+dateI).val().substring(3,5);
		year=$('#'+dateI).val().substring(6,10);
		var dateIS=day+"/"+month+"/"+year;
		month1=$('#'+dateII).val().substring(0,2);
		day1=$('#'+dateII).val().substring(3,5);
		year1=$('#'+dateII).val().substring(6,10);
		var dateIIS=day1+"/"+month1+"/"+year1;
		var hoursIS=$('#'+hoursI).val();
		var hoursIIS=$('#'+hoursII).val();
		var date1 = new Date(dateIS+" "+hoursIS);
		var date2 = new Date(dateIIS+" "+hoursIIS);
		var diff = date1.valueOf() - date2.valueOf();

		if(diff > 0){ //date1>date2
			validate=1;
		}
		if(diff == 0){//date==date2
			validate=0;
		}
		if(diff < 0 ){ //date1 < date2
			validate=-1;
		}
	}
	return validate;
}

function getDay(){
	var d = new Date();
	var day = d.getDate();
	return (day<10 ? '0' : '')+day;
}

function getMonthDesc(){
	var d = new Date();
	var month = d.getMonth()+1;
	
	var monthDesc=""
	switch(month){
	case 1: monthDesc="Enero";
	break;
	case 2: monthDesc="Febrero";
	break;
	case 3: monthDesc="Marzo";
	break;
	case 4: monthDesc="Abril";
	break;
	case 5: monthDesc="Mayo";
	break;
	case 6: monthDesc="Junio";
	break;
	case 7: monthDesc="Julio";
	break;
	case 8: monthDesc="Agosto";
	break;
	case 9: monthDesc="Septiembre";
	break;
	case 10: monthDesc="Octubre";
	break;
	case 11: monthDesc="Noviembre";
	break;
	case 12: monthDesc="Diciembre";
	break;
	}
	return monthDesc;
}


function getYear(){
	var d = new Date();
	var fullYear=d.getFullYear();
	return fullYear;
}

function getNow(){
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var dateN = (day<10 ? '0' : '')+day + '/' +(month<10 ? '0' : '') + month + '/' +d.getFullYear();
	return dateN;
}

function getHours(){
	var d = new Date();
	var hours=d.getHours();
	var minutes=d.getMinutes();
	var dateM=(hours<10 ? '0' : '')+hours+":"+(minutes<10 ? '0' : '')+minutes;
	return dateM;
}

function validTime(fieldHour) {
	var inputStr=$('#'+fieldHour).val();
	if (!inputStr || inputStr.length<1) {return false;}
	var time = inputStr.split(':');
	return time.length === 2 
	&& parseInt(time[0],10)>=0 
	&& parseInt(time[0],10)<=23 
	&& parseInt(time[1],10)>=0 
	&& parseInt(time[1],10)<=59;
}

/**
 * 
 * @param control
 * @param isEnable
 */
function enableDis(control,isEnable){
	$('#'+control).attr('disabled',isEnable);
}
function enableDisByControl(control_1, control_2){
	//alert(control_1+','+control_2);
	var isDisabled = $('#'+control_1).is(':disabled');
	if(isDisabled){
		enableDis(control_2,true);
	}else{
		enableDis(control_2,false);
	}
}

/**
 * 
 * @param formName
 * @param formgroupName
 */
function initForm(formName,formgroupName){
	formValidator(formName);
	disabledButton(formName,formgroupName);
}
/**
 * 
 */
function collapsable(){
	$('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
	}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
	});
}

/**
 * 
 * @param combo
 * @param controlName
 */

/********************************** FUNCIONES PARA LAS PANTALLAS *******************************/
function loadCiudades(combo, controlName){
	var val=$('#'+combo.id).val();
	if(!isEmpty(val)){
		loadCatalogByValue(controlName,'CONS_CAT_MUNICIPIOS',val);
	}
}

/**
 * 
 * @param comboName1
 * @param comboName2
 * @param controlName
 * @param values
 */
function loadColonias(comboName1, comboName2, controlName,values){
	var val1=$('#'+comboName1).val();
	var val2=$('#'+comboName2).val();
	var val= "'"+val1+"','"+val2+"'";
	loadCatalogByValue(controlName,'CONS_CAT_COLONIAS',val);
}

/******** Consultas *******/

/**
 * 
 * @param formName
 * @param validateFields
 * @param disabledF
 */
function validateFilters(formName,validateFields,disabledF){
	validateFieldsForm(formName,validateFields,disabledF);
	var enabled=successFieldsForm(formName,validateFields,disabledF);
	if(enabled){
		$('#search').val(validateFields);
	}
}

function validateFieldsForm(formName,reqFields,disableds){
	var array=new Array();
	array= reqFields.split(',');
	for(var i=0;i<array.length;i++){
		revalidate(formName, array[i]);
	}	
}

function successFieldsForm(formName,validateFields,disabledF){
	var disabled=false;
	var array=  new Array();
	array=validateFields.split(',');
	var has=false;
	for(var i=0; i< array.length;i++){
		if(isEmpty($('#'+array[i]).val())){
			has=true;
		}
	}
	if(has){
		enableDisFields(disabledF,true);
	}else{
		enableDisFields(disabledF,false);
		disabled=true;
	}
	return disabled;
}


function limpiaFiltros(camposValidar, camposLimpiar, object){
	if(object != null) {
		var patronNumero = /\d/;
		if (!patronNumero.test($(object).val())) {
			$(object).val('');
		}
	}
	$('#camposValidar').val(camposValidar)
	enableDis('btnBuscar',false);
	var camposArreglo = camposLimpiar.split(',');
	for(var i = 0; i < camposArreglo.length; i++){
		$('#'+camposArreglo[i]).val('');
	}
}
function Validate24Hrs(Time_Field) {
	RegEx = "\([0-2][0-9]):([0-5][0-9])$";
	Err_Msg = "";
	if (Time_Field.value != "")
	{
		if (Regs = Time_Field.value.match(RegEx)) {
			if ((Regs[1] > 23)) {
				Err_Msg = 'Formato incorrecto de hora hh:mm';
			}
		}
		else {
			Err_Msg = 'Formato incorrecto de hora hh:mm';
		}
	}
	if (Err_Msg != "") {
		alert(Err_Msg);
		Time_Field.value='';
		Time_Field.focus();
		return false;
	}
	else {
		//alert('Matching');
		return true;
	}
}
function colon(e, control) {
	var x = document.getElementById(control);
	var key = window.event ? e.keyCode : e.which;
	if (key != '8' && key != '46') {
		if (x.value.length == 2)
			x.value += ":";
	}
}
function removeMonedaF(monedaVal){
	monedaVal=monedaVal.replace(/,/g,'');
	return monedaVal;
}

function validateEmailMessage(controlName){
	var isValid=validateEmail(controlName);
	if(!isValid){alert('El formato del correo es incorrecto');$('#'+controlName).val('');}
}

function validateEmail(controlName){
	var isValid= true;
	var emailAddress=$('#'+controlName).val();
	if(!isEmpty(emailAddress)){
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	isValid=pattern.test(emailAddress);
	}
	return isValid;
}
function replaceChars(value){
	value= value.toLowerCase();
	value= value.replace(/[^A-Za-z0-9?![:space:]]|[àáâãäçèéêëìíîïñòóôõöùúûüýÿ]|\s+/g,'');
	return value;
}
function randomInt(min, max) {
    	return Math.floor(Math.random() * (max - min + 1) + min);
}
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
	{
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}

function getRowsTable(tableName,typeTable,columns){
	var table;
	var contentRows=new Array();
	if(typeObj=='class')
		table=$('.'+tableName);
	else
		table=$('#'+tableName);
	
	table.find('tr').each(function (i, el) {
	var $tds = $(this).find('td');
	if($tds.length >0){
		for(var i=0; i< columns;i++){
			contentRows[i]=$tds.eq(i).text();
		}
	}							
	});
	return contentRows;
}
   
function pagination(limitProducts,limitPagination){
	var pagination=$('#paginator');
	if((limitProducts+1) > limitPagination){
		var residue=limitProducts%limitPagination;
		var pags=limitProducts/limitPagination;
		if(residue >0){
			pags+=1;
		}
		var htmlPag='';
		if(pags>1){
			htmlPag='<li class="page-item active">'+
      			'<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>'+
    			'</li>';
    	for(var i=2; i<= pags ;i++){
			htmlPag+='<li class="page-item"><a class="page-link" href="#">'+i+'</a></li>';		
		}
		}
		pagination.append(htmlPag);
	}
}
