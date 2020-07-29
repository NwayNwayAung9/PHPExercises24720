<!DOCTYPE html>
<html lang="en">
    <head>
    
    <style>
  
</style>
    </head>
        <body>

<?php

abstract class Shape{
 public $color;

 function get_color() {
    return $this->color;
}

function set_color($color) {
    $this->color=$color;
}
abstract public function getArea();
abstract public function getParameter();
}
//For Circle 
class Circle extends Shape
{
    public $radius;

    public function __construct($radius,$color)
        {
            $this->radius = $radius;
            $this->color=$color;
        }
        
        public function getArea()
        {
            return 3.14 * ($this->radius * $this->radius);
        }
        
        public function getParameter()
        {
            return (2 * 3.14 * ($this->radius));
        }
}

//For Rectangle
class Rectangle extends Shape
{
    public $width;
    public $length;
    public function __construct($width, $length,$color)
    {
        $this->width = $width;
        $this->length = $length;
        $this->color=$color;
    }
    
    public function getArea()
    {
        return $this->width * $this->length;
    }
    
    public function getParameter()
    {
        return 2 * ($this->width + $this->length);
    }
    
}
//for Square
class Square extends Rectangle
{   
    public $width;
    public $length;
    public function __construct($width, $length,$color)
    {
        $this->width = $width;
        $this->length = $length;
        $this->color=$color;
    }
    
   
    
}

//show Result
function showInformation($area,$parameter,$color)
{
    echo "<table class=table table-borderless>";
    echo "<thead>";
    echo "<tr><th>Area</th><th>Parameter</th><th>Color</th></tr>";
    echo "<tr><td>".$area."</td><td >".$parameter."</td><td>".$color."</td></tr>"; 
    echo "</thread></table>";
}
?>
 </body>
</html>