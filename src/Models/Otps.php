<?php

namespace Xtwoend\HyperfOtp\Models;

use Hyperf\DbConnection\Model\Model;

class Otps extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('otp.table-name'));
        parent::__construct($attributes);
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }
}
