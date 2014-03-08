<style>
    .fixsizeitems{
        height: 210px;
        width: 160px;
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
                                <?php $this->renderPartial("partial/item") ?>
                                <?php $this->renderPartial("partial/item") ?>
                                <?php $this->renderPartial("partial/item") ?>
                                <?php $this->renderPartial("partial/item") ?>
                                <?php $this->renderPartial("partial/item") ?>
                                <?php $this->renderPartial("partial/item") ?>
                                <?php $this->renderPartial("partial/item") ?>


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