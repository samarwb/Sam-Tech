<div class="image_upload_wrapper">
    <div class="uploaded_images_wrapper">
    <?php if(!empty($files)){ 
     foreach ($files as $key => $file) {?>
        <div class='upload_images'><img src='<?php print $file->file_path;?>'><div class='upload_image_close'>X</div></div>
   <?php } }?>
    </div>
    <div class="image_upload_file_wrapper">
        <div class="form-group">
            <label>Upload Image</label>
            <div class='upload_image_file'>
                <input type="file" id="upload_images" name="images[]"  multiple="true" class="upload_image_input form-control file_upload"/>
            </div>
        </div>
        <div class="upload_button_wrapper">
            <button class="upload_button btn btn-primary">Upload</button>
        </div>
    </div>
</div>

<style>
    .uploaded_images_wrapper .upload_images{
        position: relative;
        max-width: 150px;
        max-height: 150px;
        display: inline-block;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    .uploaded_images_wrapper .upload_image_close{
        position: absolute;
        top: 0;
        right: 0;
        font-stretch: extra-expanded;
        font-weight: 900;
        cursor: pointer;
    }
    .uploaded_images_wrapper .upload_images img{
        width: 150px;
        height: 150px;
    }
    .image_upload_file_wrapper .form-group{
        display: inline-block;
        margin-right: 15px;
    }
    .upload_button_wrapper{
        display: inline-block;
    }
</style>