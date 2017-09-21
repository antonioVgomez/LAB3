<?php 
        
        // Generate a deck of cards 
        // [0, 1, 2, ..., 51]
        // map each number to a card 
        
        // generate a "hand" of cards
    // function play() {
        
        //numbers to cards
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
        
        
        //shuffles deck
        function generateDeck() {
            $cards = array(); 
        
            for ($i = 0; $i < 52; $i++) {
                array_push($cards, $i); 
            }
            
            
            shuffle($cards); 
            
            return $cards; 
 
        }
        
        $deck = generateDeck(); 
        
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
        
        
        //adds hand value
        function calculateHandValue($cards) {
                $sum = 0; 
                
                foreach ($cards as $card) {
                    $sum += $card["num"]; 
                }
                
                return $sum; 
            }
        
        
        $person1 = array(
            "name" => "William", 
            "profilePicUrl" => "./profile_pics/will.png", 
            "cards" => generateHand($deck)
            ); 
                
        $person2 = array(
            "name" => "Jason", 
            "profilePicUrl" => "./profile_pics/jason.png", 
            "cards" => generateHand($deck)
            ); 
            
        $person3 = array(
            "name" => "Antonio", 
            "profilePicUrl" => "./profile_pics/antonio.png", 
            "cards" => generateHand($deck)
            );
            
        $person4 = array(
            "name" => "Kye", 
            "profilePicUrl" => "./profile_pics/Kye.png", 
            "cards" => generateHand($deck)
            ); 
            
            
            
            
            
            // displays person and cards
            function displayPerson($person) {
                // show profile pic
                echo "<img src='".$person["profilePicUrl"]."'>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person["cards"]); $i++) {
                    $card = $person["cards"][$i];
                    
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($person["cards"]); 
            }
            
            
           
            
            // displayPerson($randoms);
            
        
        ?>