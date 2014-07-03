<?php

final class JUX_Shortcode {

	private static $separator = "|";

	private function formatKey( $s ) {

		return ucwords( str_replace( '_', ' ', $s ) );

	}

	private function getValues( $s ) {

		$output = explode( self::$separator, $s );
		return $output;

	}

	public function juxtapose( $atts ) {

		$output = '';

		extract( shortcode_atts( array( 'title' => '', 'img' => '', 'alt' => '' ) , $atts, 'jux') );

		if ( $title == '' ) return $output;

		$output .= '<div class="jux-container">';

		$titles = self::getValues( $title );
		$imgs   = self::getValues( $img );
		$alts   = self::getValues( $alt );

		for ( $i = 0; $i < count($titles); $i++) {

			$output .= '<div class="jux-item-header jux-item-index-'.$i.'">';

			$output .= '<div class="jux-item-title jux-item-title-index-'.$i.'">'.$titles[$i].'</div>';
			if ( array_key_exists( $i, $imgs ) ) {

				$output .= '<div class="jux-item-image jux-item-image-index-'.$i.'"><img src="'.$imgs[$i].'" alt="';
				if ( array_key_exists( $i, $alts ) ) $output .= $alts[$i];
				$output .= '"></div>';

			}

			$output .= '</div><!-- jux-item-header -->';

		}

		$output .= '<div class="jux-item-attributes">';

		foreach ( $atts as $key => $value) {

			if ( $key == 'title' || $key == 'img' ) continue;

			$output .= '<div class="jux-item-attribute">';

			$output .= '<div class="jux-item-attribute-name">'.self::formatKey($key).'</div>';

			$output .= '<div class="jux-item-attribute-values">';
			
			$vals = explode('|', $value);
			$ai = 0;
			foreach ( $vals as $val ) {

				$output .= '<div class="jux-item-attribute-value jux-item-attribute-value-index-'.$ai.'">'.$val.'</div>';
				$ai++;

			}

			$output .= '</div><!-- jux-item-attribute-values -->';
			
			$output .= '</div><!-- jux-item-attribute -->';

		}

		$output .= '</div><!-- jux-item-attributes -->';

		$output .= '</div><!-- jux-container -->';

		return $output;

	}

	public static function initialize() {

		add_shortcode( 'jux',       array( __CLASS__, 'juxtapose' ) );
		add_shortcode( 'juxta',     array( __CLASS__, 'juxtapose' ) );
		add_shortcode( 'juxtapose', array( __CLASS__, 'juxtapose' ) );
		add_shortcode( 'compare',   array( __CLASS__, 'juxtapose' ) );

	}

}