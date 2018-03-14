<?php

namespace App\Http\Controllers\Home;

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
                'show' =>
                    $bannerdata
                ,
                'activityrecord' =>
                    $activitydata
                ,
                'xkmandata' =>
                    $historydata

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
