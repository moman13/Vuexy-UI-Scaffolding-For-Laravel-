<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class Role extends Model
{
     use Loggable;
     use HasFactory;

    public $appends=['status_name'];
    protected $fillable =['name'];


        public function getStatusNameAttribute(){
            if($this->status){
                return 'فعال';

            }
            return 'غير فعال';
        }
        public function setStatus()
        {
            $this->status = !$this->status;
            $this->save();
        }


        public  static function  getColumnLang(){

            $columes=[
                'name'=>[\Lang::get('role.Permission_name'),1,true,true,[]],
                'actions'=>[\Lang::get('role.Actions'),3,true,false,['edit','delete']],
            ];

            return $columes;


    }


}
