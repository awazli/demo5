<html>
<head>
    <style>

    </style>
    <script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
</head>
<body>
<form id="myForm" name="myForm" method="post" action="<?php echo base_url(); ?>user/saveCategory">
    <div>
        Add Category
    </div>
    <div class="col-sm-6">

        <?php if (count($category) > 0) {
            ?>
            <select name="category" id="category">
                <option value="">Select Categories</option>
                <?php foreach($category as $row) {?>
                    <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                    <?php if(count($row->subcategory)>0){?>
                        <option id="subcategory" data-id="<?php echo $row->subcategory;?>"></option>
                        <?php }?>
                     <?php }?>
            </select>
        <?php } ?>
    </div>
    <div class="col-sm-6">
        <input name="name" id="name" placeholder="Category Name" value="">
    </div>

    <input id="submit" type="submit" value="Submit">
</form>
</body>
</html>
<script>
    $(document).ready(function(){
       $("#subcategory").on('change',function(){
        var i = $.data('id').val();
           alert(i);
       });
    });
</script>