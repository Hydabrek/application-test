<?php
/* Author: Juanita Heidebrehct
 * Date: 2016/08/11
 * Purpose: Application Skills Test
 *
 * Instructions provided:
 *	Instructions
 *
 *	Write a simple app which loops through the given $people array and displays it in a table.
 *
 *	Add a button to each row which, when clicked, will alert the person's name and email.
 *
 *	Place your code in index.php. Feel free to use the snippets below to get started.
 */
$people = array(
   array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
   array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
   array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
   array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
   array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

/* Default state
 */
 $alerted='0';
 
?><!doctype html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app>
  <head>
	<meta charset="UTF-8">
	<title>Application Skills Test | Juanita Heidebrecht</title>
	<!-- Mootools -- >
	<script src="//ajax.googleapis.com/ajax/libs/mootools/1.5.2/mootools.min.js"></script>
	<!-- AngularJS -- > 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script> -->
	<style>
	body {text-align:center;}
	table.center {		
		width:50%; 
		margin-left:auto; 
		margin-right:auto;
	  }
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: left;
	}
	tr:hover{
		background-color:#f5f5f5
	}
	td.alerted {background-color:#FFFFE0}
	td.button {text-align: center;}
	</style>
  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
  <style>
  label {
    display: inline-block;
    width: 5em;
  }
  </style>	
	
  </head>
  <body>
 
	<?php
	/* Display of a list of people defined from an array
	 */
	?>
	<table class="center">
	  <tr>
		<th>ID</th>
		<th>First name</th> 
		<th>Last name</th>
		<th>eMail</th>
		<th>Alert</th>
	  </tr> 
	  
	  <?php
		if(isset($_POST['alert'])) {
			/* Grab what information was posted
			 * Do actions if a button was pressed
			 *
			 */			
			$alerted=$_POST["id"];
			$alerted_message=$_POST['first_name'].' '.$_POST['last_name'].' has been alerted via '.$_POST['email'].'.';
			
			/* eMail message out to the person
			 * Example of code if you were to really mail out a message to the person
			 * 
			$to= $_POST['email'];
			$subject= "Alert";
			$message="You have been alerted!";
			$header  = 'From:'.$_POST['first_name'].' '.$_POST['last_name']. '<'.$_POST['email'].'>' . "\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			mail($to, $subject, $message, $headers);
			*/

		}  
	  
		/* 1. Find out the number of people in the array because the list may vary
		 * 2. There is no leading zero
		 * 3. Display the main portion of the table
		 * 4. Button to alert name/email
		 */
		$array_count = count($people);
		for($x = 0; $x < $array_count; $x++) {
			echo '<tr>';
			echo '<td>'.$people[$x]['id'].'</td>';
			if($alerted==$people[$x]['id']) { 
				echo '<td class="alerted">';				
			}else {
				echo '<td>';
			}			
			echo $people[$x]['first_name'].'</td>';
			if($alerted==$people[$x]['id']) { 
				echo '<td class="alerted">';				
			}else {
				echo '<td>';
			}
			echo $people[$x]['last_name'].'</td>';
			if($alerted==$people[$x]['id']) { 
				echo '<td class="alerted">';				
			}else {
				echo '<td>';
			}
			echo $people[$x]['email'].'</td>';
			echo '<td class="button">';
			echo '
				<form method="post" action="index.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="'.$people[$x]['id'].'">
				<input type="hidden" name="first_name" value="'.$people[$x]['first_name'].'">
				<input type="hidden" name="last_name" value="'.$people[$x]['last_name'].'">
				<input type="hidden" name="email" value="'.$people[$x]['email'].'">
				<input type="submit" name="alert" value="Alert" title="Alert person and email address.">
				</form>
				';
			echo '</td>';
			echo '</tr>';


		}		
	  ?>
	</table>
	<?php
		if($alerted>'0') {
			echo '<h1>'.$alerted_message.'</h1>';
		}
	?>
	<!-- JQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>
