<?php
define('HZiKj338G', true);

if((float)phpversion()<5.5){
	die("PHP version must be greater than 5.5 ");
}

require "classes/Dbcon.php";
require "classes/Employees.php";
require "classes/Employee.php";
$e=new Employees();

$all=$e->getAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="description" content="Yavor Yankov Test">
<meta name="author" content="Yavor Yankov">
<meta name="generator" content="Hugo 0.98.0">

<meta name="docsearch:language" content="en">
<meta name="docsearch:version" content="0.1">

<title>TEST TASK</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



  </head>
  <body>

     

        
          <section id="hero">
              <div class="container">
                  <table class="table">
					<tr  class="thead-dark">
						<th>Name</th>
						<th>Type</th>
						<th>Appointed</th>
						<th>Accumulated days</th>
						<th>Used days</th>
					</tr>
					<?php
					
					foreach($all as $e){
						$re=$e->get();
						echo '<tr>
								<td>'.$re["employee_name"].'</td>
								<td>'.$re["employee_type"].'</td>
								<td>'.$re["appointed"].'</td>
								<td>'.$re["accumulated"].'</td>
								<td>'.$re["used_days"].'</td>
						
							</tr>';
					}
					?>
				  </table>
                  
              </div>
          </section>
         

          
        </body>
</html>