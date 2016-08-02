<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 23/01/2016 13:25
 * LSyS - utility.php
 */
include('base.php');
$value = $connect->exe(array('QUERY'=>'SELECT * FROM permissions_cms'), 'all', true);

foreach($value as $valore){
    if($valore['id'] != '') {
        echo $valore['id'] . ' - ' . $valore['rank_tool'] . '<br>';
    }
}

# pagina staff: 127 ms

