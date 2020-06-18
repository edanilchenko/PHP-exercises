<?php
// Tree data structure
class BinaryNode{
    public $value = null; // node value
    public $left = null; // left child
    public $right = null; // right child
    public function __construct($value) {
        $this->value = $value;
    }
}

/**
* invertTree function goes here
*/
function invertTree($root){
    $reverse_root = $root;

    $temp = $reverse_root->right;
    $reverse_root->right = $reverse_root->left;
    $reverse_root->left = $temp;
    if(!is_null($reverse_root->right)){
        $reverse_root->right = invertTree($reverse_root->right);
    }
    if(!is_null($reverse_root->left)){
        $reverse_root->left = invertTree($reverse_root->left);
    }
    return $reverse_root;
}


class InvertBinaryTreeTest extends \PHPUnit_Framework_TestCase
{
    function testInvert(){
        $root = new BinaryNode(1);
        $rootLeftChild = new BinaryNode(2);
        $rootRightChild = new BinaryNode(3);
        $rootLeftChildLeftChild = new BinaryNode(4);
        $rootLeftChildRightNode = new BinaryNode(5);
        $rootRightChildLeftChild = new BinaryNode(6);
        $rootRightChildRightNode = new BinaryNode(7);
        $rootLeftChild->left = $rootLeftChildLeftChild;
        $rootLeftChild->right = $rootLeftChildRightNode;
        $rootRightChild->left = $rootRightChildLeftChild;
        $rootRightChild->right = $rootRightChildRightNode;
        $root->left = $rootLeftChild;
        $root->right = $rootRightChild;
        $invertedTree = invertTree($root);

        $this->assertEquals($invertedTree->value, 1);
        $this->assertEquals($invertedTree->left->value, 3);
        $this->assertEquals($invertedTree->right->value, 2);
        $this->assertEquals($invertedTree->left->left->value, 7);
        $this->assertEquals($invertedTree->left->right->value, 6);
        $this->assertEquals($invertedTree->right->left->value, 5);
        $this->assertEquals($invertedTree->right->right->value, 4);
    }
}