<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-users"></i> Visualizza utente </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome"> Home </a> </li>
                                <li class="active">Utenti </li>
                            </ol>
                        </div>
                    </div>
<?
$id = isSet($id) ? $id : '' ;
$page = isSet($page) ? $page : '' ;
$name = isSet($name) ? $name : '' ;
$crcdt = isSet($crcdt) ? $usecrcdtrcre : '' ;
 
$GetRecordView = $db->singlerec("select * from register where id='$id'");
@extract($GetRecordView);
$GetRefereBy = $db->get_all("select * from register where id='$id'");
@extract($GetRefereBy);

include "leftmenu.php";
?>
                   <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>Visualizza dettagli utente</h3><a href="register"  class="btn btn-success">Indietro</a></br></br>
                        <div class="panel">
							<img src="<? echo $siteurl; ?>/images/user/<? echo $prof_image; ?>" class="img-rounded m10"/>
                            <div class="panel-body">
								<table height="300">
                                    <thead>
                                        <tr>
										<td>Nome:</td><td><? echo $fullname;?></td>
										</tr>
										<tr>
										<td>Ruolo:</td><td><? echo $role;?></td>
										</tr>
										<tr>
										<td>Email:</td><td><? echo $email; ?></td>
										</tr>
										<tr>
										<td>Telefono:</td><td><? echo $mobile; ?></td>
										</tr>
										<tr>
										<td>Indirizzo IP:</td><td><? echo $ip_addr; ?></td>
										</tr>
										<tr>
										<td>Iscritto dal:</td><td><? echo date("d-M-Y", $created_at); ?></td>
										</tr>
										<tr>
										<td>Aggiornato il:</td><td><? echo date("d-M-Y", $updated_at); ?></td>
										</tr>
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