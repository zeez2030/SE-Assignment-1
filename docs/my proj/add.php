<?php

      include 'inccc/student.php';
      include_once('./inc/header.php');
 ?>
 <?php
 $db=new Student();
 if(isset($_POST['name']) && $_POST['name']!= '' && $_POST['name']!= 'name'){
     $name = $_POST['name'];
     $db->createe($name);
 }
 $students = $db->all();
  ?>

<div class="container">
<form class="form-group" action="add.php" method="post">
  <input type="text" name="name" class="form-control"placeholder="name">
  <input type="submit" class=" my-3 btn btn-primary" value="Add student">
  </form>
</div>

<div class="container">
  <table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
      </tr>
    </thead>
    <?php foreach($students as $std) : ?>
      <?php if($std['name'] == ''){
        continue;
      }
       ?>
    <tbody>
      <tr>
        <td scope="row"><?php echo $std['id']; ?></td>
        <td> <span class="h4 text-dark my-3"> <?php echo $std['name'] ?> </span> </td>
        <td><a href="info.php?id=<?php echo $std["id"]; ?>" class="btn btn-primary mr-3 mb-1">Info</a>
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
        xmh.open("GET" , 'inccc/delete.php?id='+id ,true);
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
