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


            $moyenne_taches += $taches[$i];


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

        $moyenne_taches = $moyenne_taches/count($taches);
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

        return $valeur;
    }


    //FONCTION RMA
    function RMA($nbr_machine,$taches)
    {
                //création du tableau pour le futur graphique
                $mon_tableau = array();
                $moyenne_taches = 0;
                $plus_grande_tache = 0;
                for($i=0 ; $i< $nbr_machine ;$i++)
                {
                    $mon_tableau[$i]= array();
                }
        
        
                for($i=0 ; $i<count($taches) ;$i++)
                {
                    $max = 0;
                    $num_machine = 0;
                    $num_machine = rand(0,($nbr_machine-1));

                    $moyenne_taches += $taches[$i];

                    if($taches>$plus_grande_tache){
                        $plus_grande_tache = $taches[$i];
                    }
                
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
        
                $moyenne_taches = $moyenne_taches/count($taches);
                $result = $max/max($plus_grande_tache,$moyenne_taches);

              return $result;
                
        }
?>