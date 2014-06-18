<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<form action="',$_SERVER["REQUEST_URI"],'" method="post">
<div class="title">
    <a href="/">',$options['name'],'</a> &raquo; - 修改帖子 &raquo; 
    <select name="select_cid">';
foreach($all_nodes as $n_id=>$n_name){
    if($t_obj['cid'] == $n_id){
        $sl_str = ' selected="selected"';
    }else{
        $sl_str = '';
    }
    echo '<option value="',$n_id,'"',$sl_str,'>',$n_name,'</option>';
}

echo '
</select>
</div>

<div class="main-box">';
if($tip){
    echo '<p class="red">',$tip,'</p>';
}

echo '
<p><label><input type="checkbox" name="visible" value="1" ',$t_obj['visible'],'/> 显示帖子</label>


<p><input type="submit" value=" 保 存 " name="submit" class="textbtn" /></p>

<p>
<input type="text" name="title" value="',$p_title,'" class="sll" />
</p>
<p><textarea id="markdown" name="content" class="mll tall">',$p_content,'</textarea></p>
</script>
<script type="text/javascript" >
document.getElementById("markdown").addEventListener("keypress",function (e){
  if (e.keyCode === 10 || (e.ctrlKey && e.keyCode === 13)) {
    document.getElementById("id-post-submit").click()
  };
});
</script>
';

if(!$options['close_upload']){
    include(dirname(__FILE__) . '/upload.php');
}

echo '
<p><input type="submit" value=" 保 存 " name="submit" id="id-post-submit" class="textbtn" /></p>
</form>
<p class="fs12 c666">发帖指南：</p>
<p class="fs12 c666">
支持Ctrl+Enter提交<br/>
纯文本格式，不支持html 或 ubb 代码<br/>
贴图： 可直接粘贴图片地址，如 http://www.baidu.com/xxx.gif （支持jpg/gif/png后缀名），也可直接上传<br/>
贴视频： 可直接视频地址栏里的网址，如 http://www.tudou.com/programs/view/PAH86KJNoiQ/ （仅支持土豆/优酷/QQ）<br/>
</p>

</div>
<script src="/static/js/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/static/js/jquery.markitup.js" type="text/javascript"></script>
<script src="/static/js/set.js" type="text/javascript"></script>
<script type="text/javascript" >
   $(document).ready(function() {
      $("#markdown").markItUp(mySettings);
   });
';


?>
