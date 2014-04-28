<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('shelf/start/'); ?>">棚番管理</a> <span class="divider">&gt;</span></li>
<li class="active">複数棚番ラベル印刷のラベル選択</li>
</ul>

<form method="post" action="<?php echo $this->_linkTo('shelf/outputPdf/'); ?>">

<p>以下の番号を印刷します：
<?php
$l = 0;
for($i = $shelfMin; $i <= $shelfMax; $i++){
    for($j = $trayMin; $j <= $trayMax; $j++){
        for($k = $trayDivideMin; $k <= $trayDivideMax; $k++){
            echo '<br><strong>';
            echo $post->getRequest('row') . '-' . sprintf('%02d',$i) . '-' . sprintf('%02d',$j) . '-' . sprintf('%02d',$k);
            echo '</strong>' . "\n";
            echo '<input type="hidden" name="shelf' . $l . '" value="' . $post->getRequest('row') . '-' . sprintf('%02d',$i) . '-' . sprintf('%02d',$j) . '-' . sprintf('%02d',$k) . '">' . "\n";
            $l++;
        }
    }
}
?>
</p>
<p>ラベルを選択して下さい。</p>

<p><input type="submit" value="PDF出力"></p>
<ul class="unstyled">
<?php foreach ($label as $value){ ?>
<li><input type="radio" name="labelName" value="<?php echo $value->labelName; ?>" required><?php echo $value->labelName; ?>
<br>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xml:space="default"  x="0" y="0" width="200" height="150" style="background:#eee">
<rect x="35" y="35" width="75" height="50" stroke="#000" stroke-width="2" fill="none" />
<rect x="145" y="35" width="75" height="50" stroke="#000" stroke-width="2" fill="none" />
<rect x="35" y="110" width="75" height="50" stroke="#000" stroke-width="2" fill="none" />
<rect x="145" y="110" width="75" height="50" stroke="#000" stroke-width="2" fill="none" />

<line x1="40" y1="0" X2="40" Y2="35" stroke="#0c0" stroke-width="2" />
<text x="40" y="27" text-anchor="start" fill="#0c0" font-size="0.8em"><?php echo $value->marginTop; ?>mm</text>
<line x1="0" y1="40" X2="35" Y2="40" stroke="#0c0" stroke-width="2" />
<text x="0" y="55" text-anchor="start" fill="#0c0" font-size="0.8em"><?php echo $value->marginLeft; ?>mm</text>
<line x1="35" y1="45" X2="110" Y2="45" stroke="#00c" stroke-width="2" />
<text x="105" y="60" text-anchor="end" fill="#00c" font-size="0.8em"><?php echo $value->width; ?>mm</text>
<line x1="45" y1="35" X2="45" Y2="85" stroke="#c00" stroke-width="2" />
<text x="45" y="75" text-anchor="start" fill="#c00" font-size="0.8em"><?php echo $value->height;
; ?>mm</text>
<line x1="110" y1="60" X2="145" Y2="60" stroke="#0c0" stroke-width="2" />
<text x="110" y="75" text-anchor="start" fill="#0c0" font-size="0.8em"><?php echo $value->intervalColomn; ?>mm</text>
<line x1="70" y1="85" X2="70" Y2="110" stroke="#0c0" stroke-width="2" />
<text x="70" y="100" text-anchor="start" fill="#0c0" font-size="0.8em"><?php echo $value->intervalRow; ?>mm</text>
</svg>


</li>
<?php } ?>
<ul>

<p><input type="submit" value="PDF出力"></p>
</form>

