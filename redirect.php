<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4th sem CGPA Calculation</title>
</head>
<body>
    
    <?php
        include 'header.php';
        if(isset($_POST['submit'])){
            $_SESSION['regno'] = $_POST['regno'];
            $_SESSION['entry_mode'] = $_POST['entry_mode'];

            //2d array to store the course_code and grade
            $_SESSION['grade_array'] = array();
            
            echo("<form method = 'post' action = 'cgpa.php'>");
            
            if($_SESSION['entry_mode'] == 'R'){

                //fetch all the 1st and 2nd sem courses
                
                $fetch_courses = mysqli_query($conn, 'select * from COURSES where sem = 1');
                foreach($fetch_courses as $crs){ 
                    array_push(
                        $_SESSION['grade_array'], 
                        array($crs['course_code'], 'X')
                    );
                }
                

                $fetch_courses = mysqli_query($conn, 'select * from COURSES where sem = 2');
                foreach($fetch_courses as $crs){ 
                    array_push(
                        $_SESSION['grade_array'], 
                        array($crs['course_code'], 'X')
                    );
                }
            }

            // for everyone - including lateral

            $fetch_courses = mysqli_query($conn, 'select * from COURSES where sem = 3');
            foreach($fetch_courses as $crs){ 
                array_push(
                    $_SESSION['grade_array'], 
                    array($crs['course_code'], 'X')
                );
            }

            $fetch_courses = mysqli_query($conn, 'select * from COURSES where sem = 4');
            foreach($fetch_courses as $crs){ 
                array_push(
                    $_SESSION['grade_array'], 
                    array($crs['course_code'], 'X')
                );
            }
        }

        //table 
        echo("
            <table class='get_grade'>
                <tr>
                    <th>Course code</th>
                    <th>Grade</th>
                </tr>
        ");

        // echo("<tr><th class = 'sem'>SEMESTER: ".$sem."</th></tr>");
        
        foreach($_SESSION['grade_array'] as $i => $row){
            // to display the regno(stored at row[0]) and the name of each student(stored at row[1])
            echo("
                <tr>
                    <td>".$row[0]."</td>
            ");
            //grade as input through drop down menu
            echo("
                    <td>
                        <select name='grade".$i."' id = 'select_grade'>
                            <option value = 10>S</option>
                            <option value = 9>A</option>
                            <option value = 8>B</option>
                            <option value = 7>C</option>
                            <option value = 6>D</option>
                            <option value = 5>E</option>
                            <option value = 0>F</option>
                            <option value = 0>Z</option>
                        </select>
                    </td>
                </tr>
            ");
        }
    ?>
        </table>

        <!-- submit button -->
        <input class="btn" type="submit" value="Calculate CGPA upto 4th sem" name="submit_grades">
        </form>

</body>
</html>