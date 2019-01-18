<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'email', 'anotacao', 'avatar'
    ];

    //Accessor
    public function getAvatarImageAttribute($value){
        return $this->avatar == null ? asset('images/null.png') : asset($this->avatar);
    }

    public function getAvatarFilenameAttribute($value){
        return substr($this->avatar, 30, strlen($this->avatar));
    }

    //Mutator
    public function setAvatarAttribute($value){
        $filename = substr(md5(rand(100000, 999999)),0,5).'_'.$value->getClientOriginalName();
        $filepath = 'public/uploads'.date('Y').'/'.date('m').'/';
        if($value->isValid()){
            $path = $value->storeAs($filepath, $filename);
        }
        $this->attributes['avatar'] = str_replace('public', 'storage', $filepath).$filename;
    }
}
