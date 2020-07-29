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
    background-image: url("bgimage2.jpg");
    }
    
</style>

<body>
  
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <ul class="navbar-nav">
      <li class="nav-item">
       <h5><a href="TestAbstractCircle.php">Circle</a>&nbsp;&nbsp;&nbsp;</h5>
      </li>
      <li class="nav-item">
       <h5><a href="TestAbstractRectangle.php">Rectangle</a>&nbsp;&nbsp;&nbsp;</h5>
      </li>
      <li class="nav-item">
        <h5><a href="TestAbstractSquare.php">Square</a></h5>
      </li>
      
    </ul>
      </nav>

      <div class="container">
        <div class="row mt-3">
            <div class="col-sm-5 mt-4">
            <h2>Square Information</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">

                   <table>

                   <tr>
                   <td>Enter Square Width</td>
                   <td><input type="number" id="width" placeholder="Enter width" name="width"></td>
                   </tr>

                   <tr>
                   <td>Enter Square Height</td>
                   <td><input type="numder" id="length" placeholder="Enter length" name="length"></td>
                   </tr>   

                   <tr>
                   <td>Enter Square Color</td>
                   <td><input type="text" id="color" placeholder="Enter Color" name="color"></td>
                   </tr>   

                   <tr>
                   <td></td>
                   <td> <input type="submit" name="btnCalculate" id="btnCalculate" value="Calculate"></td>
                   </tr>


                   </table> 
                </form>
        
            </div>
     
        <div class="col-sm-7 mt-4">

        <?php include 'TestAbstractShape.php'; 
           

           if(isset($_POST['btnCalculate'])){
               $width=$_POST['width'];
               $length=$_POST['length'];
               $color=$_POST['color'];

               $square=new Square($width,$length,$color);
               $area = $square->getArea();
               $parameter = $square->getParameter();
               $color = $square->get_Color();

               showInformation($area,$parameter,$color);
           }


       ?>

         </div>
      </div>
      </div>

</body>
</html>
