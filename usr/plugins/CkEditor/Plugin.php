<?php
/**
 * 集成CkEditor编辑器, 由Jooies制作
 * 
 * @package CkEditor
 * @author jooies
 * @version 1.0.1
 * @link http://www.agnni.org
 */
class CkEditor_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('admin/write-post.php')->richEditor = array('CkEditor_Plugin', 'render');
        Typecho_Plugin::factory('admin/write-page.php')->richEditor = array('CkEditor_Plugin', 'render');
        
        //去除段落
        Typecho_Plugin::factory('Widget_Contents_Post_Edit')->write = array('CkEditor_Plugin', 'filter');    
        Typecho_Plugin::factory('Widget_Contents_Page_Edit')->write = array('CkEditor_Plugin', 'filter');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 去除段落
     * 
     * @access public
     * @param array $post 数据结构体
     * @return array
     */
    public static function filter($post)
    {
        $post['text'] = str_replace("\n", '', $post['text']);
        return $post;
    }
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($post)
    {
        $options = Helper::options();
        
        //调用编辑器
        echo "<script type=\"text/javascript\" src=\"".Typecho_Common::url('CkEditor/ckeditor', $options->pluginUrl)."/ckeditor.js\"></script>
        <script type=\"text/javascript\">CKEDITOR.replace( 'text', {fullPage: true});</script>";

    }
}
