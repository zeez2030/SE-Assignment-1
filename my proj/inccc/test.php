<?php
			include 'student.php';
			include 'header.php';



			if(isset($_POST['name']) && $_POST['name']!= ''){
       		$name = $_POST['name'];
       		$std = new Student();
       		$std->create($name);

      }

 ?>
  <form class="form-group container" action="#" method="post">
   <div class="form-group">
     <label for="">Search Name:</label>
     <input type="text" class="mt-1 form-control" name="name" placeholder="name">
   </div>
   <input type="submit" class="mt-2 btn btn-primary" name="" value="Search">
 </form>
 <?php
 		$stud=$std->all();
 	foreach ($stud as $st ) {
 		echo "<p class='mb-3'>".$st['name']."  id: ".$st['id']."</p>";
 	}


  ?>




 <?php include'footer.php'; ?>
