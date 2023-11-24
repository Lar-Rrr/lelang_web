<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar_mas.php')?>
<div class="content-wrapper">
<section class="content-header">
  <div class="card">
                    <div class="card-header">
                      <h4 class="text-lelang"><b>History Penawaran</b></h4>
                    </div>
    <div class="card-body row">
      <div
        class="col-5 text-center d-flex align-items-center justify-content-center"
      >
        <div class="text-lelang">
          <h2><strong>SI LELANG</strong></h2>
     
        </div>
      </div>
      <div class="col-7">
        <div class="form-group">
          <label for="inputName">Name</label>
          <input type="text" id="inputName" class="form-control" />
        </div>
        <div class="form-group">
          <label for="inputEmail">E-Mail</label>
          <input type="email" id="inputEmail" class="form-control" />
        </div>
        <div class="form-group">
          <label for="inputSubject">Subject</label>
          <input type="text" id="inputSubject" class="form-control" />
        </div>
        <div class="form-group">
          <label for="inputMessage">Message</label>
          <textarea id="inputMessage" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" class="btn" id="btn" value="Send message" />
        </div>
      </div>
    </div>
  </div>  
</section>
</div>


<?php include("../App/footer.php") ?>
