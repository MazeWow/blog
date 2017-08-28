<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
<!--		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
		<title><?=isset($article) ? $article.' ' :'';?>Maze's Blog</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- <link href="//cdn.bootcss.com/normalize/5.0.0/normalize.min.css" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link href="/highlight.js/src/styles/github.css" rel="stylesheet">
		<link href="/css/common.css?time=<?=time();?>" rel="stylesheet"/>
		<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<style>
			<?php // echo $response -> FontFace;?>
		</style>
	</head>
	<body>
	<?php if(!isset($a)):?>
	<nav id="main_category">
		<h1 class="main-title">Maze's Blog</h1>
		<?=$category?>
	</nav>
	<?php endif; ?>
	<div id="article">
		<div>
			<?=$html;?>
		</div>
	</div>
	<script src="/js/common.js"></script>
	<script>
		// 代码高亮
		hljs.initHighlightingOnLoad();

		// 异步加载文章
		$('#main_category a').on('click',function(){
			$("#main_category a").removeClass('active');
			$(this).addClass('active');
			var href = $(this).attr('href');
			$.ajax({
				url:href,
				type:'GET',
				data:{},
				dataType:'text',
				timeout:5000,
				success:function(data){
					$("#article").empty().append($(data)).find('pre code').each(function(i,block){
						hljs.highlightBlock(block);
					});
				}
			});
			return false; // 阻止冒泡 阻止事件
		});

		// 目录折叠
		$("#main_category>ul h2").on('click',function () {
			if($(this).next().hasClass('hide')){
				$(this).next().removeClass('hide').hasClass('show');
			}else{
				$(this).next().removeClass('show').addClass('hide');
			}
		});
	</script>
	</body>
</html>
