<? include "header.php"; ?>
<? include "../mapapi.php"; ?>

    <!--===================================================-->
    <!--END NAVBAR-->
    <div class="boxed">
        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <? include "header_nav.php"; ?>
            <div class="pageheader">
                <h3><i class="fa fa-home"></i> Impostazioni </h3>
                <div class="breadcrumb-wrapper">
                    <span class="label">Percorso:</span>
                    <ol class="breadcrumb">
                        <li> <a href="welcome.php"> Home </a> </li>
                        <li class="active"> Impostazioni </li>
                    </ol>
                </div>
            </div>
            <?
            $upd = isset($upd)?$upd:'';
            $id = isSet($id) ? $id : '' ;
            $act = isSet($act) ? $act : '' ;
            $page = isSet($page) ? $page : '' ;
            $Message = isSet($Message) ? $Message : '' ;
            $website_title=isSet($website_title)?$website_title:'';
            $agency_city=isSet($agency_city)?$agency_city:'';
            $agency_address=isSet($agency_address)?$agency_address:'';
            $postal_code=isSet($postal_code)?$postal_code:'';
            $website_url=isSet($website_url)?$website_url:'';
            $admin_email=isSet($admin_email)?$admin_email:'';
            $img = isSet($img) ? $img : '' ;
            $ImgExt = isSet($ImgExt) ? $ImgExt : '' ;
            $DisplayDeleteImgLink = isSet($DisplayDeleteImgLink) ? $DisplayDeleteImgLink : '' ;

            if($act ==  "del" && $nimg != "") {
                $RemoveImage = "uploads/general_setting/$nimg";
                @unlink($RemoveImage);
                $db->insertrec("update general_setting set img='noimage.jpg' where id='$id'");

                header("location:general?act=scs");
                exit;
            }

            if($submit) {
                $crcdt = time();
                $website_title = trim(addslashes($website_title));
                $agency_city = trim(addslashes($agency_city));
                $agency_address = trim(addslashes($agency_address));
                $postal_code = trim(addslashes($postal_code));
                $website_url = trim(addslashes($website_url));
                $admin_email = trim(addslashes($admin_email));
                $google_api = trim(addslashes($google_api));

                // Get JSON results from this request
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($agency_address).'&sensor=false');
                // Convert the JSON to an array
                $geo = json_decode($geo, true);

                if($_FILES['Img']['tmp_name'] != "" && $_FILES['Img']['tmp_name'] != "null") {
                    $fpath = $_FILES['Img']['tmp_name'] ;
                    $fname = $_FILES['Img']['name'] ;
                    $getext = substr(strrchr($fname, '.'), 1);
                    $ImgExt = strtolower($getext);
                }
                if($ImgExt=="jpg" || $ImgExt == "jpeg" || $ImgExt == "gif" || $ImgExt == "png" || $ImgExt == ''){
                    $set  = "website_title = '$website_title'";
                    $set  .= ",agency_city = '$agency_city'";
                    $set  .= ",agency_address = '$agency_address'";
                    $set  .= ",postal_code = '$postal_code'";

                    if ($geo['status'] == 'OK') {
                        // Get Lat & Long
                        $latitude = $geo['results'][0]['geometry']['location']['lat'];
                        $longitude = $geo['results'][0]['geometry']['location']['lng'];
                        $set .= ",lat='$latitude'";
                        $set .= ",lng='$longitude'";
                    }

                    $set  .= ",website_url = '$website_url'";
                    $set  .= ",admin_email = '$admin_email'";
                    $set  .= ",google_api = '$google_api'";
                    $set  .= ",ipaddr = '$ipaddress'";
                    $set  .= ",chngdt = '$crcdt'";
                    $set  .= ",userchng = '$usrcre_name'";
                    $db->insertid("update general_setting set $set where id='1'");
                    if($_FILES['Img']['tmp_name'] != "" && $_FILES['Img']['tmp_name'] != "null") {
                        $fpath = $_FILES['Img']['tmp_name'] ;
                        $fname = $_FILES['Img']['name'] ;
                        $getext = substr(strrchr($fname, '.'), 1);
                        $ext = strtolower($getext);
                        $NgImg= "logo".".".$ext;
                        $set_img = "img = '$NgImg'" ;
                        $des = "uploads/general_setting/$NgImg";
                        move_uploaded_file($fpath,$des) ;
                        chmod($des,0777);
                        $iimg=$db->insertrec("select img from general_setting where id='1'");
                        if($iimg!= "noimage.jpg") {
                            $RemoveImage = "uploads/general_setting/$nimg";
                            @unlink($RemoveImage);
                        }
                        $db->insertrec("update general_setting set $set_img where id='1'");
                    }

                    header("location:general?act=scs");
                    exit;
                }
                else{
                    $Message = "<font color='red'>kindly upload jpg,gif,png image format only</font>";
                }
            }
            if($upd == 1)
                $hidimg = "style='display:none;'";
            else if($upd == 2)
                $hidimg = "";


            $GetRecord = $db->singlerec("select * from general_setting where id='1'");
            @extract($GetRecord);
            $website_title = stripslashes($website_title);
            $website_url = stripslashes($website_url);
            $admin_email = stripslashes($admin_email);
            //code for images
            if($img == "noimage.jpg") {
                $ShowOldImg = "";
                $DisplayDeleteImgLink = '';
            }
            else if($img != "") {
                $ShowOldImg = "";
                $DisplayDeleteImgLink = '<a href="general?act=del&nimg='.$img.'&id='.$id.'">Elimina immagine</a>';
            }

            if($act == "scs")
                $Message = "<font color='green'><b>Impostazioni aggiornate con successo!</b></font>" ;
            ?>
            <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
            <script type="text/javascript" src="js/tinymce.js" ></script>
            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                <!-- Basic Data Tables -->
                <!--===================================================-->
                <h3>Impostazioni generali</h3></br>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><? echo $Message; ?></h3>
                    </div>

                    <div class="panel-body">
                        <table>
                            <thead>
                            <form method="post" action="general" enctype="multipart/form-data" class="form-horizontal">
                                <tr>
                                    <td><label>Titolo sito <font color="red">*</font></label></td>
                                    <td><input type="text" class="form-control" name="website_title" value="<? echo $website_title; ?>" placeholder="Inserisci nome sito web (apparir&aacute; dopo il separatore)" required></td>
                                </tr>
                                <tr>
                                    <td><label>URL sito <font color="red">*</font></label></td>
                                    <td><input type="text" class="form-control" name="website_url" value="<? echo $website_url; ?>" placeholder="Inserisci url sito web" required></td>
                                </tr>
                                <tr>
                                    <td><label>Citt&aacute; agenzia <font color="red">*</font></label></td>
                                    <td><input id="autocomplete" onFocus="geolocate()" type="text" class="form-control" name="agency_city" value="<? echo $agency_city; ?>" placeholder="Inserisci citt&aacute; agenzia" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>Indirizzo agenzia <font color="red">*</font></label></td>
                                    <td><input id="addr" onFocus="geolocate()" type="text" class="form-control" name="agency_address" value="<? echo $agency_address; ?>" placeholder="Inserisci indirizzo agenzia" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>CAP <font color="red">*</font></label></td>
                                    <td><input type="text" class="form-control" value="<? echo $postal_code; ?>" placeholder="Codice Postale" name="postal_code"></td>
                                </tr>
                                <tr>
                                    <td><label>Email amministratore <font color="red">*</font></label></td>
                                    <td><input type="email" class="form-control" name="admin_email" value="<? echo $admin_email; ?>" placeholder="Inserisci email Admin" required></td>
                                </tr>
                                <tr>
                                    <td><label>API Google Maps <font color="red">*</font></label></td>
                                    <td><input type="text" class="form-control" name="google_api" value="<? echo $google_api; ?>" placeholder="Inserisci API Google Maps" required></td>
                                </tr>
                                <tr>
                                    <td>Logo sito</td>
                                    <td><img src="uploads/general_setting/<? echo $img; ?>"><br>
                                        <? echo $DisplayDeleteImgLink; ?>
                                        <input name="Img" type="file" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Salva">
                                        <input type="reset" name="reset" class="btn btn-primary" value="Indietro">
                                    </td>
                                </tr>
                            </form>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->
        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
        <? include "leftmenu.php"; ?>
    </div>
<?

include "footer.php";
?>