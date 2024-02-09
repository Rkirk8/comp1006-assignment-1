        <!--Global header-->
        <?php
            $title = 'Saving Player Saved';
            include('Shared/header.php');

            // capture form inputs into vars
            $playerName = $_POST['playerName'];
            $playerAge = $_POST['playerAge'];
            $playerPosition = $_POST['playerPosition'];

            // connect to db
            include ('Shared/database.php');
                // check to see if player is already in the db
                $sql = "SELECT * FROM players WHERE playerName = :playerName";
                $stat = $db->prepare($sql);
                $stat->execute(array(':playerName' => $playerName));
                $data = $stat->fetch();
                // if player is in the db, show error
                if($data){
                    echo 'The player is already in the database';
                } else {
                    // SQL INSERT command and map each input to a column in the players table with stat (PDOStatement)
                    $sql = "INSERT INTO players (playerName, playerAge, Position) VALUES (:playerName, :playerAge, :playerPosition)";
                    $stat = $db->prepare($sql);
                    
                    // if player is not in the db, add them
                    $stat->bindParam(':playerName', $playerName, PDO::PARAM_STR, 100);
                    $stat->bindParam(':playerAge', $playerAge, PDO::PARAM_INT);
                    $stat->bindParam(':playerPosition', $playerPosition, PDO::PARAM_STR, 10);
                    // eacute (save to the db)
                    $stat->execute();
                    // show msg to user
                    echo 'The player has been saved';  
                }
                
            // close connection 
            $db = null; 
        ?>
        <!-- button to get back to add player -->
        <br>
            <a href="add-player.php">
                <button>Back to add player</button>
            </a>
        </br>
    </body>
</html>