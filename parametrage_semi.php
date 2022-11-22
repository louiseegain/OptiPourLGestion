<form style="position:absolute;top: 25%; border-style:solid; border-radius:10px;  border-color:blue; width:55%;height:500px;left:35%;" method="post" action="resultat_semi.php">
            <table style="position:relative; width:100%; height:60%; ">
                <tr>
                    <th style="border-bottom-color:blue; border-bottom-style:solid; color:blue; font-size:1.5em;" colspan="2">Problème MIN MAKESPAN</th>
                </tr>

                <tr>
                    <td style="text-align:right;">Nombre de machine(s) : </td>
                    <td><input type=number name="nbr_machine" min=2 required="required" step=2 ></td>
                </tr>
                
                <tr>
                    <td style="text-align:right;">Nombre de tâche(s) :</td>
                    <td><input type=number name="nbr_tache" min=1 required="required" ></td>
                </tr>

                <tr>
                    <td style="text-align:right;">Durée minimum :</td>
                    <td><input type=number name="duree_min" min=2 required="required" step=2></td>
                </tr>

                <tr>
                    <td style="text-align:right;">Durée maximum :</td>
                    <td><input type=number name="duree_max" min=2 required="required" step=2></td>
                </tr>

                <tr>
                    <td style="text-align:right;">Nombre d'instances :</td>
                    <td><input type=number min=1 name="nbr_instance" required="required" ></td>
                </tr>
                    
            </table>
            <table style="position:relative; width:80%; left:10%; height:40%; ">
                <tr style="display:flex; justify-content:space-around; ">
                    <td></tdstyle><input type=reset></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>