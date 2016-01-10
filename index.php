<!DOCTYPE html>
<html>
    <head>
        <title>Johnathan Li A00910826 Set A</title>
    </head>
    <body>
        <?php
        //see if board is already given and valid
        if (!isset($_GET['board'])) {
            echo "No board given. New game started. <br>";
            $squares = "---------";
        } else
            $squares = $_GET['board'];

        $game = new Game($squares);
        //logic to decide the winner
        if ($game->winner('x')) {
            echo 'You win. Lucky guesses!';
        } else if ($game->winner('o')) {
            echo 'I win. Muahahahaha';
        } else {
            $game->pick_move();
            echo 'No winner yet.';
        }
        //calls display method so we can actually see the 3 by 3 squares
        $game->display();
        //button to reset the game
        echo "<br> <a href='?'>Restart</a> <br>";

        class Game {
            //board position property
            var $position;

            //constructor to initialize game state using the given string
            function __construct($squares) {
                $this->position = str_split($squares);
            }

            //method to determine winning conditions
            function winner($token) {
                $won = false;
                if (($this->position[0] == $token) &&
                        ($this->position[1] == $token) &&
                        ($this->position[2] == $token)) {
                    $won = true;
                } else if (($this->position[3] == $token) &&
                        ($this->position[4] == $token) &&
                        ($this->position[5] == $token)) {
                    $won = true;
                } else if (($this->position[6] == $token) &&
                        ($this->position[7] == $token) &&
                        ($this->position[8] == $token)) {
                    $won = true;
                } else if (($this->position[0] == $token) &&
                        ($this->position[3] == $token) &&
                        ($this->position[6] == $token)) {
                    $won = true;
                } else if (($this->position[1] == $token) &&
                        ($this->position[4] == $token) &&
                        ($this->position[7] == $token)) {
                    $won = true;
                } else if (($this->position[2] == $token) &&
                        ($this->position[5] == $token) &&
                        ($this->position[8] == $token)) {
                    $won = true;
                } else if (($this->position[0] == $token) &&
                        ($this->position[4] == $token) &&
                        ($this->position[8] == $token)) {
                    $won = true;
                } else if (($this->position[2] == $token) &&
                        ($this->position[4] == $token) &&
                        ($this->position[6] == $token)) {
                    $won = true;
                }
                return $won;
            }

            //used to display the 3 by 3 table
            function display() {
                echo '<table cols="3" style="font-size:large; font-weight:bold">';
                echo '<tr>'; // open the first row
                for ($pos = 0; $pos < 9; $pos++) { 
                    echo $this->show_cell($pos); //to display tokens at respective position
                    if ($pos % 3 == 2) {
                        echo '</tr><tr>'; //start a new row for the next square
                    }                   
                }
                echo '</tr>'; //close the last row
                echo '</table>';
            }

            function show_cell($which) {
                //gets the value inside cell to display
                $token = $this->position[$which];
                //if value not a dash, display it
                if ($token <> '-') {
                    return '<td>' . $token . '</td>';
                }
                //if value is a dash, make it so that once it's clicked
                //it will show up either as an 'x' or 'o'
                $this->newposition = $this->position;
                $this->newposition[$which] = 'x';
                $move = implode($this->newposition); //make a string from the board array
                $link = '?board=' . $move; //makes the link update with the corresponding board after each move                
                return '<td><a href=' . $link . '>-</a></td>'; //returns cell with an anchor and showing a hyphen
            }

            //represents another player playing against you
            function pick_move() {
                //randomly picks a open square
                $fill = false;
                do {
                    $next = rand(0, 8);
                        //check if its a empty square
                    if ($this->position[$next] == '-') { 
                        //if it is, set it 'o'
                        $this->position[$next] = 'o';    
                        $fill = true;
                    }
                    //repeat until there are no more empty squares
                } while (!$fill);
            }
        }
        ?>

    </body>
</html>

