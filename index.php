<?php
// Need and enter your id
$data = "https://spreadsheets.google.com/feeds/list/<your Sheet ID>/od6/public/values?alt=json";
$json = file_get_contents($data);
$json_decode = json_decode($json);

$rows = $json_decode->feed->entry;
function rp($str){
    echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
function days($str){
    if ($str == "土") {
        echo("uk-card-primary");
    }else if ($str == "日") {
        echo("uk-card-danger");
    }else{
        echo("uk-card-default");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dec</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.13/dist/css/uikit.min.css" />
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.13/dist/js/uikit.min.js"></script>
<style>@media (min-width:1200px){.uk-child-width-1-7 > *{width: 14.2%;}}
.uk-card-danger{background:#f0506e;color:#fff;box-shadow:0 5px 15px rgba(0,0,0,.08)}.uk-card-danger .uk-card-title{color:#fff}
.uk-card-danger.uk-card-hover:hover{background-color:#f0506e !important;box-shadow:0 14px 25px rgba(0,0,0,.16)}
.uk-card-body>p{background-color: #e2d523; padding: 3px;}
.uk-card-body>a{background-color: #3ef347; padding: 3px;display:block;}
</style>
</head>
<body class="uk-container">
<p style="background-color: #3ef347; padding: 3px;">Click to Detail</p>
<div class="uk-child-width-1-7 uk-grid-small uk-margin-top" uk-grid>
    <?php foreach($rows as $row): ?>
        <div>
            <div class="uk-card uk-card-small <?=days($row->{'gsx$days'}->{'$t'}) ?>">
                <div class="uk-card-header">
                    <h3 class="uk-card-title"><?=rp($row->{'gsx$day'}->{'$t'}) ?></h3>
                </div>
                <?php if($row->{'gsx$content1'}->{'$t'} != ''): ?>
                <div class="uk-card-body">
                    <?php if($row->{'gsx$link1'}->{'$t'} == ''): ?>
                        <p><?=rp($row->{'gsx$content1'}->{'$t'}) ?></p>
                    <?php else: ?>
                        <a href="<?=rp($row->{'gsx$link1'}->{'$t'}) ?>" class="uk-link-reset"><?=rp($row->{'gsx$content1'}->{'$t'}) ?></a>
                    <?php endif; ?>
                    <?php if($row->{'gsx$content2'}->{'$t'} != ''): ?>
                        <?php if($row->{'gsx$link2'}->{'$t'} == ''): ?>
                            <p><?=rp($row->{'gsx$content2'}->{'$t'}) ?></p>
                        <?php else: ?>
                            <a href="<?=rp($row->{'gsx$link2'}->{'$t'}) ?>" class="uk-link-reset"><?=rp($row->{'gsx$content2'}->{'$t'}) ?></a>
                        <?php endif; ?>
                    <?php endif; ?>    
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div> 
</body>
</html>