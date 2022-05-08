<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-6 ">


      <div class="card">
        <div class="card-header ">
          What's on your mind?
        </div>
        <div class="card-body">
          <form method="post" action="controller/posts.php" id="new-post-form">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Write caption</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class=" mb-3">

              <input type="file" class="form-control" id="formFile">

            </div>
          </form>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit" form="new-post-form">Upload new post</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-6 ">
      <div class="card">
        <div class="card-header ">
          <div class="row">
            <div class="col-2 mt-3">
              <img src="images/a.jpg" class="img-fluid rounded-circle " alt="...">

            </div>
            <div class="col-10 mt-4">
              <p>
                fateme

              </p>
              <p class="text-secondary"> <small>
                  7 hours ago
                </small></p>

            </div>

          </div>
        </div>

        <div class="card-body">
          <p>Hello:) My name is fateme</p>
          <img src="images/a.jpg " class="img-fluid">
        </div>

        <div class="card-footer">
          <button type="button" class="btn  position-relative mt-1">
            <i class="fa fa-heart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              99+
              <span class="visually-hidden">unread messages</span>
            </span>
          </button>
        </div>
      </div>

    </div>
  </div>

</div>


<?php include "footer.php"; ?>