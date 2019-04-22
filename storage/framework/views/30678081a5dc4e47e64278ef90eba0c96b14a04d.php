<?php
use App\Library\Helpers;
?>
<?php $__env->startSection('contentCSS'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-l">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span> <?php echo e($titleArticle->name); ?> tại <?php echo e($local ? $local : 'Việt Nam'); ?></div>
            <div class="child_C" style="display: contents; display: contents;">
                Có <span class="camcam"><strong><?php echo e(number_format($article->total())); ?></strong></span> bất động sản.
            </div>
            <div class="sapxep_ketqua_timkiem">
                <label style="line-height: 5px;">Sắp xếp theo:</label>
                <select name="ctl00$LeftMainContent$_productSearchResult$ddlSortReult" class="iptpost" onchange="changeSort(this.value)" id="ddlSortReult" style="margin-top: -5px; margin-bottom: 10px;">
                    <option selected="selected" value="new">Tin mới nhất</option>
                    <option value="price_asc">Giá thấp nhất</option>
                    <option value="price_desc">Giá cao nhất</option>
                    <option value="area_asc">Diện tích nhỏ nhất</option>
                    <option value="area_desc">Diện tích lớn nhất</option>
                </select>
            </div>
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
                            <?php $__currentLoopData = $article['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box_nhadatban  vipdb clearfix">
                                    <span class="star_vipDB"></span>

                                    <div class="tit_nhadatban">
                                        <h4><a href="/<?php echo e($item['prefix_url'].'-bds-'.$item['id']); ?>" title="<?php echo e($item['title']); ?>">
                                                <span style="color: #266fb5"><?php echo e($item['title']); ?></span>		</a></h4>
                                    </div>
                                    <div class="detail_nhadatban">
                                        <div class="img_nhadatban">
                                            <a href="/<?php echo e($item['prefix_url'].'-bds-'.$item['id']); ?>">
                                                <img alt="" src="<?php echo e($item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT); ?>">
                                            </a>
                                            <!-- <span class="masotin">Mã Tin: 748404</span>     -->
                                        </div>
                                        <div class="text_nhadatban">
                                            <div class="info_nhadatban">
                                                <ul>
                                                    <li><span class="datetime">Tin <span class="timecolor"><?php echo e(date('h:iA | d/m/Y', strtotime($item['created_at']))); ?></span></span></li>
                                                    <li>Diện tích: <span class="saleboldtext"><?php echo e(($item['area_from'] && $item['area_to']) ? number_format($item['area_from']) .' - '. number_format($item['area_to']) .' m²' : 'Chưa xác định'); ?></span></li>
                                                    <li>Khu vực: <span class="saleboldtext"><a href="/tim-kiem-nang-cao/nha-dat-can-mua/-1/-1/<?php echo e($item['district_id']); ?>/-1/-1/-1/-1/-1/-1/-1"><?php echo e($item['district']); ?></a>,
                                                                <a href="/tim-kiem-nang-cao/nha-dat-can-mua/-1/<?php echo e($item['province_id']); ?>/-1/-1/-1/-1/-1/-1/-1/-1"><?php echo e($item['province']); ?></a></span></li>
                                                </ul>
                                            </div>
                                            <div class="contact_nhadatban">
                                                <ul>
                                                    <li>
                                                        <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>										</li>
                                                    <li class="gia"><strong class="camcam"><?php echo e($item['price_real'] == 0 ? 'Thỏa thuận' : number_format($item['price_from']) .' - '. number_format($item['price_to']) . ' '.$item['ddlPriceType']); ?></strong></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="description_nhadatban"><?php echo substr($item['content_article'], 0, LIMIT_SHORT_CONTENT).'...' ?></div>
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
    <?php echo $__env->make('layouts.slider_bar_right', ['titleArticle' => $titleArticle, 'key' => $key], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentJS'); ?>
    <script>
        function changeSort(val) {
            window.location.href = window.location.origin + window.location.pathname + '?sort=' + val;
        }
        <?php
        if(isset($_SESSION['order_page_lease'])) {
        ?>
        document.getElementById('ddlSortReult').value = '<?php echo $_SESSION['order_page_lease'] ?>';
        <?php
        }
        ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>