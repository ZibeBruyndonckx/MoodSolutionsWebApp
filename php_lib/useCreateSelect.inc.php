<?php
$_query = createSelect("xxx",
array($_naam, $_voornaam, $_straat, $_nr, $_xtr, $_postcode, // change to current fittings
$_gemeenteNaam, $_telefoon, $_mob,  $_mail, $_gender, $_soort),
array('d_naam', 'd_voornaam', 'd_straat','d_nr','d_xtr', 'd_Postnummer',
'd_GemeenteNaam', 'd_tel','d_mob', 'd_mail', 'd_gender', 'd_soortlid'));
?>