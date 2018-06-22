<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>

    <div class="xbox">
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        <div class="xbc"></div>
    </div>
    <div class="xbox">

        <?php if($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="xlist">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <!-- <h3 id="response">
                <?php _e('添加新评论'); ?>
            </h3> -->
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if($this->user->hasLogin()): ?>
                <p>
                    <?php _e('登录身份: '); ?>
                    <a href="<?php $this->options->profileUrl(); ?>">
                        <?php $this->user->screenName(); ?>
                    </a>.
                    <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">
                        <?php _e('退出'); ?> &raquo;</a>
                </p>
                <?php else: ?>

                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-3">
                        <!-- <label for="author" class="required">
                            <?php _e('称呼'); ?>
                        </label> -->
                        <input type="text" name="author" id="author" placeholder="<?php _e('称呼'); ?>" class="comment-input " value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div class="pure-u-1 pure-u-md-1-3">
                        <!-- <label for="mail" <?php if ($this->options->commentsRequireMail): ?> class="required"
                            <?php endif; ?>>
                            <?php _e('Email'); ?>
                        </label> -->
                        <input type="email" name="mail" id="mail" placeholder="<?php _e('Email'); ?>" class="comment-input " value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required
                        <?php endif; ?> />
                    </div>
                    <div class="pure-u-1 pure-u-md-1-3">
                        <!-- <label for="url" <?php if ($this->options->commentsRequireURL): ?> class="required"
                            <?php endif; ?>>
                            <?php _e('网站'); ?>
                        </label> -->
                        <input type="url" name="url" id="url" placeholder="<?php _e('网站(http://)'); ?>" class="comment-input " value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> required
                        <?php endif; ?> />
                    </div>
                </div>

                <?php endif; ?>
                <p>
                    <!-- <label for="textarea" class="required">
                        <?php _e('内容'); ?>
                    </label> -->
                    <textarea name="text" id="textarea" class="textarea" required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <button type="submit" class="pure-button pure-button-primary">
                        <?php _e('提交评论'); ?>
                    </button>
                </p>
            </form>
        </div>
        <?php else: ?>
        <!-- <h3>
            <?php _e('评论已关闭'); ?>
        </h3> -->
        <?php endif; ?>
    </div>

    <div class="xbox">
        <?php if ($comments->have()): ?>
        <div class="xlist">
            <h3>
                <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
            </h3>

            <?php $comments->listComments(); ?>

        </div>
        <?php endif; ?>
    </div>
</div>