<?php
namespace Core\Lib\System;
/**
 * 自动装载类
 * @author jzz
 */
Class Vendor{    

    /**
     * [registerAutoload 装载某个类文件]
     * @return [type] [description]
     * @author jzz
     */
    public static function registerAutoload(){
        return spl_autoload_register(array(__CLASS__, 'includeClass'));
    }
    
    /**
     * [unregisterAutoload 注销某个类文件(卸载)]
     * @return [type] [description]
     * @author jzz
     */
    public static function unregisterAutoload(){
        return spl_autoload_unregister(array(__CLASS__, 'includeClass'));
    }
    
    /**
     * [includeClass 装载类文件]
     * @param  string $ClassName [类名]
     * @return [type]            [description]
     * @author jzz
     */
    public static function includeClass($ClassName=''){
        $ClassPathInfo = explode('\\', $ClassName);
        $InfoNum = count($ClassPathInfo);
        $ClassName = $ClassPathInfo[$InfoNum-1];
        $OrgPath = CORE_PATH . DS . 'Lib'. DS .'Expansion'. DS . 'ORG'. DS .strtr($ClassName, '_\\', '//') . EXT;
        $UtilPath = CORE_PATH . DS . 'Lib'. DS .'Expansion'. DS . 'Util'. DS .strtr($ClassName, '_\\', '//') . EXT;
        if (is_file($UtilPath)) {
            require($UtilPath);
        }else{
            if (!is_file($OrgPath)) {
                \Core\Lib\System\Prompt::ViewError("{$ClassName} => Class Not Found</br><h4>$OrgPath</h4>");exit;
            }
            require($OrgPath);
        }
    }
}