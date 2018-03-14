<?php

namespace App\Http\Controllers\Home;

use App\Model\Admin\CenterAct;
use App\Model\Admin\CenterBanner;
use App\Model\Admin\CenterProduction;
use App\Model\Admin\CenterWechat;
use App\Model\Admin\CenterWork;
use App\Model\Admin\StyleAct;
use App\Model\Admin\StyleBanner;
use App\Model\Admin\StyleHis;
use App\Model\Admin\VideoBanner;
use App\Model\Admin\VideoWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * 三大中心Api接口
     */
    public function sdzx()
    {
        //①banner处理
        $banners = CenterBanner::where('isshow', '1')->get();
        $jsbanner = array();        //技术板块banner
        $cmbanner = array();        //传媒板块banner
        $ycbanner = array();        //运策板块banner
        foreach ($banners as $banner) {
            if ($banner['sort'] == '0') {
                $jsbanner[] = array(                            //技术板块banner
                    'img' => $banner['picurl'],
                    'name' => $banner['title'],
                    'author' => $banner['direction'],
                    'time' => $banner['time'],
                    'text' => $banner['description'],
                );
            } elseif ($banner['sort'] == '1') {
                $cmbanner[] = array(                            //传媒板块banner
                    'img' => $banner['picurl'],
                    'name' => $banner['title'],
                    'author' => $banner['direction'],
                    'time' => $banner['time'],
                    'text' => $banner['description'],
                );
            } elseif ($banner['sort'] == '2') {
                $ycbanner[] = array(                            //运策板块banner
                    'img' => $banner['picurl'],
                    'name' => $banner['title'],
                    'author' => $banner['direction'],
                    'time' => $banner['time'],
                    'text' => $banner['description'],
                );
            }
        }


        //②作品分类
        $products = CenterProduction::all();
        $wechatpros = CenterWechat::all();
        //技术研发中心
        $webproduct = array();
        $androidproduct = array();
        $iosproduct = array();

        //文化传媒中心
        $haibaoproduct = array();
        $uiproduct = array();
        $jiefangproduct = array();
        $sheyingproduct = array();

        //运营策划中心
        $ycproduct = array();
        foreach ($products as $key => $product) {
            if ($product['center'] == '0') {                            //技术研发中心
                if ($product['sort'] == '0') {                          //web
                    $webproduct[] = array(
                        'content' => $product['picurl'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                } elseif ($product['sort'] == '1') {                    //Android
                    $androidproduct[] = array(
                        'content' => $product['picurl'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                } elseif ($product['sort'] == '2') {                    //iOS
                    $iosproduct[] = array(
                        'content' => $product['picurl'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                }
            } elseif ($product['center'] == '1') {                      //文化传媒中心
                if ($product['sort'] == '3') {                          //海报
                    $haibaoproduct[] = array(
                        'content' => $product['picurl'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                } elseif ($product['sort'] == '4') {                    //UI设计
                    $uiproduct[] = array(
                        'content' => $product['picurl'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                } elseif ($product['sort'] == '5') {                    //街坊视频
                    $jiefangproduct[] = array(
                        'src' => $product['video_url'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                } elseif ($product['sort'] == '6') {                    //摄影视频
                    $sheyingproduct[] = array(
                        'src' => $product['video_url'],
                        'name' => $product['title'],
                        'author' => $product['author'],
                    );
                }
            }
        }

        foreach ($wechatpros as $wechatpro){
            $ycproduct[] = array(
                'content' => $wechatpro['save_file'],
                'name' => $wechatpro['title'],
                'author' => $wechatpro['author'],
            );
        }

        //③活动记录处理
        $activitys = CenterAct::all();
        $jsact = array();        //技术板块活动记录
        $cmact = array();        //传媒板块活动记录
        $ycact = array();        //运策板块活动记录
        foreach ($activitys as $activity) {

            //多图片处理
            $datas = explode(",", $activity['picurl']);      //','作为分割
            $img = array();                                         //数组重置为零，防止出现数组重叠
            foreach ($datas as $data) {
                $img[] = array(
                    'img' => $data
                );
            }

            if ($activity['sort'] == '0') {
                $jsact[] = array(                            //技术板块活动记录
                    'time' => $activity['time'],
                    'name' => $activity['title'],
                    'illustation' => $activity['description'],
                    'imgs' => $img,
                );
            } elseif ($activity['sort'] == '1') {
                $cmact[] = array(                            //传媒板块活动记录
                    'time' => $activity['time'],
                    'name' => $activity['title'],
                    'illustation' => $activity['description'],
                    'imgs' => $img,
                );
            } elseif ($activity['sort'] == '2') {
                $ycact[] = array(                            //运策板块活动记录
                    'time' => $activity['time'],
                    'name' => $activity['title'],
                    'illustation' => $activity['description'],
                    'imgs' => $img,
                );
            }
        }

        //④工作记录处理
        $works = CenterWork::all();
        $jswork = array();        //技术板块工作记录
        $cmwork = array();        //传媒板块工作记录
        $ycwork = array();        //运策板块工作记录
        foreach ($works as $work) {

            //多图片处理
            $datas = explode(",", $work['picurl']);      //','作为分割
            $img = array();                                         //数组重置为零，防止出现数组重叠
            foreach ($datas as $data) {
                $img[] = array(
                    'img' => $data
                );
            }

            if ($work['sort'] == '0') {
                $jswork[] = array(                            //技术板块工作记录
                    'time' => $work['time'],
                    'name' => $work['title'],
                    'illustation' => $work['description'],
                    'imgs' => $img,
                );
            } elseif ($work['sort'] == '1') {
                $cmwork[] = array(                            //传媒板块工作记录
                    'time' => $work['time'],
                    'name' => $work['title'],
                    'illustation' => $work['description'],
                    'imgs' => $img,
                );
            } elseif ($work['sort'] == '2') {
                $ycwork[] = array(                            //运策板块工作记录
                    'time' => $work['time'],
                    'name' => $work['title'],
                    'illustation' => $work['description'],
                    'imgs' => $img,
                );
            }
        }

        return response()
            ->json([
                'js' => array(
                    'show' => $jsbanner,
                    'classifyname' => ["web", "Android", "iOS"],
                    'classify' => array(
                        $webproduct,
                        $androidproduct,
                        $iosproduct
                    ),
                    'activityrecord' => $jsact,
                    'workrecord' => $jswork
                ),
                'cm' => array(
                    'show' => $cmbanner,
                    'classifyname' => ["海报", "UI设计", "街坊视频", "摄影视频"],
                    'classify' => array(
                        $haibaoproduct,
                        $uiproduct,
                        $jiefangproduct,
                        $sheyingproduct
                    ),
                    'activityrecord' => $cmact,
                    'workrecord' => $cmwork
                ),
                'yc' => array(
                    'show' => $ycbanner,
                    'classifyname' => ["推文"],
                    'classify' => $ycproduct,
                    'activityrecord' => $ycact,
                    'workrecord' => $ycwork
                )
            ]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * 组织风貌Api接口
     */
    public function zzfm()
    {
        //①banner处理
        $banners = StyleBanner::where('isshow', '1')->get();
        $bannerdata = array();                  //banner数据(返回到Api接口)
        foreach ($banners as $banner) {
            $bannerdata[] = array(
                'img' => $banner['picurl'],
                'name' => $banner['center'],
                'author' => $banner['direction'],
                'time' => $banner['time'],
                'text' => $banner['description']
            );
        }

        //②活动记录处理
        $activitys = StyleAct::all();
        $activitydata = array();                 //活动记录数据(返回到Api接口)
        foreach ($activitys as $activity) {

            //多图片处理
            $datas = explode(",", $activity['picurl']);      //','作为分割
            foreach ($datas as $data) {
                $img[] = array(
                    'img' => $data
                );
            }

            //返回api接口
            $activitydata[] = array(
                'time' => $activity['time'],
                'name' => $activity['title'],
                'illustation' => $activity['description'],
                'imgs' => $img
            );
        }

        //③星空人去向
        $historys = StyleHis::orderBy('year', 'desc')->get();           //按照年份排序
//        dd($historys['0']);
        $historydata = array();
        foreach ($historys as $key => $history) {
            $historydata[$key][] = array(
                'name' => $history['username'],
                'xkjob' => $history['oldoffice'],
                'currentjob' => $history['newoffice'],
                'photo' => $history['picurl'],
            );
        }
        return response()
            ->json([
                'show' => $bannerdata
                ,
                'activityrecord' => $activitydata
                ,
                'xkmandata' => $historydata

            ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 组织视频Api接口
     */
    public function zzsp()
    {
        $banners = VideoBanner::where('isshow', '1')->first();       //banner数据
        $videos = VideoWork::all();                                 //作品数据
        $neighbor = array();                //街坊
        $xingkonglive = array();            //星空直播
        $other = array();                   //其它
        foreach ($videos as $video) {
            if ($video['sort'] == 0) {
                $neighbor[] = array(
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banners['video'] . '&tiny=0&auto=0',
                    'name' => $banners['title'],
                    'author' => $banners['author']
                );
            } elseif ($video['sort'] == 1) {
                $xingkonglive[] = array(
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banners['video'] . '&tiny=0&auto=0',
                    'name' => $banners['title'],
                    'author' => $banners['author']
                );
            } elseif ($video['sort'] == 2) {
                $other[] = array(
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banners['video'] . '&tiny=0&auto=0',
                    'name' => $banners['title'],
                    'author' => $banners['author']
                );
            }
        }
        return response()
            ->json([
                'show' => [
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banners['video'] . '&tiny=0&auto=0',
                    'name' => $banners['title'],
                    'author' => $banners['author'],
                    'time' => $banners['time'],
                    'people' => $banners['people'],
                    'text' => $banners['description']
                ],
                'classifyname' => ['街坊视频', '星空直播', '其他'],
                'classify' => [
                    $neighbor,
                    $xingkonglive,
                    $other
                ]
            ]);
    }
}
