<?php
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}
?>

<script>
    $(document).ready(function() {
        $("#fileUpload").on('change', function() {
            //Get count of selected files
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof(FileReader) != "undefined") {
                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++)
                    {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "thumb-image"
                            }).appendTo(image_holder);
                        }
                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    alert("Errore, il tuo browser non supporta FileReader.");
                }
            } else {
                alert("Seleziona delle immagini!");
            }
        });
    });
</script>

<script>
$(document).ready(function () {

    $('#p_ad').validate({
        rules: {
            mobile: {
                required: true
            },
			title: {
                required: true
            },
			loc: {
                required: true
            },
			address: {
                required: true
            },
			eprice: {
                required: true
            },
			bprice: {
                required: true
            },
			descrip: {
                required: true
            },
			carea: {
                required: true
            },
			parea: {
                required: true
            },
			cperson: {
                required: true
            },
			cno: {
                required: true
            }
        }
    });

});</script>

<script>
$(document).ready(function () {

    $('#maform').validate({
        rules: {
            fullname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
			mobile: {
                required: true
            },
			website: {
				url: true
            }
        }
    });

});</script>

<script>
$(document).ready(function () {

    $('#cnt_form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
			mobile: {
                required: true
            },
			sub: {
				required: true
            },
			message: {
				required: true
            }
        }
    });

});</script>

<script>
$(document).ready(function () {

    $('#rform').validate({
        rules: {
            fullname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
			mobile: {
                required: true
            },
			password: {
                required: true,
				minlength: 6
            },
			cpassword: {
				required: true,
				minlength: 6
            }
        }
    });

});</script>

<script>
$(document).ready(function () {

    $('#lform').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
			password: {
                required: true
            }
        }
    });

});</script>

<script>
$(document).ready(function () {

    $('#cpform').validate({
        rules: {
            cpass: {
                required: true
            },
            npass: {
                required: true
            },
			rpass: {
                required: true
            }
        }
    });

});</script>

<script>
$(document).ready(function () {

    $('#updsoc').validate({
        rules: {
            fb: {
                required: true,
				url: true
            },
            twt: {
                required: true,
				url: true
            }
        }
    });

});</script>

<script>
    var shortNumber = $("#clickToShow").text().substring(0,  $("#clickToShow").text().length - 15);
    var onClickInfo = "_gaq.push(['_trackEvent', 'EVENT-CATEGORY', 'EVENT-ACTION', 'EVENT-LABEL', VALUE, NON-INTERACTION]);";
    $("#clickToShow").hide().after('<div class="header-call" id="clickToShowButton" onClick="' + onClickInfo + '"><a  href="#"><i class="fa fa-phone" aria-hidden="true"></i> ' + shortNumber + 'Contattaci</a></div>');
    $("#clickToShowButton").click(function() {
        $("#clickToShow").show();
        $("#clickToShowButton").hide();
    });
</script>

<? if(isset($_REQUEST['rperr']) || isset($_REQUEST['rmerr'])) {?> <script type="text/javascript">$(window).load(function(){
  $('#register').modal('show');
  $('#forgetpass').css({ display: "none" });
  $('#login').removeAttr( 'style' ); }); </script> <? } ?>

<? if(isset($_REQUEST['lerror']) || isset($_REQUEST['nl']) || isset($_REQUEST['lmt'])) {?> <script type="text/javascript">$(window).load(function(){
  $('#login').modal('show');
  $('#forgetpass').css({ display: "none" });
  $('#register').removeAttr( 'style' ); }); </script><? } ?>

