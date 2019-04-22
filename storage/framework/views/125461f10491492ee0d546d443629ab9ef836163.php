<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
?>
<?php if($Agent->isMobile()): ?>
<?php $__env->startSection('contentCSS'); ?>
    <link rel="stylesheet" type="text/css" href="/css/mobile_catalog.css">
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="main-l">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span> <?php echo e($category->name); ?></div>
            <div class="boxfull clearfix">

                <div id="media" class="list-view">
                    <?php if($article->total() == 0): ?>
                        <div style="text-align: center">Không có bài viết nào</div>
                    <?php else: ?>
                        <?php
                        $page = $article->links();
                        $article = $article->toArray();
                        ?>
                        <ul class="clearfix">
                            <?php $__currentLoopData = $article['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box_nhadatban  vipdb clearfix">
                                    <div class="tit_nhadatban">
                                        <h4><a href="/<?php echo e($category->slug); ?>/<?php echo e($item['slug']); ?>" title="<?php echo e($item['title']); ?>">
                                                <span style="color: #266fb5"><?php echo e($item['title']); ?></span>		</a></h4>
                                    </div>
                                    <div class="detail_nhadatban">
                                        <div class="img_nhadatban">
                                            <a href="/<?php echo e($category->slug); ?>/<?php echo e($item['slug']); ?>">
                                                <img alt="" src="<?php echo e($item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT); ?>">
                                            </a>
                                        </div>
                                        <div class="description_tin-tuc"><?php echo $item['short_content'] ?></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="results-wrap clearfix"><div class="summary"></div>
                            <div class="pager clearfix">
                                <?php echo $page ?>
                            </div>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.slider_bar_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentJS'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>