<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('label/start/'); ?>">ラベル印刷</a> <span class="divider">&gt;</span></li>
<li class="active">ラベル寸法登録</li>
</ul>

<p>下図の通り寸法を単位「mm」で入力して下さい。</p>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xml:space="default"  x="0" y="0" width="400" height="300" style="background:#eee">
<rect x="70" y="70" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />
<rect x="290" y="70" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />
<rect x="70" y="220" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />
<rect x="290" y="220" width="150" height="100" stroke="#000" stroke-width="2" fill="none" />

<line x1="80" y1="0" X2="80" Y2="70" stroke="#0c0" stroke-width="2" />
<text x="80" y="35" text-anchor="start" fill="#0c0">上余白</text>
<line x1="0" y1="80" X2="70" Y2="80" stroke="#0c0" stroke-width="2" />
<text x="10" y="100" text-anchor="start" fill="#0c0">左余白</text>
<line x1="70" y1="90" X2="220" Y2="90" stroke="#00c" stroke-width="2" />
<text x="210" y="110" text-anchor="end" fill="#00c">幅</text>
<line x1="90" y1="70" X2="90" Y2="170" stroke="#c00" stroke-width="2" />
<text x="90" y="130" text-anchor="start" fill="#c00">高さ</text>
<line x1="220" y1="120" X2="290" Y2="120" stroke="#0c0" stroke-width="2" />
<text x="220" y="140" text-anchor="start" fill="#0c0">横間隔</text>
<line x1="140" y1="170" X2="140" Y2="220" stroke="#0c0" stroke-width="2" />
<text x="140" y="195" text-anchor="start" fill="#0c0">縦間隔</text>
</svg>

<form method="post" action="<?php echo $this->_linkTo('label/addLabelConfirm/'); ?>">
<p>ラベル名（半角英数、ハイフン、アンダーバー）：<input type="text" name="labelName" pattern="^[0-9a-zA-Z-_]+$" required>※メーカと品番等で重複しない名前をつけて下さい。</p>
<p>幅：<input type="text" name="width" size="5" pattern="^[0-9.]+$" maxlength="7" required></p>
<p>高さ：<input type="text" name="height" size="5" pattern="^[0-9.]+$" maxlength="7" required></p>
<p>左余白：<input type="text" name="marginLeft" size="5" pattern="^[0-9.]+$" maxlength="7" required></p>
<p>上余白：<input type="text" name="marginTop" size="5" pattern="^[0-9.]+$" maxlength="7" required></p>
<p>横間隔：<input type="text" name="intervalColomn" size="5" pattern="^[0-9.]+$" maxlength="7" required></p>
<p>縦間隔：<input type="text" name="intervalRow" size="5" pattern="^[0-9.]+$" maxlength="7" required></p>
<p><input type="submit" value="登録確認"></>
</form>

<h2>既登録のラベル名</h2>
<ul>
<?php foreach ($label as $value){ ?>
<li><a href="<?php echo $this->_linkTo('label/showLabel/label/' . $value->labelName); ?>"><?php echo $value->labelName; ?></a></li>
<?php } ?>
<ul>
