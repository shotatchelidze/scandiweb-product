<?php require '../app/views/inc/header.php' ?>


<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
  <div class="container-fluid">
    <a href="<?php echo URLROOT?>" class="navbar-brand pl-5 pt-2 pb-2">Product List</a>
    <ul class="navbar-nav pr-5 pt-2 pb-2">

      <!-- add new product -->
      <li class="nav-item pl-2 order-1">
        <a href="<?php echo URLROOT; ?>/products/add" class="btn btn-outline-light">
          Add Product
        </a>
      </li>
      <!-- drop down list -->
      
      <li class="nav-item pl-2 order-4">
        <form action="<?php echo URLROOT;?>/productList/index" method="GET"> 
        <select class="btn btn-secondary dropdown-toggle" type="button" name="productSelect" id="list" >
          <div class="dropdown-menu">
            <option class="btn dropdown-item" name="selectAll" value="selectAll" id="selectAll">All</option>
            <option class="btn dropdown-item" name="book" value="book" id="Book">Book</option>
            <option class="btn dropdown-item" name="disk" value ="disk"id="Disk"> Disk</option>
            <option class="btn dropdown-item" name="furniture" value="furniture"id="Furniture">Furniture</option>
          </div>
        </select>
        <input class="btn btn-outline-light" type="submit" value="Apply"></input>  
        </form>
      </li>
      
      <li class="nav-item pl-2 order-2">
          <input class="btn btn-outline" type="button" onclick='selectAll()' value="Select All">
      </li>
      <li class="nav-item pl-2 order-2">
          <input class="btn btn-outline" type="button" onclick='UnSelectAll()' value="Unselect All">
      </li>
      <li class="nav-item pl-2 order-2">
      <!-- Form delete -->
        <form action="<?php echo URLROOT; ?>/Products/delete" method="POST">
          <input type="submit" name="deleteProducts" value="Delete" class="btn btn-danger">
      </li>
    </ul>
  </div>
</nav>

<div class="hr">
  <hr>
</div>  
<!--tables-->
<div class="container-fluid">
  <div class="row pb-4 pt-1">

    <?php foreach ($data as $product) : ?>
      <div class="col text-center pirveli">
        <div class="card mb-2">
          <div class="card-body text-primary">
            <input type="checkbox" class="checkbox" name="productRecords[]" value="<?php echo $product->id; ?>">
            <h2><?php echo $product->sku; ?></h2>
            <h2><?php echo $product->name; ?></h2>
            <h2><?php echo $product->price . '$'; ?></h2>
            <!-- Check which type will shown in paragraph -->
            <h3>
              <?php
              if (($product->type == 'disk')) {
                echo 'Size' . ' ' . $product->size . 'MB';
              } elseif ($product->type == 'book') {
                echo 'Weight' . ' ' . $product->weight . 'KG';
              } else {
                echo 'Dimension' . ' ' . $product->height . 'x' . $product->width . 'x' . $product->length;
              }
              ?>  
            </h2>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</form>

<?php require '../app/views/inc/footer.php'; ?>

