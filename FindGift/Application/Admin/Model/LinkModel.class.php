<?php

namespace Admin\Model;

use Think\Model;

/**
 * Category文章分类表的操作
 */
class LinkModel extends Model {

    public function selectLink() {
        $data = $this->order('id')->select();
        return $data;
    }

    public function addLink($data) {
        if ($this->add($data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findLink($whereId) {
        if ($category = $this->where($whereId)->find()) {
            return $category;
        } else {
            return 0; //查找失败返回0
        }
    }

    public function LinkUpdate($whereId, $data) {
        if ($this->where($whereId)->save($data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delLink($whereId) {
        if ($this->where($whereId)->delete()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findAllLink() {
        $data = $this->order('id')->select();
        return $data;
    }

}
