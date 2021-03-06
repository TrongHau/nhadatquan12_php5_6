<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middlewareGroups' => ['web']], function () {
    Auth::routes();
});

//Route::get('sync/tintuc', 'SyncController@homeTinTuc');
//Route::get('sync/delete', 'SyncController@deleteFolderTemp');



Route::post('get-district', ['as' => 'get.district', 'uses' => 'HomeController@getDistrict']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/get_district', ['as' => 'get.district', 'uses' => 'HomeController@getDistrict']);
Route::post('/get_ward', ['as' => 'get.ward', 'uses' => 'HomeController@getWard']);
Route::get('/demo', ['as' => 'get.ward1', 'uses' => 'SyncController@homeTinTuc']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/logout', 'UserController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/facebook', 'Auth\AuthFacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthFacebookController@handleProviderCallback');
Route::get('auth/google', 'Auth\AuthGoogleController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\AuthGoogleController@handleProviderCallback');
Route::get('/xac-nhan-email/{token}', 'UserController@verifyEmail');
Route::get('/tim-kiem-tin-tuc', 'CatalogController@searchKey');

Route::prefix('guest/')->group(function () {
    Route::get('dang-tin-ban-cho-thue', ['as' => 'guest.article.getArticleLease', 'uses' => 'ArticleController@newGuestArticleForLease']);
    Route::post('dang-tin-ban-cho-thue', ['as' => 'article.StoreArticleLease', 'uses' => 'ArticleController@storeArticleForLease']);
    Route::get('dang-tin-can-mua-can-thue', ['as' => 'guest.article.getArticleBuy', 'uses' => 'ArticleController@newGuestArticleForBuy']);
    Route::post('dang-tin-can-mua-can-thue', ['as' => 'article.StoreArticleBuy', 'uses' => 'ArticleController@storeArticleForBuy']);

    Route::post('quan-ly-tin/dang-tin-ban-cho-thue', ['as' => 'guest.article.StoreArticleLease', 'uses' => 'ArticleController@storeArticleForLease']);
    Route::post('quan-ly-tin/dang-tin-can-mua-can-thue', ['as' => 'guest.article.StoreArticleBuy', 'uses' => 'ArticleController@storeArticleForBuy']);

});
Route::get('upload/image', ['as' => 'upload.getImage', 'uses' => 'ArticleController@loadImage']);
Route::post('upload/image', ['as' => 'upload.getImage', 'uses' => 'ArticleController@loadImage']);
Route::delete('upload/image', ['as' => 'upload.getImage', 'uses' => 'ArticleController@loadImage']);
Route::get('thong-tin-ca-nhan/xac-nhan-so-dien-thoai-moi', ['as' => 'uses.get.mobile', 'uses' => 'UserController@getVerifyMobile']);
Route::post('thong-tin-ca-nhan/xac-nhan-so-dien-thoai-moi', ['as' => 'uses.verify.mobile', 'uses' => 'UserController@setVerifyMobile']);

Route::group(['middleware' => ['auth']], function() {
    // trang ca nhan
    Route::prefix('thong-tin-ca-nhan/')->group(function () {
        Route::get('/', ['as' => 'list.ArticleLease', 'uses' => 'ArticleController@listArticleForLease']);
        Route::get('quan-ly-mua-can-thue', ['as' => 'list.ArticleLease', 'uses' => 'ArticleController@listArticleForBuy']);
        Route::get('tin-nhap', ['as' => 'list.ArticleDraf', 'uses' => 'ArticleController@listDrafArticle']);
        Route::get('thay-doi-ca-nhan', ['as' => 'user.changeProfile', 'uses' => 'UserController@changeProfile']);
        Route::post('thay-doi-ca-nhan', ['as' => 'user.storeProfile', 'uses' => 'UserController@storeProfile']);
        Route::post('update_avatar', ['as' => 'user.storeAvatar', 'uses' => 'UserController@storeAvatar']);
        Route::get('thay-doi-mat-khau', ['as' => 'user.changePassword', 'uses' => 'UserController@changePassword']);
        Route::post('thay-doi-mat-khau', ['as' => 'user.storePassword', 'uses' => 'UserController@storePassword']);
        Route::get('dang-tin', ['as' => 'user.dangtin', 'uses' => 'UserController@newArticle']);
        Route::post('xoa-tin', ['as' => 'article.xoaTin', 'uses' => 'ArticleController@deleteArticle']);
    });
    // quan ly tin

    Route::get('upload/remove_image', ['as' => 'upload.getImage', 'uses' => 'ArticleController@removeImage']);
    Route::prefix('quan-ly-tin/')->group(function () {
        Route::post('tin-cho-thue', ['as' => 'article.getArticleLease', 'uses' => 'ArticleController@getListArticleForLease']);
        Route::post('tin-can-thue', ['as' => 'article.getArticleBuy', 'uses' => 'ArticleController@getListArticleForBuy']);
        Route::post('tin-nhap', ['as' => 'article.getArticleBuy', 'uses' => 'ArticleController@getListArticleForDraf']);
        Route::get('dang-tin-ban-cho-thue/{id?}', ['as' => 'article.getArticleLease', 'uses' => 'ArticleController@newArticleForLease']);
        Route::post('dang-tin-ban-cho-thue', ['as' => 'article.StoreArticleLease', 'uses' => 'ArticleController@storeArticleForLease']);
        Route::get('dang-tin-can-mua-can-thue/{id?}', ['as' => 'article.getArticleBuy', 'uses' => 'ArticleController@newArticleForBuy']);
        Route::post('dang-tin-can-mua-can-thue', ['as' => 'article.StoreArticleBuy', 'uses' => 'ArticleController@storeArticleForBuy']);

    });
});
// About

Route::get('/gioi-thieu', 'DetailController@aboutDetail');
Route::get('/quy-dinh-dang-tin', 'DetailController@aboutDetail');
Route::get('/dieu-khoan-thoa-thuan', 'DetailController@aboutDetail');
Route::get('/quy-che-hoat-dong', 'DetailController@aboutDetail');
Route::get('/co-che-giai-quyet-khieu-nai', 'DetailController@aboutDetail');
Route::get('/bao-gia-ho-tro', 'DetailController@aboutDetail');
Route::get('/nhung-cau-hoi-thuong-gap', 'DetailController@aboutDetail');
Route::get('/lien-he', 'DetailController@aboutDetail');
Route::get('/chinh-sach-bao-mat-thong-tin', 'DetailController@aboutDetail');


// catalog bán nhà đất
Route::get('/du-an-quan-12', 'CatalogController@ArticleForLease_ban_dat');

Route::get('/nha-dat-ban/{key?}', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-can-ho-chung-cu', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-nha-rieng', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-biet-thu-lien-ke', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-nha-mat-pho', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-dat-nen-du-an', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-dat', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-trang-trai-khu-nghi-duong', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-kho-nha-xuong', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-du-an-quan-12', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/ban-loai-bat-dong-san-khac', 'CatalogController@ArticleForLease_ban_dat');

// catalog nhà đất cho thuê
Route::get('/nha-dat-cho-thue/{key?}', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-can-ho-chung-cu', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-nha-rieng', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-nha-mat-pho', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-nha-tro-phong-tro', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-van-phong', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-cua-hang-ki-ot', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-kho-nha-xuong-dat', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-du-quan-12', 'CatalogController@ArticleForLease_ban_dat');
Route::get('/cho-thue-loai-bat-dong-san-khac', 'CatalogController@ArticleForLease_ban_dat');


// catalog cần mua

Route::get('/nha-dat-can-mua/{key?}', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-can-ho-chung-cu', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-nha-rieng', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-nha-biet-thu-lien-ke', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-nha-mat-pho', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-dat-nen-du-an', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-dat', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-trang-trai-khu-nghi-duong', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-kho-nha-xuong', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-du-an-quan-12', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/mua-cac-loai-bat-dong-san-khac', 'CatalogController@ArticleForBuy_cho_thue');


// catalog cho thuê đất

Route::get('/nha-dat-can-thue/{key?}', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-can-ho-chung-cu', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-nha-rieng', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/nha', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-nha-mat-pho', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-nha-tro-phong-tro', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-van-phong', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-cua-hang-ki-ot', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-kho-nha-xuong-dat', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-du-an-quan-12', 'CatalogController@ArticleForBuy_cho_thue');
Route::get('/can-thue-loai-bat-dong-san-khac', 'CatalogController@ArticleForBuy_cho_thue');



/////////
/// Content Article
/////////

// detail bán nhà đất
Route::get('/nha-dat-ban-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-can-ho-chung-cu-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-nha-rieng-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-biet-thu-lien-ke-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-nha-mat-pho-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-dat-nen-du-an-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-dat-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-trang-trai-khu-nghi-duong-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-kho-nha-xuong-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-du-an-quan-12-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/ban-loai-bat-dong-san-khac-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');

Route::get('/nha-dat-cho-thue-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-can-ho-chung-cu-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-can-nha-rieng-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-nha-mat-pho-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-nha-tro-phong-tro-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-van-phong-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-cua-hang-ki-ot-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-kho-nha-xuong-dat-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-du-an-quan-12-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');
Route::get('/cho-thue-loai-bat-dong-san-khac-{position}/{title}bds-{id}', 'DetailController@articleForLeaseDetail');


// detail cho thuê đất

Route::get('/nha-dat-can-mua-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-can-ho-chung-cu-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-nha-rieng-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-nha-biet-thu-lien-ke-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-nha-mat-pho-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-dat-nen-du-an-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-dat-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-trang-trai-khu-nghi-duong-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-kho-nha-xuong-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-du-an-quan-12-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/mua-cac-loai-bat-dong-san-khac-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');

Route::get('/nha-dat-can-thue-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-can-ho-chung-cu-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-nha-rieng-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-can-nha-rieng-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/nha-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-nha-mat-pho-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-nha-tro-phong-tro-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-van-phong-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-cua-hang-ki-ot-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-kho-nha-xuong-dat-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-du-an-quan-12-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');
Route::get('/can-thue-loai-bat-dong-san-khac-{position}/{title}bds-{id}', 'DetailController@articleForBuyDetail');

// tim kiem nang cao
Route::get('/tim-kiem-nang-cao/{method}/{type}/{province_d}/{district_id}/{ward_id}/{street_id}/{area}/{price}/{bed_room}/{toilet}/{ddlHomeDirection}/{title_article?}', 'SearchController@advance');


// tin tuc

Route::get('/tin-tuc-nha-dat/{prefix?}', 'CatalogController@Article');
Route::get('/kien-thuc-nha-dat/{prefix?}', 'CatalogController@Article');
Route::get('/ho-tro/{prefix?}', 'CatalogController@Article');

























