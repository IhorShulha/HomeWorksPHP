<?php 
include 'index.html';
 
 $remember = $_POST['remember'];
 
 $gender = $_POST['gender'];
	
 	

	if (empty($_POST[gender])) {
    echo "<br>Выбирете ваш пол";
	  }
	if (isset($gender) && $gender=="male") {
	  echo "Уважаемый!<br/>";
	  }
	 if (isset($gender) && $gender=="female") {
  	  echo "Уважаемая!<br/>";
  	  }

  	  if ($_POST[remember]) {
 		echo "Мы вас запомнили!";
 	  }