<?php

namespace App\Http\Controllers\Home;

use App\Model\Admin\VideoBanner;
use App\Model\Admin\VideoWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function zzsp()
    {
        $banner = VideoBanner::where('isshow', '1')->first();       //banner数据
        $videos = VideoWork::all();                                 //作品数据
        $neighbor = array();                //街坊
        $xingkonglive = array();            //星空直播
        $other = array();                   //其它
        foreach ($videos as $video) {
            if ($video['sort'] == 0) {
                $neighbor[] = array(
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banner['video'] . '&tiny=0&auto=0',
                    'name' => $banner['title'],
                    'author' => $banner['author']
                );
            } elseif ($video['sort'] == 1) {
                $xingkonglive[] = array(
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banner['video'] . '&tiny=0&auto=0',
                    'name' => $banner['title'],
                    'author' => $banner['author']
                );
            } elseif ($video['sort'] == 2) {
                $other[] = array(
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banner['video'] . '&tiny=0&auto=0',
                    'name' => $banner['title'],
                    'author' => $banner['author']
                );
            }
        }
        return response()
            ->json([
                'show' => [
                    'src' => 'https://v.qq.com/iframe/player.html?vid=' . $banner['video'] . '&tiny=0&auto=0',
                    'name' => $banner['title'],
                    'author' => $banner['author'],
                    'time' => $banner['time'],
                    'people' => $banner['people'],
                    'text' => $banner['description']
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
