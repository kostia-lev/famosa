<?
//After allocated the menu's user can login possible
$GetMainMenuData=$db->singlerec("select main_menu_id from gen_sub_menu_mst where emp_id='$Adminusrtype_id'");
$Main_Menu_Id = $GetMainMenuData['main_menu_id'];
if($Main_Menu_Id == 0 && $_SESSION['Adminusrtype_id'] == ''){ 
header("location:logout.php");
exit ;
}
if($_SESSION['Adminusrtype_id'] == $Adminusrtype)
	$FilterAdminQry = "where active_status='1'";
else
	$FilterAdminQry="where main_menu_id in($Main_Menu_Id)";

$main_menu_List = "<li>";	
$GetMenuRec=$db->get_all("select * from main_menu_mst $FilterAdminQry order by orderby asc");
for($mm = 0 ; $mm < count($GetMenuRec) ; $mm++) {
    $mm_id = $GetMenuRec[$mm]['main_menu_id'] ;
	$GetSubMenuData=$db->get_all("select sub_menu,disp_sub_menu from sub_menu_mst where active_status='1' and main_menu_id='$mm_id' order by orderby asc"); 
	$CountMaxVal = count($GetSubMenuData);
	$Count_Max_Val = $CountMaxVal;
	$mainmenunames = (stripslashes($GetMenuRec[$mm]['main_menu']));
	$main_menu_names = strtoupper($mainmenunames);
	$main_menu_img = $GetMenuRec[$mm]['main_menu_img'];
	if($CountMaxVal == 0)
		$main_menu_List .= "<a href='#'><i class='fa fa-home'></i>$main_menu_names<i class='arrow'></i></a>";
	else	
		$main_menu_List .= "<a href='javascript:void(0)'><i class='fa fa-home'></i>$main_menu_names<i class='arrow'></i></a>";

 	if($CountMaxVal != 0){
		$sbm_List = "<ul class='collapse'><li>";
		for($sbm = 0 ; $sbm < $CountMaxVal ; $sbm++) {
 			
			$Sub_Menus = stripslashes($GetSubMenuData[$sbm]['sub_menu']);
			$disp_sub_menu = stripslashes($GetSubMenuData[$sbm]['disp_sub_menu']);
			$Sub_Menus1 = ucwords($disp_sub_menu);
 			$sbm_List .= "<a href='$Sub_Menus'>$Sub_Menus1</a>";
		
		if($sbm < $CountMaxVal)
			$sbm_List .="</li><li>"; 
			
		if($sbm == (($CountMaxVal-1)))
			$sbm_List .="</ul>"; 	
		}
		$main_menu_List .= $sbm_List; 
	} 
	/*if(($mm%2) == 0)*/
		$main_menu_List .= "</li><li>";
 }
?>
<!--MAIN NAVIGATION-->
	<!--===================================================-->
	<nav id="mainnav-container">
		<div id="mainnav">
			<!--Menu-->
			<!--================================-->
			<div id="mainnav-menu-wrap">
				<div class="nano">
					<div class="nano-content">
						<ul id="mainnav-menu" class="list-group">
							<li class="list-header">Men&uacute;</li>
							<? echo $main_menu_List; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->