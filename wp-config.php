<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'projetwordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F1Kre90B53Cn2V3uFeh{XS@myCn65;mDoB4nz&36f(o=z}-:%Ra>,c#[:0c9sWg%');
define('SECURE_AUTH_KEY',  'ydlrg(oc3jaw1W|OOE*cKyMx$G@q knN3.08yz|n}SAm}Ar?VXer#>7mt@1q:w.K');
define('LOGGED_IN_KEY',    '=}G`..l9Zrfz?Aop9/#4R,v@,q&X4c=7KK?u+ID~wQDw7E!v*ce9+il0T=Dug4H_');
define('NONCE_KEY',        'J(_y]La5=X}~N;S1EQsf.3U((y{TQp+aK*+<dq|PXS`@Q4||1BT*by?5tL1!|bxl');
define('AUTH_SALT',        ')qm~E)Ltxx/$fo[O/(d/K(]J%5<nUDRlk1WrM.!X+9y-9Q0gS$cG73i@eQK+Jm-a');
define('SECURE_AUTH_SALT', 'nIV5&Pb-g*uEMy9g9-!zE7Xd-e-8r)$8<E@:|th.Yjca.Y;_mXeCju)QXS$Iga(r');
define('LOGGED_IN_SALT',   'z]E/42BXJ#t3oz)`+*t7N3oNy -rzCZNX>yg Bjmv&3*8~Y06p ,&IPYhHWHvvz7');
define('NONCE_SALT',       'r+dLEAxdDVX`2z1/1?18Wy6@L^*W&n3[n55VWEK_f@c%$x0i%r4x9+2B{eOf:<Tf');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');