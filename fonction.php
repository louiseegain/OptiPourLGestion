<?php
/////////////////////////////////////////////////////////////////////////////////////////////
//                          FONCTIONS SERVANT AU PROJET MINMAKESPAN DE MIAGE               //
/////////////////////////////////////////////////////////////////////////////////////////////
//  - écrit par : Louise EGAIN & Mathias LORET                                             //
//  - description : fichier contenant toutes les fonctions servant a la réalisation du     //
//                  projet Min Makespan                                                    //
/////////////////////////////////////////////////////////////////////////////////////////////
//  - LSA : permet de calculer le ratio LSA pour un nombre de machine et une liste de      //
//         tâches données en paramètre.                                                    //
//  - LPT : utilise la fonction LSA précédente pour calculer le ratio LPT mais en triant    //
//          la liste des tâches avant de la                                                //
//          passé dans la fonction.                                                     //
//  - RMA : Permet de calculer le ratio RMA pour un nombre de machine et une liste de      //
//         tâches données en paramètre.                                                    //
/////////////////////////////////////////////////////////////////////////////////////////////


/*******************************************************************************************/
/*                                     FONCTION LSA                                        */
/*******************************************************************************************/
/*                                                                                         */
/*  Description : Cette fonction utilise l'alghoritme LSA. Au debut on va créer un tableau */
/*  de la taille du nombre de machines entrée en paramètre. Ensuite pour chacune des       */
/*  tâches contenues dans la liste entrée en paramètre, nous allons chercher quelle machine*/
/*  est libre en première pour y ajouter notre tâche.                                      */
/*  Au fur et à mesure nous calculons la moyenne de la durée des tâches ainsi que la tâche */
/*  la plus longue (en durée).                                                             */
/*  Une fois l'attribution des tâches pour chaque machines terminée, nous calculons le     */
/*  ratio LSA que nous retournons a l'appelleur.                                           */
/*                                                                                         */
/*******************************************************************************************/
/*                                                                                         */
/*  Entrées :   -   nombre de machine (int)                                                */
/*              -   liste de tache (int[])                                                 */
/*  Sortie : ratio LSA                                                                     */
/*                                                                                         */
/*******************************************************************************************/
function LSA (int $nbr_machine, Array $taches){
    //Déclaration des variables
    $tab_machines = array();    //tableau de la taille du nombre de machine 
    $plus_grande_tache = 0;     //pour calculer le ratio à la fin 
    $moyenne_taches = 0;        //pour calculer le ratio à la fin

    //on termine de définit la taille de tab_machines par rapport au nombre de machines passé en paramètre et on créer un tableau a l'interieur
    for($i=0 ; $i< $nbr_machine ;$i++){$tab_machines[$i]= array();}

    //réalisé pour chacune des taches contenues dans le tableau de tâches passées en paramètre
    for($i=0 ; $i<count($taches) ;$i++){
        //déclaration des variables ayant besoin d'etre réinitialisée a chaque exécution de la boucle 
        $max = 0;
        $num_machine = 0;

        //addition de la durée de toutes les tâches pour le calcul de la moyenne à la fin
        $moyenne_taches += $taches[$i];

        //modification de la tâches la plus grande si la taille de la tâches actuelle est plus grande que celle enregistrée 
        if($taches>$plus_grande_tache){
            $plus_grande_tache = $taches[$i];
        }
        
        //récupération de la machine qui sera libre en dernière pour ensuite récupérer celle qui sera libre en premiere
        for($a=0 ; $a < $nbr_machine ;$a++){
            if(count($tab_machines[$a])>$max){
                $max = count($tab_machines[$a]);
                $num_machine = $a;
            }
        }
        $min = $max;
        //machine libre en premiere 
        for($a=0 ; $a< $nbr_machine ;$a++){
            if(count($tab_machines[$a])<$min){
                $min = count($tab_machines[$a]);
                $num_machine = $a;
            }
        }

        //on ajoute n fois un case au tableau ( n représentant la durée de la tâche)
        for($taille_tache = 0; $taille_tache < $taches[$i]; $taille_tache++){
            $tab_machines[$num_machine][$taille_tache+$min] = $taches[$i];
        }
    }

    //calcul de la moyenne puis du ratio
    $moyenne_taches = $moyenne_taches/count($taches);
    $ratio = $max/max($plus_grande_tache,$moyenne_taches);
        
    return $ratio;
}






