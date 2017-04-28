<?
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    exit('Accesso non consentito');
}
$agency = $GLOBALS['GetSite'];//$db->singlerec("select * from general_setting where id='1'");

?>
<script type="text/javascript">
    var autocomplete;

    function initAutocomplete() {

        var autocompleteEl = document.getElementById('autocomplete');
        if(autocompleteEl)
            autocomplete = new google.maps.places.Autocomplete(
                (autocompleteEl),
                {
                    types: ['(cities)'],
                    componentRestrictions: {country: "it"}
                });

        autocompleteAddr = new google.maps.places.Autocomplete(document.getElementById('addr'), {
            types: ['geocode'],
            componentRestrictions: {country: "it"}
        });
        google.maps.event.addListener(autocompleteAddr, 'place_changed', function () {
            fillInAddress();
        });
    }</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<? echo $agency['google_api']; ?>&libraries=places&callback=initAutocomplete"
        async defer></script>