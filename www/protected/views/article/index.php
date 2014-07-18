<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/18/14
 * Time: 2:43 PM
 * To change this template use File | Settings | File Templates.
 */
echo 'Đây là bài giảng';
echo '</br>';
?>
<?php
$new = News::model()->findByPk(191);
?>
<?php Yii::app()->syntaxhighlighter->addHighlighter();

    echo htmlspecialchars_decode(htmlspecialchars($new->content, ENT_QUOTES),ENT_QUOTES);
?>
<pre class="brush : php">
    <form action="test"></form>
</pre>