<?php
namespace php\model;

use php\Model;

/**
 *
 * @author Edi
 *        
 */
class User extends Model
{

    /**
     */
    public function __construct()
    {
        parent::__construct();
        echo 'modeluser';
    }
}

