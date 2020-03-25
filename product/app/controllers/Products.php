<?php
class Products extends Controller{

    public function __construct(){

        $this->productModel = $this->model('Product');
    }

    // Load productList page
    public function index(){
        
        if(isset($_GET['productSelect'])){  
            if($_GET['productSelect'] == 'selectAll'){
            
                $products = $this->productModel->getProduct();
                
            }else{
                $productType = $_GET['productSelect'];
    
                $products = $this->productModel->sortedProduct($productType);
            }
        }else{
            $products = $this->productModel->getProduct();
        }

        $this->view('productList/index', $products);
    }
    
    // Add product
    public function add(){
        
        $attrType = [
            'disk_attr' => 'Please provide size MB format',
            'furniture_attr' => 'Please provide dimension cantimeters format',
            'book_attr' => 'Please provide weight KG format'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // die(var_dump($_POST));
            // Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_SANITIZE_NUMBER_FLOAT);
            
            $dataProduct = [
                'sku' => trim($_POST['sku']),
                'name' => trim($_POST['name']),
                'price' => trim($_POST['price']),
                'size' => trim($_POST['size']),
                'height' => trim($_POST['height']),
                'width' => trim($_POST['width']),
                'length' => trim($_POST['length']),
                'weight' => trim($_POST['weight']),
                'type' => $_POST['type']
            ];
            $dataError = [
                'sku_error' => '',
                'sku_exist_error' =>'', 
                'name_error' => '',
                'price_error' => '',
                'size_error' => '',
                'height_error' => '', 
                'width_error' => '',
                'length_error' => '',
                'weight_error' => '',
                'type_error' => ''
            ];

            

            // Validate data
            if($dataProduct['sku'] == ''){
                $dataError['sku_error'] = 'Please enter SKU';
            }else{
                // check if the SKU is already exits
                if($this->productModel->findSKUDublicate($dataProduct['sku'])){
                    $dataError['sku_exist_error'] = 'SKU is alreary exist!';
                }
            }

            if($dataProduct['name'] == ''){
                $dataError['name_error'] = 'Please enter Name';
            }

            if($dataProduct['price'] == ''){
                $dataError['price_error'] = 'Please enter price';
            }
            // Check, the price is only numeric 
            if($dataProduct['price'] != ''){
                if(!is_numeric($dataProduct['price'])){
                $dataError['price_error'] = 'Please enter numerics';    
                }
            }

            // Check if disk size and book weight is not empty
            if($dataProduct['size'] == '' && $dataProduct['height'] == '' && $dataProduct['weight'] == '' && $dataProduct['length'] == '' && $dataProduct['width'] == ''){
                $dataError['size_error'] = 'Please enter size';
                $dataError['weight_error'] = 'Please enter weight';
            }
            // Check, size is only numeric 
            if($dataProduct['size'] != ''){
                if(!is_numeric($dataProduct['size'])){
                $dataError['size_error'] = 'Please enter numerics';    
                }
            }
            // Check, weight is only numeric  
            if($dataProduct['weight'] != ''){
                if(!is_numeric($dataProduct['weight'])){
                $dataError['weight_error'] = 'Please enter numerics';    
                }
            }
            // Check furniture height is not empty
            if( ($dataProduct['height'] == '' && $dataProduct['length'] != '' && $dataProduct['width'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') || 
                ($dataProduct['height'] == '' && $dataProduct['length'] != '' && $dataProduct['width'] != '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') || 
                ($dataProduct['height'] == '' && $dataProduct['length'] == '' && $dataProduct['width'] != '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') ||
                ($dataProduct['height'] == '' && $dataProduct['length'] == '' && $dataProduct['width'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '')   
                ){
                $dataError['height_error'] = 'Please enter height';
            }
            // Check,furniture height is only numeric 
            if($dataProduct['height'] != ''){
                
                if(!is_numeric($dataProduct['height'])){
                $dataError['height_error'] = 'Please enter numerics';    
                }
            }

            // Check furniture width is not empty
            if(
                ($dataProduct['width'] == '' && $dataProduct['length'] != '' && $dataProduct['height'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') || 
                ($dataProduct['width'] == '' && $dataProduct['length'] != '' && $dataProduct['height'] != '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') || 
                ($dataProduct['width'] == '' && $dataProduct['length'] == '' && $dataProduct['height'] != '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') ||
                ($dataProduct['height'] == '' && $dataProduct['length'] == '' && $dataProduct['width'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '')
                ){

                $dataError['width_error'] = 'Please enter width';
            }
            if($dataProduct['width'] != ''){
                // Check,furniture width is only numeric 
                if(!is_numeric($dataProduct['width'])){
                $dataError['width_error'] = 'Please enter numerics';    
                }
            }

            // Check furniture length is not empty
            if(
                ($dataProduct['length'] == '' && $dataProduct['height'] != '' && $dataProduct['width'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') || 
                ($dataProduct['length'] == '' && $dataProduct['height'] != '' && $dataProduct['width'] != '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') || 
                ($dataProduct['length'] == '' && $dataProduct['height'] == '' && $dataProduct['width'] != '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '') ||
                ($dataProduct['height'] == '' && $dataProduct['length'] == '' && $dataProduct['width'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '')
                ){
                $dataError['length_error'] = 'Please enter length';
            }
            if($dataProduct['length'] != ''){
                // Check,furniture length is only numeric 
                if(!is_numeric($dataProduct['length'])){
                $dataError['length_error'] = 'Please enter numerics';    
                }
            }

            // Check, product type selected
            if($dataProduct['type'] == ''){
                $dataError['type_error'] = 'Please filled out a type';
            }else{
                if(!(is_string($dataProduct['type']))){
                    die('Something went wrong!');
                }
            }

            // Check, if product type description is chosen
            if(($dataProduct['height'] == '' && $dataProduct['length'] == '' && $dataProduct['width'] == '' && $dataProduct['weight'] == '' && $dataProduct['size'] == '')){
                $dataError['type_error'] = 'fill out the product type!';
            }

            // Prevent duplicate description 
            if(
                ($dataProduct['size'] != '' && $dataProduct['weight'] != '') || 
                ($dataProduct['size'] != '' && $dataProduct['length'] != '') ||
                ($dataProduct['weight'] != '' && $dataProduct['length'] != '')){
                
                $dataError['type_error'] = 'Each product must have, one description! ';
            }

            // Check if no error
            if(empty($dataError['sku_error']) && empty($dataError['name_error']) && empty($dataError['price_error']) && empty($dataError['sku_exist_error'])
                && empty($dataError['size_error']) && empty($dataError['height_error']) && empty($dataError['width_error']) && empty($dataError['length_error'])
                && empty($dataError['weight_error'] && empty($dataError['type_error'] ))
            ){
                // Try add data in db
                if($this->productModel->addProduct($dataProduct)){
                    header('location: ' . URLROOT);
                }else{
                    die('Product did not added !');
                }    

            }else{
                
                $data = array_merge($dataProduct, $dataError, $attrType);
                
                // Load view with errors
                $this->view('productList/productAdd', $data);
            }

        // If Server REQUEST is Get
        }else{
            
            $emptyArr = [
                'sku' => '',
                'name' => '',
                'price' => '',
                'size' => '',
                'height' => '',
                'width' => '',
                'length' => '',
                'weight' => '',

                'sku_error' => '',
                'sku_exist_error' =>'', 
                'name_error' => '',
                'price_error' => '',
                'size_error' => '',
                'height_error' => '', 
                'width_error' => '',
                'length_error' => '',
                'weight_error' => '',
                'type_error' => '',
            ];

            $data = array_merge($emptyArr, $attrType);

            $this->view('productList/productAdd', $data);
        }
        
    }
    
    // Delete product
    public function delete(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if(isset($_POST['deleteProducts']) && array_key_exists("productRecords", $_POST)){
                
                // Numbers of signed/checked product
                $numbers = count($_POST['productRecords']);
                
                $idArray = $_POST['productRecords'];
                for ($i = 0; $i < $numbers; $i++) { 
                    $id = $idArray[$i];
    
                    if($this->productModel->productDelete($id) === false){
                        die('Product(s) did not deleted !');
                    };
                }
                header('location: '. URLROOT);
            }else{
                die('something is wrong');
            }
         }
    }
}