<?php
	class MendeleyWidget {

		function createWidget($input, array $args, Parser $parser, PPFrame $frame ) {
			
			global $wgOut;

			// Default values if the user don't want or forgot to set them up
			$width			= '260px';
			$height			= '550px';
			$scrolling		= 'auto';
			$frameborder	= 0;
			$options		= 0;
			$n_papers		= 10;

			/**
				Example of the output :  
				<iframe src="//www.mendeley.com/GROUP_URI/widget/CODE_GENERATED_BY_CHECKBOXES_CUSTOMIZATION/NUMBER_OF_RECENT_PAPER_TO_SHOW/" frameborder="FRAMEBORDER" allowTransparency="true" style="width:WIDTH;height:HEIGHT;"></iframe>

			*/
			

			// URI of the group
			if( isset($args['src']) && $args['src'] ){
				$src = htmlspecialchars( $args['src'] );
			}
			else{
				return wfMessage( 'no-src-parameter' )->text();
			}
			
			// width
			if( isset($args['width']) && $args['width'] ){
				$width = htmlspecialchars( $args['width'] );
			}
			
			// height
			if( isset($args['height']) && $args['height'] ){
				$height = htmlspecialchars( $args['height'] );
			}
			
			if( isset($args['scrolling']) && $args['scrolling'] ){
				$scrolling = htmlspecialchars( $args['scrolling'] );
			}

			if( isset($args['frameborder']) && $args['frameborder'] ){
				$frameborder = htmlspecialchars( $args['frameborder'] );
			}

			// Customization of the group widget

			if( isset($args['ribbon']) && $args['ribbon'] && $args['ribbon'] === 'true' ){
				$options += 1;
			}

			if( isset($args['picture']) && $args['picture'] && $args['picture'] === 'true' ){
				$options += 2;
			}

			if( isset($args['owner']) && $args['owner'] && $args['owner'] === 'true' ){
				$options += 4;
			}

			if( isset($args['groupdesc']) && $args['groupdesc'] && $args['groupdesc'] === 'true' ){
				$options += 8;
			}

			if( isset($args['heading']) && $args['heading'] && $args['heading'] === 'true' ){
				$options += 16;
			}

			// nb of papers
			if( isset($args['n_papers']) && $args['n_papers'] ){
				$n_papers = htmlspecialchars( $args['n_papers'] );
			}
			$wgOut->addModules( 'MendeleyWidget' );

			return '<iframe src="'.$src.'/widget/'.$options.'/'.$n_papers.'/" frameborder="'.$frameborder.'" allowTransparency="true" style="width:'.$width.';height:'.$height.';"></iframe>';
		}
	}
?>