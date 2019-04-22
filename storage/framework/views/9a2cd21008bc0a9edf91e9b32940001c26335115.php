<?php
use App\Library\Helpers;
?>
<header>
    <div class="container">
        <div class="logo">
            <a href="index.html"><img src="themes/thosannhadat/imgs/logo.png" alt=""/></a>
        </div>

        <div class="navtop">
            <a target="_blank" href="http://muabandatbinhduong.vn/">
                <img width="100%" height="90px" src="upload/cms/41/1459744704_41_1452844766_41_binh_duong-1437106739.gif" alt="Top" />
            </a>
        </div>
    </div>
    <div class="navbarmenu">
        <div class="container">
            <div class="menumain">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menufixed">
                    Menu
                    <span class="ico-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>
                </button>

                <div class="menu">
                    <ul>
                        <li class='home'><a href="/"><img src="/imgs/icon_home.png" alt=""/></a></li>
                        <li class="lv0"><a href="/nha-dat-ban" class="haslink ">Đất bán</a>
                            <ul>
                                <li class="lv1"><a href="/ban-can-ho-chung-cu" class="haslink ">Bán
                                        căn hộ chung cư</a></li>
                                <li class="lv1"><a href="/ban-nha-rieng" class="haslink ">Bán nhà
                                        riêng</a></li>
                                <li class="lv1"><a href="/ban-biet-thu-lien-ke" class="haslink ">Bán biệt thự, liền kề</a></li>
                                <li class="lv1"><a href="/ban-nha-mat-pho" class="haslink ">Bán nhà
                                        mặt phố</a></li>
                                <li class="lv1"><a href="/ban-dat-nen-du-an" class="haslink ">Bán
                                        đất nền dự án</a></li>
                                <li class="lv1"><a href="/ban-dat" class="haslink ">Bán đất</a>
                                </li>
                                <li class="lv1"><a href="/ban-trang-trai-khu-nghi-duong" class="haslink ">Bán trang trại, khu nghỉ dưỡng</a></li>
                                <li class="lv1"><a href="/ban-kho-nha-xuong" class="haslink ">Bán kho, nhà xưởng</a></li>
                                <li class="lv1"><a href="/ban-du-an-quan-12" class="haslink ">Bán dự án quận 12</a></li>
                                <li class="lv1"><a href="/ban-loai-bat-dong-san-khac" class="haslink ">Bán loại bất động sản khác</a></li>
                            </ul>
                        </li>
                        <li class=''><a href='du-an-quan-12' target='_self'><span>DỰ ÁN QUẬN 12</span></a></li>
                        <li class="lv0"><a href="/nha-dat-cho-thue" class="haslink ">Cho thuê</a>
                            <ul>
                                <li class="lv1"><a href="/cho-thue-can-ho-chung-cu" class="haslink ">Cho thuê căn hộ chung cư</a></li>
                                <li class="lv1"><a href="/cho-thue-nha-rieng" class="haslink ">Cho
                                        thuê nhà riêng</a></li>
                                <li class="lv1"><a href="/cho-thue-nha-mat-pho" class="haslink ">Cho
                                        thuê nhà mặt phố</a></li>
                                <li class="lv1"><a href="/cho-thue-nha-tro-phong-tro" class="haslink ">Cho thuê nhà trọ, phòng trọ</a></li>
                                <li class="lv1"><a href="/cho-thue-van-phong" class="haslink ">Cho
                                        thuê văn phòng</a></li>
                                <li class="lv1"><a href="/cho-thue-cua-hang-ki-ot" class="haslink ">Cho thuê cửa hàng - ki ốt</a></li>
                                <li class="lv1"><a href="/cho-thue-kho-nha-xuong-dat" class="haslink ">Cho thuê kho, nhà xưởng, đất</a></li>
                                <li class="lv1"><a href="/cho-thue-du-an-quan-12" class="haslink ">Cho thuê dự án quận 12</a></li>
                                <li class="lv1"><a href="/cho-thue-loai-bat-dong-san-khac" class="haslink ">Cho thuê loại bất động sản khác</a></li>
                            </ul>
                        </li>

                        <li class="lv0"><a href="/nha-dat-can-mua" class="haslink">Cần mua</a>
                            <ul>
                                <li class="lv1"><a href="/mua-can-ho-chung-cu" class="haslink ">Mua căn hộ chung cư</a></li>
                                <li class="lv1"><a href="/mua-nha-rieng" class="haslink ">Mua
                                        nhà riêng</a></li>
                                <li class="lv1"><a href="/mua-nha-biet-thu-lien-ke" class="haslink ">Mua nhà biệt thự, liền kề</a></li>
                                <li class="lv1"><a href="/mua-nha-mat-pho" class="haslink ">Mua nhà mặt phố</a></li>
                                <li class="lv1"><a href="/mua-dat-nen-du-an" class="haslink ">Mua đất nền dự án</a></li>
                                <li class="lv1"><a href="/mua-dat" class="haslink ">Mua
                                        đất</a></li>
                                <li class="lv1"><a href="/mua-trang-trai-khu-nghi-duong" class="haslink ">Mua trang trại, khu nghỉ dưỡng</a></li>
                                <li class="lv1"><a href="/mua-kho-nha-xuong" class="haslink ">Mua kho, nhà xưởng</a></li>
                                <li class="lv1"><a href="/mua-du-an-quan-12" class="haslink ">Mua dự án quận 12</a></li>
                                <li class="lv1"><a href="/mua-cac-loai-bat-dong-san-khac" class="haslink ">Mua loại bất động sản khác</a></li>
                            </ul>
                        </li>
                        <li class="lv0"><a href="/nha-dat-can-thue" class="haslink">Cần thuê</a>
                            <ul>
                                <li class="lv1"><a href="/can-thue-can-ho-chung-cu" class="haslink ">Cần thuê căn hộ chung cư</a></li>
                                <li class="lv1"><a href="/can-thue-nha-rieng" class="haslink ">Cần thuê nhà riêng</a></li>
                                <li class="lv1"><a href="/can-thue-nha-mat-pho" class="haslink ">Cần thuê nhà mặt phố</a></li>
                                <li class="lv1"><a href="/can-thue-nha-tro-phong-tro" class="haslink ">Cần thuê nhà trọ, phòng trọ</a></li>
                                <li class="lv1"><a href="/can-thue-van-phong" class="haslink ">Cần thuê văn phòng</a></li>
                                <li class="lv1"><a href="/can-thue-cua-hang-ki-ot" class="haslink ">Cần thuê cửa hàng - ki ốt</a></li>
                                <li class="lv1"><a href="/can-thue-kho-nha-xuong-dat" class="haslink ">Cần thuê kho, nhà xưởng, đất</a></li>
                                <li class="lv1"><a href="/can-thue-du-an-quan-12" class="haslink ">Cần thuê dự án quận 12</a></li>
                                <li class="lv1"><a href="/can-thue-loai-bat-dong-san-khac" class="haslink ">Cần thuê loại bất động sản khác</a></li>
                            </ul>
                        </li>
                        <li class="lv0"><a href="/tin-tuc-nha-dat" class="haslink ">Tin tức nhà đất</a></li>
                        <li class="lv0"><a href="/kien-thuc-nha-dat" class="haslink ">Kiến thức nhà đất</a></li>
                        <li class="lv0"><a href="/ho-tro" class="haslink ">Hỗ trợ</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>
