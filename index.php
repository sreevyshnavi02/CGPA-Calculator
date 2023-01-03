<?php 
    include 'header.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4th sem CGPA Calculation</title>
</head>
<body>
    <form action="redirect.php" method = "post" class="get_stud_details">
        <label for="regno">Regno: </label>
        <input type="text" name = "regno" placeholder="Your Regno" id="regno">
        <br>
        <label for="entry_mode"><span>Entry Mode:</span></label>
                
                <select name="entry_mode" id="entry_mode">
                    <option value="R">Regular</option>
                    <option value="L">Lateral Entry</option>
                </select>
        <br>
        <input type="submit" value="Proceed" name = "submit" class = 'submit'>
    </form>
</body>
</html>