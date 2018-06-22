<?php
/**
 * 归档页面模板
 *
 * @package custom
 */
?>
    <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    <?php $this->need('header.php'); ?>

    <div class="content-wrapper">
        <div class="content">
            <div class="xbox">
                <div class="xlist">
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys);?>
                    <?php if ($categorys->have()): ?>
                    <?php while($categorys->next()): ?>
                    <div class=" categorys-item">
                        <div class="categorys-title">
                            <a href="<?php $categorys->permalink();?>"><?php $categorys->name();?></a><span> ：<?php $categorys->count();?></span>
                        </div>
                        <?php $catlist =$this->widget('Widget_Archive@categorys_'.$categorys->mid, 'pageSize=10000&type=category', 'mid='.$categorys->mid); ?>
                        <?php if($catlist->have()): ?>
                        <div class="post-lists">
                            <div class="post-lists-body">
                                <?php while($catlist->next()): ?>
                                <div class="post-list-item">
                                    <div class="post-list-item-container">
                                        <div class="item-label">
                                            <div class="item-title"><a href="<?php $catlist->permalink() ?>"><?php $catlist->title() ?></a></div>
                                            <div class="item-meta clearfix">
                                                <div class="item-meta-date">
                                                    <?php $catlist->date('M j, Y'); ?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php $this->need('footer.php'); ?>

    </div>

    </body>

    </html>