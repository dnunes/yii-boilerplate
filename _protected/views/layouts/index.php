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

<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery-1.9.1.js" type="text/javascript"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-00000000-0', 'yourdomain.com');
ga('send', 'pageview');
</script>
