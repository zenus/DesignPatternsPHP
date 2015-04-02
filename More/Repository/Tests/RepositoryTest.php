<?php

namespace DesignPatterns\Repository\Tests;

use DateTime;
use DesignPatterns\Repository;


class Test extends \PHPUnit_Framework_TestCase {

    /**
     *
     */
    public function testPostRepository()
    {

        $post = new Repository\Post();
        $post->setAuthor("zenus");
        $post->setCreated(new DateTime());
        $post->setText("design patterns used in php");
        $post->setTitle("design patterns");
        $store = new Repository\MemoryStorage();
        $repository  = new Repository\PostRepository($store);
        $storeId = $repository->save($post);
        $checkPost = $repository->getById($storeId);
        $this->assertEquals($checkPost->getAuthor(), "zenus");
    }


}
