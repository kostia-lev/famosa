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
                    <li class="active"> Generatore URL </li>
                </ol>
            </div>
        </div>
        <!-- ?loc= -->
        <?
        $message = "";
        $act = "";
        if($submit) {
            $zone = trim(addslashes($zone));
            if($zone != null && $zone != "") {
                $zone = strtolower(str_replace(" ", "-", $zone));
                $act = "add";
            }else{
                $act = "error";
            }
        }
        ?>
        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            <!-- Basic Data Tables -->
            <!--===================================================-->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Generatore URL</h3>
                </div>
                    <div class="panel-body">
                        <h4 class="col-sm-12 text-left">URL Zona immobili</h4>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <table>
                                <thead>
                                <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                                    <tr>
                                        <td><input type="text" name="zone" class="form-control" id="zone" placeholder="Inserisci zona per generare URL" class="form-control" style="width:250px;"></td>
                                        <td colspan="2">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Genera" style="margin: 10px 0 0 8px; height: 34px;">
                                        </td>
                                    </tr>
                                </form>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <?php if($act == "error") {
                                $message = "<font color='red'><b>Errore, non hai inserito nessun valore!</b></font>";
                                echo $message;
                            }else if($act == "add"){ ?>
                                <a href="<?php echo $siteurl . "/property-list.php?loc=" .  $zone; ?>" target="_blank"><?php echo $siteurl . "/property-list.php?loc=" .  $zone; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?
                $message = "";
                $act = "";
                if($submit3) {
                    $propfor = trim(addslashes($propfor));
                    if($propfor != null && $propfor != "") {
                        $propfor = strtolower(str_replace(" ", "-", $propfor));
                        $act = "add";
                    }else{
                        $act = "error";
                    }
                }
                ?>
                <div class="panel-body">
                    <h4 class="col-sm-12 text-left">URL Contratto immobili</h4>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <table>
                            <thead>
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                                <tr>
                                    <td><select name="propfor" class="form-control banner-group-brdr" style="width: 250px;">
                                            <option value="">Contratto immobile</option>
                                            <option value="vendita">Vendita</option>
                                            <option value="affitto">Affitto</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="submit" name="submit3" class="btn btn-primary" value="Genera" style="margin: 10px 0 0 8px; height: 34px;">
                                    </td>
                                </tr>
                            </form>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <?php if($act == "error") {
                            $message = "<font color='red'><b>Errore, non hai inserito nessun valore!</b></font>";
                            echo $message;
                        }else if($act == "add"){ ?>
                            <a href="<?php echo $siteurl . "/property-list.php?pfor=" .  $propfor; ?>" target="_blank"><?php echo $siteurl . "/property-list.php?pfor=" .  $propfor; ?></a>
                        <?php } ?>
                    </div>
                </div>

                <!-- Type + ?loc= -->
                <?
                $message = "";
                $act = "";
                if($submit1) {
                    $zonetype = trim(addslashes($zonetype));
                    $types = trim(addslashes($types));
                    if($zonetype != null && $zonetype != "" && $types != "") {
                        $zonetype = strtolower(str_replace(" ", "-", $zonetype));
                        $act = "add";
                    }else{
                        $act = "error";
                    }
                }
                ?>
                <!--Page content-->
                <!--===================================================-->
                <div class="panel-body">
                    <h4 class="col-sm-12 text-left">URL Tipo + Zona immobili</h4>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <table>
                            <thead>
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                                <tr>
                                    <td><input type="text" name="zonetype" class="form-control" id="zone" placeholder="Inserisci zona per generare URL" class="form-control" style="width:250px;"></td>
                                    <td><select name="types" class="form-control banner-group-brdr" style="width: 200px;">
                                            <option value="">Tipo immobile</option>
                                            <option value="residenziale">Residenziale</option>
                                            <option value="commerciale">Commerciale</option>
                                            <option value="immobili-di-lusso">Immobili di lusso</option>
                                            <option value="nuove-costruzioni">Nuove costruzioni</option>
                                            <option value="asta">Immobili all'asta</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="submit" name="submit1" class="btn btn-primary" value="Genera" style="margin: 10px 0 0 8px; height: 34px;">
                                    </td>
                                </tr>
                            </form>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <?php if($act == "error") {
                            $message = "<font color='red'><b>Errore, non hai inserito tutti i valori!</b></font>";
                            echo $message;
                        }else if($act == "add"){ ?>
                            <a href="<?php echo $siteurl . "/property-list.php?types=" . $types . "&loc=" .  $zonetype; ?>" target="_blank"><?php echo $siteurl . "/property-list.php?types=" . $types . "&loc=" .  $zonetype; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Category + ?loc= -->
                <?
                $message = "";
                $act = "";
                if($submit2) {
                    $zonecat = trim(addslashes($zonecat));
                    $category = trim(addslashes($category));
                    if($zonecat != null && $zonecat != "" && $category != "") {
                        $zonecat = strtolower(str_replace(" ", "-", $zonecat));
                        $act = "add";
                    }else{
                        $act = "error";
                    }
                }
                ?>
                <!--Page content-->
                <!--===================================================-->
                <div class="panel-body">
                    <h4 class="col-sm-12 text-left">URL Categoria + Zona immobili</h4>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <table>
                            <thead>
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                                <tr>
                                    <td><input type="text" name="zonecat" class="form-control" id="zone" placeholder="Inserisci zona per generare URL" class="form-control" style="width:250px;"></td>
                                    <td><select name="category" class="form-control banner-group-brdr" style="width: 200px;">
                                            <option value="">Categoria immobile</option>
                                            <option value="appartamento">Appartamento</option>
                                            <option value="attico-mansarda">Attico / Mansarda</option>
                                            <option value="box-garage">Box / Garage</option>
                                            <option value="casa-indipendente">Casa indipendente</option>
                                            <option value="loft-open-space">Loft / Open Space</option>
                                            <option value="palazzo-stabile">Palazzo / Stabile</option>
                                            <option value="rustico-casale">Rustico / Casale</option>
                                            <option value="villa">Villa</option>
                                            <option value="villetta-a-schiera">Villetta a schiera</option>
                                            <option value="terreno">Terreno</option>
                                            <option value="altro">Altro</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="submit" name="submit2" class="btn btn-primary" value="Genera" style="margin: 10px 0 0 8px; height: 34px;">
                                    </td>
                                </tr>
                            </form>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <?php if($act == "error") {
                            $message = "<font color='red'><b>Errore, non hai inserito tutti i valori!</b></font>";
                            echo $message;
                        }else if($act == "add"){ ?>
                            <a href="<?php echo $siteurl . "/property-list.php?cat=" . $category . "&loc=" .  $zonecat; ?>" target="_blank"><?php echo $siteurl . "/property-list.php?cat=" . $category . "&loc=" .  $zonecat; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Types -->
                <?
                $Message = isSet($Message) ? $Message : '' ;

                $GetTypes=$db->get_all("select * from types");
                if(count($GetTypes)==0)
                    $Message="Nessun tipo di immobile trovato!";
                $disp = "";
                for($i = 0 ; $i < count($GetTypes) ; $i++) {
                    $idvalue = $GetTypes[$i]['id'] ;
                    $types=$GetTypes[$i]['type_name'];

                    $slno = $i + 1 ;
                    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>";
                    $disp .= str_replace("-", " ", $types);
                    $disp .="</td>
				<td  align='left'><a href='$siteurl/type/$types' target='_blank'>$siteurl/type/$types</a></td>
			</tr>";
                }
                ?>
                <div class="panel-body">
                    <h4 class="col-sm-12 text-left">URL user-friendly Tipi immobili</h4>
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo immobile</th>
                            <th>URL</th>
                        </tr>
                        </thead>
                        <tbody><?echo $disp; ?></tbody>
                    </table>
                </div>
                <!-- Categories -->
                <?
                $Message = isSet($Message) ? $Message : '' ;

                $GetCategory=$db->get_all("select * from category");
                if(count($GetCategory)==0)
                    $Message="Nessun tipo di immobile trovato!";
                $disp = "";
                for($i = 0 ; $i < count($GetCategory) ; $i++) {
                    $idvalue = $GetCategory[$i]['id'] ;
                    $category=$GetCategory[$i]['cat_name'];

                    $slno = $i + 1 ;
                    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>";
                    $disp .= str_replace("-", " ", $category);
                    $disp .="</td>
				<td  align='left'><a href='$siteurl/category/$category' target='_blank'>$siteurl/category/$category</a></td>
			</tr>";
                }
                ?>
                <div class="panel-body">
                    <h4 class="col-sm-12 text-left">URL user-friendly Categorie immobili</h4>
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria immobile</th>
                            <th>URL</th>
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
