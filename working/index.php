<?php
if (file_exists('sample.xml')) {
    $xml = simplexml_load_file('sample.xml');

    echo $xml->movie[0]->plot;

} else {
    exit('Failed to open sample.xml');
}
?>
