<?php
    include 'header.php';
        
    //cgpa calculation
    $numerator = 0;
    $denominator = 0;


    // retrieve all the grades and calculate the cgpa
    if(isset($_POST['submit_grades'])){
        // echo($_SESSION['regno']);
        $size = count($_SESSION['grade_array']);
        $count = 0;
        foreach($_SESSION['grade_array'] as $i => $row){
            $row[1] = $_POST['grade'.$i];

            //consider courses with non zero grade points alone
            if($row[1] > 0){
                //retrieve the credits for that course
                $get_credits = mysqli_query($conn, "select CREDITS from COURSES where COURSE_CODE = '$row[0]'");
                $credits_array = mysqli_fetch_assoc($get_credits);
                $credits = $credits_array['CREDITS'];
                
                //multiply credits with grade pt for numerator

                // echo("<br>credits = ".$credits.", grade pt = ". $row[1]);
                $prdt = (float)$credits * (int)$row[1];
                // echo(", prdt = ".$prdt);
                $numerator += $prdt;
                $denominator += $credits;
                // echo(", numerator = ".$numerator);
                // echo(", denominator = ".$denominator);
            }
            $count ++;
        }

        if($count == $size){
            $cgpa = $numerator/$denominator;
            $cgpa = round($cgpa, 2);
            echo("<br><div class='cgpa'>Your CGPA = ".$cgpa."</div>");
        }
        // $regno = $_SESSION['regno'];
        // $em = $_SESSION['entry_mode']
        // $insert_query = mysqli_query($conn, "insert into student(regno, entry_mode, cgpa) values('$regno', '$em', '$cgpa')");

    }
?>