<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <?php
            //echo "hello ";
            
            /*TODO:
            Get his version working
            Decide when to stop getting points for a player before passing 42
            Display winner
            Display same 4 players in random order
            Create css file with at least 10 rules
            Make code look pretty
            */
            function mapNumberToCard($num) {
                $cardValue = ($num % 13) + 1;
                $cardSuit = $num/4;
                
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
                
                echo "value: $cardValue <br>";
                echo "suit: $cardSuit <br>";
                echo "suitStr: $suitStr <br>";
                
                $card = array(
                    'num' => $cardValue,
                    'suit' => $cardSuit,
                    );
            }
            
            function generateDeck() {
                $cards = array();
            
                for ($i = 0; $i < 52; $i++) {
                    array_push($cards, $i);
                }
            
                //print_r($cards);
            
                shuffle($cards);
                
                return $cards;
            
            }
            
            function generateHand() {
                $hand = array();
                
                for ($i = 0; $i < 3; $i++) {
                    $card = array_pop($deck);
                    array_push($hand, $card);
                }
            }
            
            mapNumberToCard(52);
            
            $deck = generateDeck();
            
            $person = array(
                "name" => "player1",
                "profilePicUrl" => "./profile_pics/player1.png",
                "cards" => generateHand($deck)
                );
            
            function displayPerson () {
                echo "<img src='".$person["ProfilePic"]."'>";
                
            // iterate through player's cards    
                for($i = 0; $i < $person["cards"].count; $i++) {
                    $card = $person["cards"][$i];
                
                    // construct the imgURL for each card
                    
                
                    echo "<img src='.$imgURL.'>";
                
                    //echo $card["value"]." of ".$card["suit"];
                    //echo "<br>";
                
                
                }
            }
            
            function calculateHandValue($cards) {
                $sum = 0;
                
                foreach($cards as $card) {
                    $sum += $card["num"];
                }
                return $sum;
            }
            // show profile pic
          
            displayPerson("player1");
        
            //echo "name: ".$person["name"]."<br>";
            //echo "imgURL".$person["imgUrl"]."<br>";
        ?>
        
    </body>
</html>