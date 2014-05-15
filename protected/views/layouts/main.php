<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.mobile-1.3.1.min.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/css/js/jquery.mobile-1.3.1.min.js');
    Yii::app()->clientScript->registerCoreScript('jquery'); 
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/form.css');
?>
 <title><?php echo CHtml::encode($this->pageTitle); ?></title>
 <meta content='width=device-width, initial-scale=1' name='viewport' />
 <meta content='yes' name='apple-mobile-web-app-capable' />
 <meta content='black' name='apple-mobile-web-app-status-bar-style' />
</head>
<body>
<?php
$url = Yii::app()->request->requestUri;
?>
<div data-role="page" id="page1" data-url="<?php echo $url; ?>">
	<?php 

		$htmlOptions = array('data-role' => 'header', 'class' => 'localnav', 'style' => 'margin:0;');

		$linkOptionsLeft  = array('data-icon'=>'home', 'data-role' => 'button',  'data-theme' => 'a', 'rel' => 'external', 'class'=>'ui-btn-left');

		$linkOptionsRight = array('data-role' => 'button',  'data-theme' => 'a', 'rel' => 'external', 'class'=>'ui-btn-right');
		
		$items = array();

		if (Yii::app()->user->isGuest) {
				$items[] = array('label'=>'Login', 
					'url'=>array('/site/login'),
					'linkOptions' => $linkOptionsRight);
		}
		else {
				$items[] = array('label'=>'Logout (' . Yii::app()->user->name . ')',
					'url'=>array('/site/logout'), 
					'linkOptions' => $linkOptionsRight);						

				$items[] = array('label'=>'Home', 
					'url'=>array('/site/'),
					'linkOptions'=> $linkOptionsLeft);
		}

		$this->widget('zii.widgets.CMenu',array(
				'activeCssClass' => 'ui-btn-active ui-state-persist',
				'activateParents' => true,
				'htmlOptions' => $htmlOptions,
				'items'=> $items
		));
	?>	

  <div data-role="content">
    <?php echo $content; ?>
    </div><!-- content -->
	<div data-role="footer" data-id="footer" data-position="fixed" >
		<div data-role="navbar">
			<?php 
				$htmlOptions = array('data-role' => 'footer', 'class' => 'localnav',);
				
				$items = array();

				if (Yii::app()->user->isGuest) {
					$items[] = null;
				} 
				else {
				
					/* $items[] = array('label'=>'Home',
						'url'=>array('/'),
						'linkOptions' => array(
							'data-icon'=>'home ', 
							'data-mini'=>'true',
							'data-direction'=>'reverse',
							)						
						
						); */
				
					$items[] = array('label'=>'Create New',
						'url'=>array('/document/create'),
						'linkOptions' => array(
							'data-icon'=>'grid ', 
							'data-mini'=>'true',
							'data-direction'=>'reverse',
							)						
						
						);
					
						
					$items[] = array('label'=>'List Documents',
						'url'=>array('/document/'),
						'linkOptions' => array(
							'data-icon'=>'grid ', 
							'data-mini'=>'true',
							'data-direction'=>'reverse',
							)						
						);	
					$items[] = array('label'=>'Control Panel',
						'url'=>array('/site/items'),
						'linkOptions' => array(
							'data-icon'=>'gear', 
							'data-mini'=>'true',
							'data-direction'=>'reverse',
							)						
						
						);

					/* $items[] = array('label'=>'New Items',
						'url'=>array('/site/items'),
						'linkOptions' => array(
							'data-icon'=>'grid ', 
							'data-mini'=>'true',
							'data-direction'=>'reverse',
							)						
						);	*/							
						

				}
					
				$this->widget('zii.widgets.CMenu',array(
					'activeCssClass' => 'active',
					'activateParents' => true,
					'htmlOptions' => $htmlOptions,
					'items'=> $items
				)
			); 
			?>		
		</div><!-- /navbar -->
	</div><!-- /footer -->	
</div><!-- page --><!-- page -->
</body>
</html>
