
<?php

/**
 * 
 */
trait imageTrait{
    

    
    /**
     * check image ext
     * return 1 = true and 0 = false
     */

    public static function checkImage($imageType){

        $ext = ['image/jpeg', 'image/png'];

        if( in_Array($imageType, $ext)){
           
            return 1;
           }

            return 0;
    }




    public static function checkImageExist($imageName){


        global $cont;

        $checkImageExist = $cont->prepare("SELECT * FROM courses WHERE image = ? LIMIT 1");
        $checkImageExist->execute([$imageName]);

        if(empty($checkImageExist->fetchColumn())){
            
            return $imageName;
        } 
        
        $imageName = rand(00000 , 99999) . '_' . $imageName;
        return $imageName;


    }


}
