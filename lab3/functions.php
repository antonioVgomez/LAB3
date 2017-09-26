<?php 
        
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
        
        //edited this function to make random hands for each player
        // Return a specific number of cards
        function generateHand(&$deck) {
            $hand = array(); 
            $counter = 0;
            for ($i = 0; $i < count($deck); $i++) {
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum); 
                array_push($hand, $card); 
                
                $counter +=$card["num"];
                if ($counter > 42) {
                    break;
                } else if (($counter <= 42) && ($counter >=37)) {
                    break;
                }
            }
            
            shuffle($deck);
            
            return $hand; 
        }
        
        $deck = generateDeck(); 
        
        
        // function that generates a "hand" of cards for one person (no duplicates)
        
        //add the totalPoints to these Jason    
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
        
        
        global $people;
        
        $people = array();
        
        for($i=1;$i<5;$i++) {
            array_push($people, ${'person' .$i});
        }
        shuffle($people);
        
        function randomPeople() {
            global $people;
            for($i=0;$i<count($people);$i++) {
                echo $people[$i] ["name"];
                echo "<br>";
                echo "<img src='".$people[$i]["profilePicUrl"]."'>";
                echo "<br>";
                
                for($j = 0; $j < count($people[$i]["cards"]); $j++) {
                $card = $people[$i]["cards"][$j];
                    
                // construct the imgURL for each card
                
                // translate this to HTML 
                echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($people[$i]["cards"]); 
                $people[$i]["totalPoints"] = calculateHandValue($people[$i]["cards"]);
                echo "<br>";
            }
            
        }
            
        function calculateHandValue($cards) {
            $sum = 0; 
                
            foreach ($cards as $card) {
                $sum += $card["num"]; 
            }
            
            return $sum; 
        }
        
        
        //add this Jason
        function determineWinner($player) {
            //For error testing
            $winner = "NULL";
            $highestSum = 0;
            $overallTotal = 0;
    
            //iterate through players
            for($i = 0; $i < count($player); $i++) {
                
                //compare current player's score to the highest sum, while not being greater than 42.
                if (($player[$i]["totalPoints"] > $highestSum) && ($player[$i]["totalPoints"] <= 42)) {
                    $highestSum = $player[$i]["totalPoints"];
                    $winner = $player[$i]["name"];
                }
                
                if($player[$i]["totalPoints"] <= 42) {
                    $overallTotal+= $player[$i]["totalPoints"];
                }
            }
            $winningTotal = $overallTotal - $highestSum;
                
            echo "The winner is <span>$winner</span> with <span>$winningTotal</span> points!";
        }

?>
