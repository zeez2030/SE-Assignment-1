<?php
      include 'inccc/Gradesclass.php';
      include_once('./inc/header.php');
      $grade=new Grades();
      if(isset($_POST['grade'])){
      $grades = $_POST["grade"];
      $name= $grades['student'];
      $max= $grades["course"];
      $deg=$grades["degree"];
      $grade->createG($name , $max , $deg );
    }
      $grades = $grade->all();
 ?>


 <div class="container">
   <h3 class="display-2">Grades section</h3>
   <form class="form-group" action="grades.php" method="post">
     <input type="number" name="grade[student]" class="form-control mb-3"value="" placeholder="Student id">
     <input type="number" name="grade[course]" class="form-control mb-3"value="" placeholder="course id">
     <input type="number" name="grade[degree]" class="form-control mb-3"value="" placeholder="degree">
   <input type="submit" class="btn btn-primary my-4"name="" value="Add grade">
   </form
 </div>
 <div class="container">
   <table class="table table-striped mt-4">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">student id</th>
         <th scope="col">course id</th>
         <th scope="col">degree</th>
       </tr>
     </thead>
     <?php foreach($grades as $std) : ?>
       <?php if($std['degree'] == ''){
         continue;
       }
        ?>
     <tbody>
       <tr>
         <td scope="row"><?php echo $std['id']; ?></td>
         <td> <span class="h4 text-dark my-3"> <?php echo $std['student_id'] ?> </span> </td>
         <td> <span class="h4 text-dark my-3"> <?php echo $std['course_id'] ?> </span> </td>
         <td> <span class="h4 text-dark my-3"> <?php echo $std['degree'] ?> </span> </td>
         <td><a href="ginfo.php?id=<?php echo $std["id"]; ?>" class="btn btn-primary mr-3 mb-1">Info</a>
         <a href="" class="btn btn-danger mb-1 delete" id="<?php echo $std["id"]; ?>">Delete</a></td>
       </tr>
     </tbody>
   <?php endforeach; ?>
   </table>
 </div>
 <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script>
 <script type="text/javascript">
     $(document).ready(function(){
       $(".delete").click(function(){
         var anchor = $(this);
         var id = anchor.attr('id');
         var xmh = new XMLHttpRequest();
         xmh.open("GET" , 'inccc/deletegrade.php?id='+id ,true);
         xmh.send();
         xmh.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             $(this).remove();
        }
      }
       });
     });
 </script>


<?php include_once('./inc/footer.php'); ?>
