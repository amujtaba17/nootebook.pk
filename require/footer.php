

<!-- Footer Content -->

<div class="container-fluid px-0">
  <footer class="py-2 my-5 position-absolute bottom-2 bg-info-subtle text-body-secondary py-5 w-100">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Blogs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Categories</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Posts</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About Us</a></li>
    </ul>
    <p class="text-center text-body-secondary">&copy; 2024 Notebook.pk - Ahmed Mujtaba Jawad &#10084;</p>
  </footer>
</div>



<!-- Footer Content -->





<script src="bootstrap/js/bootstrap.bundle.min.js"></script>    
<script src="bootstrap/sidebars.js"></script>    
<script src="Files/dataTables.js"></script>
<script src="validation/register_validation.js"></script>
<script src="validation/admin_user_reg.js"></script>
<script src="validation/blog_validation.js"></script>
<script src="validation/category_validation.js"></script>
<script src="validation/post_validation.js"></script>



<script type="text/javascript">
        new DataTable('#example');
    </script>


<script>
  function showpas(){
  var show=document.getElementById("show");
  var password=document.getElementById("password");
  // console.log(password);
  console.log(show);
  if(show.checked==true){
    password.type="text";
  }else{
    password.type="password";
  }
}
</script>

</body>
</html>