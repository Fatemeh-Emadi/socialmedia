<?php include "header.php"; ?>
<?php include "navbar.php";




?>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-6 ">


      <div class="card">
        <div class="card-header ">
          What's on your mind?
        </div>
        <div class="card-body">
          <form method="post" action="posts" id="new-post-form">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Write caption</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"></textarea>
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
      <?php foreach ($posts as $post) : ?>
        <div class="card">
          <div class="card-header ">
            <div class="row">
              <div class="col-2 mt-3">
                <img src=" <?php echo $post["image"]; ?>" class="img-fluid rounded-circle " alt="...">

              </div>
              <div class="col-4 mt-3">
                <p>
                  <?php echo $post["username"]; ?>

                </p>
                <p class="text-secondary"> <small>
                    <?php echo $post["time"]; ?>
                  </small></p>
              </div>
            </div>

          </div>


          <div class="card-body">
            <p><?php echo $post["caption"]; ?></p>
            <img src="<?php echo $post["media"]; ?>" class="img-fluid" width="100%" ;>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-3">


                <button type="button" class="btn  position-relative mt-1">
                  <i class="fa fa-heart"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>

              </div>
              <div class="col-9">
                <form class="row gy-2 gx-3 align-items-center">
                  <div class="col-auto">

                    <input type="text" class="form-control" id="autoSizingInput" placeholder="Write comment">
                  </div>

                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary">send</button>
                  </div>
                </form>

              </div>
            </div>
            <div class="row">
              <div class="col">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $post["p_id"]; ?> " aria-expanded="false" aria-controls="collapse<?php echo $post["p_id"]; ?>">
                  Comments
                </button>
                </p>
                <div class="collapse" id="collapse<?php echo $post["p_id"]; ?>">
                  <div class="list-group">
                    <?php foreach ($comments as $comment) : ?>
                      <?php if ($post["p_id"] == $comment["post_id"]) : ?>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">

                          <div class="d-flex w-100 justify-content-between">

                            <h5 class="mb-1"><?php echo $comment["text"]; ?></h5>
                            <small> <?php echo $comment["username"]; ?></small>
                          </div>
                        </a>
                      <?php endif; ?>

                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <br>
        <br>
      <?php endforeach; ?>
    </div>
  </div>

</div>


<?php include "footer.php"; ?>