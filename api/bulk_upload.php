<?php
     if(isset($_POST["Import"])){
        
        include 'db_connect.php';
        $id=$_POST["uid"];
        $filename=$_FILES["file"]["tmp_name"];    
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {

                if(preg_match('/^[6-9]{1}[0-9]{9}+$/',$getData[2]))
                {
                  $sql = "INSERT into customer_no (id,name,dob,phone_no) values (".$id.",'".$getData[0]."','".$getData[1]."','".$getData[2]."')";
                     //  $result = $conn->query($sql);
                

            if ($conn->query($sql) === TRUE) {
                                 echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"../index.php\"
              </script>";
             } else {
                  //echo "Error: " . $sql . "<br>" . $conn->error;
                                echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"../index.php\"
                  </script>";
             }

  
           /* if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"../index.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"../index.php\"
              </script>";
            }*/
               }
             }
               $conn->close();
               fclose($file);  
         }
      }   
?>