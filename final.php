<?php
    //connect to database: collegesmap_db
    //set up 4 parameters
    $server = "localhost";
    $user = "root";
    $password = "root";
    $database = "nba_db";

    //for later use(fro gph - good programing habit)
    $databaseTable = "nba_table";

    //make a connection to the tdatabase - use php funtion: mysqli_connect()
    $mycon = mysqli_connect($server, $user, $password, $database) or die("no connection established");
    //print"connected";

    //create a string variable that holds the SQL command
    $SQLselect = "SELECT * FROM " . $databaseTable;
    
    //to run the above SQL command = PHP has a funtion: mysqli_query()
    //store the results of the run in a variable
    $results = mysqli_query($mycon, $SQLselect) or die(" query did not run");
    

    //is there any records 
    $numrecs = mysqli_num_rows($results);
    if ($numrecs > 0) {

        //loop through the matching record(s)
        while ($recordArray = mysqli_fetch_row($results)) {

            //extracting field's values
            $id = $recordArray[0];
            $team = $recordArray[1];
            $yearFounded = $recordArray[2];
            $NBAWins = $recordArray[3];
            $yearofWin = $recordArray[4];

            // $return_data = array($id, $colletype, $college, $website, $address, $city, $state, $zipcode, $latitude, $longitude, $phone, $distanceIn,);
            $passingInfo = $id.",".$team.",".$yearFounded.",".$NBAWins.",".$yearofWin;

            print $passingInfo."<br>";
    }
    // send all matching colleges
    

    }else {
        print "No record(s) found";
    }

?>    