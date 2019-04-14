<?php

 namespace Application\Service;

 use Zend\InputFilter\CollectionInputFilter;
 use Zend\InputFilter\Exception\InvalidArgumentException;

 class MyCollectionInputFilter extends CollectionInputFilter
 {
     public function setData($data)
     {
         if (! (is_array($data) || $data instanceof Traversable) || empty($data)) {
             throw new InvalidArgumentException(sprintf(
                 '%s expects an array or Traversable collection; invalid collection of type %s provided',
                 __METHOD__,
                 is_object($data) ? get_class($data) : gettype($data)
             ));
         }
         parent::setData($data);
     }
 }