<script type="text/javascript">
    $(document).ready(function()
    {
        $("#comments").hide();
    });
    
    
    function opencomment()
    {
        $("#comments").show();
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
                <div class="one-fifth">
                    <h3>Các chủ đề</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eveniet
                        facere fugit nihil, non officiis temporibus! A adipisci alias veritatis?</p>
                </div>
                <div class="three-fifths">
                    <h3>Hãy cho ý kiến của bạn ...</h3>
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

                                                    <a class="w-blog-entry-more g-btn type_default size_small"><span onclick="opencomment()">Read More</span></a>
                                                </div>
                                            </div>
                                            <div id="comments" class="w-comments has_form" value = "show">
                                                <div class="w-comments-h">
                                                    <h4 class="w-comments-title"><i class="icon-comments"></i>5 Comments. <a href="#form">Leave new</a></h4>
                                                    <div class="w-comments-list">

                                                        <div class="w-comments-item" id="comment-1">
                                                            <div class="w-comments-item-meta">
                                                                <div class="w-comments-item-icon">
                                                                    <img src="img/avatar.png" alt="" />
                                                                </div>
                                                                <div class="w-comments-item-author">Norman Cook</div>
                                                                <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                                                            </div>
                                                            <div class="w-comments-item-text">
                                                                <p>Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin. Proin laoreet iaculis placerat. Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin. Proin laoreet iaculis placerat.</p>
                                                            </div>
                                                            <a class="w-comments-item-answer" href="javascript:void(0);">Reply</a>
                                                        </div>

                                                        <div class="w-comments-childlist">

                                                            <div class="w-comments-item" id="comment-2">
                                                                <div class="w-comments-item-meta">
                                                                    <div class="w-comments-item-icon">
                                                                        <img src="img/avatar.png" alt="" />
                                                                    </div>
                                                                    <div class="w-comments-item-author">Admin</div>
                                                                    <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                                                                </div>
                                                                <div class="w-comments-item-text">
                                                                    <p>Proin laoreet iaculis placerat. Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin.</p>
                                                                    <p>Proin laoreet iaculis placerat. Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin.</p>
                                                                </div>
                                                                <a class="w-comments-item-answer" href="javascript:void(0);">Reply</a>
                                                            </div>

                                                            <div class="w-comments-childlist">

                                                                <div class="w-comments-item" id="comment-3">
                                                                    <div class="w-comments-item-meta">
                                                                        <div class="w-comments-item-icon">
                                                                            <img src="img/avatar.png" alt="" />
                                                                        </div>
                                                                        <div class="w-comments-item-author">Some User</div>
                                                                        <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                                                                    </div>
                                                                    <div class="w-comments-item-text">
                                                                        <p>Proin laoreet iaculis placerat. Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin.</p>
                                                                    </div>
                                                                    <a class="w-comments-item-answer" href="javascript:void(0);">Reply</a>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="w-comments-item" id="comment-4">
                                                            <div class="w-comments-item-meta">
                                                                <div class="w-comments-item-icon">
                                                                    <img src="img/avatar.png" alt="" />
                                                                </div>
                                                                <div class="w-comments-item-author">Admin</div>
                                                                <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                                                            </div>
                                                            <div class="w-comments-item-text">
                                                                <p>Proin laoreet iaculis placerat. Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin.</p>
                                                            </div>
                                                            <a class="w-comments-item-answer" href="javascript:void(0);">Reply</a>
                                                        </div>

                                                        <div class="w-comments-item" id="comment-5">
                                                            <div class="w-comments-item-meta">
                                                                <div class="w-comments-item-icon">
                                                                    <img src="img/avatar.png" alt="" />
                                                                </div>
                                                                <div class="w-comments-item-author">Michael Jordan</div>
                                                                <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                                                            </div>
                                                            <div class="w-comments-item-text">
                                                                <p>Proin laoreet iaculis placerat. Maecenas euismod lacinia neque. Praesent pellen tesque tristique tortor eu vulputate. Aenean viverra justo fermentum sapin.</p>
                                                            </div>
                                                            <a class="w-comments-item-answer" href="javascript:void(0);">Reply</a>
                                                        </div>

                                                    </div>

                                                    <div id="form" class="w-comments-form">
                                                        <div class="w-comments-form-title">Leave Comment</div>
                                                        <div class="w-comments-form-text">Yay! You've decided to leave a comment. That's fantastic! Please keep in mind that comments are moderated. So, please do not use a spammy keyword or a domain as your name, or it will be deleted. Let's have a personal and meaningful conversation instead. Thanks for dropping by!</div>
                                                        <form class="g-form" action="#" method="post" />
                                                        <div class="g-form-group">
                                                            <div class="g-form-group-rows">
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label">
                                                                        <label class="g-form-row-label-h" for="input1x1">Your name *</label>
                                                                    </div>
                                                                    <div class="g-form-row-field">
                                                                        <input type="text" name="#" id="input1x1" />
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label">
                                                                        <label class="g-form-row-label-h" for="input1x2">Your email *</label>
                                                                    </div>
                                                                    <div class="g-form-row-field">
                                                                        <input type="text" name="#" id="input1x2" />
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label">
                                                                        <label class="g-form-row-label-h" for="input1x3">Your message *</label>
                                                                    </div>
                                                                    <div class="g-form-row-field">
                                                                        <textarea name="#" id="input1x3" cols="30" rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label"></div>
                                                                    <div class="g-form-row-field">
                                                                        <button class="g-btn type_primary">Submit Comment</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

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

                                            <a class="w-blog-entry-more g-btn type_default size_small" href="blog-post.html" id="opencmt"><span>Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>


                <div class="one-fifth">
                    <h3>Chủ đề nóng</h3>
                    <p>Accusamus aliquam architecto asperiores distinctio dolore explicabo fugiat hic
                        illum, optio pariatur provident quia reiciendis reprehenderit sapiente similique
                        suscipit!</p>
                </div>
            </div>
        </div>
    </div>
</div>