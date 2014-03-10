<!--Drag and Drop file to upload-->
<style>
    .fixmargin{
        margin: 2% 5% 2% 5%;
    }
</style>
<div class="w-tabs layout_accordion type_toggle" style="margin-bottom: 5%">
    <div class="w-tabs-h">
        <div class="w-tabs-section with_icon">
            <div class="w-tabs-section-title">
                <span class="w-tabs-section-title-icon icon-book"></span>
                <span class="w-tabs-section-title-text">Bạn muốn chia sẻ 1 tài liệu lên?</span>
                <span class="w-tabs-section-title-control"><i class="icon-angle-down"></i></span>
            </div>
            <div class="w-tabs-section-content">
                <div class="g-form-group">
                    <div class="g-form-group-rows">
                        <div class="g-form-row-field">
                            <div class="g-input">
                                <input type="text" name="document_name" id="document_name" value="" style="max-width: 50%; margin-left: 5%; margin-top: 2%; border-radius: 5px; background-color: white;" placeholder="Tên Tài Liệu *">
                            </div>
                        </div>
                    </div>
                    <div class="g-form-group-rows">
                        <div id="dropzone" class="fixmargin" style="min-height: 180px; border:2px dashed #4894C7; border-radius: 5px;">
                            <form accept=".pdf" action="<?php echo Yii::app()->createUrl('DocumentController/actionDocument')?>" class="dropzone dz-clickable dz-started" 
                                  id="my-awesome-dropzone">
                            </form>
                        </div>
                    </div>
                    <div class="g-form-group-rows fixmargin one-third">
                        <select style="max-width: 300px; border-radius: 5px; background-color: white;">
<!--thêm ngành học tại đây-->
                            <option>Ngành học</option>
                            <option>Công nghệ thông tin</option>
                            <option>Vật lý kĩ thuật</option>
                        </select>
                    </div>
                    <div class="g-form-group-rows">
                        <button class="g-btn type_primary size_small fixmargin">Đăng Tài Liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
