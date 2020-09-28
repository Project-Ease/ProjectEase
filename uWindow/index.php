<!doctype html>
<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "peuw";
    $con = mysqli_connect($server, $username, $password,$database);
    if(mysqli_connect_errno())
    {
      echo "Failed to connect: " . mysqli_connect_errno();
    }
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
 ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div>
      <h1 class="text-light text-center">
        <?php
        $sql = "SELECT team_name FROM project_disp where id=1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        echo "$row[0]";
        ?>
      </h1>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-white" href="#"> Database </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">💬</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">📊</a>
        </li>
        <li class="nav-item dropleft">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            👱🏻‍♀️
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>


  <!-- in this section team name, team members and , responsibilities are defined
 also team members will be dynamic and change cards view according to the number of team members -->



  <section>
    <div class="page-heading">
        <div style="margin-top: 25px;"class="team-name">
          <div>
            <div>
                <h2 class="text-center Heading-bg">
                  <?php
                  $sql = "SELECT project_title FROM project_disp where id=1";
                  $result = mysqli_query($con, $sql);
                  $row = mysqli_fetch_array($result);
                  $count = mysqli_num_rows($result);
                  echo "$row[0]";
                  ?>
                </h2>
            </div>
          </div>
        <div style="margin-top: 15px;" class="project-idea Heading-bg">
          <h4 class="text-center" style="color:white; margin-bottom: 30px;">Project idea</h4>
            <h3 class="project-idea-heading text-center">
              <?php
                $sql = "SELECT idea FROM project_disp where id=1";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                echo "$row[0]";
              ?>
            </h3>
        </div>
      </div>
    </div>

    <br class="lineBreak">

    <div class="team-members" style="margin-top: 10%;">
      <div style="margin-left: 35%; margin-right: 36%; margin-bottom: 1.2%; padding: 0.5%;" class="Heading-bg">
        <h4 class="text-center" style="color:white;">Team Members</h4>
      </div>

        <div>

              <?php
                  $sql = "SELECT name FROM team_members";
                  $sql1 = "SELECT enroll_id FROM team_members";
                  $sql2 = "SELECT resp FROM team_members";
                  $result = mysqli_query($con, $sql);
                  $result1 = mysqli_query($con, $sql1);
                  $result2 = mysqli_query($con, $sql2);
                  $row = mysqli_fetch_all($result);
                  $row1 = mysqli_fetch_all($result1);
                  $row2 = mysqli_fetch_all($result2);
                  $count = mysqli_num_rows($result);
                  for ($i=0; $i < $count; $i++) {
                        echo "<div class='card text-white member-cards bg-primary mb-3' style='max-width: 18rem; min-width: 18rem;
                        min-height: 15rem;'>";
                        echo " <div class='card-header'> ";
                            print_r($row[$i][0]);
                        echo "</div>";
                        echo "  <div class='card-body'> ";
                        // echo "<img height='50px' width='50px' src='gui/alitaWallpapaer.jpeg'>";
                        echo " <h5 class='card-title'>";
                            print_r($row1[$i][0]);
                        echo "</h5>";
                        echo " <p class='card-text'>";

                            print_r($row2[$i][0]);

                        echo "</p>";
                        echo " </div> ";
                        echo " </div> ";
                      }
              ?>
          </div>
    </div>
  </section>


  <!-- this section is code upload window -->
  <section>
          <div style="margin-top: 11%; margin-left: 25%; margin-right: 25%; padding: 0.7%;" class="Heading-bg">
              <h4 class="text-center">Code</h4>
          </div>

          <div id="code-upload-win">
              <textarea  style="margin: auto; margin-left: 7%; color: white; background-color: #16213e;"name="code-upload-window" rows="20" cols="150">hey there upload your code here</textarea>
          </div>


          <div class="Heading-bg" style="margin-left: 7%; margin-right: 8%; background: #fbecec;">
                <?php
                    $sql = "SELECT file_name FROM file_upload";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_all($result);
                    $count = mysqli_num_rows($result);
                    for ($i=0; $i < $count; $i++) {
                      echo "<div class='list-group'>";
                      echo "<a href='#' class='list-group-item list-group-item-action'>";
                          print_r($row[$i][0]);
                      echo "</a>";
                          echo "</div>";
                        }
                ?>
          </div>
  </section>
  <form style="margin-left: 7%; margin-right: 8%; background: #fbecec;" class="form Heading-bg" method="post" enctype="multipart/form-data">
    <div class="custom-file">
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input class="btn btn-primary" type="submit" value="Upload File" name="submit">
    </div>

      <?php
      $statusMsg = '';
      $targetDir = "upload/";
      $fileName = $_FILES["fileToUpload"]["name"];     // disp;
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      $team_id=12345;
      if(isset($_POST["submit"])){
          // Allow certain file formats
          $allowTypes = array('rar','txt','zip','pdf', 'doc', 'docx', 'py', 'java', 'cpp', 'js', 'css', 'html', 'php');
          if(in_array($fileType, $allowTypes)){
              // Upload file to server
              if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)){
                  // Insert image file name into database
                  $insert = $con->query("INSERT into file_upload (file_name, uploaded_on, team_id) VALUES ('".$fileName."', NOW(), $team_id)");
                  if($insert){
                      $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                  }else{
                      $statusMsg = "File upload failed, please try again.";
                  }
              }else{
                  $statusMsg = "Sorry, there was an error uploading your file.";
              }
          }else{
              $statusMsg = 'only rar, JPEG, zip, pdf, docx & doc files are allowed to upload.';
          }
      }else{
          $statusMsg = 'Please select a file to upload.';
      }
      echo $statusMsg;
      ob_end_flush();
      ?>
  </form>

  <section>
    <div>
      <div style="margin-top: 11%; margin-left: 25%; margin-right: 25%; padding: 0.7%;" class="Heading-bg">
        <h4 class="text-center font-weight-bold" style="font-size: 30px;">GUI</h4>
      </div>
    </div>

    <div style="display: inline-block; margin-left:4%; margin-right: 4%; margin-bottom: 1%;" class="gui-images Heading-bg">

      <?php
          $sql = "SELECT snap_name FROM project_gui";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_all($result);
          $count = mysqli_num_rows($result);
          for ($i=0; $i < $count; $i++) {
            // echo "<div>";
            //     print_r($row[$i][0]);
            //     echo "</div>";
            echo "<div style='margin: 1%; display: inline-block;'>";
            echo "<img class=rounded' height='300px' width='400px' class='gui-image' src='gui/";
            echo $row[$i][0];
            echo "'>";
            echo "</div>";
              }
      ?>
    </div>
    <form style="margin-left:4%; margin-right: 4%;" class="form Heading-bg" method="post" enctype="multipart/form-data">
      <div>
        <input type="file" name="imageToUpload" id="imageToUpload">
        <input class="btn btn-primary" type="submit" value="Upload Image" name="submit" action="index.php">
      </div>

        <?php
        $statusMsg = '';
        $targetDir = "gui/";
        $fileName = $_FILES["imageToUpload"]["name"];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $team_id=12345;
        if(isset($_POST["submit"])){
            // Allow certain file formats
            $allowTypes = array('jpeg','jpg','png','gif');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $con->query("INSERT into project_gui (snap_name, uploaded_on, team_id) VALUES ('".$fileName."', NOW(), $team_id)");
                    if($insert){
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    }
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'only rar, JPEG, zip, pdf, docx & doc files are allowed to upload.';
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
        }
        echo $statusMsg;
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(E_ALL);
        ?>
    </form>

    <div style="margin-top: 5%;" class="wiki">
      <div style="margin-left: 35%; margin-right: 36%; margin-bottom: 1.2%; padding: 0.5%;" class=" text-center Heading-bg">
        <h4>Wiki :-</h4>
      </div>
      <div style="margin-left: 4.5%; margin-right:5%;" class="Heading-bg">
        <?php
            $sql = "SELECT wiki FROM project_disp where id = 1";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_all($result);
            $count = mysqli_num_rows($result);
            for ($i=0; $i < $count; $i++) {
              echo "<p>";
                  print_r($row[$i][0]);
                  echo "</p>";
                }
        ?>
      </div>

    </div>
  </section>

  <section style="margin-top: 10%;" class="Heading-bg">
    <div class="marks">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <!-- Name: <input type="text" name="fname"> -->
                  <h2>marks: </h2>
                  <input type="number" name="marks" value=
                        <?php
                            $sql = "SELECT marks FROM team_members where id=1";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            echo "$row[0]>";
                        ?>
                  <h2>remarks :</h2>
                  <textarea name="fname" rows="8" cols="80"><?php
                        $sql = "SELECT remarks FROM team_members where id=1";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $count = mysqli_num_rows($result);
                        echo "$row[0]";
                    ?></textarea>
                  <input type="submit">
            </form>

            <?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  // collect value of input field
                          $name = $_POST['fname'];
                          $marks = $_POST['marks'];
                          if (empty($name)) {

                          } else {
                            $sql = "UPDATE team_members SET remarks = '$name' WHERE id = 1";
                            mysqli_query($con, $sql);
                          }

                          if(empty($marks))
                          {

                          } else {
                            $sql = "UPDATE team_members SET marks = '$marks' WHERE id = 1";
                            mysqli_query($con, $sql);
                          }
                        }
            ?>
    </div>
  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="script.js" charset="utf-8"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>




</body>

</html>
