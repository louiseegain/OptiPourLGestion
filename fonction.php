<?php

    //FONCTION LSA
    function LSA (int $nbr_machine, Array $taches)
    {
        //création du tableau pour le futur graphique
        $mon_tableau = array();
        $plus_grande_tache = 0;
        $moyenne_taches = 0;
        

        for($i=0 ; $i< $nbr_machine ;$i++){$mon_tableau[$i]= array();}

        for($i=0 ; $i<count($taches) ;$i++){
            if($taches>$plus_grande_tache){
                $plus_grande_tache = $taches[$i];
            }

            $moyenne_taches .= $taches[$i];

            $max = 0;
            $num_machine = 0;
            //récupération de la machine qui sera libre en dernière pour ensuite recuperer celle qui sera libre en premiere
            for($a=0 ; $a < $nbr_machine ;$a++){
                if(count($mon_tableau[$a])>$max){
                    $max = count($mon_tableau[$a]);
                    $num_machine = $a;
                }
            }
            $min = $max;
            
            //machine libre en premiere 
            for($a=0 ; $a< $nbr_machine ;$a++){
                if(count($mon_tableau[$a])<$min){
                    $min = count($mon_tableau[$a]);
                    $num_machine = $a;
                }
            }

            for($taille_tache = 0; $taille_tache < $taches[$i]; $taille_tache++){
                $mon_tableau[$num_machine][$taille_tache+$min] = $taches[$i];
            }
        }
        

        /*
//AFFICHAGE DES TABLEAUX EN COULEUR 
echo '<table CELLSPACING="0"><tbody>';
$color1 = rand(0,255);
$color2 = rand(0,255);
$color3 =  rand(0,255);
for($a=0 ; $a< $nbr_machine ;$a++)
{

    echo '<tr>';
    echo '<td>MACHINE '.($a+1).' :</td>';

    $nbr = 0;
    $compteur = 0;
    for($b=0 ; $b< count($mon_tableau[$a]) ;$b++)
    {
        
        if($b!=0)
        {
           if($nbr != $mon_tableau[$a][$b])
           {
                $compteur = 1;
                $nbr = $mon_tableau[$a][$b];
                $color1 = (rand(0,255)+rand(0,255))%255;
                $color2 = rand(0,255)%255;
                $color3 =  rand(0,255)%255;;
                echo '<td style="background-color:rgb('.$color1.','.$color2.','.$color3.'); color:black">'.$mon_tableau[$a][$b].'</td>';
           }
           else
           {
                if($compteur < $nbr)
                {
                    echo '<td style="background-color:rgb('.$color1.','.$color2.','.$color3.');color: rgb('.$color1.','.$color2.','.$color3.')">'.$mon_tableau[$a][$b].'</td>';
                    $compteur ++;
                }
                else
                {
                    $compteur = 0;
                    $color1 = (rand(0,255)+rand(0,255))%255;
                    $color2 = rand(0,255)%255;
                    $color3 =  rand(0,255)%255;
                    echo '<td style="background-color:rgb('.$color1.','.$color2.','.$color3.'); color:black">'.$mon_tableau[$a][$b].'</td>';
                }
            
           }
        }
        else
        {
            $nbr = $mon_tableau[$a][$b];
            echo '<td style="background-color:rgb('.$color1.','.$color2.','.$color3.');color: black">'.$mon_tableau[$a][$b].'</td>';
            $compteur ++;
        }
    }
    echo '</tr>';
}

echo '</tbody></table>';




















*/

       //echo $max."--";
        $result = $max/max($plus_grande_tache,$moyenne_taches);
        //var_dump($result);
        
        return $result;
    }
    

    //FONCTION LPT
    function LPT(int $nbr_machine, Array $taches)
    {
        if ($taches) {
            rsort($taches);
        }
        $valeur = LSA($nbr_machine, $taches);

        return 1;
    }


    //FONCTION RMA
    function RMA($nbr_machine,$taches)
    {
                //création du tableau pour le futur graphique
                $mon_tableau = array();

                for($i=0 ; $i< $nbr_machine ;$i++)
                {
                    $mon_tableau[$i]= array();
                }
        
        
                for($i=0 ; $i<count($taches) ;$i++)
                {
                    $max = 0;
                    $num_machine = 0;
                    $num_machine = rand(0,($nbr_machine-1));
                
                    for($taille_tache = 0; $taille_tache < $taches[$i]; $taille_tache++)
                    {
                        $mon_tableau[$num_machine][count($mon_tableau[$num_machine])]=$taches[$i];
                    }
                }
                
                $max = 0;
    
                for($a=0 ; $a< $nbr_machine ;$a++)
                {
                    
                    if ( count($mon_tableau[$a]) > $max )
                    {
                        $max = count($mon_tableau[$a]);
                    }
                }
        



                
              return 1;
                
        }
?>