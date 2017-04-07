<?
include "../header.php";
include "header_map.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 mt20">

            <a id="activmap-reset" class="btn btn-default" href="#"><i class="fa fa-ban"></i> Cancella</a>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                    <input id="activmap-location" type="text" class="form-control" name="location" value="" placeholder="Inserisci luogo">
                </div>
                <p>
                    Distanza da <? echo $agency['agency_city']; ?>:<br>
                    <input type="radio" name="activmap_radius" value="0"> Tutti
                    <input type="radio" name="activmap_radius" value="20"> 20 km
                    <input type="radio" name="activmap_radius" value="50"> 50 km
                    <input type="radio" name="activmap_radius" value="100"> 100 km
                    <input type="radio" name="activmap_radius" value="200"> 200 km
                </p>
            </div>

            <a id="activmap-geolocate" class="btn btn-default" href="#"><i class="fa fa-crosshairs"></i> Localizza</a>

            <!-- Activ'Map categories and tags -->
            <div class="panel-group" id="activmap-accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse-tourism">
                                <i class="fa fa-home" aria-hidden="true"></i> Tipo immobile
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-tourism" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <input type="checkbox" name="marker_type[]" value="residenziale"> Residenziale<br>
                            <input type="checkbox" name="marker_type[]" value="commerciale"> Commerciale<br>
                            <input type="checkbox" name="marker_type[]" value="immobili-di-lusso"> Immobili di Lusso<br>
                            <input type="checkbox" name="marker_type[]" value="nuove-costruzioni"> Nuove Costruzioni<br>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-services">
                                <i class="fa fa-tags" aria-hidden="true"></i> Categoria immobile
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-services" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <input type="checkbox" name="marker_type[]" value="appartamento"> Appartamento<br>
                            <input type="checkbox" name="marker_type[]" value="attico-mansarda"> Attico / Mansarda<br>
                            <input type="checkbox" name="marker_type[]" value="box-garage"> Box / Garage<br>
                            <input type="checkbox" name="marker_type[]" value="casa-indipendente"> Casa indipendente<br>
                            <input type="checkbox" name="marker_type[]" value="loft-open-space"> Loft / Open Space<br>
                            <input type="checkbox" name="marker_type[]" value="palazzo-stabile"> Palazzo / Stabile<br>
                            <input type="checkbox" name="marker_type[]" value="rustico-casale"> Rustico / Casale<br>
                            <input type="checkbox" name="marker_type[]" value="villa"> Villa<br>
                            <input type="checkbox" name="marker_type[]" value="villetta-a-schiera"> Villetta a schiera<br>
                            <input type="checkbox" name="marker_type[]" value="altro"> Altro
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="activmap-wrapper">
                <!-- Places panel (auto removable) -->
                <div id="activmap-places" class="hidden-xs">
                    <div id="activmap-results-num"></div>
                </div>
                <!-- Map wrapper -->
                <div id="activmap-canvas"></div>
            </div>
        </div>
    </div>
</div>
<? include "../footer.php"; ?>
