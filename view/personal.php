<?php
include "header.php"; ?>
<?php include "navbar.php"; ?>
<div class="container-fluid">

  <div class="row  mt-5">
    <div class="col-3 ">
      <?php foreach ($all_users as $users) : ?>
        <div class="card">
          <div class="card-header ">
            <div class="row">
              <div class="col-3 mt-1">
                <img src=" <?php
                            if ($users["image"] != "") {
                              echo $users["image"];
                            } else {
                              if ($users["gender"] == 1) {
                                echo "images\users\woman.png";
                              } else {
                                echo "images\users\man.png";
                              }
                            }
                            ?>" class="img-fluid rounded-circle " alt="...">

              </div>
              <div class="col-4 mt-3">
                <p>
                  <?php echo $users["username"]; ?>

                </p>

              </div>
              <form id="form-follow-<?php echo $users["id"];?>">
              <div class="col-4 mt-3">
              <input type="hidden" name="follow_id" value="<?php echo $users["id"];?>">
                <button type="button" onclick='follow(<?php echo $users["id"]; ?>)' class="btn btn-outline-secondary" id="btn-follow-<?php echo $users["id"];?>">follow</button>

              </div>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        

    </div>
    <div class="col-6 ">
      <div class="card border-0 shadow bg-body rounded">
        <div class="card-header " style="background-color: white;">
          <div class="row">
          <div class="col-3 ">
            <img src="<?php echo $_SESSION["user_image"];?>" class="img-fluid rounded-circle " alt="...">


            </div>

            <div class="col-3 mt-5">
              <p style="font-size: 25px;">

                <?php echo $_SESSION["username"]; ?>
              </p>


            </div>
            
            <div class="col-3 mt-5">
            <p style="font-size: 18px;"class="text-secondary">
              <span ><?php echo $post["followers"]["count"];?> follower</span>
            </p>
              
             
            </div>
            <div class="col-3 mt-5">
            <p style="font-size: 18px;" class="text-secondary">
              <span ><?php echo $post["followers"]["count"];?> following</span>
            </p> 
             
            </div>
           
          </div>

          <div class="card-body">
            <div class="row">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Posts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Freinds</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Photos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Videos</a>
                </li>
              </ul>
            </div>


          </div>

        </div>
      </div>




    

  
  
    


        <div class="card mt-5">
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
    <div class="row justify-content-center ">
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
                  <form id="form-like-<?php echo $post["id"]; ?>">
                    <input type="hidden" name="post_id2" value="<?php echo $post["id"]; ?>">
                    <button type="button" onclick='send_like(<?php echo $post["id"]; ?>)' class="btn btn-outline-secondary " id="btn-like-<?php echo $post["id"]; ?>">
                      <i class="fa fa-heart"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="count-like-<?php echo $post["id"]; ?>">
                        <?php echo $post["likes"]["count"]; ?>

                      </span>

                  </form>
                </div>
                <div class="col-9">
                  <form class="row gy-2 gx-3 align-items-center" id="form-comment-<?php echo $post["id"]; ?>">
                    <div class="col-auto">

                      <input type="text" class="form-control" placeholder="Write comment" name="text">
                      <input type="hidden" name="post_id" value="<?php echo $post["id"]; ?>">
                    </div>

                    <div class="col-auto">
                      <button type="button" onclick='send_comment(<?php echo $post["id"]; ?>)' class="btn btn-primary">send</button>
                    </div>
                  </form>

                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $post["id"]; ?> " aria-expanded="false" aria-controls="collapse<?php echo $post["id"]; ?>">
                    Comments
                  </button>
                  </p>
                  <div class="collapse" id="collapse<?php echo $post["id"]; ?>">
                    <ul class="list-group" id="list-comments-<?php echo $post["id"]; ?>">
                      <?php foreach ($post["comments"] as $comment) : ?>

                        <li class="list-group-item list-group-item-action" aria-current="true">

                          <div class="d-flex w-100 justify-content-between">
                            <small> <?php echo $comment["username"]; ?></small>


                            <small> <?php echo time2str($comment["time"]); ?></small>
                          </div>
                          <p class="mb-1"><?php echo $comment["text"]; ?></p>
                        </li>


                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>


            </div>
          </div>
          <br>
          <br>
        <?php endforeach; ?>
     

 
  </div>
  <div class="mb-5"></div>
  <script>
    function follow(follower_id){
    let btn=document.getElementById("btn-follow-"+follower_id);
   
    let form=document.getElementById("form-follow-"+follower_id);
    let form_data=new FormData(form);
  
    fetch("follow",{
      method:"post",
      body:form_data
    }).then(
      result=>result.text()
      
    ).then(result=>{
      console.log(result);
      if(result==1){
       
        btn.classList.remove("btn-outline-secondary");
        btn.classList.add("btn-secondary");
        
        btn.innerHTML="following";
      }
      else if(result==0){
        btn.classList.remove("btn-secondary");
        btn.classList.add("btn-outline-secondary");
        
        btn.innerHTML="follow";
      }
    }).catch(error=>{
      alert(error)
    });
  
  }
  function send_like(post_id){
    let btn=document.getElementById("btn-like-"+post_id);
    let count_number_tag=document.getElementById("count-like-"+post_id);
    let form=document.getElementById("form-like-"+post_id);
    let form_data=new FormData(form);
  
    fetch("send-like",{
      method:"post",
      body:form_data
    }).then(
      result=>result.text()
      
    ).then(result=>{
      console.log(result);
      if(result==1){
       
        btn.classList.remove("btn-outline-secondary");
        btn.classList.add("btn-secondary");
        let number=count_number_tag.innerHTML;
        number++;
        count_number_tag.innerHTML=number;
      }
      else if(result==0){
        btn.classList.remove("btn-secondary");
        btn.classList.add("btn-outline-secondary");
        let number=count_number_tag.innerHTML;
        number--;
        count_number_tag.innerHTML=number;
      }
    }).catch(error=>{
      alert(error)
    });
  
  }
  
   function send_comment(post_id){
    let form = document.getElementById("form-comment-"+post_id);
    let form_data = new FormData(form);
  
    fetch("send-comment" , {
      method:"post",
      body:form_data
    }).then(result=>result.text()
    ).then(result=>{
      console.log(result);
      if(result==1){
    
    
      let list_comments = document.getElementById("list-comments-"+post_id);
  
      let li = document.createElement("LI");
      li.classList.add("list-group-item");
      li.classList.add("list-group-item-action");
  
      let p=document.createElement("P");
      p.classList.add("mb-1");
      p.innerHTML = form_data.get("text");
     
      li.appendChild(p);   
      list_comments.appendChild(li);
      }
    }).catch(error=>{
      alert(error);
    });
  
  
  }
  </script>
  <?php include "footer.php"; ?>