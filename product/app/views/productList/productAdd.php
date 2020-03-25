<?php require '../app/views/inc/header.php' ?>

    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a href="<?php echo URLROOT;?>/products/add" class="navbar-brand pl-2 pt-2">Product Add</a>

            <!-- form method post -->
            <form action="<?php echo URLROOT; ?>/products/add" method="post">
            
            <ul class="navbar-nav pr-2 pt-2">
                <li class="nav-item back">
                    <a href="<?php echo URLROOT;?>" class="btn btn-outline-light pr-2 backlink">Back to product page list</a>
                </li>
                <li class="nav-item">
                    <input class="btn btn-outline-light" type="submit" value="Submit"></input>
                </li>
            </ul>
        </div>
    </nav>
    
    <hr>

    <div class="container-fluid text-primary">
        <li class="form-inline pb-3 pt-3">
            <label for="sku" class="mx-4">SKU:</label>
            <input type="text" class="form-control <?php echo (!empty($data['sku_error'])) ? 'is-invalid' : ''; ?>" name="sku" value="<?php echo $data['sku'];?>">
            <span class="text-danger">*
                <?php 
                if(!empty($data['sku_error']))
                {
                    echo $data['sku_error']; 
                }elseif(!empty($data['sku_exist_error'])){
                    echo $data['sku_exist_error'];
                }
            ?></span>
        </li>

        <li class="form-inline pb-3">
            <label for="name" class="mx-4">name:</label>
            <input type="text" class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" name="name" value="<?php echo $data['name'];?>">
            <span class="text-danger">*<?php echo $data['name_error']?></span>
        </li>

        <li class="form-inline pb-3">
            <label for="price" class="mx-4">price:</label>
            <input type="number" class="form-control <?php echo (!empty($data['price_error'])) ? 'is-invalid' : ''; ?>" name="price" value="<?php echo $data['price'];?>">
            <span class="text-danger">*<?php echo $data['price_error']?></span>
        </li>
            
            <p class="text-danger"><?php echo $data['type_error'];?></p>
         
            <div class="mx-4 pt-1 "> 
                <a class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"  id="default">Type Switcher</a>
            
                <div class="dropdown-menu" > 
                    
                <option type="button" class="btn dropdown-item" name="Book" id="book" value="book" >Book</option>
                <option type="button" class="btn dropdown-item" name="Disk" id="disk" value="disk">Disk</option>
                <option type="button" class="btn dropdown-item" name="Furniture" id="furniture" value="furniture">Furniture</option>
                <input type="hidden" name="type" id="type" value=""> 
                    
                </div>
                
            </div>
        
        <div class="sizebox border divtoshow" id="dikssize" >
            <li class="form-inline pt-3">
                <label for="size" class="mx-4">Disk size:</label>
                <input type="number" class="form-control <?php echo (!empty($data['size_error'])) ? 'is-invalid' : ''; ?>" name="size" value="<?php echo $data['size'];?>">
                <span class="text-danger">*<?php echo $data['size_error']?></span>
            </li>
            
            <p class="text-dark p-3"><?php echo $data['disk_attr'];?></p>
        </div>

        <div class="weightbox border divtoshow" >
            <li class="form-inline pt-3">
                <label for="weight" class="mx-4">Books weight:</label>
                <input type="number" class="form-control <?php echo (!empty($data['weight_error'])) ? 'is-invalid' : ''; ?>" name="weight" value="<?php echo $data['weight'];?>">
                <span class="text-danger">*<?php echo $data['weight_error']?></span>
            </li>
            
            <p class="text-dark p-3"><?php echo $data['book_attr'];?></p>
        </div>
        
        <div class="dimensionsbox border divtoshow" >
            <li class="form-inline pt-3">
                <label for="height" class="mx-4">Furniture height:</label>
                <input type="number" class="form-control <?php echo (!empty($data['height_error'])) ? 'is-invalid' : ''; ?>" name="height" value="<?php echo $data['height'];?>">
                <span class="text-danger">*<?php echo $data['height_error']?></span>
            </li>
            <li class="form-inline pt-3">
                <label for="width" class="mx-4">Furniture width:</label>
                <input type="number" class="form-control <?php echo (!empty($data['width_error'])) ? 'is-invalid' : ''; ?>" name="width" value="<?php echo $data['width'];?>">
                <span class="text-danger">*<?php echo $data['width_error']?></span>
            </li>
            <li class="form-inline pt-3">
                <label for="length" class="mx-4">Furniture length:</label>
                <input type="number" class="form-control <?php echo (!empty($data['length_error'])) ? 'is-invalid' : ''; ?>" name="length" value="<?php echo $data['length'];?>">
                <span class="text-danger">*<?php echo $data['length_error']?></span>
            </li>
            
            <p class="text-dark p-3"><?php echo $data['furniture_attr'];?></p>
        </div>
        
    </div>
    <!-- end form method -->    
    </form>  
    
    <?php require '../app/views/inc/footer.php';?>

    


        
        
        
       



