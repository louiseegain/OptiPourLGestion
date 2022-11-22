<?php
include_once 'fonction.php';

if( $_POST['duree_max'] < $_POST['duree_min'] ){
    //redirection 
    echo'<html><head><meta http-equiv="Refresh" content="2; url=parametrage_min.php" /></head>ERREUR: La durée maximum d\'une tache est inferieur a la durée minimum !!!</html>';
}
$ratio_LSA =0;
$ratio_LPT = 0;
$ratio_RMA = 0;
//$_POST['nbr_instance']
for($i=0; $i < 1; $i++){
    
    $mestaches = array();    
    for($a=0; $a<$_POST['nbr_tache'];$a++)
    {
        $mestaches[$a] = rand($_POST['duree_min'],$_POST['duree_max']);
    }
    $ratio_LSA .= LSA($_POST['nbr_machine'],$mestaches);
    $ratio_LPT .= LPT($_POST['nbr_machine'],$mestaches);
    $ratio_RMA .= RMA($_POST['nbr_machine'],$mestaches);
}

$ratio_LSA .= $ratio_LSA/$_POST['nbr_instance'];
$ratio_LPT .= $ratio_LPT/$_POST['nbr_instance'];
$ratio_RMA .= $ratio_RMA/$_POST['nbr_instance'];





echo'
<style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>



<table>

<tr>
    <td>k</td>
    <td>m</td>
    <td>n</td>
    <td>dmin</td>
    <td>dmax</td>
    <td>ratio moyen LSA</td>
    <td>ratio moyen LPT</td>
    <td>ratio moyen RMA</td>
<tr>

<tr>
    <td>'.$_POST['nbr_instance'].'</td>
    <td>'.$_POST['nbr_machine'].'</td>
    <td>'.$_POST['nbr_tache'].'</td>
    <td>'.$_POST['duree_min'].'</td>
    <td>'.$_POST['duree_max'].'</td>
    <td>'.$ratio_LSA.'</td>
    <td>'.$ratio_LPT.'</td>
    <td>'.$ratio_RMA.'</td>
<tr>

</table>


';


?>