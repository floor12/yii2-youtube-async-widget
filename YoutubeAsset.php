<?php

namespace floor12\youtube;

use yii\web\AssetBundle;

/**
 * Class YoutubeAsset
 * @package floor12\youtube
 */
class YoutubeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/floor12/yii2-youtube-async-widget/';
    public $css = ['f12.youtube.css'];
    public $js = ['f12.youtube.js'];
}