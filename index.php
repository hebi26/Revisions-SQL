<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Exo SQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include('conec.php'); ?>

<div class="container">
    <div class="container">
        <div class="jumbotron">
            <h1>Révisions SQL</h1>
            <h2>Consignes pour réaliser les exercices</h2>
            <p>* Créer un fichier index.php et un fichier connexion php contenant une fonction GetResult effectuant une requète SELECT prenant en paramètre une variable $result </p>
            <p>* Pour chaque question, il s'agit de trouver la requête SQL permettant d'afficher le résultat énoncé.</p>
            <p>* Pour chaque question, créer une variable “$result” dans laquelle vous stockerez votre
                requête afin d'executer la fonction GetResult </p>
        </div>
        <hr>
        <h2 class="title"><b>1 - Sélection de données</b></h2>
        <hr>
        <ul class="list-group">
            <!-- ====================================================================================== -->
            <li class="list-group-item"><b>1 -</b> Toute la table etudiants.</li>
            <table>
                <th>ID</th><th>NOM</th><th>DATE</th><th>SEXE</th>

                <?php $reponse=getResult("SELECT * FROM etudiants");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->num_etu); ?></td><td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->date_naiss); ?></td><td><?php echo($data->sexe); ?></td>
                    </tr>

            <?php
                }
            ?>
        </table>
            <!-- ====================================================================================== -->
            <li class="list-group-item"><b>2 -</b> Nom, numéro et date de naissance des étudiants.</li>

            <table>
                <th>NOM</th><th>DATE</th><th>SEXE</th>

                <?php $reponse=getResult("SELECT * FROM etudiants");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->date_naiss); ?></td><td><?php echo($data->sexe); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>

            <!-- ====================================================================================== -->
            <li class="list-group-item"><b>3 -</b> Liste des étudiantes.</li>
            <table>
                <th>NOM</th><th>DATE</th><th>SEXE</th>

                <?php $reponse=getResult("SELECT * FROM etudiants WHERE sexe='F' ");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->date_naiss); ?></td><td><?php echo($data->sexe); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->
            <li class="list-group-item"><b>4 -</b> Liste des enseignants par ordre alphabétique des noms.</li>

            <table>
                <th>NOM</th>

                <?php $reponse=getResult("SELECT * FROM enseignants ORDER BY nom_ens");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_ens); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->
            <li class="list-group-item"><b>5 -</b> Liste des enseignants par grade et par ordre alphabétique décroissant des noms.</li>
            <table>
                <th>ID</th><th>NOM</th><th>GRADE</th><th>ANCIENNETE</th>

                <?php $reponse=getResult("SELECT * FROM enseignants ORDER BY grade, nom_ens DESC ");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->num_ens); ?></td><td><?php echo($data->nom_ens); ?></td>
                        <td><?php echo($data->grade); ?></td><td><?php echo($data->anciennete); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>6 -</b> Nom, grade et ancienneté des enseignants qui ont strictement plus de 2 ans d'ancienneté.</li>
            <table>
              <th>NOM</th><th>GRADE</th><th>ANCIENNETE</th>

                <?php $reponse=getResult("SELECT * FROM enseignants WHERE anciennete > 2");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_ens); ?></td>
                        <td><?php echo($data->grade); ?></td><td><?php echo($data->anciennete); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>7 -</b> Nom, grade et ancienneté des maîtres de conférences(MCF) qui ont 3 ans d'ancienneté ou plus.</li>
            <table>
                <th>NOM</th><th>GRADE</th><th>ANCIENNETE</th>

                <?php $reponse=getResult("SELECT * FROM enseignants WHERE grade='MCF' AND anciennete >= 3");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_ens); ?></td>
                        <td><?php echo($data->grade); ?></td><td><?php echo($data->anciennete); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>8 -</b> Nom et date de naissance des étudiants masculins nés après 1990.</li>
            <table>
                <th>NOM</th><th>DATE</th>

                <?php $reponse=getResult("SELECT * FROM etudiants WHERE sexe='M' AND date_naiss > 1990");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->date_naiss); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>9 -</b> Lignes de la table notes correspondant à une note inconnue.</li>
            <table>
                <th>ID ETUDIANT</th><th>ID MATIERE</th><th>NOTE</th>

                <?php $reponse=getResult("SELECT * FROM notes WHERE note IS NULL");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->_num_etu); ?></td>
                        <td><?php echo($data->_num_mat); ?></td>
                        <td><?php echo 'NULL'; ?></td>

                    </tr>

                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>10 -</b> Nom des enseignants professeurs(PR) ou associés(ASS), en utilisant l'opérateur IN.</li>
            <table>
                <th>NOM</th>

                <?php $reponse=getResult("SELECT * FROM enseignants WHERE grade IN ('PR', 'ASS')");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_ens); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>11 -</b> Nom des enseignants dont le nom ou le prénom contiennent un J.</li>
            <table>
                <th>NOM</th>

                <?php $reponse=getResult("SELECT * FROM enseignants WHERE nom_ens LIKE '%J%'");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_ens); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>12 -</b> Nom et date de naissance des étudiants nés en 1990.</li>
            <table>
                <th>NOM</th><th>DATE</th>

                <?php $reponse=getResult("SELECT * FROM etudiants WHERE YEAR(date_naiss) = 1990");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->date_naiss); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>13 -</b> Nom et âge (en années) des étudiants de 23 ans ou plus.</li>
            <table>
                <th>NOM</th><th>AGE</th>

                <?php $reponse=getResult("SELECT nom_etu, YEAR(date_naiss) AS annee FROM etudiants 
                                                WHERE (YEAR(CURRENT_DATE) - YEAR(date_naiss)) >= 23");
                foreach($reponse as $data){

                    $age = date("Y") - ($data->annee);
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($age); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
        </ul>
        <hr>
        <h2 class="title" ><b>2 - Jointures</b></h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><b>1 -</b> Notes obtenues par l'étudiant Dupont, Charles.</li>
            <table>
                <th>NOM</th><th>NOTES</th>

                <?php $reponse=getResult("SELECT note, nom_etu FROM notes 
                                                INNER JOIN etudiants 
                                                ON _num_etu = num_etu 
                                                WHERE num_etu = 1");
                foreach($reponse as $data){
                    ?>
                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->note); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>2 -</b> Note obtenue par l'étudiant Dupont, Charles en G.P.A.O.</li>
            <table>
                <th>NOM</th><th>NOTES</th>

                <?php $reponse=getResult("SELECT note, nom_etu, nom_mat FROM notes
                                                INNER JOIN etudiants 
                                                ON _num_etu = num_etu 
                                                INNER JOIN  matieres 
                                                ON _num_mat = num_mat 
                                                WHERE num_etu = 1 AND num_mat = 3");
                foreach($reponse as $data){
                    ?>
                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->nom_mat); ?></td>
                        <td><?php echo($data->note); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>3 -</b> Nom et date de naissance des étudiants plus jeunes(en années) que l'étudiant Dupont, Charles.</li>
            <table>
                <th>NOM</th><th>DATE</th>

                <?php $reponse=getResult("SELECT nom_etu, date_naiss FROM etudiants 
                                                WHERE (YEAR(date_naiss) > 
                                                (SELECT YEAR(date_naiss) FROM etudiants WHERE num_etu = 1))");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->date_naiss); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->

            <li class="list-group-item"><b>4 -</b> Nom des étudiants ayant eu la moyenne dans une des matières enseignées par Simon, Etienne.</li>
            <table>
                <th>NOM</th><th>DATE</th>

                <?php $reponse=getResult("SELECT nom_etu, note FROM etudiants
                                                INNER JOIN notes
                                                ON num_etu = _num_etu
                                                INNER JOIN matieres
                                                ON _num_mat = num_mat
                                                INNER JOIN enseignants
                                                ON _num_ens = num_ens
                                                WHERE _num_ens = 15 AND note >= 10");

                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->note); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- ====================================================================================== -->
            <li class="list-group-item"><b>5 -</b> Nom des étudiants qui ont eu une note dans en "Logique" inférieure à celle de "Statistiues".</li>
            <table>
                <th>NOM</th><th>ID</th>

                <?php $reponse=getResult("SELECT nom_etu, n1._num_etu FROM notes n1, notes n2
                                                INNER JOIN etudiants
                                                ON _num_etu = num_etu
                                                WHERE n1._num_etu = n2._num_etu
                                                AND n1._num_mat = 4
                                                AND n2._num_mat = 5
                                                AND n1.note < n2.note");

                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->_num_etu); ?></td>


                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>6 -</b> Nom des étudiants ayant eu une plus mauvaise note en Programmation qu'en Bases de données.</li>
            <table>
                <th>NOM</th><th>ID</th>

                <?php $reponse=getResult("SELECT nom_etu, n1._num_etu FROM notes n1, notes n2
                                                INNER JOIN etudiants
                                                ON _num_etu = num_etu
                                                WHERE n1._num_etu = n2._num_etu
                                                AND n1._num_mat = 1
                                                AND n2._num_mat = 2
                                                AND n1.note < n2.note");

                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->_num_etu); ?></td>


                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>7 -</b> Nom et numéro des étudiants n'ayant eu aucune note.</li>
            <table>
                <th>ID ETUDIANT</th><th>ID MATIERE</th><th>NOTE</th>

                <?php $reponse=getResult("SELECT nom_etu, num_etu FROM etudiants
                                                INNER JOIN notes
                                                ON num_etu = _num_etu
                                                WHERE note IS NULL");
                foreach($reponse as $data){
                    ?>

                    <tr>
                        <td><?php echo($data->num_etu); ?></td>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo 'NULL'; ?></td>

                    </tr>

                    <?php
                }
                ?>
            </table>


        </ul>
        <hr>
        <h2 class="title" ><b>3 - Regroupements</b></h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><b>1 -</b> Grades différents existant dans la table des enseignants.</li>
            <table>
                <th>GRADE</th>

                <?php $reponse=getResult("SELECT grade FROM enseignants GROUP BY grade");
                foreach($reponse as $data){
                    ?>
                    <tr>
                        <td><?php echo($data->grade); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>2 -</b> Par sexe, afficher les différents âges (en années) représentés parmi les étudiants.</li>
            <table>
                <th>SEXE</th><th>AGE</th>

                <?php $reponse=getResult("SELECT sexe, YEAR(date_naiss) AS annee FROM etudiants GROUP BY annee, sexe ORDER BY sexe");
                foreach($reponse as $data){

                    $age = date("Y") - ($data->annee);
                    ?>

                    <tr>
                        <td><?php echo($data->sexe); ?></td>
                        <td><?php echo($age); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>3 -</b> Nombre total d'étudiants.</li>
            <table>
                <th>NB ETUDIANTS</th>

                <?php $reponse=getResult("SELECT COUNT(nom_etu) AS NBETU FROM etudiants");
                foreach($reponse as $data){
                ?>
                    <tr>
                        <td><?php echo($data->NBETU); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>4 -</b> Date de naissance de l'étudiant le plus jeune et de celui le plus âgé.</li>
            <table>
                <th>DATE</th>

                <?php $reponse=getResult("SELECT MIN(date_naiss) AS mindate, MAX(date_naiss) AS maxdate FROM etudiants");
                foreach($reponse as $data){
                    ?>
                    <tr>
                        <td><?php echo($data->mindate); ?></td>
                        <td><?php echo($data->maxdate); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>5 -</b> Pour chaque matière identifiée par son numéro, nombre d'étudiants qui ont une note.</li>
            <table>
                <th>MATIERE</th><th>NB NOTE</th>

                <?php $reponse=getResult("SELECT nom_mat, COUNT(note) AS notemat FROM notes
                                                INNER JOIN matieres
                                                ON _num_mat = num_mat
                                                WHERE note IS NOT NULL GROUP BY nom_mat");
                foreach($reponse as $data){
                    ?>
                    <tr>
                        <td><?php echo($data->nom_mat); ?></td>
                        <td><?php echo($data->notemat); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>6 -</b> Pour chaque étudiant identifié par son numéro, moyenne obtenue (avec 2 décimales).</li>
            <table>
                <th>ID</th><th>NOM</th><th>MOYENNE</th>

                <?php $reponse=getResult("SELECT num_etu, nom_etu, AVG(note) AS avgnote FROM etudiants
                                                INNER JOIN notes
                                                ON num_etu = _num_etu
                                                GROUP BY nom_etu");
                foreach($reponse as $data){
                    $ravgnote=round(($data->avgnote), 2);
                    ?>
                    <tr>
                        <td><?php echo($data->num_etu); ?></td>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($ravgnote); ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <li class="list-group-item"><b>7 -</b> Numéro des étudiants n'ayant eu que 4 notes ou moins.</li>
            <table>
                <th>NOM</th><th>NUM</th>

                <?php $reponse=getResult("SELECT nom_etu, num_etu, COUNT(note) FROM etudiants
                                                INNER JOIN notes
                                                ON num_etu = _num_etu
                                                GROUP BY num_etu
                                                HAVING COUNT(note) <= 4");
                foreach($reponse as $data){
                    ?>
                    <tr>
                        <td><?php echo($data->nom_etu); ?></td>
                        <td><?php echo($data->num_etu); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </ul>
        <hr>
        <h2 class="title" ><b>BONUS</b></h2>
                <div class="jumbotron">
            <h2><b>Le Frih deh Bi De Uh</b></h2>
            <p><a href="https://www.youtube.com/watch?v=D4w4dNy01ZM" target="_blank">Mais qu'est-ce que c'est !?</a></p>

            <ul class="list-group">
                <li class="list-group-item"><b>1 -</b> Noms des matières (et de leur enseignant) pour lesquelles la moyenne (non coefficientée) des notes est inférieure à 10.</li>
                <table>
                    <th>MATIERE</th><th>NOM</th><th>MOYENNE</th>

                    <?php $reponse=getResult("SELECT nom_mat, nom_ens, AVG(note) AS avgnote FROM matieres
                                                INNER JOIN notes
                                                ON num_mat = _num_mat
                                                INNER JOIN enseignants
                                                ON _num_ens = num_ens
                                                GROUP BY nom_mat
                                                HAVING AVG(note) < 10");
                    foreach($reponse as $data){
                        $ravgnote=round(($data->avgnote), 2);
                        ?>
                        <tr>
                            <td><?php echo($data->nom_mat); ?></td>
                            <td><?php echo($data->nom_ens); ?></td>
                            <td><?php echo($ravgnote); ?></td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <li class="list-group-item"><b>2 -</b> Pour chaque étudiant ayant eu une note dans chacune des 5 matières, le nom (par ordre alphabétique), le numéro et la moyenne coefficientée obtenue.</li>

                <li class="list-group-item"><b>3 -</b> Nom des enseignants ayant le même grade que Bertrand, Pierre.</li>
                <table>
                    <th>NOM</th><th>GRADE</th>

                    <?php $reponse=getResult("SELECT nom_ens, grade FROM enseignants
                                                    WHERE grade = 
                                                    (SELECT grade FROM enseignants
                                                    WHERE nom_ens = 'Bertrand, Pierre')");

                    foreach($reponse as $data){
                        ?>
                        <tr>
                            <td><?php echo($data->nom_ens); ?></td>
                            <td><?php echo($data->grade); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <li class="list-group-item"><b>4 -</b> Pour chaque étudiant, nom et nombre d'étudiants se trouvant avant lui sur la liste alphabétique des noms.</li>
            </ul>
        </div>
    </div>

</div>

</body>
</html>