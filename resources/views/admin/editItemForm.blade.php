<div class="container p-5">

  <h4>Edit Product Detail</h4>
  <?php
  include_once "../config/dbconnect.php";
  $ID = $_POST['record'];
  $qry = mysqli_query($conn, "SELECT * FROM recipe WHERE ID_recipe='$ID'");
  $numberOfRow = mysqli_num_rows($qry);
  if ($numberOfRow > 0) {
    while ($row1 = mysqli_fetch_array($qry)) {
      $catID = $row1["ID_recipe"];
      ?>
      <form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
        <div class="form-group">
          <input type="text" class="form-control" id="ID_recipe" value="<?= $row1['ID_recipe'] ?>" hidden>
        </div>
        <div class="form-group">
          <label for="judul_recipe">Judul Resep:</label>
          <input type="text" class="form-control" id="judul_recipe" value="<?= $row1['judul_recipe'] ?>">
        </div>
        <div class="form-group">
          <label for="deskripsi_recipe">Recipe Description:</label>
          <input type="text" class="form-control" id="deskripsi_recipe" value="<?= $row1['deskripsi_recipe'] ?>">
        </div>
        <div class="form-group">
          <label for="durasi_masak">Durasi Masak:</label>
          <input type="time" class="form-control" id="durasi_masak" step="1" value="<?= $row1['durasi_masak'] ?>">
        </div>
        <div class="form-group">
          <label for="bahan_recipe">Bahan Masak:</label>
          <input type="text" class="form-control" id="bahan_recipe" value="<?= $row1['bahan_recipe'] ?>">
        </div>
        <div class="form-group">
          <label for="cara_masak">Cara Masak:</label>
          <input type="text" class="form-control" id="cara_masak" value="<?= $row1['cara_masak'] ?>">
        </div>
        <div class="form-group">
          <label for="url_recipe">Link:</label>
          <input type="text" class="form-control" id="url_recipe" value="<?= $row1['url_recipe'] ?>">
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <select id="category">
            <?php
            $sql = "SELECT * from kategori_recipe WHERE ID_cat_recipe='$catID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ID_cat_recipe'] . "'>" . $row['nama_cat_recipe'] . "</option>";
              }
            }
            ?>
            <?php
            $sql = "SELECT * from kategori_recipe WHERE ID_cat_recipe!='$catID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ID_cat_recipe'] . "'>" . $row['nama_cat_recipe'] . "</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <img width='200px' height='150px' src='<?= $row1["gambar_recipe"] ?>'>
          <div>
            <label for="existingImage">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?= $row1['gambar_recipe'] ?>" hidden>
            <input type="file" id="newImage" value="">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
        </div>
        <?php
    }
  }
  ?>
  </form>

</div>