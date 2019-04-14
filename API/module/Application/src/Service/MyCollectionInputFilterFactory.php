<?php

namespace Application\Service;

class MyCollectionInputFilterFactory
{
    /**
     * @param $services
     * @return MyCollectionInputFilter
     */
    public function __invoke($services)
    {
        return new MyCollectionInputFilter();
    }

}