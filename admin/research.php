<? include "header.php"; ?>
<!--===================================================-->
<!--END NAVBAR-->
<div class="boxed">
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
        <? include "header_nav.php"; ?>
        <div class="pageheader">
            <h3><i class="fa fa-home"></i> Adwords </h3>
            <div class="breadcrumb-wrapper">
                <span class="label">Percorso:</span>
                <ol class="breadcrumb">
                    <li> <a href="welcome"> Home </a> </li>
                    <li class="active"> Ricerche sul sito </li>
                </ol>
            </div>
        </div>
<?
$Message = isSet($Message) ? $Message : '' ;

$GetResearch=$db->get_all("select * from research order by id desc");
if(count($GetResearch)==0)
    $Message="Nessuna ricerca trovata!";
$disp = "";
for($i = 0 ; $i < count($GetResearch) ; $i++) {
    $idvalue = $GetResearch[$i]['id'] ;
    $category=$GetResearch[$i]['category'];
    $location=$GetResearch[$i]['location'];
    $pfor=$GetResearch[$i]['pfor'];
    $tbudmin=$GetResearch[$i]['tbudmin'];
    $tbudmax=$GetResearch[$i]['tbudmax'];

    if($category == null){
        $category = "Non specificato";
    }
    if($location == null){
        $location = "Non specificato";
    }
    if($pfor == null){
        $pfor = "Non specificato";
    }
    if($tbudmin != 0){
        $tbudmin=number_format($tbudmin , 0, ',', '.');
    } else{
        $tbudmin = "Non specificato";
    }
    if($tbudmax != 0){
        $tbudmax=number_format($tbudmax , 0, ',', '.');
    }else{
        $tbudmax = "Non specificato";
    }

    $form=$GetResearch[$i]['form'];
    if($form == "quicksrch1"){
        $form = "Homepage";
    }
    else if($form == "advsrch"){
        $form = "Sidebar";
    }

    $slno = $i + 1 ;
    $disp .="<tr>
			 <td>$idvalue</td>
	         <td  align='left'>";
    $disp .= str_replace("-", " ", $category);
    $disp .="</td>
	<td  align='left'>$location</td>
	<td  align='left'>$pfor</td>
	<td  align='left'>&euro; $tbudmin</td>
	<td  align='left'>&euro; $tbudmax</td>
	<td  align='left'>$form</td>
	</tr>";
}
?>
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Ricerche degli utenti sul sito</h3>
                </div>
                <div class="panel-body">
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Localit&aacute;</th>
                            <th>Immobile in</th>
                            <th>Prezzo min.</th>
                            <th>Prezzo max.</th>
                            <th>Form</th>
                        </tr>
                        </thead>
                        <tbody><?echo $disp; ?></tbody>
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
<? include "footer.php"; ?>