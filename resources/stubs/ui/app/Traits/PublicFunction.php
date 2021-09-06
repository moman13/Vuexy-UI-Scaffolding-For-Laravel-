<?php

namespace App\Traits;


trait PublicFunction
{
    public  $arrLabel= [];
    public  $arrMessage= [];

    // permission array  .
    public function actions_permission()

        {

            $actions = \App\Models\ActionRole::where('user_id', auth()->user()->id)->where('role_id', auth()->user()->role_id)->pluck('name')->toArray();
            if (empty($actions)) {
                $actions = \App\Models\ActionRole::where('role_id', auth()->user()->role_id)->wherenull('user_id')->pluck('name')->toArray();

            }

         return   $this->actions = $actions;

        }

       // open translation model pop up .
    public function open_model($currantLang)
    {

        $this->showTranslationModel('translation', 'show');



    }

     // buildArray of  translation file.
    public function buildArray($fileData)
    {
        $content = "";
        foreach($fileData as $lable => $data)
        {
            if(is_array($data))
            {
                $content .= "'$lable'=>[" . $this->buildArray($data) . "],";
                $content .="\n";
            }
            else
            {
                $content .= "'$lable'=>'" . addslashes($data) . "',";
                $content .="\n";
            }
        }

        return $content;
    }

    // store value of data in  translation file.

    public function storeLangData($currantLang)
    {

        $dir      = base_path() . '/resources/lang';


        $langFolder = $dir . "/" . $currantLang;


        foreach($this->arrMessage as $fileName => $fileData)
        {
            $content = "<?php return [";
            $content .= $this->buildArray($fileData);
            $content .= "];";
            file_put_contents($langFolder . "/" . $fileName . '.php', $content);
        }
        $this->showTranslationModel('translation', 'hide');

    }

    public function getColNameForValidation($cols){
        $final_array = [];
        foreach ($cols as $key => $value){
            $final_array[$key]=isset($value[0])?$value[0]:'';
        }

        return $final_array;
    }
}