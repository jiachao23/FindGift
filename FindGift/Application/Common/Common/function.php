<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of function
 *
 * @author jingxin
 */
/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '尾页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}


function priceE($data){
    return \log10($data);
}

function art_tech_EX($data){
    $Ex=0;
    if($data==='[100%，0%]')
    {  $Ex=-1;}
    else if ($data==='[90%，10%]')
    {  $Ex=-0.8;}
    else if ($data==='[80%，20%]')
    {  $Ex=-0.6;}
    else if ($data==='[70%，30%]')
    {  $Ex=-0.4;}
    else if ($data==='[60%，40%]')
    {  $Ex=-0.2;}
    else if ($data==='[50%，50%]')
    {  $Ex=0;}
    else if ($data==='[40%，60%]')
    {  $Ex=0.2;}
    else if ($data==='[30%，70%]')
    {  $Ex=0.4;}
    else if ($data==='[20%，80%]')
    {  $Ex=0.6;}
    else if ($data==='[10%，90%]')
    {  $Ex=0.8;}
    else if ($data==='[0%，100%]')
    {  $Ex=1;}
        return $Ex;
}

function art_tech_EY($data){
    $Ey=0;
    if($data==='[100%，0%]')
    {  $Ey=0;}
    else if ($data==='[90%，10%]')
    {  $Ey=0.6;}
    else if ($data==='[80%，20%]')
    {  $Ey=0.8;}
    else if ($data==='[70%，30%]')
    {  $Ey=sqrt(21)/5 ;}
    else if ($data==='[60%，40%]')
    {  $Ey=(2*sqrt(6))/5;}
    else if ($data==='[50%，50%]')
    {  $Ey=1;}
    else if ($data==='[40%，60%]')
    {  $Ey=(2*sqrt(6))/5;}
    else if ($data==='[30%，70%]')
    {  $Ey=sqrt(21)/5;}
    else if ($data==='[20%，80%]')
    {  $Ey=0.8;}
    else if ($data==='[10%，90%]')
    {  $Ey=0.6;}
    else if ($data==='[0%，100%]')
    {  $Ey=0;}
        return $Ey;
}

function application_EX($data){
    $Ex=0;
    if($data==='[娱乐]')
    {  $Ex=1;}
    else if ($data==='[家庭]')
    {  $Ex=-0.5;}
    else if ($data==='[工作]')
    {  $Ex=-0.5;}
    else if ($data==='[娱乐、家庭]')
    {  $Ex=0.5;}
    else if ($data==='[家庭、工作]')
    {  $Ex=-1;}
    else if ($data==='[娱乐、工作]')
    {  $Ex=0.5;}
    
        return $Ex;
}

function application_EY($data){
    $Ey=0;
    if($data==='[娱乐]')
    {  $Ey=0;}
    else if ($data==='[家庭]')
    {  $Ey=-sqrt(3)/2;}
    else if ($data==='[工作]')
    {  $Ey=sqrt(3)/2;}
    else if ($data==='[娱乐、家庭]')
    {  $Ey=-sqrt(3)/2;}
    else if ($data==='[家庭、工作]')
    {  $Ey=0;}
    else if ($data==='[娱乐、工作]')
    {  $Ey=sqrt(3)/2;}
    
        return $Ey;
}

function Composite($price_E,$application_EX,$application_EY,$art_tech_EX,$art_tech_EY){
  
    //$composite=sqrt(pow(1-$application_EX,2)+pow(1-$application_EY,2)+pow(1-$art_tech_EX,2)+pow(1-$art_tech_EY,2))*$price_E;
    $composite=sqrt(pow(0-$application_EX,2)+pow(0-$application_EY,2)+pow(0-$art_tech_EX,2)+pow(0-$art_tech_EY,2));
    return $composite;    
}
