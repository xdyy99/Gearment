add_action('wp_ajax_nopriv_get_product_from_api', 'get_products_from_api');
add_action('wp_ajax_get_product_from_api', 'get_products_from_api');

function getting_products_from_api()
{
//Getting data from API
$curl = curl_init();

$products = [];

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://account.gearment.com/api/v2/?act=products',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'GET',
CURLOPT_POSTFIELDS => '{
"api_key":"MjpUEYzTtznWAuZn",
"api_signature":"4R6Y7stMOUtCnDQsVURIyUQyr8PzSYG4"
}',
CURLOPT_HTTPHEADER => array(
'Content-Type: application/x-www-form-urlencoded'
),
));


$file = THEME_URL . '/assets/products.txt';
$response = curl_exec($curl);

curl_close($curl);


//Checking API Result
$results = json_decode($response);
$products[] = $results->result;

//file_put_contents($file, $response, FILE_APPEND);



foreach ($products[0] as $product) {
$product_slug = slugify($product->product_name . '-' . $product->product_id);

$existing_product = get_page_by_path($product_slug, 'OBJECT', 'product');

if ($existing_product === null) {

$inserted_product = wp_insert_post([
'post_name' => $product_slug,
'post_title' => $product_slug,
'post_type' => 'product',
'post_status' => 'publish'
]);

if (is_wp_error($inserted_product) || $inserted_product === 0) {
// die('Could not insert brewery: ' . $brewery_slug);
error_log('Could not insert product: ' . $inserted_product);
continue;
}

$fillableproduct = [
'field_62d92cea64215' => 'product_name',
'field_62d92cf264216' => 'product_img',
'product_print_areas' => 'print_areas'
];

foreach ($fillableproduct as $key => $name) {
update_field($key, $product->$name, $inserted_product);
}

//Getting product variants

$variants[] = $product->variants;
$variants_key = 'field_62d92d6d64218';

foreach ($variants[0] as $variant) {
$fillablevars = [
'field_62d92d8464219' => 'name',
'field_62d92f4091ce1' => 'color',
'field_62d92f4c91ce2' => 'size',
'field_62d92f5491ce3' => 'hex_color_code',
'field_62d92f5f91ce4' => 'price',
'field_62d92f6891ce5' => 'net_price',
'field_62d92f7991ce6' => 'availability_status'
];
foreach ($fillablevars as $key => $name) {
update_field($key, $variant->$name, $variants_key);
//add_row('field_560389746a51f', $row);
}
}
} else {

$existing_product_id = $existing_product->ID;
//$exisiting_brewerey_timestamp = get_field('updated_at', $existing_brewery_id);

//if ($brewery->updated_at >= $exisiting_brewerey_timestamp) {

$fillableproduct = [
'field_62d92cea64215' => 'product_name',
'field_62d92cf264216' => 'product_img',
'product_print_areas' => 'print_areas'
];

foreach ($fillableproduct as $key => $name) {
update_field($name, $product->$name, $existing_product_id);
}
//Getting product variants

$variants[] = $product->variants;
$variants_key = 'field_62d92d6d64218';

foreach ($variants[0] as $variant) {
/*$fillablevars = [
'field_62d92d8464219' => 'name',
'field_62d92f4091ce1' => 'color',
'field_62d92f4c91ce2' => 'size',
'field_62d92f5491ce3' => 'hex_color_code',
'field_62d92f5f91ce4' => 'price',
'field_62d92f6891ce5' => 'net_price',
'field_62d92f7991ce6' => 'availability_status'
];*/
$repeatervalues = [
'field_62d92d8464219' => $variant->name,
'field_62d92f4091ce1' => $variant->color,
'field_62d92f4c91ce2' => $variant->size,
'field_62d92f5491ce3' => $variant->hex_color_code,
'field_62d92f5f91ce4' => $variant->price,
'field_62d92f6891ce5' => $variant->net_price,
'field_62d92f7991ce6' => $variant->availability_status
];
//update_field( $variants_key, $repeatervalues, $existing_product_id );
add_row($variants_key, $repeatervalues);

/*foreach ($fillablevars as $key => $name) {
update_field($key, $variant->$name, $variants_key);
//add_row('field_560389746a51f', $row);
}*/

echo $variant->name;
}
//}
}

/*wp_remote_post(admin_url('admin-ajax.php?action=get_product_from_api'), [
'blocking' => false,
'sslverify' => false, // we are sending this to ourselves, so trust it.
]);*/
}
}