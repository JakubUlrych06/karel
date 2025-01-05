<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karel Robot - PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74b9ff, #81ecec);
            color: #2d3436;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        h1 {
            margin-bottom: 20px;
        }

        #game-board {
            display: grid;
            grid-template-columns: repeat(10, 40px);
            grid-gap: 5px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #game-board div {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
        }

        textarea, button {
            margin: 10px;
        }

        textarea {
            width: 300px;
            height: 100px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #00cec9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0984e3;
        }
    </style>
</head>
<body>
    <h1>Karel Robot - PHP</h1>
    <div id="game-board">
        <?php
        // Velikost pole
        $boardSize = 10;

        $board = isset($_POST['board']) ? json_decode($_POST['board'], true) : array_fill(0, $boardSize, array_fill(0, $boardSize, null));
        $karel = isset($_POST['karel']) ? json_decode($_POST['karel'], true) : ['x' => 0, 'y' => 0];

        // zpracovani prikayu
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['commands'])) {
            $commands = explode("\n", trim($_POST['commands']));

            foreach ($commands as $command) {
                $parts = preg_split('/\s+/', trim($command));
                $cmd = strtoupper($parts[0]);
                $param = isset($parts[1]) ? (int)$parts[1] : 1;

                switch ($cmd) {
                    case 'UP':
                        $karel['y'] = max(0, $karel['y'] - $param);
                        break;
                    case 'DOWN':
                        $karel['y'] = min($boardSize - 1, $karel['y'] + $param);
                        break;
                    case 'LEFT':
                        $karel['x'] = max(0, $karel['x'] - $param);
                        break;
                    case 'RIGHT':
                        $karel['x'] = min($boardSize - 1, $karel['x'] + $param);
                        break;
                    case 'PLACE':
                        $color = isset($parts[1]) ? $parts[1] : null;
                        if ($color) {
                            $board[$karel['y']][$karel['x']] = $color;
                        }
                        break;
                    case 'RESET':
                        $board = array_fill(0, $boardSize, array_fill(0, $boardSize, null));
                        $karel = ['x' => 0, 'y' => 0];
                        break;
                }
            }
        }

        // zobrazeni herní desky
        foreach ($board as $y => $row) {
            foreach ($row as $x => $cell) {
                echo '<div style="background-color: ' . ($cell ?: 'rgba(255, 255, 255, 0.3)') . '">';
                if ($karel['x'] == $x && $karel['y'] == $y) {
                    echo 'K';
                }
                echo '</div>';
            }
        }
        ?>
    </div>

    <form method="post">
        <textarea name="commands" placeholder="Write commands here..."></textarea><br>
        <input type="hidden" name="board" value='<?php echo json_encode($board); ?>'>
        <input type="hidden" name="karel" value='<?php echo json_encode($karel); ?>'>
        <button type="submit">Execute</button>
    </form>
</body>
</html>
