<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Setting extends Model
{
    protected $guarded=[];
    use HasTranslations;
    use HasFactory;
    public $appends=['logo_url','favicon_url'];
    public $translatable = ['website_name','address_1','address_2','seo_keywords','seo_description',];

    public function getLogoUrlAttribute(){
        return $this->logo?asset('storage/avatars/'.$this->logo):'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->logo)));
    }
    public function getFaviconUrlAttribute(){
        return $this->logo?asset('storage/avatars/'.$this->favicon):'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->favicon)));
    }

}
