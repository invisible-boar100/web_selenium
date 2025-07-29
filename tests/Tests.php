<?php

include_once(dirname(__FILE__)).'/../classes/product_class.php';
include_once(dirname(__FILE__)).'/../Settings/db_class.php';


use PHPUnit\Framework\TestCase;

class Tests extends TestCase {

    function testConnection() {
        $this->assertTrue(class_exists('Connection'));
    }

    function testProductClassExists(): void {
        $this->assertTrue(class_exists('product_class'));
    }

    function testCheckBrand(){

        $mockProduct = $this->createMock(product_class::class);

        $mockProductArray = [
            ['id' => 1, 'brand_name' => 'Asempa']
        ];

        $mockProduct->method('check_brand')->willReturn($mockProductArray);

        $products = $mockProduct->check_brand('brand_name');

        $this->assertEquals('Asempa', $products[0]['brand_name']);
    }

    function testCheckAllBrands(){

        $mockProduct = $this->createMock(product_class::class);

        $mockProductArray = [
            ['id' => 1, 'brand_name' => 'Apple'],
            ['id' => 2, 'brand_name' => 'Samsung']
        ];

        $mockProduct->method('select_all_brands')->willReturn($mockProductArray);

        $products = $mockProduct->select_all_brands('id');

        $this->assertEquals('2', $products[1]['id']);
    }

    function testCheckCategory(){

        $mockCategory = $this->createMock(product_class::class);

        $mockCateogryArray = [
            ['id' => 1, 'cat_name' => 'Phones'],
            ['id' => 2, 'cat_name' => 'Tablets'],
            ['id' => 3, 'cat_name' => 'Watches']
        ];

        $mockCategory->method('check_category')->willReturn($mockCateogryArray);

        $products = $mockCategory->check_category('cat_name');

        $this->assertEquals('Phones', $products[0]['cat_name']);
    }

}

?>