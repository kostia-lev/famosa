$("<style type='text/css'> .short{font-weight:bold;color:#FF0000;font-size:12px;border:1px ridge #FF0000;}.weak{font-weight:bold;color:#FF0000;font-size:12px;border:1px ridge #FF0000;}.good{font-weight:bold;color:orange;font-size:12px;border:1px ridge orange;}.strong{font-weight:bold;color: limegreen;font-size:12px;border:1px ridge limegreen;}.alert{outline-color:red;} </style>").appendTo("head"); 

function vimg(){
var fuData = document.getElementById('product_img');	
var FileUploadPath = fuData.value;

if (FileUploadPath == '') 
	{
		alert("Please upload an image");
    }
	
}


function validate_img()
{
	var fuData = document.getElementById('product_img');
	var FileUploadPath = fuData.value;
	
	if (FileUploadPath == '') 
	{
		alert("Please upload an image");
    return false;
	}
	else 
	{	
		var size = fuData.files[0].size;
		if(size > 2097152){alert("Maximum file size exceeds");return false;}

		else{
		var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
		if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") 
		{
			if (fuData.files && fuData.files[0]) 
			{
				var reader = new FileReader();
				reader.onload = function(e) {$('#blah').attr('src', e.target.result);}
				reader.readAsDataURL(fuData.files[0]);
				return true;
			}
		return true;	
		}
		else 
		{
			alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");return false;
		}
		
		}
		
	}

}



function validate_upload_form()
{	
tinymce.triggerSave();
var isImage = validate_img();
var name=$("#name");
var desc=$("#desc");

var cat1=$("#cat1");
var cat2=$("#cat2");
var cat3=$("#cat3");

var hr1=$("#hr1");
var hr2=$("#hr2");
var hr3=$("#hr3");
var wr1=$("#wr1");
var wr2=$("#wr2");
var wr3=$("#wr3");
var cc1=$("#cc1");
var cc2=$("#cc2");
var cc3=$("#cc3");
var cc4=$("#cc4");
var sc1=$("#sc1");
var sc2=$("#sc2");
var sc3=$("#sc3");
var sc4=$("#sc4");

var framework=$("#framework");
var th_i_f=$("#th-f-i");
var coloumn=$("#column");
var layout=$("#layout");
var perv_url=$("#p-url");
var down_url=$("#d-url");
var tags=$("#tags"); 

var supr1=$("#supr1");
var supr2=$("#supr2");

var comments = $("#comments");
var terms = $("#terms");



//initilization value

var nameVal=$("#name").val();
var descVal=$("#desc").val();

var cat1Val=$("#cat1").val();
var cat2Val=$("#cat2").val();
var cat3Val=$("#cat3").val();

var wr1Val=$("#wr1").val();
var wr2Val=$("#wr2").val();
var wr3Val=$("#wr3").val();
var cc1Val=$("#cc1").val();
var cc2Val=$("#cc2").val();
var cc3Val=$("#cc3").val();
var cc4Val=$("#cc4").val();

var frameworkVal=$("#framework").val();
var th_i_fVal=$("#th-f-i").val();
var coloumnVal=$("#coloumn").val();
var layoutVal=$("#layout").val();
var perv_urlVal=$("#p-url").val();
var down_urlVal=$("#d-url").val();
var tagsVal=$("#tags").val(); 

var supr1Val=$("#supr1").val();
var supr2Val=$("#supr2").val();

var commentsVal=$("#comments").val();
var termsVal=$("#terms").val();

if(isEmpty(nameVal) || !isTextOnly(nameVal)){name.focus();name.addClass('alert'); return false;}
else if(isEmpty(descVal)){ alert('description missing..'); $("#out1").css('box-shadow','0px 0px 10px red');window.location.hash = '#out1'; return false;}
else if(!isImage){return false;}
else if(cat1Val=='select'){alert('select category1'); cat1.focus(); return false;}
else if(cat2Val=='select'){alert('select category2'); cat2.focus(); return false;}
else if(cat3Val=='select'){alert('select category3'); cat3.focus(); return false;}
else if(!isChecked(hr1) && !isChecked(hr2) && !isChecked(hr3)){alert('High resolution?'); return false;}	
else if(!isChecked(wr1) && !isChecked(wr2) && !isChecked(wr3)){alert('Widget ready?'); return false;}	
else if(!isChecked(sc1) && !isChecked(sc2) && !isChecked(sc3) && !isChecked(sc4)){alert('Software version?'); return false;}
else if(!isChecked(cc1) && !isChecked(cc2) && !isChecked(cc3) && !isChecked(cc4)){alert('Compactable with?'); return false;}
else if(!isSelected(framework)){framework.focus();return false;}
else if(!isSelected(th_i_f)){th_i_f.focus(); return false;}
else if(!isSelected(coloumn)){coloumn.focus(); return false;}
else if(!isSelected(layout)){layout.focus(); return false;}
else if(!isUrl(perv_urlVal)){perv_url.focus();perv_url.addClass('alert'); return false;}
else if(!isUrl(down_urlVal)){down_url.focus();down_url.addClass('alert'); return false;}
else if(isEmpty(tagsVal) || !isText(tagsVal)){tags.focus();tags.addClass('alert'); return false;}
else if(!isChecked(supr1) && !isChecked(supr2)){alert('item supported?'); return false;}

else if(isEmpty(commentsVal)){alert("Comment is missing");$("#out2").css('box-shadow','0px 0px 10px red');window.location.hash = '#out2';return false;}

else if(!isChecked(terms)){terms.focus(); terms.addClass('alert'); return false;}
else {return true;}
}



function validate_signup(){
var name=$("#uname");
var email=$("#uemail");
var pass=$("#upass");
var passc=$("#upassc");
var phno=$("#uphno");
var loc=$("#uloc");

var nameVal=$("#uname").val();
var emailVal=$("#uemail").val();
var passVal=$("#upass").val();
var passcVal=$("#upassc").val();
var phnoVal=$("#uphno").val();
var locVal=$("#uloc").val();

if(isEmpty(nameVal) || !isTextOnly(nameVal)){name.focus(); alert('Invalid username'); return false;}
else if(!isEmail(emailVal)){email.focus(); alert('Invalid Email'); return false;}
else if(!isPassword(passVal)){pass.focus(); alert('Password should be min 8, and min 1 lower & uppercase and number'); return false;}
else if(passVal != passcVal){passc.focus(); alert('Missmatch password');return false;}
else if(!isTextOnly(locVal)){loc.focus(); alert('Location should be textonly');return false;}
else if(!ValidateFileUpload()){return false;}

else {return true;}
}


