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
        
        // function mapNumberToCard($num) {
        //     $cardValue = ($num % 13) + 1; 
        //     $cardSuit = floor($num / 13); 
        //     $suitStr = ""; 
            
        //     switch($cardSuit) {
        //         case 0: 
        //             $suitStr = "clubs"; 
        //             break; 
        //         case 1: 
        //             $suitStr = "diamonds"; 
        //             break; 
        //         case 2: 
        //             $suitStr = "hearts"; 
        //             break; 
        //         case 3: 
        //             $suitStr = "spades"; 
        //             break; 
        //     }

        //     $card = array(
        //         'num' => $cardValue, 
        //         'suit' => $cardSuit, 
        //         'imgURL' => "./cards/".$suitStr."/".$cardValue.".png"
        //         ); 
            
        //     return $card; 
        // }
        
        
        function generateDeck() {
            $cards = array(); 
            $suits = array("clubs", "diamonds", "hearts", "spades"); 
            
            foreach ($suits as $suit) {
                for ($i = 1; $i <= 13; $i++ ) {
                        $card = new Card(); 
                        $card->suit = $suit; 
                        $card->val = $i; 
                        
                        array_push($cards, $card); 
                }
            }
            
            shuffle($cards); 
            return $cards; 
        }
            
        
        
        
        class Card {
            public $suit; 
            public $val; 
            
            public function getImgURL() {
                return "./cards/".$this->suit."/".$this->val.".png"; 
            }
        }
        
   
        
        function printDeck($deck) {
            foreach ($deck as $card) {
                echo "imgURL: ".$card->getImgURL()."<br>"; 
            }
        }
        function printHand($hand) {
            foreach ($hand as $card) {
                echo "imgURL: ".$card->getImgURL()."<br>"; 
            }
        }
        //Return a specific number of cards
        //Passby reference is allowing the variable to be modified, this allows for a new deck to be generated for each object.
        function generateHand(&$deck) {
            $hand = array(); 
            
            for ($i = 0; $i < 3; $i++) {
                $card = array_pop($deck);
                array_push($hand, $card); 
            }
            
            return $hand; 
        }
        
        
       
        
        
        ///////////////////////////////////////////////////////////////////
        //  Plan: 
        //
        //  What is a "person"? ===> shoud have a few properties
        //      ==> name
        //      ==> img_url 
        //      ==> hand (array of cards)
        //
        //  1) Declare 4 people.  
        //       - each person should the above properties 
        //              - how to give each person a "hand"
        //                   a) generate a deck of random cards
        //                   b) function that gives some number of cards to a person (distributeCardstoPerson?)
        //                   c) call distributeCardstoPerson on the current person object 
        //       - store the 4 people objects in an array
        //  
        //  2) Randomize the people ==> shuffle the array of people 
        //  3) display the people.  ===> need a function that takes a person and prints html 
        // 
        ////////////////////////////////////////////////////////////////////
        
        // function that generates a "hand" of cards for one person (no duplicates)
        
        
         $deck = generateDeck(); 
        //  printDeck($deck);
        
       
            
        
        $players = array(
            array(
            "name" => "Jason", 
            "profilePicUrl" => "./profile_pics/Jason.png", 
            "cards" => generateHand($deck),
            ),
            array(
            "name" => "Will",
            "profilePicUrl" => "./profile_pics/Will.png", 
            "cards" => generateHand($deck),
            ),
            array(
            "name" => "Kye",
            "profilePicUrl" => "./profile_pics/Kye.png", 
            "cards" => generateHand($deck),
            ),
            array(
            "name" => "Tony",
            "profilePicUrl" => "./profile_pics/Tony.png", 
            "cards" => generateHand($deck),
            )
         );
        shuffle($players);
        
        foreach($players as $player){
            displayPerson($player);
        }
            
            
            function displayPerson($person) {
                // show profile pic
                echo "<img src='".$person["profilePicUrl"]."'>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person["cards"]); $i++) {
                    $card = $person["cards"][$i];
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card->getImgURL()."'>"; 
                }
                
                echo calculateHandValue($person["cards"]); 
            }
            
            
            function calculateHandValue($cards) {
                $sum = 0; 
                
                foreach ($cards as $card) {
                    $sum += $card->val; 
                }
                
                return $sum; 
            }
            
            displayPerson($players); 
            
            
        
        ?>
    </body>
</html>