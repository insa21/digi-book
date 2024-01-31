<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
  if ($_GET['id'] != "") {

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film='$id'");
    $row = mysqli_fetch_array($query);

    // gendre film di ambil dari data base
    $a = $row['gendre_film'];
    $checked = explode(", ", "$a");
  } else {
    header("location:index.php");
  }
} else {
  header("location:index.php");
}

?>

<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'komponen/header.php';
?>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card-wrapper">
        <!-- Custom form validation -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Custom styles</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8">
                <!-- <p class="mb-0">
                      For custom form validation messages, you’ll need to add the novalidate boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form
                      validation APIs in JavaScript.
                      <br /><br />
                      When attempting to submit, you’ll see the<code>:invalid</code> and <code>:valid</code> styles applied to your form controls.
                    </p> -->
              </div>
            </div>

            <hr />
            <form class="needs-validation" action="edit_act.php" method="post" enctype="multipart/form-data" novalidate>
              <div class="form-row">
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-header">
                      <div class="form-input">
                        <div class="preview">
                          <img id="file-ip-1-preview">
                        </div>
                        <?php
                        if ($row['photo_film'] == "") { ?>
                          <img src="https://via.placeholder.com/500x500.png?text=PHOTO+THUMBNAIL+FILM" style="width:100px;height:100px;">
                        <?php } else { ?>
                          <img src="foto/<?php echo $row['photo_film']; ?>" style="width:100px;height:100px;">
                        <?php } ?>
                        <label for="file-ip-1">Upload Image</label>
                        <input type="file" id="file-ip-1" accept="image/*" name="photo" onchange="showPreview(event);">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-12">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="enter Id" value="<?php echo $row['id_film']; ?>" required>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <label class="form-control-label" for="id"> LINK :</label>
                  <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link" value="<?php echo $row['link_film']; ?>" required>

                  <br>
                  <label class="form-control-label" for="name"> Movie Name :</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="enter movie name" value="<?php echo $row['name_film']; ?>" required>
                  <br>
                  <label class="form-control-label" for="production"> Production :</label>
                  <input type="text" class="form-control" id="production" name="production" placeholder="enter production" value="<?php echo $row['production_film']; ?>" required>
                  <br>
                  <div class="col-md-20 mb-12">
                    <label class="form-control-label" for="director"> Director :</label>
                    <input type="text" class="form-control" id="director" name="director" placeholder="Enter Director" value="<?php echo $row['director_film']; ?>" required>
                  </div>

                </div>
                <div class="col-md-2 mb-3">
                  <label class="form-control-label" for="quality"> Quality : </label>
                  <select class="form-control" name="quality" id="quality">
                    <option><?php echo $row['quality_film']; ?></option>
                    <option value="Blueray">Blueray</option>
                    <option value="Web-DL">Web-DL</option>
                    <option value="HD-Rip">HD-Rip</option>
                    <option value="DVD-Rip">DVD-Rip</option>
                    <option value="CAM/HDCAM">CAM/HDCAM</option>
                  </select>
                  <!-- <div class="valid-feedback">
                        Good Job!
                      </div>
                          <div class="invalid-feedback">
                           Please fill in this column!
                      </div> -->
                  <br>
                  <label class="form-control-label" for="resulation"> Resulation : </label>
                  <select class="form-control" name="resulation" id="resulation">
                    <option><?php echo $row['resulation_film']; ?></option>
                    <option value="720p">720p</option>
                    <option value="1080p">1080p</option>
                    <option value="1440p">1440p</option>
                    <option value="4K">4K</option>
                    <option value="8K">8K</option>
                  </select>
                  <br>
                  <label class="form-control-label" for="release"> Release :</label>
                  <input class="form-control datepicker" id="release" name="release" placeholder="Select date" value="<?php echo $row['release_film']; ?>" required>
                  <br>
                  <label class="form-control-label" for="example-time-input"> Time :</label>
                  <input class="form-control" type="time" name="duration" id="example-time-input" value="<?php echo $row['duration_film']; ?>">
                </div>
                <div class="col-md-2 mb-3">
                  <label class="form-control-label" for="imdb"> IMDB Rating :</label>
                  <input type="text" class="form-control" name="imdb" id="imdb" placeholder="Enter IMDB" value="<?php echo $row['imdb_film']; ?>" required>
                  <br>
                  <label class="form-control-label" for="country"> Country :</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="enter country" value="<?php echo $row['country_film']; ?>" required>
                  <br>
                  <div class="card">
                    <div class="card-header">
                      <label class="form-control-label" for="gendre"> Gendre :</label>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="custom-control custom-checkbox">

                        <input class="custom-control-input" id="animation" name="gendre[]" type="checkbox" value="animation" <?php if (in_array('animation', $checked)) {
                                                                                                                                echo "checked";
                                                                                                                              }  ?>>
                        <label class="custom-control-label" for="animation">Animation</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="horor" value="horor" name="gendre[]" type="checkbox" <?php if (in_array('horor', $checked)) {
                                                                                                                        echo "checked";
                                                                                                                      }  ?>>
                        <label class="custom-control-label" for="horor">Horor</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="romance" value="romance" name="gendre[]" type="checkbox" <?php if (in_array('romance', $checked)) {
                                                                                                                            echo "checked";
                                                                                                                          }  ?>>
                        <label class="custom-control-label" for="romance">Romance</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="sci-fi" value="sci-fi" name="gendre[]" type="checkbox" <?php if (in_array('sci-fi', $checked)) {
                                                                                                                          echo "checked";
                                                                                                                        }  ?>>
                        <label class="custom-control-label" for="sci-fi">Sci-fi</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="adventure" value="adventure" name="gendre[]" type="checkbox" <?php if (in_array('adventure', $checked)) {
                                                                                                                                echo "checked";
                                                                                                                              }  ?>>
                        <label class="custom-control-label" for="adventure">Adventure</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="action" value="action" name="gendre[]" type="checkbox" <?php if (in_array('action', $checked)) {
                                                                                                                          echo "checked";
                                                                                                                        }  ?>>
                        <label class="custom-control-label" for="action">Action</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-header">
                      <label class="form-control-label" for="actors"> Actors :</label>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <form>
                        <input type="text" id="actors" class="form-control" name="actors" value="<?php echo $row['actors_film']; ?>" data-toggle="tags" required />
                      </form>
                    </div>

                  </div>
                </div>
                <div class="col-md-8 mb-8">
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                      <label class="form-control-label" for="synopsis"> Synopsis :</label>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                      <div class="form-group">
                        <textarea class="form-control" name="synopsis" required id="synopsis" rows="4"><?php echo $row['synopsis_film']; ?></textarea>
                      </div>

                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox mb-3">
                    <!-- <input class="custom-control-input" id="invalidCheck2" type="checkbox" required>
                      <label class="custom-control-label" for="invalidCheck2">Agree to terms and conditions</label>
                      <div class="invalid-feedback">
                        You must agree before submitting.
                      </div> -->
                  </div>
                  <button class="btn btn-primary" type="submit" name="submit"> Submit form </button>
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>


    <?php
    include 'komponen/footer.php';
    ?>



    <style>
      .form-input {
        width: 350px;
        padding: 20px;
        background: #fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
          3px 3px 7px rgba(94, 104, 121, 0.377);
      }

      .form-input input {
        display: none;


      }

      .form-input label {
        display: block;
        width: 45%;
        height: 45px;
        margin-left: 25%;
        line-height: 50px;
        text-align: center;
        background: #1172c2;

        color: #fff;
        font-size: 15px;
        font-family: "Open Sans", sans-serif;
        text-transform: Uppercase;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
      }

      .form-input img {
        width: 100%;
        display: none;

        margin-bottom: 30px;
      }
    </style>



    <!-- Optional JS -->
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>





    <script type="text/javascript">
      function showPreview(event) {
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }
    </script>