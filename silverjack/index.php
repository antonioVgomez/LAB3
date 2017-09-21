<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <?php 
        
        // Generate a deck of cards 
        // [0, 1, 2, ..., 51]
        // map each number to a card 
        
        // generate a "hand" of cards
        
         /*TODO:
            done:Get his version working
            Decide when to stop getting points for a player before passing 42
            Display winner
            Display same 4 players in random order
            Create css file with at least 10 rules
            Make code look pretty
            */
        
        
        function mapNumberToCard($num) {
            $cardValue = ($num % 13) + 1; 
            $cardSuit = floor($num / 13); 
            $suitStr = ""; 
            
            switch($cardSuit) {
                case 0: 
                    $suitStr = "clubs"; 
                    break; 
                case 1: 
                    $suitStr = "diamonds"; 
                    break; 
                case 2: 
                    $suitStr = "hearts"; 
                    break; 
                case 3: 
                    $suitStr = "spades"; 
                    break; 
            }

            $card = array(
                'num' => $cardValue, 
                'suit' => $cardSuit, 
                'imgURL' => "./cards/".$suitStr."/".$cardValue.".png"
                ); 
            
            return $card; 
        }
        
        
        function generateDeck() {
            $cards = array(); 
        
            for ($i = 0; $i < 52; $i++) {
                array_push($cards, $i); 
            }
            
            
            shuffle($cards); 
            
            return $cards; 
 
        }
        
        
        function printDeck($deck) {
            for ($i = 0; $i < count($deck); $i++) {
                $cardNum = $deck[$i]; // number between 0 and 51
                $card = mapNumberToCard($cardNum); 
                echo "imgURL: ".$card["imgURL"]."<br>"; 
            }
        }
        
        // Return a specific number of cards
        function generateHand($deck) {
            $hand = array(); 
            
            for ($i = 0; $i < 3; $i++) {
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum); 
                array_push($hand, $card); 
            }
            
            return $hand; 
        }
        
        $deck = generateDeck(); 
        //printDeck($deck); 
        
        
        
        // function that generates a "hand" of cards for one person (no duplicates)
        
        
            
        /*$person = array(
            "name" => array ("Abraham", "player2", "player3", "player4"), 
            "profilePicUrl" => "./profile_pics/abraham.png", 
            "cards" => generateHand($deck),
            "totalPoints" => array (0, 0, 0, 0)
            ); */
            
        $person1 = array(
            "name" => "William", 
            "profilePicUrl" => "./profile_pics/will.png", 
            "cards" => generateHand($deck),
            "totalPoints" => 0
            ); 
                
        $person2 = array(
            "name" => "Jason", 
            "profilePicUrl" => "./profile_pics/jason.png", 
            "cards" => generateHand($deck),
            "totalPoints" => 0
            ); 
            
        $person3 = array(
            "name" => "Antonio", 
            "profilePicUrl" => "./profile_pics/antonio.png", 
            "cards" => generateHand($deck),
            "totalPoints" => 0
            );
            
        $person4 = array(
            "name" => "Kye", 
            "profilePicUrl" => "./profile_pics/Kye.png", 
            "cards" => generateHand($deck),
            "totalPoints" => 0
            ); 
                
            
            
        function displayPerson($person) {
            // show profile pic
            //global $person;
            echo "<img src='".$person["profilePicUrl"]."'>"; 
                
                
            // iterate through $person's "cards"
                
            for($i = 0; $i < count($person["cards"]); $i++) {
                $card = $person["cards"][$i];
                    
                // construct the imgURL for each card
                
                // translate this to HTML 
                echo "<img src='".$card["imgURL"]."'>"; 
            }
                
            echo calculateHandValue($person["cards"]); 
            $person["totalPoints"] = calculateHandValue($person["cards"]);
            $test = $person["totalPoints"];
            //echo "First test = $test <br>";
            //test V
            echo "<br>";
            return $test;
            
        }
            
            
        function calculateHandValue($cards) {
            $sum = 0; 
                
            foreach ($cards as $card) {
                $sum += $card["num"]; 
            }
            //$person["totalPoints"] = $sum;
            return $sum; 
        }
            
        $person1["totalPoints"] = displayPerson($person1); 
        $person2["totalPoints"] = displayPerson($person2);
        $person3["totalPoints"] = displayPerson($person3);
        $person4["totalPoints"] = displayPerson($person4);
        
        $testingValue = $person1["totalPoints"];
        
        //echo "another test   ->($testingValue)";
            
        //$playersArray = array ($person1, $person2, $person3, $person4);
            
        function determineWinner($player1, $player2, $player3, $player4) {
            //For error testing
            $winner = "NULL";
            $highestSum = 0;
            $player2["totalPoints"] = 40;
            
            //iterate through players
            for($i = 1; $i <= 4; $i++) {
                //compare current player's score to the highest sum, while not being greater than 42.
                if ((${'player'.$i}["totalPoints"] > $highestSum) && (${'player'.$i}["totalPoints"] < 42)) {
                    $highestSum = ${'player'.$i}["totalPoints"];
                    $winner = ${'player'.$i}["name"];
                }
            }
                
            echo "The winner is $winner";
        }
            
        determineWinner($person1, $person2, $person3, $person4);
        ?>
    </body>
</html>