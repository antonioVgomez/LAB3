<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <?php
            //echo "hello ";
            
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
            }
            
            function generateDeck() {
                $cards = array();
            
                for ($i = 0; $i < 52; $i++) {
                    array_push($cards, $i);
                }
            
                print_r($cards);
            
                
            
            }
            
            mapNumberToCard(52);
            
            generateDeck();
            
            $person = array(
                "name" => "player1",
                "profilePicUrl" => "./profile_pics/player1.png",
                "cards" => array(
                    array(
                        "suit" => "hearts",
                        "value" => "4"
                        ),
                    array(
                        "suit" => "clubs",
                        "value" => "10"
                        )
                    )
                );
            
            function displayPerson () {
                echo "<img src='".$person["ProfilePic"]."'>";
                
            // iterate through player's cards    
                for($i = 0; $i < $person["cards"].count; $i++) {
                    $card = $person["cards"][$i];
                
                    // construct the imgURL for each card
                    $imgURL = "./cards/".$cards["suit"]."/".$cards["value"].".png";
                
                    echo "<img src='.$imgURL.'>";
                
                    //echo $card["value"]." of ".$card["suit"];
                    //echo "<br>";
                
                
                }
            }
            
            function calculateHandValue($cards) {
                $sum = 0;
                
                foreach($cards as $card) {
                    $sum += $card["value"];
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