<?php

namespace App\Traits;


trait Alert
{

    public function showModal($title,$text,$type)
    {
        $this->emit('swal:modal', [
            'title' => $title,
            'text'  => $text,
            'type'  => $type,
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'This is a success alert!!',
            'timeout' => 10000
        ]);
    }

    public function showConfirmation($title,$text,$method,$param)
    {
        $this->emit("swal:confirm", [
            'type'        => 'warning',
            'title'       => $title,
            'text'        => $text,
            'confirmText' => 'حذف',
            'cancelText' => 'الغاء',
            'method'      => $method,
            'params'      => $param, // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }

    public function showDataModel($name,$action)
    {
        $this->emit("model:basic", [
            'name'=>$name,
            'action'=>$action,

        ]);
    }

    public function showTranslationModel($name,$action)
    {
        $this->emit("model:basic", [
            'name'=>$name,
            'action'=>$action,

        ]);
    }
    public function rest(){
        $this->reset();
    }



}