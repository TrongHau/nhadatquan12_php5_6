<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Helpers;
use App\Library\UploadHandler;
use Illuminate\Support\Facades\Auth;
use  App\Models\DistrictModel;
use  App\Models\ProvinceModel;
use  App\Models\StreetModel;
use  App\Models\WardModel;
use Illuminate\Support\Facades\Hash;
use  App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Models\TypeModel;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function advance(Request $request, $method = -1, $type = -1, $province_id = -1, $district_id = -1, $ward_id = -1, $street_id = -1, $area = -1, $price = -1, $bed_room = -1, $toilet = -1, $ddlHomeDirection = -1, $title_article = '') {
        session_start();
        $titleArticle = TypeModel::where('url', $method)->first();
        if(!$titleArticle)
            return view('errors.404');
        // hiển thị tất cả các loại
        if($method == 'nha-dat-ban') {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất bán');
        }elseif($method == 'nha-dat-cho-thue') {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất cho thuê');
        }elseif($method == 'nha-dat-can-mua') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất cần mua');
        }elseif($method == 'nha-dat-can-thue') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất cần thuê');
        }
        if($type > 0) {
            $article = $article->where('type_article', $type);
        }
        if($district_id > 0) {
            $article = $article->where('district_id', $district_id);
            $district = DistrictModel::where('id', $district_id)->first();
            if(!$district)
                return view('errors.404');
            $local = $district->_name;
        }
        if($province_id > 0) {
            $article = $article->where('province_id', $province_id);
            $province = ProvinceModel::where('id', $province_id)->first();
            if(!$province)
                return view('errors.404');
            $local = $province->_name;
        }
        if($ward_id > 0) {
            $article = $article->where('ward_id', $ward_id);
        }
        if($title_article) {
            $article = $article->where('title', 'like', '%'.$title_article.'%');
        }
        if($street_id > 0) {
            $article = $article->where('street_id', $street_id);
        }
        if($area >= 0) {
            if($area == 0) {
                $article = $article->where('area', 0);
            }elseif ($area == 1) {
                $article = $article->where('area', '<=', '30')->where('area', '!=',0);
            }elseif ($area == 2) {
                $article = $article->where('area', '>=', '30')->where('price_real', '<=', '50');
            }elseif ($area == 3) {
                $article = $article->where('area', '>=', '50')->where('price_real', '<=', '80');
            }elseif ($area == 4) {
                $article = $article->where('area', '>=', '80')->where('price_real', '<=', '100');
            }elseif ($area == 5) {
                $article = $article->where('area', '>=', '100')->where('price_real', '<=', '150');
            }elseif ($area == 6) {
                $article = $article->where('area', '>=', '150')->where('price_real', '<=', '200');
            }elseif ($area == 7) {
                $article = $article->where('area', '>=', '200')->where('price_real', '<=', '250');
            }elseif ($area == 8) {
                $article = $article->where('area', '>=', '250')->where('price_real', '<=', '300');
            }elseif ($area == 9) {
                $article = $article->where('area', '>=', '300')->where('price_real', '<=', '500');
            }elseif ($area == 10) {
                $article = $article->where('area', '>=', '500');
            }
        }
        if($price >= 0) {
            if($price == 0) {
                $article = $article->where('price_real', 0);
            }elseif ($price == 1) {
                $article = $article->where('price_real', '<=', '500000000')->where('price_real', '!=',0);
            }elseif ($price == 2) {
                $article = $article->where('price_real', '>=', '500000000')->where('price_real', '<=', '800000000');
            }elseif ($price == 3) {
                $article = $article->where('price_real', '>=', '800000000')->where('price_real', '<=', '1000000000');
            }elseif ($price == 4) {
                $article = $article->where('price_real', '>=', '1000000000')->where('price_real', '<=', '2000000000');
            }elseif ($price == 5) {
                $article = $article->where('price_real', '>=', '2000000000')->where('price_real', '<=', '3000000000');
            }elseif ($price == 6) {
                $article = $article->where('price_real', '>=', '3000000000')->where('price_real', '<=', '5000000000');
            }elseif ($price == 7) {
                $article = $article->where('price_real', '>=', '5000000000')->where('price_real', '<=', '7000000000');
            }elseif ($price == 8) {
                $article = $article->where('price_real', '>=', '7000000000')->where('price_real', '<=', '9000000000');
            }elseif ($price == 9) {
                $article = $article->where('price_real', '>=', '10000000000')->where('price_real', '<=', '20000000000');
            }elseif ($price == 10) {
                $article = $article->where('price_real', '>=', '20000000000')->where('price_real', '<=', '30000000000');
            }elseif ($price == 11) {
                $article = $article->where('price_real', '>=', '30000000000');
            }
        }
        if($bed_room >= 0) {
            if($bed_room == 0) {
                $article = $article->where('bed_room', 0);
            }elseif ($bed_room == 1) {
                $article = $article->where('bed_room', '>=', '1');
            }elseif ($bed_room == 2) {
                $article = $article->where('bed_room', '>=', '2');
            }elseif ($bed_room == 3) {
                $article = $article->where('bed_room', '>=', '3');
            }elseif ($bed_room == 4) {
                $article = $article->where('bed_room', '>=', '4');
            }elseif ($bed_room == 5) {
                $article = $article->where('bed_room', '>=', '5');
            }
        }
        if($toilet >= 0) {
            if($toilet == 0) {
                $article = $article->where('toilet', 0);
            }elseif ($toilet == 1) {
                $article = $article->where('toilet', '>=', '1');
            }elseif ($toilet == 2) {
                $article = $article->where('toilet', '>=', '2');
            }elseif ($toilet == 3) {
                $article = $article->where('toilet', '>=', '3');
            }elseif ($toilet == 4) {
                $article = $article->where('toilet', '>=', '4');
            }elseif ($toilet == 5) {
                $article = $article->where('toilet', '>=', '5');
            }
        }
        if($ddlHomeDirection != -1) {
            $article = $article->where('ddl_bacon_direction', $ddlHomeDirection);
        }
        if($request->sort)
            $_SESSION['order_page_lease'] = $request->sort;
        if(isset($_SESSION['order_page_lease'])) {
            if($_SESSION['order_page_lease'] == 'price_asc'){
                $article = $article->where('price_real', '!=', 0)->orderByRaw('CAST(price_real as unsigned) asc');
            }elseif ($_SESSION['order_page_lease'] == 'price_desc') {
                $article = $article->orderByRaw('CAST(price_real as unsigned) desc');
            }elseif ($_SESSION['order_page_lease'] == 'area_asc') {
                $article = $article->where('area', '!=', 0)->orderBy('area', 'asc');
            }elseif ($_SESSION['order_page_lease'] == 'area_desc') {
                $article = $article->orderBy('area', 'desc');
            }else{
                $article = $article->orderBy('created_at', 'desc');
            }
        }else{
            $article = $article->orderBy('created_at', 'desc');
        }
        $article = $article->paginate(PAGING_LIST_ARTICLE_CATALOG);
        $key = '';
        return view('catalog.article_for_lease_ban_dat', compact('titleArticle', 'article', 'key', 'method', 'province_id', 'district_id', 'ward_id', 'street_id', 'area', 'price', 'bed_room', 'toilet', 'ddlHomeDirection', 'local'));
    }
}
