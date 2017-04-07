<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Newsletter </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome"> Home </a> </li>
                                <li class="active">Newsletter </li>
                            </ol>
                        </div>
                    </div>
<?

$id = isSet($id) ? $id : '' ;
$page = isSet($page) ? $page : '' ;
$name = isSet($name) ? $name : '' ;
$email = isSet($email) ? $email : '' ;
$usercre = isSet($usercre) ? $usercre : '' ;


$GetRecordView = $db->singlerec("select * from newsletter where id='$id'");
@extract($GetRecordView);
$GetRefereBy = $db->get_all("select * from newsletter where id='$id'");
@extract($GetRefereBy);

?>
                   <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>Vedi iscritto Newsletter</h3><a href="newsletter"  class="btn btn-success">Indietro</a></br></br>
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
								<table>
                                    <thead>
                                        <tr>
											<td>Nome:</td><td><? echo $name;?></td>
											</tr>
											<tr>
											<td>Email:</td><td><? echo $email; ?></td>
											</tr>
											<tr>
											<td>Indirizzo IP:</td><td><? echo $ip;?></td>
											</tr>
											<tr>
											<td>Iscritto il:</td><td><? echo date("d-M-Y", $date);?></td>
											</tr>
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