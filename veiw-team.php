<!-- Global header -->
<?php
$title = 'View Team';
include('Shared/header.php');
?>
<!--html table -->
        <table>
            <tr>
                <th>Name ,</th>
                <th>Age ,</th>
                <th>Position ,</th>
                <th>Jersey Number</th>
            </tr>
            <!--populated from db-->
            <?php
                include ('Shared/database.php');
                //get data from players and positions and group all by positionID with INNER JOIN and ORDER BY
                $sql = "SELECT players.playerName, players.playerAge, players.position, positions.jerseyNum, positions.positionID 
                FROM players
                INNER JOIN positions ON players.position = positions.positionName
                ORDER BY positionID;";
                $data = $db->query($sql);
                // loop through data
                foreach($data as $row){
                    echo '<tr>';
                    echo '<td>' . $row['playerName'] . '</td>';
                    echo '<td>' . $row['playerAge'] . '</td>';
                    echo '<td>' . $row['position'] . '</td>';
                    echo '<td>' . $row['jerseyNum'] . '</td>';
                    echo '</tr>';
                }
                // close connection
                $db = null;
            ?>
        </table>
    </body>
</html>