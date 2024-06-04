

function showProductItems() {
    $.ajax({
        url: "./adminView/viewAllProducts.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showVideo() {
    $.ajax({
        url: "./adminView/viewAllVideo.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showProgram() {
    $.ajax({
        url: "./adminView/viewAllProgram.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function showCategory() {
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showCategoryVideo() {
    $.ajax({
        url: "./adminView/viewvideocategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showdetailCategoryVideo() {
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showCategoryProgram() {
    $.ajax({
        url: "./adminView/viewprogramcategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showdetailCategoryProgram() {
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showSizes() {
    $.ajax({
        url: "./adminView/viewSizes.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}
function showProductSizes() {
    $.ajax({
        url: "./adminView/viewProductSizes.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function showUsers() {
    $.ajax({
        url: "./adminView/viewUsers.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function showOrders() {
    $.ajax({
        url: "./adminView/viewAllOrders.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id) {
    $.ajax({
        url: "./controller/updateOrderStatus.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Order Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}

function ChangePay(id) {
    $.ajax({
        url: "./controller/updatePayStatus.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Payment Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}


//add product data
function addItems() {
    var p_name = $('#p_name').val();
    var b_masak = $('#b_masak').val();
    var c_masak = $('#c_masak').val();
    var urllink = $('#urllink').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var file = $('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('b_masak', b_masak);
    fd.append('c_masak', c_masak);
    fd.append('urllink', urllink);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    
    $.ajax({
        url: "./controller/addItemController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//edit product data
function itemEditForm(id) {
    $.ajax({
        url: "./adminView/editItemForm.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems() {
    var ID_recipe = $('#ID_recipe').val();
    var judul_recipe = $('#judul_recipe').val();
    var deskripsi_recipe = $('#deskripsi_recipe').val();
    var durasi_masak = $('#durasi_masak').val();
    var bahan_recipe = $('#bahan_recipe').val();
    var cara_masak = $('#cara_masak').val();
    var url_recipe = $('#url_recipe').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('ID_recipe', ID_recipe);
    fd.append('judul_recipe', judul_recipe);
    fd.append('deskripsi_recipe', deskripsi_recipe);
    fd.append('durasi_masak', durasi_masak);
    fd.append('bahan_recipe', bahan_recipe);
    fd.append('cara_masak', cara_masak);
    fd.append('url_recipe', url_recipe);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);

    $.ajax({
        url: './controller/updateItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

//delete product data
function itemDelete(id) {
    $.ajax({
        url: "./controller/deleteItemController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//delete cart data
function cartDelete(id) {
    $.ajax({
        url: "./controller/deleteCartController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id) {
    $.ajax({
        url: "./view/viewEachDetails.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id) {
    $.ajax({
        url: "./controller/catDeleteController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function sizeDelete(id) {
    $.ajax({
        url: "./controller/deleteSizeController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showSizes();
        }
    });
}


//delete variation data
function variationDelete(id) {
    $.ajax({
        url: "./controller/deleteVariationController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

//edit variation data
function variationEditForm(id) {
    $.ajax({
        url: "./adminView/editVariationForm.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations() {
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);

    $.ajax({
        url: './controller/updateVariationController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Success.');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}
function search(id) {
    $.ajax({
        url: "./controller/searchController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id) {
    $.ajax({
        url: "./controller/addQuantityController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id) {
    $.ajax({
        url: "./controller/subQuantityController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout() {
    $.ajax({
        url: "./view/viewCheckout.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id) {
    $.ajax({
        url: "./controller/removeFromWishlist.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id) {
    $.ajax({
        url: "./controller/addToWishlist.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Added to wishlist');
        }
    });
}