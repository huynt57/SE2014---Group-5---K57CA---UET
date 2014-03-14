<style>
    .fixsizeitems{
        height: 250px;
        width: 180px;
    }
    .fixmarginbottom{
        margin-bottom: 5%;
    }
</style>

<div class="l-submain">
    <div class="l-submain-h g-html i-cf">
        <div class="g-cols">
            <?php $this->renderPartial("partial/side_bar_left") ?>
            <div class="three-fourths">
                <?php $this->renderPartial("partial/upload-file-area") ?>
                <div class="w-portfolio columns_4">
                    <div class="w-portfolio-h">
                        <div class="w-portfolio-list">
                            <div class="w-portfolio-list-h">
                                <?php foreach ($document as $doc): ?>
                                    
                               
                                <div class="w-portfolio-item order_1 naming webdesign fixsizeitems fixmarginbottom">
                                    <div class="w-portfolio-item-h">
                                        
                                        <a class="w-portfolio-item-anchor" href="<?php echo Yii::app()->createUrl('document/viewdocument?docid='.$doc->doc_scribd_id)?>">
                                          
                                            <div class="w-portfolio-item-image fixsizeitems fixmarginbottom">
                                                <img src="<?php echo $doc->doc_url ?>" class="fixsizeitems" alt="" style="border-style: solid; border-width: thin; border-color: #d0d6d9;"/>
                                                <div class="w-portfolio-item-meta">
                                                    <h2 class="w-portfolio-item-title"><?php echo $doc->doc_name ?>   </h2>
                                                    <i class="icon-mail-forward"></i>
                                                </div>
                                            </div>
                                        </a>
                                       
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>

                        <div class="w-portfolio-pagination">
                            <div class="g-pagination align_center">
                                <a href="javascript:void(0);" class="g-pagination-item to_prev disabled">Prev</a>
                                <a href="javascript:void(0);" class="g-pagination-item active">1</a>
                                <a href="javascript:void(0);" class="g-pagination-item">2</a>
                                <a href="javascript:void(0);" class="g-pagination-item">3</a>
                                <a href="javascript:void(0);" class="g-pagination-item to_next">Next</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>