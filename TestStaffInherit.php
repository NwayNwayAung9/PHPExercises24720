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
            <h2 style="margin-top:0px;">Staff Information</h2>
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
            <td>School</td>
            <td><input type="text" id="school" name="school" placeholder="Enter Your School"></td>
            </tr>
           
            <tr>
            <td>Pay</td>
            <td> <input type="double" id="pay" name="pay" placeholder="Enter Your Pay"></td>
            </tr>
            
            <tr>
            <td> <input type="submit" name="btnStaSubmit" id="btnStaSubmit" value="Submit"></td>
            <td> <input type="submit" name="btnStaShow" id="btnStaShow" value="Show Staff"></td>
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

   class staff extends Person
   {
       public $school;
       public $pay;
      
       public function __construct($school,$pay)
     {
         $this->school=$school;
         $this->pay=$pay;
        
     }
     public function showInformation()
 {    
     echo "<h4>Your Insert Data</h4>";
     echo "Name is {$this->name} .<br> Address is {$this->address}.
     <br> School is {$this->school} .<br> Pay is {$this->pay}";
 }
   }
//For Submit Button 
   if(isset($_POST['btnStaSubmit']))
   {
                
    $n = $_POST['name'];
    $a = $_POST['address'];
    $s= $_POST['school'];
    $p =$_POST['pay'];
  
    
    $staff=new Staff($s,$p);
    $staff->set_name($n);
    $staff->set_address($a);
    $staff->showInformation();
    
    $staffArray=array("Name"=>$staff->get_name(),"Address"=>$staff->get_address(),"School"=>$staff->school,
                   "Pay"=>$staff->pay);
    $staffResult=json_encode($staffArray);
    
    $myfile = fopen("staff.txt", "a") or die("Unable to open file!");
    fwrite($myfile, $staffResult."\n");
    fclose($myfile);

}

//For Show Button
if(isset($_POST['btnStaShow'])){
                
    $myfile = fopen("staff.txt", "r") or die("Unable to open file!");

    echo "<h3>Staff Result</h3>";
    echo "<table class=table table-borderless>";
    echo "<thead class=thead-light>";
    echo "<tr>";
    echo "<td style='border:1px solid'>Name</td>";
    echo "<td style='border:1px solid'>Address</td>";
    echo "<td style='border:1px solid'>School</td>";
    echo "<td style='border:1px solid'>Pay</td>";
    echo "</tr>";

    while(!feof($myfile)) {
        $staff=fgets($myfile);
        if($staff!=""){
            $result=json_decode($staff,true);
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
