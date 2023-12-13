<?php 


require_once "../data/prodconnect.php";
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: errors/error.html');
  session_destroy();
  exit();
}
if (isset($_GET['logout'])) {
  session_destroy();
  header('Location: ../');
  exit();
}

$statemant1 = $pdo1->prepare("SELECT * FROM parts");
$statemant1->execute();
$parts = $statemant1->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <script src="admin.js" defer></script>
</head>
<body>
  <div class="content" style="width: 1600px; max-width: 100%; margin: auto; padding: 10px 5px;">
    <h1>MasterPC Admin Page</h1>
    <p>Create or Add New Part on your website</p>
    <button onclick="showAddForm()" class="btn btn-success">Add Parts</button>
    <div class="float-end mt-2">
      <a href="?logout=true" class="btn btn-info">Logout</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Category</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">image</th>
          <th scope="col">date</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach($parts as $i => $part): ?>
          <th scope="row"><?php echo $i + 1?></th> 
          <td><?php echo $part['category'] ?></td>
          <td><?php echo $part['title'] ?></td>
          <td><?php echo $part['price'] ?> ₾</td>
          <td>png</td>
          <td><?php echo $part['prouct_date'] ?></td>
          <td>
            <button class="btn btn-warning">Edit Part</button>
            <a href="actions/delete.php?id=<?php echo $part['id'] ?>" class="btn btn-danger">Remove</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div class="logingFormCont">
    <div class="logingForm">
    <form>
      <button class="btn" style="font-size: 30px;" onclick="hideAddForm()">X</button>
      <h2>Create Part</h2>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Select Image</label>
        <input type="file" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">About Part</label>
        <textarea class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="number" class="form-control">  
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>