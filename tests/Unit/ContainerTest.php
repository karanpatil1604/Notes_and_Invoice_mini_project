<?php
use Core\Container;


// test('name_of_the_test', callback)
test('it can resolve somthing out of the container', function () {
    // // expect(something_done) ot be true
    // expect(false)->toBeTrue();

    // arrange the world
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    // act : do whatever you are trying to do
    $result = $container->resolve('foo');


    // assert/expect
    expect($result)->toEqual('tar');
});