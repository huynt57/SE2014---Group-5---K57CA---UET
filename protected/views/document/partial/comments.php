
<div id="comments" class="w-comments has_form" value = "show">
    <div class="w-comments-h">
        <h4 class="w-comments-title"><i class="icon-comments"></i>5 Comments. <a href="#form">Leave new</a></h4>

        <div class="w-comments-list">
            <?php foreach ($detailcomment as $comment): ?>
                <div class="w-comments-item" id="comment-1">
                    <div class="w-comments-item-meta">
                        <div class="w-comments-item-icon">
                            <img src="img/avatar.png" alt="" />
                        </div>
                        <div class="w-comments-item-author">Norman Cook</div>
                        <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                    </div>
                    <div class="w-comments-item-text">
                        <p><?php echo $comment->comment_content;?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="form" class="w-comments-form" style="margin-left: 5%; margin-right: 5%">
            <div class="w-comments-form-title">Bình luận</div>
            <div class="w-comments-form-text">Cho chúng tôi thấy ý kiến của bạn !!</div>
            <form class="g-form" action="#" method="post" />
            <div class="g-form-group">
                <div class="g-form-group-rows">

                    <div class="g-form-row">

                        <div class="g-form-row-field">
                            <textarea name="#" id="input1x3" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="g-form-row">
                        <div class="g-form-row-label"></div>
                        <div class="g-form-row-field">
                            <button class="g-btn type_primary size_small">Gửi bình luận</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>