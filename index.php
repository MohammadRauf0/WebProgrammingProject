<?php
  include('dashboardIncludes/header.html');
?>

<div class="container mt-5">
  <div class="row">
    <div class="col"></div>
    <div class="col ">
      <h3>Login</h3>
      <form action="Authentication.php" method="POST" class="form-float">
        <label class="mt-3">Email</label>
        <input type="email" class="form-control" placeholder="example@email.com">

        <label class="mt-3" >Password</label>
        <input type="password" class="form-control" placeholder="123123123">

        <button type="submit" class="btn btn-outline-success float-end mt-3">Login</button>


      </form>
    </div>
    <div class="col"></div>

  </div>
</div>

<?php
  include('dashboardIncludes/footer.html');
?>