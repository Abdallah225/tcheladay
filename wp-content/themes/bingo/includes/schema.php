<?php
/**
 * this file create schema markup for theme
 */
if ( ! class_exists( 'bingo_ruby_schema' ) ) {
	class bingo_ruby_schema {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $context
		 *
		 * @return bool|string
		 * schema markup, good for search engine
		 */
		static function markup( $context ) {

			$str  = '';
			$data = array();
			$http = 'http';

			if ( is_ssl() ) {
				$http = 'https';
			}

			switch ( $context ) {
				case 'body' :
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/WebPage';
					break;

				case 'article' :
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/Article';
					break;

				case 'review' :
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/Review';
					break;

				case 'menu':
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/SiteNavigationElement';
					break;

				case 'header':
					$data['role']      = 'banner';
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/WPHeader';
					break;

				case 'sidebar':
					$data['role']      = 'complementary';
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/WPSideBar';
					break;

				case 'footer':
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/WPFooter';
					break;

				case 'logo' :
					$data['itemscope'] = true;
					$data['itemtype']  = $http . '://schema.org/Organization';
					break;

                case 'BreadcrumbList' :
                    $data['itemscope'] = true;
                    $data['itemtype']  = $http . '://schema.org/BreadcrumbList';
                    break;

                case 'ListItem' :
                    $data['itemscope'] = true;
                    $data['itemprop'] ="itemListElement";
                    $data['itemtype']  = $http . '://schema.org/ListItem';
                    break;

			};

			if ( empty( $data ) ) {
				return false;
			}

			foreach ( $data as $k => $v ) {
				if ( true === $v ) {
					$str .= ' ' . $k . ' ';
				} else {
					$str .= ' ' . $k . '="' . $v . '" ';
				}
			}

			return $str;
		}
	}
}