<div class='boxsearch'>
    <div class="container">
        <div class="box-search-left">
            <form method="GET" action="/tim-kiem-tin-tuc">
                <input placeholder="Nhập vào từ khóa tìm kiếm tin tức" type="text" class="iptser" value="<?php echo e(isset($_GET['q']) ? $_GET['q'] : ''); ?>" name="q" />
                <input type="submit" value="Tìm Kiếm" class="btn_search"/>
            </form>

        </div>
        <?php if(Auth::check()): ?>
            <div class="box-search-right">
                <ul class="timkiem_dangtin">

                    <li class="icon_dangtinban"><a href="/quan-ly-tin/dang-tin-ban-cho-thue">Đăng tin Bán - Cho thuê</a></li>
                    <li class="icon_canmua"><a href="/quan-ly-tin/dang-tin-can-mua-can-thue">Cần mua - Cần thuê</a></li>
                </ul>
                <ul class="login_logout">
                    <li class="profile"><a href="/thong-tin-ca-nhan">
                            <img src="<?php echo e(Auth::user()->avatar ? Helpers::file_path(Auth::user()->id, AVATAR_PATH, true).Auth::user()->avatar.'?t='.time() : '/imgs/default-user-avatar.png'); ?>" alt="avatar của bạn">
                                <?php echo e(substr(Auth::user()->name, 0, 15)); ?></a></li>
                    <li class="exit"><a href="/logout">
                            <img src="/themes/thosannhadat/imgs/icon_thoatkhoi_hethong.png" alt="">
                            Thoát
                        </a></li>
                </ul>
            </div>
        <?php else: ?>
            <div class="box-search-right">
                <ul class="timkiem_dangtin">

                    <li class="icon_dangtinban"><a href="/login">Đăng tin Bán - Cho thuê</a></li>
                    <li class="icon_canmua"><a href="/login">Cần mua - Cần thuê</a></li>
                </ul>
                <ul class="login_logout">
                    <li class="uRegister" style="margin-right: 20px;"><a href="/register">Đăng ký</a></li>
                    <li class="uLogin"><a href="/login">Đăng nhập</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
