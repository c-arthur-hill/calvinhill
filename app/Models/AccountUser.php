<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountUser extends Model
{
    const ADMIN = 'admin';
    const MANAGER = 'manager';
    const EMPLOYEE = 'employee';

    use HasFactory;
}
