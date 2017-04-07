<?
include 'header.php';
include "pagination.php";
$perpage=10;
$limit=limitation($perpage);
include 'profile_header.php';
?>

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
            <span class="blackhead pdl10">Dashboard</span>
        </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->

        <? include "profile_left.php"; ?>
        <div class="col-md-9 col-sm-12 col-xs-12 mt20">
            <?php if($row['role']=="broker" || $row['role']=="office-manager"){ ?>
            <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                <div class="pdt10">
                    <div class="row col-md-9 col-sm-6 col-xs-12 property-dash-head">Richieste totali<br><hr></div>
                    <div class="row col-md-3 col-sm-6 col-xs-12 mb10 pull-right"><a href="post-ad"><input type="button" class="btn btn-view-detail" value="Aggiungi immobile" /></a><br><br></div>
                </div><!--class="pdt10"-->
                <?
                $randuniq = $row['randuniq'];
                $que = "select * from requests order by id desc";
                $requests = $db->get_all($que . $limit);
                if (count($requests) >= 1) {
                    echo '<div class=" col-md-12 col-sm-12 col-xs-12 table-responsive">
	        							<table class="table table-striped brdr">
	        							<tr class="tabl-head">
	        							<td>Nome</td>
	        							<td>Email</td>
	        							<td>Telefono</td>
	        							<td>Messaggio</td>
	        							<td>Ricevuta da</td>
	        							<td>Data</td>
        
	        							</tr>';
                    foreach ($requests as $request) {
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="request<? echo $request['id']; ?>" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><? echo $request['sub']; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><? echo $request['message']; ?></p>
                                        <br>
                                        <?php
                                        $propniq = $request['prop_niq'];
                                        $prop_req=$db->singlerec("select * from listings where randuniq='$propniq'");
                                        $propurl = $prop_req['slug'];
                                        $proptitle = $prop_req['prop_title'];
                                        $usrniq = $request['user_niq'];
                                        ?>
                                        Immobile: <a href="<?php echo $siteurl . '/listing/' . $propniq . '/' . $propurl ?>" target="_blank"><?php echo $proptitle ?></a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <tr class="tabl-txt">
                            <td><? echo $request['name']; ?></td>
                            <td><a href="mailto:<? echo $request['email']; ?>"><? echo $request['email']; ?></a></td>
                            <td><? echo $request['mobile']; ?></td>
                            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#request<? echo $request['id']; ?>">Vedi richiesta</button></td>
                            <td><?
                                $getusr = $db->singlerec("select * from register where randuniq='$usrniq' limit 1");
                                echo $getusr['fullname'];
                                ?>
                            </td>
                            <td><? echo date("d-M-Y", $request['request_date']); ?></td>
                        </tr>
                        <?
                    }
                    echo '</table></div>';
                } else echo '<br><br><br><br>Nessuna richiesta trovata!<br><br>';
                ?>
                <div class="text-center boxs">
                    <div class="row">
                        <div class="col-md-12">
                            <? $db->insertrec(getPagingQuery1($que, $perpage, "")); ?>
                            <nav class="pagination-wrapper">
                                <?echo $pagingLink = getPagingLink1($que, $perpage, ""); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
            <?php } else { ?>
            <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                <div class="pdt10">
                    <div class="row col-md-9 col-sm-6 col-xs-12 property-dash-head">Richieste<br><hr></div>
                    <div class="row col-md-3 col-sm-6 col-xs-12 mb10 pull-right"><a href="post-ad"><input type="button" class="btn btn-view-detail" value="Aggiungi immobile" /></a><br><br></div>
                </div><!--class="pdt10"-->
                <?
                $randuniq = $row['randuniq'];
                $que = "select * from requests where user_niq = '$randuniq' order by id desc";
                $requests = $db->get_all($que . $limit);
                if (count($requests) >= 1) {
                    echo '<div class=" col-md-12 col-sm-12 col-xs-12 table-responsive">
								<table class="table table-striped brdr">
								<tr class="tabl-head">
								<td style="width:20%">Nome</td>
								<td style="width:20%">Email</td>
								<td style="width:20%">Telefono</td>
								<td style="width:20%">Messaggio</td>
								<td style="width:20%">Data</td>

								</tr>';
                    foreach ($requests as $request) {
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="request<? echo $request['id']; ?>" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><? echo $request['sub']; ?></h4>
                              </div>
                              <div class="modal-body">
                                <p><? echo $request['message']; ?></p>
                                <br>
                                <?php
                                $propniq = $request['prop_niq'];
                                $prop_req=$db->singlerec("select * from listings where randuniq='$propniq'");
                                $propurl = $prop_req['slug'];
                                $proptitle = $prop_req['prop_title'];
                                ?>
                                Immobile: <a href="<?php echo $siteurl . '/listing/' . $propniq . '/' . $propurl ?>" target="_blank"><?php echo $proptitle ?></a>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                              </div>
                            </div>

                            </div>
                        </div>
                        <tr class="tabl-txt">
                            <td><? echo $request['name']; ?></td>
                            <td><a href="mailto:<? echo $request['email']; ?>"><? echo $request['email']; ?></a></td>
                            <td><? echo $request['mobile']; ?></td>
                            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#request<? echo $request['id']; ?>">Vedi richiesta</button></td>
                            <td><? echo date("d-M-Y", $request['request_date']); ?></td>
                        </tr>
                        <?
                    }
                    echo '</table></div>';
                } else echo '<br><br><br><br>Nessuna richiesta trovata!<br><br>';
                ?>
                <div class="text-center boxs">
                    <div class="row">
                        <div class="col-md-12">
                            <? $db->insertrec(getPagingQuery1($que, $perpage, "")); ?>
                            <nav class="pagination-wrapper">
                                <?echo $pagingLink = getPagingLink1($que, $perpage, ""); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
            <?php } ?>
        </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
    </div> <!--container-->

<?
include "footer.php";

?>