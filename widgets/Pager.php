<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-28
 * Time: 11:42
 */




// Переопределяем renderPageButton для изменения формата кнопок
namespace app\widgets;


use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\base\Widget;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;

class Pager extends LinkPager
{
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {

        if ($label < 10){
            $label = '0' . $label;
        }
        $label = $label . '.';
        $options = $this->linkContainerOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, empty($class) ? $this->pageCssClass : $class);
        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
            $disabledItemOptions = $this->disabledListItemSubTagOptions;
            $tag = ArrayHelper::remove($disabledItemOptions, 'tag', 'span');
            return Html::tag($linkWrapTag, Html::tag($tag, $label, $disabledItemOptions), $options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;
        return Html::tag($linkWrapTag, Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }
}