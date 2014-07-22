<?php 
$url = 'http://localhost/editcode/admin.php?file_name_load=';
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<link type="text/css" href="http://localhost/editcode/css/stdtheme.css" rel="stylesheet">
</head>
<body>
<h2>More Examples of jQuery Selectors</h2>
<table class="reference notranslate">
<tbody><tr>
<th style="width:25%">Syntax</th>
<th style="width:65%">Description</th>
<th>Example</th>
</tr>
<tr>
<td>$("*")</td>
<td>Selects all elements</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>jQuerySelectors_Selects_all_elements.php">Try it</a></td>
</tr>
<tr>
<td>$(this)</td>
<td>Selects the current HTML element</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("p.intro")</td>
<td>Selects all &lt;p&gt; elements with class="intro"</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("p:first")</td>
<td>Selects the first &lt;p&gt; element</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("ul li:first")</td>
<td>Selects the first &lt;li&gt; element of the first &lt;ul&gt;</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("ul li:first-child")</td>
<td>Selects the first &lt;li&gt; element of every &lt;ul&gt;</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("[href]")</td>
<td>Selects all elements with an href attribute</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("a[target='_blank']")</td>
<td>Selects all &lt;a&gt; elements with a target attribute value equal to "_blank"</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("a[target!='_blank']")</td>
<td>Selects all &lt;a&gt; elements with a target attribute value NOT equal to "_blank"</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$(":button")</td>
<td>Selects all &lt;button&gt; elements and &lt;input&gt; elements of type="button"</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("tr:even")</td>
<td>Selects all even &lt;tr&gt; elements</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
<tr>
<td>$("tr:odd")</td>
<td>Selects all odd &lt;tr&gt; elements</td>
<td><a target="_blank" class="tryitbtn" style="width:55px;padding-top:0px;padding-bottom:1px" href="<?php echo $url;?>">Try it</a></td>
</tr>
</tbody></table>
</body>
</html>

