<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    <h1 style="text-align: center;">
            Gioco del numbero più alto
        </h1>
        <?php
            session_start();
            if(!isset($_POST["numero"])){
            $_SESSION["Nome"]= $_POST["Nome"];
            $_SESSION["turno"]= 0;
            $_SESSION["vittorie"]= 0;
            $_SESSION["sconfitte"]=0;
            $numero = rand(1, 9);
            echo "<p style='text-align: center;'>Nome: $_SESSION[Nome]</p>";
            echo'   
                    <form method="POST" action="gioco.php">
                    <label style="text-align: center;" for="Nome">scegli quanto vuoi giocare:</label>
                    <select name="numero">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <button type="submit">Gioca</button>
                </form>';
            }else{
                $numero = rand(1, 9);
                $_SESSION["turno"]++;
                if($_POST["numero"] == $numero|| $_POST["numero"] == $numero+1){
                    $_SESSION["vittorie"]++;
                    echo'<p style="text-align: center;">Hai vinto questo turno</p>';
                    
                }else{
                    $_SESSION["sconfitte"]++;
                    echo'<p style="text-align: center;">Hai perso questo turno</p>';
                }
                echo "
                <p style='text-align: center;'>Turno: $_SESSION[turno]</p>
                <p style='text-align: center;'>Valore giocato: $_POST[numero]</p>
                <p style='text-align: center;'>Valore computer: $numero</p>
                <p style='text-align: center;'>Vittorie: $_SESSION[vittorie]</p>
                ";
                if($_SESSION["vittorie"] == 3){
                    echo '<h5 style="text-align: center;">Hai vinto la partita</h5>';
                }else if($_SESSION["sconfitte"] == 3){
                    echo '<h5 style="text-align: center;">Hai perso la partita</h5>
                    <a href="index.php">Rigioca</a>
                    ';
                    session_destroy();
                }else{
                    echo'
                    <form method="POST" action="gioco.php">
                    <label for="Nome">Nome:</label>
                    <select name="numero">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <button type="submit">Gioca</button>
                </form>';
                }
            }
            ?>
        
    
    </body>
</html>