<? $agency = $GLOBALS['GetSite'];//$db->singlerec("select * from general_setting where id='1'"); ?>

<!-- Google Maps API V3 -->
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=<? echo $agency['google_api']; ?>"></script>

<!-- Activ'Map plugin -->
<link rel="stylesheet" href="jquery-activmap/css/jquery-activmap.css">
<script src="jquery-activmap/js/jquery-activmap.js"></script>
<script src="jquery-activmap/js/markercluster.min.js"></script>

<?php

//$agency = $db->singlerec("select * from general_setting where id='1'");

$que = "select * from listings where post_sts=1";
$result = $db->get_all($que);

$prop = "";
$i = 0;

?>

<script>
    $(function () {
        //Activ'Map plugin init
        $('#activmap-wrapper').activmap({
            places: [
                <?php
                foreach ($result as $row) {
                    $im = $db->singlerec("select * from listing_images where pid='" . $row['id'] . "'");
                    $prop .= "{title: '" . $row['prop_title'] . "',";
                    if ($row['address'] != "" && $row['address'] != null) {
                        $prop .= "address: '" . $row['address'] . "',";
                    } else {
                        $prop .= "address: '" . $row['location'] . "',";
                    }
                    $prop .= "url: '" . $siteurl . "/listing/" . $row['randuniq'] . "/" . $row['slug'] . "', tags: ['" . $row['types'] . "', '" . $row['category'] . "'], lat: " . $row['lat'] . ", lng: " . $row['lng'] . ", img: '" . $siteurl . "/images/prop/230_144/" . $im['image'] . "', icon: 'images/icons/marker-remax.png'}";
                    $i++;
                    if ($i < count($result)) {
                        $prop .= ",";
                    }
                }
                echo $prop;
                ?>
            ],
            lat: <?php echo $agency['lat']; ?>,
            lng: <?php echo $agency['lng']; ?>,
            icon: 'jquery-activmap/img/marker.png',
            posPanel: 'left',
            showPanel: true,
            radius: 0,
            cluster: true,
            country: 'it',
            mapType: 'roadmap',
            request: 'large',
            locationTypes: ['geocode', 'establishment']
        });
    });
</script>
