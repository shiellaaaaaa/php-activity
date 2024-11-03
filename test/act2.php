<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    
    <h1>Peys App</h1>

    <form method="POST">
        <label for="photo_size">Select Photo Size:</label>
        <input type="range" name="photo_size" id="photo_size" min="10" max="100" step="10" value="60">
        <br>
        
        <label for="border_color">Select Border Color:</label>
        <input type="color" name="border_color" id="border_color" value="#000000"> 
        <br>

        <button type="submit" name="process_button">Process</button>
        <br><br>

        <?php 
            if (isset($_REQUEST['process_button'])) {
                $selected_border_color = $_REQUEST['border_color'] ?? '#000000';
                $selected_photo_size = $_REQUEST['photo_size'] ?? '10';

                echo '<img src="http://localhost/profile.png" width="' . (empty($selected_photo_size) ? '10' : $selected_photo_size) . '%" height="' . (empty($selected_photo_size) ? '10' : $selected_photo_size) . '%" style="border:5px solid ' . (empty($selected_border_color) ? '#000000' : $selected_border_color) . ';">';
            }
        ?>
    </form>
</body>
</html>