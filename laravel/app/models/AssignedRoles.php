<?php

class AssignedRoles extends Eloquent {
    protected $guarded = array();
    
    protected $connection = 'user_mysql';
    
    public static $rules = array();

}