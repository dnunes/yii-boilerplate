<!DOCTYPE html>
<meta charset="utf-8">

<title>a study of population dynamics</title>

<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/home.css" type="text/css" />
<script type="text/javascript">
	BASEURL = '<?php echo Yii::app()->getBaseUrl(true); ?>/';
</script>

<div id="tudo">

<?php $this->renderPartial('/layouts/_parts/sample'); ?>
<?php echo $content; ?>

</div> <!-- fim tudo -->

<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-00000000-0']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
