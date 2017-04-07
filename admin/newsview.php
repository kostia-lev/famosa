<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> News </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">News </li>
                            </ol>
                        </div>
                    </div>
<?

$id = isSet($id) ? $id : '' ;
$page = isSet($page) ? $page : '' ;
$name = isSet($name) ? $name : '' ;
$comment = isSet($comment) ? $comment : '';
$usercre = isSet($usercre) ? $usercre : '' ;


$GetRecordView = $db->singlerec("select * from news where id='$id'");
@extract($GetRecordView);
$GetRefereBy = $db->get_all("select * from news where id='$id'");
@extract($GetRefereBy);

?> <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>View News Details</h3><a href="news.php"  class="btn btn-success">Back</a></br>
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
								<table>
                                    <thead>
											<tr>
											<td>Name</td><td width="75">:</td><td><? echo $name;?></td>
											</tr>
											<tr>
											<td>Comment</td><td width="75">:</td><td><? echo $comment;?></td>
											</tr>
											<tr>
											<td>Image</td><td width="75">:</td><td><img src="../images/news/<? echo $image; ?>" width="50" height="50"></td>
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