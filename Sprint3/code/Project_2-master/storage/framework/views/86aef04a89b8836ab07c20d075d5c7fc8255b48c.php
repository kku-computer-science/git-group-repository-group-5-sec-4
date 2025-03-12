<?php 
$k = $key;
$bb->Select(array('key' => $k ));
$bb->SetBibliographyStyle('natbib');
$bb->PrintBibliographySelectedOnly();
?>
<?php /**PATH /var/www/html/resources/views/test.blade.php ENDPATH**/ ?>