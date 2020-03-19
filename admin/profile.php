<?php
include 'common.php';
include 'header.php';


$stat = Typecho_Widget::widget('Widget_Stat');
?>

<div class="main">
    <div class="body container">
        <?php include 'page-title.php'; ?>
        <div class="row typecho-page-main">
            <div class="col-mb-12 col-tb-3">
                <p>
                    <span itemprop="image"><?php $number=$user->mail; echo '<img src="https://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="222px" height="222px" style="border-radius: 10%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">'; ?></span>
                </p>

                <h2><?php $user->screenName(); ?></h2>
                <p><?php $user->name(); ?></p>
                <p><?php _e('目前有 <em>%s</em> 篇日志, 并有 <em>%s</em> 条关于你的评论在 <em>%s</em> 个分类中.', 
                $stat->myPublishedPostsNum, $stat->myPublishedCommentsNum, $stat->categoriesNum); ?></p>
                <p><?php
                if ($user->logged > 0) {
                    $logged = new Typecho_Date($user->logged);
                    _e('最后登录: %s', $logged->word());
                }
                ?></p>
            </div>

            <div class="col-mb-12 col-tb-6 col-tb-offset-1 typecho-content-panel" role="form">
                <section>
                    <h3><?php _e('个人资料'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Users_Profile')->profileForm()->render(); ?>
                </section>

                <?php if($user->pass('contributor', true)): ?>
                <br>
                <section id="writing-option">
                    <h3><?php _e('撰写设置'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Users_Profile')->optionsForm()->render(); ?>
                </section>
                <?php endif; ?>

                <br>

                <section id="change-password">
                    <h3><?php _e('密码修改'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Users_Profile')->passwordForm()->render(); ?>
                </section>

                <?php Typecho_Widget::widget('Widget_Users_Profile')->personalFormList(); ?>
            </div>
        </div>
    </div>
</div>

<?php
include 'copyright.php';
include 'common-js.php';
include 'form-js.php';
Typecho_Plugin::factory('admin/profile.php')->bottom();
include 'footer.php';
?>
