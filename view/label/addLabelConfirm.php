<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('label/start/'); ?>">ラベル印刷</a> <span class="divider">&gt;</span><li>
<li><a href="<?php echo $this->_linkTo('label/addLabel/'); ?>">ラベル寸法登録</a> <span class="divider">&gt;</span></li>
<li class="active">ラベル寸法登録確認</li>
</ul>

<p>以下の通りラベルを登録します。</p>
<p>ラベル名：<?php echo $post->getRequest('labelName'); ?></p>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xml:space="default"  x="0" y="0" width="400" height="300" style="background:#eee">
<rect x="70" y="70" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />
<rect x="290" y="70" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />
<rect x="70" y="220" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />
<rect x="290" y="220" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />

<line x1="80" y1="0" X2="80" Y2="70" stroke="#0c0" stroke-width="2" />
<text x="80" y="35" text-anchor="start" fill="#0c0">上余白</text>
<text x="80" y="55" text-anchor="start" fill="#0c0"><?php echo $post->getRequest('marginTop'); ?>mm</text>
<line x1="0" y1="80" X2="70" Y2="80" stroke="#0c0" stroke-width="2" />
<text x="10" y="100" text-anchor="start" fill="#0c0">左余白</text>
<text x="10" y="120" text-anchor="start" fill="#0c0"><?php echo $post->getRequest('marginLeft'); ?>mm</text>
<line x1="70" y1="90" X2="220" Y2="90" stroke="#00c" stroke-width="2" />
<text x="210" y="110" text-anchor="end" fill="#00c">幅</text>
<text x="210" y="130" text-anchor="end" fill="#00c"><?php echo $post->getRequest('width'); ?>mm</text>
<line x1="90" y1="70" X2="90" Y2="170" stroke="#c00" stroke-width="2" />
<text x="90" y="130" text-anchor="start" fill="#c00">高さ</text>
<text x="90" y="150" text-anchor="start" fill="#c00"><?php echo $post->getRequest('height');
; ?>mm</text>
<line x1="220" y1="120" X2="290" Y2="120" stroke="#0c0" stroke-width="2" />
<text x="220" y="140" text-anchor="start" fill="#0c0">横間隔</text>
<text x="220" y="160" text-anchor="start" fill="#0c0"><?php echo $post->getRequest('intervalColomn'); ?>mm</text>
<line x1="140" y1="170" X2="140" Y2="220" stroke="#0c0" stroke-width="2" />
<text x="140" y="195" text-anchor="start" fill="#0c0">縦間隔</text>
<text x="140" y="215" text-anchor="start" fill="#0c0"><?php echo $post->getRequest('intervalRow'); ?>mm</text>
</svg>

<form method="post" action="<?php echo $this->_linkTo('label/addLabelSave/'); ?>">
<input type="hidden" name="labelName" value="<?php echo $post->getRequest('labelName'); ?>">
<input type="hidden" name="marginTop" value="<?php echo $post->getRequest('marginTop'); ?>">
<input type="hidden" name="marginLeft" value="<?php echo $post->getRequest('marginLeft'); ?>">
<input type="hidden" name="width" value="<?php echo $post->getRequest('width'); ?>">
<input type="hidden" name="height" value="<?php echo $post->getRequest('height'); ?>">
<input type="hidden" name="intervalColomn" value="<?php echo $post->getRequest('intervalColomn'); ?>">
<input type="hidden" name="intervalRow" value="<?php echo $post->getRequest('intervalRow'); ?>">
<input type="submit" value="登録">
</form>
