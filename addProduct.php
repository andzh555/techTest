<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/productAddStyle.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="js/productAdd.js"></script>
    <link rel="icon" href="icons/ADDicon.ico">
    <title>Product Add</title>
</head>
<body>
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Product Add</h5>
        <nav class="my-2 my-md-0 mr-md-3">
        </nav>
        <div class="container-fluid-right justify-content-start">
            <button id="save" class="btn btn-outline-primary" type="submit" name="newProduct"> Save</button>
            <a id="Cancel" class="btn btn-outline-primary" type="button" href="productList.php"> Cancel</a>
        </div>
    </div>
</div>
<div class="container">
    <form id="myForm" name="newProduct" action="addProductHandler.php" method="post" class="container-fluid-right">
        <div class="form-group w-25">
            <div class="input-group mb-3" id="skuDiv">
                <div class="input-group-prepend">
                    <span class="input-group-text">SKU</span>
                </div>
                <input type="text" class="form-control" name="sku" id="sku" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Price $</span>
                </div>
                <input type="text" class="form-control" name="price" id="price" required>
            </div>
            <label for="validationDefault04" class="form-label">Select Type</label>
            <select aria-label="Switch Type" id="type" name="selectedType" class="custom-select form-select mb-3">
                <option selected value="0">---</option>
                <option value="1"> CD</option>
                <option value="2"> Book</option>
                <option value="3"> Furniture</option>
            </select>
        </div>
        <div class="ProductDescription">
            <div class="form-group w-25">
                <div id="cd">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Capacity MB </span>
                        </div>
                        <input name="descriptionCD" type="text" class="form-control" id="selectCD">
                        <span>
                    *Please, provide size*
                </span>
                    </div>
                </div>
                <div id="book">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Weight KG </span>
                        </div>
                        <input name="descriptionBook" type="text" class="form-control" id="selectBook">
                        <span>
                    *Please, provide weight*
                </span>
                    </div>
                </div>
                <div id="furniture">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Height CM</span>
                        </div>
                        <input name="descriptionFurHeight" type="text" class="form-control" id="furHeight">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Widht CM</span>
                        </div>
                        <input name="descriptionFurWidth" type="text" class="form-control" id="furWidth">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Lenght CM</span>
                        </div>
                        <input name="descriptionFurLength" type="text" class="form-control" id="furLength">
                        <span>
                    *Please, provide dimensions*
                </span>
                    </div>
                </div>
            </div>
        </div>
        <div id="hidden"></div>
    </form>
</div>
<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <p class="text-center">Test assigment</p>
    </footer>
</div>
</body>
</html>


