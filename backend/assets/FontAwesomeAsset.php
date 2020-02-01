<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Fontawesome backend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
	public $sourcePath = '@bower/font-awesome';
	public $css = [
		'css/all.min.css',
	];
}
