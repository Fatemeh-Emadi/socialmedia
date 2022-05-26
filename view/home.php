<?php

include "header.php"; ?>
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
          <form method="post" action="posts" id="new-post-form" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Write caption</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"></textarea>
            </div>
            <div class=" mb-3">

              <input type="file" class="form-control" id="formFile" name="user_file">

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
      <?php foreach ($posts_array as $post) : ?>
        <div class="card">
          <div class="card-header ">
            <div class="row">
              <div class="col-2 mt-3">
                <img src=" <?php
                            if ($post["image"] != "") {
                              echo $post["image"];
                            } else {
                              if ($post["gender"] == 1) {
                                echo "images\users\woman.png";
                              } else {
                                echo "images\users\man.png";
                              }
                            }
                            ?>" class="img-fluid rounded-circle " alt="...">

              </div>
              <div class="col-4 mt-3">
                <p>
                  <?php echo $post["first_name"]; ?>

                </p>
                <p class="text-secondary"> <small>
                    <?php echo time2str($post["time"]); ?>
                  </small></p>
              </div>
            </div>

          </div>


          <div class="card-body">
            <p><?php echo $post["caption"]; ?></p>
            <?php if (isset($post["media"])) : ?>

              <?php if ($post["file_type"] == "image") : ?>
                <img src="<?php echo $post["media"]; ?>" class="img-fluid" width="100%" ;loading="lazy">
              
              <?php elseif ($post["file_type"] == "audio") : ?>
                <audio controls>
                  <source src="<?php echo $post["media"]; ?>" type="audio/mp3">
                </audio>
              
              <?php elseif ($post["file_type"] == "video") : ?>
                <video width="320" height="240" controls>
                  <source src="<?php echo $post["media"]; ?>" type="video/mp4">
                </video>
              <?php endif; ?>
            <?php endif; ?>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-3">


                <button type="button" class="btn  position-relative mt-1">
                  <i class="fa fa-heart"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo $post["likes"]["count"]; ?>

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
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $post["id_post"]; ?> " aria-expanded="false" aria-controls="collapse<?php echo $post["id_post"]; ?>">
                  Comments
                </button>
                </p>
                <div class="collapse" id="collapse<?php echo $post["id_post"]; ?>">
                  <div class="list-group">
                    <?php foreach ($post["comments"] as $comment) : ?>

                      <a href="#" class="list-group-item list-group-item-action" aria-current="true">

                        <div class="d-flex w-100 justify-content-between">
                          <small> <?php echo $comment["username"]; ?></small>

                          <h5 class="mb-1"><?php echo $comment["text"]; ?></h5>
                          <small> <?php echo time2str($comment["time"]); ?></small>
                        </div>
                      </a>


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