<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wordpress' );

/** Username của database */
define( 'DB_USER', 'wordpress' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '6118891025a' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'N`+!Y2*7%=fZ#g*4DPL}xWy-R@rL@wGl9DILEK6cb,W]gqpS:5?z ::=w`ajwRej' );
define( 'SECURE_AUTH_KEY',  '=!}(}J5^k!N/2~lIv6lowG2>z3:Ct;UtWt=D3gk2S.2}]ivhqTrYBM1HDOE`bC0n' );
define( 'LOGGED_IN_KEY',    'C{eLN%5.8$VENM8:EMMaA9]|,2&Xb Ar}D)W/TOuCSI`]`jTl4d*{[`%Fbq6SGX}' );
define( 'NONCE_KEY',        '9U(;jANP<{1QXL,RRVxY34^F7l}>ol#jI|Q_)Yj`YquIc|61-01YA3_A|7$[+4Bd' );
define( 'AUTH_SALT',        '}k/E: j0J>9BQUs0K8xZIb{35-m0b&W^;&>z!a&C^yJ44tLSNi%Wk#WTC4qeZn) ' );
define( 'SECURE_AUTH_SALT', 'MPd)+w|9iGPF#D:B3Us<,AGI&m<rMSh(ZnZ$5#`9kc3 =iHv1=cCYs(PZ%cXnxBQ' );
define( 'LOGGED_IN_SALT',   '?=!Y|I+/[c~k%ngR5b ^QzP@h{ GZd&5DJMJ1iT1PS$+2L0fc7{](R8GbA>C-PO{' );
define( 'NONCE_SALT',       '(m~EqWA=q1pn3pCX(/h`q[y^5*GY!k4ve3:^PqM7.A(c]NI=/d>J[aLS[LOn$A8T' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
