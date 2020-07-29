<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style>
   body{
    background-image: url("bgimage1.jpg");
    }
    
</style>

<body>
  
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <ul class="navbar-nav">
      <li class="nav-item">
       <h5><a href="TestStudentInherit .php">Student</a>&nbsp;&nbsp;&nbsp;</h5>
      </li>
      <li class="nav-item">
        <h5><a href="TestStaffInherit.php">Staff</a></h5>
      </li>
      
    </ul>
      </nav>

      <div class="container">
        <div class="row mt-3">
            <div class="col-sm-5 mt-4">
            <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2 style="margin-top:0px;">Student Information</h2>
            <table>

            <tr>
            <td>Name</td>
            <td><input type="text" id="name" name="name" placeholder="Enter Your Name"></td>
            </tr>

            <tr>
            <td>Address</td>
            <td> <input type="text" id="address" name="address" placeholder="Enter Your Address"></td>
            </tr>

            <tr>
            <td>Program</td>
            <td><input type="text" id="program" name="program" placeholder="Enter Your Program"></td>
            </tr>
           
            <tr>
            <td>Year</td>
            <td> <input type="number" id="year" name="year" placeholder="Enter Your Year"></td>
            </tr>
            
            
            <tr>
            <td>Fee</td>
            <td><input type="double" id="fee" name="fee" placeholder="Enter Your Fee(eg.50000.00)"></td>
            </tr>
          
            <tr>
            <td> <input type="submit" name="btnStuSubmit" id="btnStuSubmit" value="Submit"></td>
            <td> <input type="submit" name="btnStuShow" id="btnStuShow" value="Show student"></td>
            </tr>

          </table>

           
           
        </form>
            </div>
     
        <div class="col-sm-7 mt-4">
        <?php
   class Person
   {
     public $name;
     public $address;

     public function __construct($name,$address)
     {
         $this->name=$name;
         $this->address=$address;
     }
     function get_name() {
        return $this->name;
    }

    function get_address() {
        return $this->address;
    }

    function set_name($name) {
        $this->name=$name;
    }

    function set_address($address) {
        $this->address=$address;
    }
 public function personInformation()
 {
     echo "Name is {$this->name} . Address is {$this->address}";
 }
   }

   class student extends Person
   {
       public $program;
       public $year;
       public $fee;
       public function __construct($program,$year,$fee)
     {
         $this->program=$program;
         $this->year=$year;
         $this->fee=$fee;
     }
     public function showInformation()
 {   echo "<h4>Your Insert Data</h4>";
     echo "Name is {$this->name} . <br>Address is {$this->address}.
           <br>Program is {$this->program} .<br> Year is {$this->year}.
           <br>Fee is {$this->fee}";
 }
   }
   
//For Submit Button 
   if(isset($_POST['btnStuSubmit']))
   {
                
    $n = $_POST['name'];
    $a = $_POST['address'];
    $p= $_POST['program'];
    $y =$_POST['year'];
    $f = $_POST['fee'];
    
    $stu=new Student($p,$y,$f);
    $stu->set_name($n);
    $stu->set_address($a);
    $stu->showInformation();
    
    $stuArray=array("Name"=>$stu->get_name(),"Address"=>$stu->get_address(),"Program"=>$stu->program,
                   "Year"=>$stu->year,"Fee"=>$stu->fee);
    $stuResult=json_encode($stuArray);
    
    $myfile = fopen("student.txt", "a") or die("Unable to open file!");
    fwrite($myfile, $stuResult."\n");
    fclose($myfile);

}

//For Show Button
if(isset($_POST['btnStuShow'])){
                
    $myfile = fopen("student.txt", "r") or die("Unable to open file!");

    echo "<h3>Student Result</h3>";
    echo "<table class=table table-borderless>";
    echo "<thead class=thead-light>";
    echo "<tr>";
    echo "<td style='border:1px solid'>Name</td>";
    echo "<td style='border:1px solid'>Address</td>";
    echo "<td style='border:1px solid'>Program</td>";
    echo "<td style='border:1px solid'>Year</td>";
    echo "<td style='border:1px solid'>Fee</td>";
    echo "</tr>";
   


    while(!feof($myfile)) {
        $student=fgets($myfile);
        if($student!=""){
            $result=json_decode($student,true);
            echo "<tr style='border:1px solid'>";
            array_walk($result,"myfunction");
            echo "</tr>";
        }
    }

    fclose($myfile);
    echo "</thead>";
    echo "</table>";
}

function myfunction($value,$key)
{
    echo "<td style='border:1px solid'>".$value."</td>";
}


   ?>
    
         </div>
      </div>
      </div>

</body>
</html>
