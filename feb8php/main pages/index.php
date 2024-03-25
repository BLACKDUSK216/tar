<!DOCTYPE html>
<html>
 <head>
  <title>Dynamic Treeview using PHP Mysql Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <!-- <link rel="stylesheet" href="style.css">  -->
 </head>
 <body>
  <div class="container">
   <h2 align="center">Dynamic Treeview using PHP Mysql Ajax</h2>
   <div class="row">
    <div class="col-md-6">
     <h3 align="center"><u>Add New User</u></h3>
     <form method="post" id="treeview_form">
      <div class="form-group">
       <label>Select Parent User</label>
       <select name="parent_category" id="parent_category" class="form-control">
       
       </select>
      </div>
      <div class="form-group">
       <label>Enter User Name</label>
       <input type="text" name="category_name" id="category_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
     </form>
    </div>
    <div class="col-md-6">
     <h3 align="center"><u>User Tree</u></h3>
     <div id="treeview"></div>
    </div>
   </div>
  </div>
 </body>
</html>
 <script>
 $(document).ready(function(){

  fill_parent_category();

  fill_treeview();
  
  function fill_treeview()
  {
   $.ajax({
    url:"fetch.php",
    dataType:"json",
    success:function(data){
     $('#treeview').treeview({
      data:data
     });
    }
   })
  }

  function fill_parent_category()
  {
   $.ajax({
    url:'fill_parent_category.php',
    success:function(data){
     $('#parent_category').html(data);
    }
   });
   
  }

  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   $.ajax({
    url:"add.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
     fill_treeview();
     fill_parent_category();
     $('#treeview_form')[0].reset();
     alert(data);
    }
   })
  });
 });
</script>