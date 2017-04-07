<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Staff </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Staff </li>
                            </ol>
                        </div>
                    </div>
<?
$user_auto_id = isSet($user_auto_id) ? $user_auto_id : '' ;
$page = isSet($page) ? $page : '' ;
$name = isSet($name) ? $name : '' ;
$comment = isSet($comment) ? $comment : '' ;
$usercre = isSet($usercre) ? $usercre : '' ;


$GetRecordView = $db->singlerec("select * from gen_user_mst where user_auto_id='$id'");
@extract($GetRecordView);
$GetRefereBy = $db->get_all("select * from gen_user_mst where user_auto_id='$id'");
@extract($GetRefereBy);

include "leftmenu.php";
?>
                   <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>View Staff Details</h3><a href="usermaster.php"  class="btn btn-success">Back</a></br>
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
								<table height="300">
                                    <thead>
                                        <tr>
										<td>Name</td><td style="width:50px;">:</td><td><? echo $name;?></td>
										</tr>
										<tr>
										<td>username</td><td style="width:50px;">:</td><td><? echo $username;?></td>
										</tr>
										<tr>
										<td>Password</td><td style="width:50px;">:</td><td><? echo $ref_password;?></td>
										</tr>
										<tr>
										<td>Date Of Birth</td><td style="width:50px;">:</td><td><? echo $dob; ?></td>
										</tr>
										<tr>
										<td>Email Id</td><td style="width:50px;">:</td><td><? echo $email_id; ?></td>
										</tr>
										<tr>
										<td>Mobile No</td><td style="width:50px;">:</td><td><? echo $mobile_1; ?></td>
										</tr>
										<tr>
										<td>Image</td><td style="width:50px;">:</td><td><img src="uploads/userimages/<? echo $userimages;?>" width="50" height="50"></td>
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