<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = [
        'firstName',
        'middleName',
        'lastName',
        'username',
        'email',
        'password',
        'created_at'
    ];
}