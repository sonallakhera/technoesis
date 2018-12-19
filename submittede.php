<?php

$con = mysqli_connect('','abhi','Hoticecream1#','registration_details');


if (!empty($_REQUEST['submit2'])) {

 $name2 = htmlspecialchars($_REQUEST['name2']);
 $email2 = htmlspecialchars($_REQUEST['email2']);
 $email22 = htmlspecialchars($_REQUEST['email22']);
 $contact2 = htmlspecialchars($_REQUEST['contact2']);
 $branch2 = htmlspecialchars($_REQUEST['branch2']);
 $year2 = htmlspecialchars($_REQUEST['year2']);
 $enrollment_no2 =  htmlspecialchars($_REQUEST['enrollment_no2']);
 $s_no2;

 $query0 = mysqli_query($con,"select s_no2 from campus_students where email2='$email2'");
 $row = mysqli_fetch_array($query0,MYSQLI_ASSOC);



if ($row['s_no2']) {
	echo "<script type='text/javascript'>";
echo "alert('The email you entered is already registered. Try registering with a new email id. Thanks.')
window.location=('technical-events.html');";
echo "</script> ";
	}



else
 {
 	$query1 = mysqli_query($con,"insert into campus_students(name2,enrollment_no2,email2,contact2,branch2,year2) values ('$name2','$enrollment_no2',
 	'$email2','$contact2','$branch2','$year2')");
  $query2 = mysqli_query($con,"select s_no2 from campus_students where email2='$email2'");
 
  $row = mysqli_fetch_array($query2,MYSQLI_NUM);
   $fest_id2 = 'TN-ID/CS0'.$row[0];
   $query3 = mysqli_query($con,"UPDATE campus_students SET fest_id2='$fest_id2' WHERE email2='$email2'");
   mail($email2, "Registration successfull. TECH-NOESIS 2015", "Thank you for registering with us. Your fest id is ".$fest_id2);



echo "<script type='text/javascript'>";
echo "alert('Thanks for registering with us the fest id is sent to the email and phone you provided!')
window.location=('technical-events.html');";
echo "</script> ";


}

}


elseif (!empty($_REQUEST['submit'])) {
 $name = htmlspecialchars($_REQUEST['name']);
 $email = htmlspecialchars($_REQUEST['email']);
  $email22 = htmlspecialchars($_REQUEST['email11']);
 $contact = htmlspecialchars($_REQUEST['contact']);
 $branch = htmlspecialchars($_REQUEST['branch']);
 $year = htmlspecialchars($_REQUEST['year']);
 $college = htmlspecialchars($_REQUEST['college']);
 $gender = htmlspecialchars($_REQUEST['gender']);
 $accomodation = htmlspecialchars($_REQUEST['accomodation']);
 $s_no;


 $query0 = mysqli_query($con,"select s_no from guest_comers where email='$email'");
 $row = mysqli_fetch_array($query0,MYSQLI_ASSOC);


if ($row['s_no']) {
	echo "<script type='text/javascript'>";
echo "alert('The email you entered is already registered. Try registering with a new email id. Thanks.')
window.location=('technical-events.html');";
echo "</script> ";
	}




else
 {$query1 = mysqli_query($con,"insert into guest_comers(name,gender,accomodation,email,contact,branch,year,college) values ('$name',
 	'$gender','$accomodation','$email','$contact','$branch','$year','$college')");}
$query2 = mysqli_query($con,"select s_no from guest_comers where email='$email'");
 
  $row = mysqli_fetch_array($query2,MYSQLI_NUM);
   $fest_id = 'TN-ID/GC0'.$row[0];
   $query3 = mysqli_query($con,"UPDATE guest_comers SET fest_id='$fest_id' WHERE email='$email'");
   mail($email, "Registration successfull. TECH-NOESIS 2015", "Thank you for registering with us. Your fest id is ".$fest_id);



echo "<script type='text/javascript'>";
echo "alert('Thanks for registering with us the fest id is sent to the email and phone you provided!')
window.location=('technical-events.html');";
echo "</script> ";

}




?>



