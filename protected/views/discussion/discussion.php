<script type="text/javascript">
    $(document).ready(function()
    {
        $("#comments").hide();
        $("#hidecmt").hide();

    });


    function opencomment()
    {
        $("#comments").show();
        $("#opencmt").hide();
        $("#hidecmt").show();
    }

    function closecomment()
    {
        $("#comments").hide();
        $("#opencmt").show();
        $("#hidecmt").hide();
    }


</script>

<div class="l-main-h">
    <div class="l-submain for_pagehead">
        <div class="l-submain-h g-html i-cf">
            <div class="w-pagehead">
                <h1>Thảo luận</h1>
                <p>Share everything !!</p>
            </div>
        </div>
    </div>
    <div class="l-submain">
        <div class="l-submain-h g-html i-cf">
            <div class="g-cols">
                <?php $this->renderPartial("partial/sidebar_left")?>
                <div class="three-fourths">
                    <?php $this->renderPartial("partial/postarea")?>
                    <div class="l-content">
                        <div class="l-content-h">
                            <div class="w-blog imgpos_atleft meta_tagscomments">
                                <div class="w-blog-h">
                                    <div class="w-blog-list">
                                        <div class="w-blog-entry" >
                                            <div class="w-blog-entry-h">
                                                <a class="w-blog-entry-link" href="blog-post.html">
                                                    <span class="w-blog-entry-img animate_afc" style="width: 60px;">
                                                        <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-1.jpg" alt="" style=""/>
                                                    </span>
                                                    <h2 class="w-blog-entry-title">
                                                        <span class="w-blog-entry-title-h" >This is a Post</span>
                                                    </h2>
                                                </a>
                                                <div class="w-blog-entry-body" style="margin-left: 90px;">
                                                    <div class="w-blog-entry-meta">
                                                        <div class="w-blog-entry-meta-date">
                                                            <i class="icon-time"></i>
                                                            <span class="w-blog-entry-meta-date-month">March</span>
                                                            <span class="w-blog-entry-meta-date-day">23,</span>
                                                            <span class="w-blog-entry-meta-date-year">2013</span>
                                                        </div>

                                                        <div class="w-blog-entry-meta-author">
                                                            <i class="icon-user"></i>
                                                            <a class="w-blog-entry-meta-author-h" href="javascript:void(0);">Admin</a>
                                                        </div>

                                                        <div class="w-blog-entry-meta-tags">
                                                            <i class="icon-tags"></i>
                                                            <a href="javascript:void(0);">Web Design</a>,
                                                            <a href="javascript:void(0);">Branding</a>
                                                        </div>

                                                        <div class="w-blog-entry-meta-comments">
                                                            <i class="icon-comments"></i>
                                                            <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                        </div>
                                                    </div>

                                                    <div class="w-blog-entry-short">
                                                        <p>Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales.</p>
                                                    </div>

                                                    <button class=" g-btn type_primary size_small" id="opencmt" onclick="opencomment()"><span>Xem comment</span></button>
                                                    <button class=" g-btn type_primary size_small" id="hidecmt" onclick="closecomment()"><span>Ẩn</span></button>
                                                </div>
                                            </div>
                                     <?php $this->renderPartial("partial/comments")?>     

                                        </div>
                                    </div>
                                </div>

                                <div class="w-blog-entry">
                                    <div class="w-blog-entry-h">
                                        <a class="w-blog-entry-link" href="blog-post.html">
                                            <span class="w-blog-entry-img animate_afc" style="width: 60px;">
                                                <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-1.jpg" alt="" style=""/>
                                            </span>

                                            <h2 class="w-blog-entry-title">
                                                <span class="w-blog-entry-title-h" >This is a Post</span>
                                            </h2>
                                        </a>
                                        <div class="w-blog-entry-body" style="margin-left: 90px;">
                                            <div class="w-blog-entry-meta">
                                                <div class="w-blog-entry-meta-date">
                                                    <i class="icon-time"></i>
                                                    <span class="w-blog-entry-meta-date-month">March</span>
                                                    <span class="w-blog-entry-meta-date-day">23,</span>
                                                    <span class="w-blog-entry-meta-date-year">2013</span>
                                                </div>

                                                <div class="w-blog-entry-meta-author">
                                                    <i class="icon-user"></i>
                                                    <a class="w-blog-entry-meta-author-h" href="javascript:void(0);">Admin</a>
                                                </div>

                                                <div class="w-blog-entry-meta-tags">
                                                    <i class="icon-tags"></i>
                                                    <a href="javascript:void(0);">Web Design</a>,
                                                    <a href="javascript:void(0);">Branding</a>
                                                </div>

                                                <div class="w-blog-entry-meta-comments">
                                                    <i class="icon-comments"></i>
                                                    <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                </div>
                                            </div>

                                            <div class="w-blog-entry-short">
                                                <p>Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales.</p>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>