/*******************************************************************************************/
/*                                     FONCTION LPT                                        */
/*******************************************************************************************/
/*                                                                                         */
/*  Description : Utilisation de la fonction LSA afin de calculer le ratio mais en triant  */
/*  la liste auparavant. LPT utilsant le même algorithme que LSA                           */
/*                                                                                         */
/*******************************************************************************************/
/*                                                                                         */
/*  Entrées :   -   nombre de machine (int)                                                */
/*              -   liste de tache (int[])                                                 */
/*  Sortie : ratio LSA                                                                     */
/*                                                                                         */
/*******************************************************************************************/
    function LPT(int $nbr_machine, Array $taches)
    {
        if ($taches) {
            rsort($taches);
        }
        $ratio = LSA($nbr_machine, $taches);

        return $ratio;
    }





/*******************************************************************************************/
/*                                     FONCTION RMA                                        */
/*******************************************************************************************/
/*                                                                                         */
/*  Description : Pour cette fonction le principe est le même que pour LSA mais            */
/*  les tâches sont attribuées aléatoirement à des machines et non a celle qui a terminée  */
/*  en première.                                                                           */
/*                                                                                         */
/*******************************************************************************************/
/*                                                                                         */
/*  Entrées :   -   nombre de machine (int)                                                */
/*              -   liste de tache (int[])                                                 */
/*  Sortie : ratio LSA                                                                     */
/*                                                                                         */
/*******************************************************************************************/
function RMA($nbr_machine,$taches){
    //Déclaration des variables
    $tab_machines = array();    //tableau de la taille du nombre de machine 
    $plus_grande_tache = 0;     //pour calculer le ratio à la fin 
    $moyenne_taches = 0;        //pour calculer le ratio à la fin
    $max = 0;

    //on termine de définir la taille de tab_machines par rapport au nombre de machines passées en paramètre et on cré un tableau a l'intérieur
    for($i=0 ; $i< $nbr_machine ;$i++){$tab_machines[$i]= array();}
        
    //réalisé pour chacune des taches contenues dans le tableau de tâches passées en paramètre 
    for($i=0 ; $i<count($taches) ;$i++){
        //déclaration des variables ayant besoin d'etre réinitialisée a chaque exécution de la boucle 
        $max = 0;
        $num_machine = 0;
        $num_machine = rand(0,($nbr_machine-1));

        //addition de la durée de toutes les tâches pour le calcul de la moyenne à la fin
        $moyenne_taches += $taches[$i];

        //modification de la tâches la plus grande si la taille de la tâches actuelle est plus grande que celle enregistrée 
        if($taches>$plus_grande_tache){
            $plus_grande_tache = $taches[$i];
        }
        //on ajoute n fois un case au tableau ( n représentant la durée de la tâche)
        for($taille_tache = 0; $taille_tache < $taches[$i]; $taille_tache++){
            $tab_machines[$num_machine][count($tab_machines[$num_machine])]=$taches[$i];
        }
    }
                
    
    
    for($a=0 ; $a< $nbr_machine ;$a++){          
        if ( count($tab_machines[$a]) > $max ){
            $max = count($tab_machines[$a]);
        }
    }
        
    //calcul de la moyenne puis du ratio
    $moyenne_taches = $moyenne_taches/count($taches);
    $ratio = $max/max($plus_grande_tache,$moyenne_taches);
    return $ratio;
                
}
